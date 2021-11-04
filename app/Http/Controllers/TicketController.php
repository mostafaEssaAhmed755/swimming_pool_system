<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create([
            "uid"=>$request->uid,
            "status"=>true,
        ]);
        $this->destroy();
        if($ticket){
            return response()->json([
                'msg'=>'تم قطع تذكره بنجاح',
                'status'=>true,
            ]);
        }else{
            return response()->json([
                'msg'=>'حدث خطأ من فضلك اعد المحاوله',
                'status'=>false,
            ]);
        }
   
    }
    public function checkifExists(Request $request){
        $this->destroy();
        if(Ticket::where('uid','=',$request->uid)->where('status','=',true)->exists()){
            $ticket = Ticket::where('uid','=',$request->uid)->first();
            $ticket->status = false;
            $ticket->save();
            Session::flash('success', "تم تسجيل دخول الزائر بنجاح");
            return Redirect::route('home');
        }else{
            Session::flash('error', "هذه التذكره لم تعد صالحه");
            return Redirect::route('home');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
  
        $tickets = Ticket::whereRaw('Date(created_at) < CURDATE()')->get();
            foreach($tickets as $item){
                $item->delete();
    
            }
    }
}
