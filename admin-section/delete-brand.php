<?php session_start() ?>
<?php
$db=mysqli_connect("localhost", "root", "", "gwarehouse_db");
  
   echo $brend_id = $_GET['brend_id'];

   $sql = "UPDATE brendovi SET obrisan=1 WHERE brend_id=$brend_id";

   $res = mysqli_query($db, $sql);

   if($res==true)
   {
       $_SESSION['delete-brand'] = "<div class='success-msg'>Brend je uspešno obrisan.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/brands.php');

   }
   else
   {
       $_SESSION['delete-brand'] = "<div class='greska-msg'>Brend nije obrisan. Pokušajte ponovo kasnije.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/brands.php');
   }

?>