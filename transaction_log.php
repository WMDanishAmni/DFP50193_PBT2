<?php

session_start();

if ($_SESSION['role'] != "admin") {
    header("Location:dashboard.php");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h2>Transaction Log</h2>

        <?php

        $file = "logs/transaction.txt";

        $open = fopen($file, "r");

        echo nl2br(fread($open, filesize($file)));

        fclose($open);

        ?>

        <br><br>

        <a href="dashboard.php">Back</a>

    </div>
</body>

</html>