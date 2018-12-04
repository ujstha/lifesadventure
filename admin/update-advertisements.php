<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Update Adventures</title>
<!-- UPDATE ADVENTURES -->
<?php
	if($_SESSION['loginstatus']=="") {

		header("location:admin-login.php");

	}
?>
<?php 
	$imgMsg = '';
	$imgMsgClass = '';
	if(isset($_POST["update"])) {
		$cn=makeconnection();
		$i = 0;
		$target_dir = "../uploads/";
		//img
		$target_file = $target_dir.basename($_FILES["img-ead"]["name"]);
		$uploadok = 1;
		$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		//check if image file is a actual image or fake image
		$check=getimagesize($_FILES["img-ead"]["tmp_name"]);
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
		if($_FILES["img-ead"]["size"]>500000){
			$uploadok=1;
		}
		//allow certain file formats
		if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
			$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
			$imgMsgClass = 'alert-danger';
			$uploadok=0;
		} else {
			if(move_uploaded_file($_FILES["img-ead"]["tmp_name"], $target_file)){
				$i = 1; 
			} else {
				$imgMsg = "Sorry, there was an error uploading your file.";
				$imgMsgClass = 'alert-danger';
			}
		}

		if ($i > 0) {
			$cn=makeconnection();
			$s="UPDATE advertisement SET link='" . $_POST["ead-link"] . "', detail='" . $_POST["ead-detail"] . "', image='" . basename($_FILES["img-ead"]["name"]) . "' WHERE id='".$_POST["id-ead"]."'";
			if (mysqli_query($cn,$s)) {
				$imgMsg = 'You have successfully UPDATED the advertisement.';
				$imgMsgClass = 'alert-success'; 
			} else {
				$imgMsg = 'UPDATING advertisement was unsuccessful. Please Try Again.';
				$imgMsgClass = 'alert-danger';
			}		
		} 
		mysqli_close($cn);
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

<section class="bg-img bg-overlay" style="background-image: url(assets/sunset.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
				<!-- error/success alert div -->
		    	<?php if ($imgMsg != ''): ?>
					<div class="alert <?php echo $imgMsgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" style="margin-top: 8em; margin-bottom: 8em;">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		    			<?php echo $imgMsg; ?>
		    			<br>
		    			<br>
		    			<a href="list-advertisements.php" class="btn btn-primary btn-lg">Go to Advertisements List</a>
		    		</div>
				<?php endif; ?>
				<!-- error/success alert div -->
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			    	<div class="text-light modal-content">
			    		<!-- ADVERTISEMENT DETAILS -->
						<?php 
							$cn = makeconnection();
							if (isset($_GET["a_id"])) {
								$id = $_GET["a_id"];
								$s = "SELECT * FROM advertisement";
								$q = mysqli_query($cn, $s);
								$r = mysqli_num_rows($q);
								while ($data = mysqli_fetch_array($q)) {
									$a_id = $data['id'];
									if ($id == $a_id) {
										$a_detail = $data['detail'];
										$a_link = $data['link'];
										$a_img = $data['image'];
									?>
						<!-- /ADVERTISEMENT DETAILS -->
								<div class="modal-header">
					        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Update Advertisement</h5>
					      		</div>
					      		<div class="modal-body">
					      			<div class="form-group d-none row">
										<label class="col-sm-4 col-form-label d-flex">Id : </label> 
										<div class="col-sm-8">
											<input type="text" name="id-ead" value="<?php echo $a_id; ?>" required placeholder="Advertisement Id" class="form-control" id="id-ead"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Description : </label>
										<div class="col-sm-8">
											<textarea type="text" name="ead-detail" required placeholder="Write something about advertisement....." class="form-control" id="ead-detail"><?php echo $a_detail; ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Advertisement Link : </label> 
										<div class="col-sm-8">
											<input type="text" name="ead-link" value="<?php echo $a_link; ?>" required class="form-control" id="ead-link"/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label d-flex">Image : </label>  
										<div class="col-sm-6 d-flex justify-content-start">
											<input type="file" name="img-ead" required="" id="img-ead" />
										</div>
										<div class="col-sm-2">
											<img class="img-thumbnail" src="../uploads/<?php echo $a_img; ?>" width="100" style="height: 110px;">
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