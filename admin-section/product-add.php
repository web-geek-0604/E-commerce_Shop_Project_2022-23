<?php ob_start() ?>
<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<?php
    if(isset($_SESSION['add-product']))
    {
        echo $_SESSION['add-product'];
        unset($_SESSION['add-product']);
    }
    ?>
    <div class="products-wrapper">
<h1 class="products-heading">DODAJ PROIZVOD</h1>
<form action="product-add.php" class="add-product-form" method="POST" enctype="multipart/form-data">
    <label>Naziv:</label><br>
    <input type="text" name="naziv" placeholder="Unesite naziv proizvoda" style="width: 500px;"><br>
    <label>Stara cena:</label><br>
    <input type="number" name="stara_cena" placeholder="Unesite staru cenu"><br>
    <label>Nova cena:</label><br>
    <input type="number" name="nova_cena" placeholder="Unesite novu cenu"><br>
    <label>Izaberite slike za galeriju:</label><br>
    <input type="file" name="slike[]" id="slike" accept="image/*" multiple><br>
    <label>Izaberite sliku:</label><br>
    <input type="file" name="uploadfile" id="uploadfile" accept="image/*"><br>
    <label>Kategorija:</label><br>
    <select name="kategorija">
    <?php  
        $sql= "SELECT * FROM kategorije ORDER BY naziv_kategorije";

        $res = mysqli_query($db, $sql);

        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $kategorija_id = $row['kategorija_id'];
                $naziv_kategorije = $row['naziv_kategorije'];
                ?>

                    <option value="<?php echo $kategorija_id; ?>"><?php echo $naziv_kategorije; ?></option>
                <?php
            }
        }
        else
        {
            ?>
            <option value="0">Kategorija nije pronađena</option>
            <?php
        }
    ?>
</select><br>
<label>Brend:</label><br>
    <select name="brend">
    <?php  
        $sql2= "SELECT * FROM brendovi ORDER BY naziv_brenda";

        $res2 = mysqli_query($db, $sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2>0)
        {
            while($row=mysqli_fetch_assoc($res2))
            {
                $brend_id = $row['brend_id'];
                $naziv_brenda = $row['naziv_brenda'];
                ?>

                    <option value="<?php echo $brend_id; ?>"><?php echo $naziv_brenda; ?></option>
                <?php
            }
        }
        else
        {
            ?>
            <option value="0">Brend nije pronađen</option>
            <?php
        }
    ?>
    </select><br>
    <label>Model:</label><br>
    <input type="text" name="model" placeholder="Unesite naziv modela"><br>
    <label>Specifikacije:</label><br>
    <textarea id="specifikacije" name="specifikacije" rows="4" cols="50"></textarea><br>
    <label>Opis proizvoda:</label><br>
    <textarea id="opis_proizvoda" name="opis_proizvoda" rows="4" cols="50"></textarea><br>
    <label>Status:</label><br>
    <select name="status">
        <option value="Na stanju">Na stanju</option>
        <option value="Nije na stanju">Nije na stanju</option>
    </select><br>
    <label>Izdvojeno:</label><br>
    <input type ="radio" name="izdvojeno" value="Da"> Da<br>
    <input type ="radio" name="izdvojeno" value="Ne"> Ne<br>
    <label>Aktivno:</label><br>
    <input type ="radio" name="aktivno" value="Da"> Da<br>
    <input type ="radio" name="aktivno" value="Ne"> Ne<br>
    <input type="submit" name="submit" value="Dodaj proizvod" class="add-btn">
</form>
<?php
if(isset($_POST['naziv']) and isset($_POST['stara_cena']) and isset($_POST['nova_cena']) and isset($_POST['kategorija']) and isset($_POST['brend']) and isset($_POST['model']) and isset($_POST['specifikacije']) and isset($_POST['opis_proizvoda']) and isset($_POST['status']) and isset($_POST['izdvojeno']) and isset($_POST['aktivno']) and isset($_POST['submit'])){
    $naziv=$_POST['naziv'];
    $stara_cena=$_POST['stara_cena'];
    $nova_cena=$_POST['nova_cena'];
    $kategorija=$_POST['kategorija'];
    $brend=$_POST['brend'];
    $model=$_POST['model'];
    $opis_proizvoda=$_POST['opis_proizvoda'];
    $specifikacije=$_POST['specifikacije'];
    $status=$_POST['status'];
    $izdvojeno=$_POST['izdvojeno'];
    $aktivno=$_POST['aktivno'];
    extract($_POST, EXTR_OVERWRITE);
    if($naziv!="" and $stara_cena!="0" and $nova_cena!="0" and $kategorija!="0" and $brend!="0" and $model!="" and $specifikacije!="" and $opis_proizvoda!="" and $status!="" and $izdvojeno!="" and $aktivno!=""){
        $glavna_slika = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/products/".$glavna_slika;
        $upload = move_uploaded_file($tempname, $folder);
        $upit="INSERT INTO proizvodi (naziv, glavna_slika, stara_cena, nova_cena, kategorija_id, brend_id, model, specifikacije, opis_proizvoda, status, izdvojeno, aktivno) VALUES('$naziv','$glavna_slika',$stara_cena,$nova_cena, $kategorija, $brend,'$model','$specifikacije','$opis_proizvoda','$status','$izdvojeno','$aktivno')";
        $db->query($upit);
        if($upit==true){
            $idProizvoda=$db -> insert_id;
            if($_FILES['slike']['name'][0]!=""){
                for($i=0;$i<count($_FILES['slike']['name']);$i++){
                    $ime=microtime(true)."_".$_FILES['slike']['name'][$i];
                    if(move_uploaded_file($_FILES['slike']['tmp_name'][$i], "../images/products/".$ime)){
                        $upit="INSERT INTO slikeProizvoda (proizvod_id, naziv_slike)VALUES({$idProizvoda},'{$ime}' )";
                        $db->query($upit);
                    }
                }
            }
        }
    }
    if($upit==true)
    {
        $_SESSION['update-product'] = "<div class='success-msg'>Proizvod je uspešno dodat. </div>";
        header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php'); 
    }                  
    else
    {
        $_SESSION['update-product'] = "<div class='greska-msg'>Proizvod nije dodat. </div>";
        header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php');
    }   
}
?>
    </div>
<?php include('../header_and_footer/admin/footer.php') ?>