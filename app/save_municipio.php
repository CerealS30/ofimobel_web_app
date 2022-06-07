<?php
	require_once "../models/Municipio.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Municipio::baseurl() . "app/municipios.php");
	      exit;
	}

	$args = array(
	    'municipio'  => htmlentities('municipio'),
      'estado' => FILTER_VALIDATE_INT
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	$db = new DatabaseMySQL;
	$municipio = new Municipio($db);
	$municipio->setMunicipio(strtoupper($post->municipio));
  $municipio->setIdEstado($post->estado);
	$municipio->save();
	header("Location:" . Municipio::baseurl() . "app/municipios.php");

?>
