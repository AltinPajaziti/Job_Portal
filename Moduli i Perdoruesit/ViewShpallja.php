<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is not logged in
if (empty($_SESSION['emri_kompanise'])) {
    header('Location: index2.php');
    exit();
}

include('config.php'); // Assuming this file contains your database connection

$hide = false;
$id_shpallja = $_POST['id_shpallja'] ?? null; // Get the id_shpallja from POST or initialize to null

// Check if the id_shpallja is available
if ($id_shpallja) {
    // Fetch the existing data for the id_shpallja
    $sql = "SELECT * FROM shpalljet WHERE id_shpallja = ?";
    if ($stmt = mysqli_prepare($lidhe, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id_shpallja);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $shpallja_data = mysqli_fetch_assoc($result); // Fetched data stored in $shpallja_data
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($lidhe);
    }
}
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
        <h4 style="text-align:center;">Shpallja Details</h4>
        <table>
            <?php if ($shpallja_data) { ?>
            <tr>
                <th>Shpallja</th>
                <td><?= htmlspecialchars($shpallja_data['Shpallja']); ?></td>
            </tr>
            <tr>
                <th>Paga</th>
                <td><?= htmlspecialchars($shpallja_data['Paga']); ?></td>
            </tr>
           
            <tr>
                <th>Orari</th>
                <td><?= htmlspecialchars($shpallja_data['orari']); ?></td>
            </tr>
            <tr>
                <th>Skills</th>
                <td><?= htmlspecialchars($shpallja_data['skills']); ?></td>
            </tr>
            <tr>
                <th>Kualifikimet</th>
                <td><?= htmlspecialchars($shpallja_data['kualifikimet']); ?></td>
            </tr>
            <tr>
                <th>Data e Shpalljes</th>
                <td><?= htmlspecialchars($shpallja_data['data_e_shpalljes']); ?></td>
            </tr>
            <tr>
                <th>Pershkrimi</th>
                <td><?= htmlspecialchars($shpallja_data['pershkrimi']); ?></td>
            </tr>
            <?php } else { ?>
            <tr><td colspan="2">No data found for the selected job listing.</td></tr>
            <?php } ?>
        </table>
    </div>
</section>


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