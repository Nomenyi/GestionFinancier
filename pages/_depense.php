<?php
    include "_dbconnect.php";

    if (!empty($_POST["ekena"]) AND isset($_POST["ekena"])) {

        $notempty = !empty($_POST["vola"]) AND !empty($_POST["antony"]) AND !empty($_POST["password"]);
        $isset = isset($_POST["vola"]) AND isset($_POST["antony"]) AND isset($_POST["password"]);

        if ($notempty AND $isset) {

            $vola = htmlspecialchars(trim($_POST["vola"]));
            $antony = htmlspecialchars(trim($_POST["antony"]));
            $pass = $_POST["password"];

            $reqSelUs = $conn->prepare("SELECT * FROM USER
            WHERE UserName = ?");
            $reqSelUs->execute(array($_SESSION["UserName"]));
            $usSel = $reqSelUs->fetch();

            if ($usSel["UserPass"] == $pass) {

                // Jerena aloha ny vola tahiry
                $selVola = $conn->prepare("SELECT TahiryVola FROM TAHIRY WHERE TahiryId = 1");
                $selVola->execute();
                $volat = $selVola->fetch();

                if ($volat["TahiryVola"] > $vola) {

                    // Manao INSERT @ TABLE FANDANIANA
                    $reqInsDep = $conn->prepare("INSERT INTO FANDANIANA (FandVola, FandAntony, UserId) VALUES (?,?,?)");
                    $reqInsDep->execute(array($vola, $antony, $usSel["UserId"]));

                    // Manao UPDATE @ TABLE TAHIRY
                    $tahiry = $volat["TahiryVola"] - $vola;

                    $reqUpTah = $conn->prepare("UPDATE TAHIRY SET TahiryVola = ?");
                    $reqUpTah->execute(array($tahiry));

                    echo "<h3 style='background-color:green;color:white; text-align:center'>Fandaniana tafiditra ara-dalana !</h3>";
                } else {
                    echo "<h3 style='background-color:red;color:white; text-align:center'>Tsy ampy intsony ny tahirinao tompoko !</h3>";
                }
                
            } else {
                echo "<h3 style='background-color:red;color:white; text-align:center'>Diso ny teny miafinao ! Hamarino azafady !</h3>";
            }
            
        } else {
            echo "<h3 style='background-color:red;color:white; text-align:center'>Fenoy daholo ny zavatra ilaina azafady!</h3>";
        }
        
    } else {
        # code...
    }
    
?>