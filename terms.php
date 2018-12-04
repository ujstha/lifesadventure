<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<title>lifesadventure | Terms and Conditions</title>
<?php include('inc/header.php'); ?>

<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>

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
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-12 text-center breadcrumb-fade">
				<p class="breadcrumbs wow fadeInUpBig" data-wow-delay="0.08s"><span class="mr-2"><a href="index.php">Home</a></span> <span>Policy</span></p>
				<h1 class="mb-3 bread text-light wow fadeInUpBig" data-wow-delay="0.2s">Terms and Conditions</h1>
			</div>
		</div>
	</div>
</section>

<section class="dorne-features-restaurant-area">
	<div class="container">
		<div class="row d-md-flex">
			<div class="col-md-12 ftco-animate">
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
									<h2 class="mb-4">Exceptional Web Solutions</h2>
									<p>The mission of lifesadventure is to offer a web platform for people with different background and ethnic group to select their adventure trip around Ireland.</p>
									<p>Booking Accomodations and Transportation through our website to make it easy for adventurers.</p>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
								<div>
									<h2 class="mb-4">Help Our Customer</h2>
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

<script type="text/javascript">
	$(window).scroll(function(){
		$(".breadcrumb-fade").css("opacity", 1 - $(window).scrollTop() / 250);
	});
</script>

<?php include('inc/footer.php'); ?>