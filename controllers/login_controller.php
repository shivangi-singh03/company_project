<?php
require_once('models/details.php');
class Register_Controller{
    public $login;
    public function __construct(){
        $this->logins=new User();

    }
    public function invoke(){
       $result= $this->logins->getfunc();
       if($result == 'login'){
           include 'views/login.html';
       }
       else{
        include 'views/login.html';
       }
    }
}
?>