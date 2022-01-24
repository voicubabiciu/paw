<?php
include 'configs.php';

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM todo");
mysqli_close($conn);

?>


<html>
<head>
    <title>PHP Test</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h2> Todo list</h2>
<h3><a href="add.php">Add new to do</a></h3>
<?php

if ($result->num_rows > 0) {
    echo "<table>
    <thead>
    <tr>
        <th> Title</th>
        <th> Details</th>
        <th> Creation date</th>
        <th> Actions</th>
    </tr>
    </thead>
    <tbody>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "
    <tr>
        <td>{$row["title"]}</td>
        <td>{$row["details"]}</td>
        <td>{$row["datetime"]}</td>
        <td>
        <a href='delete.php?id={$row["id"]}'> Delete</a>
        <a href='read.php?id={$row["id"]}'> View</a>
        <a href='update.php?id={$row["id"]}'> Edit</a>
        </td>
    </tr>
    ";
    }
    echo " </tbody></table>";

} else {
    echo " <h1 style='text-align: center'>You don't have any todos </h1>";
}
?>


</body>
</html>
