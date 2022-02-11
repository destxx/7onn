<?php include 'menu.php' ?>
<?php
session_start();
require_once "config.php";

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: login.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users (id, username, email, password)
					VALUES (NULL, '$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $lastid = mysqli_insert_id($conn); 
        $last_id = (int)$lastid;
        $sql = mysqli_query($conn, "INSERT INTO users_address (user_id) VALUES ('$last_id')")
            or die(mysqli_error($conn));

        echo "<script>alert('Wow! Rejestracja się udała.')</script>";
        $username = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
        header("Location: login.php");
      } else {
        echo "<script>alert('Woops! Coś poszło nie tak.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Taki adres email już istnieje.')</script>";
    }
  } else {
    echo "<script>alert('Hasła nie pasują.')</script>";
  }
}

?>


<section class="login-block">
  <div id="backgroundimage">
    <div class="container border my-5">
      <div class="row">
        <div class="col-md-4 login-sec p-5">
          <h2 class="text-center pt-5">Rejestracja</h2>
          <form action="" method="POST" class="login-email">
            <div class="form-group pt-3">
              <label for="InputEmail1" class="text-uppercase">E-mail</label>
              <input type="email" class="form-control" name="email" pattern="[^@\s]+@[^@\s]+" title="Niepoprawny format email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group pt-2">
              <label for="InputPassword1 gold" class="text-uppercase">Nazwa użytkownika</label>
              <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group pt-2">
              <label for="InputPassword1 gold" class="text-uppercase">Hasło</label>
              <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi składać się z conajmniej 8 znaków oraz zawierać conajmniej 1 dużą i małą literę" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="form-group pt-2">
              <label for="InputPassword1 gold" class="text-uppercase">Powtórz hasło</label>
              <input type="password" class="form-control" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="form-group pt-4 text-center">
              <button name="submit" class="btn btn-outline-dark w-100">Zarejestruj się</button>
            </div>
          </form>
        </div>
        <div class="col-md-8 row_log">
         <img src="./photos/register.jpg" class="img-fluid h-100 w-auto" alt="zegarek">
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "foot.php" ?>