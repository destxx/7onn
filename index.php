<?php include "menu.php" ?>
<?php require_once "config.php";


?>

<section class="main">
    <div class="container py-4">
        <div class="row py-4">
            <div class="col-lg-7 pt-5 text-center ">
                <h1>Twój indywidualny zegarek w naszym edytorze!</h1>
                <div class="pt-2">
                    <button onclick="window.location.href='/editor_load.php'" type="button" class="btn btn-lg shadow btn_yellow">STWÓRZ</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="new">
    <div class="container-fluid pt-5">
        <div class="pt-3"></div>
        <div class="row">
            <div class=" col-xl-6 col-lg-12 px-0">
                <img src="./photos/p1.jpg" class="img-fluid w-100" alt="zegarek">
            </div>
            <div class="d-flex align-items-start flex-column col-xl-6 col-lg-12">
                <h2 class="pt-4 ps-4 name_box">Model Holzkern 2021</h2>
                <p class="ps-4 col-lg-10 text_box">Fantastyczna propozycja na prezent bez względu na okazję. Ten męski zegarek składa się z brązowej bransoletki oraz koperty, której szerokość (razem z koronką) wynosi 54 mm. Całość została wykonana z wysokiej jakości drewna, tj. Orzech Amerykański & Wenge. Tarcza została zabezpieczona szkiełkiem mineralnym, dzięki czemu nie ulegnie ona uszkodzeniom zewnętrznym. Produkt posiada funkcje datownika dni miesiąca oraz chronografu. Wodoszczelność rangi 30 m oznacza, że niewielkie ilości wody (np. podczas mycia rąk) nie stanowią ryzyka zalania mechanizmu. Przy zakupie urządzenie jest obejmowane dwuletnią gwarancją.</p>
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
                <h2>Kolekcja A77</h2>
                <h5>
                    <div id="time_index"></div>
                </h5>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-xl-2 col-lg-4 col-6">
                <div class="card shadow-sm border mb-5 px-3 py-3 not-allowed">
                    <img src="./photos_watches/index_watch1.jpg" class="watch" alt="...">
                    <div class="card-body text-center">
                        <h5 class="name">Hawker Hunter AN12</h5>
                        <h3 class="price fw-bold">910.00 zł</h3>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-6">
                <div class="card shadow-sm border mb-5 px-3 py-3  not-allowed">
                    <img src="./photos_watches/index_watch2.jpg" class="watch" alt="...">
                    <div class="card-body text-center">
                        <h5 class="name">Hawker Hunter AN90</h5>
                        <h3 class="price fw-bold">815.00 zł</h3>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-6">
                <div class="card shadow-sm border mb-5 px-3 py-3  not-allowed">
                    <img src="./photos_watches/index_watch3.jpg" class="watch" alt="...">
                    <div class="card-body text-center">
                        <h5 class="name">Hawker Hunter AL33</h5>
                        <h3 class="price fw-bold">789.00zł</h3>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
        <div class="pt-2">
            <hr>
</section>


<section class="new">
    <div class="container-fluid pt-5">
        <div class="pt-3"></div>
        <div class="row">
            <div class="d-flex align-items-end flex-column  col-xl-6 col-lg-12">
                <h2 class="pt-4 pe-4 name_box">Model Skyline 2022</h2>
                <p class="pe-4 col-lg-10 text_box">Wyróżniający się model dla pań i panów. Jego bransoleta i koperta zostały wykonane z naturalnego drewna dębu. Szarą czytelną tarczę z naturalnego kamienia przykryto szkiełkiem mineralnym, które chroni ją przed zarysowaniami i obtłuczeniami. Srebrne wskazówki zostały pokryte masą fluorescencyjną, dzięki której można odczytać godzinę również w ciemności. Za dokładną pracę modelu odpowiada mechanizm kwarcowy. Wodoszczelność na poziomie 30 metrów chroni zegarek przed uszkodzeniem w przypadku niewielkich zachlapań. Produkt został objęty 2-letnią gwarancją oraz zapakowany w drewniane pudełko</p>
            </div>
            <div class="col-xl-6 col-lg-12 px-0">
                <img src="./photos/p2.jpg" class="img-fluid w-100" alt="zegarek">
            </div>
        </div>
    </div>
</section>
<div class="pb-3"></div>
<?php include "foot.php" ?>

<script>
    var diff = new Date("May 1, 2022 00:00:00").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var t = diff - now;
        var d = Math.floor(t / (1000 * 60 * 60 * 24));
        var h = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var m = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        var s = Math.floor((t % (1000 * 60)) / 1000);
        document.getElementById("time_index").innerHTML = "dostępna za " + d + " dni " +
            h + " godzin " + m + " minut " + s + " sekund ";
        if (t < 0) {
            clearInterval(x);
            document.getElementById("time_index").innerHTML = "już dostępna!";
        }
    }, 1000);
</script>