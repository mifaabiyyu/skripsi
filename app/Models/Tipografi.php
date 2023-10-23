<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipografi extends Model
{
    use HasFactory;
    protected $table = "tipografi_check";
    protected $fillable = [
        'file'
    ];
}
