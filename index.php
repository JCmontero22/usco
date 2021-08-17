<?php 

    require_once 'config/config.php';
    require_once 'controller/viewsController.php';

    $plantilla = new viewsController();

    $plantilla->get_plantillaController();