<?php
require_once("../db/Database.php");
require_once("../db/DatabaseMySQL.php");


  class Titular{
    private $resultSet;
    public function __construct($credito, $titular){
      $this->resultSet = array ($credito , $titular);
    }


    public function getTitular(){
      return $this->resultSet;
    }

    
  }

?>
