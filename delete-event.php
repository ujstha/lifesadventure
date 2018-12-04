<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php 
	include('func/function.php');

	if(!isset($_SESSION['email_address'])) {
		echo "<script>alert('Please Sign In to add or events.');</script>";
		echo "<script>document.location = 'index.php';</script>";
	} 
	if (isset($_GET['a_id'])) {
		$cn = makeconnection();
		$event_id = $_GET['a_id'];
		if (isset($_POST['deleteevent'])) {
			$cn = makeconnection();
			$s = "DELETE FROM event WHERE id={$event_id}";
			mysqli_query($cn, $s);
			mysqli_close($cn);
		}
		echo "<script>alert('Event successfully deleted.');</script>";
		echo "<script>document.location = 'profile.php';</script>";
	}
?>
