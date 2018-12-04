<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php include('func/function.php'); ?>

<?php include('inc/head.php'); ?>
<?php include('inc/header.php'); ?>

<style type="text/css">
    .adv_pic {
        width: 120px; 
        height: 120px;  
    }
    .aimg {
        width: 120px; 
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
    .block-27 ul {
		padding: 0;
		margin: 0; 
		max-width: 100%;
	}
	.block-27 ul li {
		display: inline-block;
		margin-bottom: 4px;
		font-weight: 400; 
	}
	.block-27 ul li a, .block-27 ul li span {
		color: #e9ecef;
		text-align: center;
		display: inline-block;
		width: 40px;
		height: 40px;
		line-height: 40px;
		border-radius: 50%;
	}
	.block-27 ul li.active a, .block-27 ul li.active span {
		background: #e9ecef;
		color: #f85959;
		border: 1px solid transparent; 
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

<section class="bg-img bg-overlay-9" style="background-image: url(assets/tree.jpg); background-attachment: fixed; padding-top: 10em; padding-bottom: 5em;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
            	<!-- error/success alert div -->
                <?php if ($imgMsg != ''): ?>
                    <div class="alert <?php echo $imgMsgClass; ?> text-center col-lg-10 offset-lg-1 alert-dismissable" id="flash-msg">
                        <?php echo $imgMsg; ?>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php endif; ?>
                <!-- error/success alert div -->
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
	                        echo "<h1 class='text-center text-light'> Search Results for '{$search}' </h1>";
	                        $cn = makeconnection();
	                        $per_page = 4;
			                if(isset($_GET['page'])){
			                    $page = $_GET['page'];
			                } else {
			                    $page ="";
			                }
			                
			                if($page == "" || $page == 1){
			                    $page_1 = 0;
			                } else {
			                    $page_1 =($page * $per_page) - $per_page;
			                }

			                $adv_query_count ="SELECT * FROM adventure WHERE title LIKE '%$search%' OR group_size LIKE '%$search%'";
			                $find_count  = mysqli_query($cn,$adv_query_count);
			                $count = mysqli_num_rows($find_count);
			                
			                $count = ceil($count / $per_page);
			                $s = "SELECT * FROM adventure WHERE title LIKE '%$search%' OR group_size LIKE '%$search%' LIMIT $page_1,$per_page";
							$q = mysqli_query($cn, $s);
	                        while($row = mysqli_fetch_assoc($q)){
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
			                            <a href="adventures.php?a_id=<?php echo $adv_id; ?>">
			                                <img src="uploads/<?php echo $adv_image;?>" class="adv_pic">
			                            </a>
			                        </div>
			                        <div style="width: 100%;">
			                            <a href= "adventures.php?a_id=<?php echo $adv_id; ?>"  class="text-capitalize" style="font-size: 22px;">
			                                <?php echo $adv_title;?><br>
			                            </a>
			                            <small><a href="adventures.php?filter%5B%5D=<?php echo $adv_group_size; ?>" id="asizeel"><?php echo $adv_group_size; ?> Type</a></small>
			                            <br>
			                            <i class="fa fa-clock-o"></i> &nbsp;<small><?php echo $adv_date_added;?></small>
			                            <br>
			                            <p style="font-size: 17px; width: auto; word-break: break-all;">
			                                <?php echo $adv_description;?>
			                            </p>
			                            <a href= "adventures.php?a_id=<?php echo $adv_id; ?>" class="btn btn-info btn-sm float-right">
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
        <div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<?php
							for ($page=1; $page <= $count ; $page++) { 
								$page_next = $page_1+1;
								if ($page == $page_next) { ?>
									<li class='active'><span><a href='search.php?search=<?php echo $search; ?>&page=<?php echo $page; ?>'><?php echo $page; ?></a></span></li>
								<?php } elseif ($page == $page_next+1) { ?>
									<li><span><a href='search.php?search=<?php echo $search; ?>&page=<?php echo $page_next+1; ?>'><i class="fas fa-angle-right"></i></a></span></li>
									<li><span><a href='search.php?search=<?php echo $search; ?>&page=<?php echo $count; ?>'><i class="fas fa-angle-double-right"></i></a></span></li>
								<?php } elseif ($page == $page_next-1) { 
									if ($page_next > 2) { ?>
										<li><span><a href='search.php?search=<?php echo $search; ?>'><i class="fas fa-angle-double-left"></i></a></span></li>
									<?php } ?>
									<li><span><a href='search.php?search=<?php echo $search; ?>&page=<?php echo $page_next-1; ?>'><i class="fas fa-angle-left"></i></a></span></li>
								<?php }
							} 
	                    ?>
					</ul>
				</div>
			</div>
		</div>
    </div>
</section>

<?php include('inc/footer.php'); ?>
