<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

if (isset($_POST['submit'])) {

    $file = "reports/" . time() . ".txt";

    $data =

        "Name: " . $_POST['name'] .
        "\nMatric: " . $_POST['matric'] .
        "\nBlock: " . $_POST['block'] .
        "\nRoom: " . $_POST['room'] .
        "\nDamage: " . $_POST['damage'] .
        "\nUrgency: " . $_POST['urgency'] .
        "\nDate: " . $_POST['date'] .
        "\nDescription: " . $_POST['description'] .
        "\nPhone: " . $_POST['phone'] .
        "\nStatus: Pending\n";

    $fopen = fopen($file, "w");

    fwrite($fopen, $data);

    fclose($fopen);


    /* transaction log */

    $log = fopen("logs/transaction.txt", "a");

    fwrite(
        $log,
        date("d-m-Y h:i A") .
        " " . $_SESSION['role'] .
        " created " . $file . "\n"
    );

    fclose($log);

    echo "Report Submitted Successfully";

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create Maintenance Report</h2>

    <form method="POST">

        Name:

        <input type="text" name="name" required>

        <br><br>

        Matric Number:

        <input type="text" name="matric" required>

        <br><br>

        Hostel Block:

        <select name="block">

            <option>A</option>

            <option>B</option>

            <option>C</option>

        </select>

        <br><br>

        Room Number:

        <input type="number" name="room">

        <br><br>

        Damage Type:

        <input type="radio" name="damage" value="Light">Light

        <input type="radio" name="damage" value="Fan">Fan

        <input type="radio" name="damage" value="Pipe">Pipe

        <input type="radio" name="damage" value="Door">Door

        <input type="radio" name="damage" value="Furniture">Furniture

        <br><br>

        Urgency Level:

        <select name="urgency">

            <option>Low</option>

            <option>Medium</option>

            <option>High</option>

        </select>

        <br><br>

        Date:

        <input type="date" name="date">

        <br><br>

        Description:

        <textarea name="description"></textarea>

        <br><br>

        Contact Number:

        <input type="tel" name="phone">

        <br><br>

        <input type="submit" name="submit" value="Submit Report">

    </form>
</body>
</html>