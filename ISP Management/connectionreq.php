<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

//
// $pname ;
// $cstatus;
// $currentplan; 
// $requestedplan; 
// $ptype;$pspeed
// $fee, 
// $cdate,
// $caddress, 
// $CID(FK)

// showpackages();

$err = "";

if (isset($_POST['Submit'])) {
    // echo $_POST['type'];
    // echo '<br>';
    // echo $_POST['location'];
    // echo '<br>';
    // echo $_POST['cplan'];
    // echo '<br>';
    // echo $_SESSION['cid'];
    // echo '<br>';

    // echo $_SESSION['pname'];
    // echo '<br>';
    // echo $_SESSION['ptype'];
    // echo '<br>';
    // echo $_SESSION['pspeed'];
    // echo '<br>';
    // echo $_SESSION['fee'];
    // echo '<br>';

    //[upid(pk),pname,cstatus,currentplan, requestedplan, ptype, pspeed, fee, cdate,caddress, CID(FK)]
    // cplan = chosed plan

    getpackagedetais($_POST['cplan']);
    $cstatus = "newconnreq";
    $currentplan = "Nothing";
    $date = 'date("h:i:sa")';
    $cemail = $_SESSION['cemail'];
    $cphone = $_SESSION['cphone'];

    setnewconnectionreq($_SESSION['pname'], $cstatus, $currentplan, $_POST['cplan'], $_POST['type'], $_SESSION['pspeed'], $_SESSION['fee'], $date, $_POST['location'], $_SESSION['cid']);
    $err = "Requested for new plan";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>New Connection</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .connection-form {
            width: 550px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .connection-form h2 {
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
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .form-control-location {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .dropdown select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            appearance: none;
            outline: none;
            cursor: pointer;
        }

        .dropdown:after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .connection-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .connection-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <center>

        <div class="connection-form">
            <h2>New Connection</h2>
            <hr>
            <form method="POST">
                <div class="form-group">
                    <label for="connectionType">Connection Type:</label>

                    <?php echo $err; ?><br>

                    <div class="dropdown">
                        <select id="connectionType" name="type" class="form-control">
                            <option value="personal">Personal</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" value="" class="form-control-location" required>
                </div>
                <div class="form-group">
                    <label for="choosePlan">Choose Plan:</label>
                    <div class="dropdown">
                        <select id="choosePlan" name="cplan" class="form-control">
                            <?php showpackages(); ?>
                            <!-- <option value="plan1">Plan 1 - 50 Mbps ($29.99/month)</option>
                            <option value="plan2">Plan 2 - 100 Mbps ($39.99/month)</option>
                            <option value="plan3">Plan 3 - 200 Mbps ($49.99/month)</option> -->
                        </select>
                    </div>
                </div>
                <button type="submit" name="Submit" class="connection-button">Submit</button>
            </form>
        </div>
    </center>

</body>

</html>