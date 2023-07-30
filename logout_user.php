<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
?>
<?php
    setcookie("korisnik_id", $_SESSION['korisnik_id'], time()-1, "/");
    setcookie("korisnik", $_SESSION['korisnik'], time()-1, "/");
    setcookie("email", $_SESSION['email'], time()-1, "/");
    setcookie("telefon", $_SESSION['telefon'], time()-1, "/");
    header("location: index.php");
?>