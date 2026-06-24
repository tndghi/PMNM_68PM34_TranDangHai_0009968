<?php
require_once '../app/middleware.php';

class home {
    public function index() {
        $middleware = new middleware();
        $middleware->checkLogin();
        require_once '../app/Views/home/index.php';
    }
}
?>