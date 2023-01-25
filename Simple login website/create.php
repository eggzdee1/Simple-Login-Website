<?php
    $username = $_POST['username'];
    $password = $_POST['passw'];

    $conn = new MySQLi('localhost', 'root', '', 'simplelogin');
    if ($conn->connect_error)
    {
        die('Connection failed: '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("INSERT INTO accounts(username, passw) VALUES(?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Account creation successful.</h1>
        <a href="index.html">Return to login page.</a>
    </body>
</html>