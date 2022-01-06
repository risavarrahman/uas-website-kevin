-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 01:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'kevin', 'kevin@gmail.com', 'kevin123'),
('A002', 'Rian', 'rian@gmail.com', 'd93591bdf7860e1e4ee2fca799911215'),
('A003', 'admin', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` int(4) NOT NULL,
  `areaKODE` varchar(50) NOT NULL,
  `areaNAMA` char(35) NOT NULL,
  `areaWILAYAH` char(35) NOT NULL,
  `areaKET` varchar(255) NOT NULL,
  `provinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areaKODE`, `areaNAMA`, `areaWILAYAH`, `areaKET`, `provinsiID`) VALUES
(1, 'AR01', 'Puncak', 'Puncak', 'Tempat Ngadem gan', '4'),
(2, 'AR02', 'Tretes', 'Pandaan', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', '1'),
(3, 'AR01', 'Puncak Bandung', 'Puncak Bandung', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', '3'),
(4, 'AR03', 'Puncak Bandung', 'Puncak', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', '3'),
(5, 'AR03', 'Puncak Bandung', 'Puncak', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', '3'),
(6, 'AR04', 'Malang', 'Malang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` int(5) NOT NULL,
  `destinasiKODE` varchar(50) NOT NULL,
  `destinasiNAMA` varchar(35) NOT NULL,
  `destinasiALAMAT` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasiKODE`, `destinasiNAMA`, `destinasiALAMAT`, `kategoriID`, `areaID`) VALUES
(1, 'WS01', 'Pantai Kukup', 'Jl Pantai Selatan Jawa', '3', '2'),
(2, 'WS01', 'Pantai Kukup', 'Jl Pantai Selatan Jawa', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventKODE` varchar(50) NOT NULL,
  `eventNAMA` varchar(255) NOT NULL,
  `kabupatenID` int(11) NOT NULL,
  `eventKET` text NOT NULL,
  `eventMULAI` date NOT NULL,
  `eventSELESAI` date NOT NULL,
  `eventPOSTER` varchar(150) NOT NULL,
  `eventSUMBER` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventKODE`, `eventNAMA`, `kabupatenID`, `eventKET`, `eventMULAI`, `eventSELESAI`, `eventPOSTER`, `eventSUMBER`) VALUES
(1, 'EV01', 'Pekan Raya 210 Tahun Kota Bandung', 4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, debitis incidunt saepe at inventore sequi perferendis error architecto labore sint deleniti numquam, quos nam, distinctio sapiente! Itaque ullam fugit repellendus vel nihil ratione enim?', '2021-11-30', '2021-12-05', 'bandung-1.jpg', 'Kota Bandung'),
(2, 'EV02', 'HUT Ke-264 DIY Jogjakarta', 5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, debitis incidunt saepe at inventore sequi perferendis error architecto labore sint deleniti numquam, quos nam, distinctio sapiente! Itaque ullam fugit repellendus vel nihil ratione enim fugiat suscipit eius, dolores, ipsum animi?', '2021-12-06', '2021-12-12', 'jogja-1.jpg', 'DIY Jogjakarta');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` int(5) NOT NULL,
  `fotoKODE` varchar(50) NOT NULL,
  `fotoNAMA` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotoKODE`, `fotoNAMA`, `destinasiID`, `fotofile`) VALUES
(1, 'F001', 'Red', '1', 'red.jpg'),
(2, 'F002', 'black', '2', 'black.jpg'),
(3, 'F003', 'orange', '1', 'orange.jpg'),
(4, 'F004', 'green', '1', 'green.jpg'),
(5, 'F005', 'lime', '1', 'lime.jpg'),
(6, 'F006', 'yellow', '1', 'yellow.jpg'),
(7, 'F007', 'white', '1', 'white.jpg'),
(8, 'F008', 'brown', '1', 'brown.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenID` int(11) NOT NULL,
  `provinsiID` int(11) NOT NULL,
  `kabupatenNAMA` varchar(120) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenID`, `provinsiID`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`) VALUES
(1, 1, 'Malang', 'Malang', 'Kota Apel Malang'),
(2, 1, 'Sidoarjo', 'Sidoarjo', 'Kota Kerupuk Udang'),
(3, 5, 'Kota Semarang', 'Kota Semarang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.'),
(4, 3, 'Bandung', 'Bandung', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.'),
(5, 2, 'DIY Yogyakarta', 'DIY Yogyakarta', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, debitis incidunt saepe at inventore sequi perferendis error architecto labore sint deleniti numquam,');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` int(4) NOT NULL,
  `kategoriKODE` varchar(50) NOT NULL,
  `kategoriNAMA` char(30) NOT NULL,
  `kategoriKET` varchar(255) NOT NULL,
  `kategoriREF` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREF`) VALUES
(1, 'KW01', 'Alam', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', 'Buku Wisata'),
(2, 'KW02', 'Budaya', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', 'Buku Sejarah'),
(3, 'KW03', 'Pantai', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', 'Buku Wisata'),
(4, 'KW04', 'Religi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.', 'Buku Agama');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` int(11) NOT NULL,
  `provinsiKODE` varchar(50) NOT NULL,
  `provinsiNAMA` varchar(255) NOT NULL,
  `provinsiALAMAT` varchar(255) NOT NULL,
  `provinsiKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsiKODE`, `provinsiNAMA`, `provinsiALAMAT`, `provinsiKET`) VALUES
(1, 'PR01', 'Jawa Timur', 'Jawa Timur', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.'),
(2, 'PR02', 'Yogyakarta', 'Yogyakarta Kota Istimewa', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.'),
(3, 'PR03', 'Jawa Barat', 'Bandung', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.'),
(5, 'PR04', 'Jawa Tengah', 'Jawa Tengah', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nisi eum natus nemo enim. Sequi pariatur odit saepe aliquam repellat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `areaID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `destinasiID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  MODIFY `fotoID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `kabupatenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
