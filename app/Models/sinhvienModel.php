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

    public function getAllSinhVien() {
        $sql = "SELECT * FROM sinhvien";
        try {
            //chuẩn bị và thực thi truy vấn SQL
            $stmt = $this->conn->prepare($sql);
            //thực thi truy vấn và trả về kết quả dưới dạng mảng kết hợp
            $stmt->execute();
            //trả về tất cả kết quả dưới dạng mảng kết hợpq
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }
}
?>