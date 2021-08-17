<?php 

    if ($peticionesAjax) {
        require_once '../model/CusoAlumnoModel.php';
    }else {
        require_once './model/CusoAlumnoModel.php';
    }

    class cursoAlumnoController extends cursoAlumnoModel
    {

        private $idCurso;
        private $idAlumno;
        
    
        public function __construct($idCurso, $idAlumno) {
            $this->idCurso = $idCurso;
            $this->idAlumno = $idAlumno;
        }
        

        public function crearCursoAlumno()
        {      
           
            $crearCursoAlumno = $this->set_createCursoAlumno($this->idCurso, $this->idAlumno);
            if ($crearCursoAlumno) {
                $respuesta = 2;
            }else {
                $respuesta = 3;
            }
          
            return $respuesta; 
        }

        public function listadoAlumnos()
        {
            
            $alumnos = $this->get_listadoAlumnos($this->idCurso);
            $id = array();
            $datos = array();
            while ($registro = $alumnos->fetchObject()) {
                $id[] = $registro->id;
            }

            echo json_encode($id);
        }

        public function eliminarAlumno()
        {
            $retorno = $this->delectAlumno($this->idCurso, $this->idAlumno);
            if ($retorno) {
                $respuesta = 1;
            }else {
                $respuesta = 2;
            }

            return $respuesta;
        }
               
    }
    