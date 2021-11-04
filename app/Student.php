<?php

namespace App;
use App\System;
use App\Gymnastic;
use App\Trainingsession;
use App\Preparingsession;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid' ,
        "name" ,
        "age" ,
        "identification",
        "expire" ,
        "gender",
        "image",
        "mobile" ,
        "point" ,
        "adress" ,
        "parentNam" ,
        "parentNum" ,
        "system_id",
        "gymnastic_id",
        "user_id",
    ];

       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function system()
    {
        return $this->belongsTo(System::class);
    }
    
    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gymnastic()
    {
        return $this->belongsTo(Gymnastic::class);
    }
    /**
     * The roles that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainingsessions()
    {
        return $this->belongsToMany(Trainingsession::class,'trainingsession_student')->withTimestamps();
    }
    public function preparingsessions()
    {
        return $this->belongsToMany(Preparingsession::class,'preparingsessions_student')->withTimestamps();
    }
}
