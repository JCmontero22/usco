<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    
    if (isset($_POST['idCurso']) && isset($_POST['idSalon']) && isset($_POST['horaEntrada']) && isset($_POST['horaSalida'])) {
        
        if (!empty($_POST['idCurso']) && !empty($_POST['idSalon']) && !empty($_POST['horaEntrada']) && !empty($_POST['horaSalida'])) {
            require_once '../controller/salonCursoController.php';
            $listado = new salonCursoController( $_POST['idSalon'], $_POST['idCurso'], $_POST['horaEntrada'], $_POST['horaSalida'], $_POST['fecha']);
            echo $listado->crearAgendaSalon();    
        }else {
            echo 1;
        }     
    }elseif (isset($_GET['dt'])) {
        
        if ($_GET['dt'] == 1) {
            require_once '../controller/salonCursoController.php';
            $listado = new salonCursoController($_GET['idSalon'],"","","","");
            echo $listado->listarAgenda(); 
        }
    }
    
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
