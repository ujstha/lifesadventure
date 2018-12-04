<style type="text/css">
	.close {
		position: absolute;
		top: 5px;
		right: 8px;
	}
</style>
<?php session_start();
	include('func/function.php');
	include('inc/head.php');
	include('inc/header.php');
	include('register.php');
	include('sign-in.php');

	if(!isset($_SESSION['loginstatus'])) {

		header("location:index.php");

	}else {
		$cn = makeconnection();
		$s = "SELECT * FROM customer WHERE email_address='" . $_SESSION["details"] . "'";
		$q = mysqli_query($cn, $s);
		$r = mysqli_fetch_assoc($q);

		$e = $r['email_address'];
		$p = $r['decrypt_pass'];

		?>
		
		<section class="bg-img bg-overlay-9" style="background-image: url(assets/user.png); background-attachment: fixed;">
		    <div class="container">
		        <div class="row h-100 align-items-center justify-content-center">
		            <div class="col-12 col-md-10">
	                    <div class="alert alert-success text-center alert-dismissable">
	                        <p class="text-dark" style="font-size: 18px;">Success! Your id details are below : </p>
	                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
	                    </div>
	                    <div class="modal-content">
	                    	<div class="modal-body" style="height: 200px;">
	                    		<h1><small>Email Address : </small><?php echo $e; ?></h1>
	                    		<h1><small>Password : </small><?php echo $p; ?></h1>
	                    	</div>
	                    	<div class="modal-footer d-flex">
	                    		<a class="btn dorne-btn bg-success text-light text-uppercase" href="index.php">Back to Main</a>
	                    		<a href="#" class="btn dorne-btn bg-dark text-light text-uppercase" data-toggle="modal" data-target="#signinModal">Login</a>
	                    	</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	<?php }
?>
<?php include('inc/footer.php'); ?>