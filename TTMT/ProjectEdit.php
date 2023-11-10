<!DOCTYPE html>
<html>
<head>
    <title>Translated Terms Management Tool</title>
</head>
<body>
    <button onclick="location.href='home.php'">Back to previous page</button>
    <h1>Edit Project Info</h1>
    <?php
    $ProjectID = $_GET["ID"];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'ttmt';

    $conn = mysqli_connect($host, $username, $password, $db);

    if (!$conn) {
        die("connection fail: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM project_list WHERE ProjectID='$ProjectID'";
    $result = mysqli_query($conn, $sql);
    $Value = mysqli_fetch_assoc($result);
    $ProjectName = $Value['ProjectName'];
    $LanguageF = $Value['LanguageFrom'];
    $LanguageT = $Value['LanguageTo'];
    ?>

    <form action="ProjectEditHandling.php" method="post">
        <label for="ProjectName">Project Name: </label>
        <input type="text" name="ProjectName" value="<?php echo $ProjectName ?>" required><br>
        <label for="LanguageF">Language From: </label>
        <input type="text" name="LanguageF" placeholder="English" value="<?php echo $LanguageF ?>" required><br>
        <label for="LanguageT">Langauge To: </label>
        <input type="text" name="LanguageT" placeholder="Janpanese" value="<?php echo $LanguageT ?>" required><br>
        <Button type="submit" name="ProjectID" value="<?php echo $ProjectID ?>">edit</Button>
    </form>

    <?php
    mysqli_close($conn);
    ?>

</body>
</html>