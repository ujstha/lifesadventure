<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php
	if(isset($_SESSION['email_address'])) {
		$cn = makeconnection();  
        $s="select * from customer";
        $result=mysqli_query($cn,$s);
        $r=mysqli_num_rows($result);                            

        while ($data=mysqli_fetch_array($result)) {
            if ($_SESSION["email_address"] == $data["email_address"]) {
                $c_id = $data['id'];
                $c_pic = $data['profile_pic'];
                $c_name = $data['first_name'];
            }
        }
        mysqli_close($cn);
	}
?>

<?php	
	if (isset($_GET['a_id'], $_GET['rating'])) {
		$cn = makeconnection();
		$adv_id = $_GET['a_id'];
		$rating = $_GET['rating'];

		if (in_array($rating, [1, 2, 3, 4, 5])) {
			$s = "SELECT id FROM adventure WHERE id = {$adv_id}";
			$result = mysqli_query($cn, $s);
			$r = mysqli_num_rows($result) ? true : false;

			if ($r) {
				$s = "INSERT INTO rating (adventure_id, customer_id, rating) VALUES ({$adv_id}, {$c_id}, {$rating})";
				$result = mysqli_query($cn, $s);

				$query = "UPDATE adventure SET adventure_rating_counter = adventure_rating_counter + 1 WHERE id = '{$adv_id}'";
	            $update_rate_count = mysqli_query($cn,$query);
			}
		}

		header('Location: adventures.php?a_id=' . $adv_id);
	}
?>