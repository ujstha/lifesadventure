<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('inc/head.php'); ?>
<title>lifesadventure | Manage Adventures</title>
<?php include('inc/header.php'); ?>
<?php
    if($_SESSION['loginstatus']=="") {
        echo "<script>document.location = 'admin-login.php';</script>";
    }
?>

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
	.modal, .modal-dialog {
		z-index: 9999999 !important;
	}
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
</style>
<link rel="stylesheet" type="text/css" href="css/slickSlider1.css">
<!-- to get adventure img -->

<?php 
	include('func/function.php');
	if (isset($_GET['a_id'])) {
		if($_SESSION['loginstatus']=="") {
	        echo "<script>document.location = 'admin-login.php';</script>";
	    }
		$cn = makeconnection();
		$id = mysqli_real_escape_string($cn, $_GET['a_id']);
		$s = "SELECT * FROM adventure WHERE id='$id' ";
		$q = mysqli_query($cn, $s);
		$data = mysqli_fetch_array($q);
		?>

		<?php 
			$cn = makeconnection();
			$adv_id = $_GET['a_id'];
			$s_a = "SELECT image FROM adventure WHERE id={$adv_id}";
			$q_a = mysqli_query($cn, $s_a);
			$r_a = mysqli_num_rows($q_a);
			while ($data_a = mysqli_fetch_array($q_a)) {
				$image_a = $data_a['image'];
			?>
			<div id="pdfcontent"> 
		<div class="breadcumb-area height-700 bg-img bg-overlay" style="background: url(../uploads/<?php echo $image_a; ?>); background-position: center; background-size: cover;">
		<?php }
		?>	
		<!-- to get adventure img ends here -->	
		<!-- ***** Breadcumb Area Start ***** -->
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="breadcumb-content">
	                        <div class="map-ratings-review-area d-flex">
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
				                    <a target="_blank" href="http://maps.google.com/maps?daddr=<?php echo $row['street']; ?>&amp;ll=" class="d-flex align-items-center justify-content-center"><i class="fas fa-map"></i></a>
				                    <?php 
				                    	if ($rating > 0) { ?>
				                    		<a class="text-light">
				                    			<i class="fas fa-star" style="color: orange;"></i>
				                            	<?php echo round($rating, PHP_ROUND_HALF_UP); ?> / 5
							                  	<small>(<?php echo $rate_count; ?> votes)</small>
							                </a><!-- PHP_ROUND_HALF_UP round comparing .5 differences -->
				                    	<?php } else { ?>
				                    		<a class="text-light">
				                            	Not Rated yet
							                  	<small>(<?php echo $rate_count; ?> votes)</small>
							                </a><!-- PHP_ROUND_HALF_UP round comparing .5 differences -->
				                    	<?php }
				                    ?>
				                    <a><?php echo $row['adventure_comment_counter']; ?> Reviews</a>
				                <?php } ?>
	                        </div>
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
				                            <h6><?php echo $data['group_size']; ?> Type</h6>
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
	                                    <li><a href="#cform">Write Review</a></li>
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
										<section class="customer-logos slider">
											<div class="slide mr-2">
												<img class="image" data-toggle="modal" data-target="#imageModal" src="../uploads/<?php echo $a_img; ?>" style="height: 250px;">
											</div>
											<div class="slide mr-2">
												<img class="image" data-toggle="modal" data-target="#imageModal" src="../uploads/<?php echo $a_img1; ?>" style="height: 250px;">
											</div>
											<div class="slide mr-2">
												<img class="image" data-toggle="modal" data-target="#imageModal" src="../uploads/<?php echo $a_img2; ?>" style="height: 250px;">
											</div>
											<div class="slide mr-2">
												<img class="image" data-toggle="modal" data-target="#imageModal" src="../uploads/<?php echo $a_img3; ?>" style="height: 250px;">
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
																<img class="d-block w-100" src="../uploads/<?php echo $a_img; ?>" alt="First slide">
															</div>
															<div class="carousel-item">
																<img class="d-block w-100" src="../uploads/<?php echo $a_img1; ?>" alt="Second slide">
															</div>
															<div class="carousel-item">
																<img class="d-block w-100" src="../uploads/<?php echo $a_img2; ?>" alt="Second slide">
															</div>
															<div class="carousel-item">
																<img class="d-block w-100" src="../uploads/<?php echo $a_img3; ?>" alt="Second slide">
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
						                			<img src="../uploads/<?php echo $commenter_pic; ?>" class="commenter_pic">
						                		</div>
						                		<div class="ml-3" style="width: 100%; max-width: 100%; font-size: 12px;">
						                			<h6>Comment by <?php echo $commenter; ?></h6>
							                  		<i class="fa fa-clock-o"></i> &nbsp;<small><?php echo $comment_date; ?></small>
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
														<img class="image" src="../uploads/<?php echo $adData['image']; ?>" style="height: 300px;">
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
														<img class="image" src="../uploads/<?php echo $adData['image']; ?>" style="height: 300px;">
													</a>
													<a href="<?php echo $adData['link'];?>" target="_blank" style="position: absolute; top: 5px; left: 5px; background-color: #2a2a2a; color: white; padding: 5px 8px 5px 8px;">Sponsored</a>
												</div>
		                            		<?php }
	                            		}
	                            	?>
								</section>
	                        </div>

	                        <div class="listing-verify mt-50" style="border-bottom: 1px solid darkgrey;">
	                            <a href="accommodation.php" target="_blank" class="btn dorne-btn w-100"><i class="fas fa-hotel"></i> &nbsp; Book Accommodation</a>
	                        </div>
	                        <div class="listing-verify"  >
	                            <a href="transportAPI/transport.php" target="_blank" class="btn dorne-btn w-100"><i class="fas fa-bus-alt"></i> &nbsp; Book Transportation</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    </div>
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
	<?php }
?>

<?php include('inc/footer.php'); ?>
	