<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'ttmt';

    $conn = mysqli_connect($host, $username, $password, $db);
    if (!$conn) {
        die("connection fail: " . mysqli_connect_error());
    }

    $ProjectID = $_POST["ProjectID"];
    $TermID = $_POST["TermID"];
    $TermF = $_POST["TermF"];
    $TermT = $_POST["TermT"];
    $Note = $_POST["Note"];

    $sql = "UPDATE P$ProjectID SET TermFrom='$TermF', TermTo='$TermT', Note='$Note' WHERE TermID='$TermID'";

    if (mysqli_query($conn, $sql)) {
        echo "Info edited";
    }
    else {
        echo "fail to edit: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<br>
<button onclick="location.href='TermList.php?ID=<?php echo $ProjectID?>'">Back to previous page</button>