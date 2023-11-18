<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

$list = getEmpList();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp = "";
    foreach ($_POST as $key => $value) {


        $temp = $key;
    }
    echo $temp;

    $_SESSION['eid'] = $temp;

    header("location:employeeprofile.php");




}


// setpayment($_SESSION['totalbill'], date("D/M/Y"), date("h:i:sa"), (rand(10000000, 99999999)), $_SESSION['paymentmethod'], $_SESSION['cid']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Employee List</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .employee-list-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .employee-list-table {
            width: 100%;
            border-collapse: collapse;
        }

        .employee-list-table th,
        .employee-list-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .employee-list-table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .employee-list-table td {
            text-align: left;
        }

        .employee-profile-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .employee-profile-button:hover {
            background-color: #0056b3;
        }

        .allocate-button,
        .deallocate-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .deallocate-button {
            background-color: #dc3545;
        }

        .allocate-button:hover,
        .deallocate-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>


    <div class="employee-list-form">
        <h2>Employee List</h2>
        <table class="employee-list-table">
            <thead>
                <tr>
                    <th>E-ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                echo $list;
                ?>





                <!-- <tr>
                    <td><button class="employee-profile-button">E001</button></td>
                    <td>John Doe</td>
                    <td>Manager</td>
                    <td>
                        <button class="allocate-button">Allocate</button>
                        <button class="deallocate-button">Deallocate</button>
                    </td>
                </tr>
                <tr>

                    <td>Jane Smith</td>
                    <td>Line-Man</td>
                    <td>


                    </td>
                </tr> -->
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

</body>

</html>