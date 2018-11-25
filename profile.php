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
		<title>lifesadventure | <?php echo $profname . '.' . $prolname . '.' . $id; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="styles/signups.css">
	</head>
	<body>
		
		<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); padding-top: 10em; padding-bottom: 5em;">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
			<?php echo $id; ?>
			<?php echo $profname; ?>
			<?php echo $prolname; ?>
			<?php echo $proemail; ?>
			<?php echo $progender; ?>
			<?php echo $proage; ?>
			<?php echo $procountry; ?>
			<img class="img-thumbnail" height="385" width="285" src="data:image/jpeg;base64,<?php echo $propic; ?>">

			<a href="edit-profile.php" class="btn btn-primary btn-md">Edit Profile</a>


		</div>
	</div>
</div>
</section>
		<?php include('inc/footer.php'); ?>
	</body>
</html>
<?php endif; ?>