<?php
require_once 'Koneksi.php';

class UserModel extends Koneksi {

    public function login($username, $password) {

        // Pastikan koneksi tersedia
        if (!$this->conn) {
            return false;
        }

        // Amankan input
        $username = $this->conn->real_escape_string(trim($username));
        $password = $this->conn->real_escape_string(trim($password));

        $query = "SELECT * FROM users 
                  WHERE username='$username' 
                  AND password='$password'
                  LIMIT 1";

        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return false;
    }
}