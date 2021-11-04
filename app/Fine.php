<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = 'fines';
    protected $fillable = ['amount','note','employee_id'];
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }
}
