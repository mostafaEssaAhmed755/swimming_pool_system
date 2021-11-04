<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Trainingsession;
use App\Preparingsession;
class Coach extends Model
{

    protected $fillable = [
        "name" ,
        "identification" ,
        "adress" ,
        "mobile" ,
        'user_id'
    ];


    protected $table = 'coaches';

    public function trainingsessions()
    {
        return $this->hasMany(Trainingsession::class);
    }

    public function preparingsessions()
    {
        return $this->hasMany(Preparingsession::class);
    }
    
}
