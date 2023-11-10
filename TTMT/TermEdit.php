<!DOCTYPE html>
<html>
<head>
    <title>Translated Terms Management Tool</title>
</head>
<body>
    <button onclick="location.href='TermList.php?ID=<?php echo $_GET['ID']?>'">Back to previous page</button>
    <h1>Edit Translated Term Info</h1>
    <?php
    $ProjectID = $_GET["ID"];
    $TermID = $_GET["TermID"];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'ttmt';

    $conn = mysqli_connect($host, $username, $password, $db);

    if (!$conn) {
        die("connection fail: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM P$ProjectID WHERE TermID='$TermID'";
    $result = mysqli_query($conn, $sql);
    $Value = mysqli_fetch_assoc($result);
    $TermF = $Value['TermFrom'];
    $TermT = $Value['TermTo'];
    $Note = $Value['Note'];
    ?>

    <form action="TermEditHandling.php" method="post">
        <label for="TermF">Term: </label>
        <input type="text" name="TermF" value="<?php echo $TermF ?>" required><br>
        <label for="TermT">Translated to: </label>
        <input type="text" name="TermT" value="<?php echo $TermT ?>" required><br>
        <label for="Note">Note: </label>
        <input type="text" name="Note" value="<?php echo $Note ?>"><br>
        <input type="hidden" name="TermID" value="<?php echo $TermID?>">
        <Button type="submit" name="ProjectID" value="<?php echo $ProjectID ?>">edit</Button>
    </form>

    <?php
    mysqli_close($conn);
    ?>

</body>
</html>