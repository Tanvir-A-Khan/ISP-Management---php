<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
// echo $_SESSION['paymentmethod'];
// Payment - [paymentid(pk),amount, paymentdate, paymenttime, transactionid, paymentmethod]
setpayment($_SESSION['totalbill'], date("Y/m/d"), date("h:i:sa"), (rand(10000000, 99999999)), $_SESSION['paymentmethod'], $_SESSION['cid']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
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
            text-align: center;
        }

        h1 {
            color: #007bff;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
    <title>Payment Success</title>
</head>

<body>
    <div class="container">
        <h1>Congratulations!</h1>
        <?php
        // Get the payment amount from the query parameter
        $paymentAmount = isset($_SESSION['totalbill']) ? $_SESSION['totalbill'] : 'Unknown';
        ?>
        <p>Your payment of TK
            <?php echo $paymentAmount; ?> has been successfully processed.
        </p>

        <a href="userdashboard.php">Home</a>

    </div>
</body>

</html>