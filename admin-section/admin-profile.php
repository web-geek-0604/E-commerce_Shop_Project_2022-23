<?php include('../header_and_footer/admin/header.php') ?>
<?php
$administrator_id=$_SESSION['administrator_id'];

$sql = "SELECT * FROM administratori WHERE administrator_id=$administrator_id";
$res=mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($res);

$ime = $row['ime'];
$prezime = $row['prezime'];
?>
<div class="products-wrapper">
    <h1 class="products-heading">Podaci o administratoru</h1>
    <form class="add-product-form" name="admin_form" id="admin_form" action="" method="POST">
        <label>Ime:</label><br>
        <input type="text" name="ime" id="ime" placeholder="Unesite ime" value="<?php echo $ime; ?>"><br>
        <label>Prezime:</label><br>
        <input type="text" name="prezime" id="prezime" placeholder="Unesite prezime" value="<?php echo $prezime; ?>"><br>
        <button type="button" name="update" class="add-btn" onclick="updateAdmin()">Snimi izmene</button>
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
</div>
<?php include('../header_and_footer/admin/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){

    })
    function updateAdmin(){
        $.ajax({
            url: "../ajax/ajax_admin_profile.php?action=updateAdmin",
            type: "POST",
            data: new FormData(document.getElementById("admin_form")),
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
                alert("Uspešna promena podataka!")
            }
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
        $.post("../ajax/ajax_admin_profile.php?action=changePassword",{inputPassword: inputPassword, againPassword: againPassword}, function(response){
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
</script>