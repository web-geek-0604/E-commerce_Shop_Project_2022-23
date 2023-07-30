<?php include('header_and_footer/header_and_nav.php') ?>
<?php 

    if(isset($_GET['kategorija_id']))
    {
        $kategorija_id = $_GET['kategorija_id'];
        
        $sql = "SELECT naziv_kategorije FROM kategorije WHERE kategorija_id=$kategorija_id";
        $res=$db->query($sql);
        $row = mysqli_fetch_assoc($res);
        $naziv_kategorije = $row['naziv_kategorije'];
    }
    else
    {
        header('location:http://localhost/GWarehouse_IT_Online_Shop/');
    }
?>
<h1 class="offers-heading"><?php echo $naziv_kategorije; ?></h1>
<div class="sort-div">
    <form action="offers_page.php" method="post">
        <label style="font-size: 18px">Sortiraj prema:</label>
        <select style="padding: 5px; font-size: 15px;"  name="filters" id="sort" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option value="">Izaberite sortiranje</option>    
        <option value="offers_page.php?sort=Najjeftinije&kategorija_id=<?php echo $kategorija_id ?>">Najjeftinije prvo</option>
            <option value="offers_page.php?sort=Najskuplje&kategorija_id=<?php echo $kategorija_id ?>">Najskuplje prvo</option>
        </select>
    </form>
</div>
<div class="offers-wrapper">
    <div class="offers-filters">
    </div>
        <div class="offers-flex-div">
    <?php 
    $sort="Najjeftinije";
    if(isset($_GET['sort'])){
        $sort=$_GET['sort'];
    }
    if($sort=="Najjeftinije")
    $sql1 = "SELECT * FROM pogledProizvodi WHERE kategorija_id=$kategorija_id ORDER BY nova_cena ASC";
    else
    $sql1 = "SELECT * FROM pogledProizvodi WHERE kategorija_id=$kategorija_id ORDER BY nova_cena DESC";
    $res1=$db->query($sql1);
    $count1 = mysqli_num_rows($res1);
    if($count1>0)
    {
    while($row=mysqli_fetch_assoc($res1)){
    
        $proizvod_id = $row['proizvod_id'];
        $naziv = $row['naziv'];
        $stara_cena = $row['stara_cena'];
        $nova_cena = $row['nova_cena'];
        $glavna_slika = $row['glavna_slika'];
        $kategorija_id = $row['kategorija_id'];
        ?>
            <div class="product-box">
                <div class="discount-container">
                <?php
                    $popust = (1 - $nova_cena / $stara_cena) * 100;      
                ?>
                    <p style="margin: 10px; "><?php echo round($popust); ?>%</p>
                </div>
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a><br>
                    <div class="proizvod-naziv">
                <a class="product-name" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
                </div>
                <p class="price-crossed"><b><?php echo number_format($stara_cena,2,",","."); ?> RSD</b></p>
                <p class="price" id="nova_cena"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
                <?php
                echo"<button class='buy_button'><img src='./images/shopping_cart.png' alt='buy_ic' onclick='addProduct({$row['proizvod_id']})'></button>";
                ?>
            </div>
            <?php
        }

    }
    else
    {
        echo "<div class='greska-msg'>Proizvod nije dodat.</div>";
    }
    ?></div>
    </div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>
<script src="./js/product.js"></script>