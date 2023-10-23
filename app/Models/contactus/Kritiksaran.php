<?php

namespace App\Models\contactus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritiksaran extends Model
{
    use HasFactory;
    protected $table = "kritik_saran";
    protected $fillable = [
        'nama', 'npm', 'kritik_saran'
    ];
}
