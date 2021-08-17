<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    
    if (isset($_POST['nombreCurso']) && isset($_POST['selectProfesor'])) {
        
        if (!empty($_POST['nombreCurso']) && !empty($_POST['selectProfesor'])) {
            require_once '../controller/cursoController.php';
            $listado = new cursoController($_POST['nombreCurso'], $_POST['selectProfesor'], $_POST['idCurso']);
            echo $listado->crearCurso();    
        }else {
            echo 1;
        }     
    }elseif (isset($_GET['op'])) {
        
        if ($_GET['op'] == 1) {
            require_once '../controller/cursoController.php';
            $dataUltimoCurso = new cursoController("","","");
            echo $dataUltimoCurso->dataUltimoCurso();    
        }

        if ($_GET['op'] == 2) {
            require_once '../controller/cursoController.php';
            $selecCursos = new cursoController("","","");
            echo $selecCursos->selectCurso();  
        }
    }elseif (isset($_GET['dt'])) {

        if ($_GET['dt'] == 1) {
            require_once '../controller/cursoController.php';
            $listado = new cursoController("","","");
            echo $listado->listarCursos(); 
        }
    }elseif (isset($_POST['idCurso'])) {
        
        require_once '../controller/cursoController.php';
        $dataCurso = new cursoController("","",$_POST['idCurso']);
        echo $dataCurso->dataCurso();    
    }
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
