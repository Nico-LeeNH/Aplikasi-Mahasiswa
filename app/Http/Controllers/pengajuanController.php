<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Validator;

class PengajuanController extends Controller
{
    public function pengajuan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|digits_between:1,20',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengajuans',
            'no_wa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'lembaga_mengajukan' => 'required|string|max:255',
            'nomor_surat_pengajuan' => 'required|string|max:255',
            'tgl_surat_pengajuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'online_offline' => 'required|in:online,offline',
            'judul_penelitian' => 'required|string|max:255',
            'tgl_pelaksanaan' => 'required|string|max:255',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'kota_pelaksanaan' => 'required|string|max:255',
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
            'lembaga_mengajukan' => $request->lembaga_mengajukan,
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
}