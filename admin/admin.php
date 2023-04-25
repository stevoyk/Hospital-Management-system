<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php
    include("../include/header.php");

    ?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include("sidenav.php");
                include("../include/connect.php");
                ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">All Admin</h5>
                            <?php
                            $ad=$_SESSION['admin'];
                            $query="SELECT * FROM admin WHERE username !='$ad'";
                            $res=mysqli_query($connect,$query);
                            $output="
                            <table class='table table-bordered'>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th style='width: 10%;'>Action</th>
                            </tr>
                            ";

                            if(mysqli_num_rows($res)<1){
                            $output .="<tr><td colspan='3' class ='text-center'>No New Admin</class></td></tr>";

                            }
                            while($row=mysqli_fetch_array($res)){

                                $id=$row['id'];
                                $username=$row['username'];

                                $output .="
                                <tr>
                                <td>$id</td>
                                <td>$username</td>
                                <td>
                                    <a href='admin.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
                                </td>
                                
                                ";
                            }
                                $output .="
                                </tr>
                                </table>
                                
                                ";
                                echo $output;

                                /*if (isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $sql="DELETE FROM data WHERE id=$id" or die($mysqli->error());
                                    $res=mysqli_query($connect, $sql);
                                   
                                    
                                }*/

                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];

                                    $query="DELETE FROM admin WHERE id='$id'";
                                    mysqli_query($connect,$query);
                                }

                            ?>
                            
                              
                               
                        </div>
                        <div class="col-md-6">
                            <?php
                            if(isset($_POST['add'])){
                                $uname=$_POST['uname'];
                                $pass=$_POST['pass'];
                                $image=$_FILES['img']['name'];


                                $error = array();
                                if(empty('$uname')){
                                    $error['u'] = "Enter Admin Username";

                                }elseif(empty('$pass')){
                                        $error['u'] = "Enter Password for The Admin";
                                    }
                                
                                elseif(empty('$image')){
                                        $error['u'] = "Add Admin picture";
                                    }
                                
                                if (count($error)==0) {
                                                                    
                                    $q="INSERT INTO admin(username,password,profile)
                                                    VALUE('$uname', '$pass', '$image')";
                                                $result=mysqli_query($connect,$q);
                                                if($result){
                                                    move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                                }else{
    
                                                }
                                    }
                                  
                                }
                            ?>
                        <h5 class="text-center">Add Admin</h5>
                        <form method="post" enctype="multipart/form-data">
                            <div class="from-group">
                                <label for="">Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="from-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <div class="from-group">
                            <label for="">New Admin Picture</label>
                             <input type="file" name="img" class="form-control" required>
                            </div><br>
                            <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
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