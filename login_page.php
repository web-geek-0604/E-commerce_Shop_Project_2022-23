<?php include('header_and_footer/header_and_nav.php') ?>

<div class="login-container">
<?php
    if(isset($_SESSION['user-register']))
        {
        echo $_SESSION['user-register'];
        unset($_SESSION['user-register']);
        }
?>
<h2 class="login-heading">Ulogujte se</h2>
<form action="login_page.php" method="POST" id="login_form">
    <input type="email" name="email" placeholder="Unesite vašu email adresu*"><br>
    <input type="password" name="lozinka" placeholder="Unesite lozinku*" id="inputPassword"><br>
        <input type="checkbox" onclick="showPassword()" class="larger"><label>Prikaži lozinku</label>
    <input type="checkbox" name="zapamti" class="larger">
    <label>Zapamti me na ovom uređaju</label><br>
    <label>Nemate nalog?<a href="register_page.php">Registruj se</a></label><br>
    <button name="login">Uloguj se</button>
</form>
<?php
    if(isset($_POST['email']) and isset($_POST['lozinka'])){
        $email=$_POST['email'];
        $lozinka=$_POST['lozinka'];
        if($email!="" and $lozinka!=""){
            if(validanString($email) and validanString($lozinka)){
                $sql="SELECT * FROM korisnici WHERE email='{$email}' and obrisan=0";
                $res=$db->query($sql);
                if(mysqli_num_rows($res)==1){
                    $row=mysqli_fetch_object($res);
                    if($lozinka==$row->lozinka){
                        $_SESSION['korisnik_id']=$row->korisnik_id;
                        $_SESSION['korisnik']=$row->ime." ".$row->prezime;
                        $_SESSION['email']=$row->email;
                        $_SESSION['telefon']=$row->telefon;
                        if(isset($_POST['zapamti'])){
                            setcookie("korisnik_id", $_SESSION['korisnik_id'], time()+86400, "/");
                            setcookie("korisnik", $_SESSION['korisnik'], time()+86400, "/");
                            setcookie("email", $_SESSION['email'], time()+86400, "/");
                            setcookie("telefon", $_SESSION['telefon'], time()+86400, "/");
                        }
                        header("location:index.php");
                    }
                    else
                    echo"<p style='text-align:center; color: red; font-size:20px;'>Pogrešna lozinka za korisnika {$email} !</p>";
                }
                else
                echo"<p style='text-align:center; color: red; font-size:20px;'>Ne postoji korisnik {$email}.<br> Ako ste deaktivirali ili obrisali nalog, kontaktirajte administratora radi vraćanja pristupa nalogu.</p>";
            }
            else
            echo"<p style='text-align:center; color: red; font-size:20px;'>Podaci sadrže nedozvoljene karaktere!</p>";
        }
        else
        echo"<p style='text-align:center; color: red; font-size:20px;'>Svi podaci su obavezni!</p>";
    }
?>
</div>
<?php include('header_and_footer/admin/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
      productsCount();
      })
    function productsCount(){
        $.post("ajax/ajax_cart.php?action=productsCount", function(response){
        let odg=JSON.parse(response);
        $("#p_number").html(odg.success);

        })
    }
</script>
