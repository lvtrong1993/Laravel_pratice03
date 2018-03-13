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
<h2>Signup form 1</h2>
<form action= "" method="post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
        <strong>Email</strong>   <span id="msg_email"> @if(count ($errors) > 0)    {{$errors->first('email')}}     @endif  </span><br>
        
        <input placeholder="Enter email" id="email" class="input" name="email" ><br>
        
        <strong>Password</strong> <span id="msg_password"> @if(count ($errors) > 0)    {{$errors->first('txtPassword')}}     @endif    </span><br>
        
        <input type="password" placeholder="Enter Password"  id="password" class="input" name="txtPassword"> <br>
        
        <strong>Repeate password</strong> <span id="msg_repeatedpassword"> @if(count ($errors) > 0)    {{$errors->first('txtRepeatedPassword')}}     @endif   </span> <br>
        
        <input type="password" placeholder="Repeate Password"  id="repeatedpassword" class="input" name="txtRepeatedPassword"> <br>
        
        <strong>Fullname</strong> <span id="msg_fullname"> @if(count ($errors) > 0)    {{$errors->first('txtFullName')}}     @endif   </span><br>
        
        <input type="text" placeholder="Fullname" id="fullname" class="input"  name="txtFullName"> <br>
        
        <strong>Address(option)</strong> <br>
        
        <input type="text"  placeholder="Address" class="input" id="address" name="txtAddress"> <br>
        
        
        <p>By creating an account you agree to our <a href="">Terms & Privacy</a></p><br>   
        
        <input type="reset" value="Cancel" class="cancel" >
        
        <input type="submit" value="Sign up" class="signup" >
        <!-- onClick="return get_data()" -->
        
    
</form>

</body>
<script>
  var msgS = '{{Session::get('msg')}}';
  var exist = '{{Session::has('msg')}}';
  if(exist){
    alert(msgS);
  }


// $(document).ready(function(){
//     alert("hello js");
// })
    $.ajax({
          url: "check_dang_nhap.php",
          method: "POST",
          data: { username : username, password : password },
          success : function(response){
            if (response == "1") {
                ok.html("Đăng nhập thành công");
            }else{
                error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
            }
          }
        });
</script>
</html>
