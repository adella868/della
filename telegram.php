<?php
$telegram_id = $_POST['chatid'];
$message_text = $_POST['pesan'];
$secret_token = '7794704495:AAGNiPK6ckDUMxBT01ari9N-TUkqhbiOpVM';
$response = sendMessage($telegram_id, $message_text, $secret_token);

function sendMessage($telegram_id, $message_text, $secret_token) {
    $url = "https://api.telegram.org/bot". $secret_token
    . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    
    curl_close($ch);
    
    if ($err) {
        return [
            "status" => "error",
            "message" => "Pesan gagal dikirim 😢. Error: " . $err
        ];
    } else {
        return [
            "status" => "success",
            "message" => "✅ Pesan berhasil dikirim!"
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: white;
        }
        .success {
            color: green;
            font-size: 18px;
            font-weight: bold;
        }
        .error {
            color: red;
            font-size: 18px;
            font-weight: bold;
        }
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($response['status'] == 'success'): ?>
        <p class="success"><?= $response['message'] ?></p>
    <?php else: ?>
        <p class="error"><?= $response['message'] ?></p>
    <?php endif; ?>
    
    <a href="index.html" class="button">Kirim Lagi</a>
</div>

</body>
</html>
