<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>
<?php include('inc/head.php'); ?>

<title>lifesadventure | Add Advertisements</title>
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
			$target_dir = "../uploads/";
			//img
			$target_file = $target_dir.basename($_FILES["img-ad"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check=getimagesize($_FILES["img-ad"]["tmp_name"]);
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
			if($_FILES["img-ad"]["size"]>500000){
				$uploadok=1;
			}
			//allow certain file formats
			if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
				$imgMsg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
				$imgMsgClass = 'alert-danger';
				$uploadok=0;
			} else {
				if(move_uploaded_file($_FILES["img-ad"]["tmp_name"], $target_file)){
					$i = 1; 
				} else {
					$imgMsg = "Sorry, there was an error uploading your file.";
					$imgMsgClass = 'alert-danger';
				}
			}
			
			if ($i > 0) {
				$s="INSERT INTO advertisement (`link`, `image`, `detail`) VALUES ('" . $_POST["ad-url"] . "', '" . basename($_FILES["img-ad"]["name"]) . "', '" . $_POST["ad-detail"] . "')";

				if (mysqli_query($cn,$s)) {
					$imgMsg = 'You have successfully added a new advertisement.';
					$imgMsgClass = 'alert-success'; 
				} else {
					$imgMsg = 'Adding new advertisement was unsuccessful. Please Try Again.';
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

<section class="bg-img bg-overlay" style="background-image: url(assets/tree.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
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
			        		<h5 class="modal-title text-light" style="margin: 0 auto; text-transform: uppercase;" id="exampleModalLongTitle">Add Advertisements</h5>
			      		</div>
			      		<div class="modal-body">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Description : </label>
								<div class="col-sm-8">
									<textarea type="text" name="ad-detail" required placeholder="Write something about advertisement....." class="form-control" id="ad-detail"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Advertisement Link : </label> 
								<div class="col-sm-8">
									<input type="url" name="ad-url" id="ad-url" placeholder="https://example.com" pattern="https://.*" size="30" required class="form-control" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label d-flex">Type Image : </label>  
								<div class="col-sm-8 d-flex justify-content-start">
									<input type="file" name="img-ad" required="" id="img-ad" />
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