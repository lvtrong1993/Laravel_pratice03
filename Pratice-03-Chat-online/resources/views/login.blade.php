<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Signup form</title>
</head>
<link  rel="stylesheet" href="{{ asset('css/practice01.css') }}">
<!-- <link rel="stylesheet" href="practice01.css"> -->
<script src="{{ asset('js/practice01.js') }}"> </script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"> </script>

<body>
  <h2>Login</h2>
  <div class="alert alert-danger print-error-msg" style="display:none">
   
  </div>
<!--   <form action="{{url('login')}}" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <strong>Email</strong>   <span id="msg_email" class="resetText"> 
      
    </span><br>

    <input placeholder="Enter email" id="email" class="input" name="email" ><br>

    <strong>Password</strong> <span id="msg_password" class="resetText"> 
    
    </span><br>

    <input type="password" placeholder="Enter Password"  id="password" class="input" name="password"> <br>

  


    <p>By creating an account you agree to our <a href="">Terms & Privacy</a></p><br>   

    <input type="reset" value="Cancel" class="cancel" >

    <input id="btnSignUp" type="submit" value="Sign up" class="signup" >
 

    
  </form> -->



        <form action="{{url('login')}}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if($errors->has('errorlogin'))
            <div style="font-size: 20px; color: red;">
              
              {{$errors->first('errorlogin')}}
            </div>
          @endif
          <div class="form-group">
            <strong for="">Email</strong>
            <span id="msg_email" class="resetText"> 
              @if($errors->has('email'))
                {{$errors->first('email')}}
              @endif
            </span><br>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
            
          </div>
          <div class="form-group">
            <strong>Password</strong>
             <span id="msg_password" class="resetText"> 
                @if($errors->has('password'))
                  {{$errors->first('password')}}
                @endif
            </span><br>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            
          </div>
        
          
          <!-- {!! csrf_field() !!} -->
          <input type="reset" value="Cancel" class="cancel" >
          <button type="submit" class=" signup">Đăng nhập</button>
        </form>


  <script type="text/javascript">
    // $(document).ready(function(){
    //   $("#btnSignUp1").click(function(){
    //     alert("The paragraph was clicked.");
    //   });

    // });

    $(document).ready(function() {
      $("#btnSignUp").click(function(e){
       // alert("btn clickedfd")
       // e.preventDefault();

       // ;

       var _token = $("input[name='_token']").val();
       var email = $("input[name='email']").val();
       var password = $("input[name='password']").val();
       var fullname = $("input[name='fullname']").val();
       var address = $("input[name='address']").val();
       var repeatedpassword =$("input[name='repeatedpassword']").val();


       $.ajax({
        url: "/login",
        type:'POST',
        data: {_token:_token, email:email, password:password, fullname:fullname, address:address, repeatedpassword:repeatedpassword},
        success: function(data) {

          if($.isEmptyObject(data.error)){
            $(".resetText").empty();
            $('.input').val('');
             console.log(data.success);

          }else{
            printErrorMsg(data.error);
          }
        }
      });


     }); 


      function printErrorMsg (msg) {
        if(msg["email"] != undefined){
          $("#msg_email").append(msg["email"]);
        }
         if(msg["password"] != undefined){
          $("#msg_password").append(msg["password"]);
        }
         


        //  console.log(msg['email123']);
        // $(".print-error-msg").find("ul").html('');
        // $(".print-error-msg").css('display','block');
        // $.each( msg, function( key, value ) {
        //   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        // });
      }
    });
  </script>


</body>






</html>
