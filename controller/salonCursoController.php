<?php 

    if ($peticionesAjax) {
        require_once '../model/SalonCursoModel.php';
    }else {
        require_once './model/SalonCursoModel.php';
    }

    class salonCursoController extends salonCursoModel
    {

        private $idSalon;
        private $idCurso;
        private $horaIngreso;
        private $horaSalida;
        private $fecha;
        
    
        public function __construct($idSalon, $idCurso, $horaIngreso, $horaSalida, $fecha) {
            $this->idSalon = !empty($idSalon) ? $this->get_cleanText($idSalon) : "";
            $this->idCurso = !empty($idCurso) ? $this->get_cleanText($idCurso) : "";
            $this->horaIngreso = !empty($horaIngreso) ? $this->get_cleanText($horaIngreso) : "";
            $this->horaSalida = !empty($horaSalida) ? $this->get_cleanText($horaSalida) : "";
            $this->fecha = !empty($fecha) ? $this->get_cleanText($fecha) : "";
        }
        

        public function crearAgendaSalon()
        {
            $exiteHora = $this->get_existeHora($this->idSalon, $this->fecha, $this->horaIngreso);
            if ($exiteHora->rowCount() > 0) {
                $respuesta = 2;
            }else {
                $crearAhorro = $this->set_createSalonCurso($this->idSalon, $this->idCurso, $this->fecha, $this->horaIngreso, $this->horaSalida);
            if ($crearAhorro->rowCount() > 0) {
                $respuesta = 3;
            }else {
                $respuesta = 4;
            }
            }
            
            
            return $respuesta;
        }

        public function listarAgenda()
        {
            $respuesta = $this->get_listAgenda($this->idSalon);
            $data = array();
            

            while ($registro = $respuesta->fetchObject()) {
              
                $data[] = array(
                    "0" => $registro->nombreSalon,   
                    "1" => $registro->nombreCurso,
                    "2" => $registro->nombreProfesor,
                    "3" => $registro->fecha,
                    "4" => $registro->horaIngreso,
                    "5" => $registro->horaSalida
                );
            }
    
            $resul = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            
            echo json_encode($resul);
            
        }
          
    }
    