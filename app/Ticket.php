<?php

namespace App;
use App\Preparingsession;
use App\Trainingsession;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        "uid",
        "status",
    ];

    protected $table = 'tickets';


}
