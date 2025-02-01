<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Helpdesk TI</title>
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
            background-color: #2c3e50; /* Warna navbar lebih gelap */
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo-container {
            display: flex;
            align-items: center;
        }

        .navbar img {
            width: 45px; 
            margin-right: 12px;
        }

        .navbar .logo-text {
            font-size: 1.5em;
            font-weight: bold;
            text-transform: uppercase;
        }

        .navbar a {
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .navbar a.logout {
            background-color: #DAA520;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .navbar a.logout:hover {
            background-color: #B8860B;
            transform: translateY(-2px);
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
        }

        .home-container p {
            font-size: 1.3em;
            margin-bottom: 40px;
            line-height: 1.7;
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

            .navbar a {
                margin-top: 10px;
            }

            .home-container h1 {
                font-size: 2.2em;
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

    <!-- Navbar Section -->
    <div class="navbar">
        <div class="logo-container">
            <img src="logo.png" alt="PT Pupuk Sriwidjaja Logo">
            <span class="logo-text">Dashboard Admin</span> 
        </div>
        <a href="adminlogin.php" class="logout">Logout</a>
    </div>

    <!-- Home Container -->
    <div class="home-container">
        <h1>Selamat Datang, Admin</h1>
        <p>Sistem Layanan TI PT Pupuk Sriwidjaja. Silakan pilih menu berikut untuk melanjutkan:</p>
        
        <a href="dashboard.php" class="button">Laporan Pengaduan Pengguna</a>
        <a href="chat.php" class="button">Notif Chat</a>
    </div>

</body>
</html>
