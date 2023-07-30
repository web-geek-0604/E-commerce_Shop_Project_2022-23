<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: login-page.php");
?>
<?php
    setcookie("administrator_id", $_SESSION['administrator_id'], time()-1, "/");
    setcookie("podaci", $_SESSION['podaci'], time()-1, "/");
    setcookie("email", $_SESSION['email'], time()-1, "/");
    header("location: login-page.php");
?>
