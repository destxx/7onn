<?php
require_once "config.php";
 
/* zapytanie do konkretnej tabeli */
$id = (int)$_GET['ID_rekordu'];
$zapytanie2 = "DELETE FROM product WHERE ID=".$id." LIMIT 1";
$wynik2 = mysqli_query($conn, $zapytanie2)
or die('Źle');
$result=mysqli_query($conn, $zapytanie2);
header("Location: edycja.php");
?>