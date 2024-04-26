<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personality extends Model
{
    //diable timestamps
    public $timestamps = false;
    protected $primaryKey = 'PersonalityID';
    
    use HasFactory;

     // Define the relationship with Program
     public function programs()
     {
         return $this->hasMany(Program::class, 'PersonalityID', 'PersonalityID');
     }

    protected $fillable = 
    [
        'Personality',
        'PersonalityDesc',
    ];
}
