<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class AdminController extends Controller
{
	public function change_profile(){
    	$change_profile = User::findOrfail(2);
    	return view('change_profile',compact('change_profile'));
    }

    public function update_profile(Request $request){
    	$this->validate($request, [
    		'name'=>'required',
    		'email'=>'required|email',
    		'curr_password'=>'required',
    		'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
    	]);


    	   $data = $request->all();
		    $user = User::find(auth()->user()->id);
		    if(!Hash::check($data['curr_password'], $user->password)){
		         return back()->with('error','The specified password does not match the database password');
		    }else{
		       $request->user()->fill(['name'=>$request->name,'email'=>$request->email,'password' => Hash::make($request->password)])->save();
		    }

           return redirect()->back()->with('success','profile updated');  
    }
    
}
