<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
    <?php
    if(isset($_SESSION['delete-category']))
    {
        echo $_SESSION['delete-category'];
        unset($_SESSION['delete-category']);
    }

    if(isset($_SESSION['add-category']))
    {
        echo $_SESSION['add-category'];
        unset($_SESSION['add-category']);
    }
    ?>
    <h1 class="products-heading">KATEGORIJE</h1>
    <a href="add-category.php"><button class="add-btn" style="font-size:13px;">Dodaj kategoriju</button></a>
    <table class="products-table">
        <tr>
            <th>ID:</th>
            <th>Slika:</th>
            <th>Naziv:</th>
            <th>Funkcije:</th>
        </tr>
    <?php
    $sql="SELECT * FROM kategorije WHERE obrisan=0";
    $res=mysqli_query($db, $sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $kategorija_id = $row['kategorija_id'];
            $slika_kategorije= $row['slika_kategorije'];
            $naziv_kategorije = $row['naziv_kategorije'];
            ?>
        <tr>
            <td><?php echo $kategorija_id; ?></td>
            <?php
            if('slika_kategorije'==""){
                echo "<td><p>Slika nije dodata</p></td>";
            }
            else{
            ?>
                <td><img src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/categories/<?php echo $slika_kategorije; ?>" style="width: 80px;"></td>
            <?php
            }
            ?>
            <td><?php echo $naziv_kategorije; ?></td>
            <td><a style="text-decoration:none;" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>admin-section/delete-category.php?kategorija_id=<?php echo $kategorija_id; ?>"><button class="postavi-btn">Obriši</button></a></td>
        </tr>
        <?php
    }
}
    else{
        echo "<div>Nema kategorije u bazi podataka!</div>";
    }
        ?>
    </table>
</div>