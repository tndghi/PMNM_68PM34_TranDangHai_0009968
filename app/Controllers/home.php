<?php

class home{

    public function index(){
        require_once '../app/Views/home/index.php';
        // require_once '../app/Views/layout/masterlayout.php';
    }
    public function login(){
        require_once '../app/Views/home/login.php';
    }

}