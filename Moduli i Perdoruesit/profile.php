

<?php
session_start();
if (!(isset($_SESSION['emri']) != '')) {
    header('Location: index.php');
}
include ('Crud.php');
include ('config.php');

?>
<?php
if (isset($_POST['submit'])) {
    $profili = mysqli_real_escape_string($lidhe, $_POST['Profili']);

    if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
        $CV = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
        $maxsize = 10000000;

        if ($_FILES['userfile']['size'] > $maxsize) {
            echo "File size is too large.";
        } else {
            $sql = "UPDATE perdoruesi SET Cv='$CV', Profili='$profili' WHERE Id_Perdoruesi='" . $_SESSION['id'] . "'";
        }
    } else {
        // Update only the profile if no CV was uploaded
        $sql = "UPDATE perdoruesi SET Profili='$profili' WHERE Id_Perdoruesi='" . $_SESSION['id'] . "'";
    }

    $result = mysqli_query($lidhe, $sql);
    if ($result) {
        echo "<script>alert('Profile updated successfully'); setTimeout(function(){ window.location.href = 'Profile.php'; }, 2000);</script>";
    } else {
        echo "Error updating profile: " . mysqli_error($lidhe);
    }
}

$sql = "SELECT Cv FROM perdoruesi WHERE Id_Perdoruesi=?";
$stmt = mysqli_prepare($lidhe, $sql);
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $cvData);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

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
    
<style>
   .header-area {
    background-color: white;
}

.header-area .nav a {
    color: black;
}

.header-area .logo {
    color: black;
}

.header-area #logo em {
    color: black;
}

.header-area .dropdown-menu a {
    color: black;
}

.header-area .menu-trigger span {
    color: black;
}

/* Ensuring styles remain the same even after scrolling */
.header-area.header-sticky {
    background-color: white !important;
}

.header-area.header-sticky .nav a {
    color: black !important;
}

.header-area.header-sticky .logo {
    color: black !important;
}

.header-area.header-sticky #logo em {
    color: black !important;
}

.header-area.header-sticky .dropdown-menu a {
    color: black !important;
}

.header-area.header-sticky .menu-trigger span {
    color: black !important;
}
   
 
    .viewbtn {
        margin-left: 8px;
    border-radius: 5px;
    background-color: white;
    padding: 6px;
    border: 1px solid #ed563b;
    color: #ed563b;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease; 
}

.viewbtn:hover {
    background-color: #ed563b;
    color: white;
}
    a {
    text-decoration: none !important;
}
li{
    list-style-type: none;
}
    .box1 {
        display: flex;

        gap: 40px;
    }

    .box3 {
        display: flex;

        gap: 10px;
    }

    #edukimi {
        font-size: 18px;
    }

    form textarea {
        width: 400px;
        height: 200px;
        border-radius: 8px;
    }
    .btn:hover {
        color: white;
    }
    
 .about{
     background-color: #eee;;
       padding: 20px;
      
    }
    :root{
  --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}
    .box{
      background-color: white;
        width: 90%;
        margin: 0 auto;
        border-radius: 4px;
        padding: 25px;
        box-shadow: var(--box-shadow);
        border: .1rem solid rgba(0,0,0,.2);;
        
    }
    .input{
        border: .1rem solid rgba(0,0,0,.2); 
        width: 50%;
    }
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');

    *{
        font-family: 'Comfortaa' , cursive;
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
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
   
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    
    <!-- ***** Cars Ends ***** -->

  


    <!-- ***** Blog End ***** -->

    <!-- ***** Call to Action Start ***** -->
        <br><br><br>
        <section class="about">
          <div class="box">
              <?php
              $sql = "SELECT * FROM perdoruesi WHERE Id_Perdoruesi='" . $_SESSION['id'] . "'";
              $result = mysqli_query($lidhe, $sql);
      
              if ($result) {
                  while ($row = mysqli_fetch_array($result)) {
              ?>
              <div class="box1">
                  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="" style="width: 100px;">
                  <div>
                      <div class="box3">
                          <h5><?php echo $row['Emri']; ?></h5>
                          <h5><?php echo $row['Mbiemri']; ?></h5>
                      </div>
                  </div>
              </div>
              <style>
                  footer {
                      margin: 0px;
                      padding: 0px;
                  }
              </style>
              <form action="profile.php" method="post" enctype="multipart/form-data">
                  <br>
                  <div class="mb-3" style="width: 350px;">
                      <p>Upload cv</p>
                      <input name="userfile" class="form-control form-control-sm" id="formFileSm" type="file" style="border: 0px; width: 65%;">
                  </div>
                  <?php
                  $cv_sql = "SELECT CV FROM perdoruesi WHERE Id_Perdoruesi='" . $_SESSION['id'] . "'";
                  $cv_result = mysqli_query($lidhe, $cv_sql);
                  $cvData = mysqli_fetch_array($cv_result)['CV'];
                  if (!empty($cvData)) {
                      echo '<a href="view_cv.php" class="viewbtn" style="width: 100px; padding: 6px;" target="_blank">View CV</a>';
                      echo "<br>";
                  }
                  ?>
                  <br><br>
                  <h4 id="edukimi" style="margin-bottom: 5px;">Profile</h4>
                  <div class="flex">
                      <?php
                      $profile_sql = "SELECT Profili FROM perdoruesi WHERE Id_Perdoruesi='" . $_SESSION['id'] . "'";
                      $profile_result = mysqli_query($lidhe, $profile_sql);
      
                      if (mysqli_num_rows($profile_result) > 0) {
                          while ($profile_row = mysqli_fetch_array($profile_result)) {
                      ?>
                          <textarea name="Profili" class="input" style="display: block;" maxlength="1000" cols="30" placeholder="Write your Profile" rows="10"><?= $profile_row['Profili']; ?></textarea>
                      <?php
                          }
                      } else {
                      ?>
                          <textarea name="Profili" class="input" style="display: block;" maxlength="1000" cols="30" placeholder="Write your Profile" rows="10"></textarea>
                      <?php
                      }
                      ?>
                      <br>
                      <button type="submit" name="submit" style="padding: 10px; width: 100px;" class="viewbtn">Save</button>
                  </div>
              </form>
              <?php
                  }
              }
              ?>
          </div>
      </section>
      
    
    <!-- ***** Call to Action End ***** -->
    <!-- Footer -->
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
  <!-- Footer -->
    
    <!-- ***** Footer Start ***** -->


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