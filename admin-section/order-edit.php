<?php ob_start() ?>
<?php include('../header_and_footer/admin/header.php') ?>
<?php require_once('login-check.php') ?>
<?php
if(isset($_GET['korpa_id']))
{
    $korpa_id=$_GET['korpa_id'];


    $sql = "SELECT * FROM pogledKorpa WHERE korpa_id=$korpa_id";

    $res = mysqli_query($db, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $row = mysqli_fetch_assoc($res);

        $korpa_id = $row['korpa_id'];
        $datum_kupovine= $row['datum_kupovine'];
        $naziv=$row['naziv'];
        $cena=$row['cena'];
        $ime_korisnika=$row['ime_korisnika'];
        $prezime_korisnika=$row['prezime_korisnika'];
        $adresa_korisnika=$row['adresa_korisnika'];
        $telefon_korisnika=$row['telefon_korisnika'];
        $status_kupovine=$row['status_kupovine'];
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
    </div>
    <div class="product_info">
    <form action="" class="add-product-form" method="POST">
    <input type="hidden" name="korpa_id" value="<?php echo $korpa_id; ?>">
    <label>Status kupovine:</label><br>
    <select name="status_kupovine" id="cars">
  <option value="<?php echo $status_kupovine ?>"><?php echo $status_kupovine ?></option>
  <option value="U pripremi">U pripremi</option>
  <option value="Na dostavi">Na dostavi</option>
  <option value="Dostavljeno">Dostavljeno</option>
</select>
<button class="postavi-btn" name="sacuvaj" style="width: 150px; height: 40px;">Sačuvaj izmene</button>
    </form>
<?php
    if(isset($_POST['sacuvaj'])){

        $status_kupovine=$_POST['status_kupovine'];

        $sql="UPDATE korpa SET status_kupovine='{$status_kupovine}' WHERE korpa_id=$korpa_id";
        $res3=mysqli_query($db, $sql);
    }
    if($res3==true){
        header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/orders.php');
    }
?>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>