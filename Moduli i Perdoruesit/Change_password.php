<?php
    session_start();
    if (!(isset($_SESSION['emri']) != '')) {
        header('Location: index.php');
      }
    include('Crud.php');
    include('config.php');
    
    if (isset($_POST['buttoni'])) {
        if ($_POST['password1'] == $_POST['password']) {
            $newPassword = $_POST['password']; 
            $userId = $_SESSION['id']; 
    
            $sql = "UPDATE perdoruesi SET passwordi = '$newPassword' WHERE Id_Perdoruesi = $userId";
    
            $result = mysqli_query($lidhe, $sql);
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var alertElement = document.getElementById('alert');
                    if (alertElement) {
                        alertElement.classList.remove('hide');
                    }
                });
            </script>";
    
            if ($result) {
            } else {
                echo "Error updating password: " . mysqli_error($lidhe); // Display error message if update fails
            }
        } else {
            echo "Please enter the same new password twice";
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

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
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


        .form-box {
            width: 90%;
            max-width: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 50px 60px 70px;
            text-align: center;
        }


        .form-box h1 {
            font-size: 30px;
            margin-bottom: 60px;
            color: #ed563b;
            position: relative;
        }

        .form-box h1:after {
            content: '';
            width: 30px;
            height: 4px;
            border-radius: 3px;
            background: #ed563b;
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);

        }


        .input-field {
            background: #eaeaea;
            margin: 15px 0;
            border-radius: 3px;
            display: flex;
            align-items: center;
            max-height: 65px;
            transition: max-height 0.5s;
            overflow: hidden;


        }

        input {
            width: 100%;
            background: transparent;
            border: 0;
            outline: 0;
            padding: 18px 15px;
        }

        .input-field i {
            margin-left: 15px;
            color: #9999;
        }

        form p {
            text-align: left;
            font-size: 13px;

        }

        form p a {
            text-decoration: none;
            color: #3c00a0;
        }


        .btn-field {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .btn-field #signupBtn {
            flex-basis: 48%;
            background: #ed563b;
            color: #fff;
            height: 40px;
            border-radius: 20px;
            border: 0;
            outline: 0;
            cursor: pointer;
            transition: bacground 1s;
            line-height:5px;

        }

        .second {
            height: 200px !important;
        }

        .input-group {
            height: 280px;
            transition: height 0.3s ease 0.1s;
        }

        .btn-field button.disable {
            background: #eaeaea;
            color: #555;




        }

        .btn {
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

        .btn:active {
            scale: .95;
            transition: .3s ease;
        }

        #photoimg {
            border-radius: 5px;
            background-color: white;
            padding: 6px;
            border: 1px solid #ed563b;
            color: #ed563b;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #photoimg:hover {
            background-color: #ed563b;
            color: white;
        }
    </style>
    <div class="container">
        <button class="btn" id="arrow"><i class="fa fa-arrow-left"></i></button>

        <div class="form-box">
        <div id="alert"  class="alert alert-success hide" style="position:relative;right:396px;top:-80px; background-color: #8bc34a; border: 1px solid #8bc34a; padding: 15px 20px; color: white; animation:show_slide 1s ease forwards;">
        <div class="alert-container" style="position: relative; max-width: 960px; margin: 0 auto;">
            <div class="alert-icon" style="float: left; margin-right: 15px;">
                <i class="fa fa-check"></i>
            </div>
            <button type="button" onclick="closeAlert()" class="close-icon" data-dismiss="alert" aria-label="Close" style="float: right; color: #000; margin-top: 0; margin-left: 0; width: 21px; height: 21px; position: relative; background: none; border: none; outline: none; cursor: pointer; text-indent: -999px; overflow: hidden; white-space: nowrap;">
                <span>clear</span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(-45deg);"></span>
                <span style="content: ''; position: absolute; top: 8px; width: 15px; height: 2px; left: 0; background-color: #fff; transform: rotate(45deg);"></span>
            </button>
            Success alert: Fjalekalimi eshte ndryshuar me sukses
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
            
    </div>
            <h1 id="title">Change Password</h1>
            <form action="Change_password.php" method="post">
                <div class="input-group" id="inputGroup">
                    
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="password" placeholder="Password"  name="password">

                    </div>

                    <div class="input-field" style="margin-bottom: 15px;">
                        <i class="fa-solid fa-user"></i>
                        <input type="password" placeholder="Re enter Password"  name="password1">
                    </div>



                </div>
                <br>
                <div class="btn-field">
                    <input type="submit" id="signupBtn" name="buttoni" value="Change">

                </div>
            </form>
        </div>
    </div>
    <script>
        

        document.getElementById('arrow').addEventListener('click', function() {
                    window.location.href = 'index.php';

                })

        
                inputGroup.style.height = "150px";
         
        

      
            


    </script>
    <script>
      function closeAlert() {
        document.getElementById('alert').classList.add('hide');
    }

</script>
</body>

</html>