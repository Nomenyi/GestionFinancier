<?php
    session_start();
    if (!isset($_SESSION['UserName'])){
        header('Location:login.php');
    }
    include "_logout.php";
    include "_depense.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/depenser.css">
    <title>Depenser</title>
</head>
<body>
    <?php
        include "_header.php";
    ?>

    <div class="container">
        <p class="conseil">
            <h1>FANDANIAM-BOLA</h1>
            <h3>
                Ilaina ny mampiditra ny teny miafinao mba ahafantarana 
                fa tena ianao marina ny handany eto. Tsy tokony hihoatra 
                ny ambim-bola tahirinao ny fandaniana ataonao.
            </h3>
            <h3>
                <?php
                    include "_dbconnect.php";
                    $volasisa = $conn->prepare("SELECT * FROM TAHIRY");
                    $volasisa->execute();
                    $sisa = $volasisa->fetch();

                    echo "<h3>( Ny ambim-bola tahirinao sisa dia : ". $sisa["TahiryVola"] ." Ariary )</h3>"
                ?>
            </h3>
        </p>

        <form role="form" action="" method="post">
            <div class="form-group">
                <label for="vola">Vola laniana :</label>
                <input type="number" class="form-control" name="vola">
            </div>

            <div class="form-group">
                <label for="antony">Anton'ny fandaniana :</label>
                <input type="textarea" class="form-control" name="antony">
            </div>

            <div class="form-group">
                <label for="password">Teny miafina :</label>
                <input type="password" class="form-control" name="password">
            </div>

            <input class="btn btn-primary" type="submit" name="ekena" value="EKENA">
        </form>
    </div>

    <?php
        include "_footer.php";
    ?>
</body>
</html>