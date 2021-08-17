<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    
    if (isset($_POST['idCursos']) && isset($_POST['idAlumno'])) {
        
        if (!empty($_POST['idAlumno'])) {
            require_once '../controller/cursoAlumnoController.php';
            $crear = new cursoAlumnoController($_POST['idCursos'], $_POST['idAlumno']);
            echo $crear->crearCursoAlumno();
        }else {
            echo 1;
        }

    }elseif (isset($_GET['op'])) {
        if ($_GET['op'] == 1) {
            require_once '../controller/cursoAlumnoController.php';
            $listaAlumnos = new cursoAlumnoController($_POST['idCurso'], "");
            echo $listaAlumnos->listadoAlumnos();
        }
        if ($_GET['op'] == 2) {
            require_once '../controller/cursoAlumnoController.php';
            $eliminarAlumnos = new cursoAlumnoController($_POST['idCurso'], $_POST['idAlumno']);
            echo $eliminarAlumnos->eliminarAlumno();
        }
    }
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
