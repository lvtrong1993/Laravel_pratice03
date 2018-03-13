<?php
use Illuminate\Support\Facades\Redirect;
namespace App\Http\Controllers;
use App\Message;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Events\RedisEvent;

class ChatRoomController extends Controller
{
    //
    public function __construct(){
    	
    }
    public function getChatRoom(){

    	//check user login
    	if(Auth::check()){
    		$user = Auth::user();
    		$userId = $user->id;
    		echo $user->id;


    		$messages = Message::all();

    		$data  = array('user' => $user,  'messages'=>$messages);
    		// return view('chatroom', compact('messages'));
    		return view('chatroom', compact('data'));
      }else{
        return redirect()->intended('/login');
    }

}
// public function postChatRoom(){
//   echo "This is postChatRoom method";
// }

public function sendMessage(Request $request){
    // $flight = App\Flight::create(['name' => 'Flight 10']);
    $message =Message::create(['user_id' => $request->userId, 'content'=>$request->msgContent]);
    event(
        $e = new RedisEvent($message)
    );   
    return redirect()->back();  
    // print($request);
}   
}
