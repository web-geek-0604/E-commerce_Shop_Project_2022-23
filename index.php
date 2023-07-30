<?php include('header_and_footer/header_and_nav.php') ?>
<div class="central">
  <div class="first-section">
    <div class="rss-div">
      <h1 class="products-heading">Najnovije vesti iz IT sveta:</h1>
      <?php
    $xml=simplexml_load_file("http://www.benchmark.rs/rss");
    $kanal=$xml->channel;
    $vesti=$kanal->item;
    $i=0;
    foreach($vesti as $vest){
        echo"<div class='najnovije'>";
        echo "<div><a href='{$vest->link}' target='_blank'>{$vest->title}</a></div>";
        echo "<br>";
        $datum=date("d.m.Y H:i:s", strtotime($vest->pubDate));
        echo "<div><i>{$datum}</i></div>";
        echo "</div>";
        echo "<hr>";
        $i++;
        if($i==10)break; 
    }
?>
    </div>
      <div class="slideshow-wrapper">
        <div class="slideshow-container">
          <img class="slideshow-image" src="./images/slideshow-images/nvidia_img.jpg" alt="Image 1">
          <img class="slideshow-image" src="./images/slideshow-images/RTX4080.jpg" alt="Image 2">
          <img class="slideshow-image" src="./images/slideshow-images/amd.png" alt="Image 3">
          <img class="slideshow-image" src="./images/slideshow-images/keyboard_img.jpg" alt="Image 3">
          <img class="slideshow-image" src="./images/slideshow-images/asus_rog.jpg" alt="Image 3">
          <img class="slideshow-image" src="./images/slideshow-images/Nvidia.jpg" alt="Image 3">
          <img class="slideshow-image" src="./images/slideshow-images/RTX3080.jpg" alt="Image 3">
          <div class="slideshow-controls">
          <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
          <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
<h1 class="section-heading">Top ponuda proizvoda</h1>
  <div class="products-flex-div">
  <?php $sql1 = "SELECT * FROM proizvodi WHERE kategorija_id=1 OR kategorija_id=4 OR izdvojeno='Da' ORDER BY RAND() LIMIT 5";
  $res1=$db->query($sql1);  
  $count1 = mysqli_num_rows($res1);
  if($count1>0)
  {
  while($row=mysqli_fetch_assoc($res1))
    {
      $proizvod_id = $row['proizvod_id'];
      $naziv = $row['naziv'];
      $glavna_slika = $row['glavna_slika'];
      $stara_cena = $row['stara_cena'];
      $nova_cena = $row['nova_cena'];
      ?>
        <div class="product-box">
          <div class="discount-container">
          <?php
              $popust = (1 - $nova_cena / $stara_cena) * 100;      
          ?>
                  <p style="margin: 10px; "><?php echo round($popust); ?>%</p>
          </div>
          <div id="img-div">
          <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
          </div>
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
    <div class="offers1">
      <div class="img-wrapper">
        <img style='height: 100%; width: 100%; object-fit: contain' src="images/offers/laptop-img.jpg" alt="laptop-img">
      </div>
      <div class="products-flex-div">
  <?php $sql4 = "SELECT * FROM proizvodi WHERE aktivno='Da' AND kategorija_id=5 ORDER BY nova_cena DESC LIMIT 2";
  $res4=$db->query($sql4);
  $count4 = mysqli_num_rows($res4);
  if($count4>0)
  {
  while($row=mysqli_fetch_assoc($res4))
    {
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
          <div class="img-div">
          <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
          </div>
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
    <div class="main">
<h1 class="section-heading">Najbolja ponuda procesora</h1>
  <div class="products-flex-div">
  <?php $sql5 = "SELECT * FROM proizvodi WHERE kategorija_id=2 ORDER BY nova_cena DESC LIMIT 5";
  $res5=$db->query($sql5);
  $count5 = mysqli_num_rows($res5);
  if($count5>0)
  {
  while($row=mysqli_fetch_assoc($res5))
    {
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
          <div class="img-div">
          <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
          </div>
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
    <div class="offers1">
      <div class="img-wrapper2">
        <img style='height: 100%; width: 100%; object-fit: contain' src="images/offers/rtx4090.png" alt="rtx4090">
      </div>
      <div class="box-container2">
        <p class="offer-heading">Najbolja graficka kartica za najbolji gejming do sada! Specijalna ponuda samo kod nas. Požurite i ugrabite Vaš primerak još danas!<a style="color:black" href="rtx_4090.php"><b>@RTX4090</b></a>
        <a href="rtx_4090.php"><button class="learn_more_button"><span>Saznajte više </span></button></a>
    </div>
  </div>
  <div class="main">
<h1 class="section-heading">Najbolja ponuda grafičkih karti</h1>
  <div class="products-flex-div">
  <?php $sql3 = "SELECT * FROM proizvodi WHERE izdvojeno='Da' AND aktivno='Da' AND kategorija_id=1 ORDER BY nova_cena DESC LIMIT 5";
  $res3=$db->query($sql3);
  $count3 = mysqli_num_rows($res3);
  if($count3>0)
  {
  while($row=mysqli_fetch_assoc($res3))
    {
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
          <div class="img-div">
          <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a>
          </div>
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
<script src="./js/slideshow.js"></script>
<script src="./js/product.js"></script>
