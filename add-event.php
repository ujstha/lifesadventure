<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Add Events</title>
<?php include('inc/header.php'); ?>
<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>
<!-- ADD EVENTS -->
<?php
	$cn=makeconnection();
	if(isset($_SESSION['email_address'])) {
		$s_u = "SELECT id, first_name, last_name, email_address, profile_pic FROM customer";
		$q_u = mysqli_query($cn, $s_u);
		while ($d_u = mysqli_fetch_array($q_u)) {
			$creatorId = $d_u['id'];
			$name = $d_u['first_name'].' '.$d_u['last_name'];
			$email = $d_u['email_address'];
			$picture = $d_u['profile_pic'];
		}
		if(isset($_POST["submit"])) {
			$cn=makeconnection();
			$i = 0;
			$i1 = 0;
			$i2 = 0;
			$target_dir = "uploads/";
			//img
			$target_file = $target_dir.basename($_FILES["event-img"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["event-img"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				echo "<script>alert('File is not an image.');";
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["event-img"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["event-img"]["tmp_name"], $target_file)){
					$i = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}
			
			//img1
			$target_file = $target_dir.basename($_FILES["event-img1"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["event-img1"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				echo "<script>alert('File is not an image.');";
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["event-img1"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["event-img1"]["tmp_name"], $target_file)){
					$i1 = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}

			//img2
			$target_file = $target_dir.basename($_FILES["event-img2"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["event-img2"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				echo "<script>alert('File is not an image.');";
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["event-img2"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["event-img2"]["tmp_name"], $target_file)){
					$i2 = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}

			if ($i > 0 && $i1 > 0 && $i2 > 0) {
				$s="INSERT INTO event (`title`, `description`, `street`, `province`, `zip`, `group_size`, `activity_type`, `activity_level`, `image`, `image1`, `image2`, `creator_pic`, `creator`, `customer_id`) VALUES ('" . $_POST["atitle"] . "', '" . $_POST["adescription"] . "', '" . $_POST["astreet"] . "', '" . $_POST["aprovince"] . "', '" . $_POST["azip"] . "', '" . $_POST["asize"] . "', '" . $_POST["atype"] . "', '" . $_POST["alevel"] . "', '" . basename($_FILES["event-img"]["name"]) . "', '" . basename($_FILES["event-img1"]["name"]) . "', '" . basename($_FILES["event-img2"]["name"]) . "', '$picture', '$name', '$creatorId')";

				if (mysqli_query($cn,$s)) {
					echo "<script>alert('You have successfully added an event.');</script>";
				} else {
					echo "<script>alert('Adding event was unsuccessful. Please Try Again.');</script>";
				}		
			} 
			mysqli_close($cn);
		}

	} else {
		echo "<script>alert('Please Sign In to add events.');</script>";
		echo "<script>document.location = 'index.php';</script>";
	}
?>
<!-- /ADD EVENTS -->
<style type="text/css">
	section .modal-content {
		background-color: rgba(0,0,0,.2);
	}
	label.d-flex {
		justify-content: flex-end;
	}
	.btn1.dorne-btn {
		background-color: red;
	}
	.dorne-btn {
		text-transform: uppercase;
	}
	.nonMultiple option {
		background-color: rgba(0,0,0,.7);
		color: white;
	}
	option:hover {
		cursor: pointer;
	}
	.multi {
		width: 100%;
		max-width: 100%;
	}
	@media only screen and (max-width: 768px) {
		label.d-flex {
			justify-content: flex-start;
		}
	}
	.ms-choice {
		padding: 5px;
		height: 40px;
	}
</style>

<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			    	<div class="text-light modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Add Event</h5>
			      		</div>
			      		<div class="modal-body">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Title : </label> 
								<div class="col-sm-8">
									<input type="text" name="atitle" required placeholder="Adventure Title" class="form-control" id="atitle"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Description : </label>
								<div class="col-sm-8">
									<textarea type="text" name="adescription" required placeholder="Write something about adventure....." class="form-control" id="adescription"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Province : </label>
								<div class="col-sm-8">
									<select name="aprovince" class="form-control nonMultiple">
										<option value="Leinster">Leinster</option>
										<option value="Munster">Munster</option>
										<option value="Connacht">Connacht</option>
										<option value="Ulster">Ulster</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Address : </label>
								<div class="d-flex justify-content-start">
									<div class="col-sm-9">
										<input type="text" name="astreet" required placeholder="Street Name" class="form-control" id="astreet" title="Text only no house numbers" pattern="[a-zA-Z]*"/>
									</div>  
									<div class="col-sm-6">
										<input type="text" name="azip" pattern="[0-9]{5}" title="Five digit zip code" required placeholder="Zip Code" class="form-control" id="azip"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Group Size : </label> 
								<div class="col-sm-8">
									<input type="text" name="asize" required placeholder="Write group size like Family, Duo, etc...." class="form-control" id="asize"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Activity Level : </label> 
								<div class="col-sm-8">
									<select name="alevel" class="form-control nonMultiple">
										<option value="Not Specified">Not Specified</option>
										<option value="High">High</option>
										<option value="Medium">Medium</option>
										<option value="Low">Low</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Activity Type : </label> 
								<div class="col-sm-8">
									<input type="text" name="atype" required placeholder="Write activity type like Cycling, Horse Riding, etc....." class="form-control" id="atype"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Type Image : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="event-img" required="" id="event-img" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Detail Image1 : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="event-img1" required="" id="event-img1" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Detail Image2 : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="event-img2" id="event-img2" />
								</div>
							</div>
			      		</div> 
						<div class="d-flex justify-content-end">
							<button type="reset" class="btn dorne-btn btn1 mb-3 mr-1" id="reset">Reset</button>
				        	<button type="submit" name="submit" class="btn dorne-btn mb-3 mr-2" id="submit">Add</button>
						</div>
			  		</div>
		  		</form>
		  	</div>
		</div>
	</div>
</section>

<?php include('inc/footer.php'); ?>

<!-- <script>
    $('.multi').multipleSelect({
        placeholder: "Select one or multiple options",
        filter: true
    });
</script> -->