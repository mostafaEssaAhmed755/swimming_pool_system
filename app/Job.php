<?php

namespace App;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name" , 'user_id'
    ];

       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jobs';
    /**
     * Get all of the comments for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
}
