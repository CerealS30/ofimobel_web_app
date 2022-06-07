<?php
require_once("../db/Database.php");
require_once("../db/DatabaseMySQL.php");

class User  {
  private $con;
  private $conMySQL;
  private $id;
  private $curp;
  private $rfc;
  private $nombre;
  private $mail;
  private $movil;
  private $id_municipio;
  private $id_filiacion;
  private $id_credito;
  private $tipo_v;
  private $subt;
  private $tipo_c;
  private $autorizacion;
  private $monto_credito;

  public function __construct(Database $db, DatabaseMySQL $db2){
    $this->con = new $db;
    $this->conMySQL = new $db2;

  }

  public function setId($id){
    $this->id = $id;
  }

  public function setCurp($curp) {
    $this->curp = $curp;
  }

  public function setRfc($rfc) {
    $this->rfc = $rfc;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function setMovil($movil) {
    $this->movil = $movil;
  }

  public function setIdMunicipio($id_municipio) {
    $this->id_municipio = $id_municipio;
  }

  public function setIdFiliacion($id_filiacion) {
    $this->id_filiacion = $id_filiacion;
  }

  public function setIdCredito($id_credito) {
    $this->id_credito = $id_credito;
  }

  public function setTipo_v($tipo_v) {
    $this->tipo_v = $tipo_v;
  }

  public function setSubt($subt) {
    $this->subt = $subt;
  }

  public function setTipoc($tipo_c) {
    $this->tipo_c = $tipo_c;
  }

  public function setAutorizacion($autorizacion) {
    $this->autorizacion = $autorizacion;
  }

  public function setMonto_credito($monto_credito) {
    $this->monto_credito = $monto_credito;
  }



  //insertamos usuarios en una tabla con postgreSql
  public function save() {
    try{
      $query = $this->con->prepare('INSERT INTO credito(id_credito, tipo_v, subt, tipo_c, autorizacion, monto_credito) values (?,?,?,?,?,?)');
      $query2 = $this->conMySQL->prepare('INSERT INTO Titular (curp,rfc,nombre_completo,id_municipio,id_fil,mail,movil) values (?,?,?,?,?,?,?)');
      $query->bindParam(1, $this->id_credito, PDO::PARAM_STR);
      $query->bindParam(2, $this->tipo_v, PDO::PARAM_STR);
      $query->bindParam(3, $this->subt, PDO::PARAM_STR);
      $query->bindParam(4, $this->tipo_c, PDO::PARAM_STR);
      $query->bindParam(5, $this->autorizacion, PDO::PARAM_INT);
      $query->bindParam(6, $this->monto_credito, PDO::PARAM_STR);

      $query2->bindParam(1, $this->curp, PDO::PARAM_STR);
      $query2->bindParam(2, $this->rfc, PDO::PARAM_STR);
      $query2->bindParam(3, $this->nombre, PDO::PARAM_STR);
      $query2->bindParam(4, $this->id_municipio, PDO::PARAM_INT);
      $query2->bindParam(5, $this->id_filiacion, PDO::PARAM_INT);
      $query2->bindParam(6, $this->mail, PDO::PARAM_STR);
      $query2->bindParam(7, $this->movil, PDO::PARAM_STR);

      $query2->execute();
      $query->execute();
    //  $query2->execute();
      $this->con->close();



      $this->conMySQL->close();

    }
    catch(PDOException $e) {
      echo  $e->getMessage();
    }
  }



  public function update(){
    try{
      $query = $this->con->prepare('UPDATE credito SET id_credito = ?, tipo_v = ?, subt = ?, tipo_c = ?, autorizacion = ?, monto_credito = ? WHERE id = ?');
      $query2 = $this->conMySQL->prepare('UPDATE Titular SET nombre_completo = ?, curp = ?, rfc = ?, id_municipio = ?, mail = ?, movil = ? WHERE id = ?');
      $query->bindParam(1, $this->id_credito, PDO::PARAM_STR);
      $query->bindParam(2, $this->tipo_v, PDO::PARAM_STR);
      $query->bindParam(3, $this->subt, PDO::PARAM_STR);
      $query->bindParam(4, $this->tipo_c, PDO::PARAM_STR);
      $query->bindParam(5, $this->autorizacion, PDO::PARAM_INT);
      $query->bindParam(6, $this->monto_credito, PDO::PARAM_STR);
      $query->bindParam(7, $this->id, PDO::PARAM_INT);

      $query2->bindParam(1, $this->nombre, PDO::PARAM_STR);
      $query2->bindParam(2, $this->curp, PDO::PARAM_STR);
      $query2->bindParam(3, $this->rfc, PDO::PARAM_STR);
      $query2->bindParam(4, $this->id_municipio, PDO::PARAM_INT);
      $query2->bindParam(5, $this->mail, PDO::PARAM_STR);
      $query2->bindParam(6, $this->movil, PDO::PARAM_STR);
      $query2->bindParam(7, $this->id, PDO::PARAM_INT);
      $query->execute();
      $query2->execute();
      $this->con->close();
      $this->conMySQL->close();
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }



  //obtenemos usuarios de una tabla con postgreSql
  public function get(){
    try{
      if(is_int($this->id)){

        $query = $this->con->prepare('SELECT * FROM credito where id = ?');
        $query->bindParam(1, $this->id, PDO::PARAM_INT);
        $query->execute();
        $this->con->close();
        return $query->fetch(PDO::FETCH_OBJ);
      }
      else{

        $query = $this->con->prepare('SELECT * FROM credito order by id');

        $query->execute();

        $this->con->close();

        return $query->fetchAll(PDO::FETCH_OBJ);
      }
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }

  public function getMySQL(){

    try{
      if(is_int($this->id)){
        $query = $this->conMySQL->prepare('SELECT id, nombre_completo, curp, rfc, nombre_m, nombre, tipo_fil, mail, movil FROM Titular LEFT JOIN Filiacion on Titular.id_fil = Filiacion.id_fil INNER JOIN Municipio ON Titular.id_municipio
                                     = Municipio.id_municipio INNER JOIN Estado ON Municipio.id_estado = Estado.id_estado where id = ?');
        $query->bindParam(1, $this->id, PDO::PARAM_INT);
        $query->execute();
        $this->con->close();
        return $query->fetch(PDO::FETCH_OBJ);
      }
      else{

        $query = $this->conMySQL->prepare('SELECT id, nombre_completo, curp, rfc,nombre_m, nombre, tipo_fil, mail, movil FROM Titular LEFT JOIN Filiacion on Titular.id_fil = Filiacion.id_fil INNER JOIN Municipio ON Titular.id_municipio
                                     = Municipio.id_municipio INNER JOIN Estado ON Municipio.id_estado = Estado.id_estado ORDER BY id;');

        $query->execute();

        $this->conMySQL->close();

        return $query->fetchAll(PDO::FETCH_OBJ);
      }
    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }

  public function getFil(){
    try{

        $query = $this->conMySQL->prepare('SELECT * FROM Filiacion');

        $query->execute();

        $this->conMySQL->close();

        return $query->fetchAll(PDO::FETCH_OBJ);

    }
    catch(PDOException $e){
      echo  $e->getMessage();
    }
  }

  public function delete(){
    try{
      $query = $this->con->prepare('DELETE FROM credito WHERE id = ?');
      $query2 = $this->conMySQL->prepare('DELETE FROM Titular where id = ?');
      $query->bindParam(1, $this->id, PDO::PARAM_INT);
      $query2->bindParam(1, $this->id, PDO::PARAM_INT);
      $query->execute();
      $query2->execute();
      $this->con->close();
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

  public function checkUser($user) {
    if( ! $user ) {
      header("Location:" . User::baseurl() . "app/list.php");
    }
  }
}
?>
