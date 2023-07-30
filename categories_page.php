<?php include('header_and_footer/header_and_nav.php') ?>
    <div class="categories-container">
        <h1 class="categories-heading">Izaberite kategoriju</h1>
    <div class="categories-wrapper">
    <?php
    $sql="SELECT * FROM kategorije";
    $res=$db->query($sql);
    $count= mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $kategorija_id = $row['kategorija_id'];
            $naziv_kategorije = $row['naziv_kategorije'];
            $slika_kategorije = $row['slika_kategorije'];
            ?>  
    <?php
    if($slika_kategorije=="")
    {
        echo "<div class='greska-msg'>Slika nije dostupna.</div>";
    }
    else
    {
        ?>
    <a href="<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>offers_page.php?kategorija_id=<?php echo $kategorija_id; ?>" style="text-decoration: none;"><div class="categories-box" style="background-image: url('<?php echo 'http://localhost/GWarehouse_IT_Online_Shop/'; ?>images/categories/<?php echo $slika_kategorije; ?>')">
        <h2 class="categories-name"><?php echo $naziv_kategorije ?></h2>
        <?php
                }
                ?>
    </div></a>
    <?php
        }
    }
    ?>
    </div>
    </div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>