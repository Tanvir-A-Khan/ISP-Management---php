<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

$list = getallcomplains();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp = "";
    foreach ($_POST as $key => $value) {


        $temp = $key;
    }

    deletecomplain($temp);
    header("Refresh:0");


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Complain List</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .complain-table {
            width: 100%;
            border-collapse: collapse;
        }

        .complain-table th,
        .complain-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .complain-table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .complain-table td {
            text-align: left;
        }

        .solved-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .solved-button:hover {
            background-color: #0056b3;
        }

        .container {
            /* margin: 10px; */
            margin-left: 100px;
            padding-left: 200px;

        }

        .request-table {
            width: 1200px;
            border-collapse: collapse;
        }

        .request-table th,
        .request-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .request-table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .request-table td {
            text-align: left;
        }
    </style>
</head>

<body>

    <?php
    include 'adminnavbar.php';
    ?>

    <div class="container">

        <h2>Complain List</h2>
        <hr>
        <table class="request-table">
            <thead>
                <tr>
                    <th>Complain ID</th>
                    <th>Customername</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    <th>Complain Time</th>
                    <th>Description</th>
                    <th>Solved</th>
                </tr>
            </thead>
            <form action="" method="post">

                <tbody>
                    <?php echo $list; ?>
                    <!-- <tr>
                    <td>U001</td>
                    <td>Network Issue</td>
                    <td>John Doe</td>
                    <td>Pending</td>
                    <td>2023-08-15</td>
                    <td>10:30 AM</td>
                    <td><button class="solved-button" name="solved">Solved</button></td>
                </tr>
                <tr>
                    <td>U002</td>
                    <td>Slow Speed</td>
                    <td>Jane Smith</td>
                    <td>In Progress</td>
                    <td>2023-08-16</td>
                    <td>2:45 PM</td>
                    <td><button class="solved-button">Solved</button></td>
                </tr> -->
                    <!-- Add more rows as needed -->
                </tbody>
            </form>
        </table>

</body>

</html>