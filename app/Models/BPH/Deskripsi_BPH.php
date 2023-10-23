<?php

namespace App\Models\BPH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi_BPH extends Model
{
    use HasFactory;
    protected $table = "deskripsi_bph";
    protected $fillable = [
        'judul', 'deskripsi'
    ];
}
