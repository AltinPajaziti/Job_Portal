<?php
include('config.php');
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emri = $_POST['name'];
    $emaili = $_POST['email'];
    $subjekti = $_POST['subject'];
    $mesazhi = $_POST['message'];
    
    $stmt = mysqli_prepare($lidhe, "INSERT INTO kontakti (Emri, Emaili, Subjekti, Mesazhi) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $emri, $emaili, $subjekti, $mesazhi);

    if (mysqli_stmt_execute($stmt)) {
      echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          var alertElement = document.getElementById('alert');
          if (alertElement) {
              alertElement.classList.remove('hide');
          }
      });
  </script>";
    } else {
        echo "Error: " . mysqli_error($lidhe);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($lidhe);
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Job Agency Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                    <?php if(isset($_SESSION['emri_kompanise'])) { ?>
    <a href="home.php" class="logo">
        <i class="fas fa-briefcase" style="padding: 10px;"></i> 
    </a>
<?php } else { ?>
    <a href="index.php" class="logo">
        <i class="fas fa-briefcase" style="padding: 10px;"></i> 
    </a>
<?php } ?>

                        

                        <!-- ***** Logo Start ***** -->
                        <?php if(isset($_SESSION['emri_kompanise'])) { ?>
    <a href="home.php" id="logo">Job Agency<em style="color: black;font-style: normal;"> Website</em></a>
<?php } else { ?>
    <a href="index.php" id="logo">Job Agency<em style="color: black;font-style: normal;"> Website</em></a>
<?php } ?>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            

                        <li class="dropdown">
    <?php if (isset($_SESSION['emri'])) { ?>
        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['emri']  ?> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Profile.php">Profili</a>
            <a class="dropdown-item" href="Applied_jobs.php">Aplikimet</a>
            <a class="dropdown-item" href="Change_password.php">Change Password</a>
        </div>
    <?php } ?>
</li>
<li class="dropdown">
    <?php if (isset($_SESSION['emri_kompanise'])) { ?>
        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['emri_kompanise'] ?> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="PunedhensiProfile.php">Profili</a>
            <a class="dropdown-item" href="changepass.php">Change Password</a>
        </div>
    <?php } ?>
</li>

                        <?php 
                        if (!isset($_SESSION['emri'])&& !isset($_SESSION['emri_kompanise'])) { ?>


                        <li>
                          
                              <a href="index1.php">Punekerkuesi</a>
                          
                      </li>
                      <?php } ?>
                      <?php if (!isset($_SESSION['emri'])&& !isset($_SESSION['emri_kompanise'])) { ?>
                      <li>
                         
                              <a href="index2.php">Punedhensi</a>
                          
                      </li>
                      <?php } ?>
                      <?php if (!isset($_SESSION['emri_kompanise'])) { ?>

                      <li><a href="jobs.php">Jobs</a></li>

                      <?php } ?>
                      <?php if (isset($_SESSION['emri_kompanise']) || isset($_SESSION['emri'])) { ?>

                      <li>
                              <a href="logout.php">Logout</a>
                      </li>
                      <?php } ?>

                      
                            </li> 
                            <li><a href="contact.php">Contact</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
        <section class="section alert-section" style="padding: 50px 0; width: 50%; margin: auto;">

<!-- Success alert message -->
<div id="alert" class="alert alert-success hide" style="position:relative;right:300px; top:-40px; background-color: #8bc34a; border: 1px solid #8bc34a; padding: 15px 20px; color: white; animation:show_slide 1s ease forwards;">
    <div class="alert-container" style="position: relative; max-width: 960px; margin: 0 auto;">
        <div class="alert-icon" style="float: left; margin-right: 15px;">
            <i class="fa fa-check"></i>
        </div>
        <button type="button" onclick="closeAlert()" class="close-icon" data-dismiss="alert" aria-label="Close" style="float: right; color: #000; margin-top: 0; margin-left: 0; width: 21px; height: 21px; position: relative; background: none; border: none; outline: none; cursor: pointer; text-indent: -999px; overflow: hidden; white-space: nowrap;">
            <span>clear</span>
            <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(-45deg);"></span>
            <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(45deg);"></span>
        </button>
        Success :Mesazhi Juaj u dergua me Sukses
    </div>
</div>

<style>
  
@keyframes show_slide {
0%{
transform: translateX(100%)
}
40%{
transform: translateX(-10%)
}
80%{
transform: translateX(0%)
}
100%{
transform: translateX(-10px)
}

}
.alert {

animation:show_slide 1s ease forwards;


}

.hide{
  display:none;
}



</style>

<!-- Danger alert message -->

</section>
    </header>
    <!-- ***** Header Area End ***** -->

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Feel free to <em>Contact Us</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>contact <em> info</em></h2>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <h5><a href="#">+383 45 990 550</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <h5><a href="#">contact@company.com</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <h5>Tregu i Gjelbert Gjilan</h5>

                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->
   
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                  

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47094.37930663899!2d21.4622103!3d42.4618082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13548d28fe87b91d%3A0xab45b8a9d06a705!2sGjilan!5e0!3m2!1sen!2s!4v1719303279658!5m2!1sen!2s" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form id="contact" action="contact.php" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Name" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" value="Send Message" class="main-button">send message </button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    <style>
        footer{
            padding:0px;
        }
        
    </style>
    <script>
      function closeAlert() {
        document.getElementById('alert').classList.add('hide');
    }

</script>
    <!-- ***** Footer Start ***** -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
   
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Job Agency Website

            </h6>
            <p>
            Ky website është i dedikuar për të ndihmuar njerëzit të gjejnë punën e duhur dhe punëdhënësit të gjejnë kandidatë të përshtatshëm.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
            Useful Links
            </h6>
            <p>
              <a href="#!" class="text-reset"><i class="fas fa-home me-3"></i> Prishtinë, Kosovë

</a>
            </p>
            <p>
              <a href="#!" class="text-reset">               <i class="fas fa-envelope me-3"></i>
              info@jobagency.com

</a>
            </p>
            
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            
            <p><i class="fas fa-phone me-3"></i> +383 44 123 456</p>
            <p><i class="fas fa-print me-3"></i> +383 44 654 321</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://www.phpjabbers.com/free-job-website-template-138.php" target="_blank">phpjabbers.com</a>
      </div>
    <!-- Copyright -->
  </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>