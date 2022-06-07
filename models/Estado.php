<?php
    require_once("../db/Database.php");
    require_once("../db/DatabaseMySQL.php");

    class Estado {
        private $conMySQL;
        private $id_estado;
        private $nombre_estado;

    	public function __construct(DatabaseMySQL $db2){

        $this->conMySQL = new $db2;

    	}

      public function setId($id_estado){
          $this->id_estado = $id_estado;
      }

        public function setEstado($nombre_estado){
            $this->nombre_estado = $nombre_estado;
        }



    	public function save() {
    		try{
    			$query = $this->conMySQL->prepare('CALL insertIntoEstado(?)');
          $query->bindParam(1, $this->nombre_estado, PDO::PARAM_STR);
    			$query->execute();
    			$this->conMySQL->close();
    		}
            catch(PDOException $e) {
    	        echo  $e->getMessage();
    	    }
    	}

      public function update(){
      try{
        $query = $this->conMySQL->prepare('UPDATE Estado SET nombre = ? WHERE id_estado = ?');
        $query->bindParam(1, $this->nombre_estado, PDO::PARAM_STR);
        $query->bindParam(2, $this->id_estado, PDO::PARAM_INT);
        $query->execute();
        $this->conMySQL->close();
      }
          catch(PDOException $e){
            echo  $e->getMessage();
        }
    }


      public function getMySQL(){


        try{
                if(is_int($this->id_estado)){

                    $query = $this->conMySQL->prepare('SELECT * FROM Estado where id_estado = ?');
                    $query->bindParam(1, $this->id_estado, PDO::PARAM_INT);
                    $query->execute();
        			$this->conMySQL->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{



                    $query = $this->conMySQL->prepare('SELECT * FROM Estado');

        			$query->execute();

        			$this->conMySQL->close();

        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
      }

        public function delete(){
            try{
                $query = $this->conMySQL->prepare('DELETE FROM Estado WHERE id_estado = ?');
                $query->bindParam(1, $this->id_estado, PDO::PARAM_INT);
                $query->execute();
                $this->conMySQL->close();
                return true;
            }
            catch(PDOException $e){
                echo  $e->getMessage();
            }
        }

        public static function baseurl() {
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/ofimobel/";
        }

        public function checkEstado($user) {
            if( ! $user ) {
                header("Location:" . User::baseurl() . "app/list.php");
            }
        }
    }
?>
