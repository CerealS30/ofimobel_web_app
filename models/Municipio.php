<?php
require_once("../db/Database.php");
require_once("../db/DatabaseMySQL.php");

class Municipio {
  private $conMySQL;
  private $id_municipio;
  private $nombre_municpio;
  private $id_estado;

  public function __construct(DatabaseMySQL $db2){

    $this->conMySQL = new $db2;

  }

  public function setId($id_municipio){
    $this->id_municipio = $id_municipio;
  }

  public function setMunicipio($nombre_municpio){
    $this->nombre_municpio = $nombre_municpio;
  }

  public function setIdEstado($id_estado){
    $this->id_estado = $id_estado;
  }



  public function save() {
    try{
      $query = $this->conMySQL->prepare('INSERT INTO Municipio (nombre, id_estado) values (?, ?)');
      $query->bindParam(1, $this->nombre_municpio, PDO::PARAM_STR);
      $query->bindParam(2, $this->id_estado, PDO::PARAM_INT); 
      $query->execute();
      $this->conMySQL->close();
    }
    catch(PDOException $e) {
      echo  $e->getMessage();
    }
  }

  public function update(){
    try{
      $query = $this->conMySQL->prepare('UPDATE Municipio SET nombre = ?, id_estado = ? WHERE id_municipio = ?');
      $query->bindParam(1, $this->nombre_municpio, PDO::PARAM_STR);
      $query->bindParam(2, $this->id_estado, PDO::PARAM_INT);
      $query->bindParam(3, $this->id_municipio, PDO::PARAM_INT);
      $query->execute();
      $this->conMySQL->close();
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }


  public function getMySQL(){


    try{
      if(is_int($this->id_municipio)){

        $query = $this->conMySQL->prepare('SELECT * FROM munis where id_municipio = ?',);
        $query->bindParam(1, $this->id_municipio, PDO::PARAM_INT);
        $query->execute();
        $this->conMySQL->close();
        return $query->fetch(PDO::FETCH_OBJ);
      }
      else{



        $query = $this->conMySQL->prepare('SELECT * FROM munis');

        $query->execute();

        $this->conMySQL->close();

        return $query->fetchAll(PDO::FETCH_OBJ);
      }
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }

  public function delete(){
    try{
      $query = $this->conMySQL->prepare('DELETE FROM Municipio WHERE id_municipio = ?');
      $query->bindParam(1, $this->id_municipio, PDO::PARAM_INT);
      $query->execute();
      $this->conMySQL->close();
      return true;
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }

  public static function baseurl() {
    return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/ofimobel/";
  }

  public function checkMunicipio($user) {
    if( ! $user ) {
      header("Location:" . User::baseurl() . "app/list.php");
    }
  }
}
?>
