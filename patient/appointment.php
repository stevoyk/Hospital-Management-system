<?php
    session_start();
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Book Appointment</h5>
                    <?php
                    $pat=$_SESSION['patient'];
                    $sel=mysqli_query($connect,"SELECT * FROM patient2 WHERE username='$pat'");
                    $row = mysqli_fetch_array($sel);
                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];

                    if (isset($_POST['book'])){
                        $date = $_POST['date'];
                        $sym = $_POST['sym'];

                        if(empty($sym)){

                        }else{
                            $query = "INSERT INTO appointment(firstname,username,gender,phone,appointment_date, symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pendding',NOW())";
                            $res=mysqli_query($connect,$query);

                            if($res){
                                echo "<script>alert('You have booked an appointment')</script>";
                            }
                        }

                    }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5 jumbotron bg-light">
                                <form action="" method="post">
                                    
                                    <div class="my-3">
                                        <label for="">Appointment Date</label>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                    <div class="my-3">
                                        <label for="">Symptoms</label>
                                        <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
                                    </div>
                                   
                                    <div class="my-3">
                                        <input type="submit" name="book" class="btn btn-info my-2" value="Book appointment">
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>