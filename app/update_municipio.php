<?php
	require_once "../models/Municipio.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Municipio::baseurl() . "app/municipios.php");
	      exit;
	}
	$args = array(
	    'id'        => FILTER_VALIDATE_INT,
      'municipio' => htmlentities('municipio'),
	    'estado' => FILTER_VALIDATE_INT
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	if( $post->id === false ){
	    header("Location:" . Municipio::baseurl() . "app/municipios.php");
	}

	$db = new DatabaseMySQL;
	$newMunicipio = new Municipio($db);
	$newMunicipio->setId($post->id);
  $newMunicipio->setMunicipio(strtoupper($post->municipio));
	$newMunicipio->setIdEstado($post->estado);
	$newMunicipio->update();
	header("Location:" . Municipio::baseurl() . "app/municipios.php");
?>
