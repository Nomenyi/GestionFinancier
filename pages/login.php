<?php
    include "_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "_librairies.php";
    ?>
    <link rel="stylesheet" href="../css/login.css">
    <title>FIDIRANA</title>
</head>
<body>
    <div class="signin">
        <form action="" method="post">
        <img class="icon" width="200px" height="200px" src="../librairies/icons/user.png" alt="">
            <h2 style="color: white" class="titre">FIDIRANA</h2>
            <input type="text" name="username" placeholder="Ampidiro ny anaranao">
            <input type="password" name="password" placeholder="Ampidiro ny teny miafinao">
            <input type="submit" name="login" value="Hiditra" class="btn-login">
        </form>
    </div>
</body>
</html>