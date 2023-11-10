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
    $ProjectName = $_POST["ProjectName"];
    $LanguageF = $_POST["LanguageF"];
    $LanguageT = $_POST["LanguageT"];

    $sql = "UPDATE project_list SET ProjectName='$ProjectName', LanguageFrom='$LanguageF', LanguageTo='$LanguageT' WHERE ProjectID='$ProjectID'";

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
<button onclick="location.href='home.php'">Back to previous page</button>