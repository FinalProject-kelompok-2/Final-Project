<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenor extends Model
{
    use HasFactory;

    protected $table = 'tenor';

    protected $fillable = [
        'tenor',
        'bunga',
    ];

    public function pinjaman(){
        return $this->hasMany(Pinjaman::class, 'tenor_id');
    }
}

