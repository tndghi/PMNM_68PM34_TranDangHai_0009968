<?php
require_once '../app/Core/Controller.php';
class sinhvien extends Controller{
    public function index(){
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhVien();


        //trả vể danh sách sinh viên
        $data['sinhviens'] = $sinhviens;

        $this->view('sinhvien/index', $data);
    }
    public function create(){
        //trả về trang tạo sinh viên
        $this->view('sinhvien/create');
    }
}
?>