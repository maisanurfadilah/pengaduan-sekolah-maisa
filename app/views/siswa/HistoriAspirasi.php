<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori Aspirasi</title>

    <!-- Bootstrap + Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #F9F6EC, #EFE3B5);
            font-family: 'Poppins', sans-serif;
        }

        .container-box {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
        }

        .header {
            background: linear-gradient(135deg, #FDE9A9, #F4B400);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .card-item {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card-item:hover {
            transform: translateY(-3px);
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 12px;
            color: black;
        }

        .proses { background: #ffc107; }
        .selesai { background: #28a745; color: white; }
        .tolak { background: #dc3545; color: white; }

        .feedback {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container-box">

    <!-- Header -->
    <div class="header">
        <h4>Histori Aspirasi</h4>
        <p class="mb-0">Semua aspirasi yang sudah kamu kirim</p>
    </div>

    <!-- List -->
    <?php foreach ($histori as $h): ?>
    <div class="card-item">

        <div class="d-flex justify-content-between">
            <h5><?= $h['judul']; ?></h5>

            <!-- Status -->
            <?php if ($h['status'] == 'diproses'): ?>
                <span class="badge-status proses">Diproses</span>
            <?php elseif ($h['status'] == 'selesai'): ?>
                <span class="badge-status selesai">Selesai</span>
            <?php else: ?>
                <span class="badge-status tolak">Ditolak</span>
            <?php endif; ?>
        </div>

        <p class="mb-1"><b>Kategori:</b> <?= $h['nama_kategori']; ?></p>
        <p class="mb-1"><b>Tanggal:</b> <?= date('d-m-Y', strtotime($h['tanggal'])); ?></p>

        <!-- Tombol Ubah (khusus status diproses) -->
        <?php if ($h['status'] == 'diproses'): ?>
            <div class="text-end mt-2">
                <a href="Index.php?controller=SiswaController&action=edit&id=<?= $h['id_aspirasi']; ?>" 
                   class="btn btn-sm btn-warning">
                   ✏️ Ubah
                </a>
            </div>
        <?php endif; ?>

        <!-- Feedback -->
        <?php
        $fb = (new AspirasiModel())->getFeedback($h['id_aspirasi']);
        if ($fb):
        ?>
            <div class="feedback">
                <b>Umpan Balik:</b><br>
                <?= $fb['pesan']; ?>
            </div>
        <?php endif; ?>

    </div>
    <?php endforeach; ?>

    <a href="Index.php?controller=SiswaController&action=dashboard" class="btn btn-warning mt-3">
        ← Kembali
    </a>

</div>

</body>
</html>