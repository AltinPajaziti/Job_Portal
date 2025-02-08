<?php
include('config.php');
include('Crud.php');

session_start();

if (isset($_POST['apply_btn'])) {

    if (isset($_SESSION['id'])) {
        $kompania = $_POST['kompania'];
        $id_perdoresi = $_SESSION['id'];
        $id_kompania = $_POST['id_kompania'];
        $id_shpallja = $_POST['id_shpallja'];

        $check_query = "SELECT * FROM aplikimet WHERE id_Perdoruesi = $id_perdoresi AND id_shpallja = $id_shpallja";

        $check_result = mysqli_query($lidhe, $check_query);
        if (!$check_result) {
            die('Error: ' . mysqli_error($lidhe));
        }

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>
                     document.addEventListener('DOMContentLoaded', function() {
                         var alertElement = document.getElementById('alert2');
                         if (alertElement) {
                             alertElement.classList.remove('hide');
                         }
                     });
                 </script>";
        } else {
            $kompania = $_POST['kompania'];
            $crud->Create('aplikimet', [
                'Emri_kompanise' => $kompania,
                'id_Perdoruesi' => $id_perdoresi,
                'id_kompania' => $id_kompania,
                'id_shpallja' => $id_shpallja
            ]);

            // Success message for applying
            echo "<script>
                     document.addEventListener('DOMContentLoaded', function() {
                         var alertElement = document.getElementById('alert');
                         if (alertElement) {
                             alertElement.classList.remove('hide');
                         }
                     });
                 </script>";
        }
    } else {
        header('location:index1.php');
        exit;
    }
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



}

 ul.lista {
    margin: 0.5rem 0;


}
   ul.lista li{
    padding: 0.3rem 0;
    font-size: 1.1rem;
    color: var(--light-color);
    margin-left: 3rem;

}
 .description{
    margin-top: 1.5rem;

}
 .description p{
    font-size: 1.1rem;
    color: var(--light-color);
    line-height: 1.5;
    padding: .5rem 0;
}

.job-details .details .save{
    background-color: var(--light-bg);
    border-radius: .5rem;
    padding: 1.5rem;
    cursor: pointer;
    font-size: 1.8rem;
    margin-top: 1rem;


}
.job-details .details .save:hover{
    background-color: var(--black);
    
}
.job-details .details .save:hover i{
     color: var(--white);

}
.job-details .details .save i{
    margin-right: .5rem;
    color: var(--black);

}
.job-details .details .save span{
    color: var(--light-color);

    
}

.job-details .details .save:hover span{
    color: var(--white);
}

 .box .box1 .basic-details{
    background-color: var(--light-bg);
    margin: 1.5rem 0;
    border-radius: .5rem;
    padding: 2rem;
    font-size: 18px;

}
.basic-details p{
    color: var(--light-color);
    padding-bottom: 1rem;
    font-size: 15px;


}
.button{
  width: 80px;
  padding: 10px;
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
            flex-direction: column;
    
            gap: 20px;
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
            Success alert: Aplikimi i juaj u realizua me sukses
        </div>
    </div>

    <!-- Danger alert message -->
    <div id="alert2" class="alert alert-danger hide" style="position:relative;right:300px;top:-40px; background-color: red; border: 1px solid red; padding: 15px 20px; color: white; animation:show_slide 1s ease forwards;">
        <div class="alert-container" style="position: relative; max-width: 960px; margin: 0 auto;">
            <div class="alert-icon" style="float: left; margin-right: 15px;">
                <i class="fa fa-info-circle"></i>
            </div>
            <button type="button" onclick="closeAlert2()" class="close-icon" data-dismiss="alert" aria-label="Close" style="float: right; color: #000; margin-top: 0; margin-left: 0; width: 21px; height: 21px; position: relative; background: none; border: none; outline: none; cursor: pointer; text-indent: -999px; overflow: hidden; white-space: nowrap;">
                <span>clear</span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(-45deg);"></span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(45deg);"></span>
            </button>
            Kujdes: Ju keni aplikuar më parë për këtë pozitë.        </div>
    </div>
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
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Job  <em>Details</em></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
<?php
    $lokacioni = $_POST['lokacioni'];
    $id_shpallja = $_POST['id_shpallja'];
    $sql = "SELECT * FROM shpalljet WHERE id_shpallja='" . $id_shpallja . "'";
    $result_details = mysqli_query($lidhe, $sql);
    while ($row = mysqli_fetch_assoc($result_details)) :
        $kompania_sql = "SELECT Emri , id_Kompania  FROM kompania WHERE id_kompania='" . $row['id_kompania'] . "'";
        $rez_kompania = mysqli_query($lidhe, $kompania_sql);
    
        if ($rez_kompania) {
            $kompania_row = mysqli_fetch_assoc($rez_kompania);
            $kompaniaa = $kompania_row['Emri'];
            $id_kkompania = $kompania_row['id_Kompania'];
        }
    ?>
    
    <section class="about">
      
        <div class="box">
            <div class="box1">
                <div>
                    <div class="box3" style=" display: flex;flex-direction: column; gap: 6px;">
                        <h4><?= $row['Shpallja'] ?></h4>
                        <a href="CompanyDetails.php?id_kkompania=<?=$id_kkompania ?>" style="color: blue; text-decoration: none;"><?= $kompaniaa ?></a>
                        </div>
                </div>
                <div class="lokacioni">
                    <i class="fas fa-map-marker-alt"></i>
                    <h7><?= $lokacioni ?></h7>
                </div>
                <div class="basic-details">
                    <h5>Salary</h5>
                    <p><?= $row['Paga'] ?>€</p>
                    <h5>Job type</h5>
                    <p><?= $row['orari'] ?></p>
                </div>
                <div class="details">
                    <ul class="lista">
                        <h5>Skills</h5>
                        <?php
                        $skills_array = explode(" ", $row['skills']);
                        foreach ($skills_array as $skill) {
                            echo "<li>" . $skill . "</li>";
                        }
                        ?>
                    </ul>
                    <br>
                    <ul class="lista">
                        <h5>Qualifications</h5>
                        <?php
                        $qualifications_array = explode(" ", $row['kualifikimet']);
                        foreach ($qualifications_array as $qualification) {
                            echo "<li>" . $qualification . "</li>";
                        }
                        ?>
                    </ul>
                    <br>
                    <div class="description">
                        <h5>Job description</h5>
                        <p><?= $row['pershkrimi'] ?></p>
                        <br>
                        <ul>
                            <li>posted <?= $row['data_e_shpalljes'] ?></li>
                        </ul>
                    </div>
                    <br><br>
                    <form action="view.php" method="post" class="flex-btn">
                        <input type='hidden' name='id_kompania' value='<?= $row['id_kompania'] ?>'>
                        <input type='hidden' name='id_shpallja' value='<?= $row['id_shpallja'] ?>'>
                        <input type="hidden" name="kompania" value="<?= $kompaniaa ?>">
                        <input type="hidden" name="lokacioni" value="<?= $lokacioni ?>">
                        <button type='submit' id="alertbutton" name='apply_btn' class="button">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <?php  endwhile; ?>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-us">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter full name" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <div class="row">
                             <div class="col-md-6">
                                <fieldset>
                                  <input type="text" class="form-control" placeholder="From date" required="">
                                </fieldset>
                             </div>

                             <div class="col-md-6">
                                <fieldset>
                                  <input type="text" class="form-control" placeholder="To date" required="">
                                </fieldset>
                             </div>
                          </div>
                       </div>
                  </div>
              </form>
           </div>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Send Request</button>
          </div>
        </div>
      </div>
    </div>
    


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