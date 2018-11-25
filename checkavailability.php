<?php include('func/function.php'); ?>

<?php 
	$cn = makeconnection();

	if(isset($_POST['user_email'])) {
		$emailId=$_POST['user_email'];

		$s = " SELECT * FROM customer WHERE email_address='$emailId' ";

	 	$q = mysqli_query($cn, $s);

	 	if(mysqli_num_rows($q)>0) {
	 		echo '<span class="text-danger">Email Already Exist.</span>';
	 		echo "<script>$('#register').prop('disabled',true);</script>";
	 	} else {
	  		echo '<span class="text-success">Email is available for registration.</span>';
	  		echo "<script>$('#register').prop('disabled',false);</script>";
	 	}
	 	exit();
	}
?>
