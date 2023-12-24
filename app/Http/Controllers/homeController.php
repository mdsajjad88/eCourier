<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
}
