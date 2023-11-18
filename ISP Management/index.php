<?php
include './database/databasecreation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ISP Management System</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .page-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .page-center h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .login-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            margin: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="page-center">
        <h1>Welcome to ISP Management System</h1>
        <div class="login-buttons">
            <a href="userlogin.php" class="login-button">Login</a>
            <a href="userreg.php" class="login-button">New Registration</a>
        </div>
    </div>

</body>

</html>