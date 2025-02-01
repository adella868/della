<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk TI - PT Pupuk Sriwidjaja</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Style */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background: #2c3e50; /* Warna lebih gelap agar teks lebih kontras */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 1.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #DAA520;
        }

        /* Home Container */
        .home-container {
            text-align: center;
            padding: 40px 30px;
            background: linear-gradient(135deg, #4682B4, #1e2a3a);
            color: white;
            border-radius: 10px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            margin: 80px auto;
            max-width: 650px;
            transition: transform 0.3s ease;
        }

        .home-container:hover {
            transform: scale(1.02);
        }

        .home-container h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .home-container p {
            font-size: 1.3em;
            margin-bottom: 40px;
            line-height: 1.7;
        }

        /* Logo Style */
        .home-container img {
            width: 150px;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .home-container a.button {
            display: inline-block;
            background: #DAA520;
            font-size: 1.3em;
            padding: 15px 25px;
            margin: 15px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            text-decoration: none;
            color: white;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .home-container a.button:hover {
            background: #B8860B;
            transform: translateY(-5px);
        }

        .home-container a.button:active {
            background: #FFD700;
            transform: translateY(2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .navbar ul {
                flex-direction: column;
                gap: 10px;
            }

            .home-container h1 {
                font-size: 2.5em;
            }

            .home-container p {
                font-size: 1.1em;
            }

            .home-container a.button {
                font-size: 1.1em;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="PT Pupuk Sriwidjaja Logo">
            <span>Dashboard Pengguna</span>
        </div>
    </div>

    <div class="home-container">
        <h1>Selamat Datang</h1>
        <p>Sistem Pencatatan Pengaduan Layanan TI PT. PUPUK SRIWIDJAJA. Silahkan pilih menu berikut:</p>
        <a href="index.php" class="button">Form Pengaduan</a>
        <a href="laporan.php" class="button">Cek Status Laporan</a>
    </div>
</body>
</html>
