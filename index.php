<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;700&display=swap" rel="stylesheet">


  <!-- style css -->
  <link rel="stylesheet" href="css/custom.css">

  <title>Pro-Fitness Gym</title>
<style>
  html {
  scroll-behavior: smooth;
}

  body {
    font-family: 'Roboto', sans-serif;
  }

  .hero-section h1 {
    font-family: 'Bebas Neue', sans-serif;
  }

  .hero-section p {
    font-family: 'Roboto', sans-serif;
  }
  .btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 10px rgba(0, 0, 0, 0.4);
}
.hero-content a:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
}
/* Spacing and alignment */
.container h1 {
  color: #333;
  font-size: 2.5rem;
  margin-bottom: 1rem;
}

/* Card Design */
.card {
  border-radius: 10px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.card-title {
  font-size: 1.25rem;
}

.card-footer {
  padding: 0.5rem 1rem;
}

.card img {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Button Styling */
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
}

/* Responsive Grid */
@media (max-width: 768px) {
  .card img {
    height: 200px;
    object-fit: cover;
  }
}



</style>

</head>

<body>
  <!-- Start Navigation here -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">Profitness gym</a>
    <span class="navbar-text"></span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav ml-auto">
        <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="member/memberLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="userRegistration.php" class="nav-link">Sign Up</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
  <header class="hero-section" style="height: 100vh; background-image: url('images/banner1a.jpg'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center; color: white; position: relative; text-align: center;">
  <!-- Semi-transparent overlay -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6);"></div>

  <!-- Hero Content -->
  <div class="hero-content" style="z-index: 1; padding: 20px; max-width: 800px; text-align: center;">
    <h1 class="text-uppercase font-weight-bold" style="font-size: 4rem; background: linear-gradient(90deg, #FFD700, #FF4500); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Welcome to Profitness</h1>
    <p style="font-size: 1.5rem; margin-top: 20px;">Keep your LIFE fit and healthy.<br>Join the Professional Fitness Center today!</p>
    <div class="mt-4">
      <a href="member/memberLogin.php" class="btn btn-lg btn-warning text-dark font-weight-bold mx-3 px-5 py-3" style="border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.4); transition: transform 0.3s, box-shadow 0.3s;">Login</a>
      <a href="userRegistration.php" class="btn btn-lg btn-danger text-white font-weight-bold mx-3 px-5 py-3" style="border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.4); transition: transform 0.3s, box-shadow 0.3s;">Sign Up</a>
    </div>
  </div>
</header>
 <!-- End Header Jumbotron -->


<hr>
  <!--Introduction Section End-->
  <!-- start service type -->
  <div id="Services" class="container mt-5">
  <h1 class="text-center text-uppercase font-weight-bold mb-4">Our Services</h1>
    
    <!-- end here -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Card 1 -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/06.jpg" class="card-img-top" alt="Yoga">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Yoga Classes</h5>
          <p class="card-text text-muted">Experienced trainers to guide you through yoga techniques for health and relaxation.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 2000</del></small> 
            <span class="font-weight-bold">&#8377; 800</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/03.jpg" class="card-img-top" alt="Weight Training">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Weight Training</h5>
          <p class="card-text text-muted">From bodybuilding to powerlifting, achieve your fitness goals with expert guidance.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 2000</del></small> 
            <span class="font-weight-bold">&#8377; 200</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/04.jpg" class="card-img-top" alt="Aerobics/Zumba">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Aerobics/Zumba</h5>
          <p class="card-text text-muted">Join vibrant and energetic sessions to stay fit and have fun!</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 1000</del></small> 
            <span class="font-weight-bold">&#8377; 700</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- service 1 end -->
<!-- service 2 start -->

<div class="container mt-5">
  <!-- Services Grid -->
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Cardio Classes -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/09.jpg" class="card-img-top" alt="Cardio Classes">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Cardio Classes</h5>
          <p class="card-text text-muted">Strengthen your heart and lungs with our expert-led cardio sessions.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 9000</del></small> 
            <span class="font-weight-bold">&#8377; 500</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>

    <!-- Group Training -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/05.jpg" class="card-img-top" alt="Group Training">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Group Training</h5>
          <p class="card-text text-muted">Stay motivated by exercising with friends. Join our group sessions today!</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 6000</del></small> 
            <span class="font-weight-bold">&#8377; 700</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>

    <!-- Endurance Training -->
    <div class="col">
      <div class="card shadow h-100">
        <img src="images/courseimg/08.jpg" class="card-img-top" alt="Endurance Training">
        <div class="card-body text-center">
          <h5 class="card-title font-weight-bold text-primary">Endurance Training</h5>
          <p class="card-text text-muted">Boost your stamina with our comprehensive endurance classes.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
          <p class="text-danger m-0">
            <small><del>&#8377; 400</del></small> 
            <span class="font-weight-bold">&#8377; 600</span>
          </p>
          <a href="userRegistration.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- our services end here -->
</div>
<hr>


 
    <!--about us Section-->
    <div id='about' class="jumbotron container ">
      <h3 class="text-center">About Us</h3>
      <p class="text-center col-11">
      <h3 class="column-title">Profitness</h3>
       <p>Pro-fitness is a place where people go and workout.
        It is a gymnastics centre that provides different types of physical training exercises 
        for members to practice for them improve to a healthily lifestyle. The gym was established 
       in 2006 and is located in Blantyre, chichiri opposite the Malawi national museum.</p>

       <p>Our dedicated trainers and fitness experts can help you discover new training techniques 
         and exercises that offer a dynamic and efficient full-body workout. </p>
      </p>
      <p>Profitness offers variety of services available for booking, such as cardio,yoga,zumba, weight lifting and endrunace training.</p>
      </p>

    </div>
  </div>
  <!-- end about us section  -->
 
  
    <!-- Start Happy Customer  -->
  <div class="jumbotron bg-primary" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white">Our Gym Trainers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar1.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Mark Arthur</h4>
              <p class="card-text">Trained martial arts expect with years of experice come join the martial arts class
                and start your jonuery.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar2.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Jane  Smith</h4>
              <p class="card-text"> Cardio exercises help streghthen your body and mind, i will take you through the cardio gym class.</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Alex Mogan</h4>
              <p class="card-text">I have been at profitness for 7 years, im a Professional trainer whos major focus is weight lifting</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar4.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Sarah Sinha</h4>
              <p class="card-text">Im a trained expect in yoga exercises, i will help you improve your body through yoga .</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->

  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->
    
  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us On: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Designed by Saurabh Sigma &copy; 2024.
          </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->
</div>
</div>
  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>