<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<title>lifesadventure | About Us</title>
<?php include('inc/header.php'); ?>

<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>
<link rel="stylesheet" type="text/css" href="css/about.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

<style type="text/css">
	.nav-link-wrap .nav-link.active {
		margin: 5px;
		padding: 15px;
		border-radius: 0;
		background-color: #7643ea;
	}
	.bg-img {
		padding: 20%; 
		padding-bottom: 23%;
	}
	.teams.dorne-features-restaurant-area {
		padding-top: 20px;
		padding-bottom: 20px;
	}
	.teams .section-heading {
		margin-bottom: 45px;
	}
	.material-card h2 {
		font-family: 'Quicksand', sans-serif;
	}
	@media only screen and (max-width: 750px) {
        .nav-link-wrap .nav-link {
            width: 100%;
        }
        .bg-img {
            height: 650px;
        }
        .breadcrumb-fade {
            margin-top: 250px;
        }
    }
    @media only screen and (max-width: 1023px) {
        .bg-img {
            height: 650px;
            padding-top: 26%;
        }
        .breadcrumb-fade {
            margin-top: 100px;
        }
    }
    @media (min-width: 1024px) and (max-width: 1366px) {
        .bg-img {
            height: 650px;
        }
        .breadcrumb-fade {
            margin-top: 100px;
        }
    }
</style>

<section class="bg-img bg-overlay" style="background-image: url(assets/bridge.jpg); background-attachment: fixed;">
	<div class="container h-100">
		<?php if ($msgl != ''): ?>
            <div class="alert <?php echo $msglClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                <?php echo $msgl; ?>
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
            </div>
        <?php endif; ?>
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-12 text-center breadcrumb-fade">
				<p class="breadcrumbs wow fadeInUpBig" data-wow-delay="0.08s"><span class="mr-2"><a href="index.php">Home</a></span> <span>About</span></p>
				<h1 class="mb-3 bread text-light wow fadeInUpBig" data-wow-delay="0.2s">About Us</h1>
			</div>
		</div>
	</div>
</section>

<section class="dorne-features-restaurant-area">
	<div class="container">
		<div class="row d-md-flex">
			<div class="col-md-6 ftco-animate">
				<img src="assets/about.jpg" style="height: inherit;">
			</div>
			<div class="col-md-6 ftco-animate">
				<div class="row">
					<div class="col-md-12 nav-link-wrap mb-3">
						<div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>

							<a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

							<a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
						</div>
					</div>
					<div class="col-md-12 d-flex align-items-center">
						<div class="tab-content ftco-animate" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
								<div>
									<h2 class="mb-4">Offering Adventures</h2>
									<p>Life is about experiences and building a rich bank of memories. One of the ways in which we can do this is by undertaking adventures. One person’s adventure is not the same as another person's adventure. We provide a platform where user can select variety of adventure and facilities related to adventure around the world.</p>
									<p>We are based in Ireland. We plan to offer adventures in more countries in coming future.</p>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
								<div>
									<h2 class="mb-4">Web Solutions</h2>
									<p>The mission of lifesadventure is to offer a web platform for people with different background and ethnic group to select their adventure trip around Ireland.</p>
									<p>Booking Accomodations and Transportation through our website to make it easy for adventurers.</p>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
								<div>
									<h2 class="mb-4">Providing Best Experience</h2>
									<p>Our goal is to help our customer to reach their travel destination as easily and efficiently as possible. And to help them find best and affordable accommodation and transportation for their travel.</p>
									<p>Also to become the best choice for any group of customers in the field of adventure around Ireland.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="teams dorne-features-restaurant-area bg-overlay" style="background-image: url(assets/team.jpg); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
	<div class="container">
     	<div class="row">
            <div class="col-12">
                <div class="section-heading dark text-center">
                    <span></span>
                    <h4 class="text-light">Our Teams</h4>
                    <span></span>
                </div>
            </div>
        </div>
    
    	<div class="row active-with-click">
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12 offset-md-3 offset-lg-4 offset-sm-3">
	            <article class="material-card Green">
	                <h2>
	                    <span>Nils Visser</span>
						<p class="text-light">Leader/Developer</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/nils.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Team Leader <br>
	                        <strong>Secondary Role : </strong>Back-End Developer <br>
	                        <strong>Other Role : </strong>Database Designer
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	    </div>
	    <div class="row active-with-click">
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Ujjawal Shrestha</span>
						<p class="text-light">Developer/Designer</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/ujjawal.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Front-End Developer <br>
	                        <strong>Secondary Role : </strong>Back-End Developer <br>
	                        <strong>Other Role : </strong>Web Designer
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/ujwal.shrestha.104" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/ujwals1996" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/in/ujjawal-shrestha-855682159" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/113477129681765952649
" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Sander Krom</span>
						<p class="text-light">Lead Tester/Developer</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/sander.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Lead Tester <br>
	                        <strong>Secondary Role : </strong>Back-End Developer <br>
	                        <strong>Other Role : </strong>......
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Suman Nepali</span>
						<p class="text-light">Developer/Designer</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/suman.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Front-End Developer <br>
	                        <strong>Secondary Role : </strong>Back-End Developer <br>
	                        <strong>Other Role : </strong>Designer
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Johannes Fahringer</span>
						<p class="text-light">Lead Back-End Developer</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/johannes.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Back-End Developer <br>
	                        <strong>Secondary Role : </strong>Front-End Developer <br>
	                        <strong>Other Role : </strong>.......
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Zixuan Chen</span>
						<p class="text-light">Developer/Documenter</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/zixuan.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Front-End Developer <br>
	                        <strong>Secondary Role : </strong>Documenter <br>
	                        <strong>Other Role : </strong>Researcher
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	        <div class="col-md-6 col-lg-4 col-12 col-sm-6 col-xs-12">
	            <article class="material-card Orange">
	                <h2>
	                    <span>Jenny K. Kristiansen</span>
						<p class="text-light">Lead Designer/Documenter</p>
	                </h2>
	                <div class="mc-content">
	                    <div class="img-container">
	                        <img class="img-responsive" src="assets/jenny.jpg">
	                    </div>
	                    <div class="mc-description">
	                        <strong>Main Role : </strong>Lead Designer <br>
	                        <strong>Secondary Role : </strong>Documenter <br>
	                        <strong>Other Role : </strong>Researcher
	                    </div>
	                </div>
	                <a class="mc-btn-action">
	                    <i class="fa fa-bars"></i>
	                </a>
	                <div class="mc-footer">
	                    <h4>
	                        Social Media
	                    </h4>
	                    <a class="fa fa-fw fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-linkedin" href="https://www.linkedin.com/" target="_blank"></a>
	                    <a class="fa fa-fw fa-google-plus" href="https://plus.google.com/" target="_blank"></a>
	                </div>
	            </article>
	        </div>
	    </div>
    </div>
</section>

<script type="text/javascript">
	$(window).scroll(function(){
		$(".breadcrumb-fade").css("opacity", 1 - $(window).scrollTop() / 250);
	});
</script>

<script type="text/javascript">
	$(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
</script>

<?php include('inc/footer.php'); ?>