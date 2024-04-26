<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_match extends Model
{
    //diable timestamps
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    use HasFactory;

    protected $fillable = [
        'Personality',
        'Subject',
        'Program',
    ];
}
