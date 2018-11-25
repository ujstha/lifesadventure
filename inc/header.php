    <!-- Title -->
    <title>lifesadventure</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet">

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
            transition: all ease .2s;
        }
        #search-btn, .dorne-add-listings-btn {
            text-transform: uppercase;
            color: white;
        }
        button:hover {
            cursor: pointer;
        }
        @media only screen and (max-width: 768px) {
            .dorne-add-listings-btn a.dorne-btn {
                margin-top: 5px;
            }
        }
    </style>

</head>

<body>
    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="search.php" method="get">
                        <input type="search" name="search" id="search" placeholder="Search for adventures....">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php" style="font-family: 'Cedarville Cursive', cursive;">lifesadventure</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explore <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.php">Home</a>
                                        <a class="dropdown-item" href="explore.php">Explore</a>
                                        <a class="dropdown-item" href="listing.php">Listing</a>
                                        <a class="dropdown-item" href="single-listing.php">Single Listing</a>
                                        <a class="dropdown-item" href="contact.php">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listings <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="index.php">Home</a>
                                        <a class="dropdown-item" href="explore.php">Explore</a>
                                        <a class="dropdown-item" href="listing.php">Listing</a>
                                        <a class="dropdown-item" href="single-listing.php">Single Listing</a>
                                        <a class="dropdown-item" href="contact.php">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                            <!-- Search btn -->
                            <div class="dorne-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                            </div>
                            <?php if(isset($_SESSION['email_address'])) {?>
                                <li class="nav-item dropdown">
                                    <!-- calling data from database -->
                                    <?php
                                        $cn = makeconnection();
                                        $s="select * from customer";
                                        $result=mysqli_query($cn,$s);
                                        $r=mysqli_num_rows($result);                            

                                        while ($data=mysqli_fetch_array($result)) {
                                            if ($_SESSION["email_address"] == $data["email_address"]) {
                                                $id = $data['id'];
                                                $propic = base64_encode($data['profile_pic']);
                                                $profname = $data['first_name'];
                                                $prolname = $data['last_name'];
                                                $proemail = $data['email_address'];
                                                $progender = $data['gender'];
                                                $proage = $data['age'];
                                                $procountry = $data['country'];
                                                $propass = $data['decrypt_pass'];

                                                ?>
                                                
                                                <!-- /calling data from database -->
                                                <a class="nav-link dropdown-toggle" href="#" id="signedin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span><img src="data:image/jpeg;base64,<?php echo $propic; ?>" style="width: 30px; height: 30px; border-radius: 50%;"></span> &nbsp; <?php echo $profname;?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" id="signedin-menu">
                                                    <a class="dropdown-item" href="profile.php">
                                                        <span><i class="fa fa-user-circle" aria-hidden="true"></i></span> My Profile
                                                    </a>
                                                    <a class="dropdown-item" href="edit-profile.php">
                                                        <span><i class="fas fa-user-edit" aria-hidden="true"></i></span> Edit Profile
                                                    </a>
                                                    <a class="dropdown-item" href="logout.php">
                                                        <span><i class="fa fa-sign-out" aria-hidden="true"></i></span> Logout
                                                    </a>
                                                </div>

                                        <?php     }
                                        }
                                        mysqli_close($cn);
                                    ?>
                                </li>
                            <?php } else {?>
                                <!-- Signin btn -->
                                <div class="dorne-add-listings-btn">
                                    <a href="#" class="btn dorne-btn" data-toggle="modal" data-target="#signinModal">Sign in</a>
                                    <a href="#" class="btn dorne-btn" data-toggle="modal" data-target="#registerModal">Register</a>
                                </div>
                            <?php }?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->