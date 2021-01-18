-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 07:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_acel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$suYjP5TvJvnDz.c6n/zy9uhj6D3T1.frfl8dD9TdWBhrHujz.i58m');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `polygon` mediumtext NOT NULL,
  `warna_poli` varchar(200) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `latitude`, `longitude`, `polygon`, `warna_poli`, `gambar`) VALUES
(6, 'PASSO', '-3.6017823003352523', '128.24212581148555', ' [[{\"lat\":-3.614796509168917,\"lng\":128.28871226480638},{\"lat\":-3.5894528782083994,\"lng\":128.27498211925743},{\"lat\":-3.545654989097558,\"lng\":128.24273172231696},{\"lat\":-3.597672511487426,\"lng\":128.22349407344873},{\"lat\":-3.6195911706483255,\"lng\":128.21456947884192},{\"lat\":-3.632605123770177,\"lng\":128.22212105889386},{\"lat\":-3.627125587394822,\"lng\":128.23447818988794},{\"lat\":-3.6367147542215967,\"lng\":128.24134326266244},{\"lat\":-3.653153088467753,\"lng\":128.22761311711346},{\"lat\":-3.666166556267557,\"lng\":128.24408929177224},{\"lat\":-3.6634268945517907,\"lng\":128.27017656831526},{\"lat\":-3.6620570605481992,\"lng\":128.2859662356966},{\"lat\":-3.649728460285861,\"lng\":128.28390671386424},{\"lat\":-3.6401394319539735,\"lng\":128.26811704648296},{\"lat\":-3.632605123770177,\"lng\":128.2578194373212},{\"lat\":-3.621646017800367,\"lng\":128.25713293004372},{\"lat\":-3.6154814623615064,\"lng\":128.27017656831526},{\"lat\":-3.6168513671943714,\"lng\":128.27978767019957}]]', '#8c0d0d', '2031465535-IMG_20200803_065814.jpg'),
(8, 'JAZIRAH LEHITU', '-3.6250707526870825', '128.06852272515565', '[{\"lat\":-3.5319107755825128,\"lng\":128.2140430323966},{\"lat\":-3.549721003069082,\"lng\":128.23051743737904},{\"lat\":-3.593560096353134,\"lng\":128.20923799761007},{\"lat\":-3.640821758322419,\"lng\":128.1145101689613},{\"lat\":-3.613423993537221,\"lng\":128.08156135899642},{\"lat\":-3.6387669548014046,\"lng\":128.06920555525963},{\"lat\":-3.6620544529941705,\"lng\":128.0190959067715},{\"lat\":-3.6387669548014046,\"lng\":128.00742653657562},{\"lat\":-3.6435614890560433,\"lng\":127.98614709680669},{\"lat\":-3.6298627520906432,\"lng\":127.98751996388853},{\"lat\":-3.611369127747918,\"lng\":128.01085870428025},{\"lat\":-3.593560096353134,\"lng\":128.02664667572174},{\"lat\":-3.593560096353134,\"lng\":128.0417482136223},{\"lat\":-3.588765297661823,\"lng\":128.05341758381815},{\"lat\":-3.5921901564397687,\"lng\":128.07401059004616},{\"lat\":-3.5853404260441306,\"lng\":128.08773926086488},{\"lat\":-3.5867103762312094,\"lng\":128.10215436522444},{\"lat\":-3.586025401394258,\"lng\":128.117255903125},{\"lat\":-3.5846554501809287,\"lng\":128.13235744102553},{\"lat\":-3.5867103762312094,\"lng\":128.13922177643485},{\"lat\":-3.5880803243650616,\"lng\":128.15295044725355},{\"lat\":-3.5867103762312094,\"lng\":128.16805198515405},{\"lat\":-3.577805663349554,\"lng\":128.17903492180898},{\"lat\":-3.5668458979580517,\"lng\":128.18246708951366},{\"lat\":-3.5469809903815235,\"lng\":128.19550932679138}]', '#380a0a', '830664549-IMG-20191205-WA0062.jpg'),
(9, 'SOYA', '-3.7038389843597503', '128.21154866975465', '[{\"lat\":-3.681237478935347,\"lng\":128.20468433434533},{\"lat\":-3.70657852162704,\"lng\":128.1878667125925},{\"lat\":-3.7185638973157094,\"lng\":128.1909556635267},{\"lat\":-3.7185638973157094,\"lng\":128.2122351032956},{\"lat\":-3.705893638105506,\"lng\":128.23488741014643},{\"lat\":-3.69116851429732,\"lng\":128.2331713262941},{\"lat\":-3.680552575859139,\"lng\":128.2328281095236},{\"lat\":-3.679525220257386,\"lng\":128.21841300516402}]', '#5a0707', '179156651-IMG-20200715-WA0015.jpg'),
(11, 'BARU', '-3.678494930026732', '128.06028552266443', '[{\"lat\":-3.6305503015254663,\"lng\":128.0801920953515},{\"lat\":-3.678494930026732,\"lng\":128.1042172692842},{\"lat\":-3.6956173883182553,\"lng\":128.06509055745096},{\"lat\":-3.686713751156502,\"lng\":128.02253167791307},{\"lat\":-3.6408243659381503,\"lng\":128.04861615246855},{\"lat\":-3.649728460285861,\"lng\":128.0616583897463},{\"lat\":-3.6346599413364316,\"lng\":128.06234482328725}]', '#540d0d', '29312586-IMG-20200715-WA0015.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `info_desa`
--

CREATE TABLE `info_desa` (
  `id_info` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `luas_wilayah` varchar(200) NOT NULL,
  `jumlah_pend` varchar(200) NOT NULL,
  `info_lengkap` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_desa`
--

INSERT INTO `info_desa` (`id_info`, `id_desa`, `luas_wilayah`, `jumlah_pend`, `info_lengkap`) VALUES
(5, 6, '20000', '1233', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?'),
(6, 8, '900000', '12000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?'),
(7, 9, '5000', '5000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. \r\nAnimi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita asperiores tempore eligendi, distinctio, dolorum ad enim quis alias optio dicta possimus a eveniet debitis nostrum tenetur ea sunt. Animi?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `info_desa`
--
ALTER TABLE `info_desa`
  ADD PRIMARY KEY (`id_info`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `info_desa`
--
ALTER TABLE `info_desa`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
