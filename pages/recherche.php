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
    <link rel="stylesheet" href="../css/liste.css">
    <title>Liste Depense</title>
</head>
<body>
    <?php
        include "_header.php";
    ?>
<h2 style="text-align: center;"><b>FITADIAVANA ARAKA NY DATY</b></h2>
    <div class="container">
        
        <div class="formulaire">
            <form action="" method="post">
                <label for=""><b>Daty tadiavina :</b></label>
                <input type="date" name="date" id="">
                <input class="btn btn-primary" name="hitady" type="submit" value="HITADY"> <br> <br>
            </form>        
        </div>

        <div>

        
        <?php
            include "_dbconnect.php";

                if (!empty($_POST["hitady"]) AND isset($_POST["hitady"])) {
                    
                    $notempty = !empty($_POST["date"]);
                    $isset = isset($_POST["date"]);

                    if ($notempty AND $isset) {
                        
                        $date = $_POST["date"];

                        

                        echo "<table class='table'>";
                    echo "<tr class='info'>
                    <th>Vola nolaniana(Ariary)</th>
                    <th>Daty</th>
                    <th>Antony nandaniana</th>";
                    class ListDepense extends RecursiveIteratorIterator{
                        function __construct($it){
                            parent::__construct($it, self::LEAVES_ONLY);
                        }
                        function current(){
                            return "<td>".parent::current()."</td>";
                        }
                        function beginChildren(){
                            echo "<tr>";
                        }
                        function endChildren(){
                            echo "</tr>"."\n";
                        }
                    }

                
                $reDem = $conn->prepare("SELECT FandVola, FandDate, FandAntony FROM FANDANIANA WHERE FandDate = ? ORDER BY FandId DESC");
                $reDem->execute(array($date));

                $resDem = $reDem->setFetchMode(PDO::FETCH_ASSOC);

                $test = $reDem->fetchAll();

                if ($test != null) {
                    echo "<h3> Ireto avy ny fandanianao tamin'ny ". $date .". </h3>";
                   
                    foreach (new ListDepense(new RecursiveArrayIterator($test)) as $key=>$value) {
                        echo  $value ;
                        
                    }
                } else {
                    echo "<h3> Tsy nanao fandaniana ianao tamin'ny ". $date .". </h3>";
                }
                

                

                echo "</table>";


                    } else {
                        echo "<h3 style='background-color:red;color:white; text-align:center'>Ampidiro ny daty ho tadiavina azafady!</h3>";
                    }
                    
                } else {
                    # code...
                }
                
            ?>
            
        </div>
    </div>

    <?php
        include "_footer.php";
    ?>
</body>
</html>