<html>
<body>
    <?php
    $ProjectID = $_GET['ID'];
    $ProjectName = $_GET['NAME'];
    ?>
    <h1>are you sure you want to delete Project <?php echo $ProjectName?> ?</h1>
    <button onclick="location.href='ProjectDelete.php?ID=<?php echo $ProjectID?>'">Yes</button>
    <button onclick="location.href='home.php'">No</button>
</body>
</html>