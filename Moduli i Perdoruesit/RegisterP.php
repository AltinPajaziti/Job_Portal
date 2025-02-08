<?php
include('config.php');

if (isset($_POST['submit'])) {
    $emri = mysqli_real_escape_string($lidhe, $_POST['Emri']);
    $emaili = mysqli_real_escape_string($lidhe, $_POST['Emaili']);
    $numri_kompanise = mysqli_real_escape_string($lidhe, $_POST['Numri_kompanise']);
    $id_kategoria = mysqli_real_escape_string($lidhe, $_POST['id_Kategoria']);
    $lokacioni = mysqli_real_escape_string($lidhe, $_POST['id_lokacioni']);
    $rreth_kompanise = mysqli_real_escape_string($lidhe, $_POST['Rreth_kompanise']);
    $passwordi = mysqli_real_escape_string($lidhe, $_POST['Passwordi']);
    $foto = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));

    $sql = "INSERT INTO kompania (Emri, Emaili, Numri_kompanise, id_Kategoria, id_lokacioni, Passwordi, Profili, Foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($lidhe, $sql);
    if ($stmt === false) {
        die('Error: ' . mysqli_error($lidhe));
    }

    mysqli_stmt_bind_param($stmt, 'sssissss', $emri, $emaili, $numri_kompanise, $id_kategoria, $lokacioni, $passwordi, $rreth_kompanise, $foto);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var alertElement = document.getElementById('alert');
            if (alertElement) {
                alertElement.classList.remove('hide');
            }
        });
        </script>";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');

@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins' , sans-serif;
    box-sizing: border-box;

}

.container {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(252, 252, 252, 0.8), rgba(255, 255, 255, 0.8)), url(./assets/images/job-image-1-1200x600.jpg);
    background-position: center;
    background-size: cover;
    position: relative;
}


.form-box{
    width: 90%;
    max-width: 450px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);
    background: #fff;
    padding: 50px 60px 70px;
    text-align: center;

}


.form-box h1{
    font-size: 30px;
    color: #ed563b;
    position: relative;
}

.form-box h1:after{
    content: '';
    width: 30px;
    height: 4px;
    border-radius: 3px;
    background: #ed563b;
    position: absolute;
   
    left: 50%;
    transform: translateX(-50%);

}


.input-field{
    background: #eaeaea;
    margin: 12px 0;
    border-radius: 3px;
    display: flex;
    align-items: center;
    max-height: 40px;
    transition: max-height 0.5s;
    overflow: hidden;


}

.center {
    display: flex !important ;
    align-items: center !important;
    justify-content: center !important;
}

input{
    width: 100%;
    background:transparent;
    border: 0;
    outline: 0;
    padding: 18px 15px;
}

.input-field i{
    margin-left: 15px;
    color: #9999;
}

form p{
    text-align: left;
    font-size: 13px;

}

form p a{
    text-decoration: none;
    color: #3c00a0;
}


.btn-field{
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.btn-field button{
    flex-basis: 48%;
    background: #ed563b;
    color: #fff;
    height: 30px;
    border-radius: 20px;
    border: 0;
    outline: 0;
    cursor: pointer;
    transition: bacground 1s;

}

.second{
    height: 200px !important;
}

.input-group{
    height: 450px;
    transition: height 0.3s ease;
}

.btn-field button.disable{
    background: #eaeaea;
    color: #555;




}
.btn{
  position: absolute;
  left: 10px;
  top: 10px;
  padding: 10px 20px;
  background-color: #ed563b;
  color: white;
  border-radius: 50%;
  border: 0;
  font-size: 25px;
  transition: .3s ease;
  cursor: pointer;
  z-index: 999999;
}

.btn:active{
  scale: .95;
  transition: .3s ease;
}
.butonat{
    display: block;
}
#photoimg {
    border-radius: 5px;
    padding: 4px;
    cursor: pointer;
}



.input-field {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .input-field select {
            border: none;
            padding: 10px;
            width: 100%;
            -webkit-appearance: none; 
            -moz-appearance: none; 
            appearance: none; 
        }

        .input-field option {
            width: 100%;
        }

        .fa {
            margin-right: 10px;
        }

        .input-field.center {
    display: flex;
    align-items: center;
    justify-content: center;
}

.input-field.center input,
.input-field.center textarea {
    text-align: center;
}
    </style>
    <div class="container">
        <button id="arrow" class="btn"><i class="fa fa-arrow-left"></i></button>

        <div class="form-box">
        <div id="alert"  class="alert alert-success hide" style="position:relative;right:386px;top:10px; background-color: #8bc34a; border: 1px solid #8bc34a; padding: 15px 20px; color: white; animation:show_slide 1s ease forwards;">
        <div class="alert-container" style="position: relative; max-width: 960px; margin: 0 auto;">
            <div class="alert-icon" style="float: left; margin-right: 15px;">
                <i class="fa fa-check"></i>
            </div>
            <button type="button" onclick="closeAlert()" class="close-icon" data-dismiss="alert" aria-label="Close" style="float: right; color: #000; margin-top: 0; margin-left: 0; width: 21px; height: 21px; position: relative; background: none; border: none; outline: none; cursor: pointer; text-indent: -999px; overflow: hidden; white-space: nowrap;">
                <span>clear</span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(-45deg);"></span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(45deg);"></span>
            </button>
            Success alert: Regjistrimi i juaj u realizua me sukses
        </div>
    </div>
    
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
            <h3 style="color: #ed563b;" >sign up</h3>
            <br>

            <form enctype="multipart/form-data" action="RegisterP.php" method="POST" name="form1">
                <div class="input-group" id="inputGroup">
                    <div class="input-field" id="namefield">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="Emri" placeholder="Name">
                    </div>
                    <div class="input-field"  id="surname">
                        <i class="fa-solid fa-user"></i>
                        <input  type="email" name="Emaili"  placeholder="Email" >
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="number" name="Numri_kompanise" placeholder="Numri i kompanise">
                    </div>
                    <div class="input-field" id="locationfield">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>

                        <select id="dropdown"name="id_lokacioni" class="input-field">
                            <option class="input-field"  value=""></option>

                <?php  
                    $sql = "SELECT * FROM Lokacioni";
                    $result = mysqli_query($lidhe, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='".$row['id_lokacioni']."'>".$row['lokacioni']."</option>";
                    }
                ?>
                            
                        </select>
                    </div>
                    <div class="input-field" id="categoryfield">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <select id="dropdown" name="id_Kategoria" class="input-field">
                            <option class="input-field" value=""></option>
                        <?php  
                        $sql = "SELECT * FROM kategorite";
                        $result = mysqli_query($lidhe, $sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<option value='".$row['id_Kategoria']."'>".$row['Emri_kategorise']."</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <input name="userfile" type="file" style="float: left; display: block; " id="photoimg">
                        <div style="clear: both;"></div>
                    <div class="input-field" >
                        <i class="fa-solid fa-user"></i>
                        <input type="password" name="Passwordi" placeholder="Password">
                    </div>
                                  <div class="input-field" id="pershkrimi">
                        
                        <textarea placeholder="Pershkrimi" class="input-field" style="height: 200px; width: 100%;" id="input-field" name="Rreth_kompanise" cols="30" rows="10"></textarea>
                    </div>
                    
                    
                <div class="btn-field">
                <input type="submit" value="Sign up" name="submit" id="signinBtn" style="flex-basis: 45%; background: #ed563b; color: #fff; height: 40px; border-radius: 20px; border: 0; outline: 0; cursor: pointer; transition: background 1s; text-align: center; line-height: 8px;">

                </div>
            </form>
         
    <script>
       
  
        document.getElementById('arrow').addEventListener('click', function() {
            window.location.href = 'index.php';

        })

</script>
<script>
      function closeAlert() {
        document.getElementById('alert').classList.add('hide');
    }

</script>
</body>
</html>