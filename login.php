<?php include 'menu.php' ?>
<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {

  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  //Oczyszczanie wprowadzonych danych


  $sql = "SELECT * FROM users INNER JOIN users_address ON users.id = users_address.user_id WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['zalogowany'] = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['firstName'] = $row['first_name'];
    $_SESSION['lastName'] = $row['last_name'];
  
    $_SESSION['userid'] = $row['id'];
    $_SESSION['address1'] = $row['address1'];
    $_SESSION['address2'] = $row['address2'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['postal'] = $row['postal_code'];
    $_SESSION['country'] = $row['country'];


    header("Location: index.php");
  } else {
    echo "<script>alert('Woops! Niepoprawny login lub hasło.')</script>";
  }
}
?>
<section class="login-block">
  <div id="backgroundimage">
    <div class="container border my-5">
      <div class="row">
        <div class="col-md-4 login-sec p-5">
          <h2 class="text-center pt-5">Logowanie</h2>
          <form action="" method="POST" class="login-email">
            <div class="form-group pt-3">
              <label for="InputEmail1" class="text-uppercase">E-mail</label>
              <input type="email" class="form-control" placeholder="" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group pt-2">
              <label for="InputPassword1 gold" class="text-uppercase">Hasło</label>
              <input type="password" class="form-control" placeholder="" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="form-group pt-4 text-center">
              <button name="submit" class="btn btn-outline-dark w-100">Zaloguj</button>
            </div>
            <p class="login-register-text text-center pt-2">Nie masz konta? <a class="link_log" href="register.php">Zarejstruj się</a>.</p>
          </form>
        </div>
        <div class="col-md-8 row_log">
         <img src="./photos/login.jpg" class="img-fluid h-100 w-auto" alt="zegarek">
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once "foot.php" ?>