<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Biodata</title>
    <!-- Google Font: Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #e8f4fd 0%, #fde8ef 100%);
            min-height: 100vh;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1rem;
        }
        .form-card {
            background: #ffffff;
            border-radius: 26px;
            border: none;
            box-shadow: 0 15px 35px rgba(189, 224, 254, 0.4);
            overflow: hidden;
            width: 100%;
            max-width: 620px;
        }
        .form-card-header {
            background: linear-gradient(135deg, #bde0fe 0%, #ffc8dd 100%);
            padding: 2rem 2.5rem 1.75rem;
            text-align: center;
        }
        .badge-tag {
            background: rgba(255, 255, 255, 0.7);
            color: #2b557d;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 0.5rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .form-card-header h3 {
            font-weight: 800;
            color: #1e3a5f;
            margin-bottom: 0.25rem;
        }
        .form-card-header p {
            color: #475569;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        .form-card-body {
            padding: 2.5rem;
        }
        .form-label {
            font-weight: 700;
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.4rem;
        }
        .form-control, .form-select {
            background-color: #f8fbff;
            border: 1.5px solid #dcebfa;
            border-radius: 14px;
            padding: 0.75rem 1.15rem;
            font-size: 0.95rem;
            color: #334155;
            transition: all 0.25s ease;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: #ffafcc;
            box-shadow: 0 0 0 4px rgba(255, 175, 204, 0.28);
            outline: none;
        }
        .btn-pastel-submit {
            background: linear-gradient(135deg, #ffafcc 0%, #ff8fab 100%);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.75rem 2rem;
            box-shadow: 0 4px 15px rgba(255, 175, 204, 0.45);
            transition: all 0.25s ease;
        }
        .btn-pastel-submit:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 143, 171, 0.55);
        }
        .btn-pastel-cancel {
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.75rem 1.75rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }
        .btn-pastel-cancel:hover {
            background-color: #e2e8f0;
            color: #334155;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="form-card">
        <div class="form-card-header">
            <h3>Edit Data</h3>
        </div>

        <div class="form-card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($user['nama']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($user['alamat']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat, Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" class="form-control" value="<?= htmlspecialchars($user['tempat_tanggal_lahir']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" <?= ($user['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= ($user['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Agama</label>
                    <?php 
                    $daftar_agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                    ?>
                    <select name="agama" class="form-select" required>
                        <option value="">Pilih Agama</option>
                        <?php foreach ($daftar_agama as $ag): ?>
                            <option value="<?= $ag; ?>" <?= ($user['agama'] == $ag) ? 'selected' : ''; ?>><?= $ag; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2">
                    <a href="index.php" class="btn-pastel-cancel">Kembali</a>
                    <button type="submit" class="btn-pastel-submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>