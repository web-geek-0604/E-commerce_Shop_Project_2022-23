<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
    <div class="products-wrapper">
<h1 class="products-heading">DODAJ BREND</h1>
<form action="add-brand.php" class="add-product-form" method="POST" enctype="multipart/form-data">
    <label>Naziv:</label><br>
    <input type="text" name="naziv" placeholder="Unesite naziv brenda" style="width: 500px;"><br>
    <label>Izaberite sliku:</label><br>
    <input type="file" name="uploadfile"><br>
    <input type="submit" name="submit" value="Dodaj brend" class="add-btn">
</form>
<?php
    if (isset($_POST['submit'])){
        $naziv_brenda = $_POST['naziv'];
        $slika_brenda = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/brands/".$slika_brenda;
        $upload = move_uploaded_file($tempname, $folder);

        $sql1 = "INSERT INTO brendovi (naziv_brenda, slika_brenda) 
        VALUES ('$naziv_brenda', '$slika_brenda');";
        $res1 = mysqli_query($db, $sql1);

        if ($res1==true){
            $_SESSION['add-brand'] = "<div class='success-msg'>Brend je uspešno dodat. </div>";
            
            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/brands.php'); 
        }else{
            $_SESSION['add-brand'] = "<div class='greska-msg'>Brend nije dodat. </div>";

            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/brands.php'); 
        }
    }
?>
    </div>
