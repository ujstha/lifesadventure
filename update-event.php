<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Update Event</title>
<!-- UPDATE ADVENTURES -->
<?php
	if(!isset($_SESSION['email_address'])) {
		echo "<script>alert('Please Sign In to add or update the event.');</script>";
		echo "<script>document.location = 'index.php';</script>";
	}
?>
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
		if(isset($_POST["update"])) {
			$cn=makeconnection();
			$i = 0;
			$i1 = 0;
			$i2 = 0;
			$target_dir = "uploads/";
			//img
			$target_file = $target_dir.basename($_FILES["eevent-img"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["eevent-img"]["tmp_name"]);
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
			if($_FILES["eevent-img"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["eevent-img"]["tmp_name"], $target_file)){
					$i = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}
			
			//img1
			$target_file = $target_dir.basename($_FILES["eevent-img1"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["eevent-img1"]["tmp_name"]);
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
			if($_FILES["eevent-img1"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["eevent-img1"]["tmp_name"], $target_file)){
					$i1 = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}

			//img2
			$target_file = $target_dir.basename($_FILES["eevent-img2"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["eevent-img2"]["tmp_name"]);
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
			if($_FILES["eevent-img2"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				echo "<script>alert('Sorry, only jpg, jpeg, png & gif files are allowed.');</script>";
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["eevent-img2"]["tmp_name"], $target_file)){
					$i2 = 1; 
				} else {
					echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}

			if ($i > 0 && $i1 > 0 && $i2 > 0) {
				$s="UPDATE event SET title='" . $_POST["eatitle"] . "', description='" . $_POST["eadescription"] . "', street='" . $_POST["eastreet"] . "', province='" . $_POST["eaprovince"] . "', zip='" . $_POST["eazip"] . "', group_size='" . $_POST["easize"] . "', activity_type='" . $_POST["eatype"] . "', activity_level='" . $_POST["ealevel"] . "', image='" . basename($_FILES["eevent-img"]["name"]) . "', image1='" . basename($_FILES["eevent-img1"]["name"]) . "', image2='" . basename($_FILES["eevent-img2"]["name"]) . "', creator_pic='$picture', creator='$name' WHERE id='".$_POST["eaid"]."'";

				if (mysqli_query($cn,$s)) {
					echo "<script>alert('You have successfully updated an event.');</script>";
					echo "<script>document.location = 'profile.php';</script>";
				} else {
					echo "<script>alert('Updating event was unsuccessful. Please Try Again.');</script>";
				}		
			} 
			mysqli_close($cn);
		}

	} else {
		echo "<script>alert('Please Sign In to add or events.');</script>";
		echo "<script>document.location = 'index.php';</script>";
	}
?>
<?php include('inc/header.php'); ?>
<!-- /UPDATE ADVENTURES -->
<style type="text/css">
	.modal-content {
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
		.img-thumbnail {
			margin-top: 4px;
		}
	}
	.ms-choice {
		padding: 5px;
		height: 40px;
	}
	.alert a.btn-lg {
		border-radius: 0;
	}
</style>

<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			    	<div class="text-light modal-content">
			    		<!-- EVENT DETAILS -->
						<?php 
							$cn = makeconnection();
							if (isset($_GET["a_id"])) {
								$id = $_GET["a_id"];
								$s = "SELECT * FROM event";
								$q = mysqli_query($cn, $s);
								$r = mysqli_num_rows($q);
								while ($data = mysqli_fetch_array($q)) {
									$a_id = $data['id'];
									if ($id == $a_id) {
										$a_title = $data['title'];
										$a_description = $data['description'];
										$a_province = $data['province'];
										$a_street = $data['street'];
										$a_zip = $data['zip'];
										$a_size = $data['group_size'];
										$a_type = $data['activity_type'];
										$a_level = $data['activity_level'];
										$a_date = $data['date_added'];
										$a_img = $data['image'];
										$a_img1 = $data['image1'];
										$a_img2 = $data['image2'];
									?>
						<!-- /EVENT DETAILS -->
								<div class="modal-header">
					        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Update Adventures</h5>
					      		</div>
					      		<div class="modal-body">
					      			<div class="form-group d-none row">
										<label class="col-sm-4 col-form-label d-flex">Id : </label> 
										<div class="col-sm-8">
											<input type="text" name="eaid" value="<?php echo $a_id; ?>" required placeholder="Adventure Id" class="form-control" id="eaid"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Title : </label> 
										<div class="col-sm-8">
											<input type="text" name="eatitle" value="<?php echo $a_title; ?>" required placeholder="Adventure Title" class="form-control" id="eatitle"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Description : </label>
										<div class="col-sm-8">
											<textarea type="text" name="eadescription" rows="3" required placeholder="Write something about adventure" class="form-control" id="eadescription"><?php echo $a_description; ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Province : </label>
										<div class="col-sm-8">
											<select name="eaprovince" class="form-control nonMultiple">
												<option value="Leinster"<?php echo ($a_province=='Leinster'?' checked=checked':''); ?>>Leinster</option>
												<option value="Munster"<?php echo ($a_province=='Munster'?' checked=checked':''); ?>>Munster</option>
												<option value="Connacht"<?php echo ($a_province=='Connacht'?' checked=checked':''); ?>>Connacht</option>
												<option value="Ulster"<?php echo ($a_province=='Ulster'?' checked=checked':''); ?>>Ulster</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Address : </label>
										<div class="d-flex justify-content-start">
											<div class="col-sm-9">
												<input type="text" name="eastreet" value="<?php echo $a_street; ?>" required placeholder="Street Name" class="form-control" id="eastreet" title="Text only no house numbers" pattern="[a-zA-Z]*"/>
											</div>
											<div class="col-sm-6">
												<input type="text" name="eazip" value="<?php echo $a_zip; ?>" pattern="[0-9]{5}" title="Five digit zip code" required placeholder="Zip Code" class="form-control" id="eazip"/>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Group Size : </label> 
										<div class="col-sm-8">
											<input type="text" name="easize" value="<?php echo $a_size; ?>" required placeholder="Write group size like Family, Duo, etc...." class="form-control" id="easize"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Activity Level : </label> 
										<div class="col-sm-8">
											<select name="ealevel" class="form-control nonMultiple">
												<option value="Not Specified"<?php echo ($a_level=='Not Specified'?' checked=checked':''); ?>>Not Specified</option>
												<option value="High"<?php echo ($a_level=='High'?' checked=checked':''); ?>>High</option>
												<option value="Medium"<?php echo ($a_level=='Medium'?' checked=checked':''); ?>>Medium</option>
												<option value="Low"<?php echo ($a_level=='Low'?' checked=checked':''); ?>>Low</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Activity Type : </label> 
										<div class="col-sm-8">
											<input type="text" name="eatype" value="<?php echo $a_type; ?>" required placeholder="Write activity type like Cycling, Horse Riding, etc....." class="form-control" id="eatype"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Type Image : </label>  
										<div class="col-sm-6 d-flex justify-content-start">
											<input type="file" name="eevent-img" required="" id="eevent-img" />
										</div>
										<div class="col-sm-2">
											<img class="img-thumbnail" src="uploads/<?php echo $a_img; ?>" width="100" style="height: 110px;">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Detail Image1 : </label>  
										<div class="col-sm-6 d-flex justify-content-start">
											<input type="file" name="eevent-img1" required="" id="eevent-img1" />
										</div>
										<div class="col-sm-2">
											<img class="img-thumbnail" src="uploads/<?php echo $a_img1; ?>" width="100" style="height: 110px;">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Detail Image2 : </label>  
										<div class="col-sm-6 d-flex justify-content-start">
											<input type="file" name="eevent-img2" required="" id="eevent-img2" />
										</div>
										<div class="col-sm-2">
											<img class="img-thumbnail" src="uploads/<?php echo $a_img2; ?>" width="100" style="height: 110px;">
										</div>
									</div>
					      		</div> 
								<div class="d-flex justify-content-end">
									<button type="reset" class="btn dorne-btn btn1 mb-3 mr-1" id="reset">Reset</button>
						        	<button type="submit" name="update" class="btn dorne-btn mb-3 mr-2" id="update">Update</button>
								</div>
			      		<?php }
			      			}
						}
						mysqli_close($cn);
					?>
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