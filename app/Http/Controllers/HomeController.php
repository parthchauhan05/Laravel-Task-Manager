<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $groups = Group::all()->where('user_id', Auth::user()->id);
        return view('home', ['groups'=>$groups]);
    }
}
