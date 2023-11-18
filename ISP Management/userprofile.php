<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['delete'])) {
    $email = $_SESSION['cemail'];
    deleteProfile($email);
}

if (isset($_POST['edit'])) {
    header("Location:userprofileedit.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profile Page</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
            text-align: left;
        }

        .profile-info label {
            font-weight: bold;
        }

        .edit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button {
            background-color: #FF0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            /* text-decoration: none; */
            background-color: #007bff;
            color: white;
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

    <div class="container form-container">
        <h2>Profile</h2>
        <div class="profile-info">
            <label for="fullName">Full Name:</label>
            <p>
                <?php echo $_SESSION['cname']; ?>
            </p>
        </div>
        <div class="profile-info">
            <label for="address">Address:</label>
            <p>
                <?php echo $_SESSION['caddress']; ?>
            </p>
        </div>
        <div class="profile-info">
            <label for="nid">NID:</label>
            <p>
                <?php echo $_SESSION['cnid']; ?>
            </p>
        </div>
        <div class="profile-info">
            <label for="email">Email:</label>
            <p>
                <?php echo $_SESSION['cemail']; ?>
            </p>
        </div>
        <div class="profile-info">
            <label for="phone">Phone:</label>
            <p>
                <?php echo $_SESSION['cphone']; ?>
            </p>
        </div>
        <form action="" method="post">

            <button class="edit-button" name="edit">
                <!-- <a href=" userprofileedit.php"> -->
                Edit
                <!-- </a> -->
            </button>
            <button class="delete-button" name="delete" onclick=confirmAction()>
                <!-- <a href=" userprofileedit.php"> -->
                Delete Account
                <!-- </a> -->
            </button>
        </form>
    </div>

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