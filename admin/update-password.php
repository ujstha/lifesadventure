<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('func/function.php'); ?>
<?php
	if($_SESSION['loginstatus']=="") {

		header("location:admin-login.php");

	} else {
		if(isset($_POST["submitchange"])) {
			$cn=makeconnection();
			$s="update admin set adminpassword='" . $_POST["confirmpassword"] . "' where adminuser='" . $_POST["admin"] . "'";
			mysqli_query($cn,$s);
			mysqli_close($cn);

			header("location:index.php");
		}
	}
?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Admin Password Change</title>

<?php include('inc/header.php'); ?>

<style type="text/css">
	.modal-content {
		background-color: rgba(0,0,0,.2);
		color: white;
		border-color: white;
		border-radius: 0;
	}
</style>
<script type="text/javascript">
	function valid() {
		if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value) {
			alert("New Password and Confirm Password does not match....");
			document.chngpwd.confirmpassword.focus();
			
			return false;
		}
		
		return true;
	}
</script>						
<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
        	<div class="col-12 col-md-10">
			  	<div  id="adminColumn" class="col-lg-6 offset-lg-3 modal-content">
					<div>
						<div class="modal-header d-flex justify-content-center" style="font-size: 20px;">Change Password</div>
						<form name="chngpwd" method="post" onSubmit="return valid();" style="margin-top: 20px; margin-bottom: 20px;">
							<div class="form-group">
								<div class="input-group mb-3">
								  	<input type="hidden" name="admin" class="form-control" value="admin" required="" id="currentadmin" aria-describedby="user-addon" readonly="" />
								</div>
							</div>

							<div class="form-group">
								<label for="currentpassword">Current Password</label>
								<div class="input-group mb-3">
								  	<input type="password" name="password" class="form-control" placeholder="Current Password" required="" id="currentpassword" aria-describedby="pass-addon" />
								</div>
							</div>

							<div class="form-group">
								<label for="newpassword">New Password</label>
								<div class="input-group mb-3">
								  	<input type="password" class="form-control" name="newpassword" placeholder="New Password" required="" id="newpassword" aria-describedby="pass-addon1" />
								</div>
							</div>

							<div class="form-group">
								<label for="confirmpassword">Confirm Password</label>
								<div class="input-group mb-3">
								  	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="" aria-describedby="pass-addon2" />
								</div>
							</div>

							<div class="clearfix">
								<button type="submit" name="submitchange" class="btn dorne-btn float-right"><i class="fas fa-pencil-alt"></i>&nbsp; Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('inc/footer.php'); ?>