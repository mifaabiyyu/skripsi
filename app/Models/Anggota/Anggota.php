<?php

namespace App\Models\Anggota;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = "anggota";
    protected $fillable = [
        'name', 'departemen', 'jabatan', 'deskripsi', 'photo'
    ];
}
