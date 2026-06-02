<?php
require_once '../app/Core/Controller.php';
class sinhvien extends Controller{
    public function index(){
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhVien();

        //trả về title
        $data['title'] = 'Danh sách sinh viên';


        //trả vể danh sách sinh viên 
        $data['sinhviens'] = $sinhviens;
        $data['viewname'] = 'sinhvien/index';

        $this->view('layout/masterlayout', $data);
    }
    public function create(){
        //trả về trang tạo sinh viên
        $this->view('sinhvien/create');
    }
    public function store(){

        if(isset($_POST['hoten']) && isset($_POST['mssv']) && isset($_POST['gioitinh'])) {
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->addSinhVien($hoten, $mssv, $gioitinh);
            if ($result) {
                header('Location: /sinhvien/index');
                exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        } 
    }
}
?>