<?php

session_start();

if ($_SESSION['role'] != "admin") {
    header("Location:dashboard.php");
}

$file = "reports/" . $_GET['file'];

if (isset($_POST['update'])) {

    $content = file_get_contents($file);

    $content = str_replace("Pending", $_POST['status'], $content);

    $fopen = fopen($file, "w");

    fwrite($fopen, $content);

    fclose($fopen);


    /* log */

    $log = fopen("logs/transaction.txt", "a");

    fwrite(
        $log,
        date("d-m-Y h:i A") .
        " admin updated " . $file . "\n"
    );

    fclose($log);

    echo "Updated Successfully";

}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h2>Update Status</h2>

        <form method="POST">

            <select name="status">

                <option>Pending</option>

                <option>In Progress</option>

                <option>Fixed</option>

            </select>

            <br><br>

            <input type="submit" name="update" value="Update">

        </form>

    </div>
</body>

</html>