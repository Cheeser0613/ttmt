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

    $ProjectName = $_POST["ProjectName"];
    $LanguageF = $_POST["LanguageF"];
    $LanguageT = $_POST["LanguageT"];

    $sql = "INSERT INTO project_list (ProjectName, LanguageFrom, LanguageTo) VALUES ('$ProjectName', '$LanguageF', '$LanguageT')";

    if (mysqli_query($conn, $sql)) {
        $lastID = mysqli_insert_id($conn);
        $createProjectEntities = "CREATE TABLE P$lastID (TermID int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, TermFrom varchar(100) NOT NULL, TermTo varchar(100) NOT NULL, Note varchar(300))";
        mysqli_query($conn, $createProjectEntities);
        echo "Project added";
    }
    else {
        echo "fail to add: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<br>
<button onclick="location.href='home.php'">Back to previous page</button>
