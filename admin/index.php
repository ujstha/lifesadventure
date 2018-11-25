<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php
    if($_SESSION['loginstatus']=="") {
        header('Location: admin-login.php');
    }
?>
<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>

<style type="text/css">
    .single-catagory-area {
        padding: 3px;
        text-transform: uppercase;
    }
</style>

<!-- ***** Welcome Area Start ***** -->
<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <div class="hero-content">
                    <h2>Welcome Admin</h2>
                    <h4>Add and manage your website</h4>
                </div>
                
                <!-- Hero Search Form -->
                <div class="hero-search-form">
                    <!-- Tabs -->
                    <div class="nav nav-tabs" id="heroTab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-adventures-tab" data-toggle="tab" href="#nav-adventures" role="tab" aria-controls="nav-adventures" aria-selected="true">Adventures</a>
                        <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Events</a>
                    </div>
                    <!-- Tabs Content -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-adventures" role="tabpanel" aria-labelledby="nav-adventures-tab">
                            <form action="#" method="get">
                                <div class="col-12 col-sm-6 col-md">
                                    <a href="add-adventures.php">
                                        <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.1s">
                                            <div class="catagory-content">
                                                <img src="img/core-img/icon-1.png" alt="">
                                                <h6>Add Adventures</h6>                                    
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-6 col-md">
                                    <a href="https://www.facebook.com">
                                        <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                            <div class="catagory-content">
                                                <img src="img/core-img/icon-1.png" alt="">
                                                <h6>Manage Adventures</h6>                                    
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                            <form action="#" method="get">
                                <div class="col-12 col-sm-6 col-md">
                                    <a href="https://www.facebook.com">
                                        <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.1s">
                                            <div class="catagory-content">
                                                <img src="img/core-img/icon-1.png" alt="">
                                                <h6>Add Adventures</h6>                                    
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-6 col-md">
                                    <a href="https://www.facebook.com">
                                        <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                            <div class="catagory-content">
                                                <img src="img/core-img/icon-1.png" alt="">
                                                <h6>Manage Adventures</h6>                                    
                                            </div>
                                        </div>
                                    </a>
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

<?php include('inc/footer.php'); ?>