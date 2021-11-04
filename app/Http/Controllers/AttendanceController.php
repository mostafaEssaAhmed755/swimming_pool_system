<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:الحضور-والانصراف', ['only' => ['index','search_attendence','assign_attendence','show_attendence']]);
    }
    
    public function index()
    {
        return view('admin.attendance.attendance');
    }

    public function search_attendence(Request $request)
    {
        $date =  strtr($request->attendance_date,'/','-');
        $attendance_date = date('Y-m-d',strtotime($date));
        $employees = Employee::select('id','name','job_id')->orderBy('id','desc')->get();
        foreach($employees as $employee)
        {
             $employee_attendance = Attendance::where('employee_id',$employee->id)->whereDate('attendance_date','=',$attendance_date)->first();
             $employee_job = Job::select('name')->where('id',$employee->job_id)->first();
            if($employee_attendance)
            {
                $employee->attendance = $employee_attendance->attendance;
                $employee->attendance_time = $employee_attendance->attendance_time;
                $employee->leave_time = $employee_attendance->leave_time;
                $employee->attendance_time = $employee_attendance->attendance_time;
                $employee->attendance_note = $employee_attendance->note;
                $employee->job = $employee_job;
            }
        }
        return DataTables::of($employees)
                    ->addColumn('attendance',function($row){

                        $present = $row->attendance == 'present' ?'checked' :'';
                        $absent = $row->attendance == 'absent' ?'checked' :'';
                        $btn_attendance = ' <div class="radio-inline" style="margin: 0 auto;display: inline-flex;">
                                                <label class="radio radio-success" style="margin-left: 27px;">
                                                <input type="radio" class="radio_attendance present_attendance" name="attendance_date'.$row->id.'"
                                                data-member_id='.$row->id.' data-attendance="present" '.$present.'>
                                                <span></span>حاضر
                                                </label>
                                                <label class="radio radio-danger">
                                                <input type="radio" class="radio_attendance absent_attendance"  name="attendance_date'.$row->id.'"
                                                data-member_id='.$row->id.' '.$absent.' data-attendance="absent" $absent>
                                                <span></span>غايب</label>
                                            </div>
                                            ';
                                            return $btn_attendance;

                    })
                    ->addColumn('attendance_time',function($row){
                        return '<input type="text" name="attendance_time" class="form-control attendance_time" value="'.$row->attendance_time.'">';
                    })
                    ->addColumn('leave_time',function($row){
                        return '
                            <div class="row">
                                <div class="col-2 input-leave-siblings">
                                <input class="form-check-input btn_leave" type="checkbox" value="" id="flexCheckDefault" style="margin-top: 9px;">
                                <label class="form-check-label" for="flexCheckDefault">                            
                                </label>
                                </div>
                                <div class="col-9 input-leave">  
                                <input type="text" name="leave_time" class="form-control basicExample" value="'.$row->leave_time.'"></div>
                            </div>
                       
                      ';
                    })
                    ->addColumn('job',function($row){
                        return $row->job->name;
                    })
                    ->addColumn('note',function($row){
                        $note = $row->attendance_note != '' ? $row->attendance_note : '';
                        return '<textarea type="text"  style="display: inline-flex;width: 270px;"
                        class="form-control member_note" name="attendance_note" autocomplete="off" value='.$note.'>'.$note.'</textarea>';
                    })
                    
                   
                    ->addIndexColumn()
                    ->rawColumns(['job','attendance_time','leave_time','attendance','note'])
                    ->make(true);

    }

    public function assign_attendence(Request $request)
    {
        $date = strtr($request->attendance_date, '/', '-');
        $attendance_date = date('Y-m-d',strtotime($date));
        foreach($request->data as $item)
        {
            Attendance::updateOrCreate(
                ['employee_id'=>$item['employee_id'],'attendance_date'=>$attendance_date],
                ['note'=>$item['note'],'attendance'=>$item['attendance'],
                'leave_time'=>$item['leave_time'],'attendance_time'=>$item['attendance_time']]
            );
        }
        return 'done';
    }

    public function show_attendence(Request $request)
    {
       $date = strtr($request->date, '/', '-');
       $attendance_date = date('Y-m-d',strtotime($date));
       $member_attendance = Attendance::where(['member_id'=>$request->member_id])->whereDate('attendance_date',$attendance_date)->first();
       $data = $member_attendance != null ? $member_attendance : null ;
       return $data;
    }
}
