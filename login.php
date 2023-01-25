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
        $stmt = $conn->query("SELECT * FROM accounts WHERE username = '$username' AND passw = '$password'");
        $valid = $stmt->num_rows > 0;
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
    <script type="text/javascript">          
        let valid = "<?php echo $valid; ?>";
        console.log(valid);
        if (valid) window.location.href = 'home.html';
        else window.location.href = 'index.html';
    </script>
</body>
</html>