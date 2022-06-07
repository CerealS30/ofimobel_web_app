<?php
	require_once "../models/Estado.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Estado::baseurl() . "app/estados.php");
	      exit;
	}

	$args = array(
	    'estado'  => htmlentities()
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	$db = new DatabaseMySQL;
	$estado = new Estado($db);
	$estado->setEstado($post->estado);
	$estado->save();
	header("Location:" . Estado::baseurl() . "app/estados.php");

?>
