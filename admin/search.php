<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>

<style type="text/css">
    .adv_pic {
        width: 105px; 
        height: 120px;  
    }
    .aimg {
        width: 105px; 
        height: 120px;
        margin-right: 5px;
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
    .jumbotron, .jumbotron .btn {
    	border-radius: 0;
    }
    .close {
    	position: absolute;
    	top: 5px; 
    	right: 8px;
    }
    .searchform .form-control {
    	border-radius: 0;
    	border: 0;
    }
    @media only screen and (max-width: 768px){
        .adv_pic, .aimg {
            width: 100%; 
            height: 200px;   
        }
    }
</style>

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
	                        echo "
	                        <div class='container'>
	                        	<div class='row'>
	                        		<div class='alert alert-info text-center col-lg-12 alert-dismissable'>
	                        			<h4 class='text-center'><i class='fas fa-info'></i> &nbsp;Sorry we couldn't find any results for <br>'{$search}'</h4>
				                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>&times;</button>
				                    </div>
	                        		<div class='col-md-12 col-md mt-5 text-light'>
	                        			<h1 class='text-left text-light'>Search Tips</h1>
	                        			<ul>
	                        				<li>-> Check your spelling and try again.</li>
	                        				<li>-> Keep your search term simple as our search facility works best with short description.</li>
	                        			</ul>
	                        		</div>
	                        		<div class='col-md-12 col-md mt-5 text-light searchform'>
	                        			<h4 class='text-center text-light'>Search Again</h4>
	                        			<form class='d-flex' action='search.php' method='get'>
					                        <input class='form-control float-left col-md-9' type='search' name='search' placeholder='Search for adventures....'>
					                        <input class='float-right col-md-2 btn dorne-btn' type='submit' value='Search'>
					                    </form>
	                        		</div>
	                        	</div>
	                        </div>
	                        ";
	                    } else {
	                        echo "<h1 class='text-center'> Search Results for '{$search}' </h1>";
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
								$adv_image = $row['image']; 
								$adv_image1 = $row['image1'];         
								$adv_adventure_visit_counter = $row['adventure_visit_counter'];
								$adv_adventure_comment_counter = $row['adventure_comment_counter'];
								$adv_adventure_rating_counter = $row['adventure_rating_counter'];
	            			?>
	            
			                <div class="jumbotron p-2 mt-0 text-dark" style="width: auto; position: relative;">
			                    <div class="d-flex justify-content-start">
			                        <div class="aimg">
			                            <a href="list-adventures.php?a_id=<?php echo $adv_id; ?>">
			                                <img src="../uploads/<?php echo $adv_image;?>" class="adv_pic">
			                            </a>
			                        </div>
			                        <div style="width: 100%;">
			                            <a href= "list-adventures.php?a_id=<?php echo $adv_id; ?>"  class="text-capitalize" style="font-size: 22px;">
			                                <?php echo $adv_title;?><br>
			                            </a>
			                            <small><a href=""><?php echo $adv_group_size; ?> Type</a></small>
			                            <br>
			                            <i class="fa fa-clock-o"></i> &nbsp;<small><?php echo $adv_date_added;?></small>
			                            <br>
			                            <p style="font-size: 17px; width: auto; word-break: break-all;">
			                                <?php echo $adv_description;?>
			                            </p>
			                            <a href= "list-adventures.php?a_id=<?php echo $adv_id; ?>" class="btn btn-info btn-sm float-right">
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
    </div>
</section>

<?php include('inc/footer.php'); ?>
