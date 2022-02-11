-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Czas generowania: 09 Lut 2022, 22:50
-- Wersja serwera: 8.0.26
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m25786_zegarki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `generated_watches`
--

CREATE TABLE `generated_watches` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `case_id` int NOT NULL,
  `case_color` int NOT NULL,
  `strap_id` int NOT NULL,
  `strap_color` int NOT NULL,
  `indicator_color` int NOT NULL,
  `date_gen` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `generated_watches`
--

INSERT INTO `generated_watches` (`id`, `order_id`, `payment_id`, `case_id`, `case_color`, `strap_id`, `strap_color`, `indicator_color`, `date_gen`) VALUES
(1, 1, 1, 2, 1, 3, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items_order`
--

CREATE TABLE `items_order` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `payment_id`, `total`, `created_at`) VALUES
(1, 4, 1, 452.17, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment`
--

CREATE TABLE `payment` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` int NOT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `date_added`) VALUES
(20, 'TIMEX PEYTON', 'Timex oferuje kolekcje zegarków dla mężczyzn, kobiet, chłopców i dziewcząt. Ideą marki, od samego początku jest ciągłe doskonalenie i rozwój swoich modeli, którego doskonałym przykładem jest m.in. ich', '399.00', 15, 'IMG-61fbe4f7867ec9.88280149.jpg', '2022-02-03 15:21:43'),
(21, 'TIMEX EXPEDITION SCOUT', 'Zegarek Expedition TW4B23000 dotrzyma ci tempa, gdy zabierzesz go na następną przygodę – słońce czy deszcz, góra czy dolina – żadna wyprawa nie jest mu straszna.', '389.00', 22, 'IMG-61fbe673560f40.58621969.jpg', '2022-02-03 15:28:03'),
(22, 'TIMEX TRANSCEND', 'Z elegancką, ale radosną tarczą zdobioną motywem kwiatowym, ultracienki zegarek Transcend™ TW2U98200 rozświetli Twój wygląd, dzięki eleganckiej kopercie i bransoletce z siatki ze stali nierdzewnej. Un', '459.00', 16, 'IMG-61fbe6bc414705.57589520.jpg', '2022-02-03 15:29:16'),
(23, 'TIMEX CITY', 'Timex oferuje kolekcje zegarków dla mężczyzn, kobiet, chłopców i dziewcząt. Ideą marki, od samego początku jest ciągłe doskonalenie i rozwój swoich modeli, którego doskonałym przykładem jest m.in. ich', '529.00', 14, 'IMG-61fbe6ebb98657.28849259.jpg', '2022-02-03 15:30:03'),
(24, 'TIMEX CHICAGO', 'Timex oferuje kolekcje zegarków dla mężczyzn, kobiet, chłopców i dziewcząt. Ideą marki, od samego początku jest ciągłe doskonalenie i rozwój swoich modeli, którego doskonałym przykładem jest m.in. ich', '649.00', 4, 'IMG-61fbe71e0161e2.10095293.jpg', '2022-02-03 15:30:54'),
(25, 'TIMEX EASY READER PERFECT FIT', 'Odświeżona i unowocześniona wersja cieszącego się ogromną popularnością zegarka z kolekcji Easy Reader, która zamienia ten klasyk z 1977 roku w wyrazisty, nowoczesny zegarek. Koperta z dużą, czytelną ', '349.00', 11, 'IMG-61fbe76c5c4285.96390754.jpg', '2022-02-03 15:32:12'),
(26, 'TIMEX T80', 'Timex oferuje kolekcje zegarków dla mężczyzn, kobiet, chłopców i dziewcząt. Ideą marki, od samego początku jest ciągłe doskonalenie i rozwój swoich modeli, którego doskonałym przykładem jest m.in. ich', '389.00', 2, 'IMG-61fbe79245db72.23301739.jpg', '2022-02-03 15:32:50'),
(27, 'TIMEX WATERBURY TRADITIONAL', 'W 1854 roku Timex stworzył The Waterbury Clock Company. Z widmem konfliktu zbrojnego na horyzoncie, wynaleźli zegarek, który żołnierze mogli nosić na nadgarstkach. Oto jak zaczęła się historia niepows', '599.00', 32, 'IMG-61fbe7d85a3ef0.05731121.jpg', '2022-02-03 15:34:00'),
(28, 'TIMEX EASY READER GEN 1', 'Odświeżone podejście do cieszącego się ogromną popularnością zegarka z kolekcji Easy Reader zamienia ten klasyk z 1977 roku w wyrazisty, nowoczesny zegarek. Koperta z dużą, czytelną tarczą i skórzanym', '379.00', 7, 'IMG-61fbe80d1f34e8.26550565.jpg', '2022-02-03 15:34:53'),
(29, 'TIMEX WATERBURY 40MM DATE', 'W 1854 roku Timex stworzył The Waterbury Clock Company. Z widmem konfliktu zbrojnego na horyzoncie, wynaleźli zegarek, który żołnierze mogli nosić na nadgarstkach. Oto jak zaczęła się historia niepows', '489.00', 6, 'IMG-61fbe846bfac73.17901254.jpg', '2022-02-03 15:35:50'),
(30, 'TIMEX CITY CELESTIAL', 'Zainspirowany pięknem nocnego nieba rozsianego gwiazdami, wyjątkowe detale zegarka Celestial TW2V01000 pięknie zaprezentują się na Twoim nadgarstku. Błyszcząca szara tarcza z podświetleniem INDIGLO® j', '379.00', 40, 'IMG-61fbe86dc56d65.73238580.jpg', '2022-02-03 15:36:29'),
(31, 'TIMEX EASY READER PERFECT FIT', 'Odświeżone podejście do cieszącego się ogromną popularnością zegarka z kolekcji Easy Reader zamienia ten klasyk z 1977 roku w wyrazisty, nowoczesny zegarek. Koperta z dużą, czytelną tarczą i wygodnym ', '349.00', 7, 'IMG-61fbe8a32adfd6.25598167.jpg', '2022-02-03 15:37:23'),
(32, 'OMEGA SEAMASTER AQUA TERRA', 'Męski Omega Seamaster Aqua Terra 220.12.41.21.03.005 to zegarek – hołd dla bogatego morskiego dziedzictwa OMEGA. W tym 41-milimetrowym modelu symetryczna koperta została wykonana ze stali nierdzewnej,', '30300.00', 1, 'IMG-61fbe997e8c4f3.85346744.jpg', '2022-02-03 15:41:27'),
(33, 'OMEGA CONSTELLATION', 'Wyrazisty i ponadczasowy design OMEGA Constellation charakteryzuje się słynnym fasetami w kształcie półksiężyca. Ten 34-milimetrowy model z 18-karatowego złota Sedna™ i stali nierdzewnej ma wyłozony d', '71400.00', 3, 'IMG-61fbe9be956f20.44543486.jpg', '2022-02-03 15:42:06'),
(34, 'OMEGA DE VILLE', 'Omega De Ville Prestige Co-axial, to męski zegarek, którego koperta o średnicy 39,5mm wykonana jest z 18-sto karatowego żółtego złota. Wskazówki, oraz cyfry rzymskie, wraz z indeksami wykonane z tego ', '50300.00', 5, 'IMG-61fbe9e517b903.00357450.jpg', '2022-02-03 15:42:45'),
(35, 'OMEGA DE VILLE', 'Omega De Ville Prestige Co-axial, to męski zegarek, którego koperta o średnicy 39,5mm wykonana jest z wysokiej jakości nierdzewnej stali szlachetnej 316L. Wskazówki, oraz cyfry rzymskie, wraz z indeks', '16800.00', 6, 'IMG-61fbea08dbd463.82746190.jpg', '2022-02-03 15:43:20'),
(36, 'SEIKO PROSPEX ARNIE DIVERS 200M SOLAR', 'Seiko SNJ029P1 z kolekcji Prospex. To linia wytrzymałych zegarków dla miłośników sportu i poszukiwaczy przygód – zarówno w wodzie, w powietrzu, jak i na lądzie. Od czasu wprowadzenia na rynek pierwsze', '2359.00', 11, 'IMG-61fbeac8e32445.50762980.jpg', '2022-02-03 15:46:32'),
(37, 'SEIKO CLASSIC LADY DIAMONDS', 'Po ponad 130 latach ciągłych innowacji, firma Kintaro Hattori jest wciąż oddana kreowaniu zegarków, które są kwintesencją doskonałości, do której osiągnięcia zawsze dążył założyciel. Doskonałym tego p', '2329.00', 14, 'IMG-61fbeae642bd85.25157255.jpg', '2022-02-03 15:47:02'),
(38, 'SEIKO CLASSIC QUARTZ TITANIUM', 'Po ponad 130 latach ciągłych innowacji, firma Kintaro Hattori jest wciąż oddana kreowaniu zegarków, które są kwintesencją doskonałości, do której osiągnięcia zawsze dążył założyciel. Doskonałym tego p', '1449.00', 15, 'IMG-61fbeb1a503e74.58738470.jpg', '2022-02-03 15:47:54'),
(39, 'SEIKO TUNA', 'Po ponad 130 latach ciągłych innowacji, firma Kintaro Hattori jest wciąż oddana kreowaniu zegarków, które są kwintesencją doskonałości, do której osiągnięcia zawsze dążył założyciel. Doskonałym tego p', '2049.00', 22, 'IMG-61fbeb3acc4387.27582248.jpg', '2022-02-03 15:48:26'),
(40, 'TISSOT LOVELY', 'Ku uciesze szwajcarskich zegarmistrzów model T058.009.33.031.00 marki Tissot stanowi ucieleśnienie potrzeb stylowych kobiet z całego świata. Jego niezwykłe wzornictwo nigdy nie wychodzi z mody, co jes', '1500.00', 5, 'IMG-61fbebf63a9196.54535926.jpg', '2022-02-03 15:51:34'),
(41, 'TISSOT PR 100 SPORT CHIC', 'Szwajcarski zegarek damski Tissot PR 100 Sport Chic z kolekcji T-Classic, o numerze producenta T101.910.22.111.00 to harmonijne zestawienie klasycznego stylu z wysublimowanymi zdobieniami. Poza elegan', '1800.00', 16, 'IMG-61fbec1a59ad51.06539997.jpg', '2022-02-03 15:52:10'),
(42, 'TISSOT SUPERSPORT CHRONO', 'Tissot Supersport Chrono T125.617.11.051.00 łączy styl i wydajność, nie ujmując niczego żadnej z tych cech. Inspiracje sportowym oraz casualowym stylem definiują zarówno wygląd, jak i funkcjonalność z', '2000.00', 20, 'IMG-61fbec357f6f08.77851923.jpg', '2022-02-03 15:52:37'),
(43, 'LONGINES HYDROCONQUEST', 'Od 1832 roku domem marki Longines jest szwajcarskie miasteczko Saint-Imier. Wysoki poziom zegarmistrzowskiego rzemiosła Longines opiera się na poszanowaniu tradycji, zasad elegancji oraz dążeniu do najwyższej wydajności. Longines od pokoleń służy jako oficjalny chronometrażysta imprez sportowych o randze światowej oraz jest cenionym partnerem międzynarodowych federacji sportowych. Marka jest znana z wyjątkowej elegancji swoich czasomierzy. Ma swoje punkty sprzedaży w ponad 150 krajach. Longines jest członkiem Swatch Group Ltd., wiodącego producenta zegarków i elementów zegarkowych na świecie.', '7670.00', 4, 'IMG-61fbed1a85a0c7.61767974.jpg', '2022-02-03 15:56:26'),
(44, 'LONGINES EVIDENZA', 'Od 1832 roku domem marki Longines jest szwajcarskie miasteczko Saint-Imier. Wysoki poziom zegarmistrzowskiego rzemiosła Longines opiera się na poszanowaniu tradycji, zasad elegancji oraz dążeniu do najwyższej wydajności. Longines od pokoleń służy jako oficjalny chronometrażysta imprez sportowych o randze światowej oraz jest cenionym partnerem międzynarodowych federacji sportowych. Marka jest znana z wyjątkowej elegancji swoich czasomierzy. Ma swoje punkty sprzedaży w ponad 150 krajach. Longines jest członkiem Swatch Group Ltd., wiodącego producenta zegarków i elementów zegarkowych na świecie.', '8170.00', 4, 'IMG-61fbed3c737207.97131997.jpg', '2022-02-03 15:57:00'),
(45, 'LONGINES MASTER COLLECTION', 'Od 1832 roku domem marki Longines jest szwajcarskie miasteczko Saint-Imier. Wysoki poziom zegarmistrzowskiego rzemiosła Longines opiera się na poszanowaniu tradycji, zasad elegancji oraz dążeniu do najwyższej wydajności. Longines od pokoleń służy jako oficjalny chronometrażysta imprez sportowych o randze światowej oraz jest cenionym partnerem międzynarodowych federacji sportowych. Marka jest znana z wyjątkowej elegancji swoich czasomierzy. Ma swoje punkty sprzedaży w ponad 150 krajach. Longines jest członkiem Swatch Group Ltd., wiodącego producenta zegarków i elementów zegarkowych na świecie.', '9980.00', 13, 'IMG-61fbed62befce7.53470562.jpg', '2022-02-03 15:57:38'),
(46, 'LONGINES LYRE', 'Longines Lyre L4.961.2.32.7 to męski zegarek, którego koperta wykonana jest z wysokiej jakości, nierdzewnej stali szlachetnej 316L. Wskazówki oraz nakładane indeksy w kolorze koperty doskonale komponują się ze złotą tarczą. Cyferblat osłania najlepsze na rynku, nierysujące się szkło szafirowe. Do zegarka dołączono delikatną, błyszczącą, stalową bransoletę zakończoną bezpiecznym zapięciem motylkowym. Dzięki temu mamy pewność, że zegarek nie spadnie nam z nadgarstka. Longines Lyre, to przykład typowej klasyki z powiewem biżuteryjnego stylu. Będzie on pasował do szerokiej palety strojów a także do wielu różnych okazji. Czasomierz ten cechuje wodoszczelność rzędu 3 barów. Wytrzyma deszcz, mycie rąk i przypadkowe zachlapania. Dzięki temu nie musimy się z nim rozstawać nawet na chwilę podczas wykonywania naszych codziennych czynności.', '6820.00', 1, 'IMG-61fbed7e3376d8.44795170.jpg', '2022-02-03 15:58:06'),
(47, 'LONGINES MASTER COLLECTION', 'Ponadczasowa elegancja firmy Longines, opiera się na bogatym, stale aktualizowanym dziedzictwie projektowania, wyrażonym w postaci subtelnego połączenia klasycznego ducha i innowacyjnej wytworności. Reputacja, prestiż i potwierdzona jakość Longines przyciągają wciąż rosnącą liczbę znanych w świecie osobistości.', '10290.00', 3, 'IMG-61fbed968332a9.70036228.jpg', '2022-02-03 15:58:30'),
(48, 'LONGINES MASTER COLLECTION', 'Ponadczasowa elegancja firmy Longines, opiera się na bogatym, stale aktualizowanym dziedzictwie projektowania, wyrażonym w postaci subtelnego połączenia klasycznego ducha i innowacyjnej wytworności. Reputacja, prestiż i potwierdzona jakość Longines przyciągają wciąż rosnącą liczbę znanych w świecie osobistości.', '10290.00', 3, 'IMG-61fbedcb47f917.29455668.jpg', '2022-02-03 15:59:23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products_case`
--

CREATE TABLE `products_case` (
  `id_item` int NOT NULL,
  `name_item` varchar(55) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` varchar(55) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products_case`
--

INSERT INTO `products_case` (`id_item`, `name_item`, `price`) VALUES
(1, 'Case1', '365.00'),
(2, 'Case2', '325.00'),
(3, 'Case3', '413.50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products_strap`
--

CREATE TABLE `products_strap` (
  `id_item` int NOT NULL,
  `name_item` varchar(55) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` varchar(55) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products_strap`
--

INSERT INTO `products_strap` (`id_item`, `name_item`, `price`) VALUES
(1, 'Strap1', '150.00'),
(2, 'Strap2', '325.00'),
(3, 'Strap3', '413.50'),
(4, 'Strap4', '122.00'),
(5, 'Strap5', '258.50'),
(6, 'Strap6', '378.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `telephone`, `date_added`) VALUES
(52, 'WSB', '402fd6af80d80e346b96c89d37aae805', 'user@wsb.pl', 'Adam', 'Kowalski', NULL, '2022-02-09 16:51:21'),
(53, 'User22', '0494170d63b88423f502dee49523bb83', 'user222@gmail.com', NULL, NULL, NULL, '2022-02-09 20:16:17'),
(54, 'user3213', 'aac6e3ceacb090973f98433551c8af01', 'user3213@gmail.com', NULL, NULL, NULL, '2022-02-09 20:19:02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_address`
--

CREATE TABLE `users_address` (
  `address_id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `address1` varchar(64) DEFAULT NULL,
  `address2` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `postal_code` varchar(16) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `users_address`
--

INSERT INTO `users_address` (`address_id`, `user_id`, `address1`, `address2`, `city`, `postal_code`, `country`) VALUES
(23, 51, 'Polna 14', '', 'Daniszyn', '63-300', 'Polska'),
(24, 52, 'Polna 4', '', 'Poznań', '60-778', 'Polska'),
(25, 53, NULL, NULL, NULL, NULL, NULL),
(26, 54, NULL, NULL, NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `generated_watches`
--
ALTER TABLE `generated_watches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `items_order`
--
ALTER TABLE `items_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indeksy dla tabeli `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products_case`
--
ALTER TABLE `products_case`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeksy dla tabeli `products_strap`
--
ALTER TABLE `products_strap`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `id` (`address_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `generated_watches`
--
ALTER TABLE `generated_watches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `items_order`
--
ALTER TABLE `items_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `products_case`
--
ALTER TABLE `products_case`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `products_strap`
--
ALTER TABLE `products_strap`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT dla tabeli `users_address`
--
ALTER TABLE `users_address`
  MODIFY `address_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
