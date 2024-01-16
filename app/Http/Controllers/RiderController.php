<?php

namespace App\Http\Controllers;

use App\Models\ParcelInfo;
use App\Models\Pickup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Rider;
use App\Models\Traking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiderController extends Controller
{
  
    public function loginview()
    {
       return view('rider.login');
    }

    public function loginaction(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('rider')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            Session::flash('success', 'Successfully Logged in');
            return view('rider.home');
        }
        else{
            Session::flash('error', 'Invalid Email Or Password');
            return redirect()->back();
        }
    }
    public function rhome(){
        return view('rider.home');
    }

    public function allriqu()
    {
        $rid = Auth::guard('rider')->user()->id;
        $date = date('Y-m-d');
        $all = Pickup::where('status', $rid)->where('date', $date)->get();
        return view('rider.allriquest', compact('all'));
    }

   
    public function pickdone($id)
    { 
        $rid = Auth::guard('rider')->user()->id;
        $date = date('Y-m-d');
        $uid = $id;
        $status = Pickup::where('date', $date)->where('user_id', $uid)->first();
        $status->status = 'Done';
        $status->rider = $rid;
        $status->save();
        Session::flash('success', 'Pick Up Done Successfully');
        return redirect()->back();
        
    }

    
    public function allassignshow()
    {
        $rid = Auth::guard('rider')->user()->id;
        $parcel = ParcelInfo::where('status', 'rider_assign')->where('delivery_rider', $rid)->get();
        return view('rider.deliveryassigned', compact('parcel'));
    }

    
    public function deliverydone($id)
    {
        $branch = Auth::guard('rider')->user()->branch;
        $parcel = ParcelInfo::find($id);
        $parcel->status = 'delivared';
        $parcel->cod_status = 'approval_pending';
        $parcel->delivared_branch = $branch;
        $parcel->save();
        $rname = Auth::guard('rider')->user()->name;
        $contact = Auth::guard('rider')->user()->contact;
       

        $user_id = $parcel->user_id;
        $track = new Traking();
        $track->user_id = $user_id;
        $track->parcel_id = $id;
        $track->description = "Parcel Delivery Done By Rider ".$rname." Contact ".$contact;
        $track->creat_by = 'Rider '.$rname;
        $track->status = 'Delivared';
        $track->save(); 
        Session::flash('success', 'Delivery Done');
        return redirect('allassignshow');  
    }

    public function info()
    {
        $id = Auth::guard('rider')->user()->id;
        $infos = Rider::where('id', $id)->first();
        return view('rider.parsonalinfo', compact('infos'));
    }
    public function deliverydetails(){
        $id = Auth::guard('rider')->user()->id;
        $alldetails = ParcelInfo::where('status', 'delivared')->where('delivery_rider', $id)->get();
        return view('rider.deliverydetails', compact('alldetails'));
    }
    public function riderlogout(){
        Auth::guard('rider')->logout();
        return redirect('rider');
    }
}
