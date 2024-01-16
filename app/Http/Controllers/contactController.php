<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
class contactController extends Controller
{
    public function index(){
        $branch = Branch::all();
        return view('frontend.contact', compact('branch'));
    }
    
    public function newget(Request $request){
        $output = $request->branch;
        $search = Branch::where('bname', 'LIKE', '%'.$output.'%')->orwhere('district', 'LIKE', '%'.$output.'%')->get();
        foreach($search as $key => $retu){
            $result = '<div class="col-3 " >
			<div class="card bg-dark text-light m-2" style="min-height: 250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="card-body">
					<h5 class="card-title text-light">Branch Name: '.$retu->bname .'</h5>
					<h6 class="card-subtitle mb-2 ">District: '.$retu->district .'</h6>
					<p class="card-text">Upozilla:'.$retu->upozilla .'</p>
					<p class="card-text">Address:'.$retu->address .'</p>
					<p class="card-text">Contact:'.$retu->contact .'</p>
					
				</div>
			</div>
		</div>';
        }
       
        
        return response()->json(['new'=>$result]);
    }

}
