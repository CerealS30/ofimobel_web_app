<?php
 require_once "../models/User.php";
 if (empty($_POST['submit'])){
       header("Location:" . User::baseurl() . "app/list.php");
       exit;
 }

 $args = array(
   'curp' => htmlentities('curp'),
   'rfc' => htmlentities('rfc'),
   'nombre' => htmlentities('nombre'),
   'email' => htmlentities('email'),
   'movil' => htmlentities('movil'),
   'municipio' => FILTER_VALIDATE_INT,
   'filiacion' => FILTER_VALIDATE_INT,
   'id_credito' => htmlentities('id_credito'),
   'tipo_v' => htmlentities('tipo_v'),
   'subt' => htmlentities('subt'),
   'tipo_c' => htmlentities('tipo_c'),
   'autorizacion' => htmlentities('autorizacion'),
   'monto_credito' => FILTER_VALIDATE_FLOAT

 );

 $post = (object)filter_input_array(INPUT_POST, $args);

 $db = new Database;
 $db2 = new DatabaseMySQL;
 $user = new User($db, $db2);
 $user->setCurp($post->curp);
 $user->setRfc($post->rfc);
 $user->setNombre($post->nombre);
 $user->setMail($post->email);
 $user->setMovil($post->movil);
 $user->setIdMunicipio($post->municipio);
 $user->setIdFiliacion($post->filiacion);
 $user->setIdCredito($post->id_credito);
 $user->setTipo_v($post->tipo_v);
 $user->setSubt($post->subt);
 $user->setTipoc($post->tipo_c);
 $user->setAutorizacion($post->autorizacion);
 $user->setMonto_credito($post->monto_credito);
 $user->save();
 header("Location:" . User::baseurl() . "app/list.php");

?>
