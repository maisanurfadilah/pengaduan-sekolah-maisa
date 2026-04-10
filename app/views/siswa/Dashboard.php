<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Siswa</title>

<link rel="stylesheet" href="public/css/style.css?v=2">

<style>

/* ===== LAYOUT UTAMA ===== */
.dashboard {
    display: flex;
    min-height: 100vh;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 230px;
    background: linear-gradient(180deg,#ffd43b,#ffb703);
    padding: 25px;
    color: white;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

/* ===== CONTENT ===== */
.main-content {
    flex: 1;
    padding: 40px;
    background: #fff8db;
}

/* ===== BANNER ===== */
.banner {
    background: linear-gradient(135deg,#fff3b0,#ffe066);
    padding: 25px;
    border-radius: 18px;
    margin-bottom: 30px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* ===== GRID MENU ===== */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
    gap: 20px;
}

.menu-card {
    background: white;
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.menu-card:hover {
    transform: translateY(-5px);
}

.menu-card h3 {
    margin-bottom: 10px;
    color: #b8860b;
}

.menu-card p {
    font-size: 14px;
    margin-bottom: 15px;
}

</style>

</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2> Siswa Panel</h2>

        <a href="#"> Dashboard</a>

        <a href="Index.php?controller=AspirasiController&action=tambah">
             Tambah Aspirasi
        </a>

        <a href="Index.php?controller=SiswaController&action=histori">
             Histori Aspirasi
        </a>

        <a href="Index.php?controller=LoginController&action=logout">
             Logout
        </a>
    </div>


    <!-- CONTENT -->
    <div class="main-content">

        <!-- BANNER -->
        <div class="banner">
            <h2>Halo, <?= $_SESSION['user']['nama']; ?> </h2>
            <p>
                Selamat datang di sistem pengaduan sarana prasarana sekolah.
                Kamu bisa mengirim aspirasi dan memantau status laporanmu di sini.
            </p>
        </div>


        <!-- MENU GRID -->
        <div class="menu-grid">

            <div class="menu-card">
                <h3> Buat Aspirasi</h3>
                <p>Kirim laporan fasilitas sekolah yang perlu diperbaiki.</p>

                <a class="btn btn-primary"
                   href="Index.php?controller=AspirasiController&action=tambah">
                   Buat Sekarang
                </a>
            </div>


            <div class="menu-card">
                <h3> Lihat Histori</h3>
                <p>Lihat perkembangan laporan yang sudah kamu kirim.</p>

                <a class="btn btn-secondary"
                   href="Index.php?controller=SiswaController&action=histori">
                   Cek Histori
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>