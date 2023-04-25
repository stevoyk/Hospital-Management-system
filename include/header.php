<?php
error_reporting(E_ALL^E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">-->
  <link rel="stylesheet" href="./bootstrap.min.css.map">

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.php">
        <h2>Hospital Management System</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" style="font-weight:bolder;">
          <?php
          if (isset($_SESSION['admin'])) {
            $username=$_SESSION['admin'];
            echo '
      
      <li class="nav-item">
        <a class="nav-link text-white" href="#"> '.$username.'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
      
        ';
          }elseif(isset($_SESSION['doctor'])){
            $username=$_SESSION['doctor'];

            echo '
      
      <li class="nav-item">
        <a class="nav-link text-white" href="#"> '.$username.'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
      
        ';

          }else if(isset($_SESSION['patient'])){
            $username=$_SESSION['patient'];

            echo '
      
      <li class="nav-item">
        <a class="nav-link text-white" href="#"> '.$username.'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
      
        ';


          }else {
            echo '
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="adminlogin.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="doctorlogin.php">Doctor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="patientlogin.php">Patient</a>
      </li>  
        ';
          }

          ?>
        </ul>
      </div>
    </div>
  </nav>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>