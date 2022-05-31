<?php
	require_once "../models/User.php";
	if (empty($_POST['submit'])){
	      header("Location:" . User::baseurl() . "crudpgsql/app/list.php");
	      exit;
	}

	$args = array(
	    'submarca'  => FILTER_SANITIZE_STRING,
	    'marc'  => FILTER_SANITIZE_STRING,
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	$db = new Database;
	$user = new User($db);
	$user->setUsername($post->submarca);
	$user->setPassword($post->marc);
	$user->save();
	header("Location:" . User::baseurl() . "app/list.php");

?>
