
<?php
//$showalert=false;
//$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'server.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    //$exist=false;
     //$status='deactivate';
    // $score=0;
    $existsql="Select * FROM `pro` WHERE username= '$username'";
    $result=mysqli_query($conn,$existsql);
    $numexist=mysqli_num_rows($result);
    
    if($numexist==1)
    {
        echo "This username already exists";
    }
    else
    {
        if(($password==$cpassword) )
        {
            $sql="INSERT INTO `pro` (`username`, `password`) VALUES ('$username', '$password')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "Registration successful";
                //$showalert= true;
            }
        }
        else
        {
            echo "Both passwords do not match";
        }
    }   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>

<div class="header">
        <h2>User Registration</h2>
    </div>

        <form action="register.php" method="post">
            
            <div class="form-group">
                <label for="username">Your username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="cpassword">
                
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Log in</a>
            </p>
        </form>
</body>
</html>
