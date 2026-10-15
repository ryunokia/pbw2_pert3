<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Biodata</title>
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
            padding-bottom: 3rem;
        }
        .main-card {
            background: #ffffff;
            border-radius: 22px;
            border: none;
            box-shadow: 0 10px 30px rgba(189, 224, 254, 0.35);
            padding: 1.75rem;
            margin-top: 1rem;
        }
        .page-title {
            font-weight: 800;
            color: #243c5a;
            font-size: 1.75rem;
            letter-spacing: -0.02em;
        }
        .btn-pastel-pink {
            background: linear-gradient(135deg, #ffafcc 0%, #ff8fab 100%);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            padding: 0.65rem 1.5rem;
            box-shadow: 0 4px 14px rgba(255, 175, 204, 0.45);
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-pastel-pink:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(255, 143, 171, 0.55);
        }
        .search-input {
            border: 1.5px solid #dcebfa;
            background-color: #ffffff;
            border-radius: 50px;
            padding: 0.55rem 1.25rem;
            font-size: 0.9rem;
            color: #334155;
            outline: none;
            transition: all 0.25s ease;
            width: 230px;
        }
        .search-input:focus {
            border-color: #ffafcc;
            box-shadow: 0 0 0 3px rgba(255, 175, 204, 0.25);
        }
        .btn-pastel-search {
            background: linear-gradient(135deg, #a2d2ff 0%, #bde0fe 100%);
            color: #1a4269;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 0.55rem 1.35rem;
            box-shadow: 0 3px 10px rgba(162, 210, 255, 0.35);
            transition: all 0.2s ease;
        }
        .btn-pastel-search:hover {
            background: linear-gradient(135deg, #90c7fc 0%, #aed8fd 100%);
            transform: translateY(-1px);
        }
        .btn-pastel-reset {
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.55rem 1rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }
        .btn-pastel-reset:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        .table-custom thead th {
            background-color: #e8f4fd;
            color: #2b557d;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 1rem 1.1rem;
            border-bottom: 2px solid #cfe5f8;
            border-top: none;
        }
        .table-custom thead th:first-child {
            border-top-left-radius: 14px;
        }
        .table-custom thead th:last-child {
            border-top-right-radius: 14px;
        }
        .table-custom tbody td {
            padding: 1rem 1.1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
            color: #475569;
        }
        .table-custom tbody tr:hover {
            background-color: #fbfdff;
        }
        .btn-pastel-blue {
            background-color: #bde0fe;
            color: #1e4d77;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.4rem 1rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-pastel-blue:hover {
            background-color: #a2d2ff;
            color: #123759;
            transform: translateY(-1px);
        }
        .btn-pastel-danger {
            background-color: #ffc8dd;
            color: #8c2a4f;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.4rem 1rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-pastel-danger:hover {
            background-color: #ffafcc;
            color: #6e1c3b;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Title & Action Row -->
        <div class="mb-3">
            <h2 class="page-title mb-3">Data Biodata</h2>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <!-- Tombol Tambah Data tepat di bawah tulisan Data Biodata -->
                <div>
                    <a href="index.php?action=create" class="btn-pastel-pink">Tambah Data</a>
                </div>
                <!-- Fitur Search di sebelah kanan sejajar dengan Tambah Data -->
                <div>
                    <form method="GET" action="index.php" class="d-flex gap-2 align-items-center">
                        <input type="text" name="search" id="searchInput" class="search-input" placeholder="Cari data..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">
                        <button type="submit" class="btn-pastel-search">Cari</button>
                        <?php if (!empty($_GET['search'])): ?>
                            <a href="index.php" class="btn-pastel-reset">Reset</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="main-card">
            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th style="width: 170px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        $hasData = false;
                        while($row = $result->fetch(PDO::FETCH_ASSOC)): 
                            $hasData = true;
                        ?>
                        <tr>
                            <td class="fw-bold" style="color: #94a3b8;"><?= $no++; ?></td>
                            <td class="fw-bold" style="color: #1e293b;"><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                            <td><?= htmlspecialchars($row['tempat_tanggal_lahir']); ?></td>
                            <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                            <td><?= htmlspecialchars($row['agama']); ?></td>
                            <td style="text-align: center;">
                                <a href="index.php?action=edit&id=<?= $row['id']; ?>" class="btn-pastel-blue">Edit</a>
                                <a href="index.php?action=delete&id=<?= $row['id']; ?>" class="btn-pastel-danger" onclick="return confirm('Yakin dihapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                        <?php if (!$hasData): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 2rem; color: #94a3b8; font-weight: 600;">
                                <?= !empty($_GET['search']) ? 'Data dengan kata kunci "' . htmlspecialchars($_GET['search']) . '" tidak ditemukan.' : 'Belum ada data biodata.'; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>