<?php

namespace App\Http\Controllers;
use App\Models\ParcelInfo;
use App\Models\Pickup;
use App\Models\Marchent;
use App\Models\Transaction;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Psy\Readline\Transient;

class marchentController extends Controller
{
    public function addparcel(){
        return view('marchent.addparcel');
    }
   
    public function setprofile(){
        return view('marchent.profile');
    }
    public function pickuprequ(){
        $uid = auth()->user()->id;

        $marchent = Marchent::where('user_id', $uid)->get();
        $count = $marchent->count();
        if($count > 0){
        $time = new DateTime();
        $mytime = $time->format('Y-m-d');
        $user = Auth::user();
        $marchent = Marchent::where('user_id', $user->id)->first();

        $pickup = new Pickup();
        $pickup->user_id = $user->id;
        $pickup->primary_num = $marchent->primary_num;
        $pickup->local_address = $marchent->local_address;
        $pickup->upozilla = $marchent->upozilla;
        $pickup->district = $marchent->district;
        $pickup->division = $marchent->division;
        $pickup->date = $mytime;
        $pickup->save();
        Session::flash('success', 'Pick up Request sended Successfully');
        return redirect()->back();
        }
        else{
            Session::flash('error', 'Please Set Your Profile First and then send pick up request');
            return redirect('setprofile'); 
        }
    }
    public function addnote(){
        return view('marchent.parcelNote');
    }
    public function noteaction(Request $request){
        $request->validate([
            'parcelid'=>'required',
        ]);
        
    }
    public function waitingappr(){
        $user = auth()->user()->id;
        $approvalpercel = ParcelInfo::where('user_id', $user)->where('cod_status', 'approval_pending')->paginate(2);
        return view('marchent.waitingappr', compact('approvalpercel'));
        
    }
    public function balancedetails(){
        $user = auth()->user()->id;
        $balance = ParcelInfo::where('user_id', $user)->where('status', 'delivared')->where('cod_status', 'added_account')->get(); 

        $totalcod = ParcelInfo::where('user_id', $user)->where('status', 'delivared')->where('cod_status', 'added_account')->sum('cod'); 
        $totalpaid = ParcelInfo::where('user_id', $user)->where('status', 'delivared')->where('cod_status', 'added_account')->sum('paid_cod'); 
        $delivery = ParcelInfo::where('user_id', $user)->where('status', 'delivared')->where('cod_status', 'added_account')->sum('delivery_charge'); 
        $profit = ParcelInfo::where('user_id', $user)->where('status', 'delivared')->where('cod_status', 'added_account')->sum('cod_oneparcent'); 
        return view('marchent.balancedetails', compact('balance', 'totalcod', 'totalpaid', 'delivery', 'profit'));
    }
    public function allparceldetails(){
        $user = auth()->user()->id;
        $allparcel = ParcelInfo::where('user_id', $user)->paginate(4);
        return view('marchent.allparceldetails', compact('allparcel'));
    }
    public function transactioninfo(){
        // $user = auth()->user()->id;
        // $txninfo = Transaction::where('user_id', $user)->get();
        return view('marchent.tnxinfo');
    }
    public function pendingtk(){
        $user = auth()->user()->id;
        $balanced = ParcelInfo::where('user_id', $user)->where('cod_status', 'pending')->paginate(3);
        $total = ParcelInfo::where('user_id', $user)->where('cod_status', 'pending')->paginate(3)->sum('cod');

        return view('marchent.pendingtk', compact('balanced', 'total'));
    }
    public function editprofile(){
        $user = auth()->user()->id;
        $marchents = Marchent::where('user_id', $user)->first();
        return view('marchent.editprofile', compact('marchents'));
    }
    public function editproaction(Request $request){
        $request->validate([
            'primary_num'=>'required',
            'local_address'=>'required',
            'upozilla'=>'required',
            'district'=>'required',
            'division'=>'required',
        ]);
        $uid = auth()->user()->id;
        $marchent = Marchent::find($uid);
        $marchent->primary_num = $request->primary_num;
        $marchent->local_address = $request->local_address;
        $marchent->upozilla = $request->upozilla;
        $marchent->district = $request->district;
        $marchent->division = $request->division;
        $marchent->save();
        Session::flash('success', 'Details Updated Successfully');
        return redirect()->back(); 

    }
   
}
