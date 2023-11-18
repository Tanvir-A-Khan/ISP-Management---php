<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

$list = getCurrentPlans('accepted', $_SESSION['cid']);





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp = "";
    foreach ($_POST as $key => $value) {


        $temp = $key;
    }
    echo $temp;

    if ($temp[0] == 'u') {

        $temp = ltrim($temp, $temp[0]);

        $_SESSION['upid'] = $temp;


        // upgradepack  ('accepted', $temp);
        header("location:upgradepackage.php");


    } elseif ($temp[0] == 'd') {
        $temp = ltrim($temp, $temp[0]);

        echo $temp;

        // deletereq($temp);
        updatestatus('delete', $temp);
        header("Refresh:0");


    }





}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Subscribed ISP Packages</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            /* display: flex; */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .packages-container {
            max-width: 700px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .package {
            background-color: #f2f2f2;
            border-radius: 5px;
            margin: 10px 0;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .package-details {
            flex: 1;
            text-align: left;
        }

        .package-title {
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }

        .package-info {
            color: #555;
            margin-bottom: 5px;
        }

        .buttons {
            display: flex;
            align-items: center;
        }

        .upgrade-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .delete-button {
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .upgrade-button:hover,
        .delete-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>
    <center>

        <h3>Connection Plans</h3>

        <div class="packages-container">
            <?php echo $list; ?>

            <!-- Add more package sections as needed -->
        </div>
    </center>

    <script>
        function confirmAction() {
            var userResponse = confirm("Do you want to actually delete it?");

            if (userResponse) {
                alert("You chose to proceed.");
            } else {
                alert("You chose to cancel.");
            }
        }
    </script>

</body>

</html>