<?php
	$msgl = '';
	$msglClass = '';
	$_SESSION['loginstatus']="";
	if(isset($_POST["signin"])) {
		$cn=makeconnection();
		$s="SELECT * FROM customer WHERE email_address='" . $_POST["e"] . "' AND password='" . md5($_POST["p"]) ."'";
		$q=mysqli_query($cn,$s);
		$r=mysqli_num_rows($q);
		$data=mysqli_fetch_array($q);
		mysqli_close($cn);
		if($r>0) {
			$_SESSION["email_address"] = $_POST["e"];
			$_SESSION['loginstatus']="yes";	
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		} else {
			$msgl = 'Invalid Email Address or Password.';
			$msglClass = 'alert-danger';
		}
	}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="modal fade text-dark" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-md" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header pt-2 pb-2">
	        		<h5 class="modal-title" id="exampleModalLongTitle">SIGN IN</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Email : </label>
						<div class="col-sm-8">
							<input type="email" name="e" required placeholder="Enter your email address" class="form-control" id="e"/>
						</div>									
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label d-flex">Password : </label>
						<div class="col-sm-8">
							<input type="password" name="p" required placeholder="Enter your Password" class="form-control" id="p"/>
						</div>
					</div>
	      		</div>
	      		<div class="d-flex justify-content-center mt-2">
		        	<button type="submit"  style="text-transform: uppercase;" name="signin" class="btn dorne-btn w-80 mb-2" id="signin"><i class="fas fa-sign-in-alt"></i>&nbsp; Sign in</button>
				</div>
	      		<div class="d-flex justify-content-center mb-2 mt-2">
		      		<a href="#" data-target="#forgotModal" data-toggle="modal" data-dismiss="modal">Forgot Password?</a>
		      	</div>
		      	<div class="d-flex justify-content-center mb-2">
		      		Don't have an account? &nbsp;<a href="#" data-target="#registerModal" data-toggle="modal" data-dismiss="modal">Register</a>
		      	</div>
				
	  		</div>
		</div>
	</div>    
</form>

<?php include('forgotpassword.php'); ?>

