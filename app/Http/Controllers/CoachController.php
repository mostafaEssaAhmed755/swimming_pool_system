<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCoachRequest;
use App\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
   function __construct()
    {
         $this->middleware('permission:كل-المدربين', ['only' => ['index']]);
         $this->middleware('permission:اضافة-متدرب', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل-متدرب', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف-متدرب', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        return view('admin.coach.index',['coachs'=>Coach::all()]);
    }

   
    public function create()
    {
        return view('admin.coach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoachRequest $request)
    {
        $coach = Coach::create([
            "name" => $request->name,
            "identification" => $request->identification,
            "mobile" => $request->mobile,
            "adress" => $request->adress?$request->adress:null,
            "user_id" => Auth::user()->id,
        ]);

        Session::flash('success', "تم أضافه مدرب جديد بنجاح");
        return Redirect::route('coach.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        return view('admin.coach.edit',['coach'=>$coach]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        $coach->name = $request->name;
        $coach->identification = $request->identification;
        $coach->mobile = $request->mobile;
        $coach->adress = $request->adress;

        $coach->save();
        Session::flash('success', "تم تحديث بيانات المدرب بنجاح");

        return Redirect::route('coach.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();
        Session::flash('success', "تم حذف المدرب  بنجاح");
        return Redirect::route('coach.index');
    }
}
