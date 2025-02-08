
<?php
session_start();
    
include('config.php');
include('Crud.php');
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
    <!-- <link rel="stylesheet" href="assets/css/alert.css"> -->
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
    <style>
        footer{
            padding: 0px;
        }
        #logo{
            font-size: 20px;
            
        }
    </style>
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php" class="logo" >
                            <i class="fas fa-briefcase" style="padding: 10px;"></i> 
                            
                        </a>

                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" id="logo">Job Agency<em style="color: black;font-style: normal;"> Website</em></a>
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
                      <li><a href="jobs.php">Jobs</a></li>
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
                        <!-- <div class="alert show">
  <span class="fas fa-exclamation-circle"></span>
  <span class="msg">Warning: this is a warning alert</span>
  <span class="close-btn">
    <span class="fas fa-times"></span>
  </span>
</div> -->



                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
 
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h2>Find the perfect <em>Job</em></h2>
                <div class="main-button">
                    <a href="jobs.php">Latest Jobs</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
   <section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Latest <em>Jobs</em></h2>
                </div>
            </div>
        </div>
        <div class="row">
    <?php
    $sql = "SELECT shpalljet.Shpallja, shpalljet.id_shpallja, shpalljet.orari, shpalljet.data_e_shpalljes, shpalljet.Paga, kompania.Emri, kompania.Foto, kompania.id_lokacioni 
            FROM shpalljet 
            LEFT OUTER JOIN kompania ON shpalljet.id_kompania = kompania.id_Kompania 
            ORDER BY shpalljet.data_e_shpalljes DESC 
            LIMIT 3";

    $rezultati = mysqli_query($lidhe, $sql);

    while ($row = mysqli_fetch_array($rezultati)) {
        $lokacioni = "Location not found";

        $lokacioni_sql = "SELECT lokacioni FROM Lokacioni WHERE id_lokacioni='" . $row['id_lokacioni'] . "'";
        $rez_lokacioni = mysqli_query($lidhe, $lokacioni_sql);

        if ($rez_lokacioni) {
            $lokacioni_row = mysqli_fetch_assoc($rez_lokacioni);
            $lokacioni = $lokacioni_row['lokacioni'];
        }
    ?>
    <div class="col-lg-4">
        <div class="trainer-item">
            <div class="image-thumb">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="">
            </div>
            <div class="down-content">
                <span><?php echo $row['Paga']; ?>€</span>
                <h4><?php echo $row['Shpallja']; ?></h4>
                <p><i style="font-size: 15px;" class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $lokacioni; ?></p>
                <ul class="social-icons">
                    <li>
                        <form method="POST" action="view.php">
                            <input type="hidden" name="lokacioni" value="<?php echo $lokacioni; ?>">
                            <input type="hidden" name="id_shpallja" value="<?php echo $row['id_shpallja']; ?>">
                            <input type="hidden" name="kompania" value="<?php echo $row['Emri']; ?>">
                            <button type="submit" name="apply" class="btn">+ View More</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

        <br>
        <div class="main-button text-center">
            <a href="jobs.php">View Jobs</a>
        </div>
    </div>
</section>

    <!-- ***** Cars Ends ***** -->

  


    <!-- ***** Blog End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>For additional information or assistance, please contact us and we will respond as soon as possible.







</p>
                        <div class="main-button">
                            <a href="contact.php">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    
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
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful Links
            </h6>
            <p><i class="fas fa-home me-3"></i> Prishtinë, Kosovë</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@jobagency.com
            </p>
          </div>
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

    <!-- Reference -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://www.phpjabbers.com/free-job-website-template-138.php" target="_blank">phpjabbers.com</a>
    </div>
    <!-- Reference -->
</footer>
<!-- ***** Footer End ***** -->


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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  </body>
</html>