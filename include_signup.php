<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


session_start();

$nick = $_POST['nick'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_return = $_POST['password_return'];



class provercka_password{
    private $db;

    public $password;
    public $password_return;
    public $nick;
    public $email;


    function __construct(){
        
        $this -> nick = $_POST['nick'];
        $this -> email = $_POST['email'];
        $this -> password = $_POST['password'];
        $this -> password_return = $_POST['password_return'];

        $dbinfo = require 'dbinfo.php';

        $this -> db = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['pass']);
    }
    public function query($sql){
        if($this -> password === $this -> password_return){

            $stmt = $this->db->prepare($sql);
            $stmt -> execute();

            
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: signup.php');

        }
        else{
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: signup.php');
        }
}
}
$hash = password_hash($password, PASSWORD_DEFAULT);

$user = new provercka_password();
$user -> query("INSERT INTO `registration` (`nick`, `email`, `password`, `id`) VALUES ('$nick', $email, '$hash', NULL)");
