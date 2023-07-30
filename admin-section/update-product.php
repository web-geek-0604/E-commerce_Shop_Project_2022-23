<?php ob_start() ?>
<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>

<?php  
        $proizvod_id = $_GET['proizvod_id'];

        $sql2 = "SELECT * FROM proizvodi WHERE proizvod_id=$proizvod_id";
        $res2 = mysqli_query($db, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $naziv = $row2['naziv'];
        $stara_cena = $row2['stara_cena'];
        $nova_cena = $row2['nova_cena'];
        $trenutna_kategorija = $row2['kategorija_id'];
        $trenutni_brend = $row2['brend_id'];
        $model = $row2['model'];
        $specifikacije = $row2['specifikacije'];
        $opis_proizvoda = $row2['opis_proizvoda'];
        $status = $row2['status'];
        $izdvojeno = $row2['izdvojeno'];
        $aktivno = $row2['aktivno'];
?>
<h1 class="products-heading">AŽURIRAJ PROIZVOD</h1>
<form action="" class="add-product-form" method="POST">
    <label>Naziv:</label><br>
    <input type="text" name="naziv" value="<?php echo $naziv; ?>" style="width: 500px;"><br>
    <label>Stara cena:</label><br>
    <input type="number" name="stara_cena" value="<?php echo $stara_cena; ?>"><br>
    <label>Nova cena:</label><br>
    <input type="number" name="nova_cena" value="<?php echo $nova_cena; ?>"><br>
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

                    <option <?php if($trenutna_kategorija==$kategorija_id){echo"selected";} ?> value="<?php echo $kategorija_id; ?>"><?php echo $naziv_kategorije; ?></option>
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

                    <option <?php if($trenutni_brend==$brend_id){echo "selected";} ?> value="<?php echo $brend_id; ?>"><?php echo $naziv_brenda; ?></option>
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
    <input type="text" name="model" value="<?php echo $model; ?>"><br>
    <label>Specifikacije:</label><br>
    <textarea id="specifikacije" name="specifikacije" rows="10" cols="60"><?php echo $specifikacije; ?></textarea><br>
    <label>Opis proizvoda:</label><br>
    <input type="hidden" name="proizvod_id" value="<?php echo $proizvod_id; ?>">
    <textarea id="opis_proizvoda" name="opis_proizvoda" rows="10" cols="60"><?php echo $opis_proizvoda; ?></textarea><br>
    <label>Status:</label><br>
    <select name="status">
        <option <?php if($status=="Na stanju"){echo "selected";} ?> value="Na stanju">Na stanju</option>
        <option <?php if($status=="Nije na stanju"){echo "selected";} ?> value="Nije na stanju">Nije na stanju</option>
    </select><br>
    <label>Izdvojeno:</label><br>
    <input <?php if($izdvojeno=="Da"){echo "checked";} ?> type ="radio" name="izdvojeno" value="Da"> Da<br>
    <input <?php if($izdvojeno=="Ne"){echo "checked";} ?> type ="radio" name="izdvojeno" value="Ne"> Ne<br>
    <label>Aktivno:</label><br>
    <input <?php if($aktivno=="Da"){echo "checked";} ?> type ="radio" name="aktivno" value="Da"> Da<br>
    <input <?php if($aktivno=="Ne"){echo "checked";} ?> type ="radio" name="aktivno" value="Ne"> Ne<br>
    <input type="submit" name="submit" value=" Ažuriraj podatke" class="add-btn">
</form>

<?php  
    
    if(isset($_POST['submit']))
    {
        $proizvod_id = $_POST['proizvod_id'];
        $naziv = $_POST['naziv'];
        $stara_cena = $_POST['stara_cena'];
        $nova_cena = $_POST['nova_cena'];
        $kategorija = $_POST['kategorija'];
        $brend = $_POST['brend'];
        $model = $_POST['model'];
        $specifikacije = $_POST['specifikacije'];
        $opis_proizvoda = $_POST['opis_proizvoda'];
        $status = $_POST['status'];
        $izdvojeno = $_POST['izdvojeno'];
        $aktivno = $_POST['aktivno'];

        $sql3 = "UPDATE proizvodi SET
        naziv = '$naziv',
        stara_cena = $stara_cena,
        nova_cena = $nova_cena,
        kategorija_id = '$kategorija',
        brend_id = '$brend',
        model = '$model',
        specifikacije = '$specifikacije',
        opis_proizvoda = '$opis_proizvoda',
        status = '$status',
        izdvojeno = '$izdvojeno',
        aktivno = '$aktivno'
        WHERE proizvod_id=$proizvod_id
        ";
        $res3 = mysqli_query($db, $sql3);

        if($res3==true)
        {
            $_SESSION['update-product'] = "<div class='success-msg'>Proizvod je uspešno ažuriran. </div>";
            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php'); 
        }                  
        else
        {
            $_SESSION['update-product'] = "<div class='greska-msg'>Proizvod nije ažuriran. </div>";
            header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php');
        }   
    }
?>
<?php include('../header_and_footer/admin/footer.php') ?>