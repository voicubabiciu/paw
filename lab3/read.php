<?php
$title = $details = $date = "";
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once 'configs.php';

    $conn = new mysqli($serverName, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query("SELECT * FROM todo WHERE id='{$_GET["id"]}'");
    if ($result->num_rows > 0) {
        $todo = $result->fetch_assoc();
        $title = $todo["title"];
        $details = $todo["details"];
        $date = $todo["datetime"];
    } else {
        echo "No to do found";
    }


    mysqli_close($conn);
}
?>

<html>
<head></head>
<body>
<h4><?php echo $title ?></h4>
<h5><?php echo $details ?></h5>
<h5><?php echo $date?></h5>
<a href="/">Back</a></p>
</body>
</html>

