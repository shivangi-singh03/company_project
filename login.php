<?php 

$login=false;
$showerror=false;
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
include 'server.php';
$username=$_POST["username"];
$password=$_POST["password"];

    $sql = "Select * from pro where username='$username' AND password='$password' ";
    $result=mysqli_query($conn, $sql);
    $num= mysqli_num_rows($result);
     if($num==1)
      {
          $login=true;
          echo "You are logged in";
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
        header("location:game1.php");
      }
      else{
          echo "Invalid Credentials";
          //$showError="Invalid Credentials";
      }
}
 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>

<div class="header">
        <h2>Login</h2>
    </div>

        <form action="login.php" method="post">
            
            <div class="form-group">
                <label for="username">Your username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-success">Login</button>
            </div>
            <p>
                New user? <a href="register.php">Sign up</a>
            </p>
        </form>
</body>
</html>
