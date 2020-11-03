<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Redirect,Response;

class LisenceKeyGenerate extends Controller
{
    	public function index(){
			return view('lisencekey.keyform');	
		}


        public function getData(Request $request){
			    // get records from database	   
                  $Customer = User::where('id',$request->input('id'))->first();
                  return response()->json($Customer);
		}


        public function update(Request $request){

         // return response()->json($request);

            $LisenceKey = User::find($request->clientid);
            $LisenceKey->expire_date =$request->expire_date;
            $LisenceKey->license_key =$request->lisencekey;
            $LisenceKey->save();

            // return view('lisencekey.lisence_key_warning');
            //return view('lisencekey.lisence_key_warning')->with('expire_date', 'expire_date');

            return redirect('/lisence/key/info')->with('expire_date', $request->expire_date);
          //  return redirect('/lisence/key/info')->with('expire_date',$request->expire_date);
            

        }

        public function keyinfo(){
            return view('lisencekey.lisence_key_warning'); 
        }

}
