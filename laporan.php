<?php
include 'database.php';

// Ambil data dari tabel form_pengaduan
$sql = "SELECT * FROM form_pengaduan";
$result = mysqli_query($conn, $sql);

// Jika ada ID yang diterima, maka tampilkan halaman cetak untuk pengaduan tertentu
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM form_pengaduan WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($row) ? 'Cetak Laporan Pengaduan' : 'Laporan Pengaduan Selesai' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f8ff;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #f9f9f9;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo-container {
            display: flex;
            align-items: center;
        }

        .navbar .logo {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .navbar .title {
            font-size: 24px;
            font-weight: 700;
            color: black;
            text-transform: uppercase;
        }

        .navbar .menu a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar .menu a:hover {
            background-color: #2980b9;
        }

        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background: #2c3e50;
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        table td {
            font-size: 14px;
            color: #555;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:hover {
            background: #f1f1f1;
            cursor: pointer;
        }

        .status {
            font-weight: bold;
        }

        .status.diterima {
            color: #f39c12;
        }

        .status.selesai {
            color: #27ae60;
        }

        .status.pending {
            color: #e74c3c;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-print {
            background-color: #2ecc71;
            text-align: center;
            font-weight: bold;
        }

        .btn-print:hover {
            background-color: #27ae60;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        /* Styles for Print Page */
        .content {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #2c3e50;
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        .table td {
            font-size: 14px;
            color: #555;
        }

        .status.selesai {
            color: #27ae60;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .btn {
                display: none;
            }

            .navbar {
                display: none;
            }
        }
    </style>
    <script>
        function printData(id) {
            window.location.href = `?id=${id}`;
        }

        window.onload = function () {
            if (window.location.search.includes('id')) {
                window.print();
            }
        };
    </script>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <div class="logo-container">
            <img src="logo.png" alt="Logo" class="logo"> 
            <span class="title">Laporan Pengaduan</span>
        </div>
        <div class="menu">
            <a href="home.php">Halaman Utama</a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container">
        <?php if (isset($row)): ?>
            <h1>Cetak Laporan Pengaduan</h1>
            <div class="content">
                <div class="logo-container">
                    <img src="logo.png" alt="Logo">
                </div>
                <h2>Laporan Pengaduan</h2>

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td><?= $row['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Unit Kerja</th>
                        <td><?= $row['unit'] ?></td>
                    </tr>
                    <tr>
                        <th>No Badge</th>
                        <td><?= $row['badge'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><?= $row['description'] ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td class="status selesai"><?= ucfirst($row['status']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pencatatan</th>
                        <td><?= date("d-m-Y H:i:s", strtotime($row['created_at'])) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td><?= $row['tanggal_selesai'] ? date("d-m-Y H:i:s", strtotime($row['tanggal_selesai'])) : '-' ?></td>
                    </tr>
                </table>
                <a href="javascript:window.print();" class="btn">Cetak Laporan</a>
            </div>
        <?php else: ?>
            <h1>Laporan Pengaduan Selesai</h1>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Unit Kerja</th>
                            <th>No Badge</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['unit'] ?></td>
                                <td><?= $row['badge'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td class="status <?= strtolower($row['status']) ?>">
                                    <?= ucfirst($row['status']) ?>
                                </td>
                                <td><?= date("d-m-Y H:i:s", strtotime($row['created_at'])) ?></td>
                                <td><?= $row['tanggal_selesai'] ? date("d-m-Y H:i:s", strtotime($row['tanggal_selesai'])) : '-' ?></td>
                                <td><button class="btn" onclick="printData(<?= $row['id'] ?>)">Cetak Laporan</button></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Tidak ada pengaduan yang ditemukan.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
