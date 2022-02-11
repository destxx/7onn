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
?>

<section>
    <div class="container py-5">
        <div class="row">
            <table class="col-sm-7">
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
            <div class="cart rounded shadow-sm border col-sm-5 p-4" id="koszyk">
            <?php
            if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {    ?>
                <h1><b>Twoje dane:</b></h1>
                <h4><label>Imię:</label></h4>
                <input readonly type="text" name="firstName" value="<?php echo $_SESSION['firstName'] ?>">

                <h4><label>Nazwisko:</label></h4>
                <input readonly type="text" name="lastName" value="<?php echo $_SESSION['lastName'] ?>">

                <h4><label>Ulica:</label></h4>
                <input readonly type="text" name="address" value="<?php echo $_SESSION['address1'] . " " . $_SESSION['address2'] ?>">

                <h4><label>Miasto:</label></h4>
                <input readonly type="text" name="city" value="<?php echo $_SESSION['city'] ?>">

                <h4><label>Kod pocztowy</label></h4>
                <input readonly type="text" name="postal" value="<?php echo $_SESSION['postal'] ?>">

                <input type="submit" name="..." class="btn btn1 fw-bold m-1 text-uppercase" value="Złóż zamówienie" />

            <?php
            } else {
                echo "Zaloguj się, aby złożyć zamówienie.";
            }
            ?>

        </div> 
            </div>
        </div>
                
</section>




<?php require_once "foot.php" ?>