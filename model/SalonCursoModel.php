<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class salonCursoModel extends mainModelConexion
    {
        protected function set_createSalonCurso($idSalon, $idCurso, $fecha, $horaIngreso, $horaSalida){
            
            $sql = "INSERT INTO salon_curso (id_salon, id_curso, fecha, hora_ingreso, hora_salida, estado)
                    VALUES ('$idSalon', '$idCurso', '$fecha', '$horaIngreso', '$horaSalida',  '1')";
            
            return $this->runQuery($sql);
        }

        protected function get_existeSalon($nombre){
            $sql = "SELECT id_salones FROM salones WHERE nombre_salon = '$nombre'";

            return $this->runQuery($sql);
        }

        protected function get_existeHora($idSalon, $fecha, $horaIngreso){
            $sql = "SELECT id_salon_curso FROM salon_curso WHERE id_salon = '$idSalon' AND fecha = '$fecha' AND hora_ingreso = '$horaIngreso'";
            return $this->runQuery($sql);
        }

        protected function get_listAgenda($salon){
            $sql = "SELECT sc.id_salon_curso AS id, s.nombre_salon AS nombreSalon, c.nombre_curso AS nombreCurso, p.nombre_profesor AS nombreProfesor, sc.hora_ingreso AS horaIngreso, sc.hora_salida AS horaSalida, DATE_FORMAT(sc.fecha, '%e-%c-%Y') AS fecha
                    FROM salon_curso sc
                    INNER JOIN salones s ON sc.id_salon = s.id_salones
                    INNER JOIN cursos c ON sc.id_curso = c.id_cursos
                    INNER JOIN profesor p ON c.id_profesor = p.id_profesor
                    WHERE s.id_salones = '$salon'
                    ORDER BY sc.id_salon_curso ASC";
                    return $this->runQuery($sql);
        }

        protected function set_updateSalon($idSalon, $nombre){
            $sql = "UPDATE salones SET nombre_salon = '$nombre' WHERE id_salones = '$idSalon'";
            return $this->runQuery($sql);
        }

        protected function get_dataSalon($idSalon){
            $sql = "SELECT nombre_salon AS nombre, id_salones AS id FROM salones WHERE id_salones = '$idSalon'";

            return $this->runSimpleQuery($sql);
        }
    }
    