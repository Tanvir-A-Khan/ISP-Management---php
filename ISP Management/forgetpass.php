<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .forgot-container {
            width: 350px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .forgot-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .email-input {
            width: 275px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            /* margin-right: 100px; */
            font-size: 16px;
            outline: none;
        }

        .reset-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .reset-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="forgot-container">
        <h2>Reset Password</h2>
        <p>Enter your email to verify your account</p>
        <input type="email" class="email-input" placeholder="Enter your email"> <br>
        <button class="reset-button" onclick="location.href = 'otpverification.php';">
            Send OTP
        </button>
        <p>Remember your password? <a href="userlogin.php">Log in</a></p>
    </div>

</body>

</html>