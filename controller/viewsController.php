<?php 

    require_once './model/ViewsModel.php';

    class viewsController extends viewsModel
    {
        public function get_plantillaController()
        {
            require_once './views/plantilla.php';
        }

        public function get_viewsController()
        {
            if (isset($_GET['vistas'])) {
                $ruta = explode("/", $_GET['vistas']);
                $respuesta = $this->get_views($ruta[0]);
            }else {
                $respuesta = "home";
            }

            return $respuesta;
        }
    }
    