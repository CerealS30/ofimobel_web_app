<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listado de Titulares</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php
  require_once "../models/User.php";
  require_once "../models/Municipio.php";

  $id = filter_input(INPUT_GET, 'titular', FILTER_VALIDATE_INT);
  $id_c = $_GET['id_credito'];
  $curp = $_GET['curp'];
  $rfc = $_GET['rfc'];
  $nombre = $_GET['nombre'];
  if( ! $id ){
    header("Location:" . Usuer::baseurl() . "app/list.php");
  }

  $db = new Database;
  $db2 = new DatabaseMySQL;
  $db3 = new DatabaseMySQL;
  $user = new User($db, $db2);
  $user->setId($id);
  $municipio = new Municipio($db3);
  $filiacion = $user->getFil();
  $municipios = $municipio->getMySQL();
  $titular = $user->getMySQL();
  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Editar informacion del Titular:  <?php  echo $titular->nombre_completo  ?></h2>
      <form action="<?php echo User::baseurl() ?>app/update_titular.php" method="POST">
        <div class="form-group">
          <label for="curp">CURP</label>
          <input type="text" name="curp" value="<?php echo $curp ?>" class="form-control" id="curp" placeholder= "<?php echo $curp ?>" readonly>
        </div>

        <div class="form-group">
          <label for="rfc">RFC</label>
          <input type="text" name="rfc" value="<?php echo $rfc ?>" class="form-control" id="rfc" placeholder="<?php echo $rfc ?>" readonly>
        </div>

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" value="<?= $nombre ?>"  class="form-control" id="nombre" placeholder="<?= $nombre ?>" readonly>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" value="" class="form-control" id="email" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label for="movil">Numero de telefono</label>
          <input type="text" name="movil" value="" class="form-control" id="movil" placeholder="Telefono" required>
        </div>

        <div class="form-group">
          <label for="marc">Municipio</label>
          <select name = "municipio" required>
            <option value="">Selecciona un Municipio</option>
            <?php foreach($municipios as $munis) {

              echo "<option value='" . $munis->id_municipio . "'>" . $munis->Municipio . "</option>";
            }
            ?>
          </select>
        </div>



        <div class="form-group">
          <label for="id_credito">Numero de credito</label>
          <input type="text" name="id_credito" value="<?php echo $id_c ?>" class="form-control" id="id_credito" placeholder="<?php echo $id_c ?>" readonly>
        </div>

        <div class="form-group">
          <label for="tipo_v">Tipo de Vivienda</label>
          <select name="tipo_v" required>
            <option value="VIVIENDA NUEVA">VIVIENDA NUEVA</option>
            <option value="VIVIENDA USADA">VIVIENDA USADA</option>
            <option value="REDENCION DE PASIVO">REDENCION DE PASIVO</option>
          </select>
        </div>

        <div class="form-group">
          <label for="subt">Subtipo de Vivienda</label>
          <select name="subt" required>
            <option value="Adquisicion">Adquisicion</option>
            <option value="Construccion">Construccion</option>
            <option value="Redencion Pasivo">Redencion Pasivo</option>
            <option value="Ampliacion Vivienda">Ampliacion Vivienda</option>
            <option value="Mejoramiento Vivienda">Mejoramiento Vivienda</option>
          </select>
        </div>

        <div class="form-group">
          <label>Tipo de Credito</label>
          <!-- <select name="tipo_c" >
            <option value="INDIVIDUAL">INDIVIDUAL</option>
            <option value="MANCOMUNADO">MANCOMUNADO</option>
          </select> -->
          <br>
          <input type="radio" id="individual" name="tipo_c" value="INDIVIDUAL"required>
          <label for="individual">INDIVIDUAL</label><br>
          <input type="radio" id="mancomunado" name="tipo_c" value="MANCOMUNADO" required>
          <label for="mancomunado">MANCOMUNADO</label><br>
        </div>

        <div class="form-group">
          <label>Autorizado</label>
          <!-- <select name="autorizacion" >
            <option value=1>SI</option>
            <option value=0>NO</option>
          </select> -->
          <br>
          <input type="radio" id="si" name="autorizacion" value="t" required>
          <label for="si">SI</label><br>
          <input type="radio" id="no" name="autorizacion" value="f" required>
          <label for="no">NO</label><br>
        </div>

        <div class="form-group">
          <label for="monto_credito">Monto de Credito</label>
          <input type="text" name="monto_credito" value="" class="form-control" id="monto_credito" placeholder="Monto de Credito" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $titular->id ?>" />
        <input type="submit" name="submit" class="btn btn-default" value="Añadir Titular" />
      </form>
    </div>
  </div>
</body>
</html>
