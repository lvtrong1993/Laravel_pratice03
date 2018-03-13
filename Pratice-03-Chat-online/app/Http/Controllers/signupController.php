<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SignUpRequest;
use App\User;

class signupController extends Controller
{
    //
	public function getSignUp(){
		return view('signup');
	}
	public function postSignUp(SignUpRequest $request){
    	//return view('signup');
		//echo "$request->txtEmail";
		$user = new User();
		$user->name = $request->txtFullName;
		$user->email= $request->email;
		$user->password=$request->txtPassword;
		$user->address = $request->txtAddress;
		$user->save();
		//echo "Ngon";
		return redirect()->back()->with('msg', 'Đăng ký thành công');
	}
}
