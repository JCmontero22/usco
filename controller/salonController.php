<?php 

    if ($peticionesAjax) {
        require_once '../model/SalonModel.php';
    }else {
        require_once './model/SalonModel.php';
    }

    class salonController extends salonModel
    {

        private $nombre;
        private $idSalon;
        
    
        public function __construct($nombre, $idSalon) {
            $this->nombre = !empty($nombre) ? $this->get_cleanText($nombre) : "";
            $this->idSalon = !empty($idSalon) ? $this->get_cleanText($idSalon) : "";
        }
        

        public function crearSalon()
        {
            if (empty($this->idSalon)) {
                $existe = $this->get_existeSalon($this->nombre);
                if ($existe->rowCount() > 0) {
                    $respuesta = 2;
                }else {
                    $codigo = $this->get_randomNumber("CDS", 4);
                    $crearAhorro = $this->set_createSalon($this->nombre, $codigo);
                    if ($crearAhorro->rowCount() > 0) {
                        $respuesta = 3;
                    }else {
                        $respuesta = 4;
                    }
                }   
            }else {
                $crearAhorro = $this->set_updateSalon($this->idSalon, $this->nombre);
                if ($crearAhorro->rowCount() > 0) {
                    $respuesta = 5;
                }else {
                    $respuesta = 6;
                }
            }
            
            return $respuesta;
        }
    

        public function listarSalones()
        {
            $respuesta = $this->get_listSalones();
            $data = array();
    
            while ($registro = $respuesta->fetchObject()) {
                $data[] = array(
                    "0" => $registro->nombreSalon,   
                    "1" => $registro->codigo,
                    "2" => '<button type="button" onclick="dataSalon(' . $registro->id . ');" class="btn btn-success" title="Editar Salon">
                        <i class="fas fa-edit   "></i></button>'." ".'<button type="button" onclick="ajendaSalones(' . $registro->id . ', \''.$registro->nombreSalon.'\');" class="btn btn-success" title="Agendar Salon">
                        <i class="fas fa-address-book"    "></i></button>'." ".'<button type="button" onclick="agenda(' . $registro->id . ');" class="btn btn-success" title="Agenda Salon">
                        <i class="fas fa-clipboard-list"    "></i></button>'
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

        public function dataSalon()
        {
            $dataSalon = $this->get_dataSalon($this->idSalon);
            echo json_encode($dataSalon);
        }
               
    }
    