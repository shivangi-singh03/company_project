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

        <form action="game1.php" method="post">
            
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
            if(!isset($_SESSION['username'])) 
            {
                header('location:login.php');
            } 
            else
            {
                if($_POST['user_choice']) {
                    $user_choice = $_POST['user_choice'];
                    $cf= array('Rock', 'Paper', 'Scissors');
                    $Choice= rand(0,2);
                    $Computer=$cf[$Choice];
                    if($user_choice==$cf[0] AND $Computer==$cf[1])
                    echo 'Player:    '.$user_choice.' CPU:    '.$Computer.' Result: Lose';

                    elseif($user_choice==$cf[0] AND $Computer==$cf[2])
                    echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Win';

                    elseif($user_choice==$cf[1] AND $Computer==$cf[0])
                    echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Win';

                    elseif($user_choice==$cf[1] AND $Computer==$cf[2])
                    echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Lose';

                    elseif($user_choice==$cf[2] AND $Computer==$cf[0])
                    echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Lose';

                    elseif($user_choice==$cf[2] AND $Computer==$cf[1])
                    echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Win';

                    else
                    //if($user_choice == $Computer) 
                        echo 'Player: '.$user_choice.' CPU: '.$Computer.' Result: Draw';
                    
                    
            }
            else 
                        echo 'Click to play';
            }
            ?>  
            </div>
            <p>
                Want to exit? <a href="logout.php">Log out</a>
            </p>
        </form>
</body>
</html>
