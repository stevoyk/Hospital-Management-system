<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connect.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    $patient=$_SESSION['patient'];
                    $query="SELECT * FROM patient2 WHERE username='$patient'";
                    $res=mysqli_query($connect, $query);
                    $row=mysqli_fetch_array($res);
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                            <?php
                            if (isset($_POST['upload'])){
                                $img = $_FILES['img']['name'];

                                if(empty($img)){

                                }else{
                                    $query="UPDATE patient2 SET profile='$img' WHERE username='$patient'";
                                    $result=mysqli_query($connect,$query);
                                if($result){
                                    move_uploaded_file($_FILES['img']['tmp_name'],("img/$img"));
                                    }
                                }
                            }
                            ?>
                                <h5>My Profile</h5>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                    echo"<img src='img/".$row['profile']."' class='col-md-12' style='height: 250px;'>
                                    ";
                                    ?>
                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" name="upload" class="btn btn-info" value="Update Profile">
                                </form>
                                    <br>
                                <table class="table table-bordered">
                                    <tr>
                                    <th colspan="2" class="text-center">My Details</th>
                                    </tr>
                                    <tr>
                                    <td>Firstname</td>
                                    <td><?php echo $row['firstname'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Surname</td>
                                    <td><?php echo $row['surname'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Username</td>
                                    <td><?php echo $row['username'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['email'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo $row['phone'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['gender'];?></td>
                                    </tr>
                                    <tr>
                                    <td>Country</td>
                                    <td><?php echo $row['country'];?></td>
                                    </tr>
                                    
                                </table>
                               
                            </div>
                            <div class="col-md-6">
                                <h5>Change Username</h5>
                                <?php
                                if(isset($_POST['update'])){
                                $uname=$_POST['uname'];
                                if(empty($uname)){

                                }else{
                                    $query="UPDATE patient2 SET username='$uname' WHERE username='$patient'";
                                    $res=mysqli_query($connect,$query);

                                    if($res){
                                        $_SESSION['patient']=$uname;
                                    }
                                }
                                }
                                ?>
                                <form action="" method="post">
                                    <label>Change Username</label><br>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                                    <input type="submit" name="update" class="btn btn-info my-2">
                                </form>

                                <h5 class="my-4 text-center">Change Password</h5>
                                <?php
                                if(isset($_POST['change'])){
                                    $old=$_POST['old_pass'];
                                    $new=$_POST['new_pass'];
                                    $con=$_POST['con_pass'];
                                    
                                    $q="SELECT * FROM patient2 WHERE username='$patient'";
                                    $res=mysqli_query($connect, $q);
                                    $row = mysqli_fetch_array($res);

                                    if(empty($old)){
                                        echo"<script>alert('Enter old Password')</script>";
                                        
                                    }else if(empty($new)){
                                        echo"<script>alert('Enter new Password')</script>";

                                    }else if($con !=$new){
                                        echo"<script>alert('Both password donot match')</script>";

                                    }else if($old !=$row['password']){
                                        echo"<script>alert('Check the password')</script>";
                                    }else{
                                        $query="UPDATE patient2 SET password='$new' WHERE username='$patient'";
                                        mysqli_query($connect,$query);
                                        echo"<script>alert('Your Password has Successfully been changed')</script>";

                                  }
                                                             
                                    
                                }
                            


                            ?>
                                <br>
                                <form action="" method="post">
                                    
                                    <?php
                                    echo $show;
                                    ?>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_pass" class="form-control"  autocomplete="off">
                                    </div>
                                     <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control"><br>
                                  </div>
                                  <input type="submit" name="change" value="Update password" class="btn btn-info">
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