<?php       
    if (isset($_POST['hiala'])) {
        session_start();
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
        unset($_COOKIE);
        header("Cache-Control: no-store, no-cache, must-revalidate");
        if (!isset($_SESSION['PERSONNEId'])) {
            header('Location:login.php');
        }
        exit;
    }
?>