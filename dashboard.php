<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h2>Welcome <?php echo $_SESSION['username']; ?></h2>

        <?php

        if ($_SESSION['role'] == "student") {
            ?>

            <a href="create_report.php">Create Report</a>

            <a href="view_report.php">View My Reports</a>

            <?php
        }
        ?>

        <?php

        if ($_SESSION['role'] == "admin") {
            ?>

            <a href="create_report.php">Create Report</a>

            <a href="view_report.php">View All Reports</a>

            <a href="transaction_log.php">Transaction Log</a>

            <?php
        }
        ?>

        <br><br>

        <a href="logout.php">Logout</a>

    </div>

</body>

</html>