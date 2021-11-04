<?php

namespace App;
use App\Trainingdate;
use App\Student;
use App\Trainingsession;
use App\Preparingsession;



use Illuminate\Database\Eloquent\Model;

class Gymnastic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name" ,
        "user_id" ,
    ];

       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gymnastics';
    /**
     * Get all of the comments for the Gymnastic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainingdates()
    {
        return $this->hasMany(Trainingdate::class);
    }
   /**
       * Get all of the comments for the System
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function students()
      {
          return $this->hasMany(Student::class);
      }
      public function trainingsessions()
      {
          return $this->hasMany(Trainingsession::class);
      }
      public function preparingsessions()
      {
          return $this->hasMany(Preparingsession::class);
      }
      
}
