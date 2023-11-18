<?php
include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}

$list = getallcomplains();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $temp = "";
    // foreach ($_POST as $key => $value) {


    //     $temp = $key;
    // }

    // deletecomplain($temp);
    // header("Refresh:0");

    if (isset($_POST['submit'])) {

        // echo $_POST['submit'] . '<br>';
        // echo $_POST['fullName'] . '<br>';
        // echo $_POST['address'] . '<br>';
        // echo $_POST['phone'] . '<br>';
        // echo $_POST['email'] . '<br>';
        // echo $_POST['jobPosition'] . '<br>';
        // echo $_POST['salary'] . '<br>';
        // echo $_POST['resume'] . '<br>';

        // $ename =$_POST['fullName'] 
        // $eaddress=
        // $ephone=
        // $eemail=
        // $designation=
        // $salary=
        // $cv=

        setEmployee($_POST['fullName'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['jobPosition'], $_POST['salary'], $_POST['resume']);

    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Employee</title>
    <style>
        /* Additional custom styles can be added here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .add-employee-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .dropdown {
            position: relative;
        }

        .dropdown select {
            width: 100%;
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
            display: block;
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        .submit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>
    <div class="add-employee-form">
        <h2>Add Employee</h2>
        <hr>
        <form method="POST">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" name="fullName" id="fullName" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="jobPosition">Job Position:</label>
                <div class="dropdown">
                    <select id="jobPosition" name="jobPosition" class="form-control">
                        <option value="manager">Manager</option>
                        <option value="line-man">Line-Man</option>
                        <option value="server-expert">Server Expert</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" name="salary" id="salary" required>
            </div>
            <div class="form-group">
                <label class="upload-label">Upload Resume:</label>
                <input type="file" class="upload-input" name="resume" id="resume" accept=".pdf,.doc,.docx" required>
            </div>
            <button type="submit" class="submit-button" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>