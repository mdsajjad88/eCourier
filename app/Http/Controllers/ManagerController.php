<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Pickup;
use App\Models\Rider;
use App\Models\User;
use App\Models\ParcelInfo;
use App\Models\Traking;
use App\Models\Marchent;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnValueMap;

class ManagerController extends Controller
{
   public function managerlogin(){
    return view('manager.login');
   }
   public function  manageraction(Request $request){
    $request->validate([
        'email'=>'required',
        'password'=>'required',
    ]);
    if(Auth::guard('manager')->attempt(['email'=>$request->email, 'password'=>$request->password])){
        Session::flash('success', 'Successfully Logged in');
        return redirect('managerpanel');
    }
    else{
        Session::flash('error', 'Invalid Email Or Password');
        return redirect()->back();
    }
   }
   public function managerpanel(){
    $time = new DateTime();
    $mytime = $time->format('Y-m-d');
    $branch = Auth::guard('manager')->user()->branch_name;
    $pickup = Pickup::where('district', $branch)->where('date', $mytime)->where('status', 'pending')->get();
    $pick = $pickup->count();
    return view('manager.managerhome', compact('pick'));
   }
   public function managerlogout(){   
        auth()->guard('manager')->logout();
        return redirect('manager');  
   }
   public function viewpickriqu(){
    $time = new DateTime();
    $mytime = $time->format('Y-m-d');
    $branch = Auth::guard('manager')->user()->branch_name;
    $pickup = Pickup::where('district', $branch)->where('date', $mytime)->where('status', 'pending')->get();
    return view('manager.viewpickriqu', compact('pickup'));
   }
   public function pickupdelete($id){
    $del = Pickup::find($id);
    $del->delete();
    Session::flash('success', 'Successfully Deleted');
        return redirect()->back();
   }
   public function  addrider(){
    return view('manager.adrider');
   }
   public function  addparceltom() {
    return view('manager.addparcel');
   }
   public function  createrider(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'contact'=>'required',
        'password'=>'required',
    ]);
    $rider = new Rider();
    $rider->name = $request->name;
    $rider->email = $request->email;
    $rider->password =  Hash::make($request->password);
    $rider->branch = $request->branch;
    $rider->contact = $request->contact;
    $rider->save();
    Session::flash('success', 'Rider Created Successfully');
        return redirect()->back();
   }
   public function riderassign($id){
    
    return view('manager.riderassign', compact('id'));
   }
   public function assignaction(Request $request){
    $request->validate([
        'riderid'=>'required',
    ]);
    $mydate = new DateTime();
    $date = $mydate->format("Y-m-d");
     $user = $request->userid;
    $rider = $request->riderid;
     $checkrider = Rider::where('id', $rider)->first();
    $checkuser = Pickup::where('user_id', $user)->where('date', $date)->first();
    $checkuser->status = $checkrider->id;
    $checkuser->save();
    Session::flash('success', 'Rider Assign Successfully');
    return redirect()->back();
   }
   public function manageraddparcel(Request $request){
    $request->validate([
        'user_id'=>'required',
        'category'=>'required',
        'type'=>'required',
        'contact'=>'required',
        'name'=>'required',
        'address'=>'required',
        'district'=>'required',
        'policestation'=>'required',
        'cod'=>'required',
        
        'weight'=>'required',
        
       
       
    ]);
    $parcent = floor( ($request->cod)/100);
    $x = 130;
    $weight = $request->weight;
    if($weight == 1){
        $dcharge = $x;
    }
    elseif($weight > 1){
        $dcharge =  ($weight - 1) * 20 + $x;
    }

    $userid = $request->user_id;
    $userdis = Marchent::where('user_id', $userid)->first();
    $dis = $userdis->district;

    $parcel = new ParcelInfo();  
    $parcel->user_id = $request->user_id;
    $parcel->category = $request->category;
    $parcel->type = $request->type;
    $parcel->contact = $request->contact;
    $parcel->name = $request->name;
    $parcel->address = $request->address;
    $parcel->district = $request->district;
    $parcel->policestation = $request->policestation;
    $parcel->cod = $request->cod;
    $parcel->cod_oneparcent = $parcent;
    $parcel->note = $request->note;
    $parcel->weight = $request->weight;
    $parcel->delivery_charge = $dcharge;
    $parcel->exchenge = $request->exchenge;
    $parcel->user_district = $dis;
    $parcel->entry_by = 'manager';
    $parcel->cod_status = 'pending';
    $parcel->save(); 
    $track = new Traking();
        $track->user_id = $userid;
        $track->parcel_id = $parcel->id;
        $track->description = " Parcel Entry By ";
        $track->creat_by = $dis.' Hub Manager';
        $track->save();       
    Session::flash('success', 'Successfully added Your Parcel');
    return redirect()->back();
   }
   public function allpendingshow(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $allparcel = DB::table('parcel_infos')->where('status', 'pending')->where('user_district', $branch)->paginate(3);
    return view('manager.allpending', compact('allparcel'));
   }

  public function sendparcel(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $allparcel = DB::table('parcel_infos')->where('status', 'Approved')->where('user_district', $branch)->get();
    return view('manager.sendparcel', compact('allparcel'));

  }
  public function upcoming(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $upcoming = DB::table('parcel_infos')->where('status', 'sending')->where('receiving_add', $branch)->get();  
    return view('manager.upcoming', compact('upcoming'));
  }
  public function moneytransfer(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $parcels = ParcelInfo::where('status', 'delivared')->where('cod_status', 'approval_pending')->where('delivared_branch', $branch)->paginate(2);
    $total = ParcelInfo::where('status', 'delivared')->where('cod_status', 'approval_pending')->where('delivared_branch', $branch)->paginate(2)->sum('cod');
    return view('manager.moneytransfer', compact('parcels', 'total'));

  }
  public function pendingmarchent(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $pending = Marchent::where('status', 'pending')->where('district', $branch)->get();
    return view('manager.pendingmarchent', compact('pending'));
  }
  public function mdelete($id){
    $marchent  = Marchent::where('user_id', $id)->first();
    $marchent->delete();
    $user = User::where('id', $id)->first();
    $user->delete();
    Session::flash('success', 'Marchent Deleted Successfully');
    return redirect()->back();
  }
  public function  maccept($id){
    $marchent  = Marchent::where('user_id', $id)->first();
    $marchent->status = 'Marchent';
    $marchent->save();
    Session::flash('success', 'Marchent Accepted Successfully');
    return redirect()->back();
  }
  public function ourdelivery(){
    $branch = Auth::guard('manager')->user()->branch_name;
    $parcels = ParcelInfo::where('delivared_branch', $branch)->get();
    return view('manager.alldeliveryhis', compact('parcels'));
  }
}
