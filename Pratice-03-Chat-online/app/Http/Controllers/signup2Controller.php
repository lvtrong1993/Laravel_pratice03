<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Requests\SignUpRequest;
use App\User;
use Validator;

class signup2Controller extends Controller
{
    //
	public function getSignUp(){
		return view('signup2');
	}
	public function postSignUp(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'required | e-mail | unique:users',
			'password' => 'required',
			'fullname' => 'required',
			'repeatedpassword' =>'required | same:password'
			// 'address' => 'required',
		],
		[
			'fullname.required'=>"Chưa nhập fullname",
			'email.required'=>'Chưa nhập email',
			'email.e_mail'=>'Email sai định dạng',
			'email.unique'=>'Email đã tồn tại',
			'email.e_mail'=>'Định dạng email không đúng',
			'password.required'=>'Chưa nhập password',
			'repeatedpassword.required'=>'Chưa nhập repeated password',
			'repeatedpassword.same'=>'Password nhập lại không đúng'
		]
	);


		if ($validator->passes()) {
			// bcrypt("123")
			$pw = bcrypt($request->password);
			// $pw = Hash::make($request->password);
			//echo $pw;
			$user = new User();
			$user->name = $request->fullname;
			$user->email= $request->email;
			$user->password=$pw;
			$user->address = $request->address;

			$user->save();
			
			return response()->json(['success'=>'Đăng ký thành công1']);
		}else


		return response()->json(['error'=>$validator->errors()]);
	}
}
