
<?php
session_start();
include("include/header.php");
include("include/connect.php");
if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

     $error = array();

    $q="SELECT * FROM doctors WHERE username='$uname' AND password='$pass'";
    $qq=mysqli_query($connect, $q);
    $row=mysqli_fetch_array($qq);

    if(empty($uname)){
        $error['login'] = "Enter username";
    }
    else if(empty($pass)){
        $error['login'] = "Enter password";

    }else if($row['status']=="Rejected"){
        $error['login'] = "You're not a doctor in this organisation";
    }
    else if($row['status']=="Pending"){
        $error['login'] = "Wait for admin approval";
    }
    
    if (count($error)==0){
        $query="SELECT * FROM doctors WHERE username='$uname' AND password='$pass'";
        $res=mysqli_query($connect, $query);
        if(mysqli_num_rows($res)){
           
            $_SESSION['doctor']=$uname;
            header("Location: doctor/index.php");
        }else{
            echo"<script>alert('failed')</script>";
        }
    }


    
}
if (isset($error['login'])){
    $l=$error['login'];
    $show="<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
    $show="";
}
?>

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
          <div class="col-md-4"></div>
          <div class="col-md-5 my-3" >
          <h5 class="text-center my-2">Doctor Login</h5>
          <div>
            <?php
            echo $show;
            ?>
          </div>
          <form method="POST">
          <div class="my-3">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                </div>
          </div>
            <div class="my-3">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                </div>
            </div>
               
            <div class="my-3">
                <input type="submit" name="login" class="btn btn-info" value="login">
                <p>I don't have an account <a href="apply.php">Apply Here</a></p>
            </div>
                
            </form>
          </div>
          <div class="col-md-3"></div>
            
        </div>
        </div>
        <div class="col-md-6">
          <div class="image">
            <img src="" alt="">

        </div>

        </div>
      </div>
       
        
    </div>
    
</body>
</html>