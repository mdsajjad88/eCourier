<?php

namespace App\Http\Controllers;
use App\Models\ParcelInfo;
use App\Models\Marchent;
use App\Models\Traking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\AddBalance;
use Illuminate\Http\Request;

class AddBalanceController extends Controller
{
    public function addBalance(){
        return view('marchent.addBalance');
    }
    public function BalanceAdd(Request $request){
        $user = auth()->user()->id;
        $marchent = Marchent::where('user_id', $user)->first();


        $parcel = new ParcelInfo();
        $parcel->user_id = $user;
        $parcel->category = "add_payment";
        $parcel->type = "add_payment";
        $parcel->contact = $marchent->primary_num;
        $parcel->name = "add_payment";
        $parcel->address = $marchent->local_address;
        $parcel->district = $marchent->district;
        $parcel->policestation = $marchent->upozilla;
        $parcel->cod = $request->amount;
        $parcel->user_district = $marchent->district;
        $parcel->entry_by = "marchent";
        $parcel->status = 'delivared';
        $parcel->cod_status = 'added_account';
        $parcel->delivery_rider = 14;
        $parcel->paid_cod = $request->amount;
        $parcel->delivery_charge = 0; 
        $parcel->cod_oneparcent = 0; 
        $parcel->save();


        $tnxid = Str::random(8);
       
        $districta = Marchent::where('user_id', $user)->first();
        $district = $districta->district;
       $payment = new AddBalance();
       $payment->user_id = $user;
       $payment->tnx_code = $tnxid;
       $payment->our_account = $request->our_account;
       $payment->pay_method = $request->pay_method;
       $payment->pay_account = $request->pay_account;
       $payment->pay_date = $request->pay_date;
       $payment->pay_tnx = $request->pay_tnx;
       $payment->amount = $request->amount;
       $payment->pay_status = "pending";         
       $payment->parcel_id = $parcel->id;         
       $payment->save();

       $track = new Traking();
       $track->user_id =  $user;
       $track->parcel_id = $parcel->id;
       $track->description = "Send A Add Balance Request.Payment request is pending.";
       $track->creat_by = 'Send by Marchent';
       $track->status = 'added_account';
       $track->save(); 

    

          Session::flash('success', 'Add Balance Request send Successfully.Payment id is '.$parcel->id);
          return redirect()->back(); 


           
       }
   
    public function allAddRequ()
    {
        $allrequ = AddBalance::where('pay_status', 'pending')->get();
        return view('admin.addBalRequ', compact('allrequ'));
    }

    public function addBalApprove($id)
    {
        $balance = AddBalance::where('id', $id)->first();
        $balance->pay_status = "added_account";
        $balance->save();

        $marchent = Marchent::where('user_id', $balance->user_id)->first();
        $marchent->current_balance = $marchent->current_balance + $balance->amount;
        $marchent->save();

        $parcel = ParcelInfo::find($balance->parcel_id);
        $parcel->user_id = $balance->user_id;
        $parcel->category = "add_payment";
        $parcel->type = "add_payment";
        $parcel->contact = $marchent->primary_num;
        $parcel->name = "add_payment";
        $parcel->address = $marchent->local_address;
        $parcel->district = $marchent->district;
        $parcel->policestation = $marchent->upozilla;
        $parcel->cod = $balance->amount;
        $parcel->user_district = $marchent->district;
        $parcel->entry_by = "marchent";
        $parcel->status = 'delivared';
        $parcel->cod_status = 'added_account';
        $parcel->delivery_rider = 14;
        $parcel->paid_cod = $balance->amount; 
        $parcel->delivery_charge = 0; 
        $parcel->cod_oneparcent = 0; 
        $parcel->save();

        $track = new Traking();
          $track->user_id =  $balance->user_id;
          $track->parcel_id = $parcel->id;
          $track->description = "This payment is added marchent account";
          $track->creat_by = 'Approve By Admin';
          $track->status = 'added_account';
          $track->save(); 

       
        Session::flash('success', 'Balance Successfully');
        return redirect()->back(); 
    }

    
    public function addBalDetails()
    {
        $user = auth()->user()->id;
        $allbalances = AddBalance::where('user_id', $user)->get();
        return view('marchent.addBalDetails', compact('allbalances'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddBalance  $addBalance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddBalance $addBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddBalance  $addBalance
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddBalance $addBalance)
    {
        //
    }
}
