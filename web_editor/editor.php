<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_editor.css">
    <link rel="stylesheet" href="css/style_watch.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>7onn</title>
</head>

<body>
    <div class="content">

        
        <?php

        session_start();
        include '../config.php';


        // Pobranie cen bransolet z bazy

        $check_products_strap = mysqli_query($conn, "SELECT * FROM products_strap");
        $products_num_strap = mysqli_num_rows($check_products_strap);

        for ($i = 1; $i <= $products_num_strap; $i++) {
            $fetch_products_strap[$i] = mysqli_fetch_array($check_products_strap);
            $price_products_strap[$i] = $fetch_products_strap[$i]["price"];
        }
        
        // Pobranie cen kopert z bazy

        $check_products_case = mysqli_query($conn, "SELECT * FROM products_case");
        $products_num_case = mysqli_num_rows($check_products_case);

        for ($i = 1; $i <= $products_num_case; $i++) {
            $fetch_products_case[$i] = mysqli_fetch_array($check_products_case);
            $price_products_case[$i] = $fetch_products_case[$i]["price"];
        }

        ?>

        <!-- ===================================== -->

        <div class="watch_absolute">

            <img src="watchimg/lg/strap/1.png" alt="" id="strap_basic">
            <img src="watchimg/lg/case/1.png" alt="" id="case_basic">

            <div class="watch">
                <div class="outside_watch">
                    <div class="index index_one"></div>
                    <div class="index index_two"></div>
                    <div class="index index_three"></div>
                    <div class="index index_four"></div>
                    <div class="inside_watch">
                        <div class="logo_watch"><img src="watchimg/logo/x50white.png" alt="" id="logo_watch_id"></div>
                        <div class="hand hour_hand"></div>
                        <div class="hand min_hand"></div>
                        <div class="hand sec_hand"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="rows">
            <h2>Stwórz swój model</h2>
            <div class="content_c">
                <div>
                    <h1>Bransoleta</h1>
                </div>
                <div class="row row_c">
                    <input type="radio" name="img_strap_color" id="btn_silver" onclick="strap_color_basic()" checked>
                    <input type="radio" name="img_strap_color" id="btn_gold" onclick="strap_color_gold()">
                    <input type="radio" name="img_strap_color" id="btn_black" onclick="strap_color_black()">
                </div>

            </div>
            <div class="row">
                <input type="radio" name="img_strap" id="strap_btn1" checked>
                <label for="strap_btn1">
                    <p><?php $i = 1;
                        echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_strap" id="strap_btn2">
                <label for="strap_btn2">
                    <p><?php echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_strap" id="strap_btn3">
                <label for="strap_btn3">
                    <p><?php echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
            </div>
            <div class="row">
                <input type="radio" name="img_strap" id="strap_btn4">
                <label for="strap_btn4">
                    <p><?php echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_strap" id="strap_btn5">
                <label for="strap_btn5">
                    <p><?php echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_strap" id="strap_btn6">
                <label for="strap_btn6">
                    <p><?php echo $price_products_strap[$i] . "$";
                        $i++ ?></p>
                </label>
            </div>

            <div class="content_c">
                <div>
                    <h1>Koperta</h1>
                </div>
                <div class="row row_c_2">
                    <input type="radio" name="img_case_color" id="btn_silver" onclick="case_color_basic()" checked>
                    <input type="radio" name="img_case_color" id="btn_gold" onclick="case_color_gold()">
                    <input type="radio" name="img_case_color" id="btn_black" onclick="case_color_black()">
                </div>
            </div>
            <div class="row">
                <input type="radio" name="img_case" id="case_btn1" checked>
                <label for="case_btn1">
                    <p><?php $i = 1;
                        echo $price_products_case[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_case" id="case_btn2">
                <label for="case_btn2">
                    <p><?php echo $price_products_case[$i] . "$";
                        $i++ ?></p>
                </label>
                <input type="radio" name="img_case" id="case_btn3">
                <label for="case_btn3">
                    <p><?php echo $price_products_case[$i] . "$";
                        $i++ ?></p>
                </label>
            </div>

            <div class="content_c">
                <h1>Wskazówki </h1>
                <div class="row row_c_2">
                    <input type="radio" name="color_pallete_bg" id="btn_black_pallete" onclick="pallete_four()" checked>
                    <input type="radio" name="color_pallete_bg" id="btn_white_pallete" onclick="pallete_five()">
                </div>
            </div>
            <div class="row">
                <input type="radio" name="color_pallete" id="pallete_btn1" onclick="pallete_one()" checked>
                <input type="radio" name="color_pallete" id="pallete_btn2" onclick="pallete_two()">
                <input type="radio" name="color_pallete" id="pallete_btn3" onclick="pallete_three()">
            </div>

        </div>
        <script src="js/js_editor.js"></script>
        <script src="js/watch.js"></script>
</body>

</html>