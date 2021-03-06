<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>OFIMOBEL Web App</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
  <?php
  require_once "../models/Estado.php";
  require_once "../models/Titular.php";
  $db = new DatabaseMySQL;
  $estado = new Estado($db);
  $estadosMySQL = $estado->getMySQL();


  //var_dump($new_titular[0][0]);
  //$titular = new Titular($estadosMySQL->id, $estadosMySQL->nombre_completo);
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">OFIMOBEL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo Estado::baseurl() ?>app/list.php">Titulares</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Estado::baseurl() ?>app/estados.php">Estados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo Estado::baseurl() ?>app/municipios.php">Municipios</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container" style="float:left; margin-left: 5%">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Lista Estados</h2>
      <div class="col-lg-1 pull-right" style="margin-bottom: 50px">
        <a class="btn btn-info" href="<?php echo Estado::baseurl() ?>app/add_estado.php">Añadir Estado</a>
      </div>

      <?php
      if( ! empty($estadosMySQL)) {
        ?>
        <table class="table table-striped" style="margin-right: 100px">
          <tr>
            <th>Id</th>
            <th>Estado</th>

            <th>Acciones</th>
          </tr>
          <?php foreach($estadosMySQL as $users)
          //  var_dump($Titular);
          {
            ?>
            <tr>
              <td><?php echo htmlentities($users->id_estado) ?></td>
              <td><?php echo htmlentities($users->nombre) ?></td>
              <td>
                <a class="btn btn-info" href="<?php echo Estado::baseurl() ?>app/edit_estado.php?estado=<?php echo $users->id_estado ?>">Edit</a>
                <a class="btn btn-info" href="<?php echo Estado::baseurl() ?>app/delete_estado.php?estado=<?php echo $users->id_estado ?>">Delete</a>
              </td>

              <?php
            }
            ?>
          </table>
          <?php
        }
        else
        {
          ?>
          <div class="alert alert-danger" style="margin-top: 100px">There are 0 registered users</div>
          <?php
        }
        ?>
      </div>
    </div>
  </body>
  </html>
