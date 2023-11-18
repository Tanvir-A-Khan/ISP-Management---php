<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}


$err = "";

if (isset($_POST['submit'])) {

    if ($_POST['user'] == 'Admin' && $_POST['password'] == 'admin' && $_POST['email'] == 'admin@admin.com') {
        header("Location:admindashboard.php");
    } else {
        $err = getProfile($_POST['email'], $_POST['password']);

        if ($err == 'ok') {
            header("Location:userdashboard.php");

        }

    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Report Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional custom styles can be added here */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
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
        <h2>Login</h2>
        <?php echo $err; ?>
        <form method="POST">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <input type="radio" id="user" name="user" value="User" required>
            <label for="user">User</label>
            <input type="radio" id="Admin" name="user" value="Admin" required>
            <label for="Admin">Admin</label><br>

            <p>Can't remember your password?
                <a href="forgetpass.php">Forget Password</a>
            </p>


            <button type="submit" name="submit" class="btn btn-primary">
                <!-- <a href="userdashboard.php"> -->
                Submit
                <!-- </a> -->
            </button>
        </form>
    </div>

</body>

</html>