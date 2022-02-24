<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Game</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>

<div class="header">
        <h2>Rock Paper Scissors</h2>
    </div>

        <form action="game2.php" method="post">
            
            <div class="form-group">
            <input type="radio" name="user_choice" value="Rock" title="Rock" />Rock ✊🏻 <br /><br />
            <input type="radio" name="user_choice" value="Paper" title="Paper" />Paper ✋🏻<br /><br />
            <input type="radio" name="user_choice" value="Scissors" title="Scissors" />Scissors ✌🏻 <br /><br /> 
            </div>

            <div class="form-group">
                <button type="submit" name="form_submit" class="btn btn-success" value="submit">Submit</button>
            </div>

            <div class="form-group">

    <?php

        session_start(); 
        include 'connect.php';
        if(!isset($_SESSION['username'])) 
        {
            header('location:index.php');
        } 
        else
    {
                $total=0;
                $win=0;
                $loss=0;
                $draw=0; 
                $username=$_SESSION['username'];
                $user_choice = $_POST['user_choice'];
                $cf= array('Rock', 'Paper', 'Scissors');
                $Choice= rand(0,2);
                $Computer=$cf[$Choice];
                if(($user_choice==$cf[0] AND $Computer==$cf[1]) OR ($user_choice==$cf[1] AND $Computer==$cf[2]) OR ($user_choice==$cf[2] AND $Computer==$cf[0]))
                {
                echo 'Player:    '.$user_choice.' CPU:    '.$Computer.' Result: Loss';
                //$total=1;
                $loss=1;

                include 'connect.php';
			    $username=$_SESSION['username'];
			    $sql1="SELECT `username` FROM `user` WHERE `username`='$username'";
                $result1=mysqli_query($con,$sql1);
                echo  mysqli_connect_error();
                $row=mysqli_fetch_assoc($result1);
                $un_other_table=$row['username'];
                $sql="UPDATE `score` SET `loss` = [loss+1] WHERE `username` = '$un_other_table'";
                $result=mysqli_query($con,$sql);
                echo  mysqli_connect_error();
                }

                elseif(($user_choice==$cf[0] AND $Computer==$cf[2]) OR ($user_choice==$cf[1] AND $Computer==$cf[0]) OR ($user_choice==$cf[2] AND $Computer==$cf[1]))
                {
                echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Win';
                //$total=1;
                $win=1;
                
                include 'connect.php';
                $username=$_SESSION['username'];
			    $sql1="SELECT `username` FROM `user` WHERE `username`='$username'";
                $result1=mysqli_query($con,$sql1);
                echo  mysqli_connect_error();
                $row=mysqli_fetch_assoc($result1);
                $un_other_table=$row['username'];
                $sql="UPDATE `score` SET `win` = [win+1] WHERE `username` = '$un_other_table'";
                $result=mysqli_query($con,$sql);
                echo  mysqli_connect_error();
                }

                else
                {
                //if($user_choice == $Computer) 
                echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Draw';
                    //$total=1;
                $draw=1;
                
                include 'connect.php';
                $username=$_SESSION['username'];
			    $sql1="SELECT `username` FROM `user` WHERE `username`='$username'";
                $result1=mysqli_query($con,$sql1);
                echo  mysqli_connect_error();
                $row=mysqli_fetch_assoc($result1);
                $un_other_table=$row['username'];
                $sql="UPDATE `score` SET `draw` = [draw+1] WHERE `username` = '$un_other_table'";
                $result=mysqli_query($con,$sql);
                echo  mysqli_connect_error();
                }

                include 'connect.php';
                $username=$_SESSION['username'];
			    $sql1="SELECT `username` FROM `user` WHERE `username`='$username'";
                $result1=mysqli_query($con,$sql1);
                echo mysqli_connect_error();
                $row=mysqli_fetch_assoc($result1);
                $un_other_table=$row['username'];
                $sql="UPDATE `score` SET `total` =[win+loss+draw] WHERE `username` = '$un_other_table'";
                $result=mysqli_query($con,$sql);
                echo  mysqli_connect_error();
                
            
        } 
    
        
            ?>  
            </div>
            <p>
                <a href="profile.php">Edit profile</a>
                <a href="logout.php">Logout</a>
                <a href="dashboard.php">Dashboard</a>

            </p>
        </form>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>
