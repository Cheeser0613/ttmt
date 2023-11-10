<html>
<body>
    <?php
    $ProjectID = $_GET['ID'];
    $TermID = $_GET['TermID'];
    $TermF = $_GET['TermF'];
    ?>
    <h1>are you sure you want to delete translated term <?php echo $TermF?> ?</h1>
    <button onclick="location.href='TermDelete.php?ID=<?php echo $ProjectID?>&TermID=<?php echo $TermID?>'">Yes</button>
    <button onclick="location.href='TermList.php?ID=<?php echo $ProjectID?>'">no</button>
</body>
</html>