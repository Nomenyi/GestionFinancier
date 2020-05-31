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

    <div>
        <h1 style="text-align:center; margin-left:100px;"><b>LISITRY NY FANDANIANA</b></h1>

        <div class="container">
            <?php
                include "_dbconnect.php";
                $volasisa = $conn->prepare("SELECT * FROM TAHIRY");
                $volasisa->execute();
                $sisa = $volasisa->fetch();

                echo "<h2 style='text-align:center;'>( Ny ambim-bola tahirinao : ". $sisa["TahiryVola"] ." Ariary )</h2>"
            ?>
        </div>

        <div class="container">
        
            

            <div>
            <div>
        <?php
            include "_dbconnect.php";
                echo "<table class='table'>";
                    echo "<tr class='info'>
                    <th>Vola nolaniana(Ariary)</th>
                    <th>Daty sy ora</th>
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

                $limit = 10;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $nb = $conn->prepare("SELECT COUNT(*) FROM FANDANIANA");
                $nb->execute();
                $nbb = $nb->fetch();

                $nbr = $nbb[0];
                $pages = ceil($nbr / $limit);

                if ($page == 1) {
                    $previous = $page;
                } else{
                    $previous = $page - 1;
                }

                if ($page == $pages) {
                    $next = $page;
                } else{
                    $next = $page + 1;
                }

                $reDem = $conn->prepare("SELECT FandVola, FandDate, FandAntony FROM FANDANIANA ORDER BY FandId DESC LIMIT $start, $limit");
                $reDem->execute();

                $resDem = $reDem->setFetchMode(PDO::FETCH_ASSOC);

                foreach (new ListDepense(new RecursiveArrayIterator($reDem->fetchAll())) as $key=>$value) {
                    echo  $value ;
                }

                echo "</table>";
            ?>
            <div class="btn btn-group btn-group-justified">
                <a href="liste_depense.php?page=<?=$previous?>" class="btn btn-warning">Precedent</a>
                <?php for ($i=1; $i <= $pages; $i++) : ?>
                    <a href="liste_depense.php?page=<?= $i; ?>" class="btn btn-warning"><?= $i; ?></a>
                <?php endfor; ?>
                <a href="liste_depense.php?page=<?=$next?>" class="btn btn-warning">Suivant</a>
            </div>
        </div>
            </div>

        </div>
    </div>

    <?php
        include "_footer.php";
    ?>
</body>
</html>