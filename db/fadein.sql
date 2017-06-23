-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Cze 2017, 21:51
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
(1, 'Film akcji'),
(2, 'Film dokumentalny'),
(3, 'Film animowany'),
(4, 'Komedia');

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
('3f4ncsps9av8sv0jugb1fuqevklhghlp', '::1', 1498014710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031343538313b757365726e616d657c733a393a22416c7661746172657a223b757365725f69647c733a323a223233223b69735f6c6f676765645f696e7c623a313b),
('725nt6v36grv9b8r747q17psgbb3hctq', '::1', 1498012931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031323639373b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('880eica2cn4ev4r9hmkq4q3nt7m4liv8', '::1', 1498014299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031343030343b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('boo5l4p05mdgmr2k7hd0lbas93hl55k4', '::1', 1498011390, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031313334323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('hon4ph2clhid2np2udvhh34no4blc7c0', '::1', 1498074514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383037343337323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('lte5gq8cokjj1160pp1qtq8fbvt7las2', '::1', 1498013844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031333638323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('n3gsoas186ev482ds43oiht6nm558nit', '::1', 1498012343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031323034383b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('ro95ic3ln5h4ahmqqmca9dnrc4df7le1', '::1', 1498012649, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031323335363b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b),
('u1haaou8bil00lntni7q7obpst0apq6l', '::1', 1498012015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383031313733323b757365726e616d657c733a363a224b47524f5a41223b757365725f69647c733a313a2238223b69735f6c6f676765645f696e7c623a313b);

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
(42, 'Nolz', 'Holz', 'Nyga666', 1496691641, '', 'Film akcji?'),
(45, 'Coś', 'coś', 'nyga667', 1234567, '', 'Chuj'),
(46, 'Luz', 'luz', 'Nyga666', 1496697879, '', 'Film akcji?'),
(47, 'Luz', 'luz', 'Nyga666', 1496697970, '', 'Film akcji?'),
(50, ':)', ':((', 'KGROZA', 1496872018, './uploads/1496872018.pdf', 'Komedia'),
(51, 'kjnakjdbsjdf', 'dVBSABSKB', 'KGROZA', 1496872170, './uploads/1496872170.pdf', 'Film dokumentalny'),
(52, 'lol', 'dassasd', 'KGROZA', 1496872334, './uploads/1496872334.pdf', 'Film dokumentalny'),
(53, 'Przygody nieustraszonego wiedźmina i gumowego smoka', 'Dzielny wiedźmin wyrusza na wyprawę polowania na smoka ze zlecenia które zdobył w Nilwgardzkiej wiosce. Czy ud mu się zabić potwora?!', 'KGROZA', 1497541903, './uploads/1497541903.pdf', 'Film animowany'),
(54, 'Władcy Papierosów 7', 'Historia studia „TheComedyPictures” -  W 2008r. zostało założone studio Dtk film które zajmowało się nagrywaniem pierwszej serii filmów „Władcy Papierosów” ; Pierwszy odcinek tej serii został nagrany w grudniu lecz nie zapisał się on a potem wydano bardzo podobny film                          „Władcy Papierosów 2” była to pierwsza część która przypominała bardziej kabaret lub skecz a nie film. Były To początki studia następną produkcją był film „Władcy Papierosów 3 – Wyjazd na fast food” nagrany  ósmego lutego 2009r. Chociaż filmy były słabe jakościowo i mało znane nie przeszkodziło w nagraniu kolejnej części „Władcy Papierosów 4 – Złodziej” Gdzie do Poposa głównego bohatera włamywał się złodziej. Filmy były coraz to lepże a kolejna część otworzyła wrota YouTube i wprowadziła nową jakość nagrań oraz bardziej dopracowaną fabułę. „Władcy Papierosów 5 – Gość w dom” Czyli Popos u dawnego kolegi w odwiedzinach. Potem była produkcja „Władcy Papierosów 6 – Kolejny bardziej kabaret a nie film, Popos zamawia pizzę. Cała akcja dzieje się w domu przez kilka minut. I najlepsza z dotychczasowych produkcji „Władcy Papierosów 7 – Antymateria” Poposek znajduje słoik na swoim podwórku nieświadom, że jest w nim antymateria. Cały film opiera się na konflikcie mafii Borubara z Poposem który nie może dopuścić do oddania słoika. Film był też swego czasu dostępny na yt w 3 partach. Kolejny „filmokabaret” bowiem „Władcy Papierosów 8 – Ruskie papierosy” został nagrany komórką a film pokazuje jak przez cały czas Popos pali swoją ruską faję. „Władcy Papierosów – Nielegalna telewizja” Popos znajduje pod śmietnikiem stary dekoder telewizyjny i postanawia nielegalnie oglądać telewizję. Kiedy Popos kłuci się z sąsiadem ten donosi do niego na policję.  „Włady papierosów 11 – Ostatnia flaszka wina” – planowany ostatni film z serii władców na rok 2011. Lecz nagrania nie rozpoczęły się i władców zakończyła 12 część czyli\r\n„Władcy Papierosów 12 – Jak to u Poposa” – Ostatni film ukazujący perypetie starszego pana. I to tyle z władców ale były plany równiaż na inne filmy np. Młody mistrz, Dotyk ducha, które produkcje nie zostały zrealizowane. Najnowszą produkcją jest film The Time i Minaecraft TheMovie. Aktualnie studio znajduje się na YouTube pod adresem www.youtube.com/kamil6745', 'KGROZA', 1498009647, './uploads/1498009647.pdf', 'Komedia'),
(56, 'Władcy Papierosów', 'Lorem Ipsum', 'KGROZA', 1498013706, '1498013706.pdf', 'Film akcji?'),
(57, 'Władcy Papierosów 6', 'qwefwesgawgerghqaeg', 'KGROZA', 1498013787, '1498013787.pdf', 'Film akcji'),
(58, 'Władcy Papierosów 8', 'reqgqegaer', 'KGROZA', 1498013844, '1498013844.pdf', 'Film akcji'),
(59, 'KAMIL', 'KAMIL', 'KGROZA', 1498014114, '1498014114.pdf', 'Film animowany'),
(60, 'KAMIL', 'KAMIL', 'KGROZA', 1498014298, '1498014298.pdf', 'Film animowany');

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
(23, 'Alvatarez', '505d74e947f7f0deb2bd6b38fc0aac32885604a39973a16a1fb442f61599ce6c4d5063c0297511e6891cd1150107e8536058df47d7eadafdb68d1eed4c1f547a', 'Maciej', 'Chwil', 'alv@wp.pl', 'autor dialogów', '', '');

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
