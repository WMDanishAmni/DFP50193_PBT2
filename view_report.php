<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

$files = scandir("reports");

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Report</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h2>Reports List</h2>

        <?php

        foreach ($files as $file) {

            if ($file != "." && $file != "..") {

                echo "<a href=?file=$file>$file</a><br>";

            }
        }

        ?>

        <hr>

        <?php

        if (isset($_GET['file'])) {

            $file = "reports/" . $_GET['file'];

            $open = fopen($file, "r");

            echo nl2br(fread($open, filesize($file)));

            fclose($open);

            if ($_SESSION['role'] == "admin") {

                echo "<br><br>";

                echo "<a href=update_report.php?file=" . $_GET['file'] . ">Update</a>";

                echo "<a href=delete_report.php?file=" . $_GET['file'] . ">Delete</a>";

            }

        }

        ?>

        <br><br>

        <a href="dashboard.php">Back</a>

    </div>
</body>

</html>