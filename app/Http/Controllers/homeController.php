<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelInfo;

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
        $user = auth()->user()->id;
        $allpercel = ParcelInfo::where('user_id', $user)->count();

        $pendingbalance = ParcelInfo::sum('cod');
        
        return view('home', compact('pendingbalance'));
    }
}
