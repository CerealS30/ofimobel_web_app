<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de estados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/User.php";
    $db = new Database;
    $db2 = new DatabaseMySQL;
    $user = new User($db, $db2);
    $usersMySQL = $user->getMySQL(2);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Añadir Estado</h2>
            <form action="<?php echo User::baseurl() ?>app/save_estado.php" method="POST">
                <div class="form-group">
                    <label for="submarca">Nombre del estado</label>
                    <input type="text" name="estado" value="" class="form-control" id="estado" placeholder="Estado">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Añadir Estado" />
            </form>
        </div>
    </div>
</body>
</html>
