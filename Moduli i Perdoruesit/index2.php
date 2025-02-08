<?php
    include('login_verification1.php');
    if ((isset($_SESSION['emri_kompanise']) != '')) {
        header('Location: index.php');
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

        .btn-field button {
            flex-basis: 48%;
            background: #ed563b;
            color: #fff;
            height: 40px;
            border-radius: 20px;
            border: 0;
            outline: 0;
            cursor: pointer;
            transition: bacground 1s;

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
        <button id="arrow" class="btn"><i class="fa fa-arrow-left"></i></button>

        <dif class="form-box">
            <h1 id="title">Company Sign-in</h1>
            <form action="" method="post">
                <div class="input-group" id="inputGroup">
                    
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" placeholder="Email" name="Emaili" >
                    </div>

                    
                    <div class="input-field" style="margin-bottom: 15px;">
                        <i class="fa-solid fa-user"></i>
                        <input type="password"  placeholder="Password" name="Passwordi">
                    </div>

                    <p>don't have account? <a href="RegisterP.php">register now</a></p>


                </div>
                <br><br>
                <div class="btn-field">
                    <input type="submit" value="Sign in" name="submit"   style="flex-basis: 45%; background: #ed563b; color: #fff; height: 40px; border-radius: 20px; border: 0; outline: 0; cursor: pointer; transition: background 1s; text-align: center; line-height: 8px;">

                </div>
            </form>
        </dif>
    </div>
    <script>
       
                inputGroup.style.height = "150px";
          
                document.getElementById('arrow').addEventListener('click', function() {
                    window.location.href = 'index.php';

                })

    </script>
</body>

</html>