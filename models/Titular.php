<?php
require_once("../db/Database.php");
require_once("../db/DatabaseMySQL.php");
require_once("../interfaces/IUser.php");


  class Titular{
    private $resultSet;
    public function __construct($credito, $titular){
      $this->resultSet = new ArrayObject(array($credito , $titular));
    }


    public function getTitular(){
      return $this->resultSet;
    }
  }

?>
