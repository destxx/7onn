<?php 

$server = "pma.ct8.pl";
$user = "m25786_nikazu1";
$pass = "Dupa12";
$database = "m25786_zegarki";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Nie można połączyć z bazą danych.')</script>");
}
$db_select = mysqli_select_db($conn, "m25786_zegarki");
        if (!$db_select) {
            die("Database selection failed: " . mysqli_connect_error());
        }
?>