<?php 

    class viewsModel
    {
        protected function get_views($vista){
            $listaBlanca = [
                
            ];

            if (in_array($vista, $listaBlanca)) {
                if (is_file("./views/modules/".$vista."_view.php")) {
                    $respuesta = "./views/modules/".$vista."_view.php";
                }else {
                    $respuesta = "home";
                }
            }elseif ($vista == "home") {
                $respuesta = "home";
            }elseif ($vista == "index") {
                $respuesta = "home";
            }elseif ($vista == "home") {
                $respuesta = "home";
            }
            else {
                $respuesta = "page404";
            }

            return $respuesta;
        }
    }
    