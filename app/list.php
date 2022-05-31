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
  require_once "../models/User.php";
  require_once "../models/Titular.php";


  $db = new Database;
  $db2 = new DatabaseMySQL;
  $user = new User($db, $db2);
  $users = $user->get();

  $usersMySQL = $user->getMySQL(0);
  $titular = new Titular($users, $usersMySQL);
  $new_titular = $titular->getTitular();


  //var_dump($new_titular[0][0]);
  //$titular = new Titular($usersMySQL->id, $usersMySQL->nombre_completo);
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">OFIMOBEL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo User::baseurl() ?>app/list.php">Titulares</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo User::baseurl() ?>app/estados.php">Estados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo User::baseurl() ?>app/municipios.php">Municipios</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container" style="float:left; margin-left: 5%">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Lista Credito</h2>
      <div class="col-lg-1 pull-right" style="margin-bottom: 50px">
        <a class="btn btn-info" href="<?php echo User::baseurl() ?>app/add.php">Añadir titular</a>
      </div>

      <?php
      if( ! empty( $users ) || ! empty($usersMySQL)) {
        ?>
        <table class="table table-striped" style="margin-right: 100px">
          <tr>
            <th>Id</th>
            <th>Nombre completo</th>
            <th>ID credito</th>
            <th>CURP</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th>Filiacion</th>
            <th>Email</th>
            <th>Telefono Movil</th>
            <th>Tipo de Vivienda</th>
            <th>Autorizado</th>
            <th>Monto</th>

            <th>Acciones</th>
          </tr>
          <?php for($i = 0; $i < count($new_titular[0]); $i++)
          //  var_dump($Titular);
          {
            ?>
            <tr>
              <td><?php echo $new_titular[1][$i]->id?></td>
              <td><?php echo $new_titular[1][$i]->nombre_completo ?></td>
              <td><?php echo $new_titular[0][$i]->id_credito?></td>
              <td><?php echo $new_titular[1][$i]->curp?></td>
              <td><?php echo $new_titular[1][$i]->Municipio ?></td>
              <td><?php echo $new_titular[1][$i]->Estado ?></td>
              <td><?php echo $new_titular[1][$i]->tipo_fil?></td>
              <td><?php echo $new_titular[1][$i]->mail ?></td>
              <td><?php echo $new_titular[1][$i]->movil ?></td>
              <td><?php echo $new_titular[0][$i]->tipo_v ?></td>
              <td><?php echo $new_titular[0][$i]->autorizacion ? "SI" : "NO"   ?></td>
              <td><?php echo $new_titular[0][$i]->monto_credito ?></td>
              <td>
                <a class="btn btn-info" href="<?php echo User::baseurl() ?>app/edit.php?user=<?php echo $user->idauto ?>">Edit</a>
                <a class="btn btn-info" href="<?php echo User::baseurl() ?>app/delete.php?user=<?php echo $user->idauto ?>">Delete</a>
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
