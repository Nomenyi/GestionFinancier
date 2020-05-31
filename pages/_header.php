<?php
    include "_logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <?php
        include "_librairies.php";
    ?>
    <title>Document</title>
</head> 
    <nav>
        <label class="logo" for="">Fitantanam-bolan-dRakoto</label>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="kisary.php">Kisary</a></li>
            <li><a href="recherche.php">Hitady</a></li>
            <li><a href="depenser.php">Handany</a></li>
            <li><a href="liste_depense.php">Fandaniana hatrizay</a></li>
            <li><a href="depense_now.php">Fandaniana androany</a></li>
            <li>
                <form action="" method="post">
                    <input class="btn btn-danger" name="hiala" type="submit" value="HIALA">
                </form>
            </li>
        </ul>
        <label id="icon" for="">
            <i class="fas fa-bars"></i>
        </label>
    </nav>
</body>
<script>
    $(document).ready(function() {
        $('#icon').click(function() {
            $('ul').toggleClass('show');
        });
    });
</script>
</html>