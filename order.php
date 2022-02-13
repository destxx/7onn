<?php include_once "menu.php"?>
<?php 
    $userid = $_SESSION['userid'];
    $total = $_POST['total'];
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        
                        echo "Twoje zamówienie zostało przyjęte do realizacji";

                        $zapytanie1 = "INSERT INTO order_details(user_id, total)
                        VALUES ('$userid', '$total')";
                        $wynik = mysqli_query($conn, $zapytanie1)
                        or die('Źle'); 
                        $orderID = mysqli_insert_id($conn); 
                        $orderID = (int)$orderID;

                        $zapytanie2 = "INSERT INTO payment(order_id, total, status)
                        VALUES ('$orderID', '$total', 'NEW')";
                        $wynik = mysqli_query($conn, $zapytanie2)
                        or die('Źle');
                        $paymentID = mysqli_insert_id($conn); 
                        $paymentID = (int)$paymentID;

                        $zapytanie3 = "UPDATE order_details
                        SET payment_id = $paymentID
                        WHERE order_id='$orderID'";
                        $wynik = mysqli_query($conn, $zapytanie3)
                        or die('Źle'); 
                        
                        foreach ($_SESSION['koszyk'] as $klucz => $produkt) {
                            $zapytanie4 = "INSERT INTO items_order(order_id, product_id, quantity)
                            VALUES ('$orderID', '".$produkt['id']."', '".$produkt['quantity']."')";
                            $wynik = mysqli_query($conn, $zapytanie4)
                            or die('Źle');
                            
                        }
                        $_SESSION['koszyk'] = null;
                    }
                    else{
                        header("Location: login.php");
                    }
                    ?>
                                
                            
            </div>
        </div>
    </div>
</section>
<?php include_once "foot.php"?>