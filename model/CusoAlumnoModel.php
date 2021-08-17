<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class cursoAlumnoModel extends mainModelConexion
    {
        protected function set_createCursoAlumno($idCurso, $idAlumno){

            $numeroElementos = 0;
            $h = true;
            while ($numeroElementos < count($idAlumno)) {
                $sql = "INSERT INTO cursos_alumno (id_curso, id_alumno)
                        VALUES ('$idCurso', '$idAlumno[$numeroElementos]')";
                $this->runQuery($sql) or $h = false;
                $numeroElementos +=1;
            }
            
            return $h;
        }

        protected function get_listadoAlumnos($idCurso){
            $sql = "SELECT id_alumno AS id FROM cursos_alumno WHERE id_curso = '$idCurso'";

            return $this->runQuery($sql);
        }

        protected function delectAlumno($idCurso, $idAlumno){
            $numeroElementos = 0;
            $h = true;
            while ($numeroElementos < count($idAlumno)) {
                $sql = "DELETE FROM cursos_alumno WHERE id_curso = '$idCurso' AND id_alumno = '$idAlumno[$numeroElementos]'";
                $this->runQuery($sql) or $h = false;    
                
                $numeroElementos +=1;
            }
            
            return $h;
        }
    }
    