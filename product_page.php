<?php include('header_and_footer/header_and_nav.php') ?>
<?php
if(isset($_GET['proizvod_id']))
{
    $proizvod_id=$_GET['proizvod_id'];
    $sql = "SELECT * FROM pogledProizvodi WHERE proizvod_id=$proizvod_id";
    $res=$db->query($sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        $row = mysqli_fetch_assoc($res);

        $proizvod_id = $row['proizvod_id'];
        $naziv = $row['naziv'];
        $stara_cena = $row['stara_cena'];
        $nova_cena = $row['nova_cena'];
        $kategorija_id = $row['kategorija_id'];
        $izdvojeno = $row['izdvojeno'];
        $aktivno = $row['aktivno'];
        $model = $row['model'];
        $specifikacije = $row['specifikacije'];
        $opis_proizvoda = $row['opis_proizvoda'];
        $brend_id = $row['brend_id'];
        $status = $row['status'];
        $obrisan = $row['obrisan'];
        $slika_brenda = $row['slika_brenda'];
    }
    else
    {
        header('location:http://localhost/GWarehouse_IT_Online_Shop/');
    }
}
else
{
    header('location:http://localhost/GWarehouse_IT_Online_Shop/');
}
?>
<div class="product_page_wrapper">
    <div class="product_page_container">
        <div class="product_img_container">
            <div class="brand_logo_container">
                    <img src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/brands/<?php echo $slika_brenda; ?>"
                     alt="<?php echo $slika_brenda; ?>">
            </div>
            <?php
                $sql="SELECT * FROM slikeProizvoda WHERE proizvod_id={$_GET['proizvod_id']}";
                echo "<script> let slike=[];";
                $res=$db->query($sql);
                while($row=mysqli_fetch_object($res)){
                echo "slike.push('images/products/{$row->naziv_slike}');";
                }
                echo "</script>";
            ?>
            <div class="galerija-display">
                <div id="galerija"></div>
                <div id="slikeNiz"></div>
            </div>
        </div>
    </div>
    <div class="product_info">
            <h1 class="product_heading"><?php echo $naziv; ?></h1>
            <?php   
        if($status=="Na stanju")
        {
            echo "<label class='product_status' style='color: green;'>$status</label>";
        }
        else
        {
            echo "<label class='product_status' style='color: red;'>$status</label>";
        }
            ?>
        <div class="product_price_crossed">
            <p><?php echo number_format($stara_cena,2,",","."); ?> RSD</p>
            <div class="discount-container" style="text-decoration:none">
                <?php
                $popust = (1 - $nova_cena / $stara_cena) * 100;
                ?>
                <p style="margin: 10px"><?php echo round($popust); ?>%</p>
            </div>
            <?php if($nova_cena>=5000){
                echo "<img src='images/free_delivery_logo.png' style='max-width: 100px;'>";
            }
            else{
                echo "<img src='images/free_delivery_logo.png' style='max-width: 100px; display: none;'>";
            }
            ?>   
        </div>
        <p class="product_price"><?php echo number_format($nova_cena,2,",","."); ?> RSD</p>
        <div class="short-description">
            <h1 class="spec_heading" style="margin:0">Opis proizvoda</h1>
            <p class="info_text"><?php echo $opis_proizvoda; ?></p>
            <?php
                echo"<button class='add_to_cart_button' onclick='addProduct({$proizvod_id})'>Dodaj u korpu</button>";
            ?>
        </div>
    </div>
</div>
    <div class="product_specifications">
        <h1 class="spec_heading1">+ Specifikacije proizvoda</h1>
        <table class='specs-table'>
        <?php 
        $dump = explode(";",$specifikacije);
        foreach($dump as $value){
            echo 
            "<tr>
                <td>$value</td>
            </tr>";
    }
        ?>
        </table>
    </div>
    <div class="comments-wrapper">
        <h2 class="spec_heading">Komentari</h2>
        <?php 
        if(login_user()){
        ?>
        <form action="product_page.php?proizvod_id=<?= $proizvod_id ?>" method="post">
            <input type="text" name="ime" placeholder="Unesite ime" style="padding: 8px;" value="<?= $_SESSION['korisnik']; ?>"><br><br>
            <textarea name="komentar" placeholder="Unesite komentar" cols="50" rows="15" ></textarea><br><br>
            <button name="submit" style="padding:10px;">Pošalji komentar</button>
        </form>
        <?php 
        }
        ?>
    </div>
    <?php
    if(isset($_GET['proizvod_id'])){
        if(isset($_POST['ime']) and isset($_POST['komentar'])){
            $ime=$_POST['ime'];
            $komentar=$_POST['komentar'];
            $ime=filter_var($ime, FILTER_SANITIZE_STRING);
            $komentar=filter_var($komentar, FILTER_SANITIZE_STRING);
            if($ime!="" and $komentar!=""){
                $sql2="INSERT INTO komentari (proizvod_id, ime, komentar) VALUES ($proizvod_id, '$ime', '$komentar')";
                $db->query($sql2);
            }else{
                echo "<div class='greska-msg'>Svi podaci su obavezni!</div>";
            }
        }
    }
    ?>
    <div class="notes-div">
    <?php
    
    $sql3="SELECT * FROM komentari WHERE proizvod_id=$proizvod_id AND odobren=1 ORDER BY komentar_id DESC";
    $res2=$db->query($sql3);
    $count2=mysqli_num_rows($res2);
    if($count2>0){
        while($row=mysqli_fetch_assoc($res2)){
        $komentar_id=$row['komentar_id'];
        $komentar=$row['komentar'];
        $vreme=$row['vreme'];
        $ime=$row['ime'];
        $newDate = date("d.m.Y. H:i", strtotime($vreme));
    ?>
        <div class="comment-container">
        <div class="podaci-box"><b><?= $ime ?></b> | <i><?= $newDate ?></i></div>
        <div class="podaci-box"><?= $komentar ?></div>
        </div>
    <?php
        }
            }
        else{
                echo "<p>Nema komentara za proizvod. Budite prvi!</p>";
            }
    ?>
        </div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
        $(".spec_heading1").click(function(){
        $(".specs-table").toggle(1000);
        })
    })
</script>
<script src="./js/galerija.js"></script>
<script src="./js/product.js"></script>