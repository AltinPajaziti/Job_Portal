<?php
session_start();
if(!(isset($_SESSION['emri_kompanise'])!= '')){
    header('location: index2.php');
}
include('config.php');


if(isset($_POST['id_kompania']) && isset($_POST['apply_btn'])) {
  $id_kompania = $_POST['id_kompania'];
  $delete_query = "DELETE FROM aplikimet WHERE Id_Aplikimi = $id_kompania";
  if(mysqli_query($lidhe, $delete_query)) {
      echo "Application deleted successfully.";
      
  } else {
      echo "Error deleting application: " . mysqli_error($lidhe);
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
    .input{
        border: .1rem solid rgba(0,0,0,.2); 
        width: 50%;
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
    .input{
        border: .1rem solid rgba(0,0,0,.2); 
        width: 50%;
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

    
.button{
  width: 150px;
  padding: 10px;
  background-color: #ed563b;
  color: white;
  border-radius: 8px;
  border: 1px solid  #ed563b;
  transition: background-color 0.3s ease, color 0.3s ease; 
}
.button:hover{
  background-color: white;
  color: #ed563b;
  border: 1px solid #ed563b;;
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

        border :.1rem solid rgba(0,0,0,.2) !important;
        border-radius:20px
        
       
    }
    .table__header {
      margin-top:10px;
    /* border: .1rem solid rgba(0,0,0,.2); */
     /* Optional: centers the content horizontally */
}
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
</style>
    
    <!-- ***** Header Area Start ***** -->
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
    <main class="table" id="customers_table" >
      

      <section class="table__header">
          <h5>Aplikantet</h5>
          <div class="input-group">
              <input type="search" placeholder="Search Data..." >
          </div>
          <div class="export__file">
              <label  for="export-file" class="export__file-btn" title="Export File"  ><i class="fas fa-file-export"></i></label>
              
              <input type="checkbox"  id="export-file">
              <div class="export__file-options">
                  <label>Export As &nbsp; &#10140;</label>
                  <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                  <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                  <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                  <label for="export-file" id="toEXCEL" style="display:none">EXCEL <img src="images/excel.png" alt=""></label>
              </div>
          </div>
      </section>
      <hr>
      <!-- <section class="table__body">
          <table>
              <thead>
                  <tr>
                      <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Emri <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Mbiemri <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Profili <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Veiw Cv <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Dowload Cv <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td> 1 </td>
                      <td> <img src="images/Zinzu Chan Lee.jpg" alt="">Zinzu Chan Lee</td>
                      <td> Seoul </td>
                      <td> 17 Dec, 2022 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 2 </td>
                      <td><img src="images/Jeet Saru.png" alt=""> Jeet Saru </td>
                      <td> Kathmandu </td>
                      <td> 27 Aug, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 3</td>
                      <td><img src="images/Sonal Gharti.jpg" alt=""> Sonal Gharti </td>
                      <td> Tokyo </td>
                      <td> 14 Mar, 2023 </td>
                      
                    <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 4</td>
                      <td><img src="images/Alson GC.jpg" alt=""> Alson GC </td>
                      <td> New Delhi </td>
                      <td> 25 May, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 5</td>
                      <td><img src="images/Sarita Limbu.jpg" alt=""> Sarita Limbu </td>
                      <td> Paris </td>
                      <td> 23 Apr, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 6</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alex Gonley </td>
                      <td> London </td>
                      <td> 23 Apr, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 7</td>
                      <td><img src="images/Alson GC.jpg" alt=""> Jeet Saru </td>
                      <td> New York </td>
                      <td> 20 May, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 8</td>
                      <td><img src="images/Sarita Limbu.jpg" alt=""> Aayat Ali Khan </td>
                      <td> Islamabad </td>
                      <td> 30 Feb, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 9</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                      <td> Dhaka </td>
                      <td> 22 Dec, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 9</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                      <td> Dhaka </td>
                      <td> 22 Dec, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 9</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                      <td> Dhaka </td>
                      <td> 22 Dec, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 9</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                      <td> Dhaka </td>
                      <td> 22 Dec, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
                  <tr>
                      <td> 9</td>
                      <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                      <td> Dhaka </td>
                      <td> 22 Dec, 2023 </td>
                      <td>
                        <p class="status pending"> <i class="fa fa-upload" aria-hidden="true"></i>
                            View</p>
                    </td>
                    <td>
                        <p class="status delivered"> <i class="fa fa-download" aria-hidden="true"></i>
                            Download</p>
                    </td>
                    

                      <td>
                          <p class="status cancelled">Delete</p>
                      </td>
                  </tr>
              </tbody>
          </table>
      </section> -->


      <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Emri <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Mbiemri <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Profili <span class="icon-arrow">&UpArrow;</span></th>
                    <th> View Cv <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Download Cv <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_shpallja = $_POST['id_shpallja'];
    
                $sql = "SELECT aplikimet.id_kompania, perdoruesi.Id_Perdoruesi, aplikimet.Id_Aplikimi, perdoruesi.Emri, perdoruesi.Mbiemri, perdoruesi.Profili, perdoruesi.Cv
                        FROM aplikimet 
                        LEFT OUTER JOIN perdoruesi ON aplikimet.Id_Perdoruesi = perdoruesi.Id_Perdoruesi 
                        WHERE aplikimet.id_kompania = " . $_SESSION['id_kompania'] . " AND aplikimet.id_shpallja = '" . $id_shpallja . "'";
                $sql2 = "SELECT Cv FROM perdoruesi WHERE Id_Perdoruesi=?";
    
                $rezultati = mysqli_query($lidhe, $sql);
    
                while ($row = mysqli_fetch_array($rezultati)) {
                    $stmt = mysqli_prepare($lidhe, $sql2);
                    mysqli_stmt_bind_param($stmt, 'i', $row['Id_Perdoruesi']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $cvData);
                    mysqli_stmt_fetch($stmt);
                    mysqli_stmt_close($stmt);
                    ?>
                    <tr>
                        <td><?= $row['Id_Perdoruesi'] ?></td>
                        <td><?= $row['Emri'] ?></td>
                        <td><?= $row['Mbiemri'] ?></td>
                        <td><?= $row['Profili'] ?></td>
                        <td>
                            <?php
                            // Display the View CV link if CV data exists
                            if (!empty($cvData)) {
                              
                              echo '<p class="status pending"><i class="fa fa-upload" aria-hidden="true"></i> <a href="view_cv.php?Id_Perdoruesi=' . $row['Id_Perdoruesi'] . '" target="_blank">View</a></p>';

                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            // Display the Download CV link if CV data exists
                            if (!empty($cvData)) {
                              echo '<p class="status delivered"><a href="download-cv.php?Id_Perdoruesi=' . $row['Id_Perdoruesi'] . '" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a></p>';
                            }
                            ?>
                        </td>
                        <td>
                            <form method='POST' action='applications.php' onsubmit="return confirmDelete();">
                                <input type='hidden' name='id_kompania' value="<?= $row['Id_Aplikimi'] ?>">
                                <input type='hidden' name='kompania' value="<?= $row['Emri'] ?>">
                                <input type='hidden' name='id_shpallja' value="<?= $id_shpallja ?>">
                                   <p class="status cancelled"><button type='submit' name='apply_btn' style="background-color: inherit; border: 0px;">Delete  </button></p>
                                
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    
  </main>
    
    <br><br>
 
    <!-- ***** Call to Action End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
        </div>
        <!-- Left -->
    
        <!-- Right -->
        <div>
         
        </div>
        <!-- Right -->
      </section>
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
                <i class="fas fa-gem me-3"></i>Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Products
              </h6>
              <p>
                <a href="#!" class="text-reset">Angular</a>
              </p>
              <p>
                <a href="#!" class="text-reset">React</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vue</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Laravel</a>
              </p>
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="#!" class="text-reset">Pricing</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Settings</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Orders</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p>
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
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
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>

    <script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
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
    <script src="./assets/js/table2.js"></script>

  </body>
</html>