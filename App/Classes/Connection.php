<?php

class Connection {
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'clinkreh_esperanza';
    public $con;
    public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
        } 
    }
