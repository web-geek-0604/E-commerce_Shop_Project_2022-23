<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="categories-container">
    <div class="content-wrapper">
        <div class="latest-added-container">
            <h2 class="categories-heading">POSLEDNJE DODATI PROIZVODI</h2>
            <?php $sql1 = "SELECT * FROM pogledProizvodi order by proizvod_id DESC LIMIT 5";
            $res1 = mysqli_query($db, $sql1);
            $count1 = mysqli_num_rows($res1);
            if($count1>0)
            {
            while($row=mysqli_fetch_assoc($res1))
                {
                $proizvod_id = $row['proizvod_id'];
                $naziv = $row['naziv'];
                $glavna_slika = $row['glavna_slika'];
            ?>
            <div class="admin-product-box">
            <?php 
                if($glavna_slika=="")
                {
                    echo "<div class='greska-msg'>Slika nije dodata.</div>";
                }
                else
                {
                    ?>
                <a style="text-decoration:none" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><img class="admin-box-img" src="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/products/<?php echo $glavna_slika; ?>" alt="<?php echo $glavna_slika; ?>"></a><br>
                <?php
                }
                ?>
            <div class="proizvod-naziv">
            <a class="product-name" href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'?>product_page.php?proizvod_id=<?php echo $proizvod_id; ?>"><?php echo $naziv; ?></a>
            </div>
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
    <div class="control-panel">
        <div class="content1">
        <h1 class="categories-heading">KONTROLNI PANEL</h1>
            <h2 class="categories-heading">Napomene</h2>
            <form action="admin-main.php" method="POST">
                <textarea name="tekst" rows="10" cols="80" style="font-size:15px;"></textarea><br>
                <button class="postavi-btn" name="submit">Postavi</button>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $tekst=$_POST['tekst'];
                    $podaci=$_SESSION['podaci'];

                $sql="INSERT INTO napomene (tekst, podaci) VALUES ('$tekst', '$podaci');";
                mysqli_query($db, $sql);    
                }
            ?>
            <div class="notes-container">
            <?php
                $sql2="SELECT * FROM napomene ORDER BY napomena_id DESC";
                $res2 = mysqli_query($db, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0){
                while($row=mysqli_fetch_assoc($res2)){
                $napomena_id=$row['napomena_id'];
                $tekst=$row['tekst'];
                $vremeK=$row['vremeK'];
                $podaci=$row['podaci'];
                $newDate = date("d.m.Y. H:i", strtotime($vremeK)); 
            ?>
            <div class="notes-div">
                <?php echo "<div class='podaci-box'>$tekst</div>" ?>
                <?php echo "<div class='podaci-box'>{$podaci} | <i>$newDate</i></div>" ?>
            </div>
            <?php
                }
                    }
                else{
                        echo "Napomena ne postoji";
                    } 
            ?>
        </div>
        </div>
            <h2 class="categories-heading">Pregled nedovršenih porudžbina</h2>
            <div class="notes-container">
            <?php
                $sql="SELECT * FROM pogledKorpa WHERE status_kupovine='Na dostavi' OR status_kupovine='U pripremi' AND kupljen=1 ORDER BY korpa_id DESC";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $korpa_id=$row['korpa_id'];
                        $naziv=$row['naziv'];
                        $cena=$row['korisnik_id'];
                        $status_kupovine=$row['status_kupovine'];
                        $datum_kupovine=$row['datum_kupovine'];
                        $korisnik_id=$row['korisnik_id'];
                        $newDate = date("d.m.Y. H:i", strtotime($datum_kupovine));  
                    ?>
                    <div class="notes-div">
                        <?php echo "<div class='podaci-box'>ID: $korpa_id</div>" ?>
                        <?php echo "<div class='podaci-box'>ID korisnika: $korisnik_id</div>" ?>
                        <?php echo "<div class='podaci-box'>Datum kupovine: <i>$newDate</i></div>" ?>
                        <?php echo "<div class='podaci-box'>Status kupovine: $status_kupovine</div>" ?><br>
                        <?php echo "<a href='http://localhost/GWarehouse_IT_Online_Shop/admin-section/order-edit.php?korpa_id=$korpa_id'><button class='postavi-btn'>Izmeni</button></a>" ?>
                    </div>
                    <?php
                    }
                    
                }
                else{
                    echo "Nema porudžbina za pregled!";
                }
            ?>
        </div>
        <div class="content3">
            <h2 class="categories-heading">Statistika i ukupna prodaja</h2>
            <div class="products-sum-wrapper">
            <div class="products-sum">
                <h3>Ukupno proizvoda:</h3>
                <?php
                    $sql="SELECT * FROM pogledProizvodi";
                    $res=mysqli_query($db, $sql);
                    $count=mysqli_num_rows($res);
                ?>
                <p style="font-size: 30px;"><b><?php echo $count; ?></b></p>
                <h3>Ukupna prodaja:</h3>
                <?php $sql4 = "SELECT SUM(cena) AS Ukupno FROM pogledKorpa WHERE status_kupovine='Dostavljeno' AND kupljen=1";
                    $res4 = mysqli_query($db, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $ukupna_zarada = $row4['Ukupno'];
                ?>   
                <p style="font-size: 30px;"><b><?php echo number_format($ukupna_zarada,2,",","."); ?> RSD</b></p>
            </div>
            <div class="products-sum" style="overflow-y: scroll; height: 350px;">
                <h3>Ukupno proizvoda po kategorijama: </h3>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Gejming stolovi i stolice'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Gejming stolovi i stolice: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Gotove konfiguracije'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Gotove konfiguracije: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Grafičke karte'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Grafičke karte: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Hard diskovi i SSD'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Hard diskovi i SSD: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Hladnjaci i oprema'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Hladnjaci i oprema: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Kablovi i adapteri'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Kablovi i adapteri: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Konzole i oprema'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Konzole i oprema: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Laptopovi i oprema'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Laptopovi i oprema: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Matične ploče'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Matične ploče: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Monitori'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Monitori: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Napajanja'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Napajanja: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Procesori'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Procesori: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='RAM memorije'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>RAM memorije: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Slušalice i mikrofoni'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Slušalice i mikrofoni: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='Tastature i miševi'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>Tastature i miševi: <?php echo $count; ?></p><hr>
                <?php
                $sql="SELECT * FROM pogledProizvodi WHERE naziv_kategorije='USB flash memorije'";
                $res=mysqli_query($db, $sql);
                $count=mysqli_num_rows($res);
                ?>
                <p>USB flash memorije: <?php echo $count; ?></p><hr>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
    <?php include('../header_and_footer/admin/footer.php') ?>