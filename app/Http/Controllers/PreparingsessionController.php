<?php

namespace App\Http\Controllers;

use App\Preparingsession;
use App\Coach;
use App\Gymnastic;
use App\Trainingsession;
use App\Trainingdate;
use App\Student;
use App\preparingsessionStudent;


use App\Http\Requests\StorePreparingsessionRequest;
use App\Http\Requests\StorePreparingsessionStudentRequest;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PreparingsessionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:تحضير-جلسة', ['only' => ['create','store']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coachs = Coach::all();
          $gymnastics = Gymnastic::select('gymnastics.id as gymnastic_id','gymnastics.name as gymnastic_name')
          ->join('trainingdates','trainingdates.gymnastic_id','=','gymnastics.id')
          ->where('trainingdates.date','=',getIdDay(date('D')))
          ->distinct()
          ->get();
        // $trainingdates = Trainingdate::where('gymnastic_id','=',1)
        // ->where('date','=',getIdDay(date('D')))
        // ->get();
        // return $trainingdates;
        return view('admin.preparingsession.create',['coachs'=>$coachs,'gymnastics'=>$gymnastics]);
    }
    public function getTraningDates($id)
    {
   
        $trainingdates = Trainingdate::where('gymnastic_id','=',$id)
        ->where('date','=',getIdDay(date('D')))
        ->where('status','=',1)
        ->get();

        return response()->json($trainingdates);;
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreparingsessionRequest $request)
    {
        $preparingsession = Preparingsession::where('coach_id','=',$request->coach_id)
        ->where('gymnastic_id','=',$request->gymnastic_id)
        ->where('trainingdate_id','=',$request->trainingdate_id)
        ->whereDate('created_at', '=', Carbon::today()->toDateString())
        ->get();
        $trainingsession = Trainingsession::where('coach_id','=',$request->coach_id)
        ->where('gymnastic_id','=',$request->gymnastic_id)
        ->where('trainingdate_id','=',$request->trainingdate_id)
        ->whereDate('created_at', '=', Carbon::today()->toDateString())
        ->get();
        if ($preparingsession->isEmpty() && $trainingsession->isEmpty()) {
            if($preparingsession = Preparingsession::create([
                'coach_id' => $request->coach_id,
                'gymnastic_id' => $request->gymnastic_id,
                'trainingdate_id' => $request->trainingdate_id,]))
            {
                $trainingdate = Trainingdate::find($request->trainingdate_id);
                $trainingdate->status = false;
                $trainingdate->save();

            }

            

            Session::flash('success', "تم تحضير الجلسه بنجاح");
            return Redirect::route('trainingsession.index');
        }else{
            Session::flash('error', "هذه الجلسه موجوده بالفعل");
            return Redirect::route('preparingsession.create');
        }
      
    }


    public function createStudent($preparingsession){
        $preparingsession = Preparingsession::find($preparingsession);
        return view('admin.preparingsession.createStudent',['preparingsession'=>$preparingsession]);
    }


    public function storeStudent(StorePreparingsessionStudentRequest $request,$preparingsession){
        $preparingsession = Preparingsession::find($preparingsession);
        // check if preparingsession exist
        if($preparingsession == null){
            Session::flash('error', "تحضير الجلسه غير موجود");
            return Redirect::route('trainingsession.index');
        }

        $student = Student::where('uid','=',$request->uid)->first();
        // check if student exist
        if($student == null){
            Session::flash('error', "هذا المتدرب غير موجود");
            return Redirect::route('preparingsession.createStudent',$preparingsession->id);
        }
        // check if student subscrip to this gymnastic
        if($student->gymnastic_id != $preparingsession->gymnastic_id){
            Session::flash('error', "هذا المتدرب غير مشترك بهذه التمرينه");
            return Redirect::route('preparingsession.createStudent',$preparingsession->id);
        }
        // check if repeat recorde
        $studentexist = $preparingsession->students()->find($student);

        if($studentexist != null){
            Session::flash('error', " هذا المتدرب موجود بالفعل داخل تحضير الجلسه");
            return Redirect::route('preparingsession.createStudent',$preparingsession->id);
        }
        // check if he have enough point and not expire
        if($student->point == 0){
            Session::flash('error', " هذا المتدرب ليس لديه حصص اخري , يمكنك تجديد اشتراكه من <a href=".route('student.renewalCreate',$student->id).">هنا</a>");
            return Redirect::route('preparingsession.createStudent',$preparingsession->id);
        }
        if(date('Y-m-d',strtotime($student->expire)) <= date('Y-m-d')){
            Session::flash('error', " هذا المتدرب انتهت فتره اشتراكه , يمكنك تجديد اشتراكه من <a href=".route('student.renewalCreate',$student->id).">هنا</a>");
            return Redirect::route('preparingsession.createStudent',$preparingsession->id);
        }
        // return dd($preparingsession->students->sync($student));
        $preparingsession->students()->attach($student);
        $student->point--;
        $student->save();
        Session::flash('success', "تم تحضير متدرب بالجلسه بنجاح");
        return Redirect::route('preparingsession.show',$preparingsession->id);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Preparingsession  $preparingsession
     * @return \Illuminate\Http\Response
     */
    public function show(Preparingsession $preparingsession)
    {
      
        return view('admin.preparingsession.profile',['preparingsession'=>$preparingsession]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preparingsession  $preparingsession
     * @return \Illuminate\Http\Response
     */
    public function edit(Preparingsession $preparingsession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preparingsession  $preparingsession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preparingsession $preparingsession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preparingsession  $preparingsession
     * @return \Illuminate\Http\Response
     */
    public function destroyStudent(Request $request,$preparingsession){
        $student = Student::find($request->student_id);
        $preparingsession = Preparingsession::find($preparingsession);
        $preparingsession->students()->detach($student);
        $student->point++;
        $student->save();
        Session::flash('success', "تم ازاله المتدرب من الجلسه  بنجاح");
        return Redirect::route('preparingsession.show',$preparingsession->id);
    }
    public function destroy(Preparingsession $preparingsession)
    {

        $trainingdate = Trainingdate::find($preparingsession->trainingdate_id);
        $curentTime = date('H:i');

        // get curent date time if == trainingdate make status true else false
        if(date('H:i',strtotime($trainingdate->from)) > $curentTime){
            $trainingdate->status = true;
            $trainingdate->save();
        }
        $preparingsession->delete();
        Session::flash('success', "تم حذف تحضير الجلسه بنجاح");
        return Redirect::route('trainingsession.index');
    }
}
