<?php
require_once '../app/Core/Controller.php';
class sinhvien extends Controller{
    public function index() {
    //thiết lập số lượng sinh viên hiển thị trên mỗi trang
    $limit = 6;
    //lấy số trang hiện tại từ URL, nếu không có thì mặc định là 1
    $currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    //tính toán vị trí bắt đầu (offset) dựa trên số trang hiện tại và số lượng sinh viên hiển thị trên mỗi trang
    $offset = ($currentPage - 1) * $limit;
    //tạo đối tượng của model sinhvienModel và gọi phương thức paging để lấy danh sách sinh viên và tổng số trang
    $sinhvienModel = $this->model('sinhvienModel');
    //gán kết quả trả về từ phương thức paging vào biến $sinhviens và $totalPages
    [$sinhviens, $totalPages] = $sinhvienModel->paging($limit, $offset);
   
    //chuẩn bị dữ liệu để truyền sang view
    $data['title']       = 'Danh sách sinh viên';
    $data['sinhviens']   = $sinhviens;
    $data['currentPage'] = $currentPage;
    $data['totalPages']  = $totalPages;
    $data['viewname']    = 'sinhvien/index';

    //gọi phương thức view để hiển thị trang danh sách sinh viên, truyền dữ liệu đã chuẩn bị vào view
    $this->view('layout/masterlayout', $data);
    }
    public function create(){
        //trả về trang tạo sinh viên
        $this->view('sinhvien/create');
    }
    public function store(){
        if (isset($_POST['hoten'], $_POST['mssv'], $_POST['gioitinh'])) {
            $hoten    = $_POST['hoten'];
            $mssv     = $_POST['mssv'];
            $gioitinh = $_POST['gioitinh'];

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->addSinhVien($hoten, $mssv, $gioitinh);
            if ($result) {
                // đếm tổng số SV để tính trang cuối
                $total      = $sinhvienModel->countSinhVien();
                $limit      = 10;
                $lastPage   = ceil($total / $limit);
                header('Location: /sinhvien/index?page=' . $lastPage);
                exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    } 
    

    
}
