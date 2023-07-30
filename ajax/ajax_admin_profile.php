<?php
include("../admin-section/functions.php");
session_start();
$response=array(
    "error"=>"",
    "success"=>""
);
$db=mysqli_connect("localhost", "root", "", "gwarehouse_db");

$action=$_GET['action'];

if($action=="updateAdmin"){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    if($ime!="" && $prezime!=""){
    $sql3="UPDATE administratori SET ime='{$ime}', prezime='{$prezime}' WHERE administrator_id={$_SESSION['administrator_id']}";
    $res3=mysqli_query($db, $sql3);
    if(!($res3)){
        $response['error']="Neuspešno ažuriranje podataka profila!!";
    }
    else{
        $response['success']="admin-section/admin-profile.php";
    }
    }else{
        $response['error']="Svi podaci su obavezni!";
    }
}

if($action=="changePassword"){
    $inputPassword=$_POST['inputPassword'];
    $againPassword=$_POST['againPassword'];
    if($inputPassword!="" && $againPassword!=""){
        if($inputPassword==$againPassword){
            if(validanString($inputPassword)){
            $sql3="UPDATE administratori SET lozinka='{$inputPassword}' WHERE administrator_id={$_SESSION['administrator_id']}";
            $res3=mysqli_query($db, $sql3);
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
echo JSON_encode($response, 256);
?>