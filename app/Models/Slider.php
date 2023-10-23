<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = "slider_background";
    protected $fillable = [
        'head', 'tittle', 'deskripsi', 'photo'
    ];
}
