<?php
session_start();



error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php'); // Assuming this file contains your database connection


if (!(isset($_SESSION['emri_kompanise']) != '')) {
    header('location: index2.php');
}


$hide = false;

if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    $shpallja = mysqli_real_escape_string($lidhe, $_POST['shpallja']);
    $data_e_shpalljes = date('Y-m-d', strtotime($_POST['data']));
    $pershkrimi = mysqli_real_escape_string($lidhe, $_POST['Pershkrimi']);
    $Paga = floatval($_POST['paga']); // Assuming Paga is a numeric value
    $kualifikimet = mysqli_real_escape_string($lidhe, $_POST['kualifikimet']);
    $orari = mysqli_real_escape_string($lidhe, $_POST['orari']);
    $skills = mysqli_real_escape_string($lidhe, $_POST['skills']);

    // Check session variables
    if (!isset($_SESSION['id_kompania']) || !isset($_SESSION['id_Kategoria'])) {
        die("Session variables are missing.");
    }

    // Check connection
    if (!$lidhe) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO shpalljet (id_kompania, Shpallja, id_kategoria, data_e_shpalljes, Paga, pershkrimi, kualifikimet, orari, skills)
            VALUES (
                " . $_SESSION['id_kompania'] . ", 
                '$shpallja', 
                " . $_SESSION['id_Kategoria'] . ", 
                '$data_e_shpalljes', 
                $Paga, 
                '$pershkrimi', 
                '$kualifikimet', 
                '$orari', 
                '$skills'
            )";

    echo $sql . "<br>";

    // Execute query
    if (mysqli_query($lidhe, $sql)) {
        $hide = true; // Show success message
        header("Location: shtoShpallje.php");
        exit();
    } else {
        // Debugging: Output MySQL error
        echo "Error inserting data: " . mysqli_error($lidhe);
    }

    // Close connection
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
    
<style>
    
   footer{
    padding: 0px;
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
form{
    width: 100%;
}
    .box1 {
        display: flex;
        width: 90%;
        
        

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
        width: 70%;
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
   
</style>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="home.php" class="logo">
                        <i class="fas fa-briefcase" style="padding: 10px;"></i>
                    </a>
                    <a href="home.php" id="logo">Job Agency<em style="color: black; font-style: normal;"> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav" >
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


                        <?php if (!isset($_SESSION['emri_kompanise'])) { ?>
                        <li>
                            <a href="index1.php">Punekerkuesi</a>
                        </li>
                        
                        <?php } ?>

                        <?php if (!isset($_SESSION['emri'])&& !isset($_SESSION['emri_kompanise'])) { ?>
                        <li>
                            <a href="home.php">Punedhensi</a>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="shpalljet.php">Shpalljet</a>
                        </li>

                        <li>
                            <?php if (isset($_SESSION['emri_kompanise']) || isset($_SESSION['emri'])) { ?>
                            <a href="logout.php">Logout</a>
                            <?php } ?>
                        </li>

                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>

                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
    <section class="section alert-section" style="padding: 50px 0; width: 50%; margin: auto;">

    <!-- Success alert message -->
     <?php if($hide == true){ ?>
 <div id="alert" class="alert alert-success" style="position:relative;right:300px; top:-40px; background-color: #8bc34a; border: 1px solid #8bc34a; padding: 15px 20px; color: white; animation:show_slide 1s ease forwards;">
 <div class="alert-container" style="position: relative; max-width: 960px; margin: 0 auto;">
     <div class="alert-icon" style="float: left; margin-right: 15px;">
         <i class="fa fa-check"></i>
     </div>
     <button type="button" onclick="closeAlert()" class="close-icon" data-dismiss="alert" aria-label="Close" style="float: right; color: #000; margin-top: 0; margin-left: 0; width: 21px; height: 21px; position: relative; background: none; border: none; outline: none; cursor: pointer; text-indent: -999px; overflow: hidden; white-space: nowrap;">
         <span>clear</span>
         <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(-45deg);"></span>
         <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(45deg);"></span>
     </button>
     Success alert: Shpallja e juaj u realizua me sukses
 </div>
</div>

   <?php  } ?>
   
    <!-- Danger alert message -->
    
</section>

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
</header>
    
    <!-- ***** Header Area Start ***** -->
     
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
           <h4>Shto Shpallje</h4>
           <br>

            <div class="box1">
               
            
            <form action="shtoShpallje.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputText1">Shpallja</label>
            <input type="text" class="form-control" name="shpallja" id="inputText1" placeholder="Shpallja" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputText2">Lokacioni</label>
            <input type="text" class="form-control" name="lokacioni" id="inputText2" placeholder="Lokacioni" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputText3">Data e Fillimit</label>
            <input type="date" class="form-control" name="data" id="inputText3" placeholder="Data e Filimit" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputText4">Paga</label>
            <input type="text" class="form-control" name="paga" id="inputText4" placeholder="Paga" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputText5">Kulifikimet</label>
            <input type="text" class="form-control" name="kualifikimet" id="inputText5" placeholder="Kulifikimet" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputText6">Orari</label>
            <input type="text" class="form-control" name="orari" id="inputText6" placeholder="Orari" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputText7">Skills</label>
            <input type="text" class="form-control" name="skills" id="inputText7" placeholder="Skills" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputTextarea">Profili</label>
        <textarea class="form-control" name="Pershkrimi" id="inputTextarea" rows="3" placeholder="Pershkrimi" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        
        // Perform additional validation here if needed
        
        // Display alert for successful submission
        alert('Shpallja eshte postuar me sukses');
        
        // Delay the form submission for a few seconds (e.g., 2 seconds)
    
    });
</script>


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