<?php

namespace App\Http\Controllers;

use App\Gymnastic;
use App\Trainingdate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrainingdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TrainingdateController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:اضافة-موعد-تمرين', ['only' => ['create','store']]);
        
    }
    public function index()
    {
        //
    }

    public function create($id)
    {
        return view('admin.trainingdate.create',['id'=>$id]);

    }

    public function store(StoreTrainingdateRequest $request)
    {
        $gymnastic = Trainingdate::create([

            "date" => $request->date,
            "from" => $request->from,
            "to" => $request->to,
            "gymnastic_id" => $request->gymnastic_id,
            "status" => true,


        ]);
        Session::flash('success', "تم أضافه موعد تمرين جديد بنجاح");
        return  back();

    }


    public function show(Trainingdate $trainingdate)
    {
        //
    }

    public function edit(Trainingdate $trainingdate)
    {
        //
    }

    public function update(Request $request, Trainingdate $trainingdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainingdate  $trainingdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainingdate $trainingdate)
    {
        $trainingdate->delete();
        Session::flash('success', "تم حذف موعد التمرين بنجاح");
        return Redirect::back();
    }
}
