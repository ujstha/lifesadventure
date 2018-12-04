<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php
	if(!isset($_SESSION['email_address'])) {
		header("location:index.php");
	}
?>
<?php if (isset($_SESSION['email_address'])) : ?>

<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>
<title><?php echo $profname . '.' . $prolname . '.0' . $id; ?>0</title>
<link rel="stylesheet" type="text/css" href="css/profile.css">
<style type="text/css">
	.profile-card-2 .profile {
	    border-radius: 50%;
	    position: absolute;
	    top: -42px;
	    left: 10%;
	    width: 90px;
	    height: 90px;
	    border: 3px solid rgba(255, 255, 255, 1);
	    -webkit-transform: translate(-50%, 0%);
	    transform: translate(-50%, 0%);
	}
	.profile-card-2 .profile-name {
	    position: absolute;
	    top: -60px;
	    left: 28%;
	    -webkit-transform: translate(-50%, 0%);
	    transform: translate(-50%, 0%);
	}
	.editor, .changer {
		border-radius: 1px;
	    position: absolute;
	    top: -60px;
	    right: 10px;
	    border: 1px solid rgba(255, 255, 255, 1);
	    text-decoration: none;
		color: black;
		background-color: white;
	}
	.changer {
		right: 150px;
	}
	a.editor:hover, a.changer:hover {
		color: black;
		background-color: darkgrey;
	}
	.nav {
		margin-left: 12%;
	}
	.tab-content {
		margin-top: 15px;
	}
	.tab-content p {
		color: black;
		font-size: 20px;
	}
	.tab-content h5 {
		margin: 0; 
		padding: 0;
	}
	.post-detail {
		border-bottom: 1px solid lightgrey;
	}
	.card.mt-3 {
		-moz-box-shadow: 8px 8px 8px 2px;
		-webkit-box-shadow: 8px 8px 8px 2px;
		box-shadow: 8px 8px 8px 2px;
	}
	.clearfix {
		position: relative;
	}
	.clearfix i.fa-ellipsis-v {
		position: absolute;
		right: 15px;
		top: 8px;
	}
	.description {
		border-bottom: 1px solid lightgrey;
	}
	.img.modal-footer, .img.modal-header {
		padding: 5px;
	}
	.modal, .modal-dialog, .modal-content {
		z-index: 9999999 !important;
	}
	#postimageModal.modal {
		background-color: #2a2a2a;
	}
	#postimageModal .modal-content {
		background-color: rgba(0,0,0,.8);
	}
	#postimageModal .close {
		color: white;
	}
	.image:hover {
		cursor: pointer;
	}
	.carousel-item, .carouse-item img {
		max-height: 600px;
	}
	#postimageModal .modal-footer button {
		border-radius: 0;
	}
	form .modal-footer .btn {
		border-radius: 0;
		padding: 8px 40px 8px 40px;
		margin: 8px;
	}
	.btn-orange {
		background-color: orange;
	}
	.post-image {
		width: 100%;
	}
	@media only screen and (max-width: 768px) {
		.profile-card-2 .profile {
			left: 15%;
			width: 75px;
			height: 75px;
		}
		.profile-card-2 .profile-name {
		    position: absolute;
		    top: -282px;
		    -webkit-transform: translate(-50%, 0%);
		    transform: translate(-50%, 0%);
		}
		.editor {
			top: -100px;
		    right: 0;
		}
		.changer {
			right: 0;
		}
		.nav {
			font-size: 10px;
			margin-left: 20%;
		}
		.post-image {
			width: 80px;
		}
		.col-md-4 {
			display: inline-block;
		}
	}
</style>

<section class="bg-img" style="background-image: url(assets/rain.jpg); padding-top: 10em; padding-bottom: 5em; background-attachment: fixed;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
            	<div class="card profile-card-2">
                    <div class="card-img-block" style="background-image: url(uploads/<?php echo $propic; ?>); background-size: cover; background-position: center;">
                    </div>
                    <div class="card-body">
                        <img src="uploads/<?php echo $propic; ?>" alt="<?php echo $profname; ?>" class="profile"/>
                        <div class="container-fluid content">
                        	<div class="col-md-12">
	                        	<a href="edit-profile.php" class="btn btn-sm editor">
                        			<i class="fas fa-pencil-alt"></i> Edit Profile
	                        	</a>
	                        	<a href="change-password.php?email=<?php echo $proemail; ?>" class="btn btn-sm changer">
                        			<i class="fas fa-key"></i> Change Password
	                        	</a>
	                        	<h3 class="card-title profile-name text-capitalize"><?php echo $profname.' '.$prolname; ?></h3>
	                        </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="false">Posts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="true">Photos</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<p><strong>Email : </strong><?php echo $proemail; ?></p>
								<p><strong>Gender : </strong><?php echo $progender; ?></p>
								<p><strong>Age : </strong><?php echo $proage; ?></p>
								<p><strong>Country : </strong><?php echo $procountry; ?></p>
							</div>
							<div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
								<?php 
									$cn = makeconnection();
									$s = "SELECT * FROM event WHERE customer_id = {$id}";
									$q = mysqli_query($cn, $s);
									$num = mysqli_num_rows($q);
									if ($num <= 0) {
										echo "<h1>No Posts Yet.</h1>";
									}
									while ($data = mysqli_fetch_array($q)) {
										?>
										<div class="card mt-3">
											<div class="post-detail">
												<div class="clearfix">
													<div class="d-flex justify-content-start mx-2 my-2">
														<img src="uploads/<?php echo $data['creator_pic']; ?>" style="height: 60px; width: 60px; border-radius: 50%; border: 2px solid white;">
														<div class="ml-2">
															<h5 class="text-capitalize"><?php echo $data['creator']; ?></h5>
															<small><?php echo date('M d, Y', strtotime($data['date_added'])); ?></small>
														</div>
													</div>
													<a id="popOver" style="text-decoration: none;">
								                		<i class="fas fa-ellipsis-v"
									                		tabindex="0"
									                		data-toggle="popover"
									                		data-trigger="focus"
									                		data-html=true
									                		data-content="<a style='color: black;' href='update-event.php?a_id=<?php echo $data['id']; ?>'><i class='fas fa-pencil-alt'></i>&nbsp;Edit...</a>
									                		<br>
									                		<a data-toggle='modal' data-target='#d-event<?php echo $data['id']; ?>'><i class='fas fa-trash'></i>&nbsp;Delete...</a>" 
									                	></i>
								                	</a>
													<div class="modal fade" id="d-event<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																<form method="post" action="delete-event.php?a_id=<?php echo $data['id']; ?>">
																	<div class="modal-body">
																		Are you sure you want to delete this post?
																	</div>
																	<div class="modal-footer p-0">
																		<button type="button" class="btn btn-light btn-md" data-dismiss="modal">
																			<i class="fas fa-ban"></i>
																		</button>
																		<button name="deleteevent" type="submit" class="btn btn-danger btn-md">
																			<i class="fas fa-trash"></i>
																		</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div style="border-bottom: 1px solid lightgrey;">
												<div class="col-md-6 offset-md-3 py-2">
													<img class="image" src="uploads/<?php echo $data['image']; ?>" data-toggle="modal" data-target="#postimageModal" style="height: auto; max-height: 400px; width: 100%;">
												</div>
											</div>
											<!-- Modal -->
											<div class="modal fade" id="postimageModal" tabindex="-1" role="dialog" aria-labelledby="postimageModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header img">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
																<div class="carousel-inner">
																	<div class="carousel-item active">
																		<img class="d-block w-100" src="uploads/<?php echo $data['image']; ?>" alt="First slide">
																	</div>
																	<div class="carousel-item">
																		<img class="d-block w-100" src="uploads/<?php echo $data['image1']; ?>" alt="Second slide">
																	</div>
																	<div class="carousel-item">
																		<img class="d-block w-100" src="uploads/<?php echo $data['image2']; ?>" alt="Second slide">
																	</div>
																</div>
																<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
																	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																	<span class="sr-only">Previous</span>
																</a>
																<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
																	<span class="carousel-control-next-icon" aria-hidden="true"></span>
																	<span class="sr-only">Next</span>
																</a>
															</div>
														</div>
														<div class="modal-footer img">
															<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<div class="mt-2 mx-4 description">
												<p><?php echo $data['description']; ?></p>
											</div>
										</div>
									<?php }
								?>	
							</div>
							<div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
								<div class="row">
									<div class="col-md-4">
										<img src="uploads/<?php echo $propic; ?>" style="height: 200px; width: 100%;">
									</div>
									<?php 
										$cn = makeconnection();
										$s = "SELECT * FROM event WHERE customer_id = {$id}";
										$q = mysqli_query($cn, $s);
										$num = mysqli_num_rows($q);
										
										while ($data = mysqli_fetch_array($q)) {
											?>
											<div class="col-md-4">
												<img src="uploads/<?php echo $data['image']; ?>" style="height: 200px; width: 100%;">
											</div>
											<div class="col-md-4">
												<img src="uploads/<?php echo $data['image1']; ?>" style="height: 200px; width: 100%;">
											</div>
											<div class="col-md-4 mt-3">
												<img src="uploads/<?php echo $data['image2']; ?>" style="height: 200px; width: 100%;">
											</div>
										<?php }
									?>
								</div>
							</div>
						</div>
                    </div>
                    
                </div>
    		</div>
		</div>
	</div>
</section>
<?php include('inc/footer.php'); ?>
<?php endif; ?>