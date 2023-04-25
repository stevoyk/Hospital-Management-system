
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connect.php")
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
                    <h5 class="my-3">Patient Dashboard</h5>
                    <div class="col-md-12">
                        
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info mx-2" style="height: 150px"> 
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="text-white my-4">My profile</div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>                          
                                </div>
                                <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                                <div class="row">
                                        <div class="col-md-8">
                                            <div class="text-white my-4">Book Appointment</div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="text-white my-4">My Invoice</div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                               
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                            <?php
                                if(isset($_POST['send'])){
                                    $title=$_POST['title'];
                                    $message=$_POST['message'];

                                   

                                    if(empty($title)){

                                    }else if(empty($message)){

                                    }else{
                                        $user=$_SESSION['patient'];
                                        $query="INSERT INTO report(title,message,username,date_sent) VALUES('$title','$message','$user',NOW())";
                                        $res=mysqli_query($connect,$query);
                                        if($res){
                                            echo"<script>alert('You have sent your report')</script>";
                                        }
                                    }
                                }

                            ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-5 bg-info my-5">
                                    <h5 class="text-center my-2">Send A Report</h5>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="">Title</label>
                                            <input type="text" name="title" id="" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Message</label>
                                            <input type="text" name="message" id="" autocomplete="off" class="form-control" placeholder="Enter Message">
                                        </div>
                                        
                                        <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                                        
                                    </form>
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>