<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<title>lifesadventure | Index</title>
<?php include('inc/header.php'); ?>
<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>

<style type="text/css">
    #rated-adv {
        overflow: hidden;
    }
    #rated-adv:hover img {
        transform: scale(1.2);
        transition: all .8s ease .2s;
    }
    .single-features-area:hover .read-more {
        color: white;
    }
    .single-features-area .price-start a.rate {
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
    .editor.dorne-features-destinations-area {
        padding-top: 10px;
    }
    .editor.price-start p {
        position: absolute;
        top: 240px !important;
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
    .accommodation.form-control {
        border-radius: 0;
    }
    @media only screen and (max-width: 600px) {
        .dorne-welcome-area {
            padding-top: 25%;
        }
    }
    @media only screen and (max-width: 767px) {
        a.read-more {
            font-size: 18px;
        }
    }
</style>

<!-- ***** Welcome Area Start ***** -->
<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(assets/dublinbridge.jpg); background-attachment: fixed;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <!-- error/success alert div -->
                <?php if ($imgMsg != ''): ?>
                    <div class="alert <?php echo $imgMsgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                        <?php echo $imgMsg; ?>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php endif; ?>
                <?php if ($msgl != ''): ?>
                    <div class="alert <?php echo $msglClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                        <?php echo $msgl; ?>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php endif; ?>
                <!-- error/success alert div -->
                <div class="hero-content">
                    <h2>Explore Ireland</h2>
                    <h4>Not all those who wander are lost</h4>
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

<!-- ***** Catagory Area Start ***** -->
<section class="dorne-catagory-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="all-catagories">
                    <div class="row">
                        <!-- Single Catagory Area -->
                        <div class="col-12 col-sm-6 col-md">
                            <a href="adventures.php">
                            <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.07s">
                                <div class="catagory-content">
                                    <img src="" alt="">
                                    <h6>Adventures</h6>                                    
                                </div>
                            </div>
                            </a>
                        </div>
                        <!-- Single Catagory Area -->
                        <div class="col-12 col-sm-6 col-md">
                            <a href="accommodation.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.14s">
                                    <div class="catagory-content">
                                        <img src="" alt="">
                                        <h6>Accommodation</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Single Catagory Area -->
                        <div class="col-12 col-sm-6 col-md">
                            <a href="transportAPI/transport.php" target="_blank">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.24s">
                                    <div class="catagory-content">
                                        <img src="" alt="">
                                        <h6>Transportation</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Catagory Area End ***** -->

<!-- ***** About Area Start ***** -->
<section class="dorne-about-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-content text-center">
                    <h2>Explore Ireland with <br><a href="index.php"><span>Lifesadventure</span></a></h2>
                    <p>Life is about experiences and building a rich bank of memories. One of the ways in which we can do this is by undertaking adventures. One person’s adventure is not the same as another person's adventure. We provide a platform where user can select variety of adventure and facilities related to adventure around the world. <br>We are based in Ireland.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** About Area End ***** -->

<!-- ***** Features Destinations Area Start ***** -->
<section class="dorne-features-destinations-area bg-img bg-overlay-9 mb-100" style="background-image: url(assets/river.jpg); background-attachment: fixed;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <span></span>
                    <h4>Top Rated Adventures</h4>
                    <p>User’s pick</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="features-slides owl-carousel">
                    <?php
                        $cn=makeconnection();
                        $id ;//to echo the result later
                        $title = '';//to echo the result later
                        $s="SELECT * FROM adventure LIMIT 5";
                        $result=mysqli_query($cn,$s);
                        $r=mysqli_num_rows($result); 
                        if ($r <= 0) { //yaha yo hudaina yo bhaneko rating bhayeni nabhayeni adventure database ma cha bhane yo not rated message jancha so tala rating calc garepachi lekhne ho
                           echo "<h1 class='text-center text-light'>None of the adventures are rated yet....</h1>";
                        }                           

                        if ($r > 0) {
                            while ($data=mysqli_fetch_array($result)) {
                                $id = $data['id'];
                                $title = $data['title'];
                                $image = $data['image']; 
                            ?>
                            <?php 
                                $cn=makeconnection();
                                $s_r="SELECT adventure.adventure_comment_counter, adventure.street, adventure.adventure_rating_counter, adventure.id, AVG(rating.rating) AS rating
                                              FROM adventure 
                                              LEFT JOIN rating
                                              ON adventure.id = rating.adventure_id
                                              WHERE adventure.id = {$id}";
                                $q_r=mysqli_query($cn, $s_r);
                                $r_r=mysqli_num_rows($q_r);
                                
                                while ($data_r=mysqli_fetch_array($q_r)) {
                                    if ($data_r['rating'] > 3) { ?>
                                        <!-- Single Features Area -->
                                        <div class="single-features-area">
                                            <div id="rated-adv">
                                                <a href='adventures.php?a_id=<?php echo $id; ?>'>
                                                    <img src="uploads/<?php echo $image; ?>" alt="<?php echo $title; ?>" style="height: 285px;">
                                                </a>
                                            </div>
                                            <!-- Price -->
                                            <div class="price-start">
                                                <a href="adventures.php?filter%5B%5D=<?php echo $data['group_size']; ?>"><p style="max-width: 200px; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;"><?php echo $data['group_size']; ?> Type</p></a>
                                                <a href="#" class="rate"><?php echo round($data_r['rating'], PHP_ROUND_HALF_UP); ?></a>
                                            </div>
                                            
                                            <div class="feature-content d-flex align-items-center justify-content-between">
                                                <div class="feature-title">
                                                    <a href='adventures.php?a_id=<?php echo $id; ?>'>
                                                        <h5><?php echo $title; ?></h5>
                                                    </a>
                                                    <p><?php echo $data['street']; ?>, <?php echo $data['province']; ?></p>
                                                    <a href="adventures.php?a_id=<?php echo $id; ?>" class="read-more">Read More</a>
                                                </div>
                                            </div>  
                                        </div>
                                    <?php }
                                }
                            ?>                                
                        <?php }
                        }
                        mysqli_close($cn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->

<!-- ***** Features Destinations Area Start ***** -->
<section class="dorne-features-destinations-area editor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading dark text-center">
                    <span></span>
                    <h4>Featured Adventures</h4>
                    <p>Editor’s pick</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="features-slides owl-carousel">
                    <?php
                        $cn=makeconnection();
                        $id ;//to echo the result later
                        $title = '';//to echo the result later
                        $s="SELECT * FROM adventure LIMIT 5";
                        $result=mysqli_query($cn,$s);
                        $r=mysqli_num_rows($result);
                        if ($r <= 0) {
                            echo "<h1 class='text-center'>No Adventures to show.</h1>";
                        }                            
                        else {
                            while ($data=mysqli_fetch_array($result)) {
                                $id = $data['id'];
                                $title = $data['title'];
                                $image = $data['image']; 
                            ?>
                            <!-- Single Features Area -->
                            <div class="single-features-area">
                                <div id="rated-adv">
                                    <a href='adventures.php?a_id=<?php echo $id; ?>'>
                                        <img src="uploads/<?php echo $image; ?>" alt="<?php echo $title; ?>" style="height: 285px;">
                                    </a>
                                </div>
                                <!-- Price -->
                                <div class="price-start editor">
                                    <a href="adventures.php?filter%5B%5D=<?php echo $data['group_size']; ?>"><p style="max-width: 200px; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;"><?php echo $data['group_size']; ?> Type</p></a>
                                </div>
                                <div class="feature-content d-flex align-items-center justify-content-between">
                                    <div class="feature-title">
                                        <a href='adventures.php?a_id=<?php echo $id; ?>'>
                                            <h5><?php echo $title; ?></h5>
                                        </a>
                                        <p><?php echo $data['street']; ?>, <?php echo $data['province']; ?></p>
                                        <a href="adventures.php?a_id=<?php echo $id; ?>" class="read-more">Read More</a>
                                    </div>
                                </div>  
                            </div>                               
                        <?php }
                        }
                        mysqli_close($cn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->

<!-- ***** Features Events Area Start ***** -->
<section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(assets/hero-3.jpg); background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mb-5 text-center">
                    <span></span>
                    <h4>Featured Events</h4>
                    <p>Editor’s pick</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php 
                $cn=makeconnection();
                $s_e="SELECT * FROM event LIMIT 4";
                $q_e=mysqli_query($cn, $s_e);
                $n_e=mysqli_num_rows($q_e);
                if ($n_e <= 0) {
                    echo "<h1 class='text-center text-light'>No Events to show.</h1>";
                } else {
                    while ($d_e = mysqli_fetch_array($q_e)) { ?>
                        <style type="text/css">
                            img.event-image {
                                height: 180px;
                                width: 170px;
                            }
                            div#des {
                                width: 19em;
                            }
                            @media only screen and (max-width: 600px) {
                                img.event-image {
                                    height: auto;
                                    width: 100%;
                                }
                                div#des {
                                    width: 15em;
                                }
                            }
                            @media (min-width: 768px) and (max-width: 1023px) {
                                img.event-image {
                                    height: 180px;
                                    width: 170px;
                                }
                                div#des {
                                    width: 24em;
                                }
                            }
                            @media (min-width: 1024px) and (max-width: 1365px) {
                                div#des {
                                    width: 14em;
                                }
                            }
                        </style>
                        <div class="col-12 col-lg-6 mt-5">
                            <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.1s">
                                <div class="feature-events-thumb">
                                    <div id="rated-adv">
                                        <img src="uploads/<?php echo $d_e['image']; ?>" alt="image" class="event-image">
                                    </div>
                                    <div class="date-map-area d-flex">
                                        <a class="text-light"><?php echo date('d M', strtotime($d_e['date_added'])); ?></a>
                                        <a href="http://maps.google.com/maps?daddr=<?php echo $d_e['street']; ?>&amp;ll=" target="_blank"><img src="assets/map.png" alt="map"></a>
                                    </div>
                                </div>
                                <div class="feature-events-content">
                                    <a href="events.php?e_id=<?php echo $d_e['id']; ?>"><h5><?php echo $d_e['title']; ?></h5></a>
                                    <h6><?php echo $d_e['street']; ?></h6>
                                    <div style="text-overflow: ellipsis; white-space: nowrap;overflow: hidden;" id="des">
                                        <?php echo $d_e['description']; ?>
                                    </div>
                                </div>
                                <div class="feature-events-details-btn">
                                    <a href="events.php?e_id=<?php echo $d_e['id']; ?>">+</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            ?>
        </div>
    </div>
</section>
<!-- ***** Features Events Area End ***** -->

<!-- ***** Features Restaurant Area Start ***** -->
<section class="dorne-features-restaurant-area">
    <div class="container-fluid">
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
            <div class="col-12">
                <div class="features-slides owl-carousel">
                    <!-- Single Features Area -->
                    <div class="single-features-area">
                        <a href="http://www.booking.com/hotel/ie/jurys-inn-cork.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank">
                            <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/281/28105170.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/281/28105170.jpg" alt="Gallery image of this property" style="height: 285px;">
                        </a>
                        <!-- Rating & Map Area -->
                        <div class="ratings-map-area d-flex">
                            <a class="text-light">8.5</a>
                            <a href="http://maps.google.com/maps?daddr=Anderson's Quay, Cork, Ireland&amp;ll=" target="_blank"><img src="assets/map.png" alt=""></a>
                        </div>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5>Jurys Inn Cork</h5>
                                <p>Anderson's Quay, Cork, Ireland</p>
                                <a href="http://www.booking.com/hotel/ie/jurys-inn-cork.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Features Area -->
                    <div class="single-features-area">
                        <a href="http://www.booking.com/hotel/ie/capella-at-castlemartyr-resort.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank">
                            <img src="https://t-ec.bstatic.com/images/hotel/max1024x768/114/11476353.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/114/11476353.jpg" alt="Gallery image of this property" style="height: 285px;">
                        </a>
                        <!-- Rating & Map Area -->
                        <div class="ratings-map-area d-flex">
                            <a class="text-light">8.9</a>
                            <a href="http://maps.google.com/maps?daddr=Main Street, Cork, Ireland&amp;ll=" target="_blank"><img src="assets/map.png" alt=""></a>
                        </div>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5>Castlemartyr Resort Hotel</h5>
                                <p>Main Street, Cork, Ireland</p>
                                <a href="http://www.booking.com/hotel/ie/capella-at-castlemartyr-resort.en-gb.html?srpvid=c21da32a445301a8&amp;srepoch=1543792341&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1501986&amp;from=searchresults #hotelTmpl" target="_blank" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Features Area -->
                    <div class="single-features-area">
                        <a href="http://www.booking.com/hotel/gb/titanic-belfast.en-gb.html?srpvid=82efa68dcee500f9&amp;srepoch=1543794076&amp;room1=A,A&amp;hpos=11&amp;hapos=11&amp;dest_type=city&amp;dest_id=-2589607&amp;from=searchresults #hotelTmpl" target="_blank">
                            <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/109/109601829.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/109/109601829.jpg" alt="Gallery image of this property" style="height: 285px;">
                        </a>
                        <!-- Rating & Map Area -->
                        <div class="ratings-map-area d-flex">
                            <a class="text-light">8.9</a>
                            <a href="http://maps.google.com/maps?daddr=Queens Road Titanic Quarter, Belfast, BT3 9DT, United Kingdom&amp;ll=" target="_blank"><img src="assets/map.png" alt=""></a>
                        </div>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5>Titanic Hotel Belfast</h5>
                                <p>Queens Road Titanic Quarter, Belfast</p>
                                <a href="http://www.booking.com/hotel/gb/titanic-belfast.en-gb.html?srpvid=82efa68dcee500f9&amp;srepoch=1543794076&amp;room1=A,A&amp;hpos=11&amp;hapos=11&amp;dest_type=city&amp;dest_id=-2589607&amp;from=searchresults #hotelTmpl" target="_blank" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Features Area -->
                    <div class="single-features-area">
                        <a href="http://www.booking.com/hotel/ie/the-connacht-hotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank">
                            <img src="https://s-ec.bstatic.com/images/hotel/max1024x768/904/90414035.jpg" data-highres="https://s-ec.bstatic.com/images/hotel/max1280x900/904/90414035.jpg" alt="Gallery image of this property" style="height: 285px;">
                        </a>
                        <!-- Rating & Map Area -->
                        <div class="ratings-map-area d-flex">
                            <a class="text-light">8.5</a>
                            <a href="http://maps.google.com/maps?daddr=Dublin Road, Galway, Ireland&amp;ll=" target="_blank"><img src="assets/map.png" alt=""></a>
                        </div>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5>The Connacht Hotel</h5>
                                <p>Dublin Road, Galway, Ireland</p>
                                <a href="http://www.booking.com/hotel/ie/the-connacht-hotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=1&amp;hapos=1&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Features Area -->
                    <div class="single-features-area">
                        <a href="http://www.booking.com/hotel/ie/flanneryshotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank">
                            <img src="https://t-ec.bstatic.com/images/hotel/max1024x768/617/61765573.jpg" data-highres="https://t-ec.bstatic.com/images/hotel/max1280x900/617/61765573.jpg" alt="Gallery image of this property" style="height: 285px;">
                        </a>
                        <!-- Rating & Map Area -->
                        <div class="ratings-map-area d-flex">
                            <a class="text-light">8.3</a>
                            <a href="http://maps.google.com/maps?daddr=Dublin Road, . Galway, Ireland&amp;ll=" target="_blank"><img src="assets/map.png" alt=""></a>
                        </div>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5>Flannery's Hotel</h5>
                                <p>Dublin Road, . Galway, Ireland </p>
                                <a href="http://www.booking.com/hotel/ie/flanneryshotel.en-gb.html?srpvid=6380a73d2d5d00a3&amp;srepoch=1543794427&amp;room1=A,A&amp;hpos=4&amp;hapos=4&amp;dest_type=city&amp;dest_id=-1502950&amp;from=searchresults #hotelTmpl" target="_blank" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Restaurant Area End ***** -->

<?php include('inc/footer.php'); ?>