<?php

	interface IUser{
	    public function get();
	    public function save();
	    public function updateMunicipio();
			public function updateEstadp();
	    public function delete();
			public function getMySQL($id);
	}

?>
