<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Requests\SignUpRequest;
use App\User;
use Validator;
use Illuminate\Support\MessageBag;

class loginController extends Controller
{
	
    //
	public function getLogin(){
		return view('login');
	}
	    public function postLogin(Request $request) {
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:3'
    	];
    	$messages = [
    		'email.required' => 'Chưa nhập email',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Chưa nhập mật khẩu',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 3 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			// return redirect()->intended('/chatroom')->with('user', Auth::user());
                 return Redirect::intended('chatroom');


                // return View('chatroom', ['user'=>Auth::user()]);
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
	public function postLogin2(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'required | e-mail',
			'password' => 'required',
			// 'fullname' => 'required',
			// 'repeatedpassword' =>'required | same:password'
			// 'address' => 'required',
		],
		[
			// 'fullname.required'=>"Chưa nhập fullname",
			'email.required'=>'Chưa nhập email',
			'email.e_mail'=>'Email sai định dạng',
			// 'email.unique'=>'Email đã tồn tại',
			// 'email.e_mail'=>'Định dạng email không đúng',
			'password.required'=>'Chưa nhập password',
			// 'repeatedpassword.required'=>'Chưa nhập repeated password',
			// 'repeatedpassword.same'=>'Password nhập lại không đúng'
		]
	);


		if ($validator->passes()) {
			// $email = $request->input('email');
   //  		$password = $request->input('password');
			$email = $request->email;
    		$password = $request->password;
    		// echo $email;

    		if( Auth::attempt(['email' => $email, 'password'=>$password])) {
    			// return response()->json(['success'=>'Đăng ký thành công.']);
    			// return redirect()->intended('chatroom');
    			 return View('signup');
    			  // return Redirect::to('signup');
    			 // return redirect()->intended('signup');
    		} else {
    			return response()->json(['error'=>"thông tin tài khoản không chính xác"]);
    		}
			return response()->json(['success'=>'Đăng ký thành công.']);
		}else


		return response()->json(['error'=>$validator->errors()]);
	}
}
