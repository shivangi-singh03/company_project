<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_POST['register'])) {

    $name = clean($_POST['name']); 
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password']); 

try{
     mysqli_begin_transaction($con);

    $query = "SELECT username FROM `user` WHERE username= '$username'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0) {

       $query = "SELECT email FROM `user` WHERE email = '$email'";
       $result = mysqli_query($con,$query);

       if(mysqli_num_rows($result) == 0) {

        $query = "INSERT INTO `user` (`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$password')";
        
        if(mysqli_query($con, $query)) {
          $que= "INSERT INTO `score` (`username`, `total`, `win`, `loss`, `draw`) VALUES ('$username', '0', '0', '0', '0')";
          mysqli_query($con,$que);
          mysqli_commit($con);
          $_SESSION['prompt'] = "Account registered. You can now log in.";
          header("location:index.php");
          exit;

        } else {

          die("Error with the query");

        }

       } else {

         $_SESSION['errprompt'] = "Email already exists.";

      }

    } else {

      $_SESSION['errprompt'] = "Username already exists.";

    }
    
    }
    catch(Exception $e)
    {
        mysqli_rollback($con);
        throw $e;
    }

  } 

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

</head>
<body>

  <?php include 'header.php'; ?>

  <section class="center-text">
    
    <strong>Register</strong>

    <div class="registration-form box-center clearfix">

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row">
          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Personal Info</legend>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" required>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="username (must be unique)" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="email (must be unique)" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>


            </fieldset>
            

          </div>
        </div>

        
        
        <a href="index.php">Login</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">



      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>