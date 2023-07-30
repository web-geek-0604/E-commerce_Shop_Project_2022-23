<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<div class="products-wrapper">
<h1 class="products-heading">KOMENTARI</h1>
<div class="notes-div">
    <?php
    if(isset($_GET['akcija']) and isset($_GET['komentar_id'])){
        $akcija=$_GET['akcija'];
        $komentar_id=$_GET['komentar_id'];
        if($akcija=='odobri')$sql="UPDATE komentari SET odobren=1 WHERE komentar_id=$komentar_id";
        else $sql="DELETE FROM komentari WHERE komentar_id=$komentar_id";
        $db->query($sql);
    }
    ?>
    <?php
    $sql3="SELECT * FROM komentari WHERE odobren=0 ORDER BY komentar_id DESC";
    $res2=mysqli_query($db, $sql3);
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
        <div class="podaci-box"><a href="comments.php?akcija=odobri&komentar_id=<?= $komentar_id ?>">Odobri komentar</a> | <a href="comments.php?akcija=obrisi&komentar_id=<?= $komentar_id ?>">Obriši komentar</a> </div> 
        </div>
    <?php
        }
            }
        else{
                echo "<p>Nema komentara za pregled!</p>";
            }
    ?>
        </div>
</div>