<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #FFF8E1, #FFECB3);
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            border-radius: 20px;
            border: none;
        }

        .card-header-custom {
            background: linear-gradient(135deg, #FFD54F, #FBC02D);
            color: black;
            border-radius: 20px 20px 0 0;
            padding: 15px;
        }

        .btn-custom {
            background-color: #FBC02D;
            color: black;
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-custom:hover {
            background-color: #F9A825;
            color: black;
        }

        .btn-back {
            border-radius: 10px;
        }

        .btn-custom {
    background: linear-gradient(135deg, #FBC02D, #F9A825);
    color: black;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    padding: 8px 18px;
    transition: 0.3s ease;
}

.btn-custom:hover {
    background: linear-gradient(135deg, #F9A825, #F57F17);
    color: black;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}
    </style>
</head>
<body>

<div class="container mt-5" style="max-width:600px;">
    <div class="card shadow card-custom">
        
        <div class="card-header-custom">
            <h5 class="mb-0">Edit Aspirasi</h5>
        </div>

        <div class="card-body p-4">

            <form method="POST" action="Index.php?controller=SiswaController&action=update">
                
                <input type="hidden" name="id" value="<?= $aspirasi['id_aspirasi']; ?>">

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control"
                           value="<?= $aspirasi['judul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Aspirasi</label>
                    <textarea name="isi" class="form-control" rows="4" required><?= $aspirasi['isi']; ?></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="Index.php?controller=SiswaController&action=histori" 
                       class="btn btn-secondary btn-back">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-custom">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>