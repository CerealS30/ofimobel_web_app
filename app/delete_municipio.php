<?php
require_once "../models/Municipio.php";
$db = new DatabaseMySQL;
$municipio = new Municipio($db);
$id = filter_input(INPUT_GET, 'municipio', FILTER_VALIDATE_INT);

if( $id ){
  $municipio->setId($id);
  $municipio->delete();
}
header("Location:" . Municipio::baseurl() . "app/municipios.php");
?>
