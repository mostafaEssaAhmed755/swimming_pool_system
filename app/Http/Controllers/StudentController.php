<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\System;
use App\Gymnastic;
use Carbon\Carbon;
use DateTime;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    
    function __construct()
    {
         $this->middleware('permission:كل-المشتركين', ['only' => ['index']]);
         $this->middleware('permission:اضافة-مشترك', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل-مشترك', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف-مشترك', ['only' => ['destroy']]);
    }
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::where('active',true)->get();
        
        foreach($systems as $system){
            if($system->type == 1){
                $system->typeName = 'شهري';
            }elseif($system->type == 2){
                $system->typeName = 'ربع سنوي';

            }elseif($system->type == 3){
                $system->typeName = 'نصف سنوي';

            }elseif($system->type == 4){
                $system->typeName = 'سنوي';

            }
            
        }
        return view('admin.student.create',['systems'=>$systems,'gymnastics'=>Gymnastic::all()]);
    }


    public function store(StoreStudentRequest $request)
    {
        
        $student = Student::where(['identification'=>$request->identification])->first();
        if($student){
            Session::flash('error', "المشترك موجود بالفعل");
            return Redirect::back();
        }else{
            try {
                $system = System::find($request->system_id);
                switch ($system->type) {
                    case '1':
                        $expire = date('Y-m-d', strtotime('+30 days'));
                        break;
                    case '2':
                        $expire = date('Y-m-d', strtotime('+90 days'));
                        break;
                    case '3':
                        $expire = date('Y-m-d', strtotime('+180 days'));
                        break;
                    case '4':
                        $expire = date('Y-m-d', strtotime('+360 days'));
                        break;
                    default:
                        $expire = date('Y-m-d', strtotime('+30 days'));
                        break;
                }
                $student = Student::create([
                    "system_id"=>$request->system_id,
                    "gymnastic_id"=>$request->gymnastic_id,
                    "image"=>"students/defualt.jpg",
                    "uid"  => $request->uid,
                    "name" => $request->name,
                    "age" => $request->age,
                    "identification" => $request->identification,
                    "expire" => $expire,
                    "gender" => $request->gender,
                    "mobile" => $request->mobile,
                    "point" => $system->quantity,
                    "adress" => $request->adress,
                    "parentNam" => $request->parentNam,
                    "parentNum" => $request->parentNum,
                    "user_id" => Auth::user()->id,
                ]);

                Session::flash('success', "تم أضافه مشترك جديد بنجاح");
                return Redirect::route('student.index');

            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                Session::flash('error', $errorInfo);
                return Redirect::back();            
            }


        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $system = System::find($student->system_id);
        $totalPoint = $system->quantity;
        $curentPoint = $student->point;
        $d1 = new DateTime(date('Y-m-d', strtotime($student->created_at)));
        $d2 = new DateTime(date('Y-m-d', strtotime($student->expire)));
        $total = $d1->diff($d2);
        if(date('Y-m-d',strtotime($student->expire)) > date('Y-m-d')){
            $dc1 = new DateTime(Carbon::now());
            $dc2 = new DateTime(date('Y-m-d', strtotime($student->expire)));
            $curent = $dc1->diff($dc2); 
        }else{
            $curent =(object)['days'=>0];

        }
        // return [$curent->days];
        return view('admin.student.profile',['student'=> $student,'curent'=>$curent,'total'=>$total,'totalPoint'=>$totalPoint,'curentPoint'=>$curentPoint]);

   
    }
    public function uploadImg(Request $request,$id){
        $Student = Student::find($id);
        if($Student){
            if($Student->image != 'students/defualt.jpg'){
                Storage::disk('public')->delete($Student->image);

            }
            $extension = $request->file('img')->extension();
            $path = $request->file('img')->storeAs('students',time().'.'.$extension,'public');
            $Student->image = $path;
            $Student->save();

            Session::flash('success', "تم تحديث بيانات المشترك بنجاح");

            return Redirect::route('student.show',$id);  
        }
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

        return view('admin.student.edit',['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->age = $request->age;
        $student->identification = $request->identification;
        $student->gender = $request->gender;
        $student->mobile = $request->mobile;
        $student->point = $request->point;
        $student->adress = $request->adress;
        $student->parentNam = $request->parentNam;
        $student->parentNum = $request->parentNum;
        $student->save();
        Session::flash('success', "تم تحديث بيانات المشترك بنجاح");

        return Redirect::route('student.index');      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function renewalCreate(Student $student)
    {
        $systems = System::where('active',true)->get();
        
        return view('admin.student.createRenew',['systems'=>$systems,'student'=>$student,'gymnastics'=>Gymnastic::all()]);          
    }
       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function renewalStore(Request $request, Student $student)
    {
        $system = System::find($request->system_id);
        switch ($system->type) {
            case '1':
                $expire = date('Y-m-d', strtotime('+30 days'));
                break;
            case '2':
                $expire = date('Y-m-d', strtotime('+90 days'));
                break;
            case '3':
                $expire = date('Y-m-d', strtotime('+180 days'));
                break;
            case '4':
                $expire = date('Y-m-d', strtotime('+360 days'));
                break;
            default:
                $expire = date('Y-m-d', strtotime('+30 days'));
                break;
        }
        $student->system_id = $request->system_id;
        $student->gymnastic_id = $request->gymnastic_id;
        $student->point = $system->quantity;
        $student->created_at = date('Y-m-d');
        $student->expire = $expire;

        $student->save();
        Session::flash('success', "تم تجديد الاشتراك بنجاح");

        return Redirect::route('student.show',$student->id);      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Session::flash('success', "تم حذف المشترك بنجاح");
        return Redirect::route('student.index');
    }
}
