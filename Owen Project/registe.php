<?php

include 'Config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['user'])) {
    header("Location:index.php");
}

if(isset($_POST['submit'])){
    $user=$_POST['user'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $cpass=md5($_POST['cpass']);

    if($pass=$cpass){
        $sql="SELECT * FROM userdata WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO userdata (user ,email,pass)
            VALUES('$user','$email','$pass')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "<scriept>alert('wow! User Regstration complete.')</script>";
                $user="";
                $email="";
                $_POST['pass']="";
                $_POST['cpass']="";
            }else{
                echo "<script>alert('Woops! Something went to wrong.')</script>";
            }
        }else{
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
        }else{
            echo "<script>alert('password Not Matched.')</script>";
        }
    }
    ?>
        
        

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
        <link rel="stylesheet"  type="text/css"  href="style.css">
        <title>Investment On Mutual Fund</title>
    </head>
    <body>
        
        <div class="form" >
            <form action="" method="POST" class=" email">
                <p class="text">Register</p>
                <div class="input-group">
                    <input placeholder="User name" name="user" value="<?php echo $user; ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="password" name="pass" value="<?php echo $pass; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Conform password" name="cpass" value="<?php echo $cpass; ?>"  required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Register</button>
                </div>
                <p class="login-register">Have an account? &nbsp;<a href="login.html" ><em ><span id="l31">Login</span></em></a><span style="color: black;">...</span></p>
            </form>
        </div>
    </body>
</html>
