<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper" style="height: 800px;">
    <h1 class="products-heading">KORISNICI</h1>
    <table class="products-table">
        <tr>
            <th>ID:</th>
            <th>Ime:</th>
            <th>Prezime:</th>
            <th>Email:</th>
            <th>Telefon:</th>
            <th>Adresa:</th>
        </tr>
        <?php
    $sql="SELECT * FROM korisnici WHERE obrisan=0";
    $res=mysqli_query($db, $sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $korisnik_id = $row['korisnik_id'];
            $ime = $row['ime'];
            $prezime = $row['prezime'];
            $email = $row['email'];
            $telefon = $row['telefon'];
            $adresa = $row['adresa'];
            ?>
        <tr>
            <td><?php echo $korisnik_id; ?></td>
            <td><?php echo $ime; ?></td>
            <td><?php echo $prezime; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $telefon; ?></td>
            <td><?php echo $adresa; ?></td>
        </tr>
        <?php
        }
    }
    else{
        echo "<div>Nema korisnika u bazi podataka!</div>";
    }
        ?>
    </table>
</div>