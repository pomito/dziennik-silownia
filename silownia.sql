-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Cze 2019, 21:03
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `silownia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `analiza`
--

CREATE TABLE `analiza` (
  `ID_Analizy_skladu_ciala` int(11) NOT NULL,
  `Masa_ciala` double NOT NULL,
  `Tluszcz` double NOT NULL,
  `BMI` double NOT NULL,
  `Metabolic_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `analiza`
--

INSERT INTO `analiza` (`ID_Analizy_skladu_ciala`, `Masa_ciala`, `Tluszcz`, `BMI`, `Metabolic_age`) VALUES
(1, 75, 15, 22, 17),
(2, 55, 13, 21, 16),
(5, 120, 23, 27, 33),
(6, 93, 14, 25, 25);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czaszajec`
--

CREATE TABLE `czaszajec` (
  `ID_Czasu_zajec` int(10) NOT NULL,
  `Rozpoczecie` datetime NOT NULL,
  `Zakonczenie` datetime NOT NULL,
  `ID_Podopiecznego` int(10) NOT NULL,
  `ID_Treningu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czaszajec`
--

INSERT INTO `czaszajec` (`ID_Czasu_zajec`, `Rozpoczecie`, `Zakonczenie`, `ID_Podopiecznego`, `ID_Treningu`) VALUES
(29, '2018-12-12 10:10:00', '2019-02-05 12:10:00', 3, 5),
(30, '2019-01-20 11:11:00', '2019-03-02 10:10:00', 24, 5),
(31, '2019-05-01 12:00:00', '2019-06-02 13:00:00', 33, 1),
(32, '2019-04-13 13:13:00', '2019-05-13 12:02:00', 25, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podopieczni`
--

CREATE TABLE `podopieczni` (
  `ID_Podopiecznego` int(10) NOT NULL,
  `Imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Adres_zamieszkania` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Numer_telefonu` int(9) NOT NULL,
  `Email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ID_Pracownika` int(10) NOT NULL,
  `ID_Zajec` int(10) NOT NULL,
  `ID_Analizy_skladu_ciala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `podopieczni`
--

INSERT INTO `podopieczni` (`ID_Podopiecznego`, `Imie`, `Nazwisko`, `Data_urodzenia`, `Adres_zamieszkania`, `Numer_telefonu`, `Email`, `Haslo`, `ID_Pracownika`, `ID_Zajec`, `ID_Analizy_skladu_ciala`) VALUES
(3, 'Marcin', 'Kremer', '1999-05-03', 'Kolista 1, Katowice', 123123333, 'mkremer@gmail.com', '$2y$10$rr265tsa.2JPBkCRoLCQe.S/e8gglIKjHYX1XJDHiYHY/SdM0YNRm', 3, 5, 6),
(17, 'Wiktoria', 'Czerwiec', '1999-09-09', 'Wesoła 3, Kraków', 908765321, 'wiki@gmail.com', '$2y$10$LWDMULqzSEGtzAbv.5uXwO0', 52, 5, 6),
(24, 'Tomek', 'Atomek', '2002-02-09', 'Radosna 13, Katowice', 908767543, 'tomek@gmail.com', '$2y$10$.Pd8PcKRjahQlnm1DKLMVu3.uKv0W322jC3Cq5oiHwJX08hyhlekG', 3, 5, 6),
(25, 'Natalia', 'Wołoszyn', '2001-08-02', 'Trytytki 3, Wrocław', 123456789, 'natalia@gmail.com', '$2y$10$P5EhJ5eulmzQR7pDxm/CWuMdS0Wpf2j22pcSQI1I4Se2Z4JhLMkU2', 60, 5, 6),
(26, 'Marta', 'Nowak', '1996-09-03', 'Radosna 33, Mała Wieś', 123432189, 'marta@gmail.com', '$2y$10$ig4gMn487/sduQGR.Lv0FubBeO1kZI3WevFRJSlgHBEK1X9hImD5e', 60, 5, 5),
(33, 'Wiktor', 'Grados', '1999-12-12', 'Radosna 3, Kraków', 123123123, 'wiktor@gmail.com', '$2y$10$CDWJCJVCGrA/dCm5j83zyuqNHEyBEns2IfqZ.KrTc7sfpNCDIdAmm', 52, 1, 1),
(34, 'Robert', 'Saganowski', '1998-12-12', 'Wojciecha 12, Katowice', 123123123, 'robert@gmail.com', '$2y$10$xXhBkj07dcYbUmQiYuvbdO9jujWYVpm/JRhRpN5/xQERhD7VfAkNm', 1, 5, 6),
(35, 'Ada', 'Skladek', '1999-10-12', 'Radosna 123, Tychy', 333221221, 'ada@gmail.com', '$2y$10$iYih3on1F5F.wIxliRzXQuHZy/vjdTmdwjxQIVP6O04og3/o2THvG', 1, 2, 2),
(36, 'Tomek', 'Migala', '1997-06-06', 'Otwarta 3, Mysłowice', 999111222, 'migala@gmail.com', '$2y$10$sHnIds9yHMjS4XYiv0.v4OwbUnkAbOJzpFIaAiG1T7JiD7jAn.czS', 3, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `ID_Pracownika` int(10) NOT NULL,
  `Imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Adres_zamieszkania` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Wlasciciel` tinyint(4) NOT NULL,
  `Email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`ID_Pracownika`, `Imie`, `Nazwisko`, `Data_urodzenia`, `Adres_zamieszkania`, `Wlasciciel`, `Email`, `Haslo`) VALUES
(1, 'Sebastian', 'Pomikło', '1997-01-01', 'Kolista 23, Katowice', 1, 'spomiklo@gmail.com', '$2y$10$kP/EU0Fp9m2jGf/xqFXOt.H6VgO6AiGauLMFCiqMkcAC0n9NV0doy'),
(3, 'Adam ', 'Niedzwiedz', '1980-03-03', 'Wojciecha 3, Radom', 0, 'anie@gmail.com', '$2y$10$nv2Z4AVybk3HgK3eo1abWO11AyeiK98G61w3B1xiPslTwVZ5sstti'),
(52, 'Bartosz', 'Roszer', '1998-01-09', 'Nowy Świat 23, Tarnów', 0, 'roszer@gmail.com', '$2y$10$ltg.ThrwAzKKp8yLE8TCceeXllzjcHGTJpLrOqg9QNowWvp131gDy'),
(60, 'Wojtek', 'Wolny', '2000-02-02', 'Radosna 44, Mysłowice', 0, 'wojtek@gmail.com', '$2y$10$hmg77ygNq6zf1dibeiv7fuXcLAgd1UEAWZgbsQtnXWGvhcYMQ3FXK'),
(67, 'Bartek', 'Lengling', '1997-12-12', 'Adama 312, Katowice', 0, 'lengling@gmail.com', '$2y$10$WQgLZN.pig0JJOSy/TX4RetUYRww9Rt8QQzvPpgHtZ.V8BqeVBXYW');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trening`
--

CREATE TABLE `trening` (
  `ID_Treningu` int(11) NOT NULL,
  `ID_Zajec` int(11) NOT NULL,
  `Typ_treningu` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `Sprzet` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Korzysci` text COLLATE utf8_polish_ci NOT NULL,
  `Czas_trwania` int(3) NOT NULL,
  `Ilosc_spalonych_kalorii` int(4) NOT NULL,
  `Poziom` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trening`
--

INSERT INTO `trening` (`ID_Treningu`, `ID_Zajec`, `Typ_treningu`, `Sprzet`, `Korzysci`, `Czas_trwania`, `Ilosc_spalonych_kalorii`, `Poziom`) VALUES
(1, 1, 'ABT - Trening zaczyna się rozgrzewką, podczas której może być wykorzystany step. Zajęcia ukierunkowane na wzmacnianie brzucha, ujędrnienie pośladków oraz wyszczuplenie ud. Na zakończenie treningu przewidziany jest kilkuminutowy stretching.', 'hantle, gumy, step, easy ball, piłka gimnastyczna, berety', 'ujędrnienie i wzmocnienie dolnych partii ciała oraz brzucha', 60, 400, 'Początkujący'),
(2, 2, 'Zdrowy kręgosłup - Trening to profilaktyka i terapia bólów narządów ruchu. Podczas zajęć wykonywane są specjalistyczne ćwiczenia z wykorzystaniem technik terapeutycznych.', 'rollery, piłki gimnastyczne, easy ball', 'minimalizacja skutków przeciążeń narządów ruchu, uelastycznienie mięśni, zmniejszenie napięć, poprawa stabilizacji kręgosłupa i stawów obwodowych', 60, 200, 'Początkujący'),
(5, 5, 'Aeroboxing - Trening aerobowy charakteryzujący się wysoką intensywnością. To połączenie elementów zaczerpniętych z boksu, kickboxingu i fitnessu. Charakteryzuje się dużą dynamiką i precyzją każdego ruchu. Pozwala maksymalnie spożytkować nagromadzoną w nas energię. Jest to doskonały sposób na odreagowanie stresu.', 'hantle', 'poprawa wytrzymałości siłowej, kondycji, siły dynamicznej, szybkości, równowagi oraz koordynacji ruchowej.', 60, 740, 'Początkujący');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `ID_Zajec` int(10) NOT NULL,
  `Rodzaj_zajec` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `Opis` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`ID_Zajec`, `Rodzaj_zajec`, `Opis`) VALUES
(1, 'Wzmacnianie', 'To zajęcia kształtujące całą sylwetkę, pomagają zwiększyć siłę mięśniową i wytrzymałość. W trakcie treningu może być wykorzystywany różnego rodzaju sprzęt: hantle, obciążenia na kostki, gumy i piłki.'),
(2, 'Prozdrowotne', 'Świadomość własnego ciała, pomogą odprężyć się i wyregulować oddech. Są skierowane także do osób, które odczuwają ograniczoną ruchomość lub ból mięśni czy stawów. Redukują przeciążenia i bolesność układu ruchu, poprawiają koordynację.'),
(5, 'Spalanie tkanki tłuszczowej', 'Niezwykle efektowne treningi, pozwalające spalić tkankę tłuszczową i przyspieszyć metabolizm. Nieskomplikowane układy oparte na podstawowych krokach aerobiku, utrzymane są na poziomie średniej intensywności.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `analiza`
--
ALTER TABLE `analiza`
  ADD PRIMARY KEY (`ID_Analizy_skladu_ciala`);

--
-- Indeksy dla tabeli `czaszajec`
--
ALTER TABLE `czaszajec`
  ADD PRIMARY KEY (`ID_Czasu_zajec`),
  ADD KEY `ID_Pracownika` (`ID_Podopiecznego`,`ID_Treningu`),
  ADD KEY `ID_Treningu` (`ID_Treningu`);

--
-- Indeksy dla tabeli `podopieczni`
--
ALTER TABLE `podopieczni`
  ADD PRIMARY KEY (`ID_Podopiecznego`),
  ADD KEY `ID_Pracownika` (`ID_Pracownika`),
  ADD KEY `ID_Planu_treningowego` (`ID_Zajec`,`ID_Analizy_skladu_ciala`),
  ADD KEY `ID_Analizy_skladu_ciala` (`ID_Analizy_skladu_ciala`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`ID_Pracownika`);

--
-- Indeksy dla tabeli `trening`
--
ALTER TABLE `trening`
  ADD PRIMARY KEY (`ID_Treningu`),
  ADD KEY `ID_Zajec` (`ID_Zajec`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`ID_Zajec`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `analiza`
--
ALTER TABLE `analiza`
  MODIFY `ID_Analizy_skladu_ciala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `czaszajec`
--
ALTER TABLE `czaszajec`
  MODIFY `ID_Czasu_zajec` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `podopieczni`
--
ALTER TABLE `podopieczni`
  MODIFY `ID_Podopiecznego` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `ID_Pracownika` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT dla tabeli `trening`
--
ALTER TABLE `trening`
  MODIFY `ID_Treningu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `ID_Zajec` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `czaszajec`
--
ALTER TABLE `czaszajec`
  ADD CONSTRAINT `czaszajec_ibfk_1` FOREIGN KEY (`ID_Podopiecznego`) REFERENCES `podopieczni` (`ID_Podopiecznego`),
  ADD CONSTRAINT `czaszajec_ibfk_3` FOREIGN KEY (`ID_Treningu`) REFERENCES `trening` (`ID_Treningu`);

--
-- Ograniczenia dla tabeli `podopieczni`
--
ALTER TABLE `podopieczni`
  ADD CONSTRAINT `podopieczni_ibfk_1` FOREIGN KEY (`ID_Pracownika`) REFERENCES `pracownicy` (`ID_Pracownika`),
  ADD CONSTRAINT `podopieczni_ibfk_2` FOREIGN KEY (`ID_Analizy_skladu_ciala`) REFERENCES `analiza` (`ID_Analizy_skladu_ciala`),
  ADD CONSTRAINT `podopieczni_ibfk_3` FOREIGN KEY (`ID_Zajec`) REFERENCES `zajecia` (`ID_Zajec`);

--
-- Ograniczenia dla tabeli `trening`
--
ALTER TABLE `trening`
  ADD CONSTRAINT `trening_ibfk_1` FOREIGN KEY (`ID_Zajec`) REFERENCES `zajecia` (`ID_Zajec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
