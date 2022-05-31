<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
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

        require_once "../models/User.php";
        $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
	if( ! $id ){
		header("Location:" . User::baseurl() . "app/list.php");
	}
        $db = new Database;
        $newUser = new User($db);
        $user = $newUser->getSubmarca();




    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Edit user <?php echo $user->idauto ?></h2>
            <form action="<?php echo User::baseurl() ?>app/update.php" method="POST">
                <div class="form-group">
                    <label for="submarca">Submarca</label>
                    <input type="text" name="submarca" value="" class="form-control" id="submarca" placeholder="Submarca">
                </div>
                <div class="form-group">
                    <label for="marc">Marca</label>
                    <select name = "marc">
                    	<option value="">Selecciona una marca</option>
                    	<?php foreach($user as $users) {

                    	   echo "<option value='" . $users->Estado . "'>" . $users->Estado . "</option>";
                    	}
                    	?>

                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update user" />
            </form>
        </div>
    </div>
</body>
</html>
