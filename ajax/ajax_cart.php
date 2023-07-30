<?php
include("../admin-section/functions.php");
require_once("../classes/classDB.php");
session_start();
$response=array(
    "error"=>"",
    "success"=>""
);
$db=new DB();
if(!$db->connect()) exit();

$action=$_GET['action'];

if($action=="addProduct"){
    if(login_user()){
    $proizvod_id=$_POST['proizvod_id'];
    $sql="INSERT INTO korpa (korisnik_id, proizvod_id) VALUES ({$_SESSION['korisnik_id']}, {$proizvod_id})";
    $res6=$db->query($sql);
    if($db->error())$response['error']=$db->error();
    else $response['success']="Uspešno ste dodali proizvod u korpu!";
    }else{
        $response['error']="Morate biti prijavljeni da biste dodali proizvod u korpu"; 
    }
    echo JSON_encode($response, 256);
};

if($action=="productsCount"){
    if(login_user()){
    $sql="SELECT * FROM pogledKorpa WHERE korisnik_id={$_SESSION['korisnik_id']} AND kupljen=0";
    $res=$db->query($sql);
    $response['success']=mysqli_num_rows($res);
    }
    echo JSON_encode($response, 256);
}

if($action=="showCart"){
    $sql="SELECT * FROM pogledKorpa WHERE korisnik_id={$_SESSION['korisnik_id']} AND kupljen=0";
    $res=$db->query($sql);
    $odg="";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_object($res)){
            echo "<div class='podaci-box' style='border: 1px solid lightgray; width: 400px; margin: 20px 0'>";
            echo "<div style='width: 100px;'><a style='text-decoration:none' href='http://localhost/GWarehouse_IT_Online_Shop/product_page.php?proizvod_id={$row->proizvod_id};'><img class='admin-box-img' src='http://localhost/GWarehouse_IT_Online_Shop/images/products/{$row->glavna_slika}' alt=' {$row->glavna_slika}'></a><br></div>";
            echo "<p>{$row->naziv}</p>";
            echo "<p><b>{$row->cena} RSD</b></p>";
            echo "<p>{$row->datum_kupovine}</p>";
            echo "<button class='add-btn' style='background-color: green; width: 80px;' onclick='buy({$row->korpa_id})'>Kupi</button>";
            echo "&nbsp";
            echo "<button class='add-btn' style='background-color: red; width: 80px;' onclick='remove({$row->korpa_id})'>Ukloni</button>";
            echo "</div>";
        }
    }
    else
    echo"<div class=''>Nema proizvoda u korpi.</div>";
}

if($action=="remove"){
    $korpa_id=$_POST['id_cart'];
    $sql="DELETE FROM korpa WHERE korpa_id={$korpa_id}";
    $res=$db->query($sql);

}

if($action=="buy"){
    $korpa_id=$_POST['id_cart'];
    $sql="UPDATE korpa SET kupljen=1 WHERE korpa_id={$korpa_id}";
    $res=$db->query($sql);

}

if($action=="showBought"){
    $sql="SELECT * FROM pogledKorpa WHERE korisnik_id={$_SESSION['korisnik_id']} AND kupljen=1";
    $res=$db->query($sql);
    $odg="";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_object($res)){
            echo "<div class='podaci-box' style='border: 1px solid lightgray; width: 400px; margin: 20px 0'>";
            echo "<div style='width: 100px;'><a style='text-decoration:none' href='http://localhost/GWarehouse_IT_Online_Shop/product_page.php?proizvod_id={$row->proizvod_id};'><img class='admin-box-img' src='http://localhost/GWarehouse_IT_Online_Shop/images/products/{$row->glavna_slika}' alt=' {$row->glavna_slika}'></a><br></div>";
            echo "<p>{$row->naziv}</p>";
            echo "<p><b>{$row->cena}</b></p>";
            echo "<p>{$row->datum_kupovine}</p>";
            echo "</div>";
        }
    }
    else
    echo"<div class=''>Nema kupljenih proizvoda.</div>";
}
?>


