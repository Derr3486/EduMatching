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

    //define relationship with program
    public function program()
    {
        return $this->belongsTo(Program::class, 'ProgramID', 'ProgramID');
    }
}
