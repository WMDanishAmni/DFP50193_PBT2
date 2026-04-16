<?php
session_start();

if (isset($_POST['login'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['role'] = $_POST['role'];

    header("Location: dashboard.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h2>Login Page</h2>

        <form method="POST">

            Username

            <br>

            <input type="text" name="username" required>

            <br><br>

            Role

            <br>

            <input type="text" name="role" value="<?php echo $_GET['role']; ?>" readonly>

            <br><br>

            <input type="submit" name="login" value="Login">

        </form>

    </div>

</body>

</html>