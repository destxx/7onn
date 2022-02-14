<?php require_once "menu.php" ?>
<?php

$userid = $_SESSION['userid'];

if (isset($_POST['submit'])) {
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];



    $sql = "UPDATE users_address
    SET address1 = '$address1', address2= '$address2', city='$city', postal_code='$postal', country='$country'
    WHERE  user_id = $userid;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['address1'] = $address1;
        $_SESSION['address2'] = $address2;
        $_SESSION['city'] = $city;
        $_SESSION['postal'] = $postal;
        $_SESSION['country'] = $country;
    }
}
if (isset($_POST['submit1'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $sql1 = "UPDATE users
    SET first_name = '$firstName', last_name = '$lastName'
    WHERE  id = $userid;";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
    }
}

?>

<section id="profile">

    <div class="container">
        <div class="row p-3">
            <div class="col-xl-3 col-lg-12">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-5 col-md-4 m-2 border shadow bg-dark rounded d-flex justify-content-center align-items-center one square">
                        <a href="./profile.php"><i class="bi bi-person-fill fa-4x"></i>
                            <h6>Profil</h6>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-4 m-2 border shadow rounded d-flex justify-content-center align-items-center one square">
                        <a href="#" id="orders"><i class="bi bi-truck fa-4x"></i>
                            <h6>Zamówienia</h6>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-4 m-2 border shadow rounded d-flex justify-content-center align-items-center one square">
                        <a href="./edycja.php"><i class="bi bi-file-text fa-4x"></i>
                            <h6>ADMIN ONLY</h6>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-4 m-2 border shadow bg-dark rounded d-flex justify-content-center align-items-center one square">
                        <a href="#"><i class="bi bi-person-fill fa-4x"></i>
                            <h6>Button4</h6>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-lg-12 p-3 my-2 border shadow rounded">
                <div class="row align-items-end">
                    <div class="col-md-3 text-center">
                        <div class="avatar">
                            <img src="https://images.vexels.com/media/users/3/129616/isolated/preview/fb517f8913bd99cd48ef00facb4a67c0-businessman-avatar-silhouette-by-vexels.png" style="width: 70%; height: 100%;" alt="" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head ">
                            <h1>
                                <?php if (empty($_SESSION['firstName'] && $_SESSION['lastName'])) {
                                    echo "Imię i nazwisko";
                                ?>
                                    <button type="button" class="btn btn1 btn-primary" data-bs-toggle="modal" data-bs-target="#firstNameLastName">
                                        Ustaw
                                    </button><?php
                                            } else {
                                                echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
                                            }
                                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <div class="data">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Adres 1: <b><?php echo $_SESSION['address1'] ?></b></li>
                                <li class="list-group-item">Adres 2: <b><?php echo $_SESSION['address2'] ?></b></li>
                                <li class="list-group-item">Miasto: <b><?php echo $_SESSION['city'] ?> </b></li>
                                <li class="list-group-item">Kod Pocztowy: <b><?php echo $_SESSION['postal'] ?></b></li>
                                <li class="list-group-item">Kraj: <b><?php echo $_SESSION['country'] ?></b></li>
                            </ul>

                            <button type="button" class="btn btn1 btn-primary" data-bs-toggle="modal" data-bs-target="#address">Zmień</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section id="order" style="display:none">
            <div class="back mt-2 ms-2">
                <button onclick="window.location.href='/profile.php'" class="btn btn1 fw-bold m-1 text-uppercase">Wróć do profilu</button>
            </div>
            <div class="container-fluid grey-bg py-3 text-center">
                <h3><b>Twoje zamówienia</b></h3>
                <span>W razie jakichkolwiek pytań prosimy o kontakt.</span>
            </div>
                <?php
                if ($conn->connect_errno != 0) {
                    echo "Error: " . $conn->connect_errno . "Opis: " . $conn->connect_errno;
                } else {
                    $zapytanie = "SELECT order_details.order_id, order_details.created_at, payment.status  FROM order_details JOIN payment ON payment.order_id = order_details.order_id  WHERE order_details.user_id =  '$userid'";
                    $result = mysqli_query($conn, $zapytanie);
                    while ($order = mysqli_fetch_assoc($result)) { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow-md text-center p-2 m-2">
                                        <div class="card-header  bg-dark text-light">Zamówienie nr <?php echo $order['order_id'] ?></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php $zapytanie2 = "SELECT items_order.product_id, items_order.quantity, products.name, products.price, products.image FROM items_order JOIN products ON items_order.product_id = products.id WHERE order_id = '" . $order['order_id'] . "'";
                                                $result2 = mysqli_query($conn, $zapytanie2);
                                                while ($order2 = mysqli_fetch_assoc($result2)) { ?>
                                                    <div class="row pb-2">
                                                        <div class="col-3">
                                                            <img class="image-fluid hidden" alt="product image" src="./photos_watches/<?php echo $order2['image']; ?>" style="height:80px; width:80px">
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <b><?php echo $order2['name'] ?></b>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">

                                                                        Ilość: <?php echo $order2['quantity'] ?>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h7>Cena: <?php echo $order2['price'] ?>zł</h7>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } ?>
                                            </div>
                                            <h5 class="card-title">Status płatności: <?php echo $order['status'] ?></h5>
                                        </div>
                                        <div class="card-footer text-muted">Data zamówienia <?php echo $order['created_at'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </section>

<section>
    <div class="modal fade" id="address" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Zmiana danych</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myform" method="post" action="profile.php">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Adres1:</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['address1'] ?>" name="address1">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Adres2:</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['address2'] ?>" name="address2">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" for="submit-form" name="submit" form="myform" class="btn btn1 btn-primary">Zmień</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="modal fade" id="firstNameLastName" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ustaw swoje imię i naziwsko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="firstName" method="post" action="./profile.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Imię</label>
                            <input type="text" name="firstName" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nazwisko</label>
                            <input type="text" name="lastName" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" for="submit-form" form="firstName" name="submit1" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="js.js"></script>
<script>
    var a = document.getElementById('orders');
    a.onclick = function() {
        var div = document.getElementById('profile');
        var div2 = document.getElementById('order');
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