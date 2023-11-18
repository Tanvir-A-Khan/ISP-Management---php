<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}



getEmpProfile($_SESSION['eid']);

if (isset($_POST['update'])) {
    echo 'wo';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Employee Profile</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h2 {
            margin: 0;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .dropdown {
            position: relative;
            margin-bottom: 10px;
        }

        .dropdown select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            appearance: none;
            outline: none;
            cursor: pointer;
        }

        .upload-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .upload-input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        .edit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>


    <div class="profile-container">
        <div class="profile-header">
            <h2>Employee Profile</h2>
        </div>
        <form class="profile-form" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['ename']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" value="<?php echo $_SESSION['eaddress']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" value="<?php echo $_SESSION['ephone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['eemail']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jobPosition">Job Position:</label>
                <div class="dropdown">
                    <select id="jobPosition" class="form-control" value="<?php echo $_SESSION['designation']; ?>"
                        required>
                        <option value="manager">Manager</option>
                        <option value="line-man">Line-Man</option>
                        <option value="server-expert">Server Expert</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" id="salary" value="<?php echo $_SESSION['salary']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label class="upload-label">Resume:</label>
                <input type="text" class="upload-input" value="<?php echo $_SESSION['cv']; ?> " required>
            </div>
            <button type="button" class="edit-button" name="update">Update</button>
        </form>
    </div>

</body>

</html>