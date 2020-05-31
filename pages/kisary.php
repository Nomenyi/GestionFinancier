<?php
    session_start();
    if (!isset($_SESSION['UserName'])){
        header('Location:login.php');
    }
    include "_logout.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <?php
        include "_librairies.php";
    ?>
    <title>Charts</title>
</head>
<body>

    <?php
        include "_header.php";
    ?>

<h1 style="text-align:center;"><b>KISARIN'NY FANDANIANA</b></h1>

    <div class="row">

        

        <div class="col-sm-6">
            <?php
                include "chart.php";
            ?>
        </div>
        <br>
        <div class="col-sm-6">
            <?php
                include "charts.php";
            ?>
        </div>

    </div>


    <?php
        include "_footer.php";
    ?>
    
</body>
</html>