<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('inc/head.php'); ?>

<?php include('func/function.php'); ?>

<title>lifesadvertisement | Advertisement's List (admin)</title>
<?php include('inc/header.php'); ?>
<?php
    if($_SESSION['loginstatus']=="") {
        echo "<script>document.location = 'admin-login.php';</script>";
    }
?>

<link rel="stylesheet" href="css/adventures/new-style.css">
<link rel="stylesheet" href="css/adventures/animate.css">

<style type="text/css">
	.destination .a-img {
		overflow: hidden;
	}
	.destination .a-img:hover img {
		transform: scale(1.2);
		transition: all .8s ease;
	}
	.bg-overlay .modal, .modal-dialog, .modal-content {
		border-radius: 0;
		z-index: 999999999 !important;
	}
	.modal button.btn {
		border-radius: 0;
		margin: 3px;
	}
	.ml-auto a:hover {
		cursor: pointer;
	}
</style>

<section class="bg-img" style="background-image: url(assets/sunset.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">	            
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<?php 
						$cn = makeconnection();
						$s = "SELECT * FROM advertisement";
						$q = mysqli_query($cn, $s);
						$r = mysqli_num_rows($q);

						while ($adData = mysqli_fetch_array($q)) {
							$image = $adData['image'];
						?>
						<div class="col-md-3 ftco-animate">
							<div class="destination">
								<div class="a-img">
									<a href="manage-advertisements.php?a_id=<?php echo $adData['id']; ?>">
										<img src="../uploads/<?php echo $image; ?>" alt="Ads<?php echo $adData['id']; ?>" style="height: 250px; width: 100%;">
									</a>
								</div>
								<div class="text p-3">
									<div style="width: 100%; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
										<?php echo $adData['detail']; ?>
									</div>
									<hr>
									<p class="bottom-area d-flex">
										<span class="ml-auto">
											<a class="bg-danger" style="border-radius: 0;" data-toggle="modal" data-target="#d-advertisement<?php echo $adData['id']; ?>">Delete</a>
											<a class="bg-primary" style="border-radius: 0;" href="update-advertisements.php?a_id=<?php echo $adData['id']; ?>">Update</a>
										</span>
									</p>
									<div class="modal fade" id="d-advertisement<?php echo $adData['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header pt-1 pb-1">
													<h5 class="modal-title" id="exampleModalLabel">
														Confirm Delete
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="post" action="delete-advertisements.php?a_id=<?php echo $adData['id']; ?>">
													<div class="modal-body">
														Are you sure you want to delete this advertisement?
													</div>
													<div class="modal-footer p-0">
														<button type="button" class="btn btn-light btn-md" data-dismiss="modal">
															Cancel
														</button>
														<button name="deleteadvertisements" type="submit" class="btn btn-danger btn-md">
															Delete
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }
					?>
				</div>
			</div> <!-- .col-md-9 -->
		</div>
	</div>
</section>


<?php include('inc/footer.php'); ?>
	