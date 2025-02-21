<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


class Сonnection{

    public $pdo;
    private $stmt;

    function __construct(){
        $dbinfo = require 'dbinfo.php';
        $dsn = 'mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'] . ';charset=utf8mb4;';

		$options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
			$this->pdo = new PDO ($dsn, $dbinfo['login'], $dbinfo['pass'], $options); 
    }
    // Закрытие соединения.
	public static function destroy(){	
		$this -> pdo = null;
		return $this -> pdo; 
	}

}
