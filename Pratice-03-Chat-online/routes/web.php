<?php
use Illuminate\Support\Facades\Auth;;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/signup', function() {
//     return view('signup');
// });

Route::get('/signup', 'signupController@getSignUp')->name('getSignup');
Route::post('/signup', 'signupController@postSignUp')->name('postSignup');
Route::get('newuser', function(){
	// $user = new App\User();
	// $user->name ="trongvirus";
	// $user->email="trong123@gmail.com";
	// // $user->password="cccc";
	// $user->password=Hash::make("123");
	// $user->address ="xx";
	// $user->save();

	// echo "da new user";
// 	$user = App\User::where('email', '=', "trong1@gmail.com")->first();
// if ($user === null) {
//    // user doesn't exist
// 	echo "ko co";
// }else{
// 	echo "co";
// }



// Route::get('login', function()
$pw = bcrypt("123");
if( Auth::attempt(['email' => "trong123@gmail.com", 'password'=>"123"])){
	// echo "success";
	return View('signup');
}else{
	echo "error";
}
});



Route::get('/signup2', 'signup2Controller@getSignUp')->name('getSignup2');
Route::post('/signup2', 'signup2Controller@postSignUp')->name('postSignup2');

//login
Route::get('/login', 'loginController@getlogin')->name('getLogin');
Route::post('/login', 'loginController@postLogin')->name('postLogin');

// chat room
Route::get('/chatroom', 'ChatRoomController@getChatRoom')->name('getChatRoom');
Route::post('/chatroom', 'ChatRoomController@sendMessage')->name('postChatRoom');

