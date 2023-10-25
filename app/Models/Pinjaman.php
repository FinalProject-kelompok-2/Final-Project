<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
        'user_id',
        'nama_usaha',
        'tenor_id',
        'foto_ktp',
        'kk',
        'npwp',
        'buku_tabungan',
        'proposal_bisnis',
        'laporan_keuangan',
        'siu',
        'skdu',
        'situ',
        'tenor',
        'bunga',
        'jml_pinjaman',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tenor(){
        return $this->belongsTo(Tenor::class, 'tenor_id');
    }

    public function angsuran(){
        return $this->hasMany(Angsuran::class, 'pinjaman_id');
    }
}
