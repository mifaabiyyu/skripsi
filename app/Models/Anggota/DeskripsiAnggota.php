<?php

namespace App\Models\Anggota;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiAnggota extends Model
{
    use HasFactory;
    protected $table = "deskripsi_anggota";
    protected $fillable = [
        'departemen', 'photo', 'deskripsi'
    ];
}
