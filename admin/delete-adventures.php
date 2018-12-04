<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php 
	include('func/function.php');

	if ($_SESSION['loginstatus']=="") {
        header('Location: admin-login.php');
    }
	if (isset($_GET['a_id'])) {
		$cn = makeconnection();
		$adv_id = $_GET['a_id'];
		if (isset($_POST['deleteadventures'])) {
			$cn = makeconnection();
			$s = "DELETE FROM adventure WHERE id={$adv_id}";
			mysqli_query($cn, $s);
			mysqli_close($cn);
		}
		header('Location: list-adventures.php');	    
	}
?>
