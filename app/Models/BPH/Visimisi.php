<?php

namespace App\Models\BPH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    use HasFactory;
    protected $table = "visimisi";
    protected $fillable = [
        'visi', 'misi'
    ];
}
