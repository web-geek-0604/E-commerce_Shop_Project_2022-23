<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
<h1 class="products-heading">PORUDŽBINE</h1>
<div>
    <table class="products-table">
        <tr>
            <th>ID :</th>
            <th>Datum kupovine:</th>
            <th>Status kupovine:</th>
            <th>ID proizvoda:</th>
            <th>Naziv proizvoda:</th>
            <th>Cena:</th>
            <th>Ime i prezime korisnika:</th>
            <th>Telefon:</th>
            <th>Adresa:</th>
            <th>Funkcije:</th>
        </tr>
    <?php
    $sql3="SELECT * FROM pogledKorpa ORDER BY korpa_id DESC";
    $res2=mysqli_query($db, $sql3);
    $count2=mysqli_num_rows($res2);
    if($count2>0){
        while($row=mysqli_fetch_assoc($res2)){
            $korpa_id=$row['korpa_id'];
            $datum_kupovine=$row['datum_kupovine'];
            $status_kupovine=$row['status_kupovine'];
            $proizvod_id=$row['proizvod_id'];
            $naziv=$row['naziv'];
            $cena=$row['cena'];
            $ime_korisnika=$row['ime_korisnika'];
            $prezime_korisnika=$row['prezime_korisnika'];
            $telefon_korisnika=$row['telefon_korisnika'];
            $adresa_korisnika=$row['adresa_korisnika'];
            $newDate = date("d.m.Y. H:i", strtotime($datum_kupovine));  
        ?>
        <tr>
            <td><?php echo $korpa_id; ?></td>
            <td><?php echo $newDate; ?></td>
            <td><?php echo $status_kupovine; ?></td>
            <td><?php echo $proizvod_id; ?></td>
            <td><?php echo $naziv; ?></td>
            <td><?php echo $cena; ?></td>
            <td><?php echo $ime_korisnika." ".$prezime_korisnika; ?></td>
            <td><?php echo $telefon_korisnika; ?></td>
            <td><?php echo $adresa_korisnika; ?></td>
            <td><a href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>admin-section/order-edit.php?korpa_id=<?php echo $korpa_id; ?>"><button class="postavi-btn">Izmeni</button></a></td>
        </tr>
        <?php
    }
}
    else{
        echo "<div>Nema brenda u bazi podataka!</div>";
    }
        ?>
    </table>
        </div>
    <?php
    ?>
        </div>
</div>