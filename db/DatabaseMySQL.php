<?php

class DatabaseMySQL extends PDO{

	//dbname
	private $dbname = "OFIMOBEL";
	//host
	private $host 	= "127.0.0.1";
	//user database
	private $user 	= "root";
	//password user
	private $pass 	= 'password12345';
    //instance
	private $dbmysql;

	//connect with postgresql and pdo
	public function __construct(){
	    try {
	        $this->dbmysql = parent::__construct("mysql:host=$this->host;dbname=$this->dbname;user=$this->user;password=$this->pass");
	    }
        catch(PDOException $e){
	        echo  $e->getMessage();
	    }
	}

	//función para cerrar una conexión pdo
	public function close(){
    	$this->dbh = null;
	}
}

?>
