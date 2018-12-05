<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Upright" rel="stylesheet">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Krub', sans-serif;
            letter-spacing: 1px;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Krub', sans-serif;
            font-weight: 600;
            color: #2a2a2a;
            line-height: 1.3;
        }
        .nav-link {
            text-transform: uppercase;
            border-bottom: -2px solid #7643ea;
        }
        .navbar-nav .nav-link:hover {
            border-bottom: 1px solid #7643ea;
            color: #7643ea;
            transition: all ease .2s;
        }
        #search-btn, .dorne-add-listings-btn {
            text-transform: uppercase;
            color: white;
        }
        button:hover {
            cursor: pointer;
        }
        .dorne-add-listings-btn a {
            color: pink;
        }
        a#signedin {
            color: pink;
        }
        .addevent.btn {
            border-radius: 0;
        }
        .modal, .modal-content, .modal-dialog {
            border-radius: 0;
        }
        @media only screen and (max-width: 768px) {
            .dorne-add-listings-btn a {
                font-size: 18px;
            }
        }
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
	    h2, h2.hp__hotel-name {
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

</head>

<body>

	<!-- ***** Listing Destinations Area Start ***** -->
	<section class="dorne-listing-destinations-area section-padding-100-50 bg-overlay-9" style="background-image: url(assets/accommodation.jpg); background-attachment: fixed;">
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
			                    <h4 class="text-light">Featured Accommodations</h4>
			                    <p class="text-light">Booking.com</p>
			                </div>
			            </div>
			        </div>
			        <div class="row">
	        		<?php 
						$checkinday1=substr($_POST['checkin'],8,2);
						$checkinmonth1=substr($_POST['checkin'],5,2);
						$checkinyear1=substr($_POST['checkin'],0,4);
						$checkoutday1=substr($_POST['checkout'],8,2);
						$checkoutmonth1=substr($_POST['checkout'],5,2);
						$checkoutyear1=substr($_POST['checkout'],0,4);
						$adults1 = $_POST['adults'];
						$children1 = $_POST['children'];
						$city1 = $_POST['city'];
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
	                    echo "<div class='col-12'>
	                            <div class='dark text-center mb-5'>
	                                <a href='{$url}' class='btn dorne-btn' target='_blank'>Click here for more details</a>
	                            </div>
	                        </div>";

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
</body>
</html>