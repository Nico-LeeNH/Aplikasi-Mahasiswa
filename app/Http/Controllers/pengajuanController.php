<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Validator;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PengajuanController extends Controller
{
    public function pengajuan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|digits_between:1,20',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengajuans',
            'no_wa' => 'required|numeric',
            'nim' => 'required|numeric',
            'program_studi' => 'required|string|max:255',
            'lembaga_pengajuan' => 'required|string|max:255',
            'nomor_surat_pengajuan' => 'required|string|max:255',
            'tgl_surat_pengajuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'online_offline' => 'required|in:Online,Offline',
            'judul_penelitian' => 'required|string|max:255',
            'tgl_pelaksanaan' => 'required|string|max:255',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'kota_pelaksanaan' => 'required|in:Malang,Batu|max:255',
            'upload_file' => 'required|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()], 422);
        }

        $uploadPath = 'dokumen/upload_file';

        $uploadedFile = $request->file('upload_file');
        $uniqueFileName = uniqid() . '_' . $uploadedFile->getClientOriginalName();

        $pengajuan = Pengajuan::create([
            'id' => $request->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'lembaga_pengajuan' => $request->lembaga_pengajuan,
            'nomor_surat_pengajuan' => $request->nomor_surat_pengajuan,
            'tgl_surat_pengajuan' => $request->tgl_surat_pengajuan,
            'perihal' => $request->perihal,
            'online_offline' => $request->online_offline,
            'judul_penelitian' => $request->judul_penelitian,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
            'kota_pelaksanaan' => $request->kota_pelaksanaan,
            'upload_file' => $uploadedFile->storeAs($uploadPath, $uniqueFileName),
        ]);

        if ($pengajuan) {
            $this->show($pengajuan->id_pengajuan);
            // return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id_pengajuan)
    {
        $pengajuan = Pengajuan::where('id_pengajuan', $id_pengajuan)->first();

        if (!$pengajuan) {
            return response()->json(['error' => 'Pengajuan not found'], 404);
        }
        // return response()->json($pengajuan);
        // return view('pdf', ['pengajuan' => $pengajuan]);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('pdf', ['pengajuan' => $pengajuan])
            ->setPaper('legal', 'potrait');

        // Define the file path
        $filePath = 'dokumen/pdf/' . $pengajuan->id_pengajuan . ' - '. $pengajuan->nama_lengkap . '.pdf';

        // Save PDF file
        Storage::put($filePath, $pdf->output());

        // to database
        $pengajuan->file_pengantar_tujuan = $filePath;
        $pengajuan->save();

        $data["email"] = "alidzafazah@gmail.com"; //isi pake email admin yang dituju
        $data["title"] = "Dari: " . $pengajuan->nama_lengkap ." ". $pengajuan->email; 
        $data["id_pengajuan"] = $pengajuan->id_pengajuan;
        $data["nama_lengkap"] = $pengajuan->nama_lengkap;
        $data["upload_file"] = $pengajuan->upload_file;

        $Mail = Mail::send('email', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"])
                ->subject($data["title"])
                ->attach(storage_path('app/' . $data["upload_file"])) // Attach the uploaded file
                ->attachData($pdf->output(), $data['id_pengajuan'] . ' _ ' . $data['nama_lengkap'] . '.pdf');
        });

        if ($Mail) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }

        // return $pdf;
    }
}