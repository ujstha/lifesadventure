//checking password validation
function valid() {
	if(document.chngpwd.password.value!= document.chngpwd.confirmpassword.value) {
		alert("Password does not match....");
		document.chngpwd.confirmpassword.focus();
		
		return false;
	}
	return true;
}
//checking password validation

//checking availability
function checkemail() {
	var emailAdd=document.getElementById( "email" ).value;
	
 	if(emailAdd) {
  		$.ajax({
	  		type: 'post',
	  		url: 'checkavailability.php',
	  		data: {
	   			user_email:emailAdd,
	  		},
	  		success: function (response) {
	   			$( '#availability' ).html(response);
	   			
	   			if(response=="Email is available for registration.") {
	   				return true;	
	   			} else {
	    			return false;	
	   			}
	  		}
  		});
	} else {
  		$( '#availability' ).html("");
  		return false;
 	}
}
//checking availability