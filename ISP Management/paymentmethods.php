<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paymentMethod = $_POST["payment_method"];
    $_SESSION['paymentmethod'] = $_POST["payment_method"];

    // echo $_SESSION['paymentmethod'];

    if ($paymentMethod === "credit_card") {
        header("Location: creditcardpayment.php");
    } else {
        header("Location: mobilebankingpayment.php");
        // $_SESSION['paymentmethod'] = 'Mobile Banking';
        // echo "Invalid payment method selected.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Payment Methods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            /* padding: 0; */
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="radio"] {
            margin-right: 10px;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <!-- <?php
    include 'navbar.php';
    ?> -->
    <div class="container">
        <h1>Select Payment Method</h1>
        <form method="post">
            <label>
                <input type="radio" name="payment_method" value="credit_card" required>
                Credit Card
            </label>
            <label>
                <input type="radio" name="payment_method" value="bkash" required>
                Bkash
            </label>
            <label>
                <input type="radio" name="payment_method" value="rocket" required>
                Rocket
            </label>
            <label>
                <input type="radio" name="payment_method" value="nagad" required>
                Nagad
            </label>
            <button type="submit" name="submit">Continue</button>
        </form>
    </div>
</body>

</html>