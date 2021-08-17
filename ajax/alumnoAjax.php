<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    
    if (isset($_GET['dt'])) {
        
        if ($_GET['dt'] == 1) {
            require_once '../controller/alumnoController.php';
            $listado = new alumnoController();
            echo $listado->listadoAlumnos();    
        }     
    }
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
