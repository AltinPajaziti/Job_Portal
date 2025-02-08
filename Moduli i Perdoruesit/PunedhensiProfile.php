<?php
include('config.php');
session_start();



if (!(isset($_SESSION['emri_kompanise']) != '')) {
    header('location: index2.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = mysqli_real_escape_string($lidhe, $_POST['Emri']);
    $emaili = mysqli_real_escape_string($lidhe, $_POST['Emaili']);
    $numri_kompanise = mysqli_real_escape_string($lidhe, $_POST['Numri_kompanise']);
    $faqja_kompanise = mysqli_real_escape_string($lidhe, $_POST['Faqja_kompanise']);
    $id_kategoria = mysqli_real_escape_string($lidhe, $_POST['id_Kategoria']);
    $id_lokacioni = mysqli_real_escape_string($lidhe, $_POST['id_lokacioni']);
    $rreth_kompanise = mysqli_real_escape_string($lidhe, $_POST['pershkrimi']);

    $sql_update = "UPDATE kompania SET 
        Emri = '$emri', 
        Emaili = '$emaili', 
        Numri_kompanise = '$numri_kompanise', 
       
        id_Kategoria = '$id_kategoria', 
        id_lokacioni = '$id_lokacioni', 
        Profili = '$rreth_kompanise'
        WHERE id_Kompania = '".$_SESSION['id_kompania']."'";

    mysqli_query($lidhe, $sql_update);
    echo "<script>alert('Profile updated successfully'); setTimeout(function(){ window.location.href = 'PunedhensiProfile.php'; }, 2000);</script>";
    
}

$sql_select = "SELECT 
            Emri, 
            Emaili, 
            Numri_kompanise, 
       
            id_Kategoria, 
            id_lokacioni, 
            Profili, 
            Foto
        FROM kompania 
        WHERE id_Kompania = '".$_SESSION['id_kompania']."'";
$result = mysqli_query($lidhe, $sql_select);

if ($result) {
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     
<style>
    
   
 
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
</header>

    <br><br><br>
    <section class="about">
        <div class="box">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="" style="width: 150px;">
            <br>
            <div class="box1">
                <form action="PunedhensiProfile.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputText1">Kompania</label>
                            <input type="text" class="form-control" id="inputText1" value="<?php echo $row['Emri']; ?>" name="Emri" placeholder="Kompania">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputText2">Emaili</label>
                            <input type="text" class="form-control" id="inputText2" value="<?php echo $row['Emaili']; ?>" name="Emaili" placeholder="Emaili">
                        </div>
                    </div>
                    <div class="form-row">
                       
                        <div class="form-group col-md-6">
                            <label for="inputSelect1">Lokacioni</label>
                            <select id="inputSelect1" class="form-control" name="id_lokacioni">
                                <option value="" style="display:block"></option>
                                <?php  
                                $sql_lokacioni = "SELECT * FROM lokacioni";
                                $result_lokacioni = mysqli_query($lidhe, $sql_lokacioni);
                                while ($row_lokacioni = mysqli_fetch_array($result_lokacioni)) {
                                    $selected = ($row_lokacioni['id_lokacioni'] == $row['id_lokacioni']) ? 'selected' : '';
                                    echo "<option value='".$row_lokacioni['id_lokacioni']."' $selected>".$row_lokacioni['lokacioni']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputText4">Numri i Kompanise</label>
                            <input type="text" class="form-control" id="inputText4" value="<?php echo $row['Numri_kompanise']; ?>" name="Numri_kompanise" placeholder="Numri i Kompanise">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSelect2">Kategoria</label>
                            <select id="inputSelect2" class="form-control" name="id_Kategoria">
                                <option value="" style="display:block"></option>
                                <?php  
                                $sql_kategoria = "SELECT * FROM kategorite";
                                $result_kategoria = mysqli_query($lidhe, $sql_kategoria);
                                while ($row_kategoria = mysqli_fetch_array($result_kategoria)) {
                                    $selected = ($row_kategoria['id_Kategoria'] == $row['id_Kategoria']) ? 'selected' : '';
                                    echo "<option value='".$row_kategoria['id_Kategoria']."' $selected>".$row_kategoria['Emri_kategorise']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTextarea">Profili</label>
                        <textarea class="form-control" id="inputTextarea" rows="3" name="pershkrimi" placeholder="Pershkrimi"><?php echo $row['Profili']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
    
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

    <script src="https://kit.fontawesome.com/654a579695.js" crossorigin="anonymous"></script>
</body>
</html>
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

<?php
} else {
    echo "Error fetching company details.";
}
?>
