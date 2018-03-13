function get_data() {



	var flag = false;
	var ourRequest = new XMLHttpRequest();
	ourRequest.open("GET", "/js/jsonResult.json");
	////////////////////////
	

	//console.log(ourRequest.responseText);



	////////////////////////
	var data = {
		email: document.getElementById("email").value,
		password: document.getElementById("password").value,
		repeatedpassword: document.getElementById("repeatedpassword").value,
		fullname: document.getElementById("fullname").value,
		address: document.getElementById("address").value
	};
	console.log(data);
	
	console.log(json_send);

	//lắng nghe thay đổi status của ourRequest
	ourRequest.onreadystatechange = function () {
		if (ourRequest.readyState === 4 && ourRequest.status === 200) {
			var json_string = JSON.parse(ourRequest.responseText);

			if (json_string.result === 0) {

				var msg_email = document.getElementById("msg_email");
				if (msg_email !== null)
					msg_email.innerHTML = json_string.error.msg_email;
				
				var msg_password = document.getElementById("msg_password");
				if (msg_password !== null)
					msg_password.innerHTML = json_string.error.msg_password;
				
				var msg_repeatedpassword = document.getElementById("msg_repeatedpassword");
				if (msg_repeatedpassword !== null)
					msg_repeatedpassword.innerHTML = json_string.error.msg_repeatedpassword;

			} else {
				flag = true;
				var t = confirm("Đăng kí thành công");
				if (t === true)
					location = "https://www.facebook.com/";
			}
		}
	};
	ourRequest.send(json_send);
	var json_send = JSON.stringify(data);
		alert(ourRequest.status);

		
	return flag;
}

function testJS(){
	console.log("test ajax");
	var req = new XMLHttpRequest();
req.open("GET", "/js/jsonResult.json", false);
req.send(null);
alert(eq.status);
console.log(req.status);
console.log(req.responseText);
return true;
}

// function loadDoc() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (xhttp.readyState == 4 && xhttp.status == 200) {
//       document.getElementById("demo").innerHTML = xhttp.responseText;
//     }
//   };
//   xhttp.open("GET", "ajax_info.txt", true);
//   xhttp.send();
// }

// function testJS(){
// 	$.getJSON("jsonResult.json", function(json) {
//     console.log(json); // this will show the info it in firebug console
// });
// }
