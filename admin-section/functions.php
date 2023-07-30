<?php
function validanString($str){
    if(strlen($str)<5)return false;
    $nedozvoljeni=array("=", " ", "(", ")", "*", "+");
    foreach($nedozvoljeni as $v)
        if(strpos($str, $v)!==false)return false;
    return true;    
}

function login(){
    if(isset($_SESSION['administrator_id']) and isset($_SESSION['podaci'])) return true;
    else if(isset($_COOKIE['administrator_id']) and isset($_COOKIE['podaci'])){
        $_SESSION['administrator_id']=$_COOKIE['administrator_id'];
        $_SESSION['podaci']=$_COOKIE['podaci'];
        $_SESSION['email']=$_COOKIE['email'];
        return true;
    }
    return false;
}

function login_user(){
    if(isset($_SESSION['korisnik_id']) and isset($_SESSION['korisnik'])) return true;
    else if(isset($_COOKIE['korisnik_id']) and isset($_COOKIE['korisnik'])){
        $_SESSION['korisnik_id']=$_COOKIE['korisnik_id'];
        $_SESSION['korisnik']=$_COOKIE['korisnik'];
        $_SESSION['email']=$_COOKIE['email'];
        $_SESSION['telefon']=$_COOKIE['telefon'];
        return true;
    }
    return false;
}
?>