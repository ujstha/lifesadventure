<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Add Adventures</title>
<!-- ADD ADVENTURES -->
<?php
	if($_SESSION['loginstatus']=="") {

		header("location:admin-login.php");

	} else {
		$imgMsg = '';
		$imgMsgClass = '';
		if(isset($_POST["submit"])) {
			$cn=makeconnection();
			$i = 0;
			$i1 = 0;
			$i2 = 0;
			$i3 = 0;
			$target_dir = "../uploads/";
			//img
			$target_file = $target_dir.basename($_FILES["img"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["img"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				$imgMsg = "File is not an image.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["img"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
					$i = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}
			
			//img1
			$target_file = $target_dir.basename($_FILES["img1"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["img1"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				$imgMsg = "File is not an image.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["img1"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)){
					$i1 = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}

			//img2
			$target_file = $target_dir.basename($_FILES["img2"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["img2"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				$imgMsg = "File is not an image.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["img2"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file)){
					$i2 = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}

			//img3
			$target_file = $target_dir.basename($_FILES["img3"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["img3"]["tmp_name"]);
			if($check!==false) {
				$uploadok = 1;
			} else {
				$imgMsg = "File is not an image.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			}
			//check if file already exists
			if(file_exists($target_file)){
				$uploadok=1;
			}
			//check file size
			if($_FILES["img3"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file)){
					$i3 = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}

			if ($i > 0 && $i1 > 0 && $i2 > 0 && $i3 > 0) {
				$s="INSERT INTO adventure (`title`, `description`, `street`, `province`, `zip`, `group_size`, `activity_type`, `activity_level`, `image`, `image1`, `image2`, `image3`) VALUES ('" . $_POST["atitle"] . "', '" . $_POST["adescription"] . "', '" . $_POST["astreet"] . "', '" . $_POST["aprovince"] . "', '" . $_POST["azip"] . "', '" . $_POST["asize"] . "', '" . $_POST["atype"] . "', '" . $_POST["alevel"] . "', '" . basename($_FILES["img"]["name"]) . "', '" . basename($_FILES["img1"]["name"]) . "', '" . basename($_FILES["img2"]["name"]) . "', '" . basename($_FILES["img3"]["name"]) . "')";

				if (mysqli_query($cn,$s)) {
					$imgMsg = 'You have successfully added a new adventure.';
					$imgMsgClass = 'alert-success'; 
				} else {
					$imgMsg = 'Adding new adventure was unsuccessful. Please Try Again.';
					$imgMsgClass = 'alert-danger';
				}		
			} 
			mysqli_close($cn);
		}
	}
?>
<?php include('inc/header.php'); ?>
<!-- /ADD ADVENTURES -->
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
				<!-- error/success alert div -->
		    	<?php if ($imgMsg != ''): ?>
					<div class="alert <?php echo $imgMsgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
		    			<?php echo $imgMsg; ?>
		    			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		    		</div>
				<?php endif; ?>
				<!-- error/success alert div -->
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			    	<div class="text-light modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Add Adventures</h5>
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
										<input type="text" name="astreet" required placeholder="Street Name" class="form-control" id="astreet"/>
									</div>
									<div class="col-sm-6">
										<input type="text" name="azip" required placeholder="Zip Code" class="form-control" id="azip"/>
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
									<input type="file" name="img" required="" id="img" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Detail Image1 : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="img1" required="" id="img1" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Detail Image2 : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="img2" required="" id="img2" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Detail Image3 : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="img3" required="" id="img3" />
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