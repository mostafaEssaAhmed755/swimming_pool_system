<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:كل-الوظائف', ['only' => ['index']]);
         $this->middleware('permission:اضافة-وظيفة', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل-وظيفة', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف-وظيفة', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('admin.job.index',['jobs'=>Job::all()]);
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create([

            "name" => $request->name,
            "user_id" => Auth::user()->id,

        ]);
        Session::flash('success', "تم أضافه وظيفه جديده بنجاح");
        return Redirect::route('job.index');
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.job.edit',['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $job->name = $request->name;

        $job->save();
        Session::flash('success', "تم تحديث بيانات الوظيفه بنجاح");

        return Redirect::route('job.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        Session::flash('success', "تم حذف الوظيفه بنجاح");
        return Redirect::route('job.index');
    }
}
