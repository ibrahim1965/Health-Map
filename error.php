<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<title>Health Map | Error</title>
</head>
<body>
   <!--Navbar-->
   <?php include('includes/navbar.php') ?>
   <!-- navbar ending -->
   <div class="e-region-intro my-5">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="e-region-introlayer">
                  <h2 class="w-50 m-auto text-center font-weight-bold"> 404</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="e-error-area text-center ">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="error-layer">
                  <h2> 404 </h2>
                  <h3>Page Not Found!</h3>
                  <h4>Oops! Looks like something going rong</h4>
                  <p>We can’t seem to find the page you’re looking for<br/>
                     make sure that you have typed the currect URL
                  </p>
                  <a class="btn btn-outline-primary error-btn e-btn-mine font-weight-bold py-2" href="index.php">Go To Home</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--starting footer-->
   <?php include('includes/footer.php') ?>