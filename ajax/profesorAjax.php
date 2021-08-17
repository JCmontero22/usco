<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    

    if (isset($_GET['op'])) {
        if ($_GET['op'] == 1) {
            require_once '../controller/profesorController.php';
            $listado = new profesorController();
            echo $listado->listaProfesor();
        }

    }
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
