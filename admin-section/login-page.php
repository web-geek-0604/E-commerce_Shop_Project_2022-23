<?php include('../header_and_footer/admin/header.php') ?>
<div class="login-container">
<?php
    if(isset($_SESSION['no-login-msg']))
        {
        echo $_SESSION['no-login-msg'];
        unset($_SESSION['no-login-msg']);
        }
?>
<h2 class="login-heading">Ulogujte se</h2>
    <form action="login-page.php" method="POST" id="login_form">
        <input type="email" name="email" placeholder="Unesite vašu email adresu*"><br>
        <input type="password" name="lozinka" placeholder="Unesite lozinku*" id="inputPassword"><br>
        <input type="checkbox" onclick="showPassword()" class="larger"><label>Prikaži lozinku</label>
        <input type="checkbox" name="zapamti" class="larger">
        <label>Zapamti me na ovom uređaju</label><br>
        <button name="login">Uloguj se</button>
    </form>
    <?php
        if(isset($_POST['email']) and isset($_POST['lozinka'])){
            $email=$_POST['email'];
            $lozinka=$_POST['lozinka'];
            if($email!="" and $lozinka!=""){
                if(validanString($email) and validanString($lozinka)){
                    $sql="SELECT * FROM administratori WHERE email='{$email}' and obrisan=0";
                    $res=mysqli_query($db, $sql);
                    if(mysqli_num_rows($res)==1){
                        $row=mysqli_fetch_object($res);
                        if($lozinka==$row->lozinka){
                            $_SESSION['administrator_id']=$row->administrator_id;
                            $_SESSION['podaci']=$row->ime." ".$row->prezime;
                            $_SESSION['email']=$row->email;
                            if(isset($_POST['zapamti'])){
                                setcookie("administrator_id", $_SESSION['administrator_id'], time()+86400, "/");
                                setcookie("podaci", $_SESSION['podaci'], time()+86400, "/");
                                setcookie("email", $_SESSION['email'], time()+86400, "/");
                            }
                            header("location:admin-main.php");
                        }
                        else
                        echo"<p style='text-align:center; color: red; font-size:20px;'>Pogrešna lozinka za korisnika '{$email}'!</p>";
                        }
                    else
                    echo"<p style='text-align:center; color: red; font-size:20px;'>Ne postoji korisnik'{$email}'</p>";
                }
                else
                echo"<p style='text-align:center; color: red; font-size:20px;'>Podaci sadrže nedozvoljene karaktere!</p>";
            }
            else
            echo"<p style='text-align:center; color: red; font-size:20px;'>Svi podaci su obavezni!</p>";
        }
    ?>
</div>
<?php include('../header_and_footer/admin/footer.php') ?>