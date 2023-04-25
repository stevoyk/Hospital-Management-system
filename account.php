<?php
include("include/connect.php");
if(isset($_POST['create'])){
    
        $fname=$_POST['fname'];
        $sname=$_POST['sname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $gender=$_POST['gender'];
        $country=$_POST['country'];
        $password=$_POST['pass'];
        $con_password=$_POST['con_pass'];

        $error=array();
        if(empty($fname)){
            $error['ac']="Enter Firstname";
        }else if(empty($sname)){
            $error['ac']="Enter Surname";
        }else if(empty($uname)){
            $error['ac']="Enter Username";
        }else if(empty($email)){
            $error['ac']="Enter Email";
        }else if(empty($phone)){
            $error['ac']="Enter Phone";
        }else if(empty($gender)){
            $error['ac']="Select your Gender";
        }else if(empty($country)){
            $error['ac']="Select your Country";
        }else if(empty($password)){
            $error['ac']="Enter Password";
        }   elseif ($password != $con_password){
           $error['ac']="Both password do not match";
     }

     if(count($error)==0){

        $query="INSERT INTO patient2(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";
        $res=mysqli_query($connect,$query);
        if($res){
            header("Location: patientlogin.php");
        }else{
            echo"<script>alert('Failed')</script>";
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
    <title>Create Account</title>
</head>
<body>

<?php
include("include/header.php");
?>
    <div class="container-fluid">
    <div class="col-md-12"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-2 bg-light">
                <h5 class="text-center text-info">Create Account</h5>
               
                <form action="" method="post">
                <div class="mb-3"> 
                    <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname"  value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                        </div>
                    </div>
                       
                    <div class="mb-3"> 
                    <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];?>">
                        </div>
                    </div>
                        
                    <div class="mb-3">
                    <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>">
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>
                    </div>
                        
                    <div class="mb-3">
                    <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Your Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                        </div>
                    </div>
                       
                    <div class="mb-3">
                    <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                        
                    <div class="mb-3">
                    <div class="form-group">
                            <label for="">Select Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="">Select country</option>
                                <option value="russial">Russia</option>
                                <option value="india">India</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Ghana">Ghana</option>
                            </select>
                        </div>
                    </div>
                       
                    <div class="mb-3"> 
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                    </div>
                       
                    <div class="mb-3"> 
                    <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Re-Enter your Password">
                        </div>
                    </div>
                       
                    <div class="mb-3"> 
                    <input type="submit" name="create" class="btn btn-success">
                        <p>I already have an acoount <a href="patientlogin.php">Click Here</a></p>
                    </div>
                        
                    
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>