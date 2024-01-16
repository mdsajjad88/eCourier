<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\ParcelInfo;
use App\Models\Traking;
class serviceController extends Controller
{
    public function index(){
        return view('frontend.service');
    }
    public function tracking(){
        
        return view('frontend.tracking.trackresult');
    }
    public function  trackcheck(Request $request){
        $request->validate([
            'parcel_id'=>'required',
        ]);
        $parcelid = $request->parcel_id;
        $tracking = Traking::where('parcel_id', $parcelid)->get();
        $count = $tracking->count();
        if($count > 0){
            return view('frontend.tracking.trackingdetails', compact('tracking'));
        }
       else{
        Session::flash('error', 'we do not have and never had any parcel of this ID.');
        return view('frontend.tracking.trackresult');
       }
    }
    
}
