<?php

namespace App\Http\Controllers;

use App\Models\Mobilebanking;
use App\Models\Bankaccount;
use App\Models\Marchent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class MobilebankingController extends Controller
{
    public function addressadd(Request $request)
    { 
        $user = Auth::user();
        $request->validate([
            'primary_num'=>'required|unique:marchents',
            'local_address'=>'required',
            'upozilla'=>'required',
            'district'=>'required',
            'division'=>'required',
        ]);
        $marchent = new Marchent();
        $marchent->user_id = $user->id;
        $marchent->primary_num = $request->primary_num;
        $marchent->local_address = $request->local_address;
        $marchent->upozilla = $request->upozilla;
        $marchent->district = $request->district;
        $marchent->division = $request->division;
        $marchent->save();
        Session::flash('success', 'Details Added Successfully');
        return redirect()->back(); 

    }
    public function adbkash(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'method'=>'required',
            'account_no'=>'required|unique:mobilebankings',
        ]);
        $addacount = new Mobilebanking();
        $addacount->user_id = $user->id;
        $addacount->method = $request->method;
        $addacount->account_no = $request->account_no;
        $addacount->save();
        Session::flash('success', 'Mobile Account Added Successfully');
        return redirect()->back();
    }

    
    public function adcardno(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'bank_name'=>'required',
            'account_no'=>'required|unique:bankaccounts',
        ]);
        $bank = new Bankaccount();
        $bank->user_id = $user->id;
        $bank->bank_name = $request->bank_name;
        $bank->account_no = $request->account_no;
        $bank->save();
        Session::flash('success', 'Bank Account Added Successfully');
        return redirect()->back();
    }

   
  


    public function show(Mobilebanking $mobilebanking)
    {
        //
    }

   
    public function edit(Mobilebanking $mobilebanking)
    {
        //
    }

  
    public function update(Request $request, Mobilebanking $mobilebanking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobilebanking  $mobilebanking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobilebanking $mobilebanking)
    {
        //
    }
}
