<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
    <h1 class="products-heading">ADMINISTRATORI</h1>
    <table class="products-table">
        <tr>
            <th>ID:</th>
            <th>Ime:</th>
            <th>Prezime:</th>
            <th>Email:</th>
        </tr>
        <?php
    $sql="SELECT * FROM administratori WHERE obrisan=0";
    $res=mysqli_query($db, $sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $administrator_id = $row['administrator_id'];
            $ime = $row['ime'];
            $prezime = $row['prezime'];
            $email = $row['email'];
            ?>
        <tr>
            <td><?php echo $administrator_id; ?></td>
            <td><?php echo $ime; ?></td>
            <td><?php echo $prezime; ?></td>
            <td><?php echo $email; ?></td>
        </tr>
        <?php
        }
    }
    else{
        echo "<div>Nema administratora u bazi podataka!</div>";
    }
        ?>
    </table>
</div>