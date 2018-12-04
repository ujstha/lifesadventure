<?php 
	$msg = '';
	$msgClass = '';
	if (isset($_POST["retrieve"])) {
		$cn = makeconnection();
		$s = "SELECT * FROM customer WHERE email_address='" . $_POST["reemail"] . "'";
		$q = mysqli_query($cn, $s);
		if (!empty($_POST["reemail"]) && mysqli_fetch_assoc($q) > 0 && !filter_var($_POST["reemail"],FILTER_VALIDATE_EMAIL==FALSE)) {
			$_SESSION["details"] = $_POST["reemail"];
			echo "<script type='text/javascript'> document.location = 'user-details.php'; </script>";
 		}

 		if (empty($_POST["reemail"])) {
 			$msg = 'Please, type in your email.';
 			$msgClass = 'alert-danger';
 		} elseif (!filter_var($_POST["reemail"], FILTER_VALIDATE_EMAIL == TRUE)) {
 			$msg = 'Invalid email. Please enter a valid email address.';
 			$msgClass = 'alert-danger';
 		} elseif (mysqli_fetch_assoc($q) < 1) {
 			$msg = 'Email doesnot exist.';
 			$msgClass = 'alert-danger';
 		}
	}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="modal fade text-dark" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header pt-2 pb-2">
	        		<h5 class="modal-title" id="exampleModalLongTitle">RECOVER PASSWORD</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Email : </label>
						<div class="col-sm-8">
							<input type="email" name="reemail" required placeholder="Enter your email address" class="form-control" id="reemail"/>
						</div>									
					</div>
	      		</div> 
				<div class="d-flex justify-content-center mb-2">
		        	<button type="submit" style="text-transform: uppercase;" name="retrieve" class="btn dorne-btn w-80" id="retrieve">Retrieve Password</button>
				</div>
				<div class="d-flex justify-content-center mb-2 mt-2">
					Remember the password? <a href="" data-target="#signinModal" data-toggle="modal" data-dismiss="modal">Sign In</a>
				</div>
	  		</div>
		</div>
	</div>
</form>
