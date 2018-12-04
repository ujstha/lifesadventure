<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('func/function.php'); ?>
<?php
	if($_SESSION['email_address']=="") {

		echo "<script>document.location = 'index.php';</script>";

	} else {
		if (isset($_GET['email'])) {
			$cn = makeconnection();
			$pmsg = '';
			$pmsgClass = '';
			$e_a = mysqli_real_escape_string($cn, $_GET['email']);
			$s = "SELECT * FROM customer WHERE email_address='".$e_a."'";
			$q = mysqli_query($cn, $s);
			$data = mysqli_fetch_array($q);

			if(isset($_POST["submitchange"])) {
				if ($data['decrypt_pass'] != $_POST['oldpassword']) {
					$pmsg = "Incorrect Old Password";
					$pmsgClass = "alert-danger";
				} else {
					$s="UPDATE customer SET password='" . md5($_POST["newpassword"]) . "', decrypt_pass='". $_POST["confirmpassword"] . "' WHERE email_address='".$e_a."'";
					mysqli_query($cn,$s);
					mysqli_close($cn);
					$pmsg = "Password Changed Successfully.";
					$pmsgClass = "alert-success";
				}
			}
		}
	}
?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | <?php echo $data['first_name']; ?>.<?php echo $data['last_name']; ?>.0<?php echo $data['id']; ?>0</title>

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
        		<?php if ($pmsg != ''): ?>
                    <div class="alert <?php echo $pmsgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                        <?php echo $pmsg; ?>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php endif; ?>
			  	<div class="col-lg-6 offset-lg-3 modal-content">
					<div>
						<div class="modal-header d-flex justify-content-center text-uppercase" style="font-size: 20px;">Change Password</div>
						<form name="chngpwd" method="post" onSubmit="return valid();" style="margin-top: 20px; margin-bottom: 20px;">
							

							<div class="form-group">
								<label for="currentpassword">Current Password</label>
								<div class="input-group mb-3">
								  	<input type="password" name="oldpassword" class="form-control" placeholder="Current Password" required="" id="cpassword" aria-describedby="pass-addon" />
								</div>
							</div>

							<div class="form-group">
								<label for="newpassword">New Password</label>
								<div class="input-group mb-3">
								  	<input type="password" class="form-control" name="newpassword" placeholder="New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required title="Minimum eight characters, at least one uppercase letter, one lowercase letter and one number" id="npassword" aria-describedby="pass-addon1" />
								</div>
							</div>

							<div class="form-group">
								<label for="confirmpassword">Confirm Password</label>
								<div class="input-group mb-3">
								  	<input type="password" class="form-control" name="confirmpassword" id="cmpassword" placeholder="Confrim Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required title="Minimum eight characters, at least one uppercase letter, one lowercase letter and one number" aria-describedby="pass-addon2" />
								</div>
							</div>

							<div class="clearfix">
								<button type="submit" name="submitchange" class="btn dorne-btn float-right text-uppercase"><i class="fas fa-pencil-alt"></i>&nbsp; Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('inc/footer.php'); ?>