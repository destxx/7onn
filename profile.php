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
    if ($result){
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
    if ($result1){
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
    }

}

?>

<section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Panel użytkownika</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Twoje dane
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Zamówienia
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Puste 1
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Puste 2
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Puste 3
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 p-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="avatar">
                            <img src="https://images.vexels.com/media/users/3/129616/isolated/preview/fb517f8913bd99cd48ef00facb4a67c0-businessman-avatar-silhouette-by-vexels.png" style="width: 70%; height: 100%;" alt="" />
                        </div>
                    </div>
                    <div class="col-md-9 p-3 position-relative">
                        <div class="profile-head position-absolute fixed-bottom">
                            <h1>
                                <?php if(empty($_SESSION['firstName'] && $_SESSION['lastName'])){
                                    echo "Brak imienia i nazwiska";
                                    ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#firstNameLastName">
                                        Ustaw
                                    </button><?php
                                  }
                                    else{ echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; }
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

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#address">Zmień</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
<div class="modal fade" id="address" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
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
        <button type="submit" for="submit-form" name="submit" form="myform" class="btn btn-primary">Zmień</button>
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

<?php require_once "foot.php" ?>