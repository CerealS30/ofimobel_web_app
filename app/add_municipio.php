<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listado de Municipios</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php
  require_once "../models/Estado.php";
  require_once "../models/Municipio.php";
  $db = new DatabaseMySQL;
  $db2 = new DatabaseMySQL;
  $estado = new Estado($db);
  $municipio = new Municipio($db2);
  $usersMySQL = $estado->getMySQL();
  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Añadir Municipio</h2>
      <form action="<?php echo Municipio::baseurl() ?>app/save_municipio.php" method="POST">
        <div class="form-group">
          <label for="submarca">Nombre del Municipio</label>
          <input type="text" name="municipio" value="" class="form-control" id="municipio" placeholder="Municipio">
        </div>
        <div class="form-group">
          <label for="marc">Municipio</label>
          <select name = "estado">
            <option value="">Selecciona un Municipio</option>
            <?php foreach($usersMySQL as $user) {

              echo "<option value='" . $user->id_estado . "'>" . $user->nombre . "</option>";
            }
            ?>
</select>
          </div>
          <input type="submit" name="submit" class="btn btn-default" value="Añadir Municipio" />
        </form>
      </div>
    </div>
  </body>
  </html>
