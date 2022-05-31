<?php
    require_once("../db/Database.php");
    require_once("../db/DatabaseMySQL.php");
    require_once("../interfaces/IUser.php");

    class User implements IUser {
    	private $con;
      private $conMySQL;
        private $id;
        private $nombre_municpio;
        private $id_estado;
        private $nombre_estado;
        private $func_num_if;
        private $func_num_else;

    	public function __construct(Database $db, DatabaseMySQL $db2){
    		$this->con = new $db;
        $this->conMySQL = new $db2;
        $this->func_num_else = array(
          'SELECT * FROM titus order by id',
          'SELECT * FROM munis',
          'SELECT * FROM Estado'
        );
        $this->func_num_if = array(
          'SELECT * FROM titus where id = ?',
          'SELECT * FROM munis where id_municipio = ?',
          'SELECT * FROM Estado where id_estado = ?'
        );

    	}

        public function setId($id){
            $this->id = $id;
        }


        public function setMunicipio($nombre_municpio){
               $this->nombre_municpio = $nombre_municpio;
        }

        public function setIdEstado($id_estado){
            $this->id_estado = $id_estado;
        }

        public function setEstado($nombre_estado){
            $this->nombre_estado = $nombre_estado;
        }


    	//insertamos usuarios en una tabla con postgreSql
    	public function save() {
    		try{
    			$query = $this->con->prepare('INSERT INTO auto (nombrec, idmarca) values (?,?)');
                $query->bindParam(1, $this->username, PDO::PARAM_STR);
    			$query->bindParam(2, $this->password, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $e) {
    	        echo  $e->getMessage();
    	    }
    	}

        public function updateMunicipio(){
    		try{
    			$query = $this->conMySQL->prepare('UPDATE Municipio SET nombre = ?, id_estado = ? WHERE id_municipio = ?');
    			$query->bindParam(1, $this->nombre_municpio, PDO::PARAM_STR);
    			$query->bindParam(2, $this->id_estado, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
    	}

      public function updateEstadp(){
      try{
        $query = $this->conMySQL->prepare('UPDATE Estado SET nombre = ? WHERE id_estado = ?');
        $query->bindParam(1, $this->nombre_estado, PDO::PARAM_STR);
        $query->execute();
        $this->con->close();
      }
          catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    	//obtenemos usuarios de una tabla con postgreSql
    	public function get(){
    		try{
                if(is_int($this->id)){

                    $query = $this->con->prepare('SELECT * FROM auto natural join marca WHERE idauto = ?');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{

                    $query = $this->con->prepare('SELECT * FROM credito');

        			$query->execute();

        			$this->con->close();

        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
    	}

      public function getMySQL($func_num){


        try{
                if(is_int($this->id)){
                    global $func_num_if;
                    $query = $this->conMySQL->prepare($this->func_num_if[$func_num]);
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{



                    $query = $this->conMySQL->prepare($this->func_num_else[$func_num]);

        			$query->execute();

        			$this->con->close();

        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
      }

        public function delete(){
            try{
                $query = $this->con->prepare('DELETE FROM auto WHERE idauto = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $e){
                echo  $e->getMessage();
            }
        }

        public static function baseurl() {
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/ofimobel/";
        }

        public function checkUser($user) {
            if( ! $user ) {
                header("Location:" . User::baseurl() . "app/list.php");
            }
        }
    }
?>
