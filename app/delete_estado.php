<?php
	require_once "../models/Estado.php"; 
	$db = new DatabaseMySQL;
	$estado = new Estado($db);
	$id = filter_input(INPUT_GET, 'estado', FILTER_VALIDATE_INT);

	if( $id ){
		$estado->setId($id);
		$estado->delete();
	}
	header("Location:" . Estado::baseurl() . "app/estados.php");
?>
