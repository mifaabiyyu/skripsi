<?php

namespace App\Models\BPH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kahima extends Model
{
    use HasFactory;
    protected $table = "kahima";
    protected $fillable = [
        'name', 'jabatan', 'deskripsi', 'photo'
    ];
}
