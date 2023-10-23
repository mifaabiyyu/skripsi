<?php

namespace App\Models\BPH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekretarisBendahara extends Model
{
    use HasFactory;
    protected $table = "sekben";
    protected $fillable = [
        'name', 'jabatan', 'deskripsi', 'photo'
    ];
}
