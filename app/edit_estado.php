<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listado de Estados</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php

  function debug_to_console($data){
    $output = $data;
    if(is_array($output))
    $output = implode(',',$output);

    echo "<script> console.log('Debug Objects: " .$output. "');</script>";
  }

  require_once "../models/Estado.php";
  $id = filter_input(INPUT_GET, 'estado', FILTER_VALIDATE_INT);
  if( ! $id ){
    header("Location:" . Estado::baseurl() . "app/estado.php");
  }
  $db = new DatabaseMySQL;
  $newEstado = new Estado($db);
  $newEstado->setId($id);
  $estado = $newEstado->getMySQL();




  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Editar estado <?php echo $estado->nombre ?></h2>
      <form action="<?php echo Estado::baseurl() ?>app/update_estado.php" method="POST">
        <div class="form-group">
          <label for="submarca">Nuevo Estado</label>
          <input type="text" name="estado" value="" class="form-control" id="estado" placeholder="Estado">
        </div>
        <input type="hidden" name="id" value="<?php echo $estado->id_estado ?>" />
        <input type="submit" name="submit" class="btn btn-default" value="Update estado" />
      </form>
    </div>
  </div>
</body>
</html>
