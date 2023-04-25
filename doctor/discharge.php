<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient Appointment</title>
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
                <h5 class="text-center my-2">Total Appointment</h5>
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query="SELECT * FROM appointment WHERE id='$id'";
                    $res=mysqli_query($connect, $query);
                    $row=mysqli_fetch_array($res);
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">Appointment Details</td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><?php echo $row['firstname']; ?></td>
                            </tr>
                            <tr>
                                <td>surname</td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td><?php echo $row['appointment_date']; ?></td>
                            </tr>
                            <tr>
                                <td>Symptoms</td>
                                <td><?php echo $row['symptoms']; ?></td>
                            </tr>


                        </table>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h5 class="text-center my-2">Invoice</h5>
                        <?php
                        if (isset($_POST['send'])){
                            $fee = $_POST['fee'];
                            $des = $_POST['des'];

                            if(empty($fee)){

                            }else if(empty($des)){

                            }else{
                                $doc = $_SESSION['doctor'];
                                $fname=$row['firstname'];
                                $query="INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) VALUES ('$doc','$fname',NOW(),'$fee','$des')";
                                $res=mysqli_query($connect, $query);
                                if($res){
                                    
                                    echo "<script>alert('You have sent an invoice')</script>";
                                    mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                                                        
                                }
                                 
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="my-3">
                            <label for="">Fee</label>
                            <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">
                            </div>
                            
                            <div class="my-3">
                            <label for="">Description</label>
                            <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
                            <input type="submit" name="send" class="btn btn-info my-2" value="Send" >
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>
        
    </div>
</body>
</html>