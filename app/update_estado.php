<?php
	require_once "../models/Estado.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Estado::baseurl() . "app/estados.php"); 
	      exit;
	}
	$args = array(
	    'id'        => FILTER_VALIDATE_INT,
	    'estado' => htmlentities('estado')
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	if( $post->id === false ){
	    header("Location:" . Estado::baseurl() . "app/estados.php");
	}

	$db = new DatabaseMySQL;
	$newEstado = new Estado($db);
	$newEstado->setId($post->id);
	$newEstado->setEstado($post->estado);
	$newEstado->update();
	header("Location:" . Estado::baseurl() . "app/estados.php");
?>
