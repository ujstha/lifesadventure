<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<title>lifesadventure | Accommodation List</title>
<?php include('inc/header.php'); ?>
<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>

<style type="text/css">
    .dorne-listing-destinations-area .bui-review-score__badge, .bui-review-score__title, .bui-review-score__text {
        position: absolute;
        top: 60px;
        left: 20px;
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
    .bui-review-score__title {
    	top: 20px;
    	background-color: #7643ea;
    	width: auto;
    }
    .bui-review-score__text {
    	background-color: white;
    	color: black;
    	left: 65px;
    }
    .accommodation.form-control {
        border-radius: 0;
    }
    span.hp__hotel-type-badge {
    	display: none;
    }
    h2.hp__hotel-name {
    	font-size: 18px;
    	text-transform: uppercase;
    }
    .single-features-area img {
    	height: 300px;
    	max-height: 300px;
    	width: 100%;
    }
    .feature-content {
    	padding: 0;
    }
    .feature-title {
    	margin-top: 2px;
    	padding-top: 5px;
    }
    .read-more {
    	border-radius: 0;
    	margin-left: auto;
    }
    @media only screen and (max-width: 600px) {
        .dorne-welcome-area {
            padding-top: 25%;
        }
        .hero-search-form {
	    	margin: 0;
	    	padding: 0;
	    }
    }
</style>

<!-- ***** Welcome Area Start ***** -->
<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(assets/parliament.jpg); background-attachment: fixed;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <div class="hero-content">
                    <h2 style="font-family: 'Poiret One', cursive;">Find Accommodation</h2>
                    <h4 style="font-family: 'Cormorant Upright', cursive;">From cosy country homes to funky city flats</h4>
                </div>
                
                <!-- Hero Search Form -->
                <div class="hero-search-form">
                    <!-- Tabs -->
                    <div class="nav nav-tabs" id="heroTab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Places</a>
                        <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Events</a>
                    </div>
                    <!-- Tabs Content -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                            <h6>Search for Accommodation</h6>
                            <form action="accommodation.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>
                                            <p class="text-light">Check In Date</p>
                                            <input type="date" class="form-control accommodation" min="2018-12-20" name="checkin" placeholder="Check In Date">
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">Check Out Date</p>
                                            <input type="date" class="form-control accommodation" min="2018-12-24" name="checkout" placeholder="Check Out Date">
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">Filter by Categories</p>
                                            <select name="filters" class="form-control accommodation">
                                                <option value="&order=price">Filter on price</option>
                                                <option value="&order=bayesian_review_score">Filter on review score</option>
                                                <option value="&dst_landmark=cc">Closest to city center</option>
                                                <option value="&order=review_score_and_price">Review score and price</option>
                                            </select>
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">No. of Adults</p>
                                            <input type="number" class="form-control accommodation" name="adults" value="1" min="0" max="20" placeholder="No. of Adults">
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">No. of Children</p>
                                            <input type="number" class="form-control accommodation" name="children" min="0" max="20" value="0" placeholder="No. of Children">
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">Destination</p>
                                            <input type="text" class="form-control accommodation" name="city" value="Cork" placeholder="City Name">
                                        </label>&nbsp;
                                        <div class="d-flex justify-content-end">
                                        	<button type="submit" class="btn dorne-btn" name="showhotels">
	                                            <i class="fa fa-search pr-2" aria-hidden="true"></i> Search
	                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                            <h6>What are you looking for?</h6>
                            <form action="#" method="get">
                                <select class="custom-select">
                                    <option selected>Your Destinations</option>
                                    <option value="1">New York</option>
                                    <option value="2">Latvia</option>
                                    <option value="3">Dhaka</option>
                                    <option value="4">Melbourne</option>
                                    <option value="5">London</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>All Catagories</option>
                                    <option value="1">Catagories 1</option>
                                    <option value="2">Catagories 2</option>
                                    <option value="3">Catagories 3</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>Price Range</option>
                                    <option value="1">$100 - $499</option>
                                    <option value="2">$500 - $999</option>
                                    <option value="3">$1000 - $4999</option>
                                </select>
                                <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Listing Destinations Area Start ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
    <div class="container">
        <div class="row">
        	<?php
				if (isset($_POST['skiphotels'])){
					// If pressed skip hotels button
				}
				// set filter properties
				if (isset($_POST['showhotels'])) { ?>
					<div class="col-12">
		                <div class="section-heading dark text-center">
		                    <span></span>
		                    <h4>Featured Accommodations</h4>
		                    <p>Editor’s pick</p>
		                </div>
		            </div>
		        </div>
		        <div class="row">
        		<?php 
					$checkinday1=substr($_POST['checkin'],8,2) . "<br>";
					$checkinmonth1=substr($_POST['checkin'],5,2) . "<br>";
					$checkinyear1=substr($_POST['checkin'],0,4) . "<br>";
					$checkoutday1=substr($_POST['checkout'],8,2) . "<br>";
					$checkoutmonth1=substr($_POST['checkout'],5,2) . "<br>";
					$checkoutyear1=substr($_POST['checkout'],0,4) . "<br>";
					$adults1 = $_POST['adults'] . "<br>";
					$children1 = $_POST['children'] . "<br>";
					$city1 = $_POST['city'] . "<br>";
					$filter1 =$_POST['filters'];
					scrapeNotification($city1);
					scrapeData($checkinday1,$checkinmonth1,$checkinyear1,$checkoutday1,$checkoutmonth1,$checkoutyear1,$adults1,$children1,$city1,$filter1);
				}
				function scrapeNotification($city){
					//echo "<p>Showing data from booking.com in {$city}.</p>";

				}

				function scrapeData($checkinday,$checkinmonth,$checkinyear,$checkoutday,
				$checkoutmonth,$checkoutyear,$adults,$children,$city,$filter) {
					include "simple_html_dom.php";
					$curl = curl_init();
					$url = "https://www.booking.com/searchresults.en-gb.html?ss=" . $city . "&checkin_monthday=" . $checkinday . "&checkin_month=" . $checkinmonth . "&checkin_year=" . $checkinyear . "&checkout_monthday=" . $checkoutday . "&checkout_month=" . $checkoutmonth . "&checkout_year=" .$checkoutyear."&no_rooms=1&group_adults=".$adults ."&group_children=".$children . $filter ."/";

					//echo "<a href='{$url}' target='_blank'>Go to Booking.com for more details</a>"."<br>";

					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
					$result = curl_exec($curl);
					$html = new simple_html_dom();
					$html->load($result);
					curl_close($curl);
					
					$hotel_links = array();

					if ($html != null) {
						foreach($html->find('a[class="hotel_name_link url"]') as $link) {
							$x = 0;
							$hotel_links[$x] = "http://www.booking.com" . ltrim($link->href);
						
							$html2=new simple_html_dom();
							$html2->load_file($hotel_links[$x]);
							
							if (empty($html2->find('.bui-review-score__title')[0])) {
								$x++;
								/*there is a relation between a hotel not being available 
								and the review score not displaying. Therefore, if a review
								score not set. Go to next link */
							} else {	
								$hotel_name = $html2->find('.hp__hotel-name')[0];
								$hotel_link = $hotel_links[$x];
								$hotel_address = $html2->find('.hp_address_subtitle')[0];
								$hotel_review_title = $html2->find('.bui-review-score__title')[0];
								$hotel_review = $html2->find('.bui-review-score__text')[0] ;
								$hotel_rating = $html2->find('.bui-review-score__badge')[0] ;
								$hotel_image = $html2->find('img')[3] ;

								$x++;	
								//$content = $html2->find('.hp__hotel-name')[0];
							    //$content1 = preg_replace("/<h2[^>]+\>/i", "<p>".$html2->find('.hp__hotel-name')[0]."</p> ", $content); 
							    //echo $content1;
							    //$hotel_image is fetched along with img tag so below code is extracting just src from img tag
							    //$html = $html2->find('img')[3];
								//preg_match( '@src="([^"]+)"@' , $html, $match );
								//$src = array_pop($match);
								// will return /images/image.jpg
								//echo $src;
								?>
								<!-- Single Features Area -->
					            <div class="col-12 col-sm-6 col-lg-4">
					                <div class="single-features-area mb-50">
					                    <?php echo $hotel_image; ?>
					                    <!-- Rating/Review title -->
					                    <p><?php echo $hotel_rating; ?></p>
										<p><?php echo $hotel_review_title; ?></p>
										<p><?php echo $hotel_review; ?></p>
					                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
					                        <div class="feature-title">
					                            <a href="<?php echo $hotel_link; ?>" target="_blank">
					                            	<?php echo $hotel_name; ?>
												</a>		
					                            <p><?php echo $hotel_address; ?></p>
					                            <a href="<?php echo $hotel_link; ?>" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
					                        </div>
					                    </div>
					                </div>
					            </div>								 
							<?php }
						}
						
					} else {
						echo "Connection with the booking.com server cannot be established...";
					}
					$html->clear();
					unset($html);
					$html2->clear();
					unset($html2);
				}
			?> 
        </div>
    </div>
</section>
<!-- ***** Listing Destinations Area End ***** -->
						
<script type="text/javascript">
	$(window).scroll(function(){
		$(".breadcrumb-fade").css("opacity", 1 - $(window).scrollTop() / 250);
	});
</script>

<?php include('inc/footer.php'); ?>