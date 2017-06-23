-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Cze 2017, 01:26
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fadein`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Akcji'),
(2, 'Dokumentalny'),
(3, 'Animowany'),
(4, 'Komedia'),
(5, 'Fabularny'),
(6, 'Dramat');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1jupr116nupkr7jueke2k2orpd0dtfsu', '::1', 1498090550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383039303237343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('1o4ptsgitvqv74ov49tvqe3fkjjittbd', '::1', 1498253788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235333439303b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('2bneadecc7p0hmu0pm9pvlpuklraarpt', '::1', 1498250108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234393837323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('2unurbo9qdmfcpci6am72ko1d2kenaij', '::1', 1498258800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235383631383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('3vsbolmtrs31qd1edjtn1akor8d253kd', '::1', 1498085124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038343931323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('43jaikt8m0ucgicc6n9cjh1bun74cnu5', '::1', 1498088822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038383633333b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('492rso934memnocua2euk7ehcm74oqic', '::1', 1498246154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234353935333b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('493oq0efud1sdqmessnk1m70p9jfc3mo', '::1', 1498246820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234363637323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('53hep3s6s6pgenohnlldilbf4anaqsp9', '::1', 1498257272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235363937353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('54seclbfiplmfcjbecor3r1ju0sgg67e', '::1', 1498086586, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038363335303b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('5hqbpq14tvd6nqrn378moltio3d3eecl', '::1', 1498243902, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234333930323b),
('5vfhbfaui7ahdesu84819sv1rk608j4v', '::1', 1498088631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038383333313b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('6sea7rs1b1h3nofrmishcpm3mha1i6dd', '::1', 1498244632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234343535323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('7c4ovuibdkmfcpdodhqnqa629v6jbtu7', '::1', 1498245823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234353533303b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('84dke380e2vb0p3ivo7cso1l1j9jg1u7', '::1', 1498246627, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234363334313b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('89bn8b40t7sfet01jetmeno1fljltinn', '::1', 1498257737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235373733373b),
('8ibfmv0fmg5ghfmf19gl5id6uddhj5sn', '::1', 1498244087, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234333837383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('8nm6hnu2b5avcns7k7a97inmkvvoemi8', '::1', 1498086724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038363635373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('9eqdmirgvhi0hbu5jip1fh9of49ao5bp', '::1', 1498248510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234383431373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('9etehnakjjhphdk99geh3qv705auq3dn', '::1', 1498084042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038333934333b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('a73s2blv18pl3vptkng0r3d5a677n5js', '::1', 1498251732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235313438383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('a74f9bborsutjlbp7ph52s9hjoq3dppv', '::1', 1498247505, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234373336353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b7a6d69656e6e61537a756b616e69617c733a313a2230223b5f5f63695f766172737c613a313a7b733a31353a227a6d69656e6e61537a756b616e6961223b733a333a226f6c64223b7d),
('b758t1f1vgomm8a3m4b8aampens11mbc', '::1', 1498243688, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234333537363b),
('c2boevonn4pr8qv5gfuivekj7gle3ngf', '::1', 1498255659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235353633363b),
('cv0u43lgrfmcd5508pv9mj6jg36pofqb', '::1', 1498250317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235303239333b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('d59sg6g82499qr91liel2mhrt6tcmo1p', '::1', 1498258162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235373837323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('dqd45o7h8qajrdjfs03k7pq637cjll6s', '::1', 1498089632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038393431353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('f41qrn8nhcds9vgsd6f89kl74e96j42a', '::1', 1498088182, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038373931303b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('f7lg1oi0g8t4l1tqgi7inq2o4hh241d3', '::1', 1498086053, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038363034353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('fl30uecp06t5r9jo15cjln3aiucu817s', '::1', 1498090760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383039303630363b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('hejggnc52cqfrq7nv5gr62ohltijoggf', '::1', 1498256962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235363637333b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ijdg4cjq7q40o02ae9f5bjreroso2v35', '::1', 1498087783, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038373530383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('inof9dtmrip6sb99jc5mbg6eivd1lhr8', '::1', 1498258362, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235383335373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('iq8aqbuofcjoo3c15r477gd9ak7u50hs', '::1', 1498257578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235373332313b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('jqm5n43v3blk4gb7j7eqfc9qprit8r2c', '::1', 1498088507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038383530373b),
('jqvadj12ncghr69mvtl4e9t5rosptf1n', '::1', 1498083750, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038333436373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('k01s9u9ogoqs4ravocj3ii3bv3mt3t40', '::1', 1498258428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235383139373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('k83jig5f2kt86gqir205sjam29ige6tp', '::1', 1498085950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038353638353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ma8gf43qnbmq0oviqqrf3il0emb81j0h', '192.168.137.86', 1498245310, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234353331303b),
('mfgn031hoh1b96uvv1c83jl60vlmavli', '::1', 1498248290, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234383038383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('n2tpjc84jv2npk3v0367tqp63qj2ps18', '::1', 1498249632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234393438303b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ncjr04n21cua3eoqlfmakaadi6egctcm', '::1', 1498084768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038343630373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('o57arc78gcbv98juvb4avoc368kieph7', '::1', 1498252789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235323732323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('og4rl3krkbv7tokusdd3sjr3f60cp83i', '::1', 1498085602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038353335383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('oluqo3aoidqgj8bsb8j7hgmlcu0ojfu9', '::1', 1498260376, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383236303237373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ostv452dobojm8e4u9enmsjeeaaquni5', '::1', 1498253429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235333133343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ou556vpieaiblnkvokpk4elhimj78eps', '::1', 1498256487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235363230353b),
('p7v1ojkhaml5m8e9frqgts3rslb7t84h', '::1', 1498254342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235343130373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('rfqrojbph7c4dg7ip03qg4c332mk29oa', '::1', 1498254097, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235333739383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('s54pu21cthkc0aq49hfcoajeahruc177', '::1', 1498247206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234373030343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('snqe123mu119jl4jffep37b4ijdjal1m', '::1', 1498088507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383038383530373b),
('t090lsf0sgps8jjqf3aebtr8rrcltj5g', '::1', 1498242891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234323731353b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('t6buqh71i7faq5407tmb4jrhi6gtqkvo', '::1', 1498252024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235313831343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('v405jgqkae13q5ngrns50tla21cetiak', '::1', 1498248000, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234373735343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('v5t7ver985sg4laooe2mdu1lufjb7e1i', '::1', 1498243494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383234333139343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('v9fqvmksmfadu5gpih5qp36735f17b5q', '::1', 1498259448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383235393433343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `professions`
--

CREATE TABLE `professions` (
  `profession` char(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `professions`
--

INSERT INTO `professions` (`profession`) VALUES
('agregaciarz'),
('aktor'),
('akustyk'),
('asystent reżysera'),
('autor dialogów'),
('charakteryzator'),
('dekorator'),
('dźwiękowiec'),
('fotograf'),
('kaskader'),
('klapser'),
('montażysta'),
('realizator'),
('kaskader'),
('kompozytor'),
('kompozytor muzyki'),
('kostiumolog'),
('montażysta'),
('montażysta dźwięku'),
('operator kamery'),
('operator obrazu'),
('operator steadycam-u'),
('operator zdjęć specjalnych'),
('ostrzyciel'),
('oświetleniowiec'),
('perukarz'),
('producent'),
('realizator'),
('rekwizytor'),
('reżyser'),
('scenarzysta'),
('scenograf'),
('statysta'),
('tancerz'),
('tyczkarz'),
('wózkarz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `creator` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `creation_time` int(11) NOT NULL,
  `scenario_dir` varchar(200) CHARACTER SET latin1 NOT NULL,
  `category` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id_project`, `title`, `description`, `creator`, `creation_time`, `scenario_dir`, `category`) VALUES
(53, 'Przygody nieustraszonego wiedźmina i gumowego smoka', 'Dzielny wiedźmin wyrusza na wyprawę polowania na smoka ze zlecenia które zdobył w Nilwgardzkiej wiosce. Czy ud mu się zabić potwora?!', 'KGROZA', 1497541903, './uploads/1497541903.pdf', 'Film animowany'),
(54, 'Władcy Papierosów 7', 'Historia studia „TheComedyPictures” -  W 2008r. zostało założone studio Dtk film które zajmowało się nagrywaniem pierwszej serii filmów „Władcy Papierosów” ; Pierwszy odcinek tej serii został nagrany w grudniu lecz nie zapisał się on a potem wydano bardzo podobny film                          „Władcy Papierosów 2” była to pierwsza część która przypominała bardziej kabaret lub skecz a nie film. Były To początki studia następną produkcją był film „Władcy Papierosów 3 – Wyjazd na fast food” nagrany  ósmego lutego 2009r. Chociaż filmy były słabe jakościowo i mało znane nie przeszkodziło w nagraniu kolejnej części „Władcy Papierosów 4 – Złodziej” Gdzie do Poposa głównego bohatera włamywał się złodziej. Filmy były coraz to lepże a kolejna część otworzyła wrota YouTube i wprowadziła nową jakość nagrań oraz bardziej dopracowaną fabułę. „Władcy Papierosów 5 – Gość w dom” Czyli Popos u dawnego kolegi w odwiedzinach. Potem była produkcja „Władcy Papierosów 6 – Kolejny bardziej kabaret a nie film, Popos zamawia pizzę. Cała akcja dzieje się w domu przez kilka minut. I najlepsza z dotychczasowych produkcji „Władcy Papierosów 7 – Antymateria” Poposek znajduje słoik na swoim podwórku nieświadom, że jest w nim antymateria. Cały film opiera się na konflikcie mafii Borubara z Poposem który nie może dopuścić do oddania słoika. Film był też swego czasu dostępny na yt w 3 partach. Kolejny „filmokabaret” bowiem „Władcy Papierosów 8 – Ruskie papierosy” został nagrany komórką a film pokazuje jak przez cały czas Popos pali swoją ruską faję. „Władcy Papierosów – Nielegalna telewizja” Popos znajduje pod śmietnikiem stary dekoder telewizyjny i postanawia nielegalnie oglądać telewizję. Kiedy Popos kłuci się z sąsiadem ten donosi do niego na policję.  „Włady papierosów 11 – Ostatnia flaszka wina” – planowany ostatni film z serii władców na rok 2011. Lecz nagrania nie rozpoczęły się i władców zakończyła 12 część czyli\r\n„Władcy Papierosów 12 – Jak to u Poposa” – Ostatni film ukazujący perypetie starszego pana. I to tyle z władców ale były plany równiaż na inne filmy np. Młody mistrz, Dotyk ducha, które produkcje nie zostały zrealizowane. Najnowszą produkcją jest film The Time i Minaecraft TheMovie. Aktualnie studio znajduje się na YouTube pod adresem www.youtube.com/kamil6745', 'KGROZA', 1498009647, './uploads/1498009647.pdf', 'Komedia'),
(61, 'Agent 007', 'James Bond odkrywa, że organizacja, z którą walczył, jest bardziej niebezpieczna, niż myślał. Ślad prowadzi do bezlitosnego biznesmena Dominica Greene\'a.', 'KGROZA', 1498085413, '1498085413.pdf', 'Fabularny'),
(62, 'Zielona mila', 'Emerytowany strażnik więzienny opowiada przyjaciółce o niezwykłym mężczyźnie, którego skazano na śmierć za zabójstwo dwóch 9-letnich dziewczynek.', 'KGROZA', 1498085750, '1498085750.pdf', 'Dramat'),
(63, 'Forrest Gump', 'Historia życia Forresta, chłopca o niskim ilorazie inteligencji z niedowładem kończyn, który staje się miliarderem i bohaterem wojny w Wietnamie.', 'KGROZA', 1498085766, '1498085766.pdf', 'Komedia'),
(64, 'Skazani na Shawshank', 'Adaptacja opowiadania Stephena Kinga. Niesłusznie skazany na dożywocie bankier, stara się przetrwać w brutalnym, więziennym świecie.', 'KGROZA', 1498085805, '1498085805.pdf', 'Dramat'),
(65, 'Matrix', 'Haker komputerowy Neo dowiaduje się od tajemniczych rebeliantów, że świat, w którym żyje, jest tylko obrazem przesyłanym do jego mózgu przez roboty.', 'KGROZA', 1498085828, '1498085828.pdf', 'Akcji'),
(66, 'Leon zawodowiec', 'Płatny morderca ratuje dwunastoletnią dziewczynkę, której rodzina została zabita przez skorumpowanych policjantów.', 'KGROZA', 1498085846, '1498085846.pdf', 'Dramat'),
(67, 'Shrek', 'By odzyskać swój dom, brzydki ogr z gadatliwym osłem wyruszają uwolnić piękną księżniczkę.', 'KGROZA', 1498085866, '1498085866.pdf', 'Animowany'),
(68, 'Gladiator', 'Generał Maximus - prawa ręka cesarza, szczęśliwy mąż i ojciec - w jednej chwili traci wszystko. Jako niewolnik-gladiator musi walczyć na arenie o przeżycie.', 'KGROZA', 1498085885, '1498085885.pdf', 'Dramat'),
(69, 'Kac Vegas', 'Czterech przyjaciół spędza wieczór kawalerski w Las Vegas. Następnego dnia okazuje się, że zgubili pana młodego i nic nie pamiętają.', 'KGROZA', 1498085900, '1498085900.pdf', 'Komedia'),
(70, 'Władcy Papierosów', 'khgfiouy', 'KGROZA', 1498243561, '1498243561.pdf', 'Akcji'),
(71, 'Agent 007', 'Trololol', 'KGROZA', 1498244017, '1498244017.pdf', 'Akcji'),
(72, 'rdhe', 'etheh', 'KGROZA', 1498260285, '1498260285.pdf', 'Akcji');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(130) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `first_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `last_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `profesja1` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `profesja2` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `profesja3` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `first_name`, `last_name`, `email`, `profesja1`, `profesja2`, `profesja3`) VALUES
(8, 'KGROZA', 'a15cdf5114ed254b92f9ad85824bca89ecaec8967891091330030089eb25217496ca933b6cdd5ac6afcd9c20f930697d3adeab2b075cf9d1be318f0927ea1a82', 'Kamil', 'Różański', 'kgrozanski@gmail.com', '', '', ''),
(9, 'Kowalski', '69398554371d64e4580e329f7c137cf101cddce22a9fe8d18c1482ec2fd5dc6ff6a9650965c8b0072ece977e99b32924ca6ed011361c90ca86a8b15e3cd10717', 'Jan', 'Kowalski', 'kowalski@wp.pl', '', '', ''),
(10, 'Paweł', 'f4563e53c378ea054cd700452d6fe12c102a523b2a4afa9450c10a1356fbf84921873cc5d898150af6f90568e3e4fe1aff6d3df5110fc6d66b00b902e1fc5fec', 'Paweł', 'Boroń', 'pawel1234@wp.pl', '', '', ''),
(12, 'Nyga666', '4d2d86b2fb7d5e8d932b2f3c0b704a1f6b9fd4db1af0d44459cff7f67e5a9096e434c3f47f128226fd9e3aea5fe671b2d5bae0b417a1447b8feadb7d96b6b4a1', 'Gabriel', 'Janczak', 'janczarski@gmai.com', '', '', ''),
(13, 'pioter325', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Piotr', 'Suszek', 'pioter325@wp.pl', 'agregaciarz', 'wózkarz', 'statysta'),
(14, 'KGROZA123', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Kamil', 'Różański', 'kgrozanskI123@gmail.com', 'autor dialogów', 'aktor', 'charakteryzator'),
(15, 'KGROZA2', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Kamil', 'Różański', 'kgrozanski1234@gmail.com', 'aktor', 'montażysta', ''),
(16, 'KGROZA22', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Kamil', 'Różański', 'pioter3252@gmail.com', 'aktor', '', ''),
(17, 'Borcz', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Borczysław', 'Lipka', 'borczyslaw@wp.pl', 'kaskader', '', ''),
(18, 'KGROZAA', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Kamil', 'Różański', 'kgrozanski123456@gmail.com', 'klapser', '', ''),
(19, 'Adam123', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Adam', 'Wójcik', 'adamo@wp.l', 'aktor', 'dekorator', 'scenograf'),
(20, 'Dudek', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Piotr', 'Dudek', 'dudilini@wp.pl', 'klapser', 'scenograf', 'montażysta'),
(21, 'WoXu', 'da7650edc8310ea4a4ff16063ee0a8cf587147fa8009756441922520ed17f94f3b74f6b769c1fdef390648a25ff132c4488bce899ce4861b7a151ea73e1086ed', 'Jakub', 'Woźniak', 'woxnioll@gmail.com', 'dźwiękowiec', '', ''),
(22, 'Aśkem', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Asia', 'Tuleja', 'tulejson@asiek.com', 'asystent reżysera', '', ''),
(23, 'Alvatarez', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Maciej', 'Chwil', 'alv@wp.pl', 'autor dialogów', '', ''),
(24, 'Kupa', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'asdasd', 'asdasda', 'adasdas@wp.pl', 'agregaciarz', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id_wiadomosci` int(11) NOT NULL,
  `send_time` int(11) NOT NULL,
  `message_from` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `message_to` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `message_title` tinytext COLLATE utf8_polish_ci NOT NULL,
  `message` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id_wiadomosci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
