<?php session_start();
	include('func/function.php');

	if(!isset($_SESSION['loginstatus'])) {

		header("location:index.php");

	}else {
		$cn = makeconnection();
		$s = "SELECT * FROM customer WHERE email_address='" . $_SESSION["details"] . "'";
		$q = mysqli_query($cn, $s);
		$r = mysqli_fetch_assoc($q);

		$e = $r['email_address'];
		$p = $r['decrypt_pass'];

		echo "Your info is : ". "<br>" ." " . $e . "<br>" . $p . "<br>";
	}
?>