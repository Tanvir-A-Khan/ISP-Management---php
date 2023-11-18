<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
$err = "";
if (isset($_POST['submit'])) {

    // $cname = $_SESSION['cname'];
    // $caddress = $_POST['address'];
    // $cnid = $_SESSION['cnid'];
    // $cemail = $_SESSION['cemail'];
    // $cphone = $_SESSION['cphone'];
    // $issuetype = $_POST['issuetype'];
    // $time = date("h:i:sa");
    // $descriptions = $_POST['description'];
    // $err = makeComplain($cname, $caddress, $cnid, $cemail, $cphone, $issuetype, $time, $descriptions);
    // echo $err;
}

if (isset($_POST['addplan'])) {
    // header("Location:userprofileedit.php");
    echo "love me lik you do";
    // ($pname, $ptype, $pspeed, $fee)


    $err = addnewplan($_POST['pname'], $_POST['pspeed'], $_POST['fee']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISP Plan Form</title>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
        } */

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .plan-form {
            border: 1px solid #ccc;
            padding: 2rem;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .plan-form h2 {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .plan-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .plan-form input,
        .plan-form select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .plan-form button {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>
    <!-- <header>
        <h1>ISP Plan Form</h1>
    </header> -->

    <main>
        <section class="plan-form">
            <h2>Add a New Plan</h2>

            <?php echo $err; ?>
            <form action="" method="post">
                <label for="pname">Plan Name</label>
                <input type="text" id="pname" name="pname" required>

                <!-- <label for="ptype">Plan Type</label>
                <select id="ptype" name="ptype" required>
                    <option value="residential">Residential</option>
                    <option value="business">Business</option>
                </select> -->

                <label for="pspeed">Plan Speed in Mbps</label>
                <input type="number" id="pspeed" name="pspeed" required>

                <label for="fee">Monthly Fee</label>
                <input type="number" id="fee" name="fee" required>

                <button type="submit" name="addplan">Add Plan</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 ISP. All rights reserved.</p>
    </footer>
</body>

</html>