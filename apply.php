<?php
    include("include/header.php");

    include("include/connect.php");
    
    if(isset($_POST['apply'])){
        $firstname=$_POST['fname'];
        $surname=$_POST['sname'];
        $username=$_POST['uname'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];
        $country=$_POST['country'];
        $password=$_POST['pass'];
        $con_password=$_POST['con_pass'];

        if ($password != $con_password){
            echo"<script>alert('Password do not')</script>";
            
        }else{
                $u = "SELECT email FROM doctors WHERE email ='$email'";
                $uu=mysqli_query($connect, $u);

               if(mysqli_num_rows($uu)>0){
                    echo "<script>alert('Email already exist')</script>";
                

                }else{
                    $query="INSERT INTO doctors(firstname, surname, username, email, gender, phone, country, password, salary, date_reg, status, profile) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor.jpg')";
                    
                    $result=mysqli_query($connect,$query);

                    if($result){
                        echo "<script>alert('You have successfully Applied')</script>";
                        header("Location: doctorlogin.php");
                        
                       
                        
                    }else{
                        echo "<script>alert('Failed')</script>";
                       
                    }
                

                
        }
        }}
    

            
        
        
        

    ?>
    <title>Apply Now</title>
    <style>
        
        body{
            background-color: #E8EDF2;
        }
        
        

        input{
            border: none;
            outline: none;
            border-radius: 0;
            width: 100%;
            border-bottom: 2px solid #1c1c1e;
            margin-bottom: 25px;
            padding: 7px 0;
            font-size: 20px;
            letter-spacing: 1px;
        }
        
        </style>
</head>
<body>
    

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotrom">
                    <h5 class="text-center">Apply Now!!!</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname"  value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>"required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"required>
                        </div>
                        <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Your Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>"required>
                        </div>
                        <div class="form-group">
                            <label for="">Select Country</label>
                            <select name="country" id="" class="form-control" required>
                                <option value="">Select country</option>
                                <option value="russial">Russia</option>
                                <option value="india">India</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Ghana">Ghana</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Re-Enter your Password" required>
                        </div>
                        <input type="submit" name="apply" class="btn btn-success">
                        <p>I already have an acoount <a href="doctorlogin.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>