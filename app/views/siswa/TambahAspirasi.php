<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --kuning-utama: #F4B400;
            --kuning-soft: #FFF3CD;
            --krem-bg: #F8F5E9;
            --card-bg: rgba(255, 255, 255, 0.7);
        }

        body {
            background: linear-gradient(135deg, #F8F5E9, #EFE3B5);
            font-family: 'Poppins', sans-serif;
        }

        .container-box {
            max-width: 600px;
            margin: auto;
            margin-top: 60px;
        }

        /* Header elegan */
        .header-box {
            background: linear-gradient(135deg, #F7D774, #F4B400);
            padding: 25px;
            border-radius: 20px;
            color: #333;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        /* Card glass effect */
        .form-box {
            margin-top: -30px;
            backdrop-filter: blur(10px);
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* Input */
        .form-control {
            border-radius: 12px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .form-control:focus {
            border-color: var(--kuning-utama);
            box-shadow: 0 0 0 0.2rem rgba(244,180,0,0.2);
        }

        /* Button elegan */
        .btn-custom {
            background: linear-gradient(135deg, #F4B400, #e0a800);
            color: white;
            border-radius: 30px;
            padding: 12px;
            font-weight: bold;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        label {
            font-weight: 500;
        }
    </style>
</head>

<body>

<div class="container-box">

    <!-- Header -->
    <div class="header-box">
        <h4><b>Tambah Aspirasi</b></h4>
        <p class="mb-0">Sampaikan pendapat atau laporanmu dengan jelas dan sopan.</p>
    </div>

    <!-- Form -->
    <div class="form-box">

        <form method="POST" action="Index.php?controller=AspirasiController&action=simpan">

            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori'] ?>">
                            <?= $k['nama_kategori'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Contoh: Kursi rusak di kelas..." required>
            </div>

            <div class="mb-3">
                <label>Isi Aspirasi</label>
                <textarea name="isi" class="form-control" rows="4" placeholder="Jelaskan secara detail..." required></textarea>
            </div>

            <button type="submit" class="btn btn-custom w-100">
                Kirim Aspirasi
            </button>

        </form>

    </div>

</div>

</body>
</html>