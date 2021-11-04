<?php

namespace App\Http\Controllers;

use App\Trainingsession;
use App\Preparingsession;
use App\Coach;
use Illuminate\Http\Request;

class TrainingsessionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:كل-الجلسات', ['only' => ['index']]);
         $this->middleware('permission:حذف-جلسة', ['only' => ['destroy']]);
    }
    public function index()
    {
        $trainingsessions = Trainingsession::all();
        $preparingsessions = Preparingsession::all();
        $coaches = Coach::all();
        return view('admin.trainingsession.index',['trainingsessions'=>$trainingsessions,'preparingsessions'=>$preparingsessions,'coaches'=>$coaches]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Trainingsession $trainingsession)
    {
        //
    }


    public function edit(Trainingsession $trainingsession)
    {
        //
    }


    public function update(Request $request, Trainingsession $trainingsession)
    {
        //
    }


    public function destroy(Trainingsession $trainingsession)
    {
        if($trainingsession->created_at == date('Y-m-d')){

        
            $trainingdate = Trainingdate::find($trainingsession->trainingdate_id);
            $curentTime = date('H:i');

            // get curent date time if == trainingdate make status true else false
            if(date('H:i',strtotime($trainingdate->to)) > $curentTime){
                $trainingdate->status = true;
                $trainingdate->save();
            }elseif(date('H:i',strtotime($trainingdate->to)) < $curentTime){
                $trainingdate->status = 3;
                $trainingdate->save();
            }
        }
        $trainingsession->delete();
        Session::flash('success', "تم حذف تحضير الجلسه بنجاح");
        return Redirect::route('trainingsession.index');
    }
}
