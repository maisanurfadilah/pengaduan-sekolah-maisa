<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #F9F6EC, #EFE3B5);
    font-family: 'Poppins', sans-serif;
}

/* Container */
.container-box {
    max-width: 1100px;
    margin: auto;
    margin-top: 40px;
}

/* Header */
.header {
    background: linear-gradient(135deg, #FDE9A9, #F4B400);
    padding: 20px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Card */
.card-box {
    background: rgba(255,255,255,0.9);
    border-radius: 20px;
    padding: 25px;
    margin-top: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Input */
input, select {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
}

input:focus, select:focus {
    border-color: #F4B400;
    box-shadow: 0 0 0 0.1rem rgba(244,180,0,0.3);
}

/* Button */
.btn-custom {
    background: linear-gradient(135deg, #F4B400, #d89c00);
    color: white;
    border-radius: 25px;
    padding: 10px 20px;
    border: none;
}

.btn-custom:hover {
    transform: translateY(-2px);
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

thead {
    background: #F4B400;
    color: white;
}

th, td {
    padding: 12px;
    text-align: left;
}

tbody tr {
    background: white;
    border-bottom: 1px solid #eee;
    transition: 0.2s;
}

tbody tr:hover {
    background: #fff8dc;
}

/* Status */
.status {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 12px;
}

.status.diproses { background: #ffc107; }
.status.selesai { background: #28a745; color: white; }
.status.ditolak { background: #dc3545; color: white; }
</style>
</head>

<body>

<div class="container-box">

    <!-- HEADER -->
    <div class="header">
        <h4>Dashboard Admin</h4>
        <a class="btn btn-danger"
           href="Index.php?controller=LoginController&action=logout">
           Logout
        </a>
    </div>

    <!-- FILTER -->
    <div class="card-box">
        <h5>Filter Aspirasi</h5>

        <form method="get" action="Index.php">
            <input type="hidden" name="controller" value="AdminController">
            <input type="hidden" name="action" value="dashboard">

            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $_GET['tanggal'] ?? '' ?>">

            <label>Kategori</label>
            <select name="kategori">
                <option value="">-- Semua --</option>
                <?php foreach ($kategoriList as $k): ?>
                <option value="<?= $k['id_kategori']; ?>"
                    <?= (isset($_GET['kategori']) && $_GET['kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <label>Siswa</label>
            <select name="siswa">
                <option value="">-- Semua --</option>
                <?php foreach ($siswaList as $s): ?>
                <option value="<?= $s['id_user']; ?>"
                    <?= (isset($_GET['siswa']) && $_GET['siswa'] == $s['id_user']) ? 'selected' : '' ?>>
                    <?= $s['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <button class="btn btn-custom mt-2" type="submit">
                Filter Data
            </button>
        </form>
    </div>

    <!-- TABLE -->
    <div class="card-box">
        <h5>Data Aspirasi Siswa</h5>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Siswa</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (count($aspirasi) > 0): ?>
                <?php foreach ($aspirasi as $a): ?>
                <tr>
                    <td><?= $a['tanggal']; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['nama_kategori']; ?></td>
                    <td><?= $a['judul']; ?></td>

                    <td>
                        <span class="status <?= strtolower($a['status']); ?>">
                            <?= $a['status']; ?>
                        </span>
                    </td>

                    <td>
                        <a class="btn btn-sm btn-warning"
                           href="Index.php?controller=AdminController&action=detail&id=<?= $a['id_aspirasi']; ?>">
                           Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Tidak ada data ditemukan
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>