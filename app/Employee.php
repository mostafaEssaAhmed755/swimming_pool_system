<?php

namespace App;
use App\Job;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name" ,
        "image" ,
        "uid" ,
        "identification" ,
        "adress" ,
        "mobile_1" ,
        "mobile_2" ,
        "joinDate" ,
        "salary" ,
        "job_id" ,
        'user_id'
    ];

       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';
    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
