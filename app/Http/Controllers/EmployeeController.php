<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Employee;
use App\Fine;
use Illuminate\Http\Request;
use App\Job;
use App\Http\Requests\StoreEmployeeRequest;
use App\Salary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:كل-الموظفين', ['only' => ['index']]);
         $this->middleware('permission:اضافة-موظف', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل-موظف', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف-موظف', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.employee.index',['employees'=>Employee::all()]);
    }

   
    public function create()
    {

        return view('admin.employee.create',['jobs'=>Job::all()]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create([
            "job_id"=>$request->job_id,
            "uid"  => $request->uid,
            "name" => $request->name,
            "image"=>"employees/defualt.jpg",
            "identification" => $request->identification,
            "joinDate" => $request->joinDate?$request->joinDate:null,
            "mobile_1" => $request->mobile_1,
            "mobile_2" => $request->mobile_2?$request->mobile_2:null,
            "salary" => $request->salary,
            "adress" => $request->adress,
            "user_id" => Auth::user()->id,
        ]);

        Session::flash('success', "تم أضافه موظف جديد بنجاح");
        return Redirect::route('employee.index');

    }
    public function uploadImg(Request $request,$id){
        $employee = Employee::find($id);
        if($employee){
            if($employee->image != 'employees/defualt.jpg'){
                Storage::disk('public')->delete($employee->image);

            }
            $extension = $request->file('img')->extension();
            $path = $request->file('img')->storeAs('employees',time().'.'.$extension,'public');
            $employee->image = $path;
            $employee->save();

            Session::flash('success', "تم تحديث بيانات المشترك بنجاح");

            return Redirect::route('employee.show',$id);  
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $attendances = Attendance::where('employee_id',$employee->id)->get();
        $fines = Fine::sum('amount');
        $salaries = Salary::where('employee_id',$employee->id)->get();
        return view('admin.employee.profile',['employee'=>$employee,'attendances'=>$attendances,'fines'=>$fines,'salaries'=>$salaries]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function discount(Employee $employee)
    {
        return view('admin.employee.profile',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit',['employee'=>$employee,'jobs'=>Job::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->identification = $request->identification;
        $employee->mobile_1 = $request->mobile_1;
        $employee->mobile_2 = $request->mobile_2? $request->mobile_2:null;
        $employee->salary = $request->salary;
        $employee->adress = $request->adress;

        $employee->save();
        Session::flash('success', "تم تحديث بيانات الموظف بنجاح");

        return Redirect::route('employee.index');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        Session::flash('success', "تم حذف الموظف  بنجاح");
        return Redirect::route('employee.index');
    }
}
