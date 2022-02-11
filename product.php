<?php include_once "menu.php"?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = "SELECT * FROM products WHERE id = '$id' LIMIT 1";

    $wynik = mysqli_query($conn, $stmt);

    $product = mysqli_fetch_assoc($wynik);

    if (!$product) {

        echo ('Produkt nie istnieje!');
    }
} else {

    echo ('Produkt nie istnieje!');
}
?>
<div class="container py-5">
    <div class="row">
    <div class="col-lg-6 p-2">
        <img src="./photos_watches/<?=$product['image']?>" width="500" height="500" alt="<?=$product['name']?>">
    </div>
    <div class="col-lg-6 p-2 mt-5">
        <h1 class="name fw-bold"><?=$product['name']?></h1>
        <span class="price">
            <h3 class="price  py-4"><?php echo $product['price']. "zł"; ?></h3>
        </span>
        <form method="post" action="shop.php?action=add&id=<?php echo $product['id']; ?>">
            <input type="text" name="quantity" class="form-control" value="1" />
            <input class="w-50" id="22" type="hidden" name="name" value="<?php echo $product["name"]; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
            <input type="submit" name="dodaj_do_koszyka" class="btn btn1 fw-bold p-auto text-black text-uppercase my-2" value="Dodaj do koszyka" />
        </form>
        <hr/>
        <div class="description col-10 p-3">
            <?=$product['description']?>
        </div>
    </div>
    </div>
    </div>
</div>

<?php include_once "foot.php"?>