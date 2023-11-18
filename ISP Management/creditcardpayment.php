<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        // echo "Invalid payment method selected.";
        header("Location: paymentsuccessfull.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Same as the previous CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        /* Additional styling for the form */
        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            display: block;
            margin-top: 20px;
        }
    </style>

    <title>Credit Card Payment</title>
</head>

<body>
    <!-- <?php
    include 'navbar.php';
    ?> -->
    <div class="container">
        <h1>Credit Card Payment</h1>
        <form method="post">
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>

            <label for="card_holder">Card Holder Name</label>
            <input type="text" id="card_holder" name="card_holder" placeholder="John Doe" required>

            <label for="expiry_date">Expiry Date</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" required>

            <label for="cvv">Password</label>
            <input type="password" id="cvv" name="password" required>

            <button type="submit" name="submit">Submit Payment</button>
        </form>
    </div>
</body>

</html>