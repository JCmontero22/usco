<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';

    if (isset($_POST['nombreSalon'])) {

        if (!empty($_POST['nombreSalon'])) {
            require_once '../controller/salonController.php';
            $incert = new salonController($_POST['nombreSalon'], $_POST['idSalon']);
            echo $incert->crearSalon();
        }else {
            echo 1;
        }
        
    }elseif (isset($_GET['dt'])) {

        if ($_GET['dt'] == 1) {
            require_once '../controller/salonController.php';
            $listadoSalon = new salonController('','');
            echo $listadoSalon->listarSalones();
        }

    }elseif (isset($_GET['op'])) {

        if ($_GET['op'] == 1) {
            require_once '../controller/salonController.php';
            $listadoAhorro = new salonController('',$_POST['idSalon']);
            echo $listadoAhorro->dataSalon();
        }
    }
    
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
