<?php
require_once 'configs.php';
$conn = new mysqli($serverName, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$title = $details = "";
if ($_SERVER["REQUEST_METHOD"] != "POST" && isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

    $result = $conn->query("SELECT title, details FROM todo WHERE id='{$_GET["id"]}'");
    if ($result->num_rows > 0) {
        $todo = $result->fetch_assoc();
        $title = $todo["title"];
        $details = $todo["details"];
    } else {
        echo "No to do found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE todo  SET title ='{$_POST["title"]}', details = '{$_POST["details"]}' WHERE id='{$_GET["id"]}'";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("location: index.php");
    exit();
}
mysqli_close($conn);

?>

<html>
<head></head>
<body>
<form method="post">
    <input name="title" placeholder="Title" type="text" required value="<?php echo $title ?>">
    <br>
    <br>
    <input name="details" placeholder="Details" type="text" required value="<?php echo $details ?>">
    <br>
    <br>
    <input type="submit" value="Update">
</form>
</body>
</html>

