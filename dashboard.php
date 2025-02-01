<?php
include 'database.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

// Proses update status jika ada request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update status dan tanggal selesai
    if ($status === 'selesai') {
        $tanggal_selesai = date('Y-m-d H:i:s');
        $query = "UPDATE form_pengaduan SET status = '$status', tanggal_selesai = '$tanggal_selesai' WHERE id = $id";
    } else {
        $query = "UPDATE form_pengaduan SET status = '$status', tanggal_selesai = NULL WHERE id = $id";
    }

    if (!mysqli_query($conn, $query)) {
        die("Error saat update status: " . mysqli_error($conn));
    }
}

// Ambil data dari database dengan pengecekan
$query = "SELECT * FROM form_pengaduan";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error saat mengambil data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #eef2f3;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar h1 {
            font-size: 1.5em;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1em;
            background: #e74c3c;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .navbar a:hover {
            background: #c0392b;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .pengaduan-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .pengaduan-item:hover {
            transform: scale(1.02);
        }

        .status-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .status-buttons button {
            padding: 10px 16px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .pending { background-color: #f39c12; color: white; }
        .diterima { background-color: #3498db; color: white; }
        .selesai { background-color: #27ae60; color: white; }

        .status-buttons button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1><img src="logo.png" alt="Logo PUSRI"> Helpdesk TI PT. Pupuk Sriwidjaja</h1>
        <a href="homeadmin.php">Halaman Utama</a>
    </div>
    <div class="container">
        <h2 style="text-align: center; grid-column: span 2;">Pengaduan Pengguna</h2>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="pengaduan-item">
                <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
                <p><strong>Unit Kerja:</strong> <?= htmlspecialchars($row['unit']) ?></p>
                <p><strong>No Badge:</strong> <?= htmlspecialchars($row['badge']) ?></p>
                <p><strong>Deskripsi:</strong> <?= htmlspecialchars($row['description']) ?></p>
                <p><strong>Status:</strong> <?= ucfirst(htmlspecialchars($row['status'])) ?></p>
                <p><strong>Tanggal Pencatatan:</strong> <?= date('d-m-Y H:i:s', strtotime($row['created_at'])) ?></p>
                <p><strong>Tanggal Selesai:</strong> <?= $row['tanggal_selesai'] ? date('d-m-Y H:i:s', strtotime($row['tanggal_selesai'])) : '-' ?></p>
                <p><strong>Foto/Dokumen:</strong>
                        <?php if (!empty($row['file_dokumen'])): ?>
                            <a href="uploads/<?php echo htmlspecialchars($row['file_dokumen']); ?>" class="btn btn-primary btn-sm mb-2" download>Download Foto</a>
                        <?php else: ?>
                            <p class="text-muted">Tidak ada foto tersedia.</p>
                        <?php endif; ?>
                </p>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="status-buttons">
                        <button type="submit" name="status" value="pending" class="pending">Pending</button>
                        <button type="submit" name="status" value="diterima" class="diterima">Diterima</button>
                        <button type="submit" name="status" value="selesai" class="selesai">Selesai</button>
                    </div>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
