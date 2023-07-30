<?php include('header_and_footer/header_and_nav.php') ?>
<?php
$korisnik_id=$_SESSION['korisnik_id'];

$sql = "SELECT * FROM korisnici WHERE korisnik_id=$korisnik_id";
$res=$db->query($sql);
$row = mysqli_fetch_assoc($res);

$ime = $row['ime'];
$prezime = $row['prezime'];
$email = $row['email'];
$telefon = $row['telefon'];
$adresa = $row['adresa'];
?>
<div class="products-wrapper">
<h1 class="products-heading">KORPA</h1>
<hr>
<h1 class="products-heading">PROIZVODI U KORPI</h1><br>
<div id="korpa"></div><hr>
    <h1 class="products-heading">KUPLJENI PROIZVODI</h1><br>
        <div id="kupljeno"></div><hr>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
        showCart();
        showBought();
        productsCount();
    })
    function productsCount(){
        $.post("ajax/ajax_cart.php?action=productsCount", function(response){
        let odg=JSON.parse(response);
        $("#p_number").html(odg.success);

      })
    }   
    function showCart(){
        $.post("ajax/ajax_cart.php?action=showCart", function(response){
            $("#korpa").html(response);
        })
    }
    function showBought(){
        $.post("ajax/ajax_cart.php?action=showBought", function(response){
            $("#kupljeno").html(response);
        })
    }
    function remove(id_cart){
        $.post("ajax/ajax_cart.php?action=remove", {id_cart: id_cart}, function(response){
            showCart();
        })
    }

    function buy(id_cart){
        $.post("ajax/ajax_cart.php?action=buy", {id_cart: id_cart}, function(response){
            showCart();
            showBought();
        })
    }

</script>