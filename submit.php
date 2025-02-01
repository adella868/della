<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate user inputs
    $nama = htmlspecialchars($_POST['nama']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $unit = htmlspecialchars($_POST['unit']);
    $badge = htmlspecialchars($_POST['badge']);
    $description = htmlspecialchars($_POST['description']);
    $file_dokumen = htmlspecialchars($_POST['file_dokumen']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email tidak valid!");
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO form_pengaduan (nama, email, unit, badge, description, file_dokumen) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama, $email, $unit, $badge, $description, $file_dokumen);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Terima Kasih</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background: linear-gradient(135deg, #FFEFBA, #FFFFFF);
                    color: #333;
                }

                .thank-you-container {
                    background: #4682B4;
                    color: white;
                    padding: 40px 30px;
                    border-radius: 10px;
                    max-width: 600px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    transition: transform 0.3s ease;
                }

                .thank-you-container:hover {
                    transform: scale(1.05);
                }

                .thank-you-container h1 {
                    font-size: 3em;
                    margin-bottom: 15px;
                    font-weight: bold;
                }

                .thank-you-container p {
                    font-size: 1.2em;
                    line-height: 1.6;
                    margin-bottom: 25px;
                    text-transform: capitalize;
                }

                .thank-you-container a {
                    display: inline-block;
                    background: #DAA520;
                    color: white;
                    padding: 12px 25px;
                    text-decoration: none;
                    font-size: 1.2em;
                    border-radius: 5px;
                    transition: background 0.3s ease, transform 0.2s ease;
                }

                .thank-you-container a:hover {
                    background: #FFB84D;
                    transform: scale(1.05);
                }

                .thank-you-container a:active {
                    transform: scale(0.98);
                }

                /* Responsive Design */
                @media (max-width: 600px) {
                    .thank-you-container {
                        padding: 20px 15px;
                    }

                    .thank-you-container h1 {
                        font-size: 2.5em;
                    }

                    .thank-you-container p {
                        font-size: 1em;
                    }
                }
            </style>
        </head>
        <body>
            <div class='thank-you-container'>
                <h1>Terima Kasih!</h1>
                <p>Pengaduan Anda Telah Berhasil Dikirim. Tim Kami Akan Segera Memprosesnya. Harap tunggu konfirmasi lebih lanjut.</p>
                <a href='home.php'>Kembali ke Halaman Utama</a>
            </div>
        </body>
        </html>";
    } else {
        // Log error in production
        error_log("Error: " . $stmt->error);
        echo "<p>Terjadi kesalahan, coba lagi nanti.</p>";
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    mysqli_close($conn);
}
?>
