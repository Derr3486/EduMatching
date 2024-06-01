<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    //diable timestamps
    public $timestamps = false;
    protected $primaryKey = 'ProgramID';
    
    use HasFactory;

    protected $fillable = 
    [
        'ProgramName',
        'ProgramDesc',
        'PersonalityID'
    ];

    // Define the relationship with Personality
    public function personality()
    {
        return $this->belongsTo(personality::class, 'PersonalityID', 'PersonalityID');
    }
    
    //define relationship with recommendation
    public function recommendation()
    {
        return $this->hasOne(Recommendation::class, 'ProgramID', 'ProgramID');
    }
}
