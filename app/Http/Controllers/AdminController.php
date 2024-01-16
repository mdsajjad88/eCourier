<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Traking;
use App\Models\User;
use App\Models\Pickup;
use Illuminate\Support\Facades\Hash;
use PhpParser\Lexer\TokenEmulator\ReadonlyFunctionTokenEmulator;
use App\Models\Manager;
use App\Models\Marchent;
use App\Models\ParcelInfo;
use App\Models\Rider;
use DateTime;
use Illuminate\Support\Carbon;
class AdminController extends Controller
{
    public function adminlogin(){
        return view('admin.ad_login');
    }
    public function  admincreate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            Session::flash('success', 'Successfully Logged in');
            return redirect('adminpanel');
        }
        else{
            Session::flash('error', 'Invalid Email Or Password');
            return redirect()->back();
        }
    }
    public function adminpanel(){
       $time = new DateTime();
       $mytime = $time->format('Y-m-d H:i:s');
       $marchent = Marchent::where('status', 'pending')->get();
       $counting= $marchent->count();
       
        return view('admin.home', compact('counting'));
    }
    public function adminlogout(){
        auth()->guard('admin')->logout();
        return redirect('admin');
    }
    public function showmanager(){
        $branches = Branch::all();
        return view('admin.branchmanager', compact('branches'));
    }
    public function addmanager(Request $request){
        $request->validate([
            'branch_name'=>'required|unique:managers',
            'manager_name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'contact'=>'required|unique:managers',
            'email'=>'required|email|unique:managers',
            'nid'=>'required|unique:managers',
            'address'=>'required',
            'birthday'=>'required',
           
            'password'=>'required',
        ]);

        $manager = new Manager();
        $manager->branch_name = $request->branch_name;
        $manager->manager_name = $request->manager_name;
        $manager->father_name = $request->father_name;
        $manager->mother_name = $request->mother_name;
        $manager->contact = $request->contact;
        $manager->email = $request->email;
        $manager->nid = $request->nid;
        $manager->address = $request->address;
        $manager->birthday = $request->birthday;
 
        $manager->password = Hash::make($request->password);
        $manager->save();
        Session::flash('success', 'Manager Added Successfully');
        return redirect()->back();
    }
    public function newbranch(){
        return view('admin.addbranch');
    }
    public function addbranch(Request $request){
        $request->validate([
            'bname'=>'required|unique:branches',
            'district'=>'required',
            'upozilla'=>'required',
            'address'=>'required',
            'contact'=>'required|unique:branches|max:12',
        ]);
        $branch = new Branch();
        $branch->bname = $request->bname;
        $branch->district = $request->district;
        $branch->upozilla = $request->upozilla;
        $branch->address = $request->address;
        $branch->contact = $request->contact;
        $branch->save();
        Session::flash('success', 'Branch Added Successfully');
        return redirect()->back();
        
        
    }
    public function showmodaretor(){
        return view('admin.addModerator');
    }
    public function addmodaretor(Request $request){
       $request->validate([
        'moderator_name'=>'required',
        'father_name'=>'required',
        'mother_name'=>'required',
        'contact'=>'required',
        'email'=>'required|unique:moderators',
        'nid'=>'required',
        'address'=>'required',
        'birthday'=>'required',
        'password'=>'required',
       ]);
    }
    public function approval(){
        $apnding = ParcelInfo::where('cod_status', 'approval_pending')->paginate(4);
        return view('admin.approvetk', compact('apnding'));
    }
    public function balanceadded(Request $request){
        $request->validate([
            'cod'=>'required',
            'weight'=>'required',
            'paid_cod'=>'required',
            'delivery_charge'=>'required',
            'cod_oneparcent'=>'required',
        ]);
        $id = $request->parcel_id;
        $addbalance = ParcelInfo::find($id);
        $addbalance->cod_status = 'added_account';
        $addbalance->cod = $request->cod;
        $addbalance->weight = $request->weight;
        $addbalance->paid_cod = $request->paid_cod;
        $addbalance->delivery_charge = $request->delivery_charge;
        $addbalance->cod_oneparcent = $request->cod_oneparcent;
        $addbalance->save();
  
        $user_id = $addbalance->user_id;
        $pid = $addbalance->id;

        $track = new Traking();
        $track->user_id = $user_id;
        $track->parcel_id = $pid;
        $track->description = "Parcel Cod Added Marchent Account. Account added Balance is ".$request->paid_cod.' and Delivery charge is '.$request->delivery_charge.' and COD 1 % is '.$request->cod_oneparcent;
        $track->creat_by = 'Added By Admin';
        $track->status = 'Balance Added';
        $track->save(); 
        $marchent = Marchent::where('user_id', $user_id)->first();
        $marchent->current_balance = $marchent->current_balance + $request->paid_cod;
        $marchent->save();
        Session::flash('success', 'Balance Added Marchent Account');
        return redirect()->back();  
    }
    public function profitdetails(){
        $alldetails = ParcelInfo::where('status', 'delivared')->where('cod_status', 'added_account')->orwhere('cod_status', 'payment_request')->orwhere('cod_status', 'paid')->get();
        $codcharge = ParcelInfo::where('status', 'delivared')->where('cod_status', 'added_account')->orwhere('cod_status', 'payment_request')->orwhere('cod_status', 'paid')->sum('cod_oneparcent');
        $delivery = ParcelInfo::where('status', 'delivared')->where('cod_status', 'added_account')->orwhere('cod_status', 'payment_request')->orwhere('cod_status', 'paid')->sum('delivery_charge');
        return view('admin.profit', compact('alldetails', 'codcharge', 'delivery'));
    }
    public function  allparcel(){
        $allparcel = ParcelInfo::paginate(5);
        return view('admin.allparcel', compact('allparcel'));
    }
    public function allmanager(){
        $managers = Manager::paginate(4);
        $count = $managers->count();
        return view('admin.allmanager', compact('managers', 'count'));
    }
    public function allrider(){
        $rider = Rider::paginate(6);
        $countt = $rider->count();
        return view('admin.allrider', compact('rider', 'countt'));
    }
    public function marchentcheck(){
        return view('admin.marchentcheck');
    }
   
    public function mcheck($id){
        $marchent = Marchent::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        $ucount = $user->count();
        if($ucount > 0){

      
        $result = '<table class="table table-striped">
            
                <tr>
                <th>Marchent ID</th>
                <td> '.$id.'</td>
                </tr>
                <tr>
                <th>Marchent Name</th>
                <td> '.$user->name.'</td>
                </tr>
                <tr>
                <th>E-mail Address</th>
                <td>'.$user->email.'</td>
                </tr>
                <tr>
                <th> Contact NO</th>
                <td> '.$marchent->primary_num.'</td>
                </tr>
                <tr>
                <th> Local Address</th>
                <td> '.$marchent->local_address.'</td>
                </tr>
                <tr>
                <th> Upozilla</th>
                <td> '.$marchent->upozilla.'</td>
                </tr>
                <tr>
                     
                       
                       
                      
                      
                        <th> District</th>
                        <td> '.$marchent->district.'</td>
                      
                </tr>
                <tr>        
                <th> Division</th>
                        <td> '.$marchent->division.'</td>
                       
                </tr>
            
                </table>' ;
                return response()->json(['right'=>$result]);
            }
            else{
                $result = "This ID's Marchent Not Available";
                return response()->json(['right'=>$result]);
            }
       
    }
    public function pendingByAdmin(){
        $pendings = ParcelInfo::where('status', 'pending')->orwhere('status', 'Approved')->orwhere('status', 'received')->orwhere('status', 'sending')->paginate(5);
        return view('admin.pendingparcel', compact('pendings'));
    }
    public function alldelivery(){
        $delivered = ParcelInfo::where('status', 'delivared')->paginate(3);
        return view('admin.alldelivery', compact('delivered'));
    }
}
