<?php

namespace App\Http\Controllers;

use App\Gymnastic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGymnasticRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GymnasticController extends Controller
{
  
    function __construct()
    {
         $this->middleware('permission:كل-التمارين', ['only' => ['index']]);
         $this->middleware('permission:اضافة-تمرين', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل-تمرين', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف-تمرين', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.gymnastic.index',['gymnastics'=>Gymnastic::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gymnastic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGymnasticRequest $request)
    {
        $gymnastic = Gymnastic::create([

            "name" => $request->name,
            "user_id" => Auth::user()->id,

        ]);
        Session::flash('success', "تم أضافه تمرين جديد بنجاح");
        return Redirect::route('gymnastic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gymnastic  $gymnastic
     * @return \Illuminate\Http\Response
     */
    public function show(Gymnastic $gymnastic)
    {
        return view('admin.gymnastic.profile',['gymnastic'=>$gymnastic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gymnastic  $gymnastic
     * @return \Illuminate\Http\Response
     */
    public function edit(Gymnastic $gymnastic)
    {
        return view('admin.gymnastic.edit',['gymnastic' => $gymnastic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gymnastic  $gymnastic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gymnastic $gymnastic)
    {
        $gymnastic->name = $request->name;

        $gymnastic->save();
        Session::flash('success', "تم تحديث بيانات التمرين  بنجاح");

        return Redirect::route('gymnastic.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gymnastic  $gymnastic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gymnastic $gymnastic)
    {
        $gymnastic->delete();
        Session::flash('success', "تم حذف التمرين بنجاح");
        return Redirect::route('gymnastic.index');
    }
}
