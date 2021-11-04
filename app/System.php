<?php

namespace App;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
         /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'systems';
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'type',
     'price',
     'quantity',
    ];
      /**
       * Get all of the comments for the System
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function students()
      {
          return $this->hasMany(Student::class);
      }
    

  
}
