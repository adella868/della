<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $status = isset($_POST['status']) ? trim($_POST['status']) : '';

    // Validasi input
    if ($id > 0 && !empty($status)) {
        $query = "UPDATE form_pengaduan SET status = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            // Bind parameter
            mysqli_stmt_bind_param($stmt, "si", $status, $id);

            // Eksekusi query
            if (mysqli_stmt_execute($stmt)) {
                echo "
                <!DOCTYPE html>
                <html lang='id'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Status Berhasil Diperbarui</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            margin: 0;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }
                        .container {
                            text-align: center;
                            padding: 20px;
                            background: #4CAF50;
                            color: white;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            max-width: 400px;
                        }
                        .container h1 {
                            font-size: 2em;
                            margin-bottom: 10px;
                        }
                        .container p {
                            margin: 15px 0;
                        }
                        .container a {
                            display: inline-block;
                            padding: 10px 20px;
                            color: #4CAF50;
                            background-color: white;
                            text-decoration: none;
                            border-radius: 5px;
                            font-weight: bold;
                            transition: background 0.3s ease;
                        }
                        .container a:hover {
                            background-color: #e7e7e7;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>Status Diperbarui</h1>
                        <p>Status untuk ID <strong>$id</strong> berhasil diperbarui menjadi <strong>$status</strong>.</p>
                        <a href='dashboard.php'>Kembali ke Dashboard</a>
                    </div>
                </body>
                </html>";
                exit;
            } else {
                echo "Gagal memperbarui status: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal menyiapkan pernyataan: " . mysqli_error($conn);
        }
    } else {
        echo "
        <!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8d7da;
                    margin: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .error-container {
                    text-align: center;
                    padding: 20px;
                    background: #f5c6cb;
                    color: #721c24;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                }
                .error-container h1 {
                    font-size: 1.8em;
                    margin-bottom: 10px;
                }
                .error-container p {
                    margin: 15px 0;
                }
                .error-container a {
                    display: inline-block;
                    padding: 10px 20px;
                    color: #721c24;
                    background-color: #f8d7da;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                    transition: background 0.3s ease;
                }
                .error-container a:hover {
                    background-color: #f1b0b7;
                }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>Error</h1>
                <p>Data tidak valid. Pastikan semua kolom diisi dengan benar.</p>
                <a href='dashboard.php'>Kembali ke Dashboard</a>
            </div>
        </body>
        </html>";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
