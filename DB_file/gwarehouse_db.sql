-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 10:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwarehouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

CREATE TABLE `administratori` (
  `administrator_id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(35) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(127) NOT NULL,
  `lozinka` varchar(80) NOT NULL,
  `obrisan` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`administrator_id`, `ime`, `prezime`, `email`, `lozinka`, `obrisan`) VALUES
(3, 'Đorđe', 'Olujić', 'olujic.djordje@gmail.com', '123456789', 0),
(4, 'Pera', 'Perić', 'peraperic@gmail.com', 'administrator', 0),
(5, 'admin7854', 'admin1', 'admin45@gmail.com', 'adsadsvfdddvdvs', 1),
(6, 'Pera', 'fafafa', 'stefiko@ffafa.com', '12345', 1),
(7, 'Mile', 'Milic', 'milemil@gmail.com', '1234567', 0),
(8, 'nik', 'khgg', 'nik@dffaffafa.com', '12345', 1),
(9, 'dad', 'dadada', 'olujic.fgrtgfdgdd@ffa.com', '24324242', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brendovi`
--

CREATE TABLE `brendovi` (
  `brend_id` int(11) UNSIGNED NOT NULL,
  `naziv_brenda` varchar(50) NOT NULL,
  `slika_brenda` varchar(50) NOT NULL,
  `obrisan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brendovi`
--

INSERT INTO `brendovi` (`brend_id`, `naziv_brenda`, `slika_brenda`, `obrisan`) VALUES
(1, 'Dell', 'dell_logo.png', 0),
(2, 'Hyperx', 'hyperx_logo.png', 0),
(5, 'HP', 'hp_logo.png', 0),
(6, 'Acer', 'acer_logo.png', 0),
(7, 'AMD', 'amdlogo.png', 0),
(8, 'Antec', 'antec_logo.png', 0),
(9, 'Aorus', 'aorus_logo.png', 0),
(10, 'Asus', 'asus_logo.png', 0),
(11, 'Benq', 'benq_logo.png', 0),
(12, 'be quiet!', 'be_quiet_logo.png', 0),
(13, 'Cooler Master', 'cm_logo.png', 0),
(14, 'Corsair', 'corsair_logo.png', 0),
(15, 'Crucial', 'crucial_logo.png', 0),
(16, 'EVGA', 'evga_logo.png', 0),
(17, 'Geil', 'geil.png', 0),
(18, 'Gigabyte', 'gigabyte_logo.png', 0),
(19, 'Intel', 'Intel_Core_logo.png', 0),
(20, 'Kingston', 'Kingston.png', 0),
(21, 'Lenovo', 'lenovo_logo.png', 0),
(22, 'LG', 'lg_logo.png', 0),
(23, 'Logitech', 'logitech_logo.png', 0),
(24, 'MSI', 'msi_logo.png', 0),
(25, 'NZXT', 'NZXT_logo.png', 0),
(26, 'Patriot', 'patriot_logo.png', 0),
(27, 'Philips', 'philips_logo.png', 0),
(28, 'Powercolor', 'powercolor_logo.png', 0),
(29, 'Raidmax', 'raidmax_logo.png', 0),
(30, 'Redragon', 'redragon_logo.png', 0),
(31, 'AMD Ryzen', 'ryzen_logo.png', 0),
(32, 'Samsung', 'Samsung.png', 0),
(33, 'Sapphire', 'sapphire_logo.png', 0),
(34, 'Seasonic', 'seasonic_logo.png', 0),
(35, 'SONY', 'sony_logo.png', 0),
(36, 'Sillicon Power', 'sp_logo.png', 0),
(37, 'Thermal Grizzly', 'tg_logo.png', 0),
(38, 'Thermaltake', 'thermaltake_logo.png', 0),
(39, 'Transcend', 'transcend_logo.png', 0),
(40, 'Western Digital', 'wd_logo.png', 0),
(41, 'XFX', 'xfx_logo.png', 0),
(42, 'ZOTAC', 'zotac_logo.png', 0),
(43, 'ADATA', 'ADATA-Logo.png', 0),
(44, 'SanDisk', 'sandisk_logo.png', 0),
(45, 'Marvo', 'marvo_logo.png', 0),
(46, 'AOC', 'aoc_logo.png', 0),
(47, 'ASRock', 'asrock_logo.png', 0),
(49, 'hama', 'hama_logo.png', 0),
(50, 'Microsoft', 'microsoft_logo.png', 0),
(54, 'ROG', 'rog_logo.png', 0),
(55, 'Intel ARC', 'intel-arc-logo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorija_id` int(10) UNSIGNED NOT NULL,
  `naziv_kategorije` varchar(100) NOT NULL,
  `slika_kategorije` varchar(100) NOT NULL,
  `obrisan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorija_id`, `naziv_kategorije`, `slika_kategorije`, `obrisan`) VALUES
(1, 'Grafičke karte', 'gpu.jpg', 0),
(2, 'Procesori', 'cpu.jpg', 0),
(3, 'Hladnjaci i oprema', 'cooler.jpg', 0),
(4, 'Napajanja', 'psu.jpg', 0),
(5, 'Laptopovi i oprema', 'laptop.jpg', 0),
(6, 'Tastature i miševi', 'keyboard1.jpg', 1),
(7, 'Gotove konfiguracije', 'pc_case.jpg', 0),
(8, 'Slušalice i mikrofoni', 'headphones.jpg', 0),
(9, 'Gejming stolovi i stolice', 'gaming_chair.jpg', 0),
(10, 'USB flash memorije', 'usb_flash.jpg', 0),
(12, 'Monitori', 'monitor.jpg', 0),
(13, 'Konzole i oprema', 'console.jpg', 0),
(14, 'Hard diskovi i SSD', 'ssd.jpg', 0),
(15, 'Matične ploče', 'motherboard.jpg', 0),
(16, 'RAM memorije', 'ram.jpg', 0),
(17, 'Kablovi i adapteri', 'cables.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `komentar_id` int(10) UNSIGNED NOT NULL,
  `proizvod_id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT current_timestamp(),
  `voli` int(3) NOT NULL DEFAULT 0,
  `nevoli` int(3) NOT NULL DEFAULT 0,
  `odobren` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`komentar_id`, `proizvod_id`, `ime`, `komentar`, `vreme`, `voli`, `nevoli`, `odobren`) VALUES
(1, 127, 'Đorđe', 'Odlican proizvod! Stigao na vreme i lako montiran.', '2023-03-01 11:54:52', 0, 0, 1),
(2, 127, 'ddsadda', 'daddadaad', '2023-03-01 12:48:07', 0, 0, 1),
(4, 11, 'Pera', 'dadaddad', '2023-03-01 13:16:16', 0, 0, 1),
(5, 11, 'Paja', '&lt;script&gt;Hakovan si!&lt;script&gt;', '2023-03-01 13:31:46', 0, 0, 1),
(6, 11, 'Paja', '&lt;script&gt;Hakovan si!&lt;script&gt;', '2023-03-01 13:33:43', 0, 0, 1),
(13, 127, 'Milos Milosevic', 'frttaaaaaa', '2023-03-26 21:49:23', 0, 0, 1),
(16, 174, 'Milos Milosevic', 'Laptop je top!', '2023-04-06 19:39:40', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(35) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `adresa` varchar(128) NOT NULL,
  `email` varchar(127) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `lozinka` varchar(80) NOT NULL,
  `obrisan` int(1) NOT NULL DEFAULT 0,
  `newsletter` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `ime`, `prezime`, `adresa`, `email`, `telefon`, `lozinka`, `obrisan`, `newsletter`) VALUES
(3, 'Milos', 'Milosevic', 'Cara Lazara 47', 'milos567@gmail.com', '+3816033223131', '123456789', 0, 0),
(4, 'Pera', 'Peric', 'Beogradska 35', 'peraperic566@gmail.com', '060123456787', '123456/', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `korpa_id` int(10) UNSIGNED NOT NULL,
  `proizvod_id` int(10) UNSIGNED NOT NULL,
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  `datum_kupovine` datetime NOT NULL DEFAULT current_timestamp(),
  `status_kupovine` varchar(50) NOT NULL DEFAULT 'U pripremi',
  `kupljen` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`korpa_id`, `proizvod_id`, `korisnik_id`, `datum_kupovine`, `status_kupovine`, `kupljen`) VALUES
(22, 130, 4, '2023-07-16 20:06:28', 'Na dostavi', 1),
(23, 135, 4, '2023-07-16 20:06:36', 'U pripremi', 1),
(24, 129, 4, '2023-07-16 20:24:02', 'U pripremi', 1),
(25, 130, 4, '2023-07-16 20:24:04', 'U pripremi', 1),
(26, 113, 4, '2023-07-16 20:24:09', 'Dostavljeno', 1),
(27, 181, 4, '2023-07-16 21:31:20', 'U pripremi', 0),
(28, 135, 4, '2023-07-16 21:31:23', 'U pripremi', 0),
(29, 113, 4, '2023-07-16 21:31:27', 'U pripremi', 0),
(30, 127, 4, '2023-07-16 21:44:15', 'U pripremi', 0),
(31, 127, 4, '2023-07-16 21:44:16', 'U pripremi', 0),
(32, 127, 4, '2023-07-16 21:44:16', 'U pripremi', 0),
(33, 127, 4, '2023-07-16 21:44:25', 'U pripremi', 0),
(34, 127, 4, '2023-07-16 21:44:27', 'U pripremi', 0),
(35, 127, 4, '2023-07-16 21:45:07', 'U pripremi', 0),
(36, 131, 4, '2023-07-16 21:45:53', 'U pripremi', 0),
(37, 107, 4, '2023-07-16 21:45:58', 'U pripremi', 0),
(38, 135, 4, '2023-07-16 21:46:04', 'U pripremi', 0),
(39, 127, 4, '2023-07-16 21:49:17', 'U pripremi', 0),
(40, 127, 4, '2023-07-16 21:49:25', 'U pripremi', 0),
(41, 127, 4, '2023-07-16 21:50:31', 'U pripremi', 0),
(42, 128, 4, '2023-07-16 21:51:24', 'U pripremi', 0),
(43, 127, 4, '2023-07-16 21:52:42', 'U pripremi', 0),
(44, 127, 4, '2023-07-16 21:52:45', 'U pripremi', 0),
(45, 127, 4, '2023-07-16 21:52:49', 'U pripremi', 0),
(46, 170, 4, '2023-07-16 22:00:58', 'U pripremi', 0),
(47, 17, 4, '2023-07-16 22:05:22', 'U pripremi', 0),
(48, 111, 4, '2023-07-16 22:05:25', 'U pripremi', 0),
(49, 176, 4, '2023-07-16 22:05:34', 'U pripremi', 0),
(50, 198, 4, '2023-07-16 22:05:41', 'saab', 0),
(51, 114, 4, '2023-07-16 22:17:22', 'U pripremi', 0),
(52, 11, 4, '2023-07-17 12:26:36', '0', 0),
(53, 127, 3, '2023-07-19 13:35:43', 'Dostavljeno', 1),
(55, 128, 3, '2023-07-20 12:25:14', 'Dostavljeno', 1),
(56, 131, 3, '2023-07-20 12:25:29', 'U pripremi', 1),
(95, 127, 3, '2023-07-22 00:41:03', 'U pripremi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `napomene`
--

CREATE TABLE `napomene` (
  `napomena_id` int(10) UNSIGNED NOT NULL,
  `tekst` text NOT NULL,
  `vremeK` timestamp NOT NULL DEFAULT current_timestamp(),
  `podaci` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `napomene`
--

INSERT INTO `napomene` (`napomena_id`, `tekst`, `vremeK`, `podaci`) VALUES
(11, 'Treba dodati \"Specifikacije\" i \"Opis proizvoda\" za proizvode iz kategorije \"Procesori\".', '2023-02-01 11:55:29', 'Djordje Olujic'),
(12, 'Prodate stvari', '2023-03-28 19:16:30', 'Djordje Olujic');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pogledKorpa`
-- (See below for the actual view)
--
CREATE TABLE `pogledKorpa` (
`korpa_id` int(10) unsigned
,`datum_kupovine` datetime
,`status_kupovine` varchar(50)
,`kupljen` int(1)
,`proizvod_id` int(10) unsigned
,`naziv` varchar(128)
,`cena` decimal(10,2)
,`korisnik_id` int(10) unsigned
,`ime_korisnika` varchar(35)
,`prezime_korisnika` varchar(40)
,`telefon_korisnika` varchar(20)
,`adresa_korisnika` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pogledProizvodi`
-- (See below for the actual view)
--
CREATE TABLE `pogledProizvodi` (
`proizvod_id` int(10) unsigned
,`naziv` varchar(128)
,`glavna_slika` varchar(255)
,`stara_cena` decimal(10,2)
,`nova_cena` decimal(10,2)
,`kategorija_id` int(10) unsigned
,`izdvojeno` varchar(10)
,`aktivno` varchar(10)
,`model` varchar(50)
,`specifikacije` text
,`opis_proizvoda` text
,`brend_id` int(10) unsigned
,`status` varchar(30)
,`slika_brenda` varchar(50)
,`naziv_brenda` varchar(50)
,`naziv_kategorije` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvod_id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(128) NOT NULL,
  `stara_cena` decimal(10,2) NOT NULL,
  `nova_cena` decimal(10,2) NOT NULL,
  `kategorija_id` int(10) UNSIGNED NOT NULL,
  `izdvojeno` varchar(10) NOT NULL,
  `aktivno` varchar(10) NOT NULL,
  `model` varchar(50) NOT NULL,
  `specifikacije` text NOT NULL,
  `opis_proizvoda` text NOT NULL,
  `brend_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(30) NOT NULL,
  `glavna_slika` varchar(255) NOT NULL,
  `obrisan` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvod_id`, `naziv`, `stara_cena`, `nova_cena`, `kategorija_id`, `izdvojeno`, `aktivno`, `model`, `specifikacije`, `opis_proizvoda`, `brend_id`, `status`, `glavna_slika`, `obrisan`) VALUES
(11, 'Asus TUF Gaming GeForce RTX 4090 OC 24GB GDDR6 384-bit ', '275000.00', '263499.00', 1, 'Ne', 'Da', 'GeForce RTX 4090', 'BUS standard: PCI Express 4.0;Memorijski interfejs: 384-bit;Tip memorije: GDDR6X;Veličina memorije: 24GB;Takt procesora (GPU): 2640 MHz;Takt memorije: 21000 MHz;CUDA jezgara: 16384;Konektori: 2 x HDMI 2.1a, 3 x DisplayPort 1.4a, HDCP: 2.3;Maksimalna rezolucija: 7680 x 4320px;Broj ventilatora: 3;Preporučeno napajanje: 850W;Dimenzije: 348.2 x 150 x 72.6 mm', 'NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2x performance and power efficiency, 4th Generation Tensor Cores:Up to 4x performance with DLSS 3 vs. brute-force rendering, 3rd Generation RT Cores: Up to 2X ray tracing performance, Military-grade Capacitors rated for 20K hours at 105C make the GPU power rail more durable  ', 10, 'Na stanju', 'asus_tuf4090.png', 0),
(17, 'Sapphire TOXIC Radeon RX 6900 XT LE 16GB GDDR6 256bit', '290000.00', '268999.00', 1, 'Ne', 'Da', 'Radeon RX 6900 XT', 'Proizvođač: Sapphire;Memorijski interfejs: 256-bit;Tip memorije: GDDR6;Veličina memorije: 16 GB;BUS standard: PCI Express 4.0;Takt procesora (GPU): 2365 MHz;Takt memorije: 16000 MHz;HDMI izlaz: 1;Display port izlaz: 2;Hlađenje: Vodeno hlađenje;Boja: Crna; Garantni rok: 3 godine  ', 'The long envisioned and highly anticipated TOXIC AMD Radeon™ RX 6900 XT LE Graphics Card designed for the DIY Enthusiast, and Gamer pursuing unrivaled performance with a paramount cooling solution. Driving an innovative overclocking solution with incredible new cooling technology, the TOXIC AMD Radeon™ RX 6900 XT LE is the superior choice for building a powerhouse PC with the best gaming performance on the market. Switch from performance mode to silent mode or back using our TriXX software for a quick and easy switch between your dual BIOS modes.', 33, 'Na stanju', 'sapphire_rx6900xt.png', 0),
(22, 'Sandisk 128GB USB-C/USB 3.1 (SDDDC2-128G-G46) Ultra Dual Drive USB Type-C', '2500.00', '1800.00', 10, 'Ne', 'Da', 'SDDDC2-128G', 'Kapacitet: 128 GB;Konektor: USB 3.1 Gen1 USB Type-C;Brzina čitanja[MB/s]: 150', 'Dizajniran specijalno za uređaje nove generacije sa novim USB Type-C portom. Velika brzina prenosa do čak 150 MB/s pružiće brz prenos vaših, slika, videa, pesama i drugih fajlova između uređaja.Takođe preko Google Play Store-a možete preuzeti San Disk Memory Zone aplikaciju koja omogućava da pogledate, pristupite i napravite rezervne kopije vaših fajlova na jednom mestu.', 44, 'Na stanju', 'sandisk _128gb.png', 0),
(23, 'KINGSTON 128GB DataTraveler Kyson USB 3.2 flash DTKN/128GB', '2180.00', '1700.00', 10, 'Da', 'Da', 'DataTraveler Kyson', 'Kapacitet: 128GB;Interfejs: \r\nUSB 3.2 Gen 1 (USB 3.0);Brzina: \r\ndo 200 MB/s;Boja: Siva', 'Kingston’s DataTraveler® Kyson is a high-performance Type-A USB flash drive with extremely fast transfer speeds of up to 200MB/s Read and 60MB/s Write1, allowing quick and convenient file transfers. With up to 256GB2 of storage, you can store and share photos, videos, music and other content on the go. The capless metal design will save you the trouble of losing a cap, and the functional loop makes it easy to be taken wherever you go.', 20, 'Na stanju', 'kingston_128gb.png', 0),
(25, 'MASTERAIR MA612 STEALTH ARGB CPU hladnjak', '15000.00', '12000.00', 3, 'Ne', 'Ne', 'MA612 STEALTH', 'CPU Socket: LGA1700, LGA1200, LGA2066, LGA2011-v3, LGA2011, LGA1156, LGA1155, LGA1151, LGA1150, AM5, AM4, AM3+, AM3, AM2+, AM2, FM2+, FM2, FM1;Dimenzije:  	129 x 112.2 x 158 mm;Dimenzije ventilatora: 120 x 120 x 25 mm;Broj ventilatora: 2;Brzina ventilatora: 650-1800 RPM (PWM) ± 5%;Protok vazduha: 62 CFM (Max);Buka ventilatora: 8 - 27 dBA;Radni vek ventilatora: 160,000 sati;Konektor za ventilator: 4-Pin (PWM);\r\nGarancija: 5 godina; ', 'Stealth Black Hardware: All-black hardware throughout offers a darkened premium look.\r\n6 Heat Pipe with Nickel Plated Base: 6 heat pipe and nickel plated copper base provides maximum coverage for optimal cooling.\r\nPremium Aluminum Black Top Cover: Black aluminum top cover offers a premium finish.\r\nDual SickleFlow 120 ARGB Fan: Twin setup of revised curved blades optimizes airflow and pressure with customizable lighting. ', 13, 'Na stanju', 'MASTERAIR MA612 STEALTH ARGB.png', 0),
(26, 'MSI GeForce RTX 2060 VENTUS GP OC 6GB GDDR6 192bit', '42000.00', '35000.00', 1, 'Ne', 'Da', 'NVIDIA® GeForce RTX™ 2060 ', 'BUS standard: PCI Express x16 3.0;Memorijski interfejs: 192-bit;Tip memorije: GDDR6;Veličina memorije: 6GB;Takt procesora (GPU): 1710 MHz;Takt memorije: 14000 MHz;CUDA jezgara: 1920;Konektori: 1 x HDMI 2.0b, 3 x DisplayPort 1.4a, HDCP: 2.2;Maksimalna rezolucija: 7680 x 4320px;Broj ventilatora: 2;Preporučeno napajanje: 500 W;Konektori napajanja: 8-pin x 1;Dimenzije: 231 x 128 x 42 mm ', '\r\n    Dispersion fan blade: Steep curved blade accelerating the airflow\r\n    Traditional fan blade: Provides steady airflow to massive heat sink below\r\n    Double ball bearing: Strong and lasting core for years of smooth gaming.\r\nAfterburner Overclocking Utility\r\nOC Scanner: An automated function finds the highest stable overclock settings.\r\nOn Screen Display: Provides real-time information of your system\'s performance.\r\nPredator: In-game video recording.\r\nNVIDIA G-SYNC™ and HDR\r\nGet smooth, tear-free gameplay at refresh rates up to 240 Hz, plus HDR, and more. This is the ultimate gaming display and the go-to equipment for enthusiast gamers.\r\n', 24, 'Na stanju', 'msi_rtx_2060_ventus.png', 0),
(33, 'Asus ROG Strix GeForce RTX™ 4090 OC 24GB GDDR6X 384-bit', '395000.00', '375000.00', 1, 'Da', 'Da', 'NVIDIA® GeForce RTX™ 4090', 'BUS standard: PCI Express 4.0;Memorijski interfejs: 384-bit;Tip memorije: GDDR6X;Veličina memorije: 24GB;Takt procesora (GPU): 2640 MHz;Takt memorije: 21000 MHz;CUDA jezgara: 16384;Konektori: 2 x HDMI 2.1a, 3 x DisplayPort 1.4a, HDCP: 2.3;Maksimalna rezolucija: 7680 x 4320px;Broj ventilatora: 3;Preporučeno napajanje: 1000W;Dimenzije: 357.6 x 149.3 x 70.1mm', 'NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2x performance and power efficiency\r\n4th Generation Tensor Cores: Up to 4x performance with DLSS 3 vs. brute-force rendering \r\n3rd Generation RT Cores: Up to 2X ray tracing performance\r\nOC mode: Boost clock 2640 MHz (OC mode)/ 2610 MHz (Gaming mode) \r\nAxial-tech fans scaled up for 23% more airflow\r\nNew patented vapor chamber with milled heatspreader for lower GPU temps \r\n3.5-slot design: massive fin array optimized for airflow from the three Axial-tech fans ', 54, 'Na stanju', 'rog_strix_4090.png', 0),
(107, 'Lenovo IdeaPad Gaming 3i/15.6\" FHD/120Hz/16GB/I5-10300H/GTX1650/512GB', '105000.00', '70000.00', 5, 'Ne', 'Da', 'Ideapad Gaming 3i', 'Procesor: Intel® Core™ i5-10300H 2.50 GHz;\r\nDisplej: 15.6\" FHD (1920 x 1080) IPS, 120Hz, 250 nits, 45% color gamut;\r\nGrafika: NVIDIA® GeForce® GTX 1650;\r\nMemorija: 16GB DDR4, 2933MHz;\r\nSkladište: 512GB M.2 NVME SSD;\r\nBaterija: do 7 sati;\r\nAudio: Dolby Audio™, 2 x 1.5W zvučnici;\r\nDimenzije: 359mm x 249.6mm x 24.9mm;\r\nTežina: 2.2kg;\r\nKamera: 720p HD, sa zaštitom privatnosti;\r\nBoja: Onyx Black;\r\nMreža: 2x2 WiFi 6 802.11 ax, Bluetooth® 5.0;\r\nKonektori/Portovi: 2 x USB 3.1 (Gen 1), USB-C 3.1, HDMI 2.0, RJ45, Headphone / mic combo, Novo hole\r\n', 'Experience gaming like never before on the IdeaPad Gaming 3i powered by 10th Gen Intel® Core™ H-Series processors. Play and stream the latest AAA titles at peak performance on the IdeaPad Gaming 3i with up to 5.0GHz clock speeds, 6 cores, 12 MB of Intel® Smart Cache, Intel® Thermal Velocity Boost, Intel® Dynamic Tuning and optional Intel® Wi-Fi 6. GeForce® GTX 1650 gaming laptops are built with the breakthrough graphics performance of the award-winning NVIDIA Turing™ architecture. With up to 2x the performance of the GeForce GTX 950M and up to 70% faster than the GTX 1050, it is a supercharger for today’s most popular games, and even faster with modern titles. Step up to better gaming with GeForce GTX.', 21, 'Na stanju', 'lenovo-ideapad-3i.png', 0),
(111, 'AORUS Radeon RX 6800 MASTER 16GB GDDR6 256bit', '210000.00', '195000.00', 1, 'Da', 'Da', 'Radeon™ RX 6800', 'Memorijski interfejs: 256-bit;Tip memorije: GDDR6;Veličina memorije: 16 GB;BUS standard: PCI Express 4.0 x 16;Stream procesori: 3840;Takt procesora (GPU): Boost Clock* : up to 2190 MHz (Reference card: 2105 MHz), Game Clock* : up to 1980 MHz (Reference card: 1815 MHz);Takt memorije: 16000 MHz;HDMI izlaz: 2;DirectX: 12 Ultimate;Preporučeno napajanje: 650W;Konektori napajanja: 8pin*2;Display port izlaz: 2;Hlađenje: 3 ventilatora;Boja: Crna; Garantni rok: 4 godine  ', 'In the AORUS dimension, everything is constructed digitally. The lighting and patterns are mapped onto the products with an efficient, free flowing style.\r\nThe MAX-Covered cooling features 3x 100mm unique blade stack fans with wind claw design and alternate spinning, so the air pressure can completely cover the heatsink.With 16.7M customizable color options and numerous lighting effects, you can choose lighting effects or synchronize with other AORUS devices. ', 9, 'Na stanju', 'aorus_rx6800xt.png', 0),
(112, 'AMD Ryzen 9 7950X 16 cores 4.7GHz (5.7GHz) box', '88000.00', '85000.00', 2, 'Da', 'Da', 'AMD Ryzen™ 9 7950X', 'Maksimalni radni takt: Do 5.7GHz;L2 keš: 16MB;Broj jezgara: 16; Radni takt: 4.5GHz;L3 keš: 64MB;Otključan za overclock: Da;Broj niti: 32;L1 keš: 1MB;CPU ležište: AM5;Maksimalna radna temperatura: 95°C;PCI Express® verzija: PCIe® 5.0; Tip memorije: DDR5\r\n\r\n', 'The 16-core powerhouse processor can do it all for the most demanding gamers and creators.', 31, 'Na stanju', 'ryzen9_7950x.png', 0),
(113, 'AMD Ryzen 5 7600 Hexa Core 3.8GHz (5.1GHz) Box', '37000.00', '35600.00', 2, 'Da', 'Da', 'AMD Ryzen™ 5 7600', 'Maksimalni radni takt: Do 5.1GHz;L2 keš: 6MB;Broj jezgara: 6; Radni takt: 3.8GHz;L3 keš: 32MB;Otključan za overclock: Da;Broj niti: 12;L1 keš: 384KB;CPU ležište: AM5;Maksimalna radna temperatura: 95°C;PCI Express® verzija: PCIe® 5.0; Tip memorije: DDR5\r\n\r\n', 'This overclockable processor is built for intense gaming, and comes bundled with a low-profile AMD Wraith Stealth cooler.1', 31, 'Na stanju', 'ryzen5_7600.png', 0),
(114, 'AMD Ryzen 9 5950X 16 cores 3.4GHz (4.9GHz) box', '76000.00', '71500.00', 2, 'Da', 'Da', 'AMD Ryzen™ 9 5950X', 'Maksimalni radni takt: Do 4.9GHz;L2 keš: 8MB;Broj jezgara: 16; Radni takt: 3.4GHz;L3 keš: 64MB;Otključan za overclock: Da;Broj niti: 32;CPU ležište: AM4;Maksimalna radna temperatura: 90°C;PCI Express® verzija: PCIe® 4.0; Tip memorije: DDR4', 'One processor that can game as well as it creates.', 31, 'Na stanju', 'ryzen9_5950x.png', 0),
(115, 'Intel Core i9 13900KS 24-cores 3.2GHz (5.8GHz) Box', '101000.00', '97500.00', 2, 'Da', 'Da', ' 13th Generation Intel® Core™ i9 Processors ', 'Maksimalni radni takt: Do 6.0GHz;L2 keš: 32MB;Broj jezgara: 24; Radni takt: 3.2GHz;L3 keš: 64MB;Otključan za overclock: Da;Broj niti: 32;CPU ležište:  	LGA 1151;Maksimalna radna temperatura: 100°C;PCI Express® verzija: PCIe® 5.0 i 4.0; Tip memorije: DDR4 i DDR5', '24 cores (8 P-cores + 16 E-cores) and 32 threads. Integrated Intel UHD Graphics 770 included Performance hybrid architecture integrates two core microarchitectures, prioritizing and distributing workloads to optimize performanceUp to 6.0 GHz unlocked. 36M Cache Compatible with Intel 600 series and 700 series chipset-based motherboards\r\n Turbo Boost Max Technology 3.0, and PCIe 5.0 & 4.0 support. Intel Optane Memory support. No thermal solution included\r\n', 19, 'Nije na stanju', 'intel_i9_13900ks.png', 0),
(116, 'ACER Nitro 5 AN517-54-549W 17.3\" FHD/144Hz/16GB/I5-11400H/RTX 3060/512GB', '175000.00', '169000.00', 5, 'Ne', 'Da', 'AN517-54-549W', 'Procesor: Intel Core™ i5-11400H; Radni takt procesora: 2.70 GHz; Grafički kontroler: NVIDIA® GeForce® RTX™ 3060 6GB GDDR6; Maksimalna potrošnja grafike: Do 95 W;Veličina ekrana: 43.9 cm (17.3\");Rezolucija ekrana: 1920 x 1080;Brzina osvežavanja: 144Hz;Sistemska memorija: 16GB;Skladišni prostor: 512GB SSD;Standard za bežični LAN: IEEE 802.11 a/b/g/n/ac/ax;Model bežičnog LAN-a: Wi-Fi 6 AX 1650i;Ethernet tehnologija: Gigabit Ethernet;Mikrofon: Da;HDMI: Da;Broj HDMI izlaza: 1;Broj USB 3.2 Gen 1 Tipe-A portova: 2;Broj USB 3.2 Gen 2 Tipe-А portova: 1;Broj USB 3.2 Gen 2 Tipe-C portova: 1;Ukupan broj USB portova: 4;USB Tipe-C: Da;Mreža (RJ-45): Da;Pozadinsko svetlo tastature: Da;Maksimalno trajanje rada baterije: 8 sati;Maksimalna snaga napajanja: 180W;Dimenzije: 24.90 mm x 403.5 mm x 280 mm;Težina: 2.70 kg ', 'Igraj bez ograničenja jer imaš 11. generaciju Intel® Core™ i7 procesora1, grafičke procesore serije GeForce RTX™ 301 i brzi FHD/QHD monitor. ', 6, 'Na stanju', 'acer-nitro5.png', 0),
(118, 'MSI GeForce RTX 3080 GAMING X TRIO 10G 10GB GDDR6X 320-bit', '170000.00', '156000.00', 1, 'Ne', 'Da', ' GeForce RTX™ 3080 GAMING X TRIO 10G ', 'BUS standard: PCI Express 4.0;Memorijski interfejs: 320-bit;Tip memorije: GDDR6X;Veličina memorije: 10GB;Takt procesora (GPU): 1815 MHz;Takt memorije: 19000 MHz;CUDA jezgara: 8704;Konektori: 1 x HDMI 2.1, 3 x DisplayPort 1.4a, HDCP: 2.3;Maksimalna rezolucija: 7680 x 4320px;Broj ventilatora: 3;Preporučeno napajanje: 750W;Konektori napajanja: 8-pin x 3;Dimenzije: 323 x 140 x 56mm ', 'The latest iteration of MSI’s iconic GAMING series once again brings performance, low-noise efficiency, and aesthetics that hardcore gamers have come to recognize and trust. Now you too can enjoy all your favorite games with a powerful graphics card that stays cool and silent. Just the way you like it.The GeForce RTX™ 3080 delivers the ultra performance that gamers crave, powered by Ampere—NVIDIA\'s 2nd gen RTX architecture. It\'s built with enhanced RT Cores and Tensor Cores, new streaming multiprocessors, and superfast G6X memory for an amazing gaming experience.', 24, 'Na stanju', 'msi_rtx_3080.png', 0),
(122, 'ZOTAC Gaming GeForce RTX 4080 16GB Trinity GDDR6X 256-bit', '207350.00', '200500.00', 1, 'Ne', 'Da', ' GeForce RTX 4080', 'BUS standard: PCI Express 4.0;Memorijski interfejs: 256-bit;Tip memorije: GDDR6X;Veličina memorije: 16GB; DirectX verzija: 12 Ultimate;Takt procesora (GPU): 2505 MHz;Takt memorije: 22400 MHz;CUDA jezgara: 9728;Konektori: 1 x HDMI 2.1a, 3 x DisplayPort 1.4a, HDCP: 2.3;Maksimalna rezolucija: 7680 x 4320px;Broj ventilatora: 3;Preporučeno napajanje: 750W;Dimenzije: 3356.1mm x 150.1mm x 71.4mm; Naponski konektori: 3 x 8-pin', 'Leveraging an all-new aerodynamic inspired design, the ZOTAC GAMING GeForce RTX 4080 16GB Trinity utilizes the world’s most advanced gaming GPU powered by the NVIDIA Ada Lovelace architecture and DLSS 3. Using cutting-edge cooling technologies derived from the flagship model, the Trinity packs the punch to offer gamers the needed blistering FPS in the latest titles.\r\n\r\n', 42, 'Na stanju', 'zotac_rtx_4080.png', 0),
(123, 'Corsair CX550F 550W/ATX/80 Plus Bronze/RGB/crna', '11000.00', '9000.00', 4, 'Ne', 'Da', 'CX550F', 'Ukupna snaga: 550 W;Ulazni napon naizmeni;ne struje: 100-240 V;KOmbinovana snaga(+3,3V): 120 W;Kombinovana snaga (+12 V): 549,6 W;Kombinovana snaga (+5V): 120 W;Kombinovana snaga (-12V): 3,6 W;Priključak napajanja za matičnu ploču: 24-pin ATX;Tip kablova: Modularni;80 PLUS sertifikat: 80 PLUS Bronze;Prečnik ventilatora: 120 mm;Dimenzije: 86 x 150 x 140 mm', 'CX-F RGB power supplies light up the internals of your PC with eight individually addressable RGB LEDs and fully modular cables for easy cable management.Each CX-F RGB PSU features a brilliantly lit 120mm RGB fan with eight individually addressable RGB LEDs to give beautiful accent lighting to your build.CORSAIR CX-F RGB Series fully modular power supplies deliver reliable 80 PLUS Bronze efficient power to your system and let you use only the cables you need for a cleaner build.', 14, 'Na stanju', 'corsair_rgb550f.png', 0),
(124, 'REDRAGON Draconic K530 BLACK RGB Bluetooth/Wired Mechanical Gaming Keyboard', '10350.00', '8150.00', 6, 'Ne', 'Da', 'K530_RGB', 'Osvetljenje: RGB;PLatforma: PC;Tip tastature: Bežična tastatura;Vrsta tastera: Mehanički;Ostalo: Bluetooth', 'Gejmerska tastatura Redragon Draconic White K530W je veličine 60% tipične mehaničke tastature i zbog svoje veličine je vrlo pogodna za nošenje i upotrebu sa stabilnom i moćnom Bluetooth 5.0 vezom.\r\n\r\nLAKO BEŽIČNO - Uživaj u slobodi bežične veze sa Bluetooth 5.0 vezom i dugotrajnim kapacitetom baterije od 3000mAh. Pouzdano i brzo se bez problema povezuj sa uređajima kao što su prenosni računari, tableti, pa čak i telefoni koji podržavaju Bluetooth.\r\n\r\nDUAL MODE SWITCH - Lako se prebacuj između bežičnog i žičanog režima pomoću ptastera za način rada sa strane. Uključeni USB-C kabl daje ti mogućnost povezivanja za takmičarske igre.\r\n\r\nRGB ILLUMINATION BUILDER - 13 dinamičkih unapred postavljenih postavki dostupnih na tabli. Milioni opcija i efekata u boji učiniće te dizajnerom tvoje vrhunske opreme sa profesionalnim drajverima.\r\n\r\nTaktilni brown switch-evi pružaju mekani pritisak, ali bez klika, za razliku od plavih prekidača za tihu upotrebu. Moguće je zameniti ove sa drugim Redragon switchevima. Napravljeno za dugotrajno korišćenje sa tasterima ocenjenim za 50 miliona klikova.\r\n\r\nPRO TASTATURA SA PRO DRAJVEROM - Preuzmite ga i koristite za drugačije korisničko iskustvo, čeka te beskrajno kucanje i pozadinsko osvetljenje - show-maker.', 30, 'Na stanju', 'redragon_K530.png', 0),
(125, 'ASUS DT G15CF-WB5626 I5-12400F/16G/512G+1T/RTX3060Ti', '175000.00', '165500.00', 7, 'Ne', 'Ne', 'G15CF', 'Procesor: Intel® Core™ i5 12400F 4.40GHz;\r\nHladnjak: Fabrički;RAM memorija: 2 x 8GB DDR4 3200MHz;Grafička kartica: NVIDIA GeForce RTX 3060 Ti 8GB GDDR6;Skladište 1: 512GB M.2 PCIe;Skladište 2: 1TB SATA HDD;Kućište - veličina: Desktop;Napajanje: 700 W;Operativni sistem: FreDOS;Garancija: 36 meseci', 'Ultimativni gejming uz najjači procesor i još bolju grafičku kartu, spojeno u savršeni PC računar.', 10, 'Na stanju', 'asus_G15CF.png', 0),
(126, 'LOGITECH Gejmerske slušalice G332 (Crna/Crvena)', '8750.00', '7700.00', 8, 'Ne', 'Da', 'G332', 'Dimenzije: 172 x 81 x 182 mm; Težina: 280 g; Dužina kabla: 2 m;Frekvencijski raspon: 20 Hz - 20 kHz;Impendansa: 39 oma (pasivno), 5000 oma (aktivno);Osetljivost: 107 dB; Veličina mikrofona: 6 mm; Garancija: 2 godine', '50 mm drivers and 6 mm flip-to-mute mic produce big sound to get you into the game. Works with PC, Mac, most consoles and mobile devices via 3.5 mm cable.', 23, 'Na stanju', 'logitech_g332.png', 0),
(127, ' Marvo CH117 gaming stolica plava', '32500.00', '29800.00', 9, 'Ne', 'Da', 'CH117', 'Maksimalna nosivost: do 150 KG;Materijal sedišta: PU/PVC, sundjer;Naslon za ruke: 2D naslon za ruke; Točkovi: 5 točkića;Dimenzije: 50 x 66 x 137 cm', 'Ergonomic gaming chair suitable for long time use\r\nAll parts adjustment support for different using demand\r\n2D adjustable heandrest\r\n', 45, 'Na stanju', 'marvo_ch117a.png', 0),
(128, 'AOC 24V2Q 23.8\' FHD IPS HDMI DP 75Hz', '18750.00', '14599.00', 12, 'Da', 'Da', '24V2Q', 'Model: 24V2Q;Tip: Gejmerski;Panel: IPS;Rezolucija: 1920 x 1080 Full HD;Dijagonala: 23.8\";Osvežavanje: 75 Hz;Vreme odziva: 5 ms;Režim slike: 16:9;Ugao gledanja: 178/178 º;Ovetljenje:  	\r\n250 cd/m²;Kontrast: 20m : 1;Pixel: 0.2745;Masa: 3.15 kg;Konektori: 1 x HDMI, 1 x Diplej port, Audio izlaz 3.5 mm;Dimenzije: 537.4x180x423 mm', '24V2Q se karakteriše 3-stranim frameless 23.8\" IPS ekranom u Full HD rezoluciji, sa skrivenim dizajnom okvira \"Edge\" i čvrstim metalnim postoljem.\r\nPripremljen za brzu igru i pokretne slike sa FreeSync, brzinom osvežavanja 75Hz i vremenom odziva 5 ms. Tanki dizajni donose ogromne prednosti: Prvo, tanji displeji izgledaju veoma elegantno, posebno u javnim prostorima, čak i kada se vide sa leđa ili bočnih strana. Takođe, potrebno je manje prostora na stolu. Povremeno igranje? AOC isporučuje glatku igru s AMD-ovom FreeSync tehnologijom koja odgovara izlaznoj brzini vašeg GPU-a na brzinu osvežavanja vašeg monitora,\r\neliminišući zaostajanje u ulazu, suzu ekrana i seckanje. Izborom AOC-a, nećete ostati iza inovacija.', 46, 'Na stanju', 'aoc_24v2q.png', 0),
(129, 'Konzola Sony PlayStation 5 PS5 Digital Edition/825GB/Bela', '65599.00', '61499.00', 13, 'Da', 'Da', 'PlayStation®5 Digital Edition', 'Tip: Konzola;Hard disk: Custom 825GB SSD;Procesor: AMD Zen 2-based CPU with 8 cores at 3.5GHz (variable frequency);Grafički procesor: Custom RDNA 2, 10.28 TFLOPs, 36 CUs at 2.23GHz (variable frequency);Radna memorija: 16GB GDDR6 / 256-bit, 448GB/s;Optički uređaj: Ne;Konektori (napred): USB Type-A Hi-Speed, USB Type-C SuperSpeed 10Gbps;Konektori (nazad): 2x USB Type-A SuperSpeed 10Gbps, LAN, HDMI 2.1, AC IN;Broj modela: CFI-1015B; Dimenzije pakovanja (Š x V x D): 469 x 426 x 174 mm', 'Iskoristite CPU i GPU snagu, kao i SSD sa jedinstvenom integrisanom I/O tehnologijom koji zajedno redefinišu ono šta jedna PlayStation® konzola može da uradi.Otkrijte realističnije iskustvo igranja uz podršku za haptičke povratne informacije, prilagodljive trigere i 3D Audio tehnologiju. Munjevito brzo učitavanje sa brzim SSD diskom, još verniji doživljaj sa fizičkim povratnim efektima, prilagodljivim okidačima i tehnologijom 3D zvuka i potpuno nova generacija neverovatnih PlayStation® igara. Iskoristite snagu prilagođenog procesora, grafičkog procesora i SSD diska sa integrisanim ulazima i izlazima koji postavljaju nove granice mogućnosti PlayStation konzole.', 35, 'Na stanju', 'ps5_digital.png', 0),
(130, 'A-DATA 512GB M.2 SSD PCIe Gen3 x4 XPG SPECTRIX S40G RGB', '9850.00', '8299.00', 14, 'Da', 'Da', 'XPG SPECTRIX S40G', 'Kapacitet: 512 GB;Dimenzije: 80 x 22 x 8mm;Interfejs: PCIe Gen3x4;Upis podataka: do 3500 MB/s; Čitanje podataka: do 3000 MB/s; Radna temperatura: 0°C - 70°C;Maksimalni upis podataka: 1280 TB; Radni vek: 2.000.000 sati; Garancija: 5 godina', 'With sustained read/write speeds of up to 3500/3000MB per second, customizable RGB lighting, and a slew of performance enhancing features, the XPG SPECTRIX S40G is a no brainer for those seeking amazing performance and exceptional reliability. The S40G supports LDPC (Low-Density Parity-Check) error correcting code technology to detect and fix a wider range of data errors for more accurate data transfers and a longer SSD lifespan. Plus, with AES 256-bit encryption, the S40G ensures data security and integrity.', 43, 'Na stanju', 'adata_xpg.png', 0),
(131, 'ASRock B550M STEEL LEGEND ATX AM4 DDR4', '22499.00', '20299.00', 15, 'Da', 'Da', 'B550M', 'Model: ASRock B550M Steel Legend AM4 Micro ATX Matična ploča;\r\nProcesorsko podnožje (Socket): AMD Socket AM4;\r\nSkup čipova (Chipset): AMD B550;\r\nPodrška za procesore: Supports 3rd Gen AMD AM4 Ryzen™ / future AMD Ryzen™ Processors\r\n- Digi Power design\r\n- 10 Power Phase design;\r\nTip memorije (RAM): DDR4\r\nBroj memorijskih slotova: 4x 288-Pin DDR4;\r\nPodrška za memorije: Dual Channel DDR4 Memory Technology\r\n- 4 x DDR4 DIMM Slots\r\n- AMD Ryzen series CPUs (Matisse) support DDR4 4533+(OC) / 4466(OC) / 4400(OC) / 4333(OC) / 4266(OC) / 4200(OC) / 4133(OC) / 4000(OC) / 3866(OC) / 3800(OC) / 3733(OC) / 3600(OC) / 3466(OC) / 3200 / 2933 / 2667 / 2400 / 2133 ECC & non-ECC, un-buffered memory\r\n- AMD Ryzen series APUs support DDR4 4733+(OC) / 4666(OC) / 4600(OC) / 4533(OC) / 4466(OC) / 4400(OC) / 4333(OC) / 4266(OC) / 4200(OC) / 4133(OC) / 4000(OC) / 3866(OC) / 3800(OC) / 3733(OC) / 3600(OC) / 3466(OC) / 3200 / 2933 / 2667 / 2400 / 2133 ECC & non-ECC, un-buffered memory\r\n- Max. capacity of system memory: 128GB\r\n- Supports Extreme Memory Profile (XMP) memory modules\r\n- 15μ Gold Contact in DIMM Slots;\r\nPodrška za grafiku - portovi: Integrated AMD Radeon Vega Series Graphics in Ryzen Series APU\r\n- DirectX 12, Pixel Shader 5.0\r\n- Shared memory default 2GB. Max Shared memory supports up to 16GB.\r\n- Dual graphics output: support HDMI and DisplayPort 1.4 ports by independent display controllers\r\n- Supports HDMI 2.1 with max. resolution up to 4K x 2K (4096x2160) @ 60Hz\r\n- Supports DisplayPort 1.4 with max. resolution up to 5K (5120x2880)@120Hz\r\n- Supports Auto Lip Sync, Deep Color (12bpc), xvYCC and HBR (High Bit Rate Audio) with HDMI 2.1 Port (Compliant HDMI monitor is required)\r\n- Supports HDR (High Dynamic Range) with HDMI 2.1\r\n- Supports HDCP 2.3 with HDMI 2.1 and DisplayPort 1.4 Ports\r\n- Supports 4K Ultra HD (UHD) playback with HDMI 2.1 and DisplayPort 1.4 Ports\r\n- Supports Microsoft® PlayReady;\r\nMulti-GPU podrška: AMD CrossFireX; Quad-GPU CFX;\r\nSlotovi za proširenja: AMD Ryzen series CPUs (Matisse)\r\n- 2 x PCI Express x16 Slots (PCIE1: Gen4x16 mode; PCIE3: Gen3 x4 mode)\r\nAMD Ryzen series APUs\r\n- 2 x PCI Express x16 Slots (PCIE1: Gen3x16 mode; PCIE3: Gen3 x4 mode)\r\n- 1 x PCI Express 3.0 x1 Slot\r\n- 15μ Gold Contact in VGA PCIe Slot (PCIE1)\r\n- 1 x M.2 Socket (Key E), supports type 2230 WiFi/BT module;\r\nM.2 portovi: 2x M.2 Socket 3;\r\nČuvanje podataka - portovi: 6 x SATA3 6.0 Gb/s Connectors, support RAID (RAID 0, RAID 1 and RAID 10), NCQ, AHCI and Hot Plug\r\n- 1 x Hyper M.2 Socket (M2_1), supports M Key type 2280 M.2 PCI Express module up to Gen4x4 (64 Gb/s) (with Matisse) or Gen3x4 (32 Gb/s)\r\n- 1 x M.2 Socket (M2_2), supports M Key type 2280 M.2 SATA3 6.0 Gb/s module and M.2 PCI Express module up to Gen3 x2 (16 Gb/s);\r\nU.2 portovi: nema;\r\nSATA Express portovi: nema;\r\nSATA portovi: 6x SATA 6Gb/s;\r\nLAN: 2.5 Gigabit LAN 10/100/1000/2500 Mb/s;\r\n- Dragon RTL8125BG\r\n- Supports Dragon 2.5G LAN Software\r\n- Smart Auto Adjust Bandwidth Control\r\n- Visual User Friendly UI\r\n- Visual Network Usage Statistics\r\n- Optimized Default Setting for Game, Browser, and Streaming Modes\r\n- User Customized Priority Control\r\n- Supports Wake-On-LAN\r\n- Supports Lightning/ESD Protection\r\n- Supports Energy Efficient Ethernet 802.3az\r\n- Supports PXE;\r\nZvuk (Audio): 7.1 CH HD Audio with Content Protection (Realtek ALC1200 Audio Codec)\r\n- Premium Blu-ray Audio support\r\n- Supports Surge Protection\r\n- PCB Isolate Shielding\r\n- Individual PCB Layers for R/L Audio Channel\r\n- Gold Audio Jacks\r\n- Nahimic Audio;\r\nUSB portovi: 1 x USB 3.2 Gen2 Type-A Port (10 Gb/s) (Supports ESD Protection)\r\n- 1 x USB 3.2 Gen2 Type-C Port (10 Gb/s) (Supports ESD Protection)\r\n- 4 x USB 3.2 Gen1 Ports (ASMedia ASM1074 hub) (Supports ESD Protection)\r\n- 2 x USB 2.0 Ports (Supports ESD Protection);\r\nKonektori na zadnjoj strani: 2 x Antenna Mounting Points\r\n- 1 x PS/2 Mouse/Keyboard Port\r\n- 1 x HDMI Port\r\n- 1 x DisplayPort 1.4\r\n- 1 x Optical SPDIF Out Port\r\n- 1 x USB 3.2 Gen2 Type-A Port (10 Gb/s) (Supports ESD Protection)\r\n- 1 x USB 3.2 Gen2 Type-C Port (10 Gb/s) (Supports ESD Protection)\r\n- 4 x USB 3.2 Gen1 Ports (ASMedia ASM1074 hub) (Supports ESD Protection)\r\n- 2 x USB 2.0 Ports (Supports ESD Protection)\r\n- 1 x RJ-45 LAN Port with LED (ACT/LINK LED and SPEED LED)\r\n- 1 x Clear CMOS Button\r\n- HD Audio Jacks: Rear Speaker / Central / Bass / Line in / Front Speaker / Microphone (Gold Audio Jacks)\r\nUnutrašnji konektori	- 1 x SPI TPM Header\r\n- 1 x Power LED and Speaker Header\r\n- 2 x RGB LED Headers\r\n- 2 x Addressable LED Headers\r\n- 1 x CPU Fan Connector (4-pin)\r\n- 1 x CPU/Water Pump Fan Connector (4-pin) (Smart Fan Speed Control)\r\n- 4 x Chassis/Water Pump Fan Connectors (4-pin) (Smart Fan Speed Control)\r\n- 1 x 24 pin ATX Power Connector (Hi-Density Power Connector)\r\n- 1 x 8 pin 12V Power Connector (Hi-Density Power Connector)\r\n- 1 x 4 pin 12V Power Connector (Hi-Density Power Connector)\r\n- 1 x Front Panel Audio Connector\r\n- 2 x USB 2.0 Headers (Support 4 USB 2.0 ports) (Supports ESD Protection)\r\n- 2 x USB 3.2 Gen1 Headers (Support 4 USB 3.2 Gen1 ports) (Supports ESD Protection)', 'Automatically detects and accelerates game traffic ahead of other network traffic for smoother, stutter-free in-game performance and the competitive edge.Dual M.2 For SSD, Supports Type 2280 M.2 Ready for higher capacity and even faster Type 2280 M.2 NVMe SSD to fulfill the need of performance. Hyper M.2 socket that supports PCIe Gen4 x4 while M.2 socket is capable of running PCIe Gen3 x2 and SATA3 mode.This motherboard has a pair of onboard Type-A and Type-C USB 3.2 Gen2 ports built on the rear i/o for supporting next generation USB 3.2 Gen2 devices and to deliver up to 10 Gbps data transfer rates.', 47, 'Na stanju', 'asrock_b550m_steel.png', 0),
(132, 'Kingston 16GB FURY Beast RGB 3200MHz DDR4 memorija | KF432C16BBAK2/16', '9200.00', '8500.00', 16, 'Ne', 'Da', 'FURY Beast RGB', 'Tip: DDR4;Latencija: CL16;Kapacitet: 16GB kit;Maksimalna frekvencija: 3200Mhz', 'Kingston FURY™ Beast DDR4 RGB1 delivers a boost of performance and style with speeds of up to 3733MT/s*, aggressive styling and RGB lighting that runs the length of the module for smooth and stunning effects. This dazzling, cost-effective upgrade is available in 2666MT/s–3733MT/s speeds, CL15–19 latencies, single-module capacities of 8GB–32GB and kit capacities of 16GB–128GB. It features Plug N Play automatic overclocking at 2666MT/s2 and is both Intel® XMP-ready and Ready for AMD Ryzen™. Customise the RGB lighting effects by using Kingston FURY CTRL software and its patented Infrared Sync Technology. FURY Beast DDR4 RGB stays cool with its stylish, low-profile heat spreader. 100% tested at speed and backed by a lifetime warranty, it’s an easy, worry-free upgrade for your Intel or AMD-based system.\r\n', 20, 'Na stanju', 'kingston_fury_beast16gb.png', 0),
(133, 'Hama Adapter USB-C na HDMI 200315', '2800.00', '2650.00', 17, 'Ne', 'Da', 'Hama (200315)', 'Boja: Crna;Konektor 1: HDMI;Konektor 2: USB-C;Tip: Adapter; Ostalo: Povezivanje PC/notebook/MacBook/tablet PC uređaja sa USB-C portom na TV/monitor sa HDMI portom Podržava: Ultra HD rezoluciju od 3840 x 2160 px', '12345', 49, 'Na stanju', 'hama_usbc_hdmi.png', 0),
(134, 'XFX Radeon RX6750XT Speedster MERC 12GB GDDR6 192bit', '75699.00', '69450.00', 1, 'Da', 'Da', 'RX 6750 XT Speedster', 'Proizvođač: XFX;Memorijski interfejs: 192-bit;Tip memorije: GDDR6;Veličina memorije: 12 GB;BUS standard: PCI Express 4.0;Takt procesora (GPU): 2324MHz;Takt memorije: 18000 MHz;HDMI izlaz: 1;Display port izlaz: 3;Hlađenje: 3 ventilatora;Boja: Crna; Garantni rok: 3 godine  ', 'The AMD Radeon™ RX 6750 XT graphics card, powered by AMD RDNA™ 2 architecture, featuring 40 powerful enhanced Compute Units, the all new AMD Infinity Cache and 12GB of dedicated GDDR6 memory, is engineered to deliver ultra-high frame rates and powerhouse 1440p resolution gaming.\r\n\r\n', 41, 'Na stanju', 'xfx_6750xt_merc.png', 0),
(135, 'Gigabyte Radeon RX 6500 XT Eagle 4GB 64-bit GDDR6', '37350.00', '33499.00', 1, 'Da', 'Da', 'RX 6500 XT', 'Proizvođač: Gigabyte;Memorijski interfejs: 64-bit;Tip memorije: GDDR6;Veličina memorije: 4 GB;BUS standard: PCI Express 4.0;Takt procesora (GPU): 2610 MHz;Takt memorije: 18000 MHz;HDMI izlaz: 1;Display port izlaz: 1;Hlađenje: 2 ventilatora;Boja: Crna; Garantni rok: 3 godine  ', 'Powered by AMD RDNA™ 2 Radeon™ RX 6500 XT\r\nIntegrated with 4GB GDDR6 64-bit memory interface WINDFORCE 2X Cooling System with alternate spinning fans\r\nGraphene nano lubricant', 18, 'Na stanju', 'gigabyte_rx6500xt_eagle.png', 0),
(136, 'Konzola XBOX Series S 512GB/Fortnite + Rocket League + Fall Guys Holiday Bundle', '53550.00', '47499.00', 13, 'Ne', 'Da', 'XBOX Series S', 'Tip: Konzola;Boja: Bela;Disk:512GB Custom NVME SSD;Rezolucija: Target rezolucija 1440p (2K). Do 120 fps i 4K upscaling rezolucije podržani;HDR: Da;Broj portova: 3;Roditeljska kontrola: Da;Optički uređaj: Ne;Procesor: 8X Cores @ 3.6 GHz (3.4 GHz w/SMT) Custom Zen 2 CPU;Grafički procesor: 4 TFLOPS, 20 CUs @1.565 GHz Custom RDNA 2 GPU;RAM: 10GB GDDR6;Frame rate: Do 120 fps;Dimenzije (V x Š x D):  	27.5 x 15.1 x 6.5 cm;Težina: 1.92 kg', 'Xbox Series S je najmanja Xbox konzola ikada, čak 60% je manja u odnosu na Xbox Series X konzolu. Iskusite brzinu i savršene performanse digitalne konzole nove generacije. Poseduje brzi SSD uređaj sa 512GB kapaciteta, ray-tracing tehnologiju, igranje u 1440p rezoluciji i 120 frejmova u sekundi. Ove performanse omogućuju igračima momentalno učitavanje igara, lako prebacivanje između 3 naslova, i naravno visok nivo detalja.', 50, 'Na stanju', 'xbox_series_s_512.png', 0),
(166, 'Asus TUF Gaming VG277Q1A VA gejmerski monitor 27\"', '35000.00', '28499.00', 12, 'Ne', 'Da', 'VG277Q1A', 'Dijagonala ekrana: 68,6 cm (27\");\r\nRezolucije ekrana:1920 x 1080px;\r\nIzvorni odnos širina/visina: 16:9;\r\nTip ekrana: VA;\r\nTip visoke definicije: (HD)Full HD;\r\nTehnologija ekrana: LED;\r\nOblik ekrana: Ravni;\r\nOdnos kontrasta (tipski): 3000:1;\r\nMaksimalna učestalost osvežavanja: 165 Hz;\r\nBroj boja koje se mogu prikazati na monitoru: 16,7 miliona boja;\r\nOsvetljenje ekrana (tipično): 350 cd/m²;\r\nVreme odziva: 1 ms;\r\nNereflektujući ekran;\r\nOdnos kontrasta (dinamički): 100000000:1;\r\nUgao gledanja, horizontalno: 178°;\r\nUgao gledanja, vertikalno: 178°;\r\nRastojanje između piksela iste boje: 0,311 x 0,311 mm;\r\nVidljiva veličina, horizontalno: 59,8 cm;\r\nVidljiva veličina, vertikalno: 33,6 cm;\r\nDijagonala ekrana: 68,6 cm;\r\nNTSC pokrivenost (tipično): 85%;', '27-inch Full HD (1920x1080) gaming monitor with ultrafast 165Hz refresh rate designed for professional gamers and immersive gameplay\r\nASUS Extreme Low Motion Blur (ELMB ™) technology enables a 1ms response time (MPRT) together with Adaptive-sync, eliminating ghosting and tearing for sharp gaming visuals with high frame rates\r\nFreeSync™ Premium technology to eliminate screen tearing and choppy frame rates\r\nShadow Boost enhances image details in dark areas, brightening scenes without over-exposing bright areas\r\nSupports both Adaptive-Sync with NVIDIA GeForce* graphics cards and FreeSync with AMD Radeon graphics cards *Compatible with NVIDIA GeForce GTX 10 series, GTX 16 series, RTX 20 series and newer graphics cards', 10, 'Na stanju', 'asus_tuf_27.png', 0),
(167, 'Asus VX279HG 27\", 1920x1080, 75Hz, 1ms, FreeSync IPS Gaming monitor', '26399.00', '21500.00', 12, 'Ne', 'Da', 'VX279HG', 'Dijagonala ekrana: 68,6 cm (27\");\r\nRezolucije ekrana:1920 x 1080px;\r\nIzvorni odnos širina/visina: 16:9;\r\nTip ekrana: VA;\r\nTip visoke definicije: (HD)Full HD;\r\nTehnologija ekrana: LED;\r\nOblik ekrana: Ravni;\r\nOdnos kontrasta (tipski): 3000:1;\r\nMaksimalna učestalost osvežavanja: 165 Hz;\r\nBroj boja koje se mogu prikazati na monitoru: 16,7 miliona boja;\r\nOsvetljenje ekrana (tipično): 350 cd/m²;\r\nVreme odziva: 1 ms;\r\nNereflektujući ekran;\r\nOdnos kontrasta (dinamički): 100000000:1;\r\nUgao gledanja, horizontalno: 178°;\r\nUgao gledanja, vertikalno: 178°;\r\nRastojanje između piksela iste boje: 0,311 x 0,311 mm;\r\nVidljiva veličina, horizontalno: 59,8 cm;\r\nVidljiva veličina, vertikalno: 33,6 cm;\r\nDijagonala ekrana: 68,6 cm;\r\nNTSC pokrivenost (tipično): 85%;', '27-inch Full HD IPS LED display with 178° wide-view angle in frameless design for edge-to-edge brilliance\r\n75Hz refresh rate and Adaptive-Sync/FreeSync™ technology to eliminate screen tearing and choppy frame rates\r\nASUS Extreme Low Motion Blur (ELMB) Technology with 1ms MPRT to further reduce ghosting and motion blur\r\nASUS-exclusive GamePlus with crosshair, timer, FPS counter, display alignment functions for in-game enhancements\r\nASUS Eye Care monitors feature TÜV Rheinland-certified Flicker-free and Low Blue Light technologies to ensure a comfortable viewing experience\r\n', 10, 'Na stanju', 'asus_27gh9.png', 0),
(168, 'Asus ROG Swift PG259QN 24.5 inch 1920x1080, 360 Hz, 1ms, IPS', '89000.00', '80355.00', 12, 'Ne', 'Da', 'PG259QN', 'Dijagonala: 24.5″;\r\nTip panela: IPS;\r\nRezolucija: 1920 x 1080;\r\nOdnos strana: 16:9;\r\nOsvetljenje: 400;\r\nUgao gledanja: 178/178;\r\nFrekvencija osvežavanja ekrana: 360Hz', '24.5-inch FHD (1920 x 1080) fast IPS gaming monitor with 360 Hz refresh rate designed for professional esports gamers\r\nASUS Fast IPS technology enables a 1 ms response time (GTG) for sharp gaming visuals with high frame rates.\r\nNVIDIA® G-SYNC® processor provides smooth, tear-free gaming at refresh rates up to 360 Hz\r\nA Smart Cooling design with a custom heatsink and unique internal airflow ensure 12% cooler temperatures than normal displays during marathon gaming sessions\r\nHDR10 compatible for color and brightness that exceed that of ordinary monitor\r\nFull HD(1920 X 1080)@120Hz output on PS5 & Xbox Series X/S', 54, 'Nije na stanju', 'rog_swift_pg259qn.png', 0),
(169, 'Asus Matična ploča ROG STRIX B550-F GAMING WIFI II', '35699.00', '29500.00', 15, 'Ne', 'Da', 'B550-F GAMING WIFI II', 'Proizvođač: Asus;\r\nPodnožje ( soket ): AM4;\r\nČipset: AMD B550;\r\nBroj memorijskih slotova:4;\r\nPodržana memorija: DDR4;\r\nRežim rada memorije: Dual Channel;\r\nMaks.količina memorije u GB: 128;\r\nPodržana brzina memorije: do 4800 MHz OC;\r\nBroj PCI Express x16: 2;\r\nBroj PCI Expres x 1: 3;\r\nBroj USB priključaka: 2 x USB2.0 + 5 x USB3.2;\r\nLAN: 1 x 10/100/1000/2500;\r\nWireless: 802.11 a/b/g/n/ac/ax;\r\nBluetooth: 5.2;\r\nHDMI izlaz: 1;\r\nDisplay port: 1;\r\nRAID podrška: 0, 1, 10;\r\nBroj sat priključaka: 6 x SATA3;\r\nBroj audio priključaka: 5;\r\nDimenzije : atx mini itd. ATX;\r\nPreporučena za: Igrače/ProOffice;\r\nBoja: Crna;\r\nGarantni rok: 3 Godine', 'AM4 socket: Ready for AMD Ryzen™ 3000 and 5000 series, plus 5000 and 4000 G-series desktop processors\r\nBest gaming connectivity: PCIe® 4.0-ready, dual M.2 slots, USB 3.2 Gen 2 Type-C®, plus HDMI® 2.1 and DisplayPort™ 1.2 output\r\nSmooth networking: On-board WiFi 6E (802.11ax) and Intel® 2.5 Gb Ethernet with ASUS LANGuard \r\nRobust power solution: 12+2 teamed power stages with ProCool power connector, high-quality alloy chokes and durable capacitors \r\nRenowned software: Intuitive dashboards for UEFI BIOS and ASUS AI Networking for easy configuration\r\nDIY-friendly design: Includes pre-mounted I/O shield, BIOS FlashBack™, Q-LEDs and SafeSlot \r\nUnmatched personalization: ASUS-exclusive Aura Sync RGB lighting, including Aura RGB and addressable Gen 2 RGB headers \r\nIndustry-leading gaming audio: Two-Way AI Noise Cancelation, SupremeFX S1220A codec, DTS® Sound Unbound™ and Sonic Studio III for immersive sound', 54, 'Na stanju', 'asus_rog_strix_b550f_wifi.png', 0),
(170, 'ASUS ROG Strix Z790-A Gaming Wifi D4', '61500.00', '58400.00', 15, 'Ne', 'Da', 'Z790-A Gaming Wifi', 'Proizvođač: Asus;\r\nPodnožje ( soket ): 1700;\r\nČipset: Intel Z790;\r\nBroj memorijskih slotova: 4;\r\nPodržana memorija: DDR4;\r\nRežim rada memorije: Dual Channel;\r\nMaks.količina memorije u GB: 128;\r\nPodržana brzina memorije: do 5333 MHz OC;\r\nBroj PCI Express x16: 3;\r\nBroj PCI Expres x 1: 1;\r\nBroj USB priključaka: 2 x USB2.0 + 6 x USB3.2;\r\nLAN: 1 x 10/100/1000/2500;\r\nWireless: 802.11 a/b/g/n/ac/ax;\r\nBluetooth: 5.3;\r\nHDMI izlaz: 1;\r\nDisplay port: 1;\r\nRAID podrška: 0, 1, 5, 10;\r\nBroj sat priključaka: 4 x SATA3;\r\nBroj audio priključaka: 5;\r\nDimenzije : atx mini itd.	ATX;\r\nPreporučena za: Igrače/ProOffice;\r\nBoja: Crno-Bela;\r\nGarantni rok: 3 Godine', 'Well-versed in style, performance, cooling, and connectivity, the ROG Strix Z790-A exudes well-rounded balance inside and out. A robust VRM topped with stout silver heatsinks comfortably articulates power for the latest Intel® 13th Gen Core processors. PCIe 5.0, WiFi 6E, and high-speed USB flesh out the board\'s fluency across a variety of disciplines. And a vast collection of tuning options and utilities derived from its ROG heritage are the icing on top.', 54, 'Na stanju', 'rog_z790a.png', 0),
(171, 'Asus ROG CROSSHAIR X670E HERO AM5 DDR5', '96399.00', '92450.00', 15, 'Ne', 'Da', 'CROSSHAIR X670E', 'Proizvođač: Asus;\r\nPodnožje ( soket ): AM5;\r\nČipset: AMD X670;\r\nBroj memorijskih slotova: 4;\r\nPodržana memorija:: DDR5;\r\nRežim rada memorije: Dual Channel;\r\nMaks.količina memorije u GB: 128;\r\nPodržana brzina memorije: do 6400 MHz;\r\nBroj PCI Express x16: 2;\r\nBroj PCI Expres x 1: 1;\r\nBroj USB priključaka: 8 x USB3.2;\r\nLAN: 1 x 10/100/1000/2500;\r\nWireless: 802.11 a/b/g/n/ac/ax;\r\nBluetooth: 5.3;\r\nHDMI izlaz: 1;\r\nRAID podrška: 0, 1, 10;\r\nBroj sat priključaka: 6 x SATA3;\r\nBroj audio priključaka: 5;\r\nDimenzije : atx mini itd. ATX;\r\nPreporučena za: Igrače/ProOffice;\r\nBoja: Crna;\r\nGarantni rok: 3 Godine', 'Unyielding power delivery and robust thermal management form the indelible tenets of its creed. Hyperspeed connectivity, comprehensive PCIE 5.0 and DDR5 support, and Polymo lighting add potent layers of build personalization on top. And the finishing touches are added by exclusive utilities and overclocking controls that allow you to uniquely flex the performance of Ryzen 7000 Series processors. Define your AM5 build with the ROG Crosshair X670E Hero.', 54, 'Na stanju', 'rog_crosshair_x670e.png', 0),
(172, 'ASUS ROG STRIX G17 GAMING LAPTOP (ECLIPSE GRAY)', '175000.00', '142000.00', 5, 'Ne', 'Da', 'STRIX G17 GAMING', 'Operating System	Bez operativnog sistema;\r\nPanel size	17.3-inch;\r\nProcessor	AMD Ryzen 7 6800H/HS Mobile Processor (8-core/16-thread, 20MB cache, up to 4.7 GHz max boost);\r\nGraphics and graphic memory	NVIDIA GeForce RTX 3050 Laptop GPU 4GB DDR6\r\nGraphic Wattage	ROG Boost: 1550MHz* at 95W (1500MHz Boost Clock+50MHz OC, 80W+15W Dynamic Boost);\r\nMemory	16GB (8GB DDR5-4800 SO-DIMM *2);\r\nStorage	512GB PCIe 4.0 NVMe M.2 SSD;\r\nPanel resolution	FHD (1920 x 1080) 16:9 144Hz;\r\nPanel Type	IPS-level, anti-glare display;\r\nMemory Max	32GB;\r\nModel specific / other	Backlit Chiclet; Keyboard 4-Zone RGB;\r\nWi-Fi/Bluetooth	Wi-Fi 6E(802.11ax) (Dual band) 2*2 + Bluetooth 5.2;\r\nLAN	10/100/1000/2500 Mbps;\r\nBattery Capacity	56WHrs, 4S1P, 4-cell Li-ion;\r\nI/O Ports	1x 2.5G LAN port\r\n1x USB 3.2 Gen 2 Type-C\r\n1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC\r\n2x USB 3.2 Gen 1 Type-A\r\n1x HDMI 2.0b\r\n1x 3.5mm Combo Audio Jack;\r\nColor	Eclipse Gray;\r\nWeight	2.50 Kg;\r\nDimensions	39.5 x 28.2 x 2.14 ~ 2.65 cm', 'Najnoviji AMD Ryzen™ 9 6900HX CPU uparen sa do NVIDIA® 3070Ti GPU-om za laptop sa maksimalnim TGP-om do 150W i MUX prekidačem čine okosnicu potpuno novog 2022 Strix G laptopa. Vrhunska DDR5 memorija omogućava da vaš CPU uvek bude hranjen informacijama, osiguravajući vrlo odzivno iskustvo. Podrška za PCIe® 4.0 SSD znači da više nikada nećete morati da čekate na prenos datoteka ili ekrane za učitavanje igara.Vrhunske komponente stvaraju toplotu, što može uticati na performanse i nivo buke. Strix G koristi ROG Intelligent Cooling™ da drži toplotu pod kontrolom. Tečni metal na CPU-u započinje proces, snižavajući temperature do 16 stepeni Celzijusa u poređenju sa tradicionalnim termalnim pastama. 4 izlaza za ventilator osiguravaju da se laptop što efikasnije oslobodi viška toplote. Softverski profili prilagođavaju iskustvo, sa tihim režimom koji održava nivo buke niskim u lakšim zadacima, a režimom performansi koji otključava snagu vašeg laptopa povećanjem ograničenja snage grafike i brzine ventilatora. Bez obzira šta radite, možete odabrati idealnu ravnotežu između snage i akustike.\r\n\r\n\r\n\r\n', 54, 'Na stanju', 'rog_g17gaming.png', 0),
(173, 'ASUS - ROG ZEPHYRUS G15 15.6 ECLIPSE GRAY', '285499.00', '269300.00', 5, 'Ne', 'Da', 'ROG ZEPHYRUS G15', 'Processor: AMD Ryzen 9 5900HS 8 Cores (3.0GHz-4.6GHz, 16MB Cache, 35W);\r\n\r\nGraphics: NVIDIA GeForce RTX 3080;\r\n\r\nMemory: up to 40GB DDR4;\r\n\r\nStorage: up to 2 TB PCIe SSD;\r\n\r\nOperation System: Windows 11;\r\n\r\nScreen: 15.6\" 165Hz 3ms IPS-Level QHD (2560x1440) Anti-Glare Display; \r\n\r\nBattery: 90WHrs, 4S1P, 4-cell Li-ion;\r\n\r\nWireless: Wi-Fi 6 (802.11ax) (Wireless LAN) + Bluetooth 5.1;\r\n\r\nPorts: 2x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery, 2x USB 3.2 Gen 2 Type-A, HDMI 2.0b, 3.5mm Combo Audio Jack, RJ-45 Jack, Micro SD Card Reader;\r\n\r\nDimensions: ‎13.98 x 9.57 x 0.78 inches;\r\n\r\nWeight: 4.19lbs;\r\n\r\nColor: Eclipse Grey', 'AMD Ryzen 9 5900HS 8 Cores (3.0GHz-4.6GHz, 16MB Cache, 35W), Featuring true machine intelligence and a newly designed efficient architecture, the groundbreaking processor learns and adapts to your needs so you can achieve more | NVIDIA GeForce RTX 3080 graphics, Backed by 8GB GDDR6 dedicated video memory for an ultrafast, advanced GPU to fuel your games.', 54, 'Na stanju', 'rog_zephyrus_ga503.png', 0),
(174, 'ASUS X415EA-EB512CW (Full HD, i5-1135G7, 8GB, SSD 512GB, Win11 Home)', '78500.00', '75000.00', 5, 'Ne', 'Da', 'X415EA', 'Processor: AMD Ryzen 9 5900HS 8 Cores (3.0GHz-4.6GHz, 16MB Cache, 35W);\r\n\r\nGraphics: NVIDIA GeForce RTX 3080;\r\n\r\nMemory: up to 40GB DDR4;\r\n\r\nStorage: up to 2 TB PCIe SSD;\r\n\r\nOperation System: Windows 11;\r\n\r\nScreen: 15.6\" 165Hz 3ms IPS-Level QHD (2560x1440) Anti-Glare Display; \r\n\r\nBattery: 90WHrs, 4S1P, 4-cell Li-ion;\r\n\r\nWireless: Wi-Fi 6 (802.11ax) (Wireless LAN) + Bluetooth 5.1;\r\n\r\nPorts: 2x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery, 2x USB 3.2 Gen 2 Type-A, HDMI 2.0b, 3.5mm Combo Audio Jack, RJ-45 Jack, Micro SD Card Reader;\r\n\r\nDimensions: ‎13.98 x 9.57 x 0.78 inches;\r\n\r\nWeight: 4.19lbs;\r\n\r\nColor: Eclipse Grey', 'blank', 10, 'Na stanju', 'ASUS_X415EA.png', 0),
(175, 'ASUS Vivobook S 14 M3402QA-OLED-KM731W (2.8K, Ryzen 7 5800H, 16GB, SSD 1TB, Win11 Home)', '125499.00', '116300.00', 5, 'Ne', 'Da', 'Vivobook S 14 ', 'blank', 'blank', 10, 'Na stanju', 'asus_vivobook_s14.png', 0),
(176, 'ASUS PRIME X570-P DDR4 4400MHz USB 3.2 Gen 2 and Aura Sync RGB', '20699.00', '17500.00', 15, 'Ne', 'Da', 'PRIME X570-P', 'blank', 'blank', 10, 'Na stanju', 'asus_prime_x570p.png', 0),
(177, 'ASUS PRIME B660M-A D4(LGA 1700) USB 3.2 Gen 1 Type-C, Aura Sync', '16400.00', '15530.00', 15, 'Ne', 'Da', 'PRIME B660M-A', 'blank', 'blank', 10, 'Na stanju', 'asus_prime_b66m.png', 0),
(178, 'Asus ROG STRIX LC RX 6800 XT 16GB GAMING', '175000.00', '170499.00', 1, 'Ne', 'Da', 'RX 6800 XT', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_rx6800xt.png', 0),
(179, 'Asus ROG Strix Radeon RX 6650 XT OC Edition 8GB GDDR6', '66700.00', '63400.00', 1, 'Ne', 'Da', 'RX 6650 XT OC', 'blank', 'blank', 54, 'Na stanju', 'rog_rx_6650xt.png', 0),
(180, 'Asus ROG STRIX RX 5500 XT 8GB GAMING', '37500.00', '34650.00', 1, 'Ne', 'Da', 'RX 5500 XT', 'blank', 'blank', 54, 'Na stanju', 'rog_rx_5500xt.png', 0),
(181, 'Asus ROG STRIX RTX 2080S 8GB WHITE GAMING', '156500.00', '137800.00', 1, 'Da', 'Da', 'RTX 2080S', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_rtx2080s.png', 0),
(182, 'Asus ROG Strix LC II 360 ARGB CPU Cooler ', '21560.00', '17450.00', 3, 'Ne', 'Da', 'LC II 360 ARGB', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_lc360argb.png', 0),
(183, 'Asus ROG STRIX LC 360 CPU cooler Aura Sync RGB 3x120mm', '25300.00', '21450.00', 3, 'Ne', 'Da', 'LC360', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_lc360.png', 0),
(184, 'Asus ROG STRIX 750G Full Modular 750W ATX', '21500.00', '18300.00', 4, 'Ne', 'Da', '750G', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_750g.png', 0),
(185, 'Asus P513 ROG Keris Wireless RGB 16,000 dpi 100Hz', '8950.00', '7800.00', 6, 'Ne', 'Da', 'P513', 'blank', 'blank', 54, 'Na stanju', 'rog_keris_wireless.png', 0),
(186, 'Mehanička tastatura ASUS ROG Falchion Wireless RGB', '18600.00', '15350.00', 6, 'Ne', 'Da', 'Falchion', 'blank', 'blank', 54, 'Na stanju', 'rog_falchion.png', 0),
(187, 'Asus ROG Fusion II 500 Headset RGB lighting 7.1 surround', '26500.00', '23750.00', 8, 'Ne', 'Da', 'Fusion II 500', 'blank', 'blank', 54, 'Na stanju', 'rog_fusion500.png', 0),
(188, 'ASUS ROG Delta White RGB Headset USB-C RGB lighting', '24300.00', '19500.00', 8, 'Ne', 'Da', 'Delta White', 'blank', 'blank', 54, 'Na stanju', 'rog_delta_white.png', 0),
(189, 'ASUS ROG Gladius III 26,000 dpi 1000Hz RGB', '9500.00', '8750.00', 6, 'Ne', 'Da', 'Gladius III', 'blank', 'blank', 54, 'Na stanju', 'rog_gladiusIII.png', 0),
(190, 'Asus ROG Strix XG27AQ IPS WQHD 170Hz G-SYNC', '65000.00', '61300.00', 12, 'Ne', 'Da', 'XG27AQ', 'blank', 'blank', 54, 'Na stanju', 'rog_strix_xg27aq.png', 0),
(191, 'Asus NVidia GeForce RTX 3060 12GB 192bit DUAL', '57800.00', '54600.00', 1, 'Ne', 'Da', 'RTX 3060 ', 'blank', 'blank', 10, 'Na stanju', 'asus_rtx_3060.png', 0),
(192, 'GIGABYTE Aorus P750W GP-AP750GM-EU 750W/ATX/80+Gold', '20500.00', '17655.00', 4, 'Ne', 'Da', 'P750W', 'blank', 'blank', 9, 'Na stanju', 'aorus_p750w.png', 0),
(195, 'Intel Core i5-10400F, 14nm, LGA1200, 6-Cores, 2.90GHz Box', '17500.00', '15450.00', 2, 'Da', 'Da', '10400F', 'blank', 'blank', 19, 'Na stanju', 'i5_10400f.png', 0),
(196, 'Acer Računar N50-640.H i5-12400F 16GB 1TB SSD RTX3060Ti', '180000.00', '173000.00', 7, 'Ne', 'Da', 'N50-640', 'blank', 'blank', 6, 'Na stanju', 'acer_Nitro N50-640.png', 0),
(197, 'MSI GeForce RTX 4090 GAMING X TRIO 24GB GDDR6X 384-bit', '279000.00', '268000.00', 1, 'Ne', 'Da', 'RTX 4090', 'blank', 'blank', 24, 'Na stanju', 'msi_rtx4090.png', 0),
(198, 'AORUS GeForce RTX 4090 MASTER 24GB GDDR6X 384-bit', '280000.00', '275000.00', 1, 'Ne', 'Da', 'RTX 4090', 'blank', 'blank', 9, 'Na stanju', 'aorus_rtx4090.png', 0),
(199, 'Intel Arc A750 Limited Edition 8GB PCI Express 4.0 Graphics Card', '37500.00', '35000.00', 1, 'Ne', 'Da', 'A750', 'blank', 'blank', 55, 'Na stanju', 'intel_arc_a750.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slikeProizvoda`
--

CREATE TABLE `slikeProizvoda` (
  `slika_id` int(10) UNSIGNED NOT NULL,
  `proizvod_id` int(10) DEFAULT NULL,
  `naziv_slike` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slikeProizvoda`
--

INSERT INTO `slikeProizvoda` (`slika_id`, `proizvod_id`, `naziv_slike`) VALUES
(1, 201, '1680115813.7264_28348-sony-playstation-5-ps5-digital-edition-konzola-cena-prodaja-1.jpg'),
(2, 201, '1680115813.7279_28348-konzola-sony-playStation-5-ps5-cena-prodaja-5_1.jpg'),
(3, 201, '1680115813.7289_28348-konzola-sony-playStation-5-ps5-cena-prodaja-3_1.jpg'),
(4, 202, '1680120582.8313_1.png'),
(5, 202, '1680120582.8322_2.png'),
(6, 203, '1680123561.4008_1.png'),
(7, 203, '1680123561.4015_2.png'),
(8, 204, '1680198019.2215_28348-sony-playstation-5-ps5-digital-edition-konzola-cena-prodaja-2.jpg'),
(9, 204, '1680198019.2224_28348-sony-playstation-5-ps5-digital-edition-konzola-cena-prodaja-1.jpg'),
(10, 204, '1680198019.223_28348-konzola-sony-playStation-5-ps5-cena-prodaja-5_1.jpg'),
(11, 205, '1680351927.3844_wallpaperflare.com_wallpaper.jpg'),
(12, 199, '1680351927.3851_2.png'),
(13, 199, '1680351927.3858_1.png'),
(14, 199, '1680353237.2871_gpu.jpeg'),
(25, 129, 'ps5_digital.png'),
(26, 129, 'ps5_1.jpg'),
(27, 129, 'ps5_2.jpg'),
(28, 129, 'ps5_3.jpg'),
(29, 129, 'ps5_4.jpg'),
(30, 122, 'zotac_rtx_4080.png'),
(31, 122, 'zotac_1.png'),
(32, 122, 'zotac_2.jpg'),
(33, 122, 'zotac_3.jpg'),
(34, 122, 'zotac_4.jpg'),
(35, 128, 'aoc_24v2q.png'),
(36, 128, 'aoc_1.png'),
(37, 128, 'aoc_2.png'),
(38, 128, 'aoc_3.png'),
(39, 128, 'aoc_4.png'),
(40, 128, 'aoc_5.png'),
(46, 23, 'kyson1.jpg'),
(47, 23, 'kyson2.jpg'),
(48, 23, 'kyson3.jpg'),
(49, 11, 'asus_tuf_rtx4090_1.jpg'),
(50, 11, 'asus_tuf_rtx4090_2.jpg'),
(51, 11, 'asus_tuf_rtx4090_3.jpg'),
(52, 11, 'asus_tuf_rtx4090_4.jpg'),
(53, 11, 'asus_tuf_rtx4090_5.jpg'),
(54, 17, 'toxic_rx6900_1.jpg'),
(55, 17, 'toxic_rx6900_2.jpg'),
(56, 17, 'toxic_rx6900_3.jpg'),
(57, 17, 'toxic_rx6900_4.jpg'),
(58, 136, 'xbox_s_1.jpg'),
(59, 136, 'xbox_s_2.jpg'),
(60, 136, 'xbox_s_3.jpg'),
(61, 136, 'xbox_s_4.jpg'),
(62, 136, 'xbox_s_5.jpg'),
(63, 22, 'sandisk_ultra_1.jpg'),
(64, 22, 'sandisk_ultra_2.jpg'),
(65, 22, 'sandisk_ultra_3.jpg'),
(69, 25, 'master_air_1.png'),
(70, 25, 'master_air_2.png'),
(71, 25, 'master_air_3.png'),
(72, 25, 'master_air_4.png'),
(73, 25, 'master_air_5.png'),
(74, 25, 'master_air_6.png'),
(75, 25, 'master_air_7.png'),
(76, 25, 'master_air_8.png'),
(77, 25, 'master_air_9.png'),
(78, 25, 'master_air_10.png'),
(79, 25, 'master_air_11.png'),
(80, 107, 'ideapad_3i_1.png'),
(81, 107, 'ideapad_3i_2.png'),
(82, 107, 'ideapad_3i_3.png'),
(83, 107, 'ideapad_3i_4.png'),
(84, 107, 'ideapad_3i_5.png'),
(85, 107, 'ideapad_3i_6.png'),
(86, 107, 'ideapad_3i_7.png'),
(87, 26, 'ventus_2060_1.png'),
(88, 26, 'ventus_2060_2.png'),
(89, 26, 'ventus_2060_3.png'),
(90, 26, 'ventus_2060_4.png'),
(91, 26, 'ventus_2060_5.png'),
(92, 111, 'aorus_rx6800_1.png'),
(93, 111, 'aorus_rx6800_2.png'),
(94, 111, 'aorus_rx6800_3.png'),
(95, 111, 'aorus_rx6800_4.png'),
(96, 111, 'aorus_rx6800_5.png'),
(97, 111, 'aorus_rx6800_6.png'),
(98, 111, 'aorus_rx6800_7.png'),
(99, 111, 'aorus_rx6800_8.png'),
(100, 111, 'aorus_rx6800_9.png'),
(101, 112, 'ryzen9_7950x.png'),
(102, 113, 'ryzen5_7600.png'),
(103, 114, 'ryzen9_5950x.png'),
(104, 115, 'intel_i9_13900ks.png'),
(105, 195, 'i5_10400f.png'),
(106, 116, 'acer_nitro5_1.png'),
(107, 116, 'acer_nitro5_2.png'),
(108, 116, 'acer_nitro5_3.png'),
(109, 116, 'acer_nitro5_4.png'),
(110, 116, 'acer_nitro5_5.png'),
(111, 116, 'acer_nitro5_6.png'),
(112, 116, 'acer_nitro5_7.png'),
(113, 116, 'acer_nitro5_8.png'),
(114, 118, 'msi_rtx3080_1.png'),
(115, 118, 'msi_rtx3080_2.png'),
(116, 118, 'msi_rtx3080_3.png'),
(117, 118, 'msi_rtx3080_4.png'),
(118, 118, 'msi_rtx3080_5.png'),
(119, 33, 'rog_rtx4090_1.png'),
(120, 33, 'rog_rtx4090_2.png'),
(121, 33, 'rog_rtx4090_3.png'),
(122, 33, 'rog_rtx4090_4.png'),
(123, 33, 'rog_rtx4090_5.png'),
(124, 33, 'rog_rtx4090_6.png'),
(125, 33, 'rog_rtx4090_7.png'),
(126, 33, 'rog_rtx4090_8.png'),
(127, 33, 'rog_rtx4090_9.png'),
(128, 33, 'rog_rtx4090_10.png'),
(129, 33, 'rog_rtx4090_11.png'),
(130, 33, 'rog_rtx4090_12.png'),
(132, 123, 'cx550f_1.png'),
(133, 123, 'cx550f_2.png'),
(134, 123, 'cx550f_3.png'),
(135, 123, 'cx550f_4.png'),
(136, 123, 'cx550f_5.png'),
(137, 124, 'k530_1.png'),
(138, 124, 'k530_2.png'),
(139, 124, 'k530_3.png'),
(140, 124, 'k530_4.png'),
(141, 124, 'k530_5.png'),
(142, 125, 'g15cf_1.png'),
(143, 125, 'g15cf_2.png'),
(144, 125, 'g15cf_3.png'),
(145, 126, 'g332_1.jpg'),
(146, 126, 'g332_2.jpg'),
(147, 126, 'g332_3.jpg'),
(148, 127, 'ch117_1.png'),
(149, 127, 'ch117_2.png'),
(150, 130, 'xpg_512_1.png'),
(151, 130, 'xpg_512_2.png'),
(152, 130, 'xpg_512_3.png'),
(153, 130, 'xpg_512_4.png'),
(154, 130, 'xpg_512_5.png'),
(155, 131, 'b550m_asrock_1.png'),
(156, 131, 'b550m_asrock_2.png'),
(157, 131, 'b550m_asrock_3.png'),
(158, 131, 'b550m_asrock_4.png'),
(159, 131, 'b550m_asrock_5.png'),
(160, 132, 'fury_beast_1.jpg'),
(161, 132, 'fury_beast_2.jpg'),
(162, 133, 'hama_usbc_hdmi.png'),
(163, 134, 'xfx_rx6750_1.png'),
(164, 134, 'xfx_rx6750_2.png'),
(165, 134, 'xfx_rx6750_3.png'),
(166, 134, 'xfx_rx6750_4.png'),
(167, 134, 'xfx_rx6750_5.png'),
(168, 135, 'gigabyte_rx6500xt_1.png'),
(169, 135, 'gigabyte_rx6500xt_2.png'),
(170, 135, 'gigabyte_rx6500xt_3.png'),
(171, 135, 'gigabyte_rx6500xt_4.png'),
(172, 135, 'gigabyte_rx6500xt_5.png'),
(173, 135, 'gigabyte_rx6500xt_6.png'),
(174, 166, 'asus_tuf_V27_1.jpg'),
(175, 166, 'asus_tuf_V27_2.jpg'),
(176, 166, 'asus_tuf_V27_3.jpg'),
(177, 166, 'asus_tuf_V27_4.jpg'),
(178, 166, 'asus_tuf_V27_5.jpg'),
(179, 167, 'asus_VX27_1.png'),
(180, 167, 'asus_VX27_2.png'),
(181, 167, 'asus_VX27_3.png'),
(182, 167, 'asus_VX27_4.png'),
(183, 168, 'rog_swift_PG_1.png'),
(184, 168, 'rog_swift_PG_2.png'),
(185, 168, 'rog_swift_PG_3.png'),
(186, 169, 'asus_rog_b550f_1.jpg'),
(187, 169, 'asus_rog_b550f_2.jpg'),
(188, 169, 'asus_rog_b550f_3.jpg'),
(189, 169, 'asus_rog_b550f_4.jpg'),
(190, 170, 'asus_rog_z790_1.jpg'),
(191, 170, 'asus_rog_z790_2.jpg'),
(192, 170, 'asus_rog_z790_3.jpg'),
(193, 170, 'asus_rog_z790_4.jpg'),
(194, 171, 'rog_crosshair_x670e_1.jpg'),
(195, 171, 'rog_crosshair_x670e_2.jpg'),
(196, 171, 'rog_crosshair_x670e_3.jpg'),
(197, 171, 'rog_crosshair_x670e_4.jpg'),
(198, 171, 'rog_crosshair_x670e_5.jpg'),
(199, 172, 'rog_scar_g17_1.png'),
(200, 172, 'rog_scar_g17_2.png'),
(201, 172, 'rog_scar_g17_3.png'),
(202, 172, 'rog_scar_g17_4.png'),
(203, 172, 'rog_scar_g17_5.png'),
(204, 172, 'rog_scar_g17_6.png'),
(205, 172, 'rog_scar_g17_7.png'),
(206, 174, 'x451_1.jpg'),
(207, 174, 'x451_2.jpg'),
(208, 174, 'x451_3.jpg'),
(209, 175, 'vivobook14_1.png'),
(210, 175, 'vivobook14_2.png'),
(211, 175, 'vivobook14_3.png'),
(212, 176, 'x570-p_1.png'),
(213, 176, 'x570-p_2.png'),
(214, 176, 'x570-p_3.png'),
(215, 177, 'b660m_1.jpg'),
(216, 177, 'b660m_2.jpg'),
(217, 177, 'b660m_3.jpg');

-- --------------------------------------------------------

--
-- Structure for view `pogledKorpa`
--
DROP TABLE IF EXISTS `pogledKorpa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pogledKorpa`  AS SELECT `korpa`.`korpa_id` AS `korpa_id`, `korpa`.`datum_kupovine` AS `datum_kupovine`, `korpa`.`status_kupovine` AS `status_kupovine`, `korpa`.`kupljen` AS `kupljen`, `korpa`.`proizvod_id` AS `proizvod_id`, `proizvodi`.`naziv` AS `naziv`, `proizvodi`.`nova_cena` AS `cena`, `korpa`.`korisnik_id` AS `korisnik_id`, `korisnici`.`ime` AS `ime_korisnika`, `korisnici`.`prezime` AS `prezime_korisnika`, `korisnici`.`telefon` AS `telefon_korisnika`, `korisnici`.`adresa` AS `adresa_korisnika` FROM ((`korpa` join `proizvodi` on(`korpa`.`proizvod_id` = `proizvodi`.`proizvod_id`)) join `korisnici` on(`korpa`.`korisnik_id` = `korisnici`.`korisnik_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `pogledProizvodi`
--
DROP TABLE IF EXISTS `pogledProizvodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pogledProizvodi`  AS SELECT `proizvodi`.`proizvod_id` AS `proizvod_id`, `proizvodi`.`naziv` AS `naziv`, `proizvodi`.`glavna_slika` AS `glavna_slika`, `proizvodi`.`stara_cena` AS `stara_cena`, `proizvodi`.`nova_cena` AS `nova_cena`, `proizvodi`.`kategorija_id` AS `kategorija_id`, `proizvodi`.`izdvojeno` AS `izdvojeno`, `proizvodi`.`aktivno` AS `aktivno`, `proizvodi`.`model` AS `model`, `proizvodi`.`specifikacije` AS `specifikacije`, `proizvodi`.`opis_proizvoda` AS `opis_proizvoda`, `proizvodi`.`brend_id` AS `brend_id`, `proizvodi`.`status` AS `status`, `brendovi`.`slika_brenda` AS `slika_brenda`, `brendovi`.`naziv_brenda` AS `naziv_brenda`, `kategorije`.`naziv_kategorije` AS `naziv_kategorije` FROM ((`proizvodi` join `brendovi` on(`proizvodi`.`brend_id` = `brendovi`.`brend_id`)) join `kategorije` on(`proizvodi`.`kategorija_id` = `kategorije`.`kategorija_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administratori`
--
ALTER TABLE `administratori`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `brendovi`
--
ALTER TABLE `brendovi`
  ADD PRIMARY KEY (`brend_id`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorija_id`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnik_id`) USING BTREE;

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`korpa_id`);

--
-- Indexes for table `napomene`
--
ALTER TABLE `napomene`
  ADD PRIMARY KEY (`napomena_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvod_id`);

--
-- Indexes for table `slikeProizvoda`
--
ALTER TABLE `slikeProizvoda`
  ADD PRIMARY KEY (`slika_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratori`
--
ALTER TABLE `administratori`
  MODIFY `administrator_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brendovi`
--
ALTER TABLE `brendovi`
  MODIFY `brend_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `kategorija_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `komentar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `korpa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `napomene`
--
ALTER TABLE `napomene`
  MODIFY `napomena_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `slikeProizvoda`
--
ALTER TABLE `slikeProizvoda`
  MODIFY `slika_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
