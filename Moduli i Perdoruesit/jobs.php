<?php

session_start();
if ((isset($_SESSION['emri_kompanise']) != '')) {
    header('Location: home.php');
}
include ('config.php');
include ('Crud.php');


if (isset($_POST['submit_btn'])) {
    $search = $_POST['search'];
    $kategoria = $_POST['kategoria'];
    $Lokacioni = $_POST['lokacioni'];



    $sql = "SELECT shpalljet.Shpallja, shpalljet.id_shpallja  , shpalljet.orari, shpalljet.id_shpallja , shpalljet.pershkrimi, shpalljet.data_e_shpalljes , shpalljet.Paga , kompania.Emri , kompania.id_lokacioni,kompania.Foto ,kompania.id_Kompania  , kategorite.Emri_kategorise FROM shpalljet LEFT OUTER JOIN kompania ON shpalljet.id_kompania = kompania.id_Kompania LEFT OUTER JOIN kategorite on shpalljet.id_kategoria = kategorite.id_Kategoria
      WHERE 1=1";

    if (!empty($search)) {
        $sql .= " AND shpalljet.Shpallja LIKE '%$search%'";
    }
    if (!empty($kategoria)) {
        $sql .= " AND kategorite.Emri_kategorise = '$kategoria'";
    }
    if (!empty($Lokacioni)) {
        $sql .= " AND kompania.id_lokacioni = '$Lokacioni'";
    }

    $rezultati = mysqli_query($lidhe, $sql);
} else {
    $sql = "SELECT shpalljet.Shpallja , shpalljet.id_shpallja ,shpalljet.pershkrimi , shpalljet.orari,shpalljet.data_e_shpalljes , shpalljet.Paga , kompania.Emri , kompania.id_lokacioni , kompania.id_Kompania , kompania.Foto ,kategorite.Emri_kategorise FROM shpalljet LEFT OUTER JOIN kompania ON shpalljet.id_kompania = kompania.id_Kompania LEFT OUTER JOIN kategorite on shpalljet.id_kategoria = kategorite.id_Kategoria";

    $rezultati = mysqli_query($lidhe, $sql);
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
      
        <style>
          :root{
    --main-color:#2980b9;
    --red:red;
    --light-color: #777;
    --light-bg:#eee;
    --black:#2c3e50;
    --white:#fff;
    --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    --border:.1rem solid rgba(0,0,0,.2);



}.job-filter form {
    background-color: var(--white);
    box-shadow: var(--box-shadow);
    border: var(--border);
    border-radius: .5rem;
    padding: 1.5rem;
    max-width: 80%; 
    margin: 0 auto; 
}

.job-filter form .flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    column-gap: 10px;
    padding:10px
}

.job-filter form .flex .box {
    flex: 1 1 40rem;
    display: flex;
    gap: 35px;
    align-items: center;
    justify-content: center;
}
label{
   position: relative;
   left:40px
}

.search{
  width: 200px ;
  display: flex;
  flex-direction:column;
  justiy-content:center;
  align-iteams:center

  
}
.search label{
  position: relative;
  bottom : 5px;

}


.job-filter form .flex .box .input {
    width: 83%;
    /* max-width: 250px; */
    border-radius: .5rem;
    padding: 0.8rem;
    color: var(--black);
    /* margin: 0.5rem 0; */
    background-color: var(--light-bg);
    font-size: 1rem;
}

.job-filter form .flex .box .form-select {
    width: 100%;
    max-width: 250px;
    border-radius: .5rem;
    padding: 0.8rem;
    color: var(--black);
    margin: 0.5rem 0;
    background-color: var(--light-bg);
    font-size: 1rem;
}

.job-filter form .flex .box .btn {
    padding: 0.8rem 1.2rem;
    font-size: 1rem;
    margin: 0.5rem 0;
    border-radius: .5rem;
}
.button{
  position: relative;
  top:10px;
  width: 80px;
  padding: 13px;
  background-color: #ed563b;
  color: white;
  border-radius: 4px;
  border: 1px solid  #ed563b;
  transition: background-color 0.3s ease, color 0.3s ease; 
}
.button:hover{
  background-color: white;
  color: #ed563b;
  border: 1px solid #ed563b;;
}
@media (max-width: 769px) {
  
.loactioni  {
  width: 200px !important;
}
.loactioni label{
  margin-left:20px
}
.search{
  width: 200px;
  

  
}


}


        </style>
    
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

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Jobs</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="job-filter">
      <br>
      <h2 class="heading" style="text-align: center;">Filter jobs</h2>
      <br>
      <div class="flex">
            
      <form action="jobs.php" method="POST">
          <div class="flex">
            
              <div class="box">
                <div id="search" style="width:200px ;">
                <label for="">Search job</label>
                  <input type="text" name="search" id="" class="input" placeholder="Search your job" style="width:190px ">
  
                </div>
              <div class="kategoria">
                <label for="">Kategoria</label>
              <select class="form-select form-select-lg mb-3 input" name="kategoria">
                      <option selected></option>
                      <?php
                      $sql = "SELECT * FROM kategorite";
                      $result = mysqli_query($lidhe, $sql);
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='" . $row['Emri_kategorise'] . "'>" . $row['Emri_kategorise'] . "</option>";
                      }
                      ?>
                  </select>
              </div>
                  
  <div class="loactioni">
    <label for="">Lokacioni</label>
    <select id="cars" class="form-select form-select-lg mb-3 input" name="lokacioni">
                      <option selected></option>
                      <?php
                      $sql = "SELECT * FROM Lokacioni";
                      $result = mysqli_query($lidhe, $sql);
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='" . $row['id_lokacioni'] . "'>" . $row['lokacioni'] . "</option>";
                      }
                      ?>
                  </select>
  </div>
                  
  
                  <button class="button" style="margin-top: 0;" name="submit_btn">Search</button>
              </div>
          </div>
      </form>
  </section>
  
  
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
      <div class="container tt">
          <br><br>
          <div class="col-lg-12">
              <div class="row">
              <?php
            
            while ($row = mysqli_fetch_array($rezultati)) { ?>
                  <div class="col-md-4">
                      <div class="trainer-item">
                          <div class="image-thumb">
                              <img  src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="">
                          </div>
                          <div class="down-content">
                              <span><?= $row['Paga'] ?>€</span>
                              <h4><?= $row['Shpallja'] ?></h4>
                              <?php
                    $lokacioni_sql = "SELECT lokacioni FROM Lokacioni WHERE id_lokacioni='" . $row['id_lokacioni'] . "'";
                    $rez_lokacioni = mysqli_query($lidhe, $lokacioni_sql);

                    if ($rez_lokacioni) {
                        $lokacioni_row = mysqli_fetch_assoc($rez_lokacioni);
                        $lokacioni = $lokacioni_row['lokacioni'];
                    }
                    ?>
                              <p><i style="font-size: 15px;" class="fa fa-map-marker" aria-hidden="true"></i> <?= $lokacioni ?></p>
                              <ul class="social-icons">
                                  <form method="POST" action="view.php">
                                      <input type="hidden" name="lokacioni" value="<?= $lokacioni ?>">
                                      <input type="hidden" name="id_shpallja" value="<?= $row['id_shpallja'] ?>">
                                      <input type="hidden" name="kompania" value="<?= $row['Emri'] ?>">
                                      <li><button type="submit" name="apply" class="btn">+ View More</button></li>
                                  </form>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
              </div>
          </div>
      </div>
      <br>
      <nav>
          <!-- <ul class="pagination pagination-lg justify-content-center">
              <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                  </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                  </a>
              </li>
          </ul> -->
      </nav>
  </section>
  
    <!-- ***** Fleet Ends ***** -->
<style>
   
    footer{
        padding: 0px;
    }
</style>
    
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