<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<?php
    if(isset($_SESSION['add-category']))
    {
        echo $_SESSION['add-category'];
        unset($_SESSION['add-category']);
    }
    ?>
    <div class="products-wrapper">
<h1 class="products-heading">DODAJ KATEGORIJU</h1>
<form action="add-category.php" class="add-product-form" method="POST" enctype="multipart/form-data">
    <label>Naziv:</label><br>
    <input type="text" name="naziv" placeholder="Unesite naziv kategorije" style="width: 500px;"><br>
    <label>Izaberite sliku:</label><br>
    <input type="file" name="uploadfile"><br>
    <input type="submit" name="submit" value="Dodaj kategoriju" class="add-btn">
</form>
<?php
    if (isset($_POST['submit'])){
        $naziv_kategorije = $_POST['naziv'];
        $slika_kategorije = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/categories/".$slika_kategorije;
        $upload = move_uploaded_file($tempname, $folder);

        $sql1 = "INSERT INTO kategorije (naziv_kategorije, slika_kategorije) 
        VALUES ('$naziv_kategorije', '$slika_kategorije');";
        $res1 = mysqli_query($db, $sql1);

        if ($res1==true){
            $_SESSION['add-category'] = "<div class='success-msg'>Kategorija je uspešno dodata. </div>";
            
            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/categories.php'); 
        }else{
            $_SESSION['add-category'] = "<div class='greska-msg'>Kategorija nije dodata. </div>";

            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/add-category.php'); 
        }
    }
?>
    </div>