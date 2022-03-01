<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Game</title>
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	    <link href="assets/css/main.css" rel="stylesheet">
        
    </head>
<body>
  <section class="center-text">
<div class="head">
        <h2>Rock Paper Scissors</h2>
</div>
        <form action="game2.php" method="post">
            
            <div class="form-group">
            <input type="radio" name="user_choice" value="Rock" title="Rock" /><img src="images/rock.png">
            <input type="radio" name="user_choice" value="Paper" title="Paper" /><img src="images/paper.jpg">
            <input type="radio" name="user_choice" value="Scissors" title="Scissors" /><img src="images/scissors.jpg">
            </div>

            <div class="form-group">
                <button type="submit" name="form_submit" class="btn btn-success" value="submit">Submit</button>
            </div>

    <?php

        session_start(); 
        include 'connect.php';

        if(!isset($_SESSION['username'])) 
        {
            header('location:index.php');
        } 
        else
    
        {        $total=0;
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
                echo ' Player:'   .$user_choice.    ' CPU: '    .$Computer.'<br>  Result: You Lose!';
                $loss=1;
                }

                elseif(($user_choice==$cf[0] AND $Computer==$cf[2]) OR ($user_choice==$cf[1] AND $Computer==$cf[0]) OR ($user_choice==$cf[2] AND $Computer==$cf[1]))
                {
                echo 'Player:'     .$user_choice.'   CPU: '   .$Computer.'<br>  Result: You Won!';
                $win=1;
                }

                else
                {
                //if($user_choice == $Computer) 
                echo '  Player:     '.$user_choice.' CPU: '    .$Computer.'<br>   Result: Match Draw';
                $draw=1;
                }
                $total=1;
                $sql1="SELECT `total`,`win`,`loss`,`draw` FROM `score` WHERE `username`='$username'";
                $result1=mysqli_query($con,$sql1);
                echo mysqli_connect_error();
                while($row=mysqli_fetch_assoc($result1))
                {
                $w=$row['win']; 
                $t=$row['total']; 
                $d=$row['draw']; 
                $l=$row['loss']; 
                $w+=$win; 
                $t+=$total; 
                $d+=$draw; 
                $l+=$loss;
                $sql = "UPDATE `score` SET `total`='$t',`win`='$w',`loss`='$l',`draw`='$d' WHERE `username`='$username'";
                $result=mysqli_query($con,$sql);
                echo  mysqli_connect_error();
                }
            
        } 
    
        
            ?> 

            <p>
                <button type="submit" name="profile" class="head" value="submit"><h4><a href="profile.php">Edit Profile</a></h4></button>
                 <!-- <h5 class="text-center text-info"><a href="logout.php">Logout</a></h5>
                <a href="profile.php">Edit profile</a> -->
                <button type="submit" name="logout" class="head" value="submit"><h4><a href="logout.php">Logout</a></h4></button>
                <button type="submit" name="dashboard" class="head" value="submit"><h4><a href="dashboard.php">Dashboard</a></h4></button>

            </p>
        </form>
    </section>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>
