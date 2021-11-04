<?php

namespace App\Http\Controllers;
use App\Fine;
use App\Http\Requests\FineRequest;
use App\Http\Requests\salaryRequest;
use App\Salary;
use Illuminate\Http\Request;

class FineController extends Controller
{
    
    public function store(FineRequest $request)
    {
        $insert_fine  = Fine::create(['note'=>$request->note,'amount'=>$request->amount,'employee_id'=>$request->employee_id]);
        if($insert_fine)
        {
            return ['error'=>false];
        }
    } 
    
    public function edit(FineRequest $request)
    {
        Fine::orderBy('id','desc')->update(['amount'=>0]);
        Fine::orderBy('id','desc')->where('amount',0)->delete();
        $insert_fine  = Fine::create(['amount'=>$request->amount,'employee_id'=>$request->employee_id]);
        if($insert_fine)
        {
            $amount = Fine::sum('amount');
            return ['error'=>false,'amount'=>$amount];
        }
    } 
    
    public function show()
    {
        $amount = Fine::sum('amount');
        return ['amount'=>$amount];
    }
    
    public function salary(salaryRequest $request)
    {
        $insert_salary  = Salary::create(['note'=>$request->note,
                          'salary'=>$request->salary,'employee_id'=>$request->employee_id,'year'=>$request->year,'month'=>$request->month]);
        if($insert_salary)
        {
            return ['error'=>false];
        }
    }
}
