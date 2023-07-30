<?php ob_start() ?>
<?php include('header_and_footer/header_and_nav.php') ?>
<div class="login-container">
    <?php
        if(isset($_SESSION['user-register']))
            {
            echo $_SESSION['user-register'];
            unset($_SESSION['user-register']);
            }
    ?>
    <h2 class="login-heading">Kreirajte svoj profil</h2>
    <form action="register_page.php" method="POST" id="login_form">
        <input type="text" name="ime" placeholder="Unesite Vaše ime*"><br>
        <input type="text" name="prezime" placeholder="Unesite Vaše prezime*"><br>
        <input type="email" name="email" placeholder="Unesite Vašu email adresu*"><br>
        <input type="text" name="telefon" placeholder="Unesite Vaš broj telefona*"><br>
        <input type="text" name="adresa" placeholder="Unesite Vašu adresu*"><br>
        <input type="password" name="lozinka" placeholder="Unesite lozinku*" id="inputPassword"><br>
        <input type="checkbox" onclick="showPassword()" class="larger"><label>Prikaži lozinku</label><br>
        <label>Već imate nalog?<a href="login_page.php">Prijavi se</a></label><br>
        <button name="register">Registruj se</button>
    </form>
    <?php
        if(isset($_POST['register'])){
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $email=$_POST['email'];
            $telefon=$_POST['telefon'];
            $lozinka=$_POST['lozinka'];
            if($ime!="" and $prezime!="" and $email!="" and $telefon!="" and $lozinka!=""){
                if(validanString($email) and validanString($lozinka)){
                $sql="INSERT INTO korisnik (ime, prezime, email, telefon, lozinka) VALUES
                ('$ime', '$prezime', '$email', '$telefon', '$lozinka');";
                $db->query($sql);
                
                if($res==true){
                $_SESSION['user-register'] = "<div class='success-msg'>Uspešno ste kreirali nalog.<br>Prijavite se na nalog ili nastavite posetu našem sajtu.</div>";
                header('location:http://localhost/GWarehouse_IT_Online_Shop/login_page.php'); 
                }
                else{
                $_SESSION['user-register'] = "<div class='greska-msg'>Neuspešno kreiran nalog.<br>Proverite sve podatke i pokušajte ponovo.</div>";
                header('location:http://localhost/GWarehouse_IT_Online_Shop/register_page.php'); 
                }
                } else
                echo"<p style='text-align:center; color: red; font-size:20px;'>Podaci sadrže nedozvoljene karaktere!</p>";
                
            } else
            echo"<p style='text-align:center; color: red; font-size:20px;'>Svi podaci su obavezni!</p>";
        }
    ?>
</div>
<?php include('header_and_footer/admin/footer.php') ?>