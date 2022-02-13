<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php require_once "menu.php" ?>
<?php



if(isset($_GET['page_no']) && $_GET['page_no']!==""){
    $page_no = $_GET['page_no'];
}
else{
    $page_no = 1;
}

$total_records_per_page = 20;
$offset = ($page_no-1) * $total_records_per_page;
$previouse_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
          

$result_count = mysqli_query($conn, $zapytanie_ile);
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;



	$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';

	include $page . '.php';

    $id_produktu = array();

    if(filter_input(INPUT_POST, 'dodaj_do_koszyka'))
    {
        if(isset($_SESSION['koszyk']))
        {
            //licz ile w koszyku
            $licz = count($_SESSION['koszyk']);
			
            //połącz pozycję w koszyku z id produktu
            $id_produktu = array_column($_SESSION['koszyk'], 'id');
            
            if(!in_array(filter_input(INPUT_GET, 'id'), $id_produktu))
            {
                $_SESSION['koszyk'][$licz] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
				'description' => $_POST['description'],
                'image' => $_POST['image']
            );
            }
            else
            {
                echo '<script>alert("Przedmiot jest już w koszyku!")</script>';
            }
        }
        else 
        {
            //jeśli koszyk nie istnieje, stwórz produkt
            $_SESSION['koszyk'][0] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
				'description' => $_POST['description'],
                'image' => $_POST['image']
            );
        }
    }
    ?>

<section class="card">
<div class="pt-3"></div>
	<div class="container py-4">
		<div class="row">
            <div class="col-3">
                <h5 class="card-title p-2">Filtry</h5>
                <hr>
                <p class="card-text p-2">Filtruj listę zegarków.</p>
            </div>
            <div class="col-9">
				<p class="count-product p-2">Znaleziono <?php echo $total_records; ?> pozycje</p>
                <div class="row"><?php
                    if ($conn->connect_errno != 0) {
                        echo "Error: " . $conn->connect_errno . "Opis: " . $conn->connect_errno;
                    } else {
                        if( $_GET["szukaj"]) {
                            $_GET['szukaj'] = mysqli_real_escape_string($conn, $_GET['szukaj']);
                            $zapytanie3 = "SELECT * FROM products WHERE name LIKE '%" . $_GET['szukaj'] . "%' LIMIT $offset, $total_records_per_page";
                        } else{
                            $zapytanie3 = "SELECT * FROM products LIMIT $offset, $total_records_per_page";    
                        }           
                        $result = mysqli_query($conn, $zapytanie3);
                        while ($product = mysqli_fetch_assoc($result)) {?>
                            <div class="col-xl-3 col-lg-6" >
                                <form method="post" action="shop.php?action=add&id=<?php echo $product['id']; ?>">
                                    <div class="card shadow-sm border position-relative mb-5 px-3 py-3">
                                        <img src="./photos_watches/<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body position-static text-center">

                                            <h5 class="name"><a  href="shop.php?page=product&id=<?=$product['id']?>"><?php echo $product['name']; ?></a></h5>
                                            <h3 class="price fw-bold"><?php echo $product['price']. "zł"; ?></h3>
                                            <input type="text" name="quantity" class="form-control" value="1" />
                                            <input type="hidden" name="image" value="<?php echo $product["image"]; ?>" />
                                            <input id="22" type="hidden" name="name" value="<?php echo $product["name"]; ?>" />
                                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                                            <input type="submit" name="dodaj_do_koszyka" class="btn fw-bold p-3 text-white text-uppercase my-2" value="Dodaj do koszyka" />
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                    
                    <?php
                        }
                    }?>
                </div>

<strong>Strona <?php echo $page_no." z ".$total_no_of_pages; ?></strong>


            <nav>
            <ul class="pagination">
                <?php if($page_no > 1){ echo "<li class='page-item'><a class='page-link' href='?page_no=1'>Pierwsza</a></li>"; } ?>
                <li <?php if($page_no<=1){ echo "class='page-item disabled'";} ?>><a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'";}?>>Poprzednia</a></li>
                <?php 
                if ($total_no_of_pages <= 10){  	 
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                        if ($counter == $page_no) {
                            echo "<li class='page-item'><a class='page-link'>$counter</a></li>";	
                        }else{
                            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                } ?>
                <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'";} ?>><a <?php if($page_no < $total_no_of_pages) {echo "href='?page_no=$next_page'";} ?>class="page-link" >Następna</a></li>
                <?php if($page_no < $total_no_of_pages){ echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Ostatnia</a></li>"; } ?>
            </ul>
            </nav>
                </div>
        </div>
	</div>
    </div>
</section>


	<section class="bestseller pt-5">
	<div class="pt-3"></div>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-5 m-auto text-center pt-3">
					<h2>Nasze bestsellery</h2>
				</div>
			</div>
			<div class="row py-4">
				<?php
				
					$zapytanie = "SELECT * FROM products limit 6";

					if ($wynik = mysqli_query($conn, $zapytanie)) {
						if (mysqli_num_rows($wynik) > 0) {
							while ($product = mysqli_fetch_assoc($wynik)) { ?>
								<div class="col-xl-2 col-lg-4 col-6">
									<div class="card shadow-sm border mb-5 px-3 py-3">
										<img src="./photos_watches/<?php echo $product['image']; ?>" class="watch" alt="...">
										<div class="card-body text-center">
											<h5 class="name"><?php echo $product['name']; ?></h5>
											<h3 class="price fw-bold"><?php echo $product['price']. "zł"; ?></h3>
										</div>
										<div class="row">
											
										</div>
									</div>
								</div>
				<?php
							}
						}
					}
					$conn->close();
				
				?>
			</div>
			<hr>
	</section>
	<?php require_once "foot.php" ?>