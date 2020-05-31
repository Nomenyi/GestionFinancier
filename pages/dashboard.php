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
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
        include "_header.php";
    ?>

    <div class="container acc">
        <div class="welcome">
            <h1>TONGASOA ETO AMIN'NY APPLICATION</h1>
        </div>

        <div class="koraga">
            <p>
                Ato ianao no mitantana ny volanao ary isaky ny handany vola ianao dia 
                miditra ato ary marihinao ato ny fotoana sy ny antony handanianao.
            </p>
            <p>
                Afaka jerenao ato koa ny lisitry ny fandanianao rehetra.
            </p>
            <p>
                Ny fidiram-bolanao kosa dia mijanona ho 10 000 ariary isanandro.
            </p>
        </div>
    </div>

    <?php
        include "_footer.php";
    ?>
</body>
</html>