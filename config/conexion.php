<?php 

    if ($peticionesAjax) {
        require_once '../config/configBD.php';
    }else {
        require_once './config/configBD.php';
    }

    class mainModelConexion
    {
        protected function conectar(){
            $enlase = new PDO(SGBD, USER, PASSWORD);
            return $enlase;
        }

        protected function runQuery($sql){
            $query = $this->conectar()->prepare($sql);
            $query->execute();
            return $query;
        }

        protected function runSimpleQuery($sql){
            $query = $this->conectar()->prepare($sql);
            $query->execute();
            return $query->fetch();
        }

        protected function get_randomNumber($letra, $longitud){
            for ($i=0; $i <=$longitud ; $i++) { 
                $numero = rand(0,9);
                $letra.=$numero;
            }
            return $letra;
        }

        protected function get_cleanText($cadena){
            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);
            $cadena = str_ireplace("<script>","",$cadena);
            $cadena = str_ireplace("</script>","",$cadena);
            $cadena = str_ireplace("<script src","",$cadena);
            $cadena = str_ireplace("<script type>","",$cadena);
            $cadena = str_ireplace("SELECT * FROM","",$cadena);
            $cadena = str_ireplace("DELETE FROM","",$cadena);
            $cadena = str_ireplace("INSERT INTO","",$cadena);
            $cadena = str_ireplace("--","",$cadena);
            $cadena = str_ireplace("UPDATE","",$cadena);
            $cadena = str_ireplace("^","",$cadena);
            $cadena = str_ireplace("==","",$cadena);
            $cadena = str_ireplace("[","",$cadena);
            $cadena = str_ireplace("]","",$cadena);
            $cadena = str_ireplace(";","",$cadena);

            return $cadena;
        }
    }
    