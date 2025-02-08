<?php
include('config.php');
session_start();

$id_kkompania = $_GET['id_kkompania'];

$sql_select = "SELECT 
            Emri, 
            Emaili, 
            Numri_kompanise, 
            id_Kategoria, 
            id_lokacioni, 
            Profili, 
            Foto
        FROM kompania 
        WHERE id_Kompania = '".$id_kkompania ."'";
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

    table{
        padding:10px;
        margin-top:10px;
        border: .1rem solid rgba(0,0,0,.2);     }
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

  li {
      list-style-type: none;
  }

  .about {
      background-color: #eee;
      padding: 20px;
  }

  :root {
      --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
  }

  .box {
      background-color: white;
      width: 70%;
      margin: 0 auto;
      border-radius: 4px;
      padding: 25px;
      box-shadow: var(--box-shadow);
      border: .1rem solid rgba(0,0,0,.2);
  }

  .input {
      border: .1rem solid rgba(0,0,0,.2); 
      width: 50%;
  }

  @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');

  * {
      font-family: 'Comfortaa', cursive;
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

  table {
      width: 100%;
      margin-bottom: 20px;
      border-collapse: separate;
      border-spacing: 0 10px;
  }

  th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
  }

  th {
      background-color: #f2f2f2;
  }
</style>
  
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

<br><br><br>
<section class="about">
    <div class="box">

        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="" style="width: 150px;">
        <br>
        <table>
        <h4 style="text-align:center;"  >Company Details</h4>
    
        <tr>

                <th>Kompania</th>
                <td><?php echo $row['Emri']; ?></td>
            </tr>
            <tr>
                <th>Emaili</th>
                <td><?php echo $row['Emaili']; ?></td>
            </tr>
            <tr>
                <th>Lokacioni</th>
                <td>
                    <?php  
                    $sql_lokacioni = "SELECT * FROM lokacioni WHERE id_lokacioni = ".$row['id_lokacioni'];
                    $result_lokacioni = mysqli_query($lidhe, $sql_lokacioni);
                    $row_lokacioni = mysqli_fetch_assoc($result_lokacioni);
                    echo $row_lokacioni['lokacioni'];
                    ?>
                </td>
            </tr>
            <tr>
                <th>Numri i Kompanise</th>
                <td><?php echo $row['Numri_kompanise']; ?></td>
            </tr>
            <tr>
                <th>Kategoria</th>
                <td>
                    <?php  
                    $sql_kategoria = "SELECT * FROM kategorite WHERE id_Kategoria = ".$row['id_Kategoria'];
                    $result_kategoria = mysqli_query($lidhe, $sql_kategoria);
                    $row_kategoria = mysqli_fetch_assoc($result_kategoria);
                    echo $row_kategoria['Emri_kategorise'];
                    ?>
                </td>
            </tr>
            <tr>
                <th>Profili</th>
                <td><?php echo $row['Profili']; ?></td>
            </tr>
        </table>
    </div>
</section>
<?php } ?>

<footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                        <p><a href="#!" class="text-reset">Angular</a></p>
                        <p><a href="#!" class="text-reset">React</a></p>
                        <p><a href="#!" class="text-reset">Vue</a></p>
                        <p><a href="#!" class="text-reset">Laravel</a></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                        <p><a href="#!" class="text-reset">Pricing</a></p>
                        <p><a href="#!" class="text-reset">Settings</a></p>
                        <p><a href="#!" class="text-reset">Orders</a></p>
                        <p><a href="#!" class="text-reset">Help</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope me-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                </div>
            </div>
        </section>
    </footer>