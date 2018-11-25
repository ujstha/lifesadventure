<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('includes/function.php'); ?>
<?php include('includes/stylelinks.php') ?>

<?php
	if(!isset($_SESSION['email_address'])) {

		header("location:index.php");

	} else {
		include('includes/header.php');
		$msg = '';
		$msgClass = '';
		if(isset($_POST["change"])) {
			$cn=makeconnection();
			$file = addslashes(file_get_contents($_FILES["eppic"]["tmp_name"]));
			$s="update customer set first_name='" . $_POST["efname"] . "', last_name='" . $_POST["elname"] . "', gender='" . $_POST["egender"] . "', age='" . $_POST["eage"] . "', country='" . $_POST["ecountry"] . "', profile_pic='$file' where email_address='" . $_POST["eemail"] . "'";

			if (mysqli_query($cn,$s)) {
				header("location:edit-profile.php");
			} else {
			 	$msg = 'Oops, There was a problem while updating your profile...';
				$msgClass = 'alert-danger';
			}
			mysqli_close($cn);
		}
		?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>lifesadventure | edit : <?php echo $profname . '.' . $prolname . '.' . $id; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<style type="text/css">
			.d-flex {
				justify-content: flex-end;
			}
			.d-flex button {
				width: auto;
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
	</head> 
	<body>
        <!--header start here-->
		
		<!--header ends here-->
		<!-- EDIT PROFILE PAGE -->
		<!-- error/success alert div -->
    	<?php if ($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?> text-center col-lg-8 offset-lg-2 alert-dismissable" id="flash-msg">
    			<?php echo $msg; ?>
    			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    		</div>
		<?php endif; ?>
		<!-- error/success alert div -->
		<form method="post" name="chngpwd" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-top: 110px; margin-bottom: 60px;" enctype="multipart/form-data">
	    	<div class="col-lg-6 offset-lg-3 bg-dark text-light">
	      		<div class="modal-header">
	        		<h5 class="modal-title" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Edit Profile</h5>
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
							<div class="custom-control custom-radio">
							  	<input type="radio" class="custom-control-input" id="male" value="Male"<?php echo ($progender=='Male'?' checked=checked':''); ?> name="egender" required="">
							  	<label class="custom-control-label" for="male">Male &nbsp;&nbsp;</label>
							</div>
							<div class="custom-control custom-radio">
							  	<input type="radio" class="custom-control-input" id="female" value="Female"<?php echo ($progender=='Female'?' checked=checked':''); ?> name="egender" required="">
							  	<label class="custom-control-label" for="female">Female</label>
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
							<img class="img-thumbnail" src="data:image/jpeg;base64,<?php echo $propic; ?>" width="100" height="100">
						</div>
					</div>
	      		</div> 
				<div class="d-flex justify-content-end">
					<button type="reset" class="btn btn-danger pt-2 pb-2" id="reset">Reset</button>
		        	<button type="submit" name="change" class="btn btn-primary pt-2 pb-2" id="submit">Save Changes</button>
				</div>
	  		</div>
  		</form>			    
		<!-- /EDIT PROFILE PAGE -->
		<!--copy rights start here-->
		<?php include('includes/footer.php');?>
		<!--COPY rights end here-->
	   
	</body>
</html>

<?php }
?>