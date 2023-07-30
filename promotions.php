<?php include('header_and_footer/header_and_nav.php') ?>
<h1 class="section-heading">Najbolji proizvodi na akciji</h1>
<div class="offers-wrapper">
    <div class="offers-flex-div">
        <?php $sql1 = "SELECT * FROM proizvodi WHERE stara_cena-nova_cena>10000";
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
                        <p class="price"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
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
        ?>
    </div>
</div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>
<script src="./js/product.js"></script>