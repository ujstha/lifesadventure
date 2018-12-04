<!-- ADD/REGISTER PAGES -->
<?php
	$imgMsg = '';
	$imgMsgClass = '';

	if(isset($_POST["register"])) {
		$cn=makeconnection();
		$i = 0;
		$target_dir = "uploads/";
		//img
		$target_file = $target_dir.basename($_FILES["ppic"]["name"]);
		$uploadok = 1;
		$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		//check if image file is a actual image or fake image
		$check=getimagesize($_FILES["ppic"]["tmp_name"]);
		if($check!==false) {
			$uploadok = 1;
		} else {
			$imgMsg = "File is not an image.";
			$imgMsgClass = 'alert-danger';
			$uploadok=0;
		}
		//check if file already exists
		if(file_exists($target_file)){
			$uploadok=1;
		}
		//check file size
		if($_FILES["ppic"]["size"]>500000){
			$uploadok=1;
		}
		//allow certain file formats
		if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
			$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
			$imgMsgClass = 'alert-danger';
			$uploadok=0;
		} else {
			if(move_uploaded_file($_FILES["ppic"]["tmp_name"], $target_file)){
				$i = 1; 
			} else {
				$imgMsg = "Sorry, there was an error uploading your file.";
				$imgMsgClass = 'alert-danger';
			}
		}
		if ($i > 0) {
			$s="INSERT INTO customer (`first_name`, `last_name`, `email_address`, `gender`, `age`, `country`, `password` , `decrypt_pass`, `profile_pic`) VALUES ('" . $_POST["fname"] . "', '" . $_POST["lname"] . "', '" . $_POST["email"] . "', '" . $_POST["gender"] . "', '" . $_POST["age"] . "', '" . $_POST["country"] . "', '" . md5($_POST["confirmpassword"]) . "', '" . $_POST["password"] . "', '" . basename($_FILES["ppic"]["name"]) . "')";
			//md5 is hashing the password.
			if (mysqli_query($cn,$s)) {
				$imgMsg = 'Thank you, You\'re now signed up with email " '. $_POST["email"] .'"';
				$imgMsgClass = 'alert-success';
			} else {
			 	$imgMsg = 'Oops, There was a problem signing up...';
				$imgMsgClass = 'alert-danger';
				
			}		
			mysqli_close($cn);
		}
	}
?>
<!-- /ADD/REGISTER PAGES -->
<style type="text/css">
	.modal, .modal-dialog {
		z-index: 99999999 !important;
	}
	label.d-flex {
		justify-content: flex-end;
	}
	@media only screen and (max-width: 768px) {
		label.d-flex {
			justify-content: flex-start;
		}
	}
</style>

<!-- REGISTER PAGE -->
<div class="modal fade text-dark" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<form name="chngpwd" method="post" onSubmit="return valid();" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	    	<div class="modal-content">
	      		<div class="modal-header pt-2 pb-2">
	        		<h5 class="modal-title" id="exampleModalLongTitle">REGISTER</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Full Name : </label> 
						<div class="col-sm-4">
							<input type="text" name="fname" required placeholder="First Name" class="form-control" id="fname" maxlength="20"/>
						</div>
						<div class="col-sm-4">
							<input type="text" name="lname" required placeholder="Last Name" class="form-control" id="lname" maxlength="20"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Email : </label>		
						<div class="col-sm-8">							
							<input type="email" name="email" required placeholder="someone@example.com" class="form-control" id="email" onkeyup="checkemail();"/>
						</div>
					</div>
					<span id="availability" class="d-flex justify-content-end"></span>
				
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Gender : </label> 
						<div class="col-sm-8">
							<div class="d-flex">
								<div class="custom-radio">
								  	<input type="radio" id="male" value="Male" name="gender" required="">
								  	<label for="male">Male &nbsp;&nbsp;</label>
								</div>
								<div class="custom-radio">
								  	<input type="radio" id="female" value="Female" name="gender" required="">
								  	<label for="female">Female &nbsp;&nbsp;</label>
								</div>
							</div>
						</div>						
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Age : </label>
						<div class="col-sm-8">
							<input type="number" min="1" max="120" name="age" required placeholder="Enter your age" class="form-control" id="age"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Country : </label> 
						<div class="col-sm-8">
							<select name="country" class="form-control">
								<option value="Nepal">Nepal</option>
								<option value="Finland">Finland</option>
								<option value="Ireland">Ireland</option>
								<option value="Netherlands">Netherlands</option>
								<option value="China">China</option>
								<option value="Norway">Norway</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Password : </label> 
						<div class="col-sm-8">
							<input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required title="Minimum eight characters, at least one uppercase letter, one lowercase letter and one number" placeholder="Type Password" class="form-control" id="password"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Confirm Password : </label> 
						<div class="col-sm-8">
							<input type="password" name="confirmpassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required title="Minimum eight characters, at least one uppercase letter, one lowercase letter and one number" placeholder="Please confirm your password" class="form-control" id="confirmpassword"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Upload Pic : </label>  
						<div class="col-sm-8 d-flex justify-content-start">
							<input type="file" name="ppic" required="" id="ppic" />
						</div>
					</div>
	      		</div> 
				<div class="d-flex justify-content-center">
		        	<button type="submit" style="text-transform: uppercase;" name="register" class="btn dorne-btn w-80" id="register">Register</button>
				</div>
				<div class="d-flex justify-content-center mb-2 mt-3">
					Already have an account? &nbsp; <a href="#" data-target="#signinModal" data-toggle="modal" data-dismiss="modal">Sign In</a>
				</div>
	  		</div>
  		</form>
	</div>
</div>    
<!-- /REGISTER PAGE -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#register').click(function(){
			var image_name = $('#ppic').val();
			if (image_name == '') {
				alert('Please Select Image');
				return false;
			} else {
				var extension = $('#ppic').val().split('.').pop().toLowerCase();
				if (jQuery.inArray(extension, ['gif', 'jpg', 'png', 'jpeg']) == -1) {
					alert('Invalid Image File');
					$('#ppic').val('');
					return false;
				}
			}
		});
	});
</script>
<script type="text/javascript" src="js/availability.js"></script>