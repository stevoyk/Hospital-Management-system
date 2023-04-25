<?php
session_start();

error_reporting(E_ALL^E_NOTICE);
if (isset($_POST['login'])){
       session_start();
        $con=mysqli_connect('localhost','root', '');
        mysqli_select_db($con, 'hnm');

        $username = $_POST['name'];
        $password = $_POST['pass'];
            
                $s = "select * from admin where username = '$username' && password  = '$password'";
                $result=mysqli_query($con, $s);
                $num = mysqli_fetch_array($result);
                 
                    if($num['username']==$username && $num['password']==$password){
                        $_SESSION['admin']="$username";
                        header("Location:admin/index.php");
                        exit();
                       
                    }

                    else{
                    
                        echo "<script>alert('wrong credentials')</script>";
            
                        
                    }}

                 
                

?> 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>

<body clas style="background-image: url(images/back2.jpg); background-repeat:no-repeat; background-size:cover;">

    <?php
    include("include/header.php");
    ?>
    <div style="margin-top: 30px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light p-5">
                    <img src="images/admini.png" class="col-md-12">
                    <form method="post" class="my-1">
                        
                        <div class="mb-3">
                            <label class="form-label">username</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-info" value="login">


                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>