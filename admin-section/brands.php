<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
    <?php
    if(isset($_SESSION['delete-brand']))
    {
        echo $_SESSION['delete-brand'];
        unset($_SESSION['delete-brand']);
    }

    if(isset($_SESSION['add-brand']))
    {
        echo $_SESSION['add-brand'];
        unset($_SESSION['add-brand']);
    }
    ?>
    <h1 class="products-heading">BRENDOVI</h1>
    <a href="add-brand.php"><button class="add-btn" style="font-size:13px;">Dodaj brend</button></a>
    <table class="products-table">
        <tr>
            <th>ID:</th>
            <th>Slika:</th>
            <th>Naziv:</th>
            <th>Funkcije:</th>
        </tr>
    <?php
    $sql="SELECT * FROM brendovi WHERE obrisan=0 ORDER BY naziv_brenda";
    $res=mysqli_query($db, $sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $brend_id = $row['brend_id'];
            $slika_brenda= $row['slika_brenda'];
            $naziv_brenda = $row['naziv_brenda'];
            ?>
        <tr>
            <td><?php echo $brend_id; ?></td>
            <?php
            if('slika_brenda'==""){
                echo "<td><p>Slika nije dodata</p></td>";
            }
            else{
            ?>
                <td><img src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/brands/<?php echo $slika_brenda; ?>" style="width: 80px;"></td>
            <?php
            }
            ?>
            <td><?php echo $naziv_brenda; ?></td>
            <td><a style="text-decoration:none;" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>admin-section/delete-brand.php?brend_id=<?php echo $brend_id; ?>"><button class="postavi-btn">Obriši</button></a></td>
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