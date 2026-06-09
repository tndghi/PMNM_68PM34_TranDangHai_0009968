<?php
require_once '../app/Core/DB.php';
class sinhvienModel{
    //thuộc tính để lưu kết nối cơ sở dữ liệu
    private $conn;
    //phương thức khởi tạo để thiết lập kết nối cơ sở dữ liệu khi tạo đối tượng của lớp
    public function __construct() {
        //khởi tạo kết nối cơ sở dữ liệu
        $db = new connectDB();
        //gán kết nối vào thuộc tính $conn của lớp
        $this->conn = $db->connect();
    }

    public function countSinhVien() {
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
    $stmt->execute();
    return $stmt->fetchColumn();
    }

    // public function getAllSinhVien() {
    //     $sql = "SELECT * FROM sinhvien";
    //     try {
    //         //chuẩn bị và thực thi truy vấn SQL
    //         $stmt = $this->conn->prepare($sql);
    //         //thực thi truy vấn và trả về kết quả dưới dạng mảng kết hợp
    //         $stmt->execute();
    //         //trả về tất cả kết quả dưới dạng mảng kết hợpq
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Lỗi truy vấn: " . $e->getMessage();
    //         return [];
    //     }
    // }

    //phương thức để thêm một sinh viên mới vào cơ sở dữ liệu
    public function addSinhVien($hoten, $mssv, $gioitinh) {
        $sql = "INSERT INTO sinhvien (hoten, mssv, gioitinh) VALUES (:hoten, :mssv, :gioitinh)";
        try {
            //chuẩn bị truy vấn SQL
            $stmt = $this->conn->prepare($sql);
            //liên kết các tham số với giá trị tương ứng
            $stmt->bindParam(':hoten', $hoten);
            $stmt->bindParam(':mssv', $mssv);
            $stmt->bindParam(':gioitinh', $gioitinh);
            //thực thi truy vấn
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function paging ($limit = 6, $offset = 0 ){
        $sql = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
        try {
            //chuẩn bị truy vấn SQL
            $stmt = $this->conn->prepare($sql);
            //liên kết các tham số với giá trị tương ứng
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            //thực thi truy vấn và trả về kết quả dưới dạng mảng kết hợp
            $stmt->execute();
            //tính tổng số trang dựa trên tổng số sinh viên và số sinh viên hiển thị trên mỗi trang
            $countSql = "SELECT COUNT(*) FROM sinhvien";
            $countStmt = $this->conn->prepare($countSql);
            $countStmt->execute();
            $totalRecords = $countStmt->fetchColumn();
            $totalPages = ceil($totalRecords / $limit); 
            return [$stmt->fetchAll(PDO::FETCH_ASSOC), $totalPages];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [[], 0];
        }
    }  
 
    public function getSinhVienById($id) {
        $sql = "SELECT * FROM sinhvien WHERE id = :id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null;
        }
    }

    public function deleteSinhVien($id) {
        $sql = "DELETE FROM sinhvien WHERE id = :id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function updateSinhVien($id, $hoten, $mssv, $gioitinh) {
    $sql = "UPDATE sinhvien SET hoten=:hoten, mssv=:mssv, gioitinh=:gioitinh WHERE id=:id";
    try {
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',       $id,       PDO::PARAM_INT);
        $stmt->bindParam(':hoten',    $hoten);
        $stmt->bindParam(':mssv',     $mssv);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}
}