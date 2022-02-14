<?php include "menu.php" ?>
<?php
	
	if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == false) && ($_SESSION['userid'] != 52 || 55)) {
		header("Location: index.php");
	}?>

<div class="container-fluid border grey-bg py-3 mb-3 text-center" >
        <h3>DODAJ NOWY PRODUKT</h3>
        <span>Wprowadź dane zegarka oraz dodaj zdjęcie w formacie JPG/PNG o proporcji 1:1.</span>
    </div>
<div class="container">
<form action="dodaj.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="pname" class="form-label">Nazwa produktu</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="mb-3">
    <label for="pdesc" class="form-label">Opis</label>
    <input type="text" class="form-control" name="pdesc">
  </div>
  <div class="mb-3">
    <label for="pprice" class="form-label">Cena</label>
    <input type="text" class="form-control" name="pprice">
  </div>
  <div class="mb-3">
    <label for="pquantity" class="form-label">Ilość</label>
    <input type="text" class="form-control" name="pquantity">
  </div>
  <input type="file" name="my_image">
  <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
</form>
</div>
<div class="container-fluid border grey-bg py-3 my-3 text-center" >
        <h3>WSZYSTKIE PRODUKTY</h3>
        <span>Wyświetlono wszystkie dostępny produkty, naciśnij X żeby usunąć z bazy.</span>
    </div>
<div class="container py-4 pt-3">
	<div class="row"><?php 
	require_once "config.php";
        if ($conn->connect_errno!=0)
		{
			echo "Error: ".$conn->connect_errno . "Opis: ". $conn->connect_errno; 
		}
		else
		{
			$zapytanie = "SELECT * FROM products";
			
			if ($wynik = mysqli_query($conn, $zapytanie))
			{
				if(mysqli_num_rows($wynik)>0)
				{
					while($product = mysqli_fetch_assoc($wynik))
					{ ?>
			<div class="col mt-2">
				<div class="card" style="width: 18rem;">
					<div class="delete pt-2 ps-3"><?php echo '<a href="usun.php?ID_rekordu='.$product['id'].'"><i class="bi bi-x-square-fill fa-2x" style = "color:red;"></i></a>'?></div>
				  <img src="./photos_watches/<?php echo $product['image']; ?>" class="card-img-top" alt="...">
					  <div class="card-body">
							<h5 class="name text-center"><?php echo $product['name'];?></h5>
							
					  </div>
				</div>
			</div>
			<?php
					}
				}
			}
			$conn->close();
		}
    ?>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>