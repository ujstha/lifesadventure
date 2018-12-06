<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('inc/head.php'); ?>

<?php include('func/function.php'); ?>

<title>lifesadventure | Adventure's List (admin)</title>
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
		z-index: 9999999 !important;
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
			<div class="col-lg-8 offset-lg-2">
				<div class="row">
					<?php 
						$cn = makeconnection();
						$s = "SELECT * FROM adventure";
						$q = mysqli_query($cn, $s);
						$r = mysqli_num_rows($q);

						while ($data = mysqli_fetch_array($q)) {
							$image = $data['image'];
						?>
						<div class="col-md-3 ftco-animate">
							<div class="destination">
								<div class="a-img">
									<a href="manage-adventures.php?a_id=<?php echo $data['id']; ?>">
										<img src="../uploads/<?php echo $image; ?>" alt="<?php echo $data['title']; ?>" style="height: 250px; width: 100%;">
									</a>
								</div>
								<div class="text p-3">
									<div class="d-flex">
										<div class="one">
											<h3>
												<a href="manage-adventures.php?a_id=<?php echo $data['id']; ?>" class="text-capitalize text-primary">
													<?php echo $data['title']; ?>		
												</a>
											</h3>
											<?php 
												$cn = makeconnection();
												$id_adv = $data['id'];
												$s_r = "SELECT adventure.adventure_comment_counter, adventure.street, adventure.adventure_rating_counter, adventure.id, AVG(rating.rating) AS rating
		                                              FROM adventure 
		                                              LEFT JOIN rating
		                                              ON adventure.id = rating.adventure_id
		                                              WHERE adventure.id = {$id_adv}";
												$q_r = mysqli_query($cn, $s_r);
												$r_r = mysqli_num_rows($q_r);

												while ($data_r = mysqli_fetch_array($q_r)) {
													if ($data_r['rating'] > 0) { ?>
														<p class="rate">
															<i class="fas fa-star"></i>
															<span><?php echo round($data_r['rating'], PHP_ROUND_HALF_UP); ?> Out of 5 Rating</span>
														</p>
													<?php } else { ?>
														<p class="rate">
															<i class="fas fa-star"></i>
															<span>Not Rated yet</span>
														</p>
													<?php }
												}
											?>
										</div>
										<div class="two">
											<span class="price">
												<a href="manage-adventures.php?a_id=<?php echo $data['id']; ?>#review">
													<small class="text-secondary">
														<span>
															<i class="fas fa-comments"></i>
															<?php echo $data['adventure_comment_counter']; ?>
														</span>
													</small>
												</a>
											</span>
										</div>
									</div>
									<div style="width: 100%; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
										<?php echo $data['description']; ?>
									</div>
									<hr>
									<p class="bottom-area d-flex">
										<span class="ml-auto">
											<a class="bg-danger" style="border-radius: 0;" data-toggle="modal" data-target="#d-adventure<?php echo $id_adv; ?>">Delete</a>
											<a class="bg-primary" style="border-radius: 0;" href="update-adventures.php?a_id=<?php echo $id_adv; ?>">Update</a>
										</span>
									</p>
									<div class="modal fade" id="d-adventure<?php echo $id_adv; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												<form method="post" action="delete-adventures.php?a_id=<?php echo $data['id']; ?>">
													<div class="modal-body">
														Are you sure you want to delete <?php echo $data['title']; ?> adventure?
													</div>
													<div class="modal-footer p-0">
														<button type="button" class="btn btn-light btn-md" data-dismiss="modal">
															Cancel
														</button>
														<button name="deleteadventures" type="submit" class="btn btn-danger btn-md">
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
	