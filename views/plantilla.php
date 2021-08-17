<?php 

    $peticionesAjax = false;
    require_once './controller/viewsController.php';

    $pages = new viewsController();
    $pageViews = $pages->get_viewsController();

    if ($pageViews == "home") {
        
        require_once 'views/contents/head.php';
        require_once 'views/modules/home_view.php';
        /* require_once 'views/contents/footer.php'; */
           
    }else {
        require_once 'views/contents/head.php';
        require_once $pageViews;
        require_once 'views/contents/footer.php';
    }