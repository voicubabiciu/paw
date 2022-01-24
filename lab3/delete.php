<?php
echo $_GET["id"];
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once 'configs.php';

    $conn = new mysqli($serverName, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM todo WHERE  id='{$_GET["id"]}'";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
    header("location: index.php");
    exit();
}
