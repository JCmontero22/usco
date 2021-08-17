<?php 

if ($peticionesAjax) {
    require_once '../model/AlumnoModel.php';
}else {
    require_once './model/AlumnoModel.php';
}

class alumnoController extends alumnoModel
{

    public function __construct() {
        
    }
              
    public function listadoAlumnos()
    {
        setlocale(LC_MONETARY, 'es-CO');

        $respuesta = $this->get_listAlumno();
        $data = array();

        while ($registro = $respuesta->fetchObject()) {
            $data[] = array(
                "0" => $registro->nombre,   
                "1" => $registro->identificacion,
                "2" => $registro->codigo,
                "3" => '<input type="checkbox" name="alumno'.$registro->id.'" id="alumno" class="form-control" value="'.$registro->id.'">'
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