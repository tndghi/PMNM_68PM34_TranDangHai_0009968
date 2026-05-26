<?php
class auth{
    //khai báo dữ liệu ảo 
    private $users = [
        ['username' => 'user1', 'password' => 'pass1'],
        ['username' => 'user2', 'password' => 'pass2'],
    ];

    public function loginProcess(){
    //xử lý đăng nhập với session
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            //xử lý đăng nhập ở đây, ví dụ kiểm tra username và password trong database
            foreach ($this->users as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    //nếu đăng nhập thành công, lưu thông tin người dùng vào session
                    session_start();
                    $_SESSION['username'] = $username;
                    //chuyển hướng đến trang dashboard hoặc trang chính sau khi đăng nhập thành công
                    header("Location: /home/index");
                    return;
                }
            }
            //nếu đăng nhập thất bại, chuyển hướng về trang login
            header("Location: /home/login");
        } else {
            //nếu không có dữ liệu đăng nhập, chuyển hướng về trang login
            header("Location: /home/login");
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header("Location: /home/login");
        exit();
    }
    
}
?>