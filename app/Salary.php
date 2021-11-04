<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    protected $fillable = ['salary','year','month','note','employee_id'];
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }
}
