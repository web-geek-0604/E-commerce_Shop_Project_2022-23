<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
<?php
    if(isset($_SESSION['product-add']))
    {
        echo $_SESSION['product-add'];
        unset($_SESSION['product-add']);
    }
    
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['update-product']))
    {
        echo $_SESSION['update-product'];
        unset($_SESSION['update-product']);
    }
?>
    <h1 class="products-heading">PROIZVODI</h1>
    <a href="product-add.php"><button class="add-btn" style="font-size:13px;">Dodaj proizvod</button></a>
    <form class="products-form" action="" method="POST">
        <label style="font-size: 18px;">Izaberite kategoriju:</label>
        <select name="naziv_kategorije">
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
                    <option value="<?php echo $kategorija_id ?>" <?php echo (isset($_POST['naziv_kategorije']) && $_POST['naziv_kategorije']==$kategorija_id) ? 'selected' : ''; ?>><?php echo $naziv_kategorije; ?></option>
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
        </select>
        <input type="submit" style="padding:5px; cursor:pointer" name="submit" value="Pretraga">
    </form>
    <?php if(isset($_POST['naziv_kategorije']) && isset($_POST['submit'])){
        $kategorija_id = $_POST['naziv_kategorije'];
        $sql= "SELECT * FROM pogledProizvodi WHERE aktivno='Da' AND kategorija_id='$kategorija_id'";
        $res1 =mysqli_query($db, $sql);
        $count1 = mysqli_num_rows($res1);
        if($count1>0){
        $proizvodi = mysqli_fetch_all($res1, MYSQLI_ASSOC);
        }
        else{
        echo "<p>Nema proizvoda u kategoriji</p>";
        }
    }
    ?>
    <?php
    if(isset($proizvodi)>0)
        {
    ?>
    <table class="products-table">
        <tr>
            <th>ID:</th>
            <th>Glavna slika</th>
            <th>Naziv:</th>
            <th>Stara cena:</th>
            <th>Nova cena:</th>
            <th>Kategorija:</th>
            <th>Brend:</th>
            <th>Model:</th>
            <th>Specifikacije:</th>
            <th>Opis proizvoda:</th>
            <th>Status:</th>
            <th>Izdvojeno:</th>
            <th>Aktivno:</th>
            <th>Funkcije:</th>
        </tr>
    <?php
    if(count($proizvodi)>0)
    {
        foreach($proizvodi as $proizvod){
            ?>
        <td><?php echo $proizvod['proizvod_id']; ?></td>
        <td><a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod['proizvod_id']; ?>"><img style="width:100px"; src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $proizvod['glavna_slika']; ?>" alt="<?php echo $proizvod['glavna_slika']; ?>"></a></td>
        <td style="width: 500px;"><a href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod['proizvod_id']; ?>"><?php echo $proizvod['naziv']; ?></a></td>
        <td><?php echo $proizvod['stara_cena']; ?></td>
        <td><?php echo $proizvod['nova_cena']; ?></td>
        <td><?php echo $proizvod['naziv_kategorije']; ?></td>
        <td><?php echo $proizvod['naziv_brenda']; ?></td>
        <td><?php echo $proizvod['model']; ?></td>
        <td class="text-wrapper"><?php echo $proizvod['specifikacije']; ?></td>
        <td class="text-wrapper"><?php echo $proizvod['opis_proizvoda']; ?></td>
        <td><?php echo $proizvod['status']; ?></td>
        <td><?php echo $proizvod['izdvojeno']; ?></td>
        <td><?php echo $proizvod['aktivno']; ?></td>
        <td><a href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>admin-section/update-product.php?proizvod_id=<?php echo $proizvod ['proizvod_id']; ?>"><button class="postavi-btn" style="margin: 5px;">Izmeni</button></a>
         <a href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>admin-section/delete-product.php?proizvod_id=<?php echo $proizvod ['proizvod_id']; ?>"><button class="postavi-btn" style="margin: 5px 7px;">Obriši</button></a></td>
    </tr> 
        <?php
    }
        }
        else{
            echo "<div>Nema proizvoda u bazi podataka!</div>";
        }
            ?>
    </table>
    <?php
}
    ?>
</div>
