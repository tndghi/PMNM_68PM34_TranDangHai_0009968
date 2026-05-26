<?php
class connectDB {
    private $host = 'localhost';
    private $dbName = '68pm34';
    private $username = 'root';
    private $password = '123456';
    private $conn;

    public function connect() {
        $this->conn = null; //xóa hết dữ liệu cũ
        try {
            //thiết lập kết nối với cơ sở dữ liệu sử dụng PDO
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
            // $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
            //thiết lập chế độ lỗi của PDO thành ngoại lệ
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại. Vui lòng thử lại! " . $e->getMessage();
        }
        return $this->conn;
    }
}