<?php include('header_and_footer/header_and_nav.php') ?>
<?php
    $korisnik_id=$_SESSION['korisnik_id'];

    $sql = "SELECT * FROM korisnici WHERE korisnik_id=$korisnik_id";
    $res=$db->query($sql);
    $row = mysqli_fetch_assoc($res);

    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $telefon = $row['telefon'];
    $adresa = $row['adresa'];
?>
<div class="products-wrapper">
    <h1 class="products-heading">Podaci o korisniku</h1>
    <form class="add-product-form" name="user_form" id="user_form" action="" method="POST">
        <label>Ime:</label><br>
        <input type="text" name="ime" id="ime" placeholder="Unesite ime" value="<?php echo $ime; ?>"><br>
        <label>Prezime:</label><br>
        <input type="text" name="prezime" id="prezime" placeholder="Unesite prezime" value="<?php echo $prezime; ?>"><br>
        <label>Telefon:</label><br><br>
        <input type="phone" name="telefon" id="telefon" placeholder="Unesite broj telefona" value="<?php echo $telefon; ?>"><br><br>
        <label>Adresa:</label><br>
        <input type="text" name="adresa" id="adresa" placeholder="Unesite adresu" value="<?php echo $adresa; ?>"><br>
        <button type="button" name="updateProfile" class="add-btn" onclick="updateUser()">Snimi izmene</button>
        <hr>
    </form>
    <div class="add-product-form">
        <h1 class="products-heading">Promena lozinke:</h1><br>
        <label>Unesite novu lozinku:</label><br>
        <input type="password" name="inputPassword" placeholder="Unesite lozinku" id="inputPassword"><br>
        <input type="checkbox" onclick="showPassword()" class="larger">&nbsp<label>Prikaži lozinku</label><br><br>
        <label>Unesite ponovo lozinku:</label><br>
        <input type="password" name="againPassword" placeholder="Unesite lozinku" id="againPassword"><br>
        <input type="checkbox" onclick="showAgain()" class="larger">&nbsp<label>Prikaži lozinku</label><br>
        <button name="changePassword" class="add-btn" onclick="changePassword()" id="changePassword">Promeni lozinku</button>
        <hr>
    </div>
    <form action="" method="POST">
        <h1 class="products-heading">Brisanje profila</h1>
        <button name="delete" class="add-btn" style="background-color: red;" onclick="deleteProfile()">Obriši profil</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
        productsCount();
    })
    function updateUser(){
        $.ajax({
            url: "ajax/ajax_profile.php?action=updateUser",
            type: "POST",
            data: new FormData(document.getElementById("user_form")),
            contentType: false,
            cache: false,
            processData: false,
            success:function(response){
                let odg=JSON.parse(response);
                console.log(odg);
                $("#user_span").html($("#ime").val() + " " + $("#prezime").val());
                if(odg.error!=""){
                alert("Doslo je do greške\n"+odg.error);
                return false;
            }else{
                alert("Uspešna promena podataka!");
            }
        }
        })
    }
    function deleteProfile(){
        if(!confirm("Da li si siguran da želiš da obrišeš profil?")) return false;
        $.get("ajax/ajax_profile.php?action=deleteProfile", function(response){
            let odg=JSON.parse(response);
            console.log(odg);
            if(odg.error!=""){
                alert("Došlo je do greške\n"+odg.error);
                return false;
            }else{
                window.location.assign(odg.success);
            }
        })
    }
    function changePassword(){
        let inputPassword=$("#inputPassword").val();
        let againPassword=$("#againPassword").val();
        if(inputPassword=="" || againPassword==""){
            alert("Niste uneli sve podatke!");
            return false;
        }
        if(inputPassword!=againPassword){
            alert("Lozinke se ne poklapaju!");
            return false;
        }
        $.post("ajax/ajax_profile.php?action=changePassword",{inputPassword: inputPassword, againPassword: againPassword}, function(response){
            let odg=JSON.parse(response);
            console.log(odg);
            if(odg.error!=""){
                alert("Doslo je do greške\n"+odg.error);
                return false;
            }else{
                alert("Uspešno promenjena lozinka!")
                $("#inputPassword").val("");
                $("#againPassword").val("");
            }
        })
    }
    function productsCount(){
  $.post("ajax/ajax_cart.php?action=productsCount", function(response){
        let odg=JSON.parse(response);
        $("#p_number").html(odg.success);
      })
}
</script>