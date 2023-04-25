<?php

session_start();

include("include/connect.php");
if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    if(empty($uname)){
        echo"<script>alert('Enter username')</script>";
    }else if(empty($pass)){
        echo"<script>alert('Enter Password')</script>";

    }else{
        $q="SELECT * FROM patient2 WHERE username='$uname' AND password='$pass'";
    $qq=mysqli_query($connect, $q);
    if(mysqli_num_rows($qq)==1){

        header("Location: patient/index.php");
        $_SESSION['patient']=$uname;
    }else{
        echo"<script>alert('Invalid Account')</script>";

    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>
<body>

<?php
include("include/header.php");

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-light p-5 my-5 jumbotron">
                <h5 class="text-center my-3">Patient Login</h5>
                <form action="" method="post" class="my-1">

                <div class="mb-3">
                <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                    </div>
                </div>

                <div class="mb-3">
                <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
                    </div>
                </div>
                    
                    <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                    <p>I don't have an account <a href="account.php">Click here.</a></p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
    
</body>
</html>