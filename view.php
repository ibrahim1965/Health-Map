<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/view.css">
<!--font awesome-->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Health Map | Services</title>


</head>
<body>

    
    <!-- viewing hospitals, clinics and labs here -->
    <div class="view mt-5">
       <div class="container">
        
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hospitals</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Clinics</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Labs</a>
  </li>
</ul>
           
           
        
<div class="tab-content mt-5" id="myTabContent">
    
    
    
    
    
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="hospital-tab">
      <!--for admin-->
      <div class="admin-buttons d-flex justify-content-end ">
         <a href="hospitalForm.html" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Hospital Name</h5>
        
          <div class="d-flex justify-content-center">
          <a href="specHospital.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>
 <!--loop end here-->
    </div>
      
       </div>
      
      
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="clinic-tab">
      
      
      <!--for admin-->
      <div class="admin-buttons d-flex justify-content-end ">
         <a href="clinicForm.html" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Clinic Name</h5>
       
          <div class="d-flex justify-content-center">
          <a href="specClinic.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>
 <!--loop end here-->
    </div>
      
       </div> 
      
      
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="lab-tab">
      
      <!--for admin-->
      <div class="admin-buttons d-flex justify-content-end ">
         <a href="labForm.html" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Lab Name</h5>
        
          <div class="d-flex justify-content-center">
          <a href="specLab.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>
 <!--loop end here-->
    </div>
      
       </div>
      
      
 </div>

    
    </div>
           
           
</div>
    
    

    
    
    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/index.js"></script>



</body>
</html>