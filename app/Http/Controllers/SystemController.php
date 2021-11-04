<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSystemRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SystemController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:انظمة-الاشتراك', ['only' => ['index']]);
         $this->middleware('permission:تعديل-نظام-الاشتراك', ['only' => ['edit','update']]);
         $this->middleware('permission:تشغيل-نظام-الاشتراك', ['only' => ['active']]);
    }
    public function index()
    {
        $systems = System::all();
        
        foreach($systems as $system){
            if($system->type == 1){
                $system->type = 'شهري';
            }elseif($system->type == 2){
                $system->type = 'ربع سنوي';

            }elseif($system->type == 3){
                $system->type = 'نصف سنوي';

            }elseif($system->type == 4){
                $system->type = 'سنوي';

            }
            
        }
        return view('admin.system.index',['systems'=>$systems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.system.create');
        abort(404);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemRequest $request)
    {
            // $system = System::where(['type'=>$request->type])->first();
            // if($system){
            //     Session::flash('error', "this system is already exist");
            //     return Redirect::back();
            // }else{

            // $system = System::create([
            //     'type'     => $request->type,
            //     'price'    => $request->price,
            //     'quantity' => $request->quantity,
            //     'active'   => false,

            // ]);
       
            // Session::flash('success', "created system successfuly");

            // return Redirect::route('system.index');
            // }
    
            abort(404);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        return view('admin.system.edit',['system' => $system]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system)
    {

        $system->price = $request->price;
        $system->quantity = $request->quantity;
        $system->save();
        Session::flash('success', "تم تحديث نظام الاشتراك بنجاح");

        return Redirect::route('system.index');    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function active(System $system)
    {

        $system->active =! $system->active;
        $system->save();
        $system->active?
        Session::flash('success', "تم تفعيل نظام الاشتراك بنجاح"):
        Session::flash('success', "تم ايقاف نظام الاشتراك بنجاح");
        

        return Redirect::route('system.index');    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        abort(404);

        // $system->delete();
        // return Redirect::route('system.index');

        
    }
}
