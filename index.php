<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan Helpdesk TI</title>
    <style>
        /* Reset Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya Body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e2a3a, #f9f9f9);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Kontainer Form */
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            padding: 25px;
            width: 100%;
            max-width: 500px;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.02);
        }

        .form-container h1 {
            font-size: 1.8em;
            text-align: center;
            color: #1e2a3a;
            margin-bottom: 20px;
        }

        .form-container h1::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: #4682B4;
            margin: 10px auto 0;
            border-radius: 5px;
        }

        /* Gaya Input, Select, dan Textarea */
        .form-container label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.95em;
            font-weight: bold;
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .form-container input:focus,
        .form-container textarea:focus,
        .form-container select:focus {
            border-color: #4682B4;
            outline: none;
            box-shadow: 0 0 8px rgba(70, 130, 180, 0.5);
        }

        /* Gaya Tombol */
        .form-container button {
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            font-weight: bold;
            background: #4682B4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .form-container button:hover {
            background: #3b7bbf;
            transform: translateY(-2px);
        }

        .form-container button:active {
            background: #2a5a8f;
            transform: translateY(2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            .form-container h1 {
                font-size: 1.6em;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Form Pengaduan</h1>
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required autocomplete="off">
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required autocomplete="off">
            
            <label for="unit">Unit Kerja</label>
            <select id="unit" name="unit" required>
                <option value="">-- Pilih Unit Kerja --</option>
                <option value="Departemen Layanan TI">Departemen Layanan TI</option>
                <option value="Departemen TJSL">Departemen TJSL</option>
                <option value="Departemen Perencanaan & Pengendalian Produksi">Departemen Perencanaan & Pengendalian Produksi</option>
                <option value="Departemen Pengelolaan Transformasi Bisnis">Departemen Pengelolaan Transformasi Bisnis</option>
                <option value="Departemen Bengkel & Alat Berat">Departemen Bengkel & Alat Berat</option>
            </select>
            
            <label for="badge">Nomor Badge</label>
            <input type="text" id="badge" name="badge" placeholder="Masukkan nomor badge Anda" required autocomplete="off">
            
            <label for="description">Deskripsi Pengaduan</label>
            <textarea id="description" name="description" rows="3" placeholder="Jelaskan pengaduan Anda" required></textarea>

            <label for="file">Unggah Dokumen atau Foto (Maks. 2MB)</label>
            <input type="file" id="file_dokumen" name="file_dokumen" accept=".jpg,.jpeg,.png,.pdf" aria-label="Unggah file pendukung">
            
            <button type="submit">Kirim Pengaduan</button>
        </form>
    </div>
</body>
</html>
