<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Aspirasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #F9F6EC, #EFE3B5);
    font-family: 'Poppins', sans-serif;
}

.container-box {
    max-width: 700px;
    margin: auto;
    margin-top: 50px;
}

/* Header */
.header {
    background: linear-gradient(135deg, #FDE9A9, #F4B400);
    padding: 20px;
    border-radius: 20px;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Card */
.card-box {
    background: rgba(255,255,255,0.9);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Status badge */
.status {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 12px;
}

.status.baru { background: #6c757d; color: white; }
.status.diproses { background: #ffc107; }
.status.selesai { background: #28a745; color: white; }

/* Feedback */
.feedback-box {
    background: #f8f9fa;
    padding: 12px;
    border-radius: 12px;
    margin-top: 10px;
}

/* Input */
input, select, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
    margin-top: 5px;
    margin-bottom: 10px;
}

input:focus, select:focus, textarea:focus {
    border-color: #F4B400;
    box-shadow: 0 0 0 0.1rem rgba(244,180,0,0.3);
}

/* Button */
.btn-custom {
    background: linear-gradient(135deg, #F4B400, #d89c00);
    color: white;
    border-radius: 25px;
    padding: 10px;
    border: none;
    width: 100%;
}

.btn-custom:hover {
    transform: translateY(-2px);
}
</style>
</head>

<body>

<div class="container-box">

    <!-- HEADER -->
    <div class="header">
        <h4>Detail Aspirasi</h4>
    </div>

    <!-- DETAIL -->
    <div class="card-box">

        <p><b>Judul:</b><br><?= $data['judul']; ?></p>

        <p><b>Isi:</b><br><?= $data['isi']; ?></p>

        <p><b>Status:</b><br>
            <span class="status <?= strtolower($data['status']); ?>">
                <?= $data['status']; ?>
            </span>
        </p>

        <?php if ($feedback): ?>
        <div class="feedback-box">
            <b>Umpan Balik:</b><br>
            <?= $feedback['pesan']; ?>
        </div>
        <?php endif; ?>

    </div>

    <!-- FORM -->
    <div class="card-box">

        <h5>Update Status & Feedback</h5>

        <form method="post" action="Index.php?controller=AdminController&action=proses">
            <input type="hidden" name="id_aspirasi" value="<?= $data['id_aspirasi']; ?>">

            <label>Status</label>
            <select name="status">
                <option value="baru">Baru</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </select>

            <label>Umpan Balik</label>
            <textarea name="pesan" rows="4" placeholder="Tulis feedback..." required></textarea>

            <button type="submit" class="btn btn-custom">
                Simpan Perubahan
            </button>
        </form>

    </div>

</div>

</body>
</html>