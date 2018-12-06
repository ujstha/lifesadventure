

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Upright" rel="stylesheet">

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
        .navbar-expand-xl .navbar-nav .nav-link {
            padding-right: 15px;
            padding-left: 15px;
            color: #fff;
            font-size: 15px;
        }
        .nav-link {
            text-transform: uppercase;
            border-bottom: -2px solid #7643ea;
        }
        .navbar-nav .nav-link:hover {
            border-bottom: 1px solid #7643ea;
            color: #7643ea;
            transition: all ease .2s;
        }
        #search-btn, .dorne-add-listings-btn {
            text-transform: uppercase;
            color: white;
        }
        button:hover {
            cursor: pointer;
        }
        .dorne-add-listings-btn a {
            color: pink;
        }
        a#signedin {
            color: pink;
        }
        .addevent.btn {
            border-radius: 0;
        }
        .modal, .modal-content, .modal-dialog {
            border-radius: 0;
        }
        @media only screen and (max-width: 768px) {
            .dorne-add-listings-btn a {
                font-size: 18px;
            }
        }
        @media (min-width: 1024px) and (max-width: 1365px) {
            .navbar-toggler {
                border: 2px solid #fff;
                color: #fff;
                margin: 37px 0;
                -webkit-transition-duration: 500ms;
                        transition-duration: 500ms;
            }
            .sticky .navbar-toggler {
                margin: 17px 0
            }
            #dorneNav {
                padding: 30px;
                background-color: #341a79;
                box-shadow: 1px 9px 10px rgba(255, 255, 255, 0.15);
                border-radius: 0 0 3px 3px
            }
            .dorne-search-btn > a,
            .dorne-signin-btn > a {
                margin-right: 0;
                margin-left: 15px;
                padding: 10px 0;
            }
            .hero-content h2 {
                color: #fff;
                font-size: 42px;
            }
            .hero-social-btn {
                bottom: 140px;
                left: 30px;
                z-index: 0;
            }
            .hero-search-form .tab-content .tab-pane form .custom-select {
                padding: 0 10px;
                margin-right: 5px;
            }
            .dorne-btn {
                min-width: 150px;
            }
            .single-catagory-area .catagory-content h6 {
                font-size: 13px;
            }
            .about-content h2 {
                font-size: 36px;
            }
            .single-catagory-area {
                padding: 40px 15px;
            }
            .clients-logo img {
                padding: 0 15px;
            }
            .explore-search-area {
                -webkit-box-flex: 0;
                    -ms-flex: 0 0 60%;
                        flex: 0 0 60%;
                width: 60%;
            }
            .explore-map-area {
                -webkit-box-flex: 0;
                    -ms-flex: 0 0 40%;
                        flex: 0 0 40%;
                width: 40%;
            }
            .explore-search-form,
            .explore-search-result {
                -webkit-box-flex: 0;
                    -ms-flex: 0 0 50%;
                        flex: 0 0 50%;
                width: 50%;
            }
            .explore-search-form {
                padding: 30px 15px;
            }
            .explore-search-result {
                padding: 0 15px;
            }
            .explore-search-form h6 {
                font-size: 14px;
            }
            .explore-search-form .tab-content .tab-pane form .custom-select {
                margin-bottom: 15px;
            }
            .listing-sidebar {
                margin-top: 100px;
            }
            .contact-form-area {
                padding: 50px 20px;
            }
            .single-contact-info:first-child {
                margin-right: 0;
            }
            .contact-text h4 {
                font-size: 20px;
            }
        }
    </style>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>
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
                    <nav class="h-100 navbar navbar-expand-xl">
                        <a class="navbar-brand" href="index.php" style="font-family: 'Tangerine', serif; font-size: 48px; color: pink;">Lifesadventure</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="adventures.php">Adventures</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="events.php">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="accommodation.php">Accommodation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="transportAPI/transport.php" target="_blank">Transport</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                            </ul>
                            <!-- Search btn -->
                            <div class="dorne-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                            </div>
                            <?php if(isset($_SESSION['email_address'])) {?>
                                <li class="nav-item dropdown px-0 py-0 my-0 mx-0">
                                    <!-- calling data from database -->
                                    <?php
                                        $cn = makeconnection();
                                        $s="select * from customer";
                                        $result=mysqli_query($cn,$s);
                                        $r=mysqli_num_rows($result);                            

                                        while ($data=mysqli_fetch_array($result)) {
                                            if ($_SESSION["email_address"] == $data["email_address"]) {
                                                $id = $data['id'];
                                                $propic = $data['profile_pic'];
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
                                                    <span><img src="./uploads/<?php echo $propic; ?>" style="width: 30px; height: 30px; border-radius: 50%;"></span> &nbsp; <?php echo $profname;?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" id="signedin-menu">
                                                    <a class="dropdown-item" href="profile.php">
                                                        <span><i class="fa fa-user-circle" aria-hidden="true"></i></span> My Profile
                                                    </a>
                                                    <a class="dropdown-item" href="edit-profile.php">
                                                        <span><i class="fas fa-user-edit" aria-hidden="true"></i></span> Edit Profile
                                                    </a>
                                                    <a class="dropdown-item" href="change-password.php?email=<?php echo $proemail; ?>">
                                                        <span><i class="fas fa-key aria-hidden="true"></i></span> Change Password
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
                                <div class="dorne-add-listings-btn">
                                    <a href="add-event.php" class="btn btn-sm btn-primary addevent">Add Event</a>
                                </div>
                            <?php } else {?>
                                <!-- Signin btn -->
                                <div class="dorne-add-listings-btn">
                                    <a href="#" data-toggle="modal" data-target="#signinModal">Sign In</a> &nbsp; | &nbsp;
                                    <a href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                                </div>
                            <?php }?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->