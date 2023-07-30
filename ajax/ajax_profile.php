<?php
session_start();
require_once("../admin-section/functions.php");
require_once("../classes/classDB.php");
$response=array(
    "error"=>"",
    "success"=>""
);
$db=new DB();
if(!$db->connect()) exit();

$action=$_GET['action'];

if($action=="updateUser"){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $telefon=$_POST['telefon'];
    $adresa=$_POST['adresa'];
    if($ime!="" && $prezime!="" && $telefon!="" && $adresa!=""){
    $sql3="UPDATE korisnici SET ime='{$ime}', prezime='{$prezime}', telefon='{$telefon}', adresa='{$adresa}' WHERE korisnik_id={$_SESSION['korisnik_id']}";
    $res3=$db->query($sql3);
    if(!($res3)){
        $response['error']="Neuspešno ažuriranje podataka profila!!";
    }
    else{
        $_SESSION['korisnik']="{$ime} {$prezime}";
        $_SESSION['telefon']=$telefon;
        $response['success']="profile.php";
    }
    }else{
        $response['error']="Svi podaci su obavezni!";
    }
}
if($action=="deleteProfile"){
    $sql2="UPDATE korisnici SET obrisan=1 WHERE korisnik_id={$_SESSION['korisnik_id']}";
    $res2=$db->query($sql2);
    if(!($res2)){
        $response['error']="Neuspešno brisanje profila!!";
    }
    else{
        $response['success']="logout_user.php";
    }
}
if($action=="changePassword"){
    $inputPassword=$_POST['inputPassword'];
    $againPassword=$_POST['againPassword'];
    if($inputPassword!="" && $againPassword!=""){
        if($inputPassword==$againPassword){
            if(validanString($inputPassword)){
            $sql3="UPDATE korisnici SET lozinka='{$inputPassword}' WHERE korisnik_id={$_SESSION['korisnik_id']}";
            $res3=$db->query($sql3);
            if(!($res3)){
                $response['error']="Lozinka nije ažurirana!";
            }
            else{
                $response['success']="Uspešno ažurirana lozinka!";
            }
        }
        else{
            $response['error']="Lozinka sadrži nedozvoljene karaktere!";
    }
}
    else{
        $response['error']="Lozinke se ne poklapaju!";
    }
}
else{
        $response['error']="Svi podaci su obavezni!";
    }
}

if($action=="submitNewsletter"){
    if(login_user()){
    $sql6="SELECT * FROM korisnici WHERE korisnik_id={$_SESSION['korisnik_id']}";
    $res6=$db->query($sql6);
    $row=mysqli_fetch_assoc($res6);
        $korisnik_id=$row['korisnik_id'];
        $newsletter=$row['newsletter'];
    if($newsletter==1){
        $response['error']="Već ste prijavljeni na newsletter!!";
    }
    else{    
    $sql5="UPDATE korisnici SET newsletter=1 WHERE korisnik_id={$_SESSION['korisnik_id']}";
    $res5=$db->query($sql5);
    if(!($res5)){
        $response['error']="Neuspešna prijava na newsletter!!";
    }
    else{
        $response['success']="Uspešna prijava na newsletter!Uživajte u kupovini.";
    }
}
}
else{
    $response['error']="Morate biti ulogovani radi prijave na newsletter!!";
}
}

echo JSON_encode($response, 256);
?>