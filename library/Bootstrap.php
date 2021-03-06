<?php

class Bootstrap {

    function __construct() {
        $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
        $url = explode('/', $temp_url);

        if (empty($url[0]) || $url[0] == 'index') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->index();
        } else if ($url[0] == 'pldg') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->newPldge();
        } else if ($url[0] == 'rqst') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->requestLeader();
        } elseif ($url[0] == 'gtcntcy') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->getConstituency();
        } else if ($url[0] == 'gtcndidt') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->getCandidate();
        } else if ($url[0] == 'stats') {
            require APP_PATH . '/controllers/index.php';
            $controller = new Index();
            $controller->getStats();
        }
    }

}
