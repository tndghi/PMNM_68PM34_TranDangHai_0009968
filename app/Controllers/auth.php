<?php
require_once '../app/middleware.php';

class auth {
    private $users = [
        ['username' => 'user1', 'password' => 'pass1'],
        ['username' => 'user2', 'password' => 'pass2'],
    ];

    public function login() {
        require_once '../app/Views/home/login.php';
    }

    public function loginProcess() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        foreach ($this->users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                $_SESSION['username'] = $username;
                header('Location: /home/index');
                exit();
            }
        }
        header('Location: /auth/login');
        exit();
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: /auth/login');
        exit();
    }
}
?>