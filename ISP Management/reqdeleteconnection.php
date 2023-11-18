<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

$list = getdeletereqplans('delete');





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp = "";
    foreach ($_POST as $key => $value) {
        $temp = $key;
    }

    deletereq($temp);
    header("Refresh:0");



}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>New Connection Request</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        .accept-button,
        .reject-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .accept-button:hover,
        .reject-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>

    <div class="container">

        <h2>Delete Connection Request</h2>
        <hr>
        <table class="request-table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer ID</th>
                    <th>Type</th>
                    <th>Plan</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php echo $list; ?>
                <!-- <tr>
                    <td>1</td>
                    <td>C001</td>
                    <td>Personal</td>
                    <td>Plan 1</td>
                    <td>City A</td>
                    <td>123-456-7890</td>
                    <td>xxxxxxx@gmail.com</td>
                    <td>1000TK/M</td>

                    <td><button class="reject-button" name="delete">Delete</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>C002</td>
                    <td>Commercial</td>
                    <td>Plan 2</td>
                    <td>City B</td>
                    <td>987-654-3210</td>
                    <td>xxxxxxx@gmail.com</td>
                    <td>1000TK/M</td>

                    <td><button class="reject-button">Delete</button></td>
                </tr> -->
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

</body>

</html>