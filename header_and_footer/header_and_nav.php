<?php session_start(); ?>
<?php ob_start(); ?>
<?php
require_once('admin-section/functions.php');
require('classes/classDB.php'); 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWarehouse IT Online Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/scripts.js"></script>
    <link rel="shortcut icon" type="image/png" href="images/logo/gw_logo1.png">
    <script src="https://kit.fontawesome.com/1d8da4198b.js" crossorigin="anonymous"></script>
</head>
<body onload="uradi()">
    <?php
    $db=new DB();
    if(!$db->connect()) exit();
    ?>
    <div class="nav-wrapper">
        <div class="nav">
            <div class="header-and-nav-wrapper">
            <a href="index.php"><img class="logo-container" src="./images/logo/gw_logo_main.png" alt="gw_logo_main"></a>
            <form class="search-form" action="product_search.php" method="get">
            <div class="search-container">
                <input type="text" class="search" name="search" placeholder="Unesite pojam za pretragu...">
                <button class="search-button"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
            </div>
            </form>
                <div class="user-part">
                    <div class="shop-cart-container">
                        <a href="cart.php"><i class="fa-solid fa-cart-shopping fa-2x"></i>
                        <p style="margin-top:7px;">Korpa (<span id="p_number">0</span>)</p></a>
                    </div>
                <div class="user-container">
                <i class="fa-solid fa-user fa-2x"></i>
                <?php
                    if(login_user()){
                        echo "<a href='profile.php'><p style='margin:5px; font-size: 14px'><span id='user_span'>{$_SESSION['korisnik']}</span></p></a>";
                        echo "<p style='margin:5px'><a href='logout_user.php' style='font-size: 14px;'>Odjava</a></p>";
                    }else
                        echo "<p style='margin-top:7px;'><a href='login_page.php'>Prijava</a> | <a href='register_page.php'>Registracija</a></p>";
                 ?>  
            </div>
            </div>
            </div>
        </div>
        <div class="nav2">
            <div class="header-and-nav-wrapper">
                <ul>
                    <li><a href="index.php">Početna</a></li>
                    <li><div class="dropdown">
                    <a href="categories_page.php"><button class="button_dropdown"><b>Kategorije</b><i style="margin: 5px;" class="fa-solid fa-chevron-down"></i></button></a>
                    <div class="dropdown-options">
                    <?php
                    $sql="SELECT * FROM kategorije ORDER BY naziv_kategorije";
                    $res=$db->query($sql);
                    $count= mysqli_num_rows($res);
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $kategorija_id = $row['kategorija_id'];
                            $naziv_kategorije = $row['naziv_kategorije'];
                            $slika_kategorije = $row['slika_kategorije'];
                            ?> 
                        <a id="dropdown" onmouseenter="this.style.background='#ededed';" onmouseout="this.style.background='white';" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>offers_page.php?kategorija_id=<?php echo $kategorija_id; ?>"><?php echo $naziv_kategorije; ?></a>
                    <?php
                        }
                    }
                    else
                    {
                        echo "<div class='greska-msg'>Kategorija nije dodata.</div>";
                    }
                    ?>
                    </div>
                    </div></li>
                    <li><a href="promotions.php">Akcije</a></li>
                    <li><a href="asus_page.php"><b>ASUS proizvodi</b></a></li>
                    <li><a href="rtx_4090.php"><b>RTX 4090</b></a></li>
                    <li><a href="contact_page.php">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper">