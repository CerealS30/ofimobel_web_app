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

  require_once "../models/Municipio.php";
  require_once "../models/Estado.php";
  $id = filter_input(INPUT_GET, 'municipio', FILTER_VALIDATE_INT);
  if( ! $id ){
    header("Location:" . Municipio::baseurl() . "app/municipios.php");
  }
  $db = new DatabaseMySQL;
  $db2 = new DatabaseMySQL;
  $newMunicipio = new Municipio($db);
  $estado = new Estado($db);
  $newMunicipio->setId($id);
  $municipio = $newMunicipio->getMySQL();
  $usersMySQL = $estado->getMySQL();




  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Editar Municipio <?php echo $municipio->Municipio ?></h2>
      <form action="<?php echo Municipio::baseurl() ?>app/update_municipio.php" method="POST">
        <div class="form-group">
          <label for="submarca">Nuevo Municipio</label>
          <input type="text" name="municipio" value="" class="form-control" id="municipio" placeholder="Municipio">
        </div>
        <div class="form-group">
          <label for="marc">Municipio</label>
          <select name = "estado">
            <option value="">Selecciona un Estado</option>
            <?php foreach($usersMySQL as $user) {

              echo "<option value='" . $user->id_estado . "'>" . $user->nombre . "</option>";
            }
            ?>

          </div>
        <input type="hidden" name="id" value="<?php echo $municipio->id_municipio ?>" />
        <input type="submit" name="submit" class="btn btn-default" value="Update Municipio" />
      </form>
    </div>
  </div>
</body>
</html>
