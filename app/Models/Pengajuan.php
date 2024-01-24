<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuans';
    protected $primaryKey = 'id_pengajuan';
    public $timestamps = true;
    protected $fillable = [
        'id_pengajuan',
        'id',
        'nama_lengkap',
        'nim',
        'no_wa',
        'email',
        'lembaga_mengajukan',
        'nomor_surat_pengajuan',
        'tgl_surat_pengajuan',
        'perihal',
        'online_offline',
        'judul_penelitian',
        'tgl_pelaksanaan',
        'tempat_pelaksanaan',
        'kota_pelaksanaan',
        'upload_file'
    ];
}
