<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Validator;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

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
            'upload_file' => $request->upload_file->store('uploads'),
        ]);

        if ($pengajuan) {
            return response()->json(['status' => 1]);

        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function template(Request $request, $id_pengajuan)
    {
        $pengajuan = Pengajuan::find($id_pengajuan);
        $templateProcessor = new TemplateProcessor(base_path('dokumen/cobaa.docx'));

        if ($pengajuan === null) {
            // Handle the case where there is no Pengajuan with the given id
            return response()->json(['message' => 'Pengajuan not found'], 404);
        }

        foreach ($pengajuan->toArray() as $key => $value) {
            $templateProcessor->setValue($key, htmlspecialchars($value));
        }
        // Set the values in the Word template
        $templateProcessor->setValue('footer', $pengajuan['nama_lengkap']);
        $templateProcessor->setValue('nama', strtoupper($pengajuan['nama_lengkap']));
        $templateProcessor->setValue('email', $pengajuan['email']);
        $templateProcessor->setValue('nim', $pengajuan['nim']);
        $templateProcessor->setValue('program_studi', $pengajuan['program_studi']);
        $templateProcessor->setValue('lembaga_pengajuan', $pengajuan['lembaga_pengajuan']);
        $templateProcessor->setValue('nomor_surat_pengajuan', $pengajuan['nomor_surat_pengajuan']);
        $templateProcessor->setValue('tgl_surat_pengajuan', $pengajuan['tgl_surat_pengajuan']);
        $templateProcessor->setValue('perihal', $pengajuan['perihal']);
        $templateProcessor->setValue('online_offline', strtolower($pengajuan['online_offline']));
        $templateProcessor->setValue('judul_penelitian', $pengajuan['judul_penelitian']);
        $templateProcessor->setValue('tgl_pelaksanaan', $pengajuan['tgl_pelaksanaan']);
        $templateProcessor->setValue('tempat_pelaksanaan', $pengajuan['tempat_pelaksanaan']);
        $templateProcessor->setValue('kota_pelaksanaan', $pengajuan['kota_pelaksanaan']);

        // buat namain filenya
        $filename = $pengajuan['id_pengajuan'] . '_Penelitian_' . $pengajuan['nama_lengkap'] . '.docx';
        // namain yang wordfilename
        $wordFileName = public_path('documents/word/' . $filename);
        //ngesave si wordfilename
        $templateProcessor->saveAs($wordFileName);
        //update file_pengantar_tujuan otomatis abis ke save
        Pengajuan::where('id_pengajuan', $pengajuan['id_pengajuan'])->update([
            'file_pengantar_tujuan' => $wordFileName,
        ]);


        // notif/output kl sukses
        return response()->json(['message' => 'Successfully created word file']);
        // return response()->json(['status' => 1]);
    }

    function convertWordToPdf($wordFileName)
    {
        $domPdfPath = base_path('vendor/dompdf/dompdf');

        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        // Load the Word document
        $phpWord = IOFactory::load(public_path('documents/word/' . $wordFileName));

        // Create a new PDF writer
        $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');

        // Define the name of the output PDF file
        $pdfFileName = str_replace('.docx', '.pdf', $wordFileName);

        // Save the PDF file
        $pdfWriter->save(public_path('documents/pdf/' . $pdfFileName));

        return response()->json(['message' => 'Successfully created word file', 'file' => $pdfFileName]);
    }
}