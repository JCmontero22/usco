<?php 

    if ($peticionesAjax) {
        require_once '../model/ProfesoresModel.php';
    }else {
        require_once './model/ProfesoresModel.php';
    }

    class profesorController extends profesorModel
    {   
        
        public function listaProfesor()
        {
            $listaProfesor = $this->get_listProfesores();
            if ($listaProfesor->rowCount() > 0) {
                    while ($registro = $listaProfesor->fetchObject()) {
                    echo '<option value='.$registro->id.'>'.$registro->nombre.'</option>';
               }
           }
        }
               
    }
    