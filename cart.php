<?php require_once "menu.php" ?>
<?php

//usuwanie z koszyka
if (filter_input(INPUT_GET, 'action') == 'delete') {
    //pętla przez wszystkie produkty, aż nie znajdzie
    foreach ($_SESSION['koszyk'] as $key => $produkt) {
        if ($produkt['id'] == filter_input(INPUT_GET, 'id')) {
            //usuń produkt kiedy pasuje z ID
            unset($_SESSION['koszyk'][$key]);
        }
    }
    $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
}

$userid = $_SESSION['userid'];

if (isset($_POST['submit'])) {
    $address1 = $_POST['address1'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];
    
    

    $sql = "UPDATE users_address
    SET address1 = '$address1', city='$city', postal_code='$postal', country='$country'
    WHERE  user_id = $userid;";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $_SESSION['address1'] = $address1;
        $_SESSION['city'] = $city;
        $_SESSION['postal'] = $postal;
        $_SESSION['country'] = $country;
    }
}
?>

<section>
    <div class="container py-5" id="cart">
        <div class="row">
            <table class="col-sm-8">
                <tr>
                    <th colspan="5">
                        <h3>Szczegóły zamówienia</h3>
                    </th>
                </tr>
                <tr>
                    <th width="40%">Nazwa produktu</th>
                    <th width="10%">Ilość</th>
                    <th width="20%">Cena</th>
                    <th width="15%">Suma</th>
                    <th width="5%">Akcja</th>
                    <th width="5%"></th>
                </tr>
                <?php
                
                if (!empty($_SESSION['koszyk'])) {
                    $total = 0;
                    foreach ($_SESSION['koszyk'] as $klucz => $produkt) {
                ?>
                        <tr>
                            <td><i><?php echo $produkt['name']; ?></i></td>
                            <td><?php echo $produkt['quantity']; ?></td>
                            <td><?php echo $produkt['price']; ?> zł</td>
                            <td><?php echo number_format($produkt['quantity'] * $produkt['price'], 2); ?> zł</td>
                            <td>
                                <a href="cart.php?action=delete&id=<?php echo $produkt['id']; ?>">
                                    <div class="btn-danger">Usuń</div>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $total = $total + ($produkt['quantity'] * $produkt['price']);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right"><b>Suma:</b></td>
                        <td align="right"><b><?php echo number_format($total, 2); ?> zł</b></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="cart rounded shadow-sm border col-sm-3 p-4" id="koszyk">
            <?php
            if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {    ?>
                <h1><b>Twoje dane:</b></h1>


                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Imię:</label>
                    <input readonly type="text" class="form-control" value="<?php echo $_SESSION['firstName'] ?>" name="firstName">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nazwisko</label>
                    <input readonly type="text" class="form-control" value="<?php echo $_SESSION['lastName'] ?>" name="lastName">
                </div>

                <form id="myform" method="post" action="cart.php">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Adres:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['address1'] ?>" name="address1">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Miasto:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['city'] ?>" name="city">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kod pocztowy:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['postal'] ?>" name="postal">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kraj:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['country'] ?>" name="country">
                </div>
                </form>
                <button type="submit" for="submit-form" name="submit" form="myform" class="btn fw-bold m-1 text-uppercase">Zaktualizuj dane</button>
                <button style= "display:block" id="orderSummary" class="btn btn1 fw-bold m-1 text-uppercase">Złóż zamówienie</button>

            <?php
            } else {
                echo "Zaloguj się, aby złożyć zamówienie.";
            }
            ?>

        </div> 
            </div>
        </div>
                
</section>
<section style="display:none"  id="summary">
<div class="back">
        <button onclick="window.location.href='/cart.php'" id="orderCart" class="btn btn1 fw-bold m-1 text-uppercase">Wróć do koszyka</button>
    </div>
<div class="container-fluid border grey-bg py-3 text-center" >
        <h3>ZAMÓWIENIE</h3>
        <span>Sprawdź poprawność poniższych danych i przejdź do płatności.</span>
    </div>
    <div class="container">
        <div class="row mx-0 py-2">
            <div class="col-12 col-lg-4 py-3">
                <div class="d-flex align-items-center mt-3 mt-lg-0 mb-3 pt-3">
                    <span class="cart-header text-uppercase">Twoje dane</span>
                </div>
                <div class="block border">
                <form class="row g-3 py-3 m-3">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input disabled type="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" id="email">
                    </div>
                    <div class="col-12">
                        <label for="firstName" class="form-label">Imię</label>
                        <input disabled type="text" class="form-control" value="<?php echo $_SESSION['firstName'] ?>" id="firstName">
                    </div>
                    <div class="col-12">
                        <label for="lastName" class="form-label">Nazwisko</label>
                        <input disabled type="text" class="form-control" value="<?php echo $_SESSION['lastName'] ?>" id="lastName">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Adres</label>
                        <input disabled type="text" class="form-control" value="<?php echo $_SESSION['address1'] ?>" id="address">
                    </div>
                    <div class="col-md-4">
                        <label for="postal" class="form-label">Kod</label>
                        <input disabled type="text" class="form-control" value="<?php echo $_SESSION['postal'] ?>" id="postal">
                    </div>
                    <div class="col-md-8">
                        <label for="city" class="form-label">Miasto</label>
                        <input disabled type="text" class="form-control" value="<?php echo $_SESSION['city'] ?>" id="city">
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-4 py-3">
                <div class="d-flex align-items-center mt-3 mt-lg-0 mb-3 pt-3">
                    <span class="cart-header text-uppercase">Metoda płatności</span>
                </div>
                <div class="block border p-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="payment1">
                        <label class="form-check-label" for="payment1">
                            Płatność przelewem
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="payment2" checked>
                        <label class="form-check-label" for="payment2">
                            Płatność kartą
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="payment3" checked>
                        <label class="form-check-label" for="payment3">
                            Przelew tradycyjny
                        </label>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3 mt-lg-0 mb-3 pt-3">
                    <span class="cart-header text-uppercase">Sposób dostawy</span>
                </div>
                <div class="block border p-3">
                <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipment" id="shipment1">
                        <label class="form-check-label" for="shipment1">
                            Dostawa kurierem ABC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipment" id="shipment2" checked>
                        <label class="form-check-label" for="shipment2">
                            Dostawa kurierem DEF
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipment" id="shipment3" checked>
                        <label class="form-check-label" for="shipment3">
                            Dostawa do paczkomatu
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipment" id="shipment4" checked>
                        <label class="form-check-label" for="shipment4">
                            Dostawa Pocztą Polską
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipment" id="shipment5" checked>
                        <label class="form-check-label" for="shipment5">
                            Odbiór osobisty
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 py-3">
                <div class="d-flex align-items-center mt-3 mt-lg-0 mb-3 pt-3">
                    <span class="cart-header text-uppercase">Twoje produkty</span>
                </div>
                <div class="block border p-3">
                    <?php foreach ($_SESSION['koszyk'] as $klucz => $produkt) {?>
                    <div class="row pb-2">
                        <div class="col-3">
                            <img class="image-fluid hidden" alt="product image" src="./photos_watches/<?php echo $produkt['image']; ?>" style="height:80px; width:80px">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <b><?php echo $produkt['name'] ?></b>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        
                                        Ilość: <?php echo $produkt['quantity'] ?>
                                    </div>
                                    <div class="col-6">
                                        <h7>Cena: <?php echo $produkt['price'] ?>zł</h7>
                                    </div>
                                    <?php $total = $total + ($produkt['quantity'] * $produkt['price']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <hr>
                    <div class="row p-2">
                        <div class="col">
                            <h4>Dostawa</h4>
                        </div>
                        <div class="col">
                            <h5>0zł</h5>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                            <h4>Razem:</h4>
                        </div>
                        <div class="col">
                            <h5><b><?php echo $total?>zł</b></h5>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-12 text-center">
                        <form method="POST" action="order.php">
                            <input type="hidden" name="total" value="<?php echo $total?>">
                            <button type="submit" class="btn btn1 btn-primary">Zamawiam i płacę</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    var button = document.getElementById('orderSummary');
    button.onclick = function() {
        var div = document.getElementById('cart');
        var div2 = document.getElementById('summary');
        if (div.style.display !== 'none') {
            div.style.display = 'none'
            div2.style.display = 'block';
        }else {
            div.style.display = 'block';
            div2.style.display = 'none';
        }
};
</script>


<?php require_once "foot.php" ?>