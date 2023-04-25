<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connect.php");
    $ad = $_SESSION['admin'];
    $query="SELECT FROM admin WHERE uername='$ad'";     
    $res=mysqli_query($connect,$query);
    while(mysqli_fetch_array($res)){
        $username = $row['username'];
        $profile = $row['profile'];
    }
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">  
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username; ?> Profile</h4>

                                <?php
                                if (isset($_POST['update'])){
                                    $profile = $_FILES['profile']['name'];

                                    if(empty($profile)){

                                    }else{
                                        $query="UPDATE admin SET profile='$profile' WHERE username='$ad'";
                                        $result=mysqli_query($connect,$query);
                                    if($result){
                                        move_uploaded_file($_FILES['profile']['tmp_name'],("img/$profile"));
                                        }
                                    }
                                }
                                ?>

                               <form method="post" enctype="multipart/form-data">
                                <?php
                                echo "
                                <img src='img/$profile' class='col-md-12' style='height: 300px;'>
                                ";
                                ?>

                                <br><br>
                                <div class="form-group">
                                    <label for="">UPDATE PROFILE</label>
                                    <input type="file" name="profile" class="form-control">
                                </div><br>
                                <input type="submit" name="update" value="UPDATE" class="btn btn-success">

                               </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['change'])){
                                $uname=$_POST['uname'];
                                if(empty($uname)){

                                }else{
                                    $query="UPDATE admin SET username='$uname' WHERE username='$ad'";
                                    $res=mysqli_query($connect,$query);

                                    if($res){
                                        $_SESSION['admin']=$uname;
                                    }
                                }
                                }
                                ?>
                                <form action="" method="post">
                                    <label for="">Change Username</label><br>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                                    <input type="submit" name="change" class="btn btn-success">
                                </form>

                                <?php
                                if(isset($_POST['update_pass'])){
                                    $old_pass=$_POST['old_pass'];
                                    $new_pass=$_POST['new_pass'];
                                    $con_new=$_POST['con_pass'];

                                    $error=array();

                                    $old=mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");
                                    $row = mysqli_fetch_array($old);
                                    $pass=$row['password'];

                                    if(empty($old_pass)){
                                        $error['p']="Enter old password";
                                    }else if(empty($new_pass)){
                                        $error['p']="Enter New Password";
                                    }else if(empty($con_pass)){
                                        $error['p']="ConfirmPassword can't be empty";
                                }else if($old_pass != $pass){
                                    $error['p']="Invide Old Password";
                                }else if($new_pass != $con_pass){
                                    $error['p']="Both Password does not match";

                                    if (count($error)==0){
                                        $query="UPDATE admin SET password='new_pass' WHERE username='$ad'";
                                        mysqli_query($connect, $query);
                                    }
                                    
                                }
                            }


                            if(isset($error['p'])){
                                $e = $error['p'];
                                $show="<h5 class='text-center alert alert-danger'>";
                            }else{
                                $show="";
                            }
                                
                                ?>

                                <br><br>
                                <form action="" method="post">
                                    <h5 class="text-center my-4">Change Password</h5>
                                    <?php
                                    echo $show;
                                    ?>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                        <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control"><br>
                                  </div>
                                  <input type="submit" name="update_pass" value="Update password" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>