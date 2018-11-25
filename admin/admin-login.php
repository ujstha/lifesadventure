<?php session_start(); ?>
<?php include('inc/head.php'); ?>
<?php include('func/function.php'); ?>

<title>lifesadventure | Admin Login</title>

<?php include('inc/header.php'); ?>

<?php
	$msg = '';
	$msgClass = '';
	$_SESSION['loginstatus']="";
	if(isset($_POST["submitlogin"])) {
		$cn=makeconnection();
		$s="SELECT * FROM admin WHERE adminuser='" . $_POST["username"] . "' AND adminpassword='" . $_POST["password"] ."'";
		$q=mysqli_query($cn,$s);
		$r=mysqli_num_rows($q);
		$data=mysqli_fetch_array($q);
		mysqli_close($cn);
		if($r>0) {
			$_SESSION["adminuser"] = $_POST["username"];
			$_SESSION['loginstatus']="yes";	
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		} else {
			$msg = 'Invalid Username or Password.';
			$msgClass = 'alert-danger';
		}
	}
?>

<style type="text/css">
	.modal-content {
		background-color: transparent;
		color: white;
		border-color: white;
		border-radius: 0;
	}
</style>
<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 15em; padding-bottom: 8em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
				<div id="loginform">
					<div class="col-lg-6 offset-lg-3 modal-content">
						<div class="modal-header d-flex justify-content-center" style="font-size: 20px;">Admin Sign In</div>
						<form method="post" style="margin-top: 20px;">
							<?php if($msg != ''): ?>
					    		<div class="alert <?php echo $msgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
					    			<?php echo $msg; ?>
					    			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button></div>
					    	<?php endif; ?>
							<div class="form-group">
								<label for="usernameinput">Username</label>
								<div class="input-group mb-3">
								  	<input type="text" name="username" required pattern="[a-zA-z _]{1,50}" title="Please Enter Only Characters between 1 to 50 for User Name" placeholder="Enter your username" class="form-control" id="usernameinput" aria-describedby="user-addon" />
								</div>
							</div>

							<div class="form-group">
								<label for="passwordinput">Password</label>
								<div class="input-group mb-3">
								  	<input type="password" name="password" required pattern="[a-zA-z0-9]{1,10}" title="Please Enter Only Characters between 1 to 10 for Password" placeholder="Enter your password" class="form-control" id="passwordinput" aria-describedby="pass-addon" />
								</div>
							</div>

							<div class="clearfix">
								<button type="submit" name="submitlogin" class="btn dorne-btn float-right mb-3"><i class="fas fa-sign-in-alt"></i>&nbsp; Sign In</button>
							</div>				
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('inc/footer.php'); ?>
	