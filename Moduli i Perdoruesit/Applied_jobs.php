<?php
session_start();
if (!isset($_SESSION['emri']) || empty($_SESSION['emri'])) {
    header('Location: index.php');
    exit(); 
}

include('Crud.php');
include('config.php');

if (isset($_POST['delete_btn'])) {
    $id = $_POST['id_Aplikimi'];
    if ($id) {
        $sql = "DELETE FROM aplikimet WHERE id_Aplikimi=?";
        $stmt = mysqli_prepare($lidhe, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
        } else {
            echo "Gabim në largim: " . mysqli_error($lidhe);
        }

        mysqli_stmt_close($stmt);
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
    <link rel="stylesheet" href="./assets/css/tablecss.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <title>PHPJabbers.com | Free Job Agency Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  
    </head>
    
    <body >
    
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
  body  {
        background-color: #eee; 
    }
     footer {
        padding: 10px 0;
        background-color: #f8f9fa;
        text-align: center;
        width: 100%;
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
.delete-button {
    border: none;
    background: none;
    color: red;
    cursor: pointer;
    transition: color 0.2s ease;
}

.delete-button:hover {
    color: white;
}


    .box1 {
        display: flex;

        gap: 40px;
    }
    .table {
      box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
      border: .1rem solid rgba(0,0,0,.2);

    }
    
hr
{      box-shadow:0 .5rem 1rem rgba(0,0,0,.1);

      border: .1rem solid rgba(0,0,0,.2);

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
       padding: 20px;
    }
    :root{
  --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}
    .box{
        width: 90%;
        margin: 0 auto;
        border-radius: 4px;
        padding: 25px;
        box-shadow: var(--box-shadow);
        border: .1rem solid rgba(0,0,0,.2);;
        
    }
    .input-group{
        /* border: .1rem solid rgba(0,0,0,.2);  */

        border :.1rem solid rgba(0,0,0,.2);
        border-radius:20px
        
       
    }
    .table__header {
      margin-top:10px;
    /* border: .1rem solid rgba(0,0,0,.2); */
     /* Optional: centers the content horizontally */
}

    @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');

    *{
        font-family: 'Comfortaa' , cursive;
    }

    table tr>th{
        background-color: #20525C;
        color: white;
    }

    table tbody tr:nth-child(odd){
        background-color: rgb(228, 228, 228);
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

  <style>
    .table__body{
      border: 1px solid black;
    }
    .table__body th{
      height: inherit;
    }
  </style>


    <!-- ***** Blog End ***** -->

    <!-- ***** Call to Action Start ***** -->
<br><br><br><br>
   

  <main class="table" id="customers_table" style="background-color:white;">
    <section class="table__header">
        <h5>Aplikimet</h5>
        <div class="input-group">
            <input type="search" placeholder="Search Data..." id="input">
        </div>
        <div class="export__file">
            <label for="export-file" class="export__file-btn" title="Export File"><i class="fas fa-file-export"></i></label>
            <input type="checkbox" id="export-file">
            <div class="export__file-options">
                <label>Export As &nbsp; &#10140;</label>
                <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
            </div>
        </div>
    </section>
    <hr >
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Photo <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Kompania <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Shpallja <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT aplikimet.*, shpalljet.*, kompania.*
                        FROM aplikimet 
                        LEFT OUTER JOIN shpalljet ON aplikimet.id_shpallja = shpalljet.id_shpallja
                        LEFT OUTER JOIN kompania ON kompania.id_kompania = shpalljet.id_kompania
                        WHERE Id_Perdoruesi = '" . $_SESSION['id'] . "'";
                $result = mysqli_query($lidhe, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['Id_Aplikimi']; ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt=""><?php echo $row['Emri_kompanise']; ?></td>
                    <td><?php echo $row['Emri_kompanise']; ?></td>
                    <td><?php echo $row['Shpallja']; ?></td>
                    <td style="cursor: pointer;">
    <form method="POST" action="Applied_jobs.php" style="margin: 0;" onsubmit="return confirmDelete();">
        <input type="hidden" name="id_Aplikimi" value="<?php echo $row['Id_Aplikimi']; ?>">
        <p class="status cancelled" style="float:left; width:100px;">
            <button type="submit" name="delete_btn" id="thbtn" class="delete-button">Delete</button>
        </p>
    </form>
</td>

                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<script src="./assets/js/table.js"></script>
    
    <br><br>
 
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
   

    
    <script>
function confirmDelete() {
    return confirm("A jeni të sigurt që dëshironi të largoni këtë aplikim?");
}
</script>

    
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