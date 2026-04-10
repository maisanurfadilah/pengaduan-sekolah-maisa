<?php
require_once __DIR__ . '/../models/AspirasiModel.php';

class SiswaController {

    public function dashboard() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: Index.php");
            exit;
        }

        include 'app/views/siswa/Dashboard.php';
    }

    public function histori() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
        header("Location: Index.php");
        exit;
    }

    require_once 'app/models/AspirasiModel.php';
    $model = new AspirasiModel();
    $histori = $model->getHistoriSiswa($_SESSION['user']['id_user']);

    include 'app/views/siswa/HistoriAspirasi.php';
}
public function edit()
{
    if (!isset($_GET['id'])) {
        echo "ID tidak ditemukan";
        return;
    }

    $id = $_GET['id'];

    $model = new AspirasiModel();
    $aspirasi = $model->getById($id);

    if (!$aspirasi) {
        echo "Data tidak ditemukan";
        return;
    }

    require dirname(__DIR__) . '/views/siswa/edit.php';
}
public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id    = $_POST['id'];
        $judul = $_POST['judul'];
        $isi   = $_POST['isi'];

        // Panggil Model
        require_once __DIR__ . '/../models/AspirasiModel.php';
        $model = new AspirasiModel();

        // Jalankan update
        $result = $model->updateAspirasi($id, $judul, $isi);

        if ($result) {
            // Redirect ke histori setelah berhasil
            header("Location: Index.php?controller=SiswaController&action=histori");
            exit;
        } else {
            echo "Gagal mengupdate data!";
        }
    } else {
        echo "Akses tidak valid!";
    }
}
public function updateAspirasi($id, $judul, $isi)
{
    $stmt = $this->conn->prepare("
        UPDATE aspirasi 
        SET judul = ?, isi = ? 
        WHERE id_aspirasi = ?
    ");

    return $stmt->execute([$judul, $isi, $id]);
}
}

