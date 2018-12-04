<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>

<?php
	if(!isset($_SESSION['email_address'])) {

		echo "<script>document.location = 'index.php';</script>";

	} else {
		$msg = '';
		$msgClass = '';
		if(isset($_POST["change"])) {
			$cn=makeconnection();
			$i = 0;
			$target_dir = "uploads/";
			//img
			$target_file = $target_dir.basename($_FILES["eppic"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["eppic"]["tmp_name"]);
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
			if($_FILES["eppic"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["eppic"]["tmp_name"], $target_file)){
					$i = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}
			if ($i > 0) {
				$s="update customer set first_name='" . $_POST["efname"] . "', last_name='" . $_POST["elname"] . "', gender='" . $_POST["egender"] . "', age='" . $_POST["eage"] . "', country='" . $_POST["ecountry"] . "', profile_pic='" . basename($_FILES["eppic"]["name"]) . "' where email_address='" . $_POST["eemail"] . "'";
				if (mysqli_query($cn,$s)) {
					echo "<script>document.location = 'edit-profile.php';</script>";
				} else {
				 	$msg = 'Oops, There was a problem while updating your profile...';
					$msgClass = 'alert-danger';
				}
				mysqli_close($cn);
			}			
		}
	?>

		<style type="text/css">
			.d-flex {
				justify-content: flex-end;
			}
			.d-flex button {
				width: auto;
			}
			#reset, #edit {
				border-radius: 0;
			}
			form .form {
				background-color: rgba(0,0,0,.5);
			}
			@media only screen and (max-width: 768px) {
				.d-flex {
					justify-content: flex-start;
				}
				img.img-thumbnail {
					margin-top: 8px;
				}
			}
		</style>
		<!-- EDIT PROFILE PAGE -->
		<!-- error/success alert div -->
    	<?php if ($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?> text-center col-lg-12 alert-dismissable" id="flash-msg">
    			<?php echo $msg; ?>
    			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    		</div>
		<?php endif; ?>
		<!-- error/success alert div -->
		<section class="bg-img bg-overlay" style="background-image: url(assets/dawn.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
		    <div class="container h-100">
		        <div class="row h-100 align-items-center justify-content-center">
		        	<div class="col-12 col-md-10">
						<form method="post" name="chngpwd" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					    	<div class="form text-light">
					      		<div class="modal-header">
					        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Update Profile</h5>
					      		</div>
					      		<div class="modal-body">
					      			<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Email : </label>		
										<div class="col-sm-8">							
											<input type="email" name="eemail" value="<?php echo $proemail; ?>" required class="form-control bg-dark text-light" id="eemail" readonly/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Full Name : </label> 
										<div class="col-sm-4">
											<input type="text" name="efname" value="<?php echo $profname; ?>" required placeholder="First Name" class="form-control" id="efname"/>
										</div>
										<div class="col-sm-4">
											<input type="text" name="elname" value="<?php echo $prolname; ?>" required placeholder="Last Name" class="form-control" id="elname"/>
										</div>
									</div>		
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Gender : </label> 
										<div class="col-sm-8">
											<div class="custom-radio">
											  	<input type="radio" id="emale" value="Male"<?php echo ($progender=='Male'?' checked=checked':''); ?> name="egender" required="">
											  	<label for="emale">Male &nbsp;&nbsp;</label>
											</div>
											<div class="custom-radio">
											  	<input type="radio" id="efemale" value="Female"<?php echo ($progender=='Female'?' checked=checked':''); ?> name="egender" required="">
											  	<label for="efemale">Female &nbsp;&nbsp;</label>
											</div>
										</div>						
									</div>			
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Age : </label>
										<div class="col-sm-8">
											<input type="number" min="1" name="eage" value="<?php echo $proage; ?>" required placeholder="Enter your age" class="form-control" id="eage"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Country : </label> 
										<div class="col-sm-8">
											<select name="ecountry" class="form-control">
												<option value="Nepal"<?php echo ($procountry=='Nepal'?' selected=selected':''); ?>>Nepal</option>
												<option value="Finland"<?php echo ($procountry=='Finland'?' selected=selected':''); ?>>Finland</option>
												<option value="Ireland"<?php echo ($procountry=='Ireland'?' selected=selected':''); ?>>Ireland</option>
												<option value="Netherlands"<?php echo ($procountry=='Netherlands'?' selected=selected':''); ?>>Netherlands</option>
												<option value="China"<?php echo ($procountry=='China'?' selected=selected':''); ?>>China</option>
												<option value="Norway"<?php echo ($procountry=='Norway'?' selected=selected':''); ?>>Norway</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Upload Pic : </label>  
										<div class="col-sm-6 d-flex justify-content-start">
											<input type="file" name="eppic" required id="eppic" />
										</div>
										<div class="col-sm-2">
											<img class="img-thumbnail" src="uploads/<?php echo $propic; ?>" width="auto" height="100">
										</div>
									</div>
					      		</div> 
								<div class="d-flex justify-content-end">
									<button type="reset" class="btn btn-danger pt-1 pb-1 mb-3" id="reset">Reset</button>
						        	<button type="submit" name="change" class="btn btn-primary ml-3 mb-3 mr-3 pt-1 pb-1" id="edit">Update</button>
								</div>
					  		</div>
				  		</form>
				  	</div>
			  	</div>
			</div>
		</section>
		<!-- /EDIT PROFILE PAGE -->

		<?php include('inc/footer.php');?>
<?php }
?>