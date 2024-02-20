<?php

namespace App\Http\Controllers;

use App\Models\Marchent;
use Illuminate\Http\Request;
use App\Models\ParcelInfo;
use App\Models\Rider;
use App\Models\User;
use App\Models\Traking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ParcelController extends Controller
{
    public function addnewparcel(Request $request){
        $request->validate([
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

//oneparcent calculate
$parcent = floor( ($request->cod)/100);
$x = 130;
$weight = $request->weight;
if($weight == 1){
    $dcharge = $x;
}
elseif($weight > 1){
    $dcharge =  ($weight - 1) * 20 + $x;
}

        $userid = Auth::user()->id;
        $marchent = Marchent::where('user_id', $userid)->where('status', 'pending')->get();
        $count = $marchent->count();
        if($count > 0){
            Session::flash('error', 'Sorry, Your Account Status is Pending, please wait some time or contact our hotline numbar');
            return redirect()->back(); 
        }
        $march = Marchent::where('user_id', $userid)->get();
        $countin =$march->count();
        if($countin > 0){
        $userid = Auth::user()->id;
        $userdis = Marchent::where('user_id', $userid)->first();
        $dis = $userdis->district;
        $parcel = new ParcelInfo();
        $parcel->user_id = $userid;
        
        $parcel->category = $request->category;
        $parcel->type = $request->type;
        $parcel->contact = $request->contact;
        $parcel->name = $request->name;
        $parcel->address = $request->address;
        $parcel->district = $request->district;
        $parcel->policestation = $request->policestation;
        $parcel->cod = $request->cod;

        $parcel->note = $request->note;
        $parcel->weight = $request->weight;
        $parcel->delivery_charge = $dcharge;
        $parcel->exchenge = $request->exchenge;
        $parcel->user_district = $dis;
        $parcel->entry_by = 'marchent';
        $parcel->cod_status = 'pending';
        $parcel->cod_oneparcent = $parcent;
        $parcel->save(); 
        $track = new Traking();
        $track->user_id = $userid;
        $track->parcel_id = $parcel->id;
        $track->description = 'Parcel Inserted By Marchent';
        $track->creat_by = 'Marchent';
        $track->save();
        Session::flash('success', 'Successfully added Your Parcel Your Parcel ID is '.$parcel->id);
        return redirect()->back();
    }
        else{
            Session::flash('error', 'Please Add Your Information First and Then Entry Your Parcel');
            return redirect('setprofile'); 
        }
    }

    public function  parceldelete($id){
        $pid = ParcelInfo::find($id);
        $pid->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect()->back();
       }
       
       public function parcelapprove($id){
        $pid = ParcelInfo::find($id);
        $pid->status = 'Approved';
        $pid->save();
        $branch = Auth::guard('manager')->user()->branch_name;
        $manager = Auth::guard('manager')->user()->manager_name;
        $uid = ParcelInfo::where('id', $id)->first();
        $tracking = new Traking();
        $tracking->user_id = $uid->user_id;
        $tracking->parcel_id = $id;
        $tracking->description = "Parcel Approve By Mr. ".$manager;
        $tracking->creat_by = $branch." Hub Manager";
        $tracking->status = "Approved";
        $tracking->save();
        Session::flash('success', 'Parcel Approved');
        return redirect()->back();
    
       }
    public function parcelsend(Request $request){
        $request->validate([
            'bname'=>'required',
        ]);
        $branch = Auth::guard('manager')->user()->branch_name;

        $parcelid = $request->parcel_id;
        $parcel = ParcelInfo::find($parcelid);
        $parcel->status = 'sending';
        $parcel->receiving_add = $request->bname;
        $parcel->save();

        $track = new Traking();
        $track->user_id = $parcel->user_id;
        $track->parcel_id = $parcelid;
        $track->description = "Parcel Was send From ".$branch." To ".$request->bname;
        $track->creat_by = $branch.' Hub Manager ';
        $track->status = 'sending';
        $track->save();       
    Session::flash('success', 'Successfully Send Your Parcel');
    return redirect()->back();
    }
    public function receiving($id){
        $branch = Auth::guard('manager')->user()->branch_name;
        $parcel = ParcelInfo::find($id);
        $parcel->status = 'received';
        $parcel->save();
       
        $track = new Traking();
        $track->user_id = $parcel->user_id;
        $track->parcel_id = $id;
        $track->description = "Parcel Was received";
        $track->creat_by = $branch.' Hub Manager ';
        $track->status = 'received';
        $track->save(); 
        Session::flash('success', 'Received Successfull');
        return redirect()->back();
    }
    public function allreceived(){
        $branch = Auth::guard('manager')->user()->branch_name;
        $received = DB::table('parcel_infos')->where('status', 'received')->where('receiving_add', $branch)->get();    
        return view('manager.received', compact('received'));
    }
    public function sendanother($id){
        $branch = Auth::guard('manager')->user()->branch_name;
       $myparcel = DB::table('parcel_infos')->where('id', $id)->get();
    
       return view('manager.sendanother', compact('myparcel'));
    }
    public function deliveryassign($id){
        $myparcel = DB::table('parcel_infos')->where('id', $id)->get();
    
       return view('manager.deliveryassign', compact('myparcel'));
    }
    public function anotherloca(Request $request){
        $request->validate([
            'parcel_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'bname'=>'required',
        ]);
        $branch = Auth::guard('manager')->user()->branch_name;

        $parcelid = $request->parcel_id;
        $parcel = ParcelInfo::find($parcelid);
        $parcel->status = 'sending';
        $parcel->receiving_add = $request->bname;
        $parcel->save();

        $track = new Traking();
        $track->user_id = $parcel->user_id;
        $track->parcel_id = $parcelid;
        $track->description = "Parcel Was send From ".$branch." To ".$request->bname;
        $track->creat_by = $branch.' Hub Manager ';
        $track->status = 'sending';
        $track->save();       
    Session::flash('success', 'Successfully Send Your Parcel');
    return redirect('allreceived');
     
    }
    public function  deliriderassign(Request $request){
        $request->validate([
            'ridername'=>'required',
        ]);
        $branch = Auth::guard('manager')->user()->branch_name;
        $manager = Auth::guard('manager')->user()->manager_name;

        $riderid = $request->ridername;
        $user_id = $request->user_id;
        $parcel_id = $request->parcel_id;
        $riderInfo = Rider::find($riderid);
        $prcl = ParcelInfo::find($parcel_id); 
        $prcl->status = 'rider_assign';
        $prcl->delivery_rider = $riderid;
        $prcl->save();

        $track = new Traking();
        $track->user_id = $user_id;
        $track->parcel_id = $parcel_id;
        $track->description = "Rider Name ".$riderInfo->name." Contact ".$riderInfo->contact." Rider Assigned by ".$manager;
        $track->creat_by = $branch.' Hub Manager ';
        $track->status = 'Rider Assigned';
        $track->save(); 
        Session::flash('success', 'Rider Assigned Successfully');
        return redirect('allreceived');  
    }
    public function editparcel(){
        return view('manager.editview');
    }
    public function parceledit(Request $request){
        $request->validate([
            'parcel_id'=>'required',
        ]);
        $pidd = $request->parcel_id;
       $parcel = ParcelInfo::where('id', $pidd)->count();
       
        if($parcel == 0){
            Session::flash('error', 'This  Parcel Not Available !!');
            return redirect('editparcel');
        }
        else{
            $parcelsearch = ParcelInfo::where('id', $pidd)->first();
            return view('manager.parceledit', compact('parcelsearch'));
        }
       
    }
    public function newedit(Request $request){
       
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
            'description'=>'required',
            
        ]);
        $branch = Auth::guard('manager')->user()->branch_name;
        
       
        $id = $request->parcel_id;
        $parcel = ParcelInfo::find($id);
        $parcel->user_id = $request->user_id;
        $parcel->category = $request->category;
        $parcel->type = $request->type;
        $parcel->contact = $request->contact;
        $parcel->name = $request->name;
        $parcel->address = $request->address;
        $parcel->district = $request->district;
        $parcel->policestation = $request->policestation;
        $parcel->cod = $request->cod;
        $parcel->note = $request->note;
        $parcel->weight = $request->weight;
        $parcel->exchenge = $request->exchenge;
        $parcel->save(); 
         $uid = $request->user_id;
        $desc =$request->description;
        $track = new Traking();
        $track->user_id = $uid;
        $track->parcel_id = $id;
        $track->description = $desc;
        $track->creat_by = $branch." Hub Manager";
        $track->save();
        Session::flash('success', 'Successfully Updated Parcel Information');
        return redirect('editparcel');
    }
    public function extraedit(Request $request){
       
        $rid = $request->parcel_id;
        $parcel = ParcelInfo::where('id', $rid)->first();
        $parcel->category = $request->category;
        $parcel->type = $request->type;
        $parcel->contact = $request->contact;
        $parcel->name = $request->name;
        $parcel->address = $request->address;
        $parcel->district = $request->district;
        $parcel->policestation = $request->policestation;
        $parcel->cod = $request->cod;
        $parcel->cod_oneparcent = $request->cod_oneparcent;
        $parcel->note = $request->note;
        $parcel->weight = $request->weight;
        $parcel->delivery_charge = $request->delivery_charge;
        $parcel->exchenge = $request->exchenge;
        $parcel->save(); 

        $branch = Auth::guard('manager')->user()->branch_name;
        $desc = $request->desc;
        $track = new Traking();
        $track->user_id = $request->user_id;
        $track->parcel_id = $request->parcel_id;
        $track->description = $desc;
        $track->creat_by = $branch." Hub Manager";
        $track->save();
        Session::flash('success', 'Successfully Updated Parcel Information');
        return redirect('editparcel');
    
    
    }

}
