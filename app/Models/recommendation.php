<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommendation extends Model
{
    //diable timestamps
    public $timestamps = false;

    use HasFactory;

    protected $fillable = 
    [
        'userID',
        'ProgramID',
    ];
}
