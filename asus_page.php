<?php include('header_and_footer/header_and_nav.php') ?>
<div class="products-wrapper" style="background-color:#000; padding: 30px;">
    <div class="asus-logo">
    <img src="images/rog-logo1.gif" alt="rog-logo" style="width: 300px;">
    </div>
    <div class="asus-logo">
    <h2 class="asus-rog-heading" style="margin-bottom: 100px;">Najbolja ponuda iz Asus ROG serije</h2>
    </div>
    <div class="sort-div" style="margin: 10px 130px">
    <form action="asus_page.php" method="post">
        <label style="font-size: 18px; color: #ffff">Sortiraj prema:</label>
        <select style="padding: 5px; font-size: 15px;"  name="filters" id="kategorija" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option value="">Izaberite kategoriju</option>    
        <option value="asus_page.php?kategorija=Monitori">Monitori</option>
        <option value="asus_page.php?kategorija=Graficke">Grafičke karte</option>
        <option value="asus_page.php?kategorija=Laptopovi">Laptopovi i oprema</option>
        <option value="asus_page.php?kategorija=Slusalice">Slušalice i mikrofoni</option>
        <option value="asus_page.php?kategorija=Hladnjaci"> Hladnjaci i oprema</option>
        <option value="asus_page.php?kategorija=Napajanja">Napajanja</option>
        <option value="asus_page.php?kategorija=Misevi">Miševi i tastature</option>
        </select>
    </form>
</div>
    <div class="rog-content">
    <?php  
      $kategorija="Graficke";
      $kategorija="Monitori";
      $kategorija="Laptopovi";
      $kategorija="Slusalice";
      $kategorija="Napajanja";
      $kategorija="Hladnjaci";
      $kategorija="Misevi";
      if(isset($_GET['kategorija'])){
          $kategorija=$_GET['kategorija'];
      }
      if($kategorija=="Graficke")
      $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Grafičke karte' ORDER BY nova_cena ASC";
      else if($kategorija=="Monitori")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Monitori' ORDER BY nova_cena ASC";
        else if($kategorija=="Laptopovi")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Laptopovi i oprema' ORDER BY nova_cena ASC";
        else if($kategorija=="Slusalice")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Slušalice i mikrofoni' ORDER BY nova_cena ASC";
        else if($kategorija=="Napajanja")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Napajanja' ORDER BY nova_cena ASC";
        else if($kategorija=="Hladnjaci")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Hladnjaci i oprema' ORDER BY nova_cena ASC";
        else if($kategorija=="Misevi")
        $sql = "SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' and naziv_kategorije='Tastature i miševi' ORDER BY nova_cena ASC";
      else
        $sql="SELECT * FROM pogledProizvodi WHERE naziv_brenda='ROG' ORDER BY nova_cena DESC";
        $res=$db->query($sql);
        $count=mysqli_num_rows($res);

        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $proizvod_id=$row['proizvod_id'];
                $naziv=$row['naziv'];
                $stara_cena=$row['stara_cena'];
                $nova_cena=$row['nova_cena'];
                $glavna_slika=$row['glavna_slika'];
            ?>
            <div class="product-box" style="background-color:#000">
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
                <div class="proizvod-naziv">
                <a class="product-name" style="color:#fff" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
                </div>
                <p class="price-crossed"><b><?php echo number_format($stara_cena,2,",","."); ?> RSD</b></p>
                <p class="price" style="color:#fff"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
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
    <div class="asus-logo" style="margin: 200px 0;">
    <img src="images/asus-page-logo.png" alt="asus-page-logo" style="width: 200px;">
    </div>
    <div class="asus-content">
        <div class="asus-picture-section">
            <img style='height: 100%; width: 100%' src="images/offers/asus-gpu.jpg">
        </div>
        <div class="asus-product-section">
    <?php 
        $sql="SELECT * FROM pogledProizvodi WHERE naziv_brenda='Asus' AND naziv_kategorije='Grafičke karte' LIMIT 2";
        $res=$db->query($sql);
        $count=mysqli_num_rows($res);
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $proizvod_id=$row['proizvod_id'];
                $naziv=$row['naziv'];
                $stara_cena=$row['stara_cena'];
                $nova_cena=$row['nova_cena'];
                $glavna_slika=$row['glavna_slika'];
                ?>
                <div class="product-box" style="background-color:#000; height: 510px;">
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
                <div class="proizvod-naziv">
                <a class="product-name" style="color:#fff" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
                </div>
                <p class="price-crossed"><b><?php echo number_format($stara_cena,2,",","."); ?> RSD</b></p>
                <p class="price" style="color:#fff"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
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
    <div class="asus-content">
        <div class="asus-picture-section">
            <img style='height: 100%; width: 100%' src="images/offers/motherboard-asus.jpg">
        </div>
        <div class="asus-product-section">
        <?php 
        $sql="SELECT * FROM pogledProizvodi WHERE naziv_brenda='Asus' AND naziv_kategorije='Matične ploče' LIMIT 2";
        $res=$db->query($sql);
        $count=mysqli_num_rows($res);
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $proizvod_id=$row['proizvod_id'];
                $naziv=$row['naziv'];
                $stara_cena=$row['stara_cena'];
                $nova_cena=$row['nova_cena'];
                $glavna_slika=$row['glavna_slika'];
            ?>
            <div class="product-box" style="background-color:#000; height: 510px;">
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
                <div class="proizvod-naziv">
                <a class="product-name" style="color:#fff" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
                </div>
                <p class="price-crossed"><b><?php echo number_format($stara_cena,2,",","."); ?> RSD</b></p>
                <p class="price" style="color:#fff"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
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
    <div class="asus-content">
        <div class="asus-picture-section">
            <img style='height: 100%; width: 100%' src="images/offers/asus-laptop.jpg">
        </div>
        <div class="asus-product-section">
        <?php 
        $sql="SELECT * FROM pogledProizvodi WHERE naziv_brenda='Asus' AND naziv_kategorije='Laptopovi i oprema' LIMIT 2";
        $res=$db->query($sql);
        $count=mysqli_num_rows($res);
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $proizvod_id=$row['proizvod_id'];
                $naziv=$row['naziv'];
                $stara_cena=$row['stara_cena'];
                $nova_cena=$row['nova_cena'];
                $glavna_slika=$row['glavna_slika'];
            ?>
            <div class="product-box" style="background-color:#000; height: 530px;">
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
                <div class="proizvod-naziv">
                <a class="product-name" style="color:#fff" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
                </div>
                <p class="price-crossed"><b><?php echo number_format($stara_cena,2,",","."); ?> RSD</b></p>
                <p class="price" style="color:#fff"><b><?php echo number_format($nova_cena,2,",","."); ?> RSD</b></p>
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
</div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>
<script src="./js/product.js"></script>