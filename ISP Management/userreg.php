<?php
include './database/dbfunctionalities.php';

$err = "";

if (isset($_POST['Submit'])) {

    echo 'working';
    $fullname = $_POST['fullName'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['p1'];

    if ($_POST['p1'] == $_POST['p2']) {
        $err = customerReg($fullname, $address, $nid, $email, $phone, $password);

    } else {
        $err = "Passwords didn't matched";
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 750px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-color: #ddd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        a {
            font-style: none;
            color: black;
        }

        .header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Maria NET</h1>
    </div>

    <div class="container form-container">
        <h2>Customer Registration</h2>

        <?php echo $err; ?>

        <form method="POST">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" name="fullName" id="fullName" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="nid">NID:</label>
                <input type="text" class="form-control" name="nid" id="nid" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Enter Password:</label>
                <input type="password" class="form-control" name="p1" id="password" required>
            </div>
            <div class="form-group">
                <label for="rpassword">Confirm Password:</label>
                <input type="password" class="form-control" name="p2" id="rpassword" required>
            </div>
            <button type="submit" class="btn btn-primary" name="Submit" onclick="">
                <!-- <a href="./userlogin.php"> -->
                Submit
                <!-- </a> -->
            </button>
        </form>
    </div>

</body>

</html>