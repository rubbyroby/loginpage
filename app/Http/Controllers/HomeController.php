<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $mytime = Carbon::now();
        $month=$mytime->setTimezone('Africa/Casablanca')->format('m');
        $students=count(Student::get());
        $std_new=count(Student::whereMonth('created_at', '=', $month)->get());

        // dd($students);
         return view('dashboard.index');
    }
}
