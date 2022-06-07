<?php
require_once "../models/User.php";
$db = new Database;
$db2 = new DatabaseMySQL;
$user = new User($db, $db2);
$id = filter_input(INPUT_GET, 'titular', FILTER_VALIDATE_INT);

if( $id ){
  $user->setId($id);
  $user->delete();
}
header("Location:" . User::baseurl() . "app/list.php");
?>
