<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>

<style type="text/css">
    .adv_pic {
        width: 105px; 
        height: 120px; 
        border-radius: 5px;  
    }
    .aimg {
        width: 105px; 
        height: 120px;
        margin-right: 5px;
        border-radius: 5px;
        overflow: hidden;
    }
    .aimg:hover img.adv_pic {
        transform: scale(1.2);
        -webkit-transition: all .4s ease-out;
        -o-transition: all .4s ease-out;
        -moz-transition: all .4s ease-out;
        -ms-transition: all .4s ease-out;
        transition: all .4s ease-out;
    }
    @media only screen and (max-width: 768px){
        .adv_pic, .aimg {
            width: 100%; 
            height: 200px;   
        }
    }
</style>
<?php include('register.php'); ?>
<?php include('sign-in.php'); ?>

	<section class="bg-img bg-overlay" style="background-image: url(assets/ireland1.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
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

		            <?php
		                if (!isset($_GET['search'])) {
		                    echo '<script>document.location = "index.php"; </script>';
		                } else {
		                    $cn = makeconnection();
		                    $search = $_GET['search'];

		                    $query = "SELECT * FROM adventure WHERE title LIKE '%$search%' OR group_size LIKE '%$search%'";
		                    $search_query = mysqli_query($cn,$query);
		                    if(!$search_query){
		                        die("QUERY FAILED" . mysqli_error($cn));
		                    }
		                    $count = mysqli_num_rows($search_query);
		                    if($count == 0){
		                        echo "<h1 class='text-center'> NO RESULT found for {$search} </h1>";
		                    } else {
		                        echo "<h1 class='text-center'> Search Results for {$search} </h1>";
		                        while($row = mysqli_fetch_assoc($search_query)){
		            				$adv_id = $row['id'];            
									$adv_title = $row['title'];
									$adv_description = $row['description'];  
									$adv_street = $row['street'];          
									$adv_province = $row['province'];        
									$adv_zip = $row['zip'];          
									$adv_group_size = $row['group_size'];      
									$adv_activity_type = $row['activity_type'];   
									$adv_activity_level = $row['activity_level']; 
									$adv_date_added = $row['date_added'];
									$adv_date_added = date('M d, Y', strtotime($adv_date_added));     
									$adv_image = base64_encode($row['image']); 
									$adv_image1 = base64_encode($row['image1']);         
									$adv_adventure_visit_counter = $row['adventure_visit_counter'];
									$adv_adventure_comment_counter = $row['adventure_comment_counter'];
									$adv_adventure_rating_counter = $row['adventure_rating_counter'];
		            			?>
		            
				                <div class="jumbotron p-2 mt-0 text-dark" style="width: auto; position: relative;">
				                    <div class="d-flex justify-content-start">
				                        <div class="aimg">
				                            <a href="adventures.php?a_id=<?php echo $adv_id; ?>">
				                                <img src="data:image/jpeg;base64,<?php echo $adv_image;?>" class="adv_pic">
				                            </a>
				                        </div>
				                        <div style="width: 100%;">
				                            <a href= "adventures.php?a_id=<?php echo $adv_id; ?>"  class="text-capitalize" style="font-size: 22px;">
				                                <?php echo $adv_title;?><br>
				                            </a>
				                            <small><a href=""><?php echo $adv_group_size; ?> Type</a></small>
				                            <br>
				                            <i class="fa fa-clock-o"></i> &nbsp;<small><?php echo $adv_date_added;?></small>
				                            <br>
				                            <p style="font-size: 17px; width: auto; word-break: break-all;">
				                                <?php echo $adv_description;?>
				                            </p>
				                            <a href= "adventures.php?a_id=<?php echo $id; ?>" class="btn btn-info btn-sm float-right">
				                                Read More
				                            </a>
				                        </div>                
				                    </div>
				                </div>                
		                    <?php
		                            }
		                        }
		                    }

		                ?>
	            </div>
	        </div>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>
	        <h1>aaaaa</h1>

	    </div>
	</section>

	<?php include('inc/footer.php'); ?>
