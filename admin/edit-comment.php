<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php 
	include('func/function.php');

	if (isset($_GET['a_id'], $_GET['c_id'])) {
		$cn = makeconnection();
		$adv_id = $_GET['a_id'];
		$comment_id = $_GET['c_id'];
	    if (isset($_POST['changecomment'])) {
			$cn = makeconnection();
			$comment = $_POST['commenttext'];
			$update = date('Y-m-d H:i:s');
			$s = "UPDATE comment SET comment_txt='{$comment}', date_commented='{$update}' WHERE id={$comment_id}";
			mysqli_query($cn, $s);		
			mysqli_close($cn);
		}
		if (isset($_POST['deletecomment'])) {
			$cn = makeconnection();
			$s = "DELETE FROM comment WHERE id={$comment_id}";
			mysqli_query($cn, $s);
			$reduce_num = "UPDATE adventure SET adventure_comment_counter = adventure_comment_counter - 1 WHERE id={$adv_id}";
			mysqli_query($cn, $reduce_num);
			mysqli_close($cn);
		}
		header('Location: manage-adventures.php?a_id=' . $adv_id);	    
	}
?>
