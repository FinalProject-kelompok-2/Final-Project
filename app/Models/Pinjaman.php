<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
        'nama_toko',
        'foto_ktp',
        'npwp',
        'buku_tabungan',
        'proposal_bisnis',
        'laporan_keuangan',
        'siu',
        'skdu',
        'situ',
        'jml_pinjaman',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
