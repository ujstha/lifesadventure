<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php set_time_limit(0); ?>

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

<!-- ***** Welcome Area Start ***** -->
<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(assets/parliament.jpg); background-attachment: fixed;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <?php if ($msgl != ''): ?>
                    <div class="alert <?php echo $msglClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                        <?php echo $msgl; ?>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php endif; ?>
                <div class="hero-content">
                    <h2 style="font-family: 'Poiret One', cursive;">Find Accommodation</h2>
                    <h4 style="font-family: 'Cormorant Upright', cursive;">From cosy country homes to funky city flats</h4>
                </div>
                
                <!-- Hero Search Form -->
                <div class="hero-search-form">
                    <!-- Tabs -->
                    <div class="nav nav-tabs" id="heroTab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Places</a>
                        <a class="nav-item nav-link" id="nav-events-tab" href="transportAPI/transport.php" target="_blank">Transport</a>
                    </div>
                    <!-- Tabs Content -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                            <h6>Search for Accommodation</h6>
                            <form action="scraped-accommodation-data.php" target="_blank" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>
                                            <p class="text-light">Check In Date</p>
                                            <input type="date" class="form-control accommodation" id="checkindate" name="checkin" placeholder="Check In Date">
                                            <script type="text/javascript">
                                                var today = new Date();
                                                var dd = today.getDate();
                                                var mm = today.getMonth()+1; //January is 0!
                                                var yyyy = today.getFullYear();
                                                 if(dd<10){
                                                        dd='0'+dd
                                                    } 
                                                    if(mm<10){
                                                        mm='0'+mm
                                                    } 

                                                today = yyyy+'-'+mm+'-'+dd;
                                                document.getElementById("checkindate").setAttribute("min", today);
                                            </script>
                                        </label>&nbsp;
                                        <label>
                                            <p class="text-light">Check Out Date</p>
                                            <input type="date" class="form-control accommodation" id="checkoutdate" name="checkout" placeholder="Check Out Date">
                                            <script type="text/javascript">
                                                var today = new Date();
                                                var dd = today.getDate();
                                                var mm = today.getMonth()+1; //January is 0!
                                                var yyyy = today.getFullYear();
                                                 if(dd<10){
                                                        dd='0'+dd
                                                    } 
                                                    if(mm<10){
                                                        mm='0'+mm
                                                    } 

                                                today = yyyy+'-'+mm+'-'+dd;
                                                document.getElementById("checkoutdate").setAttribute("min", today);
                                            </script>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Listing Destinations Area Start ***** -->
<section class="dorne-features-restaurant-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading dark text-center">
                    <span></span>
                    <h4>Featured Accommodations</h4>
                    <p>Editor’s pick</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4 mt-3">
                <!-- Single Features Area -->
                <div class="single-features-area">
                    <a href="http://www.booking.com/hotel/ie/jurys-inn-cork.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank">
                        <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/281/28105170.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/281/28105170.jpg" alt="Gallery image of this property">
                    </a>
                    <!-- Rating & Map Area -->
                    <div class="ratings-map-area d-flex">
                        <a class="text-light">8.5</a>
                        <a href="http://maps.google.com/maps?daddr=Anderson's Quay, Cork, Ireland&amp;ll=" target="_blank"><i class="fas fa-map"></i></a>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
                        <div class="feature-title pt-3">
                            <h2>Jurys Inn Cork</h2>
                            <p>Anderson's Quay, Cork, Ireland</p>
                            <a href="http://www.booking.com/hotel/ie/jurys-inn-cork.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mt-3">
                <!-- Single Features Area -->
                <div class="single-features-area">
                    <a href="http://www.booking.com/hotel/ie/capella-at-castlemartyr-resort.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank">
                        <img src="https://t-ec.bstatic.com/images/hotel/max1024x768/114/11476353.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/114/11476353.jpg" alt="Gallery image of this property">
                    </a>
                    <!-- Rating & Map Area -->
                    <div class="ratings-map-area d-flex">
                        <a class="text-light">8.9</a>
                        <a href="http://maps.google.com/maps?daddr=Main Street, Cork, Ireland&amp;ll=" target="_blank"><i class="fas fa-map"></i></a>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
                        <div class="feature-title pt-3">
                            <h2>Castlemartyr Resort Hotel</h2>
                            <p>Main Street, Cork, Ireland</p>
                            <a href="http://www.booking.com/hotel/ie/capella-at-castlemartyr-resort.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mt-3">
                <!-- Single Features Area -->
                <div class="single-features-area">
                    <a href="http://www.booking.com/hotel/gb/titanic-belfast.en-gb.html?srpvid=82efa68dcee500f9&amp;srepoch=1543794076&amp;room1=A,A&amp;hpos=11&amp;hapos=11&amp;dest_type=city&amp;dest_id=-2589607&amp;from=searchresults #hotelTmpl" target="_blank">
                        <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/109/109601829.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/109/109601829.jpg" alt="Gallery image of this property">
                    </a>
                    <!-- Rating & Map Area -->
                    <div class="ratings-map-area d-flex">
                        <a class="text-light">8.9</a>
                        <a href="http://maps.google.com/maps?daddr=Queens Road Titanic Quarter, Belfast, BT3 9DT, United Kingdom&amp;ll=" target="_blank"><i class="fas fa-map"></i></a>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
                        <div class="feature-title pt-3">
                            <h2>Titanic Hotel Belfast</h2>
                            <p>Queens Road Titanic Quarter, Belfast</p>
                            <a href="http://www.booking.com/hotel/gb/titanic-belfast.en-gb.html?srpvid=82efa68dcee500f9&amp;srepoch=1543794076&amp;room1=A,A&amp;hpos=11&amp;hapos=11&amp;dest_type=city&amp;dest_id=-2589607&amp;from=searchresults #hotelTmpl" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mt-3">
                <!-- Single Features Area -->
                <div class="single-features-area">
                    <a href="http://www.booking.com/hotel/ie/the-connacht-hotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank">
                        <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/904/90414035.jpg" data-highres="https://s-ec.bstatic.com/images/hotel/max1280x900/904/90414035.jpg" alt="Gallery image of this property">
                    </a>
                    <!-- Rating & Map Area -->
                    <div class="ratings-map-area d-flex">
                        <a class="text-light">8.5</a>
                        <a href="http://maps.google.com/maps?daddr=Dublin Road, Galway, Ireland&amp;ll=" target="_blank"><i class="fas fa-map"></i></a>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
                        <div class="feature-title pt-3">
                            <h2>The Connacht Hotel</h2>
                            <p>Dublin Road, Galway, Ireland</p>
                            <a href="http://www.booking.com/hotel/ie/the-connacht-hotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mt-3">
                <!-- Single Features Area -->
                <div class="single-features-area">
                    <a href="http://www.booking.com/hotel/ie/flanneryshotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank">
                        <img src="https://t-ec.bstatic.com/images/hotel/max1024x768/617/61765573.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/617/61765573.jpg" alt="Gallery image of this property">
                    </a>
                    <!-- Rating & Map Area -->
                    <div class="ratings-map-area d-flex">
                        <a class="text-light">8.3</a>
                        <a href="http://maps.google.com/maps?daddr=Dublin Road, . Galway, Ireland&amp;ll=" target="_blank"><i class="fas fa-map"></i></a>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between px-3 pb-3">
                        <div class="feature-title pt-3">
                            <h2>Flannery's Hotel</h2>
                            <p>Dublin Road, . Galway, Ireland </p>
                            <a href="http://www.booking.com/hotel/ie/flanneryshotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank" class="btn btn-primary btn-sm mt-2 read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
						
<script type="text/javascript">
	$(window).scroll(function(){
		$(".breadcrumb-fade").css("opacity", 1 - $(window).scrollTop() / 250);
	});
</script>

<?php include('inc/footer.php'); ?>