<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/User.php";
    $db = new Database;
    $user = new User($db);
    $users = $user->getSubmarca();
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Añadir auto</h2>
            <form action="<?php echo User::baseurl() ?>app/save.php" method="POST">
                <div class="form-group">
                    <label for="submarca">Submarca</label>
                    <input type="text" name="submarca" value="" class="form-control" id="submarca" placeholder="Submarca">
                </div>
                <div class="form-group">
                    <label for="marc">Marca</label>
                    <select name = "marc">
                    	<option value="">Selecciona una marca</option>
                    	<?php foreach($users as $user) {
                    	   
                    	   echo "<option value='" . $user->idmarca . "'>" . $user->nombrem . "</option>";
                    	}
                    	?>
                    		
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Save user" />
            </form>
        </div>
    </div>
</body>
</html>
