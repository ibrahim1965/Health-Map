<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>



    <title>Health Map | Home Page</title>


</head>
<body>
<!--Navbar-->
    <?php include('includes/navbar.php') ?>

<!-- navbar ending -->
    
    <!--start header-->
    <header id="home">

        <div class="header-overlay d-flex align-items-center">
            <div class="container">
                <div class="header-content py-5">
                    <h3 class=" pt-5 animated flipInX" >Your Health Is Our Priority</h3>
                    <h1 class="animated flipInX delay-1s" >Choose With Confidence</h1>
                    <p class="text-dark animated zoomIn delay-2s pt-2">We will help you to feel better and enjoy every single day of your life.</p>
                    <?php if (!isset($_SESSION['ID'])) { ?>
                    <a href="register.php" class="btn btn-outline-primary e-btn-mine p-2 px-3 m-4" id="register">REGISTER</a>
              <a href="login.php" class="btn btn-outline-primary e-btn-mine  p-2 px-3" id="sign up">SIGN IN</a>
                    <?php 
                        }
                    ?>

                </div>
            </div>
        </div>
    
       

    </header>
    
    
        <!-- service_area_start -->
    <div class="service_area">
        
        <div class="container p-0">
            
            
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="fas fa-search-location"></i>
                        </div>
                        <h3>Searching</h3>
                        <p>Find the nearest hospitals, clinics and labs to you easily.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service bg-info">
                        <div class="icon">
                      <i class="far fa-clock"></i>
                        </div>
                        <h3>Working Hours</h3>
                        <p>We will help you to know your nearest hospital, clinic and labs working hours. everything become easier.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="fas fa-medkit"></i>
                        </div>
                        <h3>Save Time</h3>
                        <p>Your time matters to us. save your time and make an appointment online..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->



<!--starting footer-->

<?php include('includes/footer.php') ?>