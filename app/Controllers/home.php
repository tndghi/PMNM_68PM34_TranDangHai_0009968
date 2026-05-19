<?php

class home{

    public function index(){
        echo "Đây là trang chủ";
    }
    public function login(){
        require_once '../app/Views/home/login.php';
    }

}
?>