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
        'deskripsi_usaha',
        'tenor_id',
        'bank_id',
        'foto_ktp',
        'selfie_ktp',
        'kk',
        'npwp',
        'buku_tabungan',
        'no_rekening',
        'nama_rekening',
        'nama_bank',
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

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function angsuran(){
        return $this->hasMany(Angsuran::class, 'pinjaman_id');
    }
}
