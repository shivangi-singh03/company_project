<?php
require_once('models/details.php');
class User{
    public function getfunc()
    {
    $host = "localhost";  
    $user = "root";  
    $password = "";  
    $db_name = "db1";  
      
    $conn = mysqli_connect($host, $user, $password,$db_name);  
    
    if(!$conn) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    
     if(isset($_REQUEST['uname']) && isset($_REQUEST['psw']))
     {
         $name=$_REQUEST['uname'];
         $password=$_REQUEST['psw'];
         $sql = "SELECT * FROM  `details` where name = '$name' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
       
        $count = mysqli_num_rows($result);  
        
            if($count == 1){
             return 'login';
         }
         else
         {
             return 'Invalid attempt';
         }
     }
    }

}
?>