<?php
$ProjectID = $_GET['ID'];

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'ttmt';

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("connection fail: " . mysqli_connect_error());
}

$sql1 = "DELETE FROM project_list WHERE ProjectID='$ProjectID'";
$sql2 = "DROP TABLE P$ProjectID";

if (mysqli_query($conn, $sql1) and mysqli_query($conn, $sql2)) {
    echo "Project deleted";
}
else {
    echo "fail to delete: " . mysqli_error($conn);
}
?>
<br>
<button onclick="location.href='home.php'">Back to previous page</button>