<?php
$ProjectID = $_GET['ID'];
$TermID = $_GET['TermID'];

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'ttmt';

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("connection fail: " . mysqli_connect_error());
}

$sql1 = "DELETE FROM P$ProjectID WHERE TermID='$TermID'";

if (mysqli_query($conn, $sql1)) {
    echo "Translated term deleted";
}
else {
    echo "fail to delete: " . mysqli_error($conn);
}
?>
<br>
<button onclick="location.href='TermList.php?ID=<?php echo $ProjectID?>'">Back to previous page</button>