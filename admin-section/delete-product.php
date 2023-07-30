<?php session_start() ?>
<?php
$db=mysqli_connect("localhost", "root", "", "gwarehouse_db");
  
   echo $proizvod_id = $_GET['proizvod_id'];

   $sql = "UPDATE proizvodi SET aktivno='Ne' WHERE proizvod_id=$proizvod_id";

   $res = mysqli_query($db, $sql);

   if($res==true)
   {
       $_SESSION['delete'] = "<div class='success-msg'>Proizvod je uspešno obrisan.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php');

   }
   else
   {
       $_SESSION['delete'] = "<div class='greska-msg'>Proizvod nije obrisan. Pokušajte ponovo kasnije.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/products.php');
   }

?>