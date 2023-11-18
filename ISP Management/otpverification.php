<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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

        .otp-container {
            width: 300px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .otp-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .otp-input {
            width: 100px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            font-size: 20px;
            text-align: center;
            outline: none;
        }

        .otp-input:focus {
            border-color: #007bff;
        }

        .verify-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .verify-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="otp-container">
        <h2>OTP Verification</h2>
        <p>Please enter the OTP sent to your email address - mostlytanvir@gmail.com</p>

        <div>
            <input type="text" class="otp-input" maxlength="6" autofocus>
            <!-- <input type="text" class="otp-input" maxlength="1">
            <input type="text" class="otp-input" maxlength="1">
            <input type="text" class="otp-input" maxlength="1"> -->
        </div>
        <button class="verify-button">Verify</button>
        <p>Didn't receive the OTP? <a href="#">Resend OTP</a></p>
    </div>

</body>

</html>