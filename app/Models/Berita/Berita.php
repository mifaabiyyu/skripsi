<?php

namespace App\Models\Berita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $fillable = [
        'category', 'title', 'slug', 'konten', 'photo'
    ];
}
