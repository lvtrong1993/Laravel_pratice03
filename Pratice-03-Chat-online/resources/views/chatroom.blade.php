<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup form</title>
</head>
<link  rel="stylesheet" href="{{ asset('css/practice01.css') }}">
<link rel="stylesheet" href="practice01.css">
<script src="{{ asset('js/practice01.js') }}"> </script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"> </script>

<body>


<h2>Chat room</h2>


</body>

</html> -->

<!DOCTYPE html>
<html  ng-app = "mainApp" ng-controller="indexCtrl" >
<head>
  <meta charset="UTF-8">
  <title>Chat room</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <link rel="stylesheet" href="{{asset('css/mirror.min.css')}}">
  <link rel="stylesheet" href=" {{asset('css/mirror-theme-default.css')}} ">
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>


</head>
<body  style="background-image:url({{asset('img/bg2.jpg')}}">







  <div id="main-frame" class="mirror-app-container" >
    <div class="mirror mirror-container" id="chat-frame">
      <div class="mirror-messages-container" id="chat-container">





  


     <!--    
        <div class="mirror-message" id="msg_2">
          <div class="bot mirror-message-content text">
            <span>Hello World from human!</span> 
          </div>
        </div> -->
        @foreach ($data['messages'] as $msg)
        @if($msg->user_id != $data['user']->id)
        <div class="mirror-message" id="msg_2"> 
          <div class="bot mirror-message-content text">
            <span>
              {{ $msg->content }} 
            </span>
          </div>
        </div>
        @else 
        <div class="mirror-message" id="msg_1"> 
          <div class="mirror-message-content text">
            <span>
              {{ $msg->content }} 
            </span>
          </div>
        </div>  
        @endif 
        @endforeach   



   <!--      <div class="mirror-message" id="msg_3">
          <div class="mirror-message-content text">
            <span>Delayed Hello World</span> 
          </div>
        </div> -->
      <!--   <div class="mirror-message"  id="msg_4">
          <div class="bot mirror-message-content text">
            <span>Hello bot, I am Quang Vu, what your name ? How are you to day ?Ha ha ha . . . . </span> 
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <div class="footer_frame">
    <center>
      <form action="{{url('chatroom')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="userId" value="{{$data['user']->id}}">
        <input type="input" id="bot-listen-status" name="msgContent">
        <button type="submit">Send</button>
      </form>
    </center>
  </div>



</body>

</html>



