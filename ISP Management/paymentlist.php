<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

// setpayment($_SESSION['totalbill'], date("D/M/Y"), date("h:i:sa"), (rand(10000000, 99999999)), $_SESSION['paymentmethod'], $_SESSION['cid']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e0e0e0;
        }
    </style>
    <title>Payment Table</title>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>
    <div class="container">
        <h1>Payment Table</h1>
        <?php
        // Simulated payment data (you would typically fetch this from a database)
        $list = getpaymentinfos();
        ?>

        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Time</th>
                    <th>Transaction ID</th>
                    <th>Payment Method</th>
                    <th>Customer ID</th>
                </tr>
            </thead>
            <tbody>
                <?php

                echo $list;

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>