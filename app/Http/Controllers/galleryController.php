<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index(){
        return view('frontend.gallery');
    }
    public function genarelcharge(){
        return view('frontend.charge.genarel');
    }
    public function bookcharge(){
        return view('frontend.charge.book');
    }
    public function expresscharge(){
        return view('frontend.charge.express');
    }
    public function pickdrop(){
        return view('frontend.charge.picktodrop');
    }
    public function pointcharge(){
        return view('frontend.charge.point');
    }
    public function  chargecheck($id){
        $x = 130;
        if($id == 1){
            $charge = $x;
        }
        elseif ($id > 1) {
            $charge = ($id - 1) * 20 + $x;
        }
       
    
       
        return response()->json(['kay'=> $charge]);
    }
   
}
//////this is pricing page