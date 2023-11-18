<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
$err = "";

getinfo($_SESSION['pid']);



if (isset($_POST['modify'])) {
    echo "love me lik you do";

    $err = modifypackage($_POST['pname'], $_POST['pspeed'], $_POST['fee'], $_SESSION['pid']);
    // header("Location:userprofileedit.php");
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
            <h2>Edit a Plan</h2>

            <?php echo $err; ?>
            <form action="" method="post">
                <label for="pname">Plan Name</label>
                <input type="text" id="pname" name="pname" value="<?php echo $_SESSION['pname'] ?> " required>

                <!-- <label for="ptype">Plan Type</label>
                <select id="ptype" name="ptype" value = " " required>
                    <option value="residential">Residential</option>
                    <option value="business">Business</option>
                </select> -->

                <label for="pspeed">Plan Speed</label>
                <input type="text" id="pspeed" name="pspeed" value=" <?php echo $_SESSION['pspeed'] ?>" required>

                <label for="fee">Monthly Fee</label>
                <input type="text" id="fee" name="fee" value="<?php echo $_SESSION['fee'] ?> " required>

                <button type="submit" name="modify">Modify Plan</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 ISP. All rights reserved.</p>
    </footer>
</body>

</html>