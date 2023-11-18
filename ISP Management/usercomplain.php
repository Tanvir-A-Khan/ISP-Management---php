<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
$err = "";
if (isset($_POST['submit'])) {

    $cname = $_SESSION['cname'];
    $caddress = $_POST['address'];
    $cnid = $_SESSION['cnid'];
    $cemail = $_SESSION['cemail'];
    $cphone = $_SESSION['cphone'];
    $issuetype = $_POST['issuetype'];
    $time = date("h:i:sa");
    $descriptions = $_POST['description'];
    $err = makeComplain($cname, $caddress, $cnid, $cemail, $cphone, $issuetype, $time, $descriptions);
    echo $err;
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
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="container form-container">
        <h2>Report an Issue</h2>
        <?php echo $err; ?>
        <form method="POST">
            <!-- <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" class="form-control" id="phoneNumber">
            </div> -->
            <div class="form-group">
                <label for="issueType">Issue Type:</label>
                <select class="form-control" id="issueType" name="issuetype">
                    <option value="connectionFailure">Connection Failure</option>
                    <option value="lowSpeed">Low Speed</option>
                    <option value="router">Router Issue</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" id="address" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>