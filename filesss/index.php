<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>


<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="sheet.css">

        <title>Investment On Mutual Fund</title>
 
    </head>
    <body>
        <div class="form">
            <form action="" method="POST" class="email">
                <p class="text">Login</p>

                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>

                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>

                <p class="login-register">Don't have an account? &nbsp;<a href="register.php"><em id="l31">Register Here</em></a><span style="color:black">...</span></p>
            </form>
        </div>
    </body>
    </html>
    </body>
</html>