<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['attendance_date','attendance_time','leave_time','note','attendance','employee_id'];
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }
}
