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

    $TermF = $_POST["TermF"];
    $TermT = $_POST["TermT"];
    $Note = $_POST["Note"];
    $ProjectID = $_POST["ProjectID"];

    $sql = "INSERT INTO P$ProjectID (TermFrom, TermTo, Note) VALUES ('$TermF', '$TermT', '$Note')";

    if (mysqli_query($conn, $sql)) {
        echo "Translated term added";
    }
    else {
        echo "fail to add: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<br>
<button onclick="location.href='TermList.php?ID=<?php echo $ProjectID?>'">Back to previous page</button>