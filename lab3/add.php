<?php
include 'configs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($serverName, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO todo (title, details) VALUES ('{$_POST["title"]}', '{$_POST["details"]}')";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
    header("location: index.php");
    exit();
}
?>

<html>
<head></head>
<body>
<form method="post">
    <input name="title" placeholder="Title" type="text" required>
    <br>
    <br>
    <input name="details" placeholder="Details" type="text" required>
    <br>
    <br>
    <input type="submit" value="Add todo">
</form>
</body>
</html>

