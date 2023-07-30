<?php session_start() ?>
<?php
$db=mysqli_connect("localhost", "root", "", "gwarehouse_db");
  
   echo $kategorija_id = $_GET['kategorija_id'];

   $sql = "UPDATE kategorije SET obrisan=1 WHERE kategorija_id=$kategorija_id";

   $res = mysqli_query($db, $sql);

   if($res==true)
   {
       $_SESSION['delete-category'] = "<div class='success-msg'>Kategorija je uspešno obrisana.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/categories.php');

   }
   else
   {
       $_SESSION['delete-category'] = "<div class='greska-msg'>Kategorija nije obrisana. Pokušajte ponovo kasnije.</div>";
       header('location:http://localhost/GWarehouse_IT_Online_Shop/admin-section/categories.php');
   }

?>