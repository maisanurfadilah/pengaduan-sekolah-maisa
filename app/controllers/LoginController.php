<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/models/UserModel.php';

class LoginController {

    // menampilkan halaman login
    public function index() {
        include 'app/views/Login.php';
    }

    // proses login
    public function proses() {

        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header("Location: Index.php");
            exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $model = new UserModel();
        $user = $model->login($username, $password); // cocokkan langsung tanpa hash

        if ($user) {

            // simpan data user ke session
            $_SESSION['user'] = $user;
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            // redirect berdasarkan role
            if ($user['role'] == 'admin') {
                header("Location: Index.php?controller=AdminController&action=dashboard");
            } else {
                header("Location: Index.php?controller=SiswaController&action=dashboard");
            }
            exit;
        }

        // jika login gagal
        $_SESSION['error'] = "Username atau Password salah!";
        header("Location: Index.php");
        exit;
    }

    // logout
    public function logout() {

        session_unset();
        session_destroy();

        header("Location: Index.php");
        exit;
    }
}