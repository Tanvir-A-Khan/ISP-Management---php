<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
$err = '';
if (isset($_POST['save'])) {
    echo $_POST['fullName'];

    $_SESSION['cname'] = $_POST['fullName'];
    $_SESSION['caddress'] = $_POST['address'];
    $_SESSION['cnid'] = $_POST['nid'];
    $_SESSION['cphone'] = $_POST['phone'];

    $err = updateProfile($_SESSION['cemail']);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Profile</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .edit-container {
            width: 600px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .edit-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .save-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .save-button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: white;

        }
    </style>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>
    <center>

        <div class="edit-container">
            <h2>Edit Profile</h2>
            <?php echo $err; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['cemail']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" id="fullName" name="fullName"
                        value="<?php echo $_SESSION['cname']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo $_SESSION['caddress']; ?>">
                </div>
                <div class="form-group">
                    <label for="nid">NID / Birth Certificate:</label>
                    <input type="text" class="form-control" id="nid" name="nid"
                        value="<?php echo $_SESSION['cnid']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        value="<?php echo $_SESSION['cphone']; ?>">
                </div>
                <button type="submit" name="save" class="save-button">Save Changes</button>
            </form>
        </div>
    </center>

</body>

</html>