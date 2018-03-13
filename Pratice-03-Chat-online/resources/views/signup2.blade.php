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
  <h2>Signup form 02</h2>

  <div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
  </div>
  <form action="" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <strong>Email</strong>   <span id="msg_email" class="resetText">  </span><br>

    <input placeholder="Enter email" id="email" class="input" name="email" ><br>

    <strong>Password</strong> <span id="msg_password" class="resetText">  </span><br>

    <input type="password" placeholder="Enter Password"  id="password" class="input" name="password"> <br>

    <strong>Repeate password</strong> <span id="msg_repeatedpassword" class="resetText"> </span> <br>

    <input type="password" placeholder="Repeate Password"  id="repeatedpassword" class="input" name="repeatedpassword"> <br>

    <strong>Fullname</strong> <span id="msg_fullname" class="resetText">   </span><br>

    <input type="text" placeholder="Fullname" id="fullname" class="input"  name="fullname"> <br>

    <strong>Address(option)</strong> <br>

    <input type="text"  placeholder="Address" class="input" id="address" name="address"> <br>


    <p>By creating an account you agree to our <a href="">Terms & Privacy</a></p><br>   

    <input type="reset" value="Cancel" class="cancel" >

    <input id="btnSignUp" type="button" value="Sign up" class="signup" >
    <!-- onClick="return get_data()" -->
    <!-- <button class="btn btn-success btn-submit signup">Submit</button> -->

    
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
        url: "/signup2",
        type:'POST',
        data: {_token:_token, email:email, password:password, fullname:fullname, address:address, repeatedpassword:repeatedpassword},
        success: function(data) {

          if($.isEmptyObject(data.error)){
            $(".resetText").empty();
            $('.input').val('');
            alert(data.success);

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
         if(msg["repeatedpassword"] != undefined){
          $("#msg_repeatedpassword").append(msg["repeatedpassword"]);
        }
         if(msg["fullname"] != undefined){
          $("#msg_fullname").append(msg["fullname"]);
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
