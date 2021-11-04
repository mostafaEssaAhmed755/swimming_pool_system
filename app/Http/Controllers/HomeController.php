<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Student;
use App\Gymnastic;
use App\Coach;


class HomeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:لوحة-التحكم', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = Ticket::whereRaw('Date(created_at) = CURDATE()')->count();
        return view('admin.index',['tickets'=>$tickets,'students'=>Student::all(),'gymnastics'=>Gymnastic::all(),'coachs'=>Coach::all()]);
    }
}
