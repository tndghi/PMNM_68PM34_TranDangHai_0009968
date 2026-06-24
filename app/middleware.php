<?php
class middleware {
    public function checkLogin() {
        $url = trim($_GET['url'] ?? '', '/');
        if (!isset($_SESSION['username']) && $url !== 'auth/login' && $url !== 'auth/loginProcess') {
            header('Location: /auth/login');
            exit();
        }
    }
}
?>