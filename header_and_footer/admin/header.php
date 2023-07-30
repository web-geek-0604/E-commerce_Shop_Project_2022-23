<?php session_start() ?>
<?php require_once('functions.php') ?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWarehouse - admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../images/logo/gw_logo2.png">
    <script src="../js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/1d8da4198b.js" crossorigin="anonymous"></script>
</head>
<body onload="uradi()">
    <?php
    $db=mysqli_connect("localhost", "root", "", "gwarehouse_db");
    ?>
    <div class="nav-wrapper">
        <div class="nav-admin">
            <div class="admin-nav-wrapper">
            <div style="margin: auto 0;">
                <a href="admin-main.php"><img src="../images/logo/gw_logo_admin.png" alt="gw_logo_admin"></a>
            </div>
    <ul>
        <li><a href="admins.php">Administratori</a></li>
        <li><a href="users.php">Korisnici</a></li>
        <li><a href="products.php">Proizvodi</a></li>
        <li><a href="categories.php">Kategorije</a></li>
        <li><a href="brands.php">Brendovi</a></li>
        <li><a href="comments.php">Komentari</a></li>
        <li><a href="orders.php">Porudžbine</a></li>
    </ul>
    <div class="user-container">
        <i class="fa-solid fa-user fa-2x"></i>
    <?php
        if(login()){
            echo "<p style='margin:2px; font-size: 14px'><a href='admin-profile.php'>{$_SESSION['podaci']}</a></p>";
            echo "<p style='margin:2px'><a href='logout.php' style='font-size: 14px;'>Odjava</a></p>";
        }else
            echo "<p style='margin-top:5px;'><a href='login-page.php'>Prijava</a></p>";
    ?>
    </div>
            </div>
        </div>
    </div>
    <div class="wrapper">