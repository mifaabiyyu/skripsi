<?php

namespace App\Models\Proposal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalKegiatan extends Model
{
    use HasFactory;
    protected $table = "proposal_kegiatan";
    protected $fillable = [
        'name', 'status', 'file', 'description', 'keterangan'
    ];
}
