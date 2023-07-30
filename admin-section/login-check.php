<?php 
    if(!isset($_SESSION['podaci']))
    {
        $_SESSION['no-login-msg'] ="<div class='greska-msg'>Ulogujte se radi pristupa.</div>";
        header('location:login-page.php');
    }
?>