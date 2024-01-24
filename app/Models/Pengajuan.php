<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $primarikey = 'id_pengajuan';
    public $timestamps = false;
    protected $fillable = [
        'id_pengajuan', 'id', 'nama', 'nim', 'progam_studi', 'judul_penelitian', 'tangga_pelaksanaan', 'tujuan_tempat_pelaksanaan', 'nomor', 'email', 'upload_file'
    ];
}
