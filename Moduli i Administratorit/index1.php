
<?php
include('login.php');
if ((isset($_SESSION['emri']) != '')) {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
   body {
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      margin: 0;
      background-image: url("../assets/images/bgimage.jpg");
      background-position: center;
      background-size: cover;
      font-family: Arial, sans-serif;
    }

    .forma {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 70px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
      -webkit-box-shadow: 1px 3px 8px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 3px 8px 0px rgba(0,0,0,0.75);
box-shadow: 1px 3px 8px 0px rgba(0,0,0,0.25);
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .form-group label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-control:focus {
      outline: none;
      border-color: #007bff;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .forma h2 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
  </style>
  
  <title>Login</title>
</head>

<body>
 <div class="forma"  method="POST">
        <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Emri</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Emri ose Email-i">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Fjalëkalimi</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Fjalëkalimi">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Kyçu</button>
        </form>
    </div> 



      



  </div>

  <script src="../assets/js/kyqu.js"></script>

</body>

</html>