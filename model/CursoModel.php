<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class cursoModel extends mainModelConexion
    {
        protected function set_createCurso($nombre, $codigo, $profesor){
            
            $sql = "INSERT INTO cursos (nombre_curso, codigo_curso, id_profesor, estado_curso)
                    VALUES ('$nombre', '$codigo', '$profesor', '1')";
            
            return $this->runQuery($sql);
        }

        protected function get_existeCurso($nombre){
            $sql = "SELECT id_cursos FROM cursos WHERE nombre_curso = '$nombre'";

            return $this->runQuery($sql);
        }

        protected function set_updateCurso($idCurso, $nombre, $profesor){
            $sql = "UPDATE cursos SET nombre_curso = '$nombre', id_profesor = '$profesor'
                    WHERE id_cursos = '$idCurso'";
                
                return $this->runQuery($sql);
        }

        protected function get_dataUltimoCurso(){
            $sql = "SELECT c.id_cursos AS id, c.nombre_curso AS nombreCurso, p.nombre_profesor AS nombreProfesor 
                    FROM cursos c
                    INNER JOIN profesor p ON c.id_profesor = p.id_profesor
                    where c.id_cursos = (select MAX(id_cursos) from cursos limit 1)";
                
            return $this->runSimpleQuery($sql);
        }

        protected function get_listCursos(){
            $sql = "SELECT c.id_cursos AS id, c.nombre_curso AS nombreCurso, c.codigo_curso AS codigo, p.nombre_profesor AS nombreProfesor
                    FROM cursos c
                    INNER JOIN profesor p ON c.id_profesor = p.id_profesor 
                    ORDER BY c.id_cursos ASC";
            return $this->runQuery($sql);
        }

        protected function get_dataCursos($id){
            $sql = "SELECT id_cursos AS id, nombre_curso AS nombreCurso, id_profesor AS idProdfesor
                    FROM cursos WHERE id_cursos = '$id'";
                
                return $this->runSimpleQuery($sql);
        }
    
        

       
    }
    