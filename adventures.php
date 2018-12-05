<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('inc/head.php'); ?>

<style type="text/css">
	.a-img img {
		height: 350px;
	}
	@media (min-width: 1024px) and (max-width: 1366px) {
		.a-img img {
    		height: 270px;
    	}
	}
	@media (min-width: 768px) and (max-width: 1023px) {
		.a-img img {
    		height: 265px;
    	}
	}	
</style>

<?php 
	include('func/function.php');
	if (isset($_GET['a_id'])) {
		$cn = makeconnection();
		$id = mysqli_real_escape_string($cn, $_GET['a_id']);
		$s = "SELECT * FROM adventure WHERE id='$id' ";
		$q = mysqli_query($cn, $s);
		$data = mysqli_fetch_array($q);
		?>

		<title>lifesadventure | <?php echo $data['title']; ?></title>
		<?php include('inc/header.php'); ?>
		<?php include('register.php'); ?>
		<?php include('sign-in.php'); ?>
	   
		<style type="text/css">
			.commenter_pic {
				width: 60px; 
				height: 60px; 
				border-radius: 50%;  
				margin-right: 5px; 
			}
			button.input-group-text:hover {
				cursor: pointer;
				color: blue;
			}
			.commentbutton button {
				width: auto !important;
			}
			.single-review-area .jumbotron {
				border-radius: 0;
				background-color: #f3edff;
			}
			.jumbotron {
				border-radius: 0;
			}
			.jumbotron .modal, .jumbotron .modal-dialog {
				z-index: 9999999 !important;
			}
			/*.modal, .modal-dialog, .modal-content {
				z-index: 9999999 !important;
			}*/
			.modal-footer .btn {
				border-radius: 0;
				padding: 8px 40px 8px 40px;
				margin: 8px;
			}
			.btn-orange {
				background-color: orange;
			}
			#popOver {
				cursor: pointer;
			}
			#advertisement p {
				position: absolute;
				top: calc(50% - 18px);
				left: 45%;
				height: 35px;
				background-color: #2a2a2a;
		        font-size: 12px;
		        line-height: 35px;
		        margin-bottom: 0;
		        padding: 0 15px;
		        font-weight: 600;
		        color: #fff;
		        z-index: 9;
			}
			.img.modal-footer, .img.modal-header {
				padding: 0 5px 0 0;
			}
			.listing-menu-area .modal {
				background-color: #2a2a2a;
			}
			.listing-menu-area .modal-content {
				background-color: rgba(0,0,0,.8);
			}
			.listing-menu-area .close {
				color: white;
			}
			.image:hover {
				cursor: pointer;
			}
			.carousel-item, .carouse-item img {
				max-height: 100%;
			}
			.commenter h6 {
				margin: 0;
				margin-bottom: 3px;
				padding: 0;
			}
			.map-ratings-review-area {
				right: 5px;
			}
			.map-ratings-review-area.creator {
				bottom: 0;
			}
			.map-ratings-review-area {
				bottom: 60px;
			}
			.map-ratings-review-area.creator a {
				background-color: #7643ea;
				color: white;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/slickSlider.css">
		<!-- to get adventure img -->
		<?php 
			$cn = makeconnection();
			$adv_id = $_GET['a_id'];
			$s_a = "SELECT * FROM adventure WHERE id={$adv_id}";
			$q_a = mysqli_query($cn, $s_a);
			$r_a = mysqli_num_rows($q_a);
			while ($data_a = mysqli_fetch_array($q_a)) {
				$image_a = $data_a['image'];
			?>
			<div id="pdfcontent" style="display: none;"> 
				<table>
					<tr>
						<th>Title</th>
						<td><?php echo $data_a['title']; ?></td>
					<tr>
					
					<tr>
						<th>Description</th>
						<td><?php echo $data_a['description']; ?></td>
					<tr>
					
					<tr>
						<th>Street</th>
						<td><?php echo $data_a['street']; ?></td>
					<tr>

					<tr>
						<th>Province</th>
						<td><?php echo $data_a['province']; ?></td>
					<tr>
					
					<tr>
						<th>Zip Code</th>
						<td><?php echo $data_a['zip']; ?></td>
					<tr>
					
					<tr>
						<th>Group Size</th>
						<td><?php echo $data_a['group_size']; ?></td>
					<tr>
					
					<tr>
						<th>Activity Level</th>
						<td><?php echo $data_a['activity_level']; ?></td>
					<tr>
					
					<tr>
						<th>Activity Type</th>
						<td><?php echo $data_a['activity_type']; ?></td>
					<tr>
				</table>
			</div>
			<div class="breadcumb-area height-700 bg-img bg-overlay" style="background: url(uploads/<?php echo $image_a; ?>); background-position: center; background-size: cover;">
			<?php }
			?>	
			<!-- to get adventure img ends here -->	
			<!-- ***** Breadcumb Area Start ***** -->
		        <div class="container">
		            <div class="row">
		                <div class="col-12">
		                    <div class="breadcumb-content">
	                        	<!-- Ratings -->
					            <?php
					            	$cn = makeconnection();
					                $adv_id = $_GET['a_id'];
					                $query = "SELECT adventure.adventure_comment_counter, adventure.street, adventure.adventure_rating_counter, adventure.id, AVG(rating.rating) AS rating
					                		  FROM adventure 
					                		  LEFT JOIN rating
					                		  ON adventure.id = rating.adventure_id
					                		  WHERE adventure.id = {$adv_id}";
					                $rate_query = mysqli_query($cn,$query);
					                if(!$rate_query){
					                    die("QUERY FAILED ". mysqli_error($cn));
					                }
					                while($row = mysqli_fetch_assoc($rate_query)){
					                    $rating = $row['rating'];
					                    $rate_count = $row['adventure_rating_counter'];
				                    ?>
				                    <div class="map-ratings-review-area d-flex">
					                    <a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $row['street']; ?>&amp;ll=" class="d-flex align-items-center justify-content-center"><i class="fas fa-map"></i></a>
					                    <?php 
					                    	if ($rating > 0) { ?>
					                    		<a class="text-dark">
					                    			<i class="fas fa-star" style="color: orange;"></i>
					                            	<?php echo round($rating, PHP_ROUND_HALF_UP); ?> / 5
								                  	<small>(<?php echo $rate_count; ?> votes)</small>
								                </a><!-- PHP_ROUND_HALF_UP round comparing .5 differences -->
					                    	<?php } else { ?>
					                    		<a class="text-light text-dark">
					                    			<i class="fas fa-star" style="color: orange;"></i>
					                            	Not Rated yet
								                </a><!-- PHP_ROUND_HALF_UP round comparing .5 differences -->
					                    	<?php }
					                    ?>
			                        </div>
			                        <div class="map-ratings-review-area creator d-flex">
			                        	<?php 
			                        		if ($row['adventure_comment_counter'] == 0) {
			                        			echo "<a href=''>No Reviews yet</a>";
			                        		} else { ?>
			                        			<a href=""><?php echo $row['adventure_comment_counter']; ?> Reviews</a>
			                        		<?php }
			                        	?>
			                        </div>
				                <?php } ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <!-- ***** Breadcumb Area End ***** -->

		    <!-- ***** Single Listing Area Start ***** -->
		    <section class="dorne-single-listing-area section-padding-100">
		        <div class="container">
		            <div class="row justify-content-center">
		                <!-- Single Listing Content -->
		                <div class="col-12 col-lg-8">
		                	<?php
						    	if(isset($_SESSION['email_address'])) {
						    		$cn = makeconnection();  
					                $s="select * from customer";
					                $result=mysqli_query($cn,$s);
					                $r=mysqli_num_rows($result);                            

					                while ($data=mysqli_fetch_array($result)) {
					                    if ($_SESSION["email_address"] == $data["email_address"]) {
					                        $c_id = $data['id'];
					                        $c_pic = $data['profile_pic'];
					                        $c_name = $data['first_name'];
					                    }
					                }
					                mysqli_close($cn);
						    	}
				            ?>
		                    <div class="single-listing-content">
		                    	<?php 
									if (isset($_GET['a_id'])) {
										$cn = makeconnection();
										$id = mysqli_real_escape_string($cn, $_GET['a_id']);   
					                    $view_query = "UPDATE adventure SET adventure_visit_counter = adventure_visit_counter + 1 WHERE id= '$id' ";
					                    $send_query = mysqli_query($cn, $view_query);
										$s = "SELECT * FROM adventure WHERE id='$id' ";
										$q = mysqli_query($cn, $s);
										while ($data = mysqli_fetch_array($q)) {
											$a_id = $data['id'];
											if ($id == $a_id) {
												$a_title = $data['title'];
												$a_description = $data['description'];
												$a_province = $data['province'];
												$a_street = $data['street'];
												$a_zip = $data['zip'];
												$a_group_size = $data['group_size'];
												$a_date = $data['date_added'];
												$a_img = $data['image'];
												$a_img1 = $data['image1'];
												$a_img2 = $data['image2'];
												$a_img3 = $data['image3'];
											?>

											<div class="listing-title">
					                            <h3 class="text-uppercase"><?php echo $data['title']; ?></h3>
					                            <a href="adventures.php?filter%5B%5D=<?php echo $data['group_size']; ?>"><h6><?php echo $data['group_size']; ?> Type</h6></a>
					                        </div>

					    					<?php }
										} 
									} else {
										header('location: index.php');
									}
								?>

		                        <div class="single-listing-nav">
		                            <nav>
		                                <ul id="listingNav">
		                                    <li class="active"><a href="#overview">Overview</a></li>
		                                    <li><a href="#images">Images</a></li>
		                                    <li><a href="#review">Reviews</a></li>
		                                    <?php
		                                    	if (isset($_SESSION['email_address'])) {
		                                    	 	echo "<li><a href='#cform'>Write Review</a></li>";
		                                    	 } 
		                                    ?>
		                                    <li><a href="#lomap">Location</a></li>
		                                </ul>
		                            </nav>
		                        </div>

		                        <div class="overview-content mt-40" id="overview">
		                            <h6><?php echo $a_description; ?></h6>
		                        </div>

		                        <div class="listing-menu-area" style="margin-top: 60px;" id="images">
		                            <h4 style="margin-bottom: 30px;">More Images</h4>
		                            <div class="row">
										<div class="col-md-12">
											<section class="more-image slider">
												<div class="slide mr-2">
													<img class="image" data-toggle="modal" data-target="#imageModal" src="uploads/<?php echo $a_img; ?>" style="height: 330px;">
												</div>
												<div class="slide mr-2">
													<img class="image" data-toggle="modal" data-target="#imageModal" src="uploads/<?php echo $a_img1; ?>" style="height: 330px;">
												</div>
												<div class="slide mr-2">
													<img class="image" data-toggle="modal" data-target="#imageModal" src="uploads/<?php echo $a_img2; ?>" style="height: 330px;">
												</div>
												<div class="slide mr-2">
													<img class="image" data-toggle="modal" data-target="#imageModal" src="uploads/<?php echo $a_img3; ?>" style="height: 330px;">
												</div>
											</section>
										</div>
		                            	<!-- Modal -->
										<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
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
																	<img class="d-block w-100" src="uploads/<?php echo $a_img; ?>" alt="First slide">
																</div>
																<div class="carousel-item">
																	<img class="d-block w-100" src="uploads/<?php echo $a_img1; ?>" alt="Second slide">
																</div>
																<div class="carousel-item">
																	<img class="d-block w-100" src="uploads/<?php echo $a_img2; ?>" alt="Second slide">
																</div>
																<div class="carousel-item">
																	<img class="d-block w-100" src="uploads/<?php echo $a_img3; ?>" alt="Second slide">
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
		                            </div>
		                        </div>

		                        <div class="listing-reviews-area" style="margin-top: 60px;" id="review">
		                            <h4 style="margin-bottom: 30px;">Reviews</h4>
		                            <div class="single-review-area">
		                            	<!-- Posted Comments -->
						                <?php
							                $adv_id = $_GET['a_id'];
							                $query = "SELECT * FROM comment WHERE adventure_id = {$adv_id} ";
							                $query .="ORDER BY id DESC ";
							                $select_comment_query = mysqli_query($cn,$query);
							                if(!$select_comment_query){
							                    die("QUERY FAILED ". mysqli_error($cn));
							                } 
							                if (mysqli_num_rows($select_comment_query) <= 0) {
							                	echo "<h1>No Reviews yet....</h1>";
							                }						       
							                while($row = mysqli_fetch_assoc($select_comment_query)){
							                	$comment_id = $row['id'];
							                	$commenter_id = $row['customer_id'];
							                	$commenter = $row['commenter'];
							                    $comment_date = $row['date_commented'];
							                    $comment_date = date('M d, Y', strtotime($comment_date));
							                    $commenter_pic = $row['commenter_pic'];
							                    $comment_text = $row['comment_txt'];
						                    ?>
						                    <!-- Comment -->
							                <div class="jumbotron p-2 mt- 0 text-dark" style="width: auto;">
							                	<div class="d-flex justify-content-start commentbutton">
							                		<div>
							                			<img src="uploads/<?php echo $commenter_pic; ?>" class="commenter_pic">
							                		</div>
							                		<div class="ml-3 commenter" style="width: 100%; max-width: 100%; font-size: 12px;">
							                			<h6>Comment by <?php echo $commenter; ?></h6>
								                  		<i class="fa fa-clock-o"></i> &nbsp;<small><?php echo $comment_date; ?></small>
								                  		<?php 
								                  			$cn = makeconnection();
										                	if (isset($_SESSION['email_address'])) {
										                		if ($c_id != $commenter_id) { ?>
										                			<div style="font-size: 16px; width: 100%; word-break: break-all;">
													                	<?php echo $comment_text; ?>
													                </div>
										                		<?php } else {?>
										                			<div style="font-size: 16px; width: 100%; word-break: break-all;">
													                	<?php echo $comment_text; ?>
													                	&nbsp;
													                	<a id="popOver" style="text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Edit or Delete this comment">
													                		<i class="fas fa-ellipsis-h"
														                		tabindex="0"
														                		data-toggle="popover"
														                		data-trigger="focus"
														                		data-html=true
														                		data-content="<a data-toggle='modal' data-target='#e-comment<?php echo $comment_id; ?>'><i class='fas fa-pencil-alt'></i>&nbsp;Edit...</a>
														                		<br>
														                		<a data-toggle='modal' data-target='#d-comment<?php echo $comment_id; ?>'><i class='fas fa-trash'></i>&nbsp;Delete...</a>" 
														                	></i>
													                	</a>
													                	<div class="modal fade" id="e-comment<?php echo $comment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header pt-1 pb-1">
																						<h5 class="modal-title" id="exampleModalLabel">
																							Edit
																						</h5>
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<form method="post" action="edit-comment.php?a_id=<?php echo $id; ?>&c_id=<?php echo $comment_id; ?>">
																						<div class="modal-body">
																							<textarea type="text" name="commenttext" class="form-control"><?php echo $comment_text; ?></textarea>
																						</div>
																						<div class="modal-footer p-0">
																							<button type="button" class="btn btn-light btn-lg" data-dismiss="modal">
																								<i class="fas fa-ban"></i>
																							</button>
																							<button name="changecomment" type="submit" class="btn btn-orange btn-lg">
																								<i class="fas fa-pencil-alt"></i>
																							</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>

																		<div class="modal fade" id="d-comment<?php echo $comment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																					<form method="post" action="edit-comment.php?a_id=<?php echo $id; ?>&c_id=<?php echo $comment_id; ?>">
																						<div class="modal-body">
																							Are you sure you want to delete this comment?
																						</div>
																						<div class="modal-footer p-0">
																							<button type="button" class="btn btn-light btn-lg" data-dismiss="modal">
																								<i class="fas fa-ban"></i>
																							</button>
																							<button name="deletecomment" type="submit" class="btn btn-danger btn-lg">
																								<i class="fas fa-trash"></i>
																							</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
													                </div>
										                		<?php }
										                	} else { ?>
										                		<div style="font-size: 16px; width: 100%; word-break: break-all;">
												                	<?php echo $comment_text; ?>
												                </div>
										                	<?php }
										                ?>
							                		</div>
							                	</div>
								            </div>
						                <?php } ?>  <!-- while tag closing -->
		                            </div>
		                        </div>
		                        <?php if(isset($_SESSION['email_address'])): ?>
						    		<?php
					                    if(isset($_POST['create_comment'])){
					                    	$cn = makeconnection();
					                        $adv_id = $_GET['a_id'];
					                        $comment_text = $_POST['comment_text'];
					                        if(empty($comment_text)){
				                                echo"<script>
				                                        alert('Empty comments are not allowed.');
				                                    </script>";
				                            } else {
				                            	$s = "INSERT INTO comment (commenter, commenter_pic, comment_txt, adventure_id, customer_id) VALUES ('{$c_name}', '{$c_pic}', '{$comment_text}', '{$adv_id}', '{$c_id}')";
				                           
					                            $q = mysqli_query($cn,$s);
					                             if(!$q){
					                                die("QUERY FAILED".mysqli_error($cn));
					                            }
					                            $query = "UPDATE adventure SET adventure_comment_counter = adventure_comment_counter + 1 WHERE id = '{$adv_id}'";
					                          
					                            $update_comment_count = mysqli_query($cn,$query);
				                            }
					                    }
					                ?>

					                <div class="location-on-map" id="cform">
					                	<h4 style="margin-bottom: 30px;">Write Review</h4>
					                	<!-- Comments Form -->
						                <div class="jumbotron p-2 text-dark">
						                	<div class="d-flex float-left">
							               		<label for="exampleFormControlTextarea6">Leave a Review</label>
							               	</div>
						                	<div class="d-flex float-right">
							                	Rate : &nbsp;
								                <?php foreach (range(1, 5) as $rating) : ?>
								                	<a href="rate.php?a_id=<?php echo $id; ?>&rating=<?php echo $rating; ?>"><?php echo $rating; ?> &nbsp;</a>
								                <?php endforeach; ?>
							                </div>
						                    <form role="form" method="post" action="">
						                    	<div class="input-group">
												  	<input class="form-control" aria-describedby="basic-addon2" name="comment_text" placeholder="Write your review here....."/>
												  	<div class="input-group-append">
												    	<button type="submit" name="create_comment" style="border-top-right-radius: 2px;"><i class="material-icons p-1" id="basic-addon2">send</i></button>
												  	</div>
												</div>
						                    </form>
						                </div>
					                </div>
					            <?php endif; ?>
					            <div class="location-on-map" id="lomap">
		                            <h4 style="margin-bottom: 30px;">Location</h4>
		                            <a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $a_street; ?>&amp;ll=">
		                            	<h5><?php echo $a_street; ?>, <?php echo $a_zip; ?> <?php echo $a_province; ?></h5>
		                            </a>
		                        </div>
		                        <div class="listing-menu-area" style="margin-top: 60px;">
			                        <h4 style="margin-bottom: 30px;">Advertisement</h4>
			                        <div style="position: relative;" id="advertisement">
			                        	<?php 
		                            		$cn = makeconnection();
		                            		$s = "SELECT * FROM advertisement";
		                            		$q = mysqli_query($cn, $s);
		                            		if (mysqli_num_rows($q) <= 0) {
		                            			echo "<h1>No Advertisement....</h1>";
		                            		} else {
		                            			while ($adData = mysqli_fetch_array($q)) { ?>
			                            			<div class="slide" style="position: relative;">
														<a href="<?php echo $adData['link'];?>" target="_blank">
															<img class="image" src="uploads/<?php echo $adData['image']; ?>" style="height: 300px;">
														</a>
														<a href="<?php echo $adData['link'];?>" target="_blank" style="position: absolute; top: 5px; left: 5px; background-color: #2a2a2a; color: white; padding: 5px 8px 5px 8px;">Sponsored</a>
													</div>
			                            		<?php }
		                            		}
		                            	?>
			                        </div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Listing Sidebar -->
		                <div class="col-12 col-md-8 col-lg-4">
		                    <div class="listing-sidebar">

		                        <!-- Listing Verify -->
		                        <div class="listing-verify">
		                            <a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $a_street; ?>&amp;ll=" class="btn dorne-btn w-100"><i class="fas fa-map"></i> &nbsp; Get Location</a>
		                        </div>
		                        <div class="listing-verify"  style="margin-top: 10px;">
		                            <a href="#" id="downloadPDF" class="btn dorne-btn w-100"><i class="fas fa-download"></i> &nbsp; Download PDF</a>
		                        </div>
		                       	
		                        <!-- Book A Table Widget -->
		                        <div class="book-a-table-widget mt-50">
		                            <h6>Advertisement</h6>
		                            <section class="advertise slider">
		                            	<?php 
		                            		$cn = makeconnection();
		                            		$s = "SELECT * FROM advertisement";
		                            		$q = mysqli_query($cn, $s);
		                            		if (mysqli_num_rows($q) <= 0) {
		                            			echo "<h3>No Advertisement....</h3>";
		                            		} else {
		                            			while ($adData = mysqli_fetch_array($q)) { ?>
			                            			<div class="slide" style="position: relative;">
														<a href="<?php echo $adData['link'];?>" target="_blank">
															<img class="image" src="uploads/<?php echo $adData['image']; ?>" style="height: 300px;">
														</a>
														<a href="<?php echo $adData['link'];?>" target="_blank" style="position: absolute; top: 5px; left: 5px; background-color: #2a2a2a; color: white; padding: 5px 8px 5px 8px;">Sponsored</a>
													</div>
			                            		<?php }
		                            		}
		                            	?>
									</section>
		                        </div>

		                        <div class="listing-verify mt-50" style="border-bottom: 1px solid darkgrey;">
		                            <a href="accommodation.php" class="btn dorne-btn w-100"><i class="fas fa-hotel"></i> &nbsp; Book Accommodation</a>
		                        </div>
		                        <div class="listing-verify"  >
		                            <a href="transportAPI/transport.php" target="_blank" class="btn dorne-btn w-100"><i class="fas fa-bus-alt"></i> &nbsp; Book Transportation</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
	    <div id="pdf"></div>
	    <!-- ***** Single Listing Area End ***** -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
	    <script>
			var doc = new jsPDF();
			var specialElementHandlers = {
				'#pdf': function (element, renderer) {
					return true;
				}
			};

			$('#downloadPDF').click(function () {   
				doc.fromHTML($('#pdfcontent').html(), 15, 15, {
					'width': 1000,
						'elementHandlers': specialElementHandlers
				});
				doc.save('<?php echo $a_title; ?>.pdf');
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.more-image').slick({
			        slidesToShow: 2,
			        slidesToScroll: 1,
			        autoplay: true,
			        autoplaySpeed: 3000,
			        arrows: false,
			        dots: false,
			        pauseOnHover: true,
			        responsive: [{
			            breakpoint: 768,
			            settings: {
			                slidesToShow: 1
			            }
			        }, {
			            breakpoint: 520,
			            settings: {
			                slidesToShow: 1
			            }
			        }]
			    });
			    $('.advertise').slick({
			        slidesToShow: 1,
			        slidesToScroll: 1,
			        autoplay: true,
			        autoplaySpeed: 3000,
			        arrows: false,
			        dots: false,
			        pauseOnHover: true,
			        responsive: [{
			            breakpoint: 768,
			            settings: {
			                slidesToShow: 1
			            }
			        }, {
			            breakpoint: 520,
			            settings: {
			                slidesToShow: 1
			            }
			        }]
			    });
			});
		</script>

	<?php } elseif (isset($_GET['filter'])) {
		$sizes = $_GET['filter'];

		?>
		<title>lifesadventure | Adventure's List</title>
		<?php include('inc/header.php'); ?>
		<?php include('register.php'); ?>
		<?php include('sign-in.php'); ?>

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
	    	.editor.price-start p {
		        position: absolute;
		        top: 210px !important;
		        left: 0px;
		        /*background-color: #2a2a2a;*/
		        background-color: #30c0a3;
		        height: 35px;
		        font-size: 12px;
		        line-height: 35px;
		        margin-bottom: 0;
		        padding: 0 15px;
		        font-weight: 600;
		        color: #fff;
		        z-index: 9;
		    }
	    	.multiselect {
				width: 200px;
			}
			.selectBox, .selectBox1, .selectBox2, .selectBox3 {
				position: relative;
			}
			.selectBox select, .selectBox1 select, .selectBox2 select, .selectBox3 select {
				width: 100%;
				font-weight: normal;
				height: 50px;
				padding-left: 20px;
				background-color: white;
				border: 1px #dadada solid;
			}
			.overSelect, .overSelect1, .overSelect2, .overSelect3 {
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
			}
			#checkboxes, #checkboxes1, #checkboxes2, #checkboxes3 {
				display: none;
				border: 1px #dadada solid;
				padding: 10px;
			}
			#checkboxes label, #checkboxes1 label, #checkboxes2 label, #checkboxes3 label {
				display: block;
			}
			#checkboxes label:hover, #checkboxes1 label:hover, #checkboxes2 label:hover, #checkboxes3 label:hover {
				background-color: #1e90ff;
			}
			.area, .area:hover {
				font-size: 6px;
				font-weight: normal;
				color: black !important;
				text-decoration: none;
			}
	    </style>

		<section class="bg-img bg-overlay-9" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">	            
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 ftco-animate">
						<div class="sidebar-wrap bg-light ftco-animate">
							<h3 class="heading mb-4">Find Adventures</h3>
							<form action="adventures.php" method="get">
								<div class="fields">
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox" onclick="showCheckboxes()">
												<select>
													<option>Filter by Group size</option>
												</select>
												<div class="overSelect"></div>
											</div>
											<div id="checkboxes">
												<label for="family">
													<input type="checkbox" value="Family" name="filter[]" id="family" /> Family
												</label>
												<label for="solo">
													<input type="checkbox" value="Solo" name="filter[]" id="solo" /> Solo
												</label>
												<label for="duo">
													<input type="checkbox" value="Duo" name="filter[]" id="duo" /> Duo
												</label>
												<label for="group">
													<input type="checkbox" value="Group" name="filter[]" id="group" /> Group
												</label>
												<label for="couple">
													<input type="checkbox" value="Couple" name="filter[]" id="couple" /> Couple
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox1" onclick="showCheckboxes1()">
												<select>
													<option>Filter by Activity Type</option>
												</select>
												<div class="overSelect1"></div>
											</div>
											<div id="checkboxes1">
												<label for="notspecified">
													<input type="checkbox" value="Not Specified" name="filter[]" id="notspecified" /> Not Specified
												</label>
												<label for="cycling">
													<input type="checkbox" value="Cycling" name="filter[]" id="cycling" /> Cycling
												</label>
												<label for="walking">
													<input type="checkbox" value="Walking" name="filter[]" id="walking" /> Walking
												</label>
												<label for="driving">
													<input type="checkbox" value="Driving" name="filter[]" id="driving" /> Driving
												</label>
												<label for="horseriding">
													<input type="checkbox" value="Horse Riding" name="filter[]" id="horseriding" /> Horse Riding
												</label>
												<label for="flying">
													<input type="checkbox" value="Flying" name="filter[]" id="flying" /> Flying
												</label>
												<label for="shooting">
													<input type="checkbox" value="Shooting" name="filter[]" id="shooting" /> Shooting
												</label>
												<label for="wateractivities">
													<input type="checkbox" value="Water Acitvities" name="filter[]" id="wateractivities" /> Water Acitvities
												</label>
												<label for="wilderness">
													<input type="checkbox" value="Wilderness" name="filter[]" id="wilderness" /> Wilderness
												</label>
												<label for="climbing">
													<input type="checkbox" value="Climbing" name="filter[]" id="climbing" /> Climbing
												</label>
												<label for="festivals">
													<input type="checkbox" value="Festivals" name="filter[]" id="festivals" /> Festivals
												</label>
												<label for="museums">
													<input type="checkbox" value="Museums" name="filter[]" id="museums" /> Museums
												</label>
												<label for="music">
													<input type="checkbox" value="Music" name="filter[]" id="music" /> Music
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox2" onclick="showCheckboxes2()">
												<select>
													<option>Filter by Acitvity Level</option>
												</select>
												<div class="overSelect2"></div>
											</div>
											<div id="checkboxes2">
												<label for="nspecified">
													<input type="checkbox" value="Not Specified" name="filter[]" id="nspecified" /> Not Specified
												</label>
												<label for="high">
													<input type="checkbox" value="High" name="filter[]" id="high" /> High
												</label>
												<label for="medium">
													<input type="checkbox" value="Medium" name="filter[]" id="medium" /> Medium
												</label>
												<label for="low">
													<input type="checkbox" value="Low" name="filter[]" id="low" /> Low
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox3" onclick="showCheckboxes3()">
												<select>
													<option>Filter by Province</option>
												</select>
												<div class="overSelect3"></div>
											</div>
											<div id="checkboxes3">
												<label for="leinster">
													<input type="checkbox" value="Leinster" name="filter[]" id="leinster" /> Leinster
												</label>
												<label for="munster">
													<input type="checkbox" value="Munster" name="filter[]" id="munster" /> Munster
												</label>
												<label for="connacht">
													<input type="checkbox" value="Connacht" name="filter[]" id="connacht" /> Connacht
												</label>
												<label for="ulster">
													<input type="checkbox" value="Ulster" name="filter[]" id="ulster" /> Ulster
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Search" class="btn btn-primary py-3 px-5">
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="row">
					    	<?php 
								foreach ($sizes as $size) {
									$cn = makeconnection();
							        $query = "SELECT * FROM adventure WHERE group_size LIKE '%$size%' OR activity_type LIKE '%$size%' OR activity_level LIKE '%$size%' OR province LIKE '%$size%'";
							        $search_query = mysqli_query($cn,$query);
							        if(!$search_query){
							            die("QUERY FAILED" . mysqli_error($cn));
							        }
							        $count = mysqli_num_rows($search_query);
							        if($count >= 0) {
							        
						                while($data = mysqli_fetch_assoc($search_query)) {
											$adv_date_added = $data['date_added'];
											$adv_date_added = date('M d, Y', strtotime($adv_date_added));     
											$adv_image = $data['image']; 
											$adv_image1 = $data['image1'];  
											$adv_image2 = $data['image2'];         
											$adv_image3 = $data['image3'];  
						    			?>
						    			<div class="col-md-4 ftco-animate">
											<div class="destination single-features-area">
												<div class="a-img">
													<a href="adventures.php?a_id=<?php echo $data['id']; ?>">
														<img src="uploads/<?php echo $adv_image; ?>" alt="<?php echo $data['title']; ?>" style="width: 100%;">
													</a>
												</div>
												<!-- Price -->
								                <div class="price-start editor">
								                    <p><?php echo $data['group_size']; ?> Type</p>
								                </div>
												<div class="text p-3">
													<div class="d-flex">
														<div class="one">
															<h3>
																<a href="adventures.php?a_id=<?php echo $data['id']; ?>" class="text-capitalize text-primary">
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
																<a href="adventures.php?a_id=<?php echo $data['id']; ?>#review">
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
														<a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $data['street']; ?>&amp;ll=" class="area">
															<span>
																<i class="fas fa-map"></i> <?php echo $data['street']; ?>, <?php echo $data['province']; ?>
															</span>
														</a>
														<span class="ml-auto">
															<a class="bg-primary" style="border-radius: 0;" href="adventures.php?a_id=<?php echo $data['id']; ?>">Explore</a>
														</span>
													</p>
												</div>
											</div>
										</div>			             
						        	<?php }
						            }
								} 
							?>
						</div>
					</div> <!-- .col-md-9 -->
				</div>
			</div>
		</section>

	<?php } else { ?>

		<title>lifesadventure | Adventure's List</title>
		<?php include('inc/header.php'); ?>
		<?php include('register.php'); ?>
		<?php include('sign-in.php'); ?>

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
	    	.multiselect {
				width: 200px;
			}
			.selectBox, .selectBox1, .selectBox2, .selectBox3 {
				position: relative;
			}
			.selectBox select, .selectBox1 select, .selectBox2 select, .selectBox3 select {
				width: 100%;
				font-weight: normal;
				height: 50px;
				padding-left: 20px;
				background-color: white;
				border: 1px #dadada solid;
			}
			.overSelect, .overSelect1, .overSelect2, .overSelect3 {
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
			}
			#checkboxes, #checkboxes1, #checkboxes2, #checkboxes3 {
				display: none;
				border: 1px #dadada solid;
				padding: 10px;
			}
			#checkboxes label, #checkboxes1 label, #checkboxes2 label, #checkboxes3 label {
				display: block;
			}
			#checkboxes label:hover, #checkboxes1 label:hover, #checkboxes2 label:hover, #checkboxes3 label:hover {
				background-color: #1e90ff;
			}
			.area, .area:hover {
				font-size: 6px;
				font-weight: normal;
				color: black !important;
				text-decoration: none;
			}
			.block-27 ul {
				padding: 0;
				margin: 0; 
				max-width: 100%;
			}
			.block-27 ul li {
				display: inline-block;
				margin-bottom: 4px;
				font-weight: 400; 
			}
			.block-27 ul li a, .block-27 ul li span {
				color: #e9ecef;
				text-align: center;
				display: inline-block;
				width: 40px;
				height: 40px;
				line-height: 40px;
				border-radius: 50%;
			}
			.block-27 ul li.active a, .block-27 ul li.active span {
				background: #e9ecef;
				color: #f85959;
				border: 1px solid transparent; 
			}
	    </style>

		<section class="bg-img bg-overlay-9" style="background-image: url(assets/ireland.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">	            
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 ftco-animate">
						<div class="sidebar-wrap bg-light ftco-animate">
							<h3 class="heading mb-4">Find Adventures</h3>
							<form action="adventures.php" method="get">
								<div class="fields">
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox" onclick="showCheckboxes()">
												<select>
													<option>Filter by Group size</option>
												</select>
												<div class="overSelect"></div>
											</div>
											<div id="checkboxes">
												<label for="family">
													<input type="checkbox" value="Family" name="filter[]" id="family" /> Family
												</label>
												<label for="solo">
													<input type="checkbox" value="Solo" name="filter[]" id="solo" /> Solo
												</label>
												<label for="duo">
													<input type="checkbox" value="Duo" name="filter[]" id="duo" /> Duo
												</label>
												<label for="group">
													<input type="checkbox" value="Group" name="filter[]" id="group" /> Group
												</label>
												<label for="couple">
													<input type="checkbox" value="Couple" name="filter[]" id="couple" /> Couple
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox1" onclick="showCheckboxes1()">
												<select>
													<option>Filter by Activity Type</option>
												</select>
												<div class="overSelect1"></div>
											</div>
											<div id="checkboxes1">
												<label for="notspecified">
													<input type="checkbox" value="Not Specified" name="filter[]" id="notspecified" /> Not Specified
												</label>
												<label for="cycling">
													<input type="checkbox" value="Cycling" name="filter[]" id="cycling" /> Cycling
												</label>
												<label for="walking">
													<input type="checkbox" value="Walking" name="filter[]" id="walking" /> Walking
												</label>
												<label for="driving">
													<input type="checkbox" value="Driving" name="filter[]" id="driving" /> Driving
												</label>
												<label for="horseriding">
													<input type="checkbox" value="Horse Riding" name="filter[]" id="horseriding" /> Horse Riding
												</label>
												<label for="flying">
													<input type="checkbox" value="Flying" name="filter[]" id="flying" /> Flying
												</label>
												<label for="shooting">
													<input type="checkbox" value="Shooting" name="filter[]" id="shooting" /> Shooting
												</label>
												<label for="wateractivities">
													<input type="checkbox" value="Water Acitvities" name="filter[]" id="wateractivities" /> Water Acitvities
												</label>
												<label for="wilderness">
													<input type="checkbox" value="Wilderness" name="filter[]" id="wilderness" /> Wilderness
												</label>
												<label for="climbing">
													<input type="checkbox" value="Climbing" name="filter[]" id="climbing" /> Climbing
												</label>
												<label for="festivals">
													<input type="checkbox" value="Festivals" name="filter[]" id="festivals" /> Festivals
												</label>
												<label for="museums">
													<input type="checkbox" value="Museums" name="filter[]" id="museums" /> Museums
												</label>
												<label for="music">
													<input type="checkbox" value="Music" name="filter[]" id="music" /> Music
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox2" onclick="showCheckboxes2()">
												<select>
													<option>Filter by Acitvity Level</option>
												</select>
												<div class="overSelect2"></div>
											</div>
											<div id="checkboxes2">
												<label for="nspecified">
													<input type="checkbox" value="Not Specified" name="filter[]" id="nspecified" /> Not Specified
												</label>
												<label for="high">
													<input type="checkbox" value="High" name="filter[]" id="high" /> High
												</label>
												<label for="medium">
													<input type="checkbox" value="Medium" name="filter[]" id="medium" /> Medium
												</label>
												<label for="low">
													<input type="checkbox" value="Low" name="filter[]" id="low" /> Low
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="select-wrap one-third">
											<div class="selectBox3" onclick="showCheckboxes3()">
												<select>
													<option>Filter by Province</option>
												</select>
												<div class="overSelect3"></div>
											</div>
											<div id="checkboxes3">
												<label for="leinster">
													<input type="checkbox" value="Leinster" name="filter[]" id="leinster" /> Leinster
												</label>
												<label for="munster">
													<input type="checkbox" value="Munster" name="filter[]" id="munster" /> Munster
												</label>
												<label for="connacht">
													<input type="checkbox" value="Connacht" name="filter[]" id="connacht" /> Connacht
												</label>
												<label for="ulster">
													<input type="checkbox" value="Ulster" name="filter[]" id="ulster" /> Ulster
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Search" class="btn btn-primary py-3 px-5">
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="row">
							<?php
								$cn = makeconnection();
								$per_page = 6;
				                if(isset($_GET['page'])){
				                    $page = $_GET['page'];
				                } else {
				                    $page ="";
				                }
				                
				                if($page == "" || $page == 1){
				                    $page_1 = 0;
				                } else {
				                    $page_1 =($page * $per_page) - $per_page;
				                }

				                $adv_query_count ="SELECT * FROM adventure";
				                $find_count  = mysqli_query($cn,$adv_query_count);
				                $count = mysqli_num_rows($find_count);
				                
				                $count = ceil($count / $per_page);

								$s = "SELECT * FROM adventure LIMIT $page_1,$per_page";
								$q = mysqli_query($cn, $s);
								$r = mysqli_num_rows($q);

								while ($data = mysqli_fetch_array($q)) {
									$image = $data['image'];
								?>
								<div class="col-md-4 ftco-animate">
									<div class="destination">
										<div class="a-img">
											<a href="adventures.php?a_id=<?php echo $data['id']; ?>">
												<img src="uploads/<?php echo $image; ?>" alt="<?php echo $data['title']; ?>" style="width: 100%;">
											</a>
										</div>
										<div class="text p-3">
											<div class="d-flex">
												<div class="one">
													<h3>
														<a href="adventures.php?a_id=<?php echo $data['id']; ?>" class="text-capitalize text-primary">
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
														<a href="adventures.php?a_id=<?php echo $data['id']; ?>#review">
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
												<a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $data['street']; ?>&amp;ll=" class="area">
													<span>
														<i class="fas fa-map"></i> <?php echo $data['street']; ?>, <?php echo $data['province']; ?>
													</span>
												</a> 
												<span class="ml-auto">
													<a class="bg-primary" style="border-radius: 0;" href="adventures.php?a_id=<?php echo $data['id']; ?>">Explore</a>
												</span>
											</p>
										</div>
									</div>
								</div>
							<?php }
							?>
						</div>
					</div> <!-- .col-md-9 -->
				</div>
				<div class="row mt-5">
					<div class="col text-center">
						<div class="block-27">
							<ul>
								<?php
									for ($page=1; $page <= $count ; $page++) { 
										$page_next = $page_1+1;
										if ($page == $page_next) { ?>
											<li class='active'><span><a href='adventures.php?page=<?php echo $page; ?>'><?php echo $page; ?></a></span></li>
										<?php } elseif ($page == $page_next+1) { ?>
											<li><span><a href='adventures.php?page=<?php echo $page_next+1; ?>'><i class="fas fa-angle-right"></i></a></span></li>
											<li><span><a href='adventures.php?page=<?php echo $count; ?>'><i class="fas fa-angle-double-right"></i></a></span></li>
										<?php } elseif ($page == $page_next-1) { 
											if ($page_next > 2) { ?>
												<li><span><a href='adventures.php'><i class="fas fa-angle-double-left"></i></a></span></li>
											<?php } ?>
											<li><span><a href='adventures.php?page=<?php echo $page_next-1; ?>'><i class="fas fa-angle-left"></i></a></span></li>
										<?php }
									} 
			                    ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php }
?>

<?php include('inc/footer.php'); ?>
	