<?php
require_once '../app/Core/Controller.php';
require_once '../app/middleware.php';

class sinhvien extends Controller {

    private $limit = 6;

    private function auth() {
        $middleware = new middleware();
        $middleware->checkLogin();
    }

    public function index() {
        $this->auth();
        $currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $keyword     = trim($_GET['keyword']   ?? '');
        $malop       = trim($_GET['malop']     ?? '');
        $sortBy      = $_GET['sortBy']         ?? 'hoten';
        $sortOrder   = $_GET['sortOrder']      ?? 'ASC';
        $pageSize    = isset($_GET['pageSize']) ? max(1, (int)$_GET['pageSize']) : 6;
        $offset      = ($currentPage - 1) * $pageSize; 

        $sinhvienModel = $this->model('sinhvienModel');

        $sinhviens    = $sinhvienModel->search($keyword, $malop, $sortBy, $sortOrder, $pageSize, $offset);
        $totalRecords = $sinhvienModel->countSearch($keyword, $malop);
        $totalPages   = $totalRecords > 0 ? ceil($totalRecords / $pageSize) : 1;
        $danhSachLop  = $sinhvienModel->getAllLop();

        if ($currentPage > $totalPages) {
            header('Location: /sinhvien/index?page=' . $totalPages . '&keyword=' . urlencode($keyword) . '&malop=' . urlencode($malop) . '&pageSize=' . $pageSize);
            exit();
        }

        $this->view('layout/masterlayout', [
            'title'       => 'Danh sách sinh viên',
            'sinhviens'   => $sinhviens,
            'currentPage' => $currentPage,
            'totalPages'  => $totalPages,
            'offset'      => $offset,
            'keyword'     => $keyword,
            'malop'       => $malop,
            'sortBy'      => $sortBy,
            'sortOrder'   => $sortOrder,
            'danhSachLop' => $danhSachLop,
            'pageSize'    => $pageSize, 
            'viewname'    => 'sinhvien/index',
        ]);
    }

    public function create() {
        $this->auth();
        $page          = $_GET['page'] ?? 1;
        $sinhvienModel = $this->model('sinhvienModel');
        $danhSachLop   = $sinhvienModel->getAllLop();
        require_once '../app/Views/sinhvien/create.php';
    }

    public function store() {
        $this->auth();
        if (isset($_POST['hoten'], $_POST['mssv'], $_POST['gioitinh'])) {
            $hoten    = trim($_POST['hoten']);
            $mssv     = trim($_POST['mssv']);
            $gioitinh = $_POST['gioitinh'];
            $malop    = !empty($_POST['malop']) ? trim($_POST['malop']) : null;

            $sinhvienModel = $this->model('sinhvienModel');

            if ($sinhvienModel->isMssvExists($mssv)) {
                $danhSachLop = $sinhvienModel->getAllLop();
                $error = "MSSV '$mssv' đã tồn tại, vui lòng nhập MSSV khác.";
                $page  = $_GET['page'] ?? 1;
                require_once '../app/Views/sinhvien/create.php';
                return;
            }

            $result = $sinhvienModel->addSinhVien($hoten, $mssv, $gioitinh, $malop);
            if ($result) {
                $total    = $sinhvienModel->countSinhVien();
                $lastPage = ceil($total / $pageSize);
                header('Location: /sinhvien/index?page=' . $lastPage);
                exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }

    public function edit($id) {
        $this->auth();
        $page          = $_GET['page'] ?? 1;
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien      = $sinhvienModel->getSinhVienById($id);
        $danhSachLop   = $sinhvienModel->getAllLop();

        $this->view('sinhvien/edit', [
            'sinhvien'    => $sinhvien,
            'page'        => $page,
            'danhSachLop' => $danhSachLop,
        ]);
    }

    public function delete($id) {
        $this->auth();
        $page          = $_GET['page'] ?? 1;
        $sinhvienModel = $this->model('sinhvienModel');
        $result        = $sinhvienModel->deleteSinhVien($id);

        if ($result) {
            $total      = $sinhvienModel->countSinhVien();
            $totalPages = ceil($total / $this->limit) ?: 1;
            $page       = min($page, $totalPages);

            header('Location: /sinhvien/index?page=' . $page);
            exit();
        } else {
            echo "Lỗi khi xóa sinh viên.";
        }
    }

    public function update() {
        $this->auth();
        if (isset($_POST['id'], $_POST['hoten'], $_POST['mssv'], $_POST['gioitinh'])) {
            $id       = (int)$_POST['id'];
            $hoten    = trim($_POST['hoten']);
            $mssv     = trim($_POST['mssv']);
            $gioitinh = $_POST['gioitinh'];
            $malop    = !empty($_POST['malop']) ? trim($_POST['malop']) : null;
            $page     = $_POST['page'] ?? 1;

            $sinhvienModel = $this->model('sinhvienModel');

            if ($sinhvienModel->isMssvExists($mssv, $id)) {
                $sinhvien    = $sinhvienModel->getSinhVienById($id);
                $danhSachLop = $sinhvienModel->getAllLop();
                $error = "MSSV '$mssv' đã tồn tại, vui lòng nhập MSSV khác.";
                require_once '../app/Views/sinhvien/edit.php';
                return;
            }

            $result = $sinhvienModel->updateSinhVien($id, $hoten, $mssv, $gioitinh, $malop);
            if ($result) {
                header('Location: /sinhvien/index?page=' . $page);
                exit();
            } else {
                echo "Lỗi khi cập nhật sinh viên.";
            }
        }
    }
}