<?php
include 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // warning in here, this code may can get SQL Injection, so you must change and give "?" question mark for make you SQL code safely
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header('Location: homeadmin.php');
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        /* Styles for Login Page */
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #4682B4, #6a99d8);
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-container img {
            width: 120px;
            margin-bottom: 20px;
            border-radius: 50%;
        }

        .login-container h1 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #4682B4;
            font-weight: bold;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .login-container form div {
            width: 100%;
            margin-bottom: 15px;
        }

        .login-container form label {
            font-size: 1em;
            color: #555;
            margin-bottom: 5px;
        }

        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .login-container form input[type="text"]:focus,
        .login-container form input[type="password"]:focus {
            border-color: #4682B4;
            outline: none;
        }

        .login-container form button {
            background: #4682B4;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1.1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container form button:hover {
            background-color: #3568a5;
        }

        .login-container form button:active {
            background-color: #3b7bbf;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
            }

            .login-container h1 {
                font-size: 1.4em;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="logo.png" alt="Company Logo">
        <h1>Admin Login</h1>
        <form method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </div>
</body>
</html>
