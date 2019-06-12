-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 12 Haz 2019, 09:01:52
-- Sunucu sürümü: 5.7.15-log
-- PHP Sürümü: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecommercial`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `basketid` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `stuff` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`basketid`, `id`, `username`, `stuff`, `due_date`, `quantity`) VALUES
(82, '1', 'Eray', 'https://m.media-amazon.com/images/I/81nVzZPgN+L._AC_SX255_.jpg', '2019-06-04', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stuffs`
--

CREATE TABLE `stuffs` (
  `Name` varchar(1000) NOT NULL,
  `Price` int(100) NOT NULL,
  `Picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stuffs`
--

INSERT INTO `stuffs` (`Name`, `Price`, `Picture`) VALUES
('SWEATSHIRT', 56, 'https://m.media-amazon.com/images/I/81nVzZPgN+L._AC_SX255_.jpg'),
('SWEATSHIRT2', 69, 'https://cdn-gap.akinon.net/products/2019/03/01/112377/6c6043a8-ba38-45f4-ac10-d4274e931c60_size720x960_cropCenter.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `Personid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Card` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Pasword` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`Personid`, `username`, `Surname`, `Telephone`, `Card`, `Address`, `Pasword`, `Email`, `gender`, `pic`) VALUES
(1, 'Eray', 'Dura', '0538555466', '352589878895456', 'kakakaka, İzmir/Bornova, İzmir/Bornova\r\nİzmir/Bornova', 'manisa45', 'eraydura@hotmail.com', 'male', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSbqmGLbjIEEKE_lcqjBuv-H4PoxDZ3jlx6xgPE_XibYDvGkq0qw'),
(3, 'hdhdhd', 'ksksk', '554654685', '555458522552', 'Flamingo Apt.\r\nizmir/Bornova', 'manisa45', 'eray.dura8@gmail.com', 'male', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basketid`);

--
-- Tablo için indeksler `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`Name`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Personid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `basketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `Personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
