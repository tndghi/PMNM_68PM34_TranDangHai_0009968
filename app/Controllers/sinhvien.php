<?php

class sinhvien{
    public function index(){
        //trả về danh sách sinh viên
        require_once "../app/Views/sinhvien/index.php";
    }
    public function create(){
        //trả về trang tạo sinh viên
        require_once "../app/Views/sinhvien/create.php";    
    }
}
?>