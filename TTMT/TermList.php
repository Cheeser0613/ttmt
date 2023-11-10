<!DOCTYPE html>
<html>
<head>
    <title>Translated Terms Management Tool</title>
</head>
<body>
<button onclick="location.href='home.php'">Back to home page</button>
    <h2>Add new translated term</h2>
        <form action="TermAdd.php" method="post">
            <label for="TermF">Term: </label>
            <input type="text" name="TermF" required><br>
            <label for="TermT">Translated to: </label>
            <input type="text" name="TermT" required><br>
            <label for="Note">Note: </label>
            <input type="text" name="Note"><br>
            <button type="submit" name="ProjectID" value="<?php echo $_GET['ID']?>">submit</button>
        </form>
    <h1>Term list</h1>
    <ul>

    <form method="get" action="">
        <input type="text" name="SearchTerm" placeholder="leave empty to list all">
        <button type="submit" name="ID" value="<?php echo $_GET['ID']?>" >Search</button>
    </form>

        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'ttmt';

        $conn = mysqli_connect($host, $username, $password, $db);

        if (!$conn) {
            die("connection fail: " . mysqli_connect_error());
        }

        $ProjectID = $_GET['ID'];

        if (isset($_GET['SearchTerm'])) {
            $SearchTerm = $_GET['SearchTerm'];
            $sql = "SELECT * FROM P$ProjectID WHERE TermFrom LIKE '%$SearchTerm%' OR TermTo LIKE '%$SearchTerm%' OR Note LIKE '%$SearchTerm%'";
        }
        else {
            $sql = "SELECT * FROM P$ProjectID";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $TermID = $row["TermID"];
                $TermF = $row["TermFrom"];
                $TermT = $row["TermTo"];
                $Note = $row["Note"];
                echo "<li>From: $TermF <br>
                    To: $TermT <br>
                    Note: $Note <br>
                    <a href='TermEdit.php?ID=$ProjectID&TermID=$TermID'>edit</a> 
                    <a href='TermDeleteConfirmation.php?ID=$ProjectID&TermID=$TermID&TermF=$TermF'>delete</a></li><br>";
            }
        }
        else {
            echo "there is no translated term yet";
        }

        mysqli_close($conn);
        ?>
    </ul>

    
</body>
</html>