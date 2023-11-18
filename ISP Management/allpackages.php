<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
$err = "";

$listofpackages = getAllpackages();
if (isset($_POST['Add'])) {

    header('location:addpackages.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $temp = "";
    foreach ($_POST as $key => $value) {

        // $_SESSION['CID'] = $key;
        $temp = $key;
    }

    if ($temp[0] == 'm') {

        $temp = ltrim($temp, $temp[0]);
        // echo $temp;
        $_SESSION['pid'] = $temp;
        echo $temp;
        header("Location:editpackage.php");

    } elseif ($temp[0] == 'd') {
        $temp = ltrim($temp, $temp[0]);
        echo $temp;
        deletepackage($temp);
        header("Location:allpackages.php");


    }





}




if (isset($_POST['m'])) {
    echo 'lets modify';
}

if (isset($_POST['d'])) {
    echo 'lets delete';
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Internet Packages</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .packages-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .package {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .package-info {
            flex: 1;
        }

        .package-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .package-details {
            color: #555;
            margin-bottom: 10px;
        }

        .package-price {
            font-size: 20px;
            color: #007bff;
        }

        .package-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .package-button:hover {
            background-color: #0056b3;
        }

        .modify button {
            margin: 5px;
        }

        .delete button {
            background-color: red;
        }

        .add-pack button {
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-left: 600px;
        }
    </style>
</head>

<body>

    <?php
    include 'adminnavbar.php';
    ?>

    <div class="packages-container">
        <?php echo $listofpackages; ?>

        <!-- <div class="package">
            <div class="package-info">
                <div class="package-title">Standard Package</div>
                <div class="package-details">Up to 50 Mbps</div>
                <div class="package-price">$39.99/month</div>
            </div>
            <div class="modify">
                <button class="package-button">Modify</button>

            </div>
            <div class="modify delete">
                <button class="package-button">Delete</button>

            </div>
        </div>

        <div class="package">
            <div class="package-info">
                <div class="package-title">Premium Package</div>
                <div class="package-details">Up to 100 Mbps</div>
                <div class="package-price">$49.99/month</div>
            </div>
            <div class="modify">
                <button class="package-button">Modify</button>

            </div>
            <div class="modify delete">
                <button class="package-button">Delete</button>

            </div>
        </div> -->
        <div class="add-pack">
            <form action="" method="post">
                <button type="submit" name="Add">
                    Add Packages
                </button>
            </form>
        </div>
        <!-- Add more package sections as needed -->
    </div>

</body>

</html>