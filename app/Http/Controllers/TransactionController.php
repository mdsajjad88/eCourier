<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Marchent;
use App\Models\ParcelInfo;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class TransactionController extends Controller
{
    public function  payriqu(){
        $uid = Auth::user()->id;
        $currentbalence = Marchent::where('user_id', $uid)->first();
        $balance = $currentbalence->current_balance;
        return view('marchent.payrequview', compact('balance'));
    }
    public function sendpaymentrequ(Request $request){
        $request->validate([
            'current_balance'=>'required',
            'pay_method'=>'required',
            'account_name'=>'required',
            'account_no'=>'required',
            
        ]);
        if($request->current_balance < 1){
            Session::flash('error', 'Balance not Available');
            return redirect()->back();    
        }
        else{

       
        $user = Auth::user();
        $uid = Auth::user()->id;
        $tnxid = Str::random(8);
      
        $parcel = ParcelInfo::where('user_id', $uid)->where('status', 'delivared')->where('cod_status', 'added_account')->get();
        foreach($parcel as $myparcel){
            $myparcel->cod_status = 'payment_request';
            $myparcel->transaction = $tnxid;
            $myparcel->save();
        }
      

        $transaction = new Transaction();
        $transaction->user_id = $uid;
        $transaction->current_balance = $request->current_balance;
        $transaction->pay_method = $request->pay_method;
        $transaction->account_name = $request->account_name;
        $transaction->account_no = $request->account_no;
        $transaction->tnx_id = $tnxid;
        $transaction->save();
        $marchent = Marchent::where('user_id', $uid)->first();
        $marchent->current_balance = "0";
        $marchent->save();
        Mail::raw("Your Transaction ID is $tnxid", function ($message) use ($user) {
            $message->to($user->email)->subject("Transaction ID");
        });
       Session::flash('success', 'Payment Request Send Successfully');
       return redirect()->back();
    }
    }
    public function showpayriqu(){
        $allrequ = Transaction::where('status', 'pending')->get();
        return view('admin.showpayriqu', compact('allrequ'));
    }
    public function paidpayriqu($tnxid){
        $transaction = Transaction::where('tnx_id', $tnxid)->first();
        $transaction->status = 'paid';
        $transaction->save();

        $parcelin = ParcelInfo::where('transaction', $tnxid)->get();
        foreach($parcelin as $pinfo){
            $pinfo->cod_status = 'paid';
            $pinfo->save();
        }
        Session::flash('success', 'Payment Request Paid Successfully');
        return redirect()->back();
    }
    public function  tnxdetails($tnx){
        $parcelinfo = ParcelInfo::where('transaction', $tnx)->get();
        $cod = ParcelInfo::where('transaction', $tnx)->sum('cod');
        $paid_cod = ParcelInfo::where('transaction', $tnx)->sum('paid_cod');
        $delivery_charge = ParcelInfo::where('transaction', $tnx)->sum('delivery_charge');
        $cod_one = ParcelInfo::where('transaction', $tnx)->sum('cod_oneparcent');
        return view('marchent.tnxdetails', compact('parcelinfo', 'cod','paid_cod', 'delivery_charge', 'cod_one'));
    }
}
