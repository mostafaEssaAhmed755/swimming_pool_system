<?php

namespace App;
use App\Coach;
use App\Gymnastic;
use App\Student;
use App\Trainingdate;

use Illuminate\Database\Eloquent\Model;

class Trainingsession extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trainingsessions';
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'coach_id',
     'gymnastic_id',
     'trainingdate_id',
    ];
    /**
     * Get the user that owns the Trainingsession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    public function gymnastic()
    {
        return $this->belongsTo(Gymnastic::class);
    }
    public function trainingdate()
    {
        return $this->belongsTo(Trainingdate::class);
    }
    /**
     * The roles that belong to the Trainingsession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class,'trainingsession_student')->withTimestamps();
    }
 
}
