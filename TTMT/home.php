<!DOCTYPE html>
<html>
<head>
    <title>Translated Terms Management Tool</title>
</head>
<body>
    <h2>Add new project</h2>
        <form action="ProjectAdd.php" method="post">
            <label for="ProjectName">Project Name: </label>
            <input type="text" name="ProjectName" required><br>
            <label for="LanguageF">Language From: </label>
            <input type="text" name="LanguageF" placeholder="English" required><br>
            <label for="LanguageT">Langauge To: </label>
            <input type="text" name="LanguageT" placeholder="Japanese" required><br>
            <input type="submit" value="submit">
        </form>
    <h1>Project list</h1>
    <ul>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'ttmt';

        $conn = mysqli_connect($host, $username, $password, $db);

        if (!$conn) {
            die("connection fail: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM project_list";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ProjectID = $row["ProjectID"];
                $ProjectName = $row["ProjectName"];
                $LanguageF = $row["LanguageFrom"];
                $LanguageT = $row["LanguageTo"];
                echo "<li><a href='TermList.php?ID=$ProjectID'>$ProjectName</a> | From $LanguageF To $LanguageT
                     <a href='ProjectEdit.php?ID=$ProjectID'>edit</a>
                     <a href='ProjectDeleteConfirmation.php?ID=$ProjectID&NAME=$ProjectName'>delete</a></li>";
            }
        }
        else {
            echo "there is no project yet";
        }

        mysqli_close($conn);
        ?>
    </ul>

    
</body>
</html>
