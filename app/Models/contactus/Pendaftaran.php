<?php

namespace App\Models\contactus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = "pendaftaran_hima";
    protected $fillable = [
        'nama', 'npm', 'visi', 'misi', 'departemen1', 'departemen2', 'alasan_departemen', 'alasan_hima', 'photo', 'status'
    ];
}
