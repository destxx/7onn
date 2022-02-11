<?php include "meny.php"?>
<?php
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
			<div class="col">
				<div class="card" style="width: 18rem;">
				  <img src="./photos_watches/<?php echo $product['image']; ?>" class="card-img-top">
					  <div class="card-body">
							<h2 class="name"><?php echo $product['name'];?></h1>
							<?php echo '<a href="usun.php?ID_rekordu='.$product['id'].'">Usuń</a>';
?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>