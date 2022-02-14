<?php
require_once "config.php";
if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == false) && ($_SESSION['userid'] != 52 || 55)) {
    header("Location: index.php");
}else{
    /* zapytanie do konkretnej tabeli */
    $id = (int)$_GET['ID_rekordu'];
    $zapytanie2 = "DELETE FROM products WHERE id=".$id." LIMIT 1";
    $wynik2 = mysqli_query($conn, $zapytanie2)
    or die('Źle');
    $result=mysqli_query($conn, $zapytanie2);
    header("Location: edycja.php");
}
 

?>