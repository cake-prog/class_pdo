<?php

require_once "connect.php";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


session_start();



class CreateUser extends Сonnection{

    private $nick;
    private $email;
    private $hash;

    function __construct(){
        parent::__construct();
        $this -> nick = $_POST['nick'];
        $this -> email = $_POST['email'];
        $this -> hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
    }
    function register(){

            $stmt = $this -> pdo -> prepare("INSERT INTO `registration` (`nick`, `email`, `password`) VALUES (:nick, :email, :hash)");
            $stmt->execute(array(
                'nick' => $this->nick,
                'email' => $this->email,
                'hash' => $this->hash
            ));

            
             $_SESSION['message'] = 'Регистрация прошла успешно!';
             header('Location: signup.php');
             exit();

}

}


$User = new CreateUser;

$User -> register();





