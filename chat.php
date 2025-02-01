<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Pesan ke Telegram</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(255, 255, 255), #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 10px;
        }
        .form-container {
            background: #1e2a3a;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            color: white;
        }
        .form-container h2 {
            margin-bottom: 25px;
            color: #f8f9fa;
            font-weight: bold;
        }
        .form-input, .form-textarea {
            width: 90%;
            padding: 15px;
            margin: 10px 0;
            border: 5px solid #ccc;
            border-radius: 10px;
            font-size: 14px;
            background: #f8f9fa;
        }
        .form-button {
            width: 50%;
            padding: 15px;
            background: #B8860B;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }
        .form-button:hover {
            background: #B8860B;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Kirim Pesan ke Telegram</h2>
        <form action="telegram.php" method="post">
            <input class="form-input" type="text" name="chatid" placeholder="Chat ID" required>
            <textarea class="form-textarea" rows="4" name="pesan" placeholder="Tulis pesan..." required></textarea>
            <button class="form-button" type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
