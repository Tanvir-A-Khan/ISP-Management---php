<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
// include './database/dbfunctionalities.php';

if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:index.php");
}

?>
<style>
    /* Additional custom styles can be added here */
    .navbar {
        background-color: #111;
        margin-bottom: 20px;
        z-index: 1005;
    }

    .navbar-toggler-icon {
        background-color: #fff;
    }

    .navbar-nav .nav-item {
        margin-right: 10px;
    }

    .navbar-nav .nav-link {
        color: #fff;
    }

    .profile-icon {
        font-size: 24px;
        color: #fff;
        margin-right: 20px;
    }

    .menu-btn {
        position: absolute;
        top: 5px;
        left: 20px;
        cursor: pointer;
        font-size: 24px;
        color: #fff;
    }

    .navbar-title {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        width: 100%;
    }

    .sidebar {
        height: 100vh;
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        z-index: 1000;
    }

    .sidebar a {
        padding: 8px 8px 8px 16px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar h4 {
        color: #d4e4ff;
        margin-left: 15px;
    }

    .sidebar button {
        margin-left: 13px;
        padding: 5px 15px;
        background-color: tomato;
        color: white;
    }

    .sidebar button:hover {

        background-color: red;
        color: white;
    }
</style>

<header>

    <div>


        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="navbar-title">
                ISP Management System - Admin Panel
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">

            </div>

        </nav>

        <div class="sidebar" id="sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <a href="admindashboard.php">Admin Home</a>
            <a href="allpackages.php">Manage Packages</a>
            <h4>Connection Request</h4>
            <a href="reqnewconnection.php">New Connection</a>
            <a href="requpgradeconnection.php">Upgrade Connection</a>
            <a href="reqdeleteconnection.php">Delete Connection</a>
            <a href="paymentlist.php">Payment</a>
            <a href="complainlist.php">Complains</a>
            <h4>Employee</h4>
            <a href="employeelist.php">Employee List</a>
            <a href="addemployee.php">Add employee</a>
            <!-- <a href="#">Allocate employee</a> -->
            <form method="POST">
                <button type="submit" name="logout">Logout</button>

            </form>
        </div>
    </div>
</header>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
        } else {
            sidebar.style.width = "250px";
        }
    }
</script>