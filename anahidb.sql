-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 05:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anahidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladvisoryclass`
--

CREATE TABLE `tbladvisoryclass` (
  `tbladvisoryclassid` int(11) NOT NULL,
  `trn` char(12) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `term` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladvisoryclass`
--

INSERT INTO `tbladvisoryclass` (`tbladvisoryclassid`, `trn`, `grade`, `section`, `sy`, `term`) VALUES
(6, 'test', '12', 'ICT-C', '2018-2019', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollmentjhs`
--

CREATE TABLE `tblenrollmentjhs` (
  `enrollmentid` int(11) NOT NULL,
  `trn` char(12) DEFAULT NULL,
  `grade` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `sy` varchar(100) NOT NULL,
  `dateenrolled` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lrn` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollmentshs`
--

CREATE TABLE `tblenrollmentshs` (
  `enrollmentid` int(11) NOT NULL,
  `lrn` char(12) NOT NULL,
  `trn` char(12) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `dateenrolled` datetime DEFAULT CURRENT_TIMESTAMP,
  `term` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenrollmentshs`
--

INSERT INTO `tblenrollmentshs` (`enrollmentid`, `lrn`, `trn`, `grade`, `section`, `sy`, `dateenrolled`, `term`) VALUES
(30, '109313060007', 'test', '11', 'ICT-C', '2017-2018', '2019-02-18 21:40:35', 'Second'),
(31, '109307060010', 'test', '11', 'ICT-C', '2017-2018', '2019-02-18 21:40:35', 'Second'),
(32, '109313060010', 'test', '11', 'ICT-C', '2017-2018', '2019-02-18 21:40:35', 'Second'),
(33, '109307060019', 'test', '11', 'ICT-C', '2017-2018', '2019-02-18 21:40:35', 'Second'),
(34, '109313060012', 'test', '11', 'ICT-C', '2017-2018', '2019-02-18 21:40:35', 'Second'),
(57, '109313060007', 'test', '12', 'ICT-C', '2018-2019', '2019-02-19 10:38:21', 'Second'),
(58, '109307060010', 'test', '12', 'ICT-C', '2018-2019', '2019-02-19 10:38:21', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblgradesshs`
--

CREATE TABLE `tblgradesshs` (
  `tblgradeid` int(11) NOT NULL,
  `lrn` char(12) NOT NULL,
  `subjectcode` char(12) NOT NULL,
  `mid` varchar(3) DEFAULT NULL,
  `final` varchar(3) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `grade` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `sy` varchar(100) NOT NULL,
  `schedid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgradesshs`
--

INSERT INTO `tblgradesshs` (`tblgradeid`, `lrn`, `subjectcode`, `mid`, `final`, `remarks`, `grade`, `section`, `term`, `sy`, `schedid`) VALUES
(88, '109313060007', 'BCAL', '90', '90', 'Passed', '12', 'ICT-C', 'Second', '2018-2019', 89),
(89, '109313060007', 'APEC', NULL, NULL, NULL, '12', 'ICT-C', 'Second', '2018-2019', 90),
(90, '109307060010', 'BCAL', NULL, NULL, NULL, '12', 'ICT-C', 'Second', '2018-2019', 91),
(91, '109307060010', 'APEC', NULL, NULL, NULL, '12', 'ICT-C', 'Second', '2018-2019', 92);

-- --------------------------------------------------------

--
-- Table structure for table `tblschedjhs`
--

CREATE TABLE `tblschedjhs` (
  `schedid` int(11) NOT NULL,
  `enrollmentid` int(11) NOT NULL,
  `subjectcode` char(12) NOT NULL,
  `trn` char(12) NOT NULL,
  `mon` time DEFAULT NULL,
  `tue` time DEFAULT NULL,
  `wed` time DEFAULT NULL,
  `thu` time DEFAULT NULL,
  `fri` time DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedshs`
--

CREATE TABLE `tblschedshs` (
  `schedid` int(11) NOT NULL,
  `lrn` char(12) NOT NULL,
  `subjectcode` char(12) NOT NULL,
  `trn` char(12) NOT NULL,
  `mon` tinyint(1) DEFAULT NULL,
  `tue` tinyint(1) DEFAULT NULL,
  `wed` tinyint(1) DEFAULT NULL,
  `thu` tinyint(1) DEFAULT NULL,
  `fri` tinyint(1) DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `term` varchar(100) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `sy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschedshs`
--

INSERT INTO `tblschedshs` (`schedid`, `lrn`, `subjectcode`, `trn`, `mon`, `tue`, `wed`, `thu`, `fri`, `starttime`, `endtime`, `term`, `grade`, `section`, `sy`) VALUES
(89, '109313060007', 'BCAL', 'test', 1, 1, 1, 1, 0, '13:00:00', '14:00:00', 'Second', '12', 'ICT-C', '2018-2019'),
(90, '109313060007', 'APEC', 'teacher1', 1, 1, 0, 0, 0, '13:00:00', '14:00:00', 'Second', '12', 'ICT-C', '2018-2019'),
(91, '109307060010', 'BCAL', 'test', 1, 1, 1, 1, 0, '13:00:00', '14:00:00', 'Second', '12', 'ICT-C', '2018-2019'),
(92, '109307060010', 'APEC', 'teacher1', 1, 1, 0, 0, 0, '13:00:00', '14:00:00', 'Second', '12', 'ICT-C', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tblscheduletemplateshs`
--

CREATE TABLE `tblscheduletemplateshs` (
  `schedtempid` int(11) NOT NULL,
  `subjectcode` char(12) NOT NULL,
  `trn` char(12) NOT NULL,
  `grade` varchar(150) NOT NULL,
  `section` varchar(150) NOT NULL,
  `m` tinyint(1) DEFAULT NULL,
  `t` tinyint(1) DEFAULT NULL,
  `w` tinyint(1) DEFAULT NULL,
  `th` tinyint(1) DEFAULT NULL,
  `f` tinyint(1) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) DEFAULT NULL,
  `term` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblscheduletemplateshs`
--

INSERT INTO `tblscheduletemplateshs` (`schedtempid`, `subjectcode`, `trn`, `grade`, `section`, `m`, `t`, `w`, `th`, `f`, `starttime`, `endtime`, `term`) VALUES
(21, 'BCAL', 'test', '12', 'ICT-C', 1, 1, 1, 1, 0, '13:00', '14:00', 'Second'),
(22, 'APEC', 'teacher1', '12', 'ICT-C', 1, 1, 0, 0, 0, '13:00', '14:00', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `birthdate` date NOT NULL,
  `mothertongue` varchar(100) DEFAULT NULL,
  `ethnicgroup` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `homeaddress` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `foccupation` varchar(150) DEFAULT NULL,
  `fcontact` char(11) DEFAULT NULL,
  `mothername` varchar(255) NOT NULL,
  `moccupation` varchar(150) DEFAULT NULL,
  `mcontact` char(11) DEFAULT NULL,
  `guardianname` varchar(255) DEFAULT NULL,
  `gcontact` char(11) DEFAULT NULL,
  `grelationship` varchar(100) DEFAULT NULL,
  `contactnumber` char(12) DEFAULT NULL,
  `municipality` varchar(150) NOT NULL,
  `tblstudentid` int(11) NOT NULL,
  `lrn` char(12) NOT NULL,
  `profileimagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`firstname`, `middlename`, `lastname`, `sex`, `birthdate`, `mothertongue`, `ethnicgroup`, `religion`, `homeaddress`, `barangay`, `province`, `fathername`, `foccupation`, `fcontact`, `mothername`, `moccupation`, `mcontact`, `guardianname`, `gcontact`, `grelationship`, `contactnumber`, `municipality`, `tblstudentid`, `lrn`, `profileimagename`) VALUES
('Daniel', 'Sagales', 'Alvarez', 'Male', '2002-04-11', 'Filipino', '', 'Christian', '', 'San Vicente', 'Rizal', 'Danilo B. Alvarez', '', '', 'Dina A.Sagales', '', '', NULL, NULL, 'Parent', '', 'Angono', 124, '109307070023', ''),
('Michael Paul', 'Pelias', 'Araya', 'Male', '2001-08-28', 'Filipino', '', 'Christianity', '', 'San Roque', 'Rizal', 'Pedro Araya', '', '', 'Divina E. Sagala', '', '', NULL, NULL, 'Parent', '', 'Angono', 125, '109307070037', ''),
('Harley David', '', 'Ashton', 'Male', '1997-02-21', 'Filipino', '', 'Christianity', '', 'San Vicente', 'Rizal', 'David C. Ashton', '', '', 'Remedios Ross', '', '', NULL, NULL, 'Parent', '', 'Angono', 126, '109307070044', ''),
('John Paul', 'Santiago', 'Balangoy', 'Male', '2002-03-13', 'Filipino', '', 'Christianity', '', 'San Vicente', 'Rizal', 'Danilo G. Balangoy', '', '', 'Rosa Milda Santiago', '', '', NULL, NULL, 'Parent', '', 'Angono', 127, '109315070017', ''),
('Edzel', 'Levilo', 'Barnido', 'Male', '1999-12-10', 'Filipino', '', 'Christianity', '', 'Bagumbayan', 'Rizal', 'Edgar S.Barnido', '', '', 'Mary Jane C. Livelo', '', '', NULL, NULL, 'Parent', '', 'Angono', 128, '109313070040', ''),
('Geamar', 'Galendez', 'Bautista', 'Male', '2001-10-17', 'Filipino', '', 'Christianity', '', 'San Roque', 'Rizal', 'Roger A. Bautista', '', '', 'Evangeline D. Galendez', '', '', NULL, NULL, 'Parent', '', 'Angono', 129, '109310070015', ''),
('Benjie', 'Tamba', 'Bibig', 'Male', '2000-12-02', '', '', 'Christianity', '', 'San Roque', 'Rizal', 'Bert Bibig', '', '', 'Vergie T. Bibig', '', '', NULL, NULL, 'Parent', '', 'Angono', 130, '467527150145', ''),
('Adriane Jeyk', 'Blanco', 'Blanco', 'Male', '2001-07-15', '', '', 'Christian', '', 'Poblacion Ibaba', 'Rizal', 'Roy D,C. Blanco', '', '', 'Ma. Myriam B. Blanco', '', '', NULL, NULL, 'Parent', '', 'Angono', 131, '109307070088', ''),
('Jayson ', 'Mananes', 'Blanco', 'Male', '2000-08-19', '', '', 'Christianity', '', 'San Vicente', 'Rizal', '', '', '', 'Shirley P. Mananes', '', '', NULL, NULL, 'Parent', '', 'Angono ', 132, '109315070034', ''),
('Kenyon Marcus', 'Diaz', 'Bona', 'Male', '2001-05-18', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Jemesteve P. Bona', '', '', 'Emilyne S. Diaz', '', '', NULL, NULL, 'Parent', '', 'Angono ', 133, '109313120569', ''),
('Brian Kaye', 'Cabalquinto', 'Bonita', 'Male', '2002-05-17', '', '', 'Christianity', '', 'Pag-asa', 'Rizal', 'Eduardo Bonita', '', '', 'Ross-ann J.Cabalquinto', '', '', NULL, NULL, 'Parent', '', 'Binangonan', 134, '109318070073', ''),
('Arvin Mike', 'Demayo', 'Borado', 'Male', '2000-08-08', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Ariel E. Borado', '', '', 'Monica D. Demayo', '', '', NULL, NULL, 'Parent', '', 'Angono', 135, '109313070058', ''),
('Christian', 'Alvarez', 'Brazil', 'Male', '2001-12-25', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Renato M. Brazil', '', '', 'Milante A. Rosy', '', '', NULL, NULL, 'Parent', '', 'Angono ', 136, '109307070100', ''),
('Calvin Klein', '', 'Broger', 'Male', '1999-11-27', '', '', 'Christianity', '', 'San Vicente', 'Rizal', '', '', '', 'Mary Claire B. Broger', '', '', NULL, NULL, 'Parent', '', 'Angono', 137, '109315070043', ''),
('John Rafael', 'Sanchez', 'Bullas', 'Male', '2002-03-16', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Rene B. Bullas', '', '', 'Rowena R. Sanchez', '', '', NULL, NULL, 'Parent', '', 'Angono', 138, '115636070106', ''),
('Jeremiah', 'Punzalan', 'Cancico', 'Male', '2000-09-04', '', '', 'Christianity', '', 'San Isidro', 'Rizal', '', '', '', 'Giselle Cancico', '', '', NULL, NULL, 'Parent', '', 'Taytay', 139, '109313060095', ''),
('Aeron Michael', 'Martinez', 'Casiño', 'Male', '2001-11-02', '', '', 'Christianity', '', 'Kalayaan ', 'Rizal', '', '', '', 'Josephine Martinez', '', '', NULL, NULL, 'Parent', '', 'Angono', 140, '109313070093', ''),
('Jen Israel ', 'Fatalla', 'Castro', 'Male', '2000-10-18', '', '', 'Others', '', 'San Isidro', 'Rizal', 'Jesus A. Castro', '', '', 'Manila A. Fatalla', '', '', NULL, NULL, 'Parent', '', 'Angono', 141, '109313070098', ''),
('Verni', 'Dales', 'Clautero', 'Male', '2001-10-01', '', '', 'Christianity', '', 'Bagumbayan', 'Rizal', 'William Clautero', '', '', 'Maricle M. Dalos', '', '', NULL, NULL, 'Parent', '', 'Angono', 160, '109307070147', ''),
('Carlito', 'Casupang', 'Collarga Jr.', 'Male', '1997-01-24', '', '', 'Christianity', '', 'San Vicente', 'Rizal', 'Carlito Collarga Sr.', '', '', 'Lourdes Calimlim Casupang', '', '', NULL, NULL, 'Parent', '', 'Angono ', 161, '109315060067', ''),
('Angelo', 'Cawili', 'Concepcion', 'Male', '1996-07-05', '', '', 'Christianity', '', 'San Pedro', 'Rizal', 'Fernando Cabangbang Concepcion Jr.', '', '', 'Trinidad Cawili', '', '', NULL, NULL, 'Parent', '', 'Angono ', 162, '109307120429', ''),
('Harold', 'Nicos', 'Daz', 'Male', '2001-04-25', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Herminaldo Solayao Daz', '', '', 'Haydee Gabales Nicos', '', '', NULL, NULL, 'Parent', '', 'Angono', 163, '10930707170', ''),
('Harrel', 'Nicos', 'Daz', 'Male', '2002-04-01', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Herminigeldo Solayao Daz', '', '', 'Haydee Gabales Nicos', '', '', NULL, NULL, 'Parent', '', 'Angono', 164, '10930707171', ''),
('Salvador', 'Roan', 'De Quiroz', 'Male', '2002-11-22', '', '', 'Christianity', '', 'Tagpos', 'Rizal', 'Ricky Florendo De Quiroz', '', '', 'Marilou De Roan Borja', '', '', NULL, NULL, 'Parent', '', 'Binangonan', 165, '109317070046', ''),
('Christian', 'Perote', 'Diaz', 'Male', '2000-12-06', '', '', 'Christianity', '', 'Santo Niño', 'Rizal', 'Eduardo Alvelda Diaz', '', '', 'Catalinta Elumba Perote', '', '', NULL, NULL, 'Parent', '', 'Angono', 166, '109315070099', ''),
('Ramancito', 'Will', 'Estonilo', 'Male', '1999-07-30', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Marlito Adisas Estonilo', '', '', 'Renalyn Marcelo Willy', '', '', NULL, NULL, 'Parent', '', 'Angono', 167, '109313070154', ''),
('Angelo ', 'Orillo', 'Fuentes', 'Male', '2001-10-22', '', '', 'Christianity', '', 'San Roque', 'Rizal', 'Hector Rivera Fuentes', '', '', 'Rosita Lansin Orillo', '', '', NULL, NULL, 'Parent', '', 'Angono', 168, '109307070238', ''),
('John Paul', 'Tamon', 'Garlitos', 'Male', '2000-06-22', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Gerardo Garlitos', '', '', 'Prexy Tamon', '', '', NULL, NULL, 'Parent', '', 'Angono', 169, '109313060189', ''),
('Erwin', 'Cajepe', 'Pantua', 'Male', '1999-12-03', '', '', 'Christianity', '', 'San Roque', 'Rizal', 'Eliseo Santos Pantua', '', '', 'Melchora Cajipe', '', '', NULL, NULL, 'Parent', '', 'Angono', 170, '109307090361', ''),
('Jan Marini Francois', 'Montevas', 'Raymundo', 'Male', '2002-06-27', '', '', 'Christianity', '', 'Santo Niño', 'Rizal', '', '', '', 'Mary Ann Monteras', '', '', NULL, NULL, 'Parent', '', 'Angono', 171, '402850150467', ''),
('John Antoine', 'Lozada', 'Reyes', 'Male', '2001-12-24', '', '', 'Christianity', '', 'San Pedro', 'Rizal', 'Antonio Reys', '', '', 'Malvo Reyes', '', '', NULL, NULL, 'Parent', '', 'Angono', 172, '109315070238', ''),
('Rocelyn', '', 'Bersano', 'Female', '2001-07-23', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Ronie Yubok Caham', '', '', 'Emelie Acosta Bersano', '', '', '', '', 'Parent', '', 'Angono', 225, '122097070007', ''),
('Wilma', 'Balbuena', 'Blanco', 'Female', '2000-03-06', '', '', 'Christianity', '', 'Poblacion Ibaba', 'Rizal', 'Wilson Blanco', '', '', 'Vilma Balbuena', '', '', NULL, NULL, 'Parent', '', 'Angono', 276, '109315070037', ''),
('John Russel', 'Gulap', 'AcuÃ±a', 'Male', '2000-11-28', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Elias,AcuÃ±a Rosin', '', '', 'Nieva,Erlinda Monilla', '', '', '', '', 'Parent', '', 'Angono', 277, '109313060007', '5c6c3081e7c9b3.41604967.jpg'),
('Mark John ', 'Ponto ', 'Acuyan', 'Male', '2001-06-10', '', '', 'Christianity', '', 'San Roque', 'Rizal', 'Acuyan,Marlon Natan', '', '', 'Ponto,Cresencia Sevillano', '', '', NULL, NULL, 'Parent', '', 'Angono', 278, '109307060010', ''),
('Harold', 'Cadag', 'Aguilar', 'Male', '2001-06-28', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Aguilar,Steve', '', '', 'Cadag,Josephine Delo Santos', '', '', NULL, NULL, 'Parent', '', 'Angono', 279, '109313060010', ''),
('Ian Benedict', 'Fabie', 'Aguinaldo', 'Male', '2000-03-28', '', '', 'Christianity', '', 'San Vicente', 'RIzal', 'Aguinaldo,Romeo Purisima', '', '', 'Fabie,Sonia VIchacino', '', '', NULL, NULL, 'Parent', '', 'Angono', 280, '109307060019', ''),
('Rolando', 'Dereje', 'Alberto', 'Male', '2001-02-27', '', '', 'Christianity', '', 'Pag-asa', 'Rizal', 'Alberto,Rolando Esguerra', '', '', 'Dereje, Jejusa De Castro', '', '', NULL, NULL, 'Parent', '', 'Binangonan', 281, '109313060012', ''),
('Jerico', 'Ables', 'Alim', 'Male', '2001-10-13', '', '', 'Christianity', '', 'San Pedro', 'Rizal', 'Nestor H. Alim', '', '', 'Ananbel S. Ables', '', '', NULL, NULL, 'Parent', '', 'Angono', 282, '109307060030', ''),
('Matt Reginald', 'Gervacio', 'Almadovar', 'Male', '2000-08-27', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Joel Q. Almadovar', '', '', 'Shiela D. Gervacio', '', '', NULL, NULL, 'Parent', '', 'Angono ', 283, '301417150058', ''),
('Bryan Ken', 'Sayson', 'Altes', 'Male', '2000-09-25', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Glenn A. Alcubilla', '', '', 'Cecilia P. Sayson', '', '', NULL, NULL, 'Parent', '', 'Angono', 284, '109313060015', ''),
('Charlie', 'Tagumfama', 'Amparado', 'Male', '2000-11-01', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Fernando Veras', '', '', 'Lorna Tagumfama Amparado', '', '', NULL, NULL, 'Parent', '', 'Angono', 285, '109307060041', ''),
('Rouel', 'San Jose ', 'Andrada', 'Male', '2000-02-15', '', '', 'Christianity', '', 'San Vivente ', 'Rizal', 'Rudel H. Andrada', '', '', 'Jocelyn B. San Jose', '', '', NULL, NULL, 'Parent', '', 'Angono ', 286, '109315060012', ''),
('Armand Francis', '', 'Balagtas', 'Male', '1999-02-06', '', '', 'Christianity', '', 'San Vicente', 'Rizal', '', '', '', 'Lorena E. Balagtas', '', '', NULL, NULL, 'Parent', '', 'Angono ', 287, '104636060019', ''),
('Ralph Jim Paul ', 'Arcilla', 'Bernal', 'Male', '2001-04-07', '', '', 'Christianity', '', 'San Isidro', 'Rizal', 'Florencio V. Bernal', '', '', 'Josie T. Arcilla', '', '', NULL, NULL, 'Parent', '', 'Angono', 288, '109307060099', ''),
('Timothy', 'Caigoy', 'Blanca', 'Male', '2001-09-01', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Ernesto B. Blanco', '', '', 'Lourdes D. Caigoy', '', '', NULL, NULL, 'Parent', '', 'Angono', 289, ' 10931306007', ''),
('John Ron ', 'Raquel', 'Buere', 'Male', '2001-06-21', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Rodel B. Buere', '', '', 'Rosario Godihes Raquel', '', '', NULL, NULL, 'Parent', '', 'Angono', 290, '109313060080', ''),
('Geronimo', 'Noriga', 'Bulandra Jr.', 'Male', '2001-07-12', '', '', 'Christianity', '', 'Kalayaan', 'Rizal', 'Geronimo T. Bulandra Sr.', '', '', 'Adelyn A. Noriga', '', '', NULL, NULL, 'Parent', '', 'Angono', 291, '1161506006', ''),
('Luisito ', 'Camacho', 'Cabillo', 'Male', '2000-12-12', '', '', 'Christianity', '', 'San Vicente', 'Rizal', 'Abundio N. Cabillo', '', '', 'Nora R. Camacho', '', '', NULL, NULL, 'Parent', '', 'Angono', 292, '109315060050', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subjectcode` char(12) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subjectcode`, `description`, `type`, `track`, `strand`, `subjectid`) VALUES
('KPWK', 'Komunikasyon at Pananaliksik sa Wika Kulturang Pilipino', 'Core', '', '', 22),
('PPTP', 'Pagbasa at Pagsuri ng Iba&#39;t Ibang Teksto Tungo sa Pananaliksik', 'Core', '', '', 23),
('21ST', '21st Century Literature from the Philippines and the World', 'Core', '', '', 24),
('CPAR', 'Contemporary Philippine Arts from the Regions', 'Core', '', '', 25),
('MAIL', 'Media and Information Literacy', 'Core', '', '', 26),
('GENM', 'General Mathematics', 'Core', '', '', 27),
('STAT', 'Statistics and Probability', 'Core', '', '', 28),
('PSCI', 'Physical Science', 'Core', '', '', 29),
('PDEV', 'Personal Development', 'Core', '', '', 30),
('UCSP', 'Understanding Culture, Society, and Politics', 'Core', '', '', 31),
('IPHP', 'Introduction to the Philosophy of the Human Person', 'Core', '', '', 32),
('PEAH', 'Physical Education and Health', 'Core', '', '', 33),
('ESCI', 'Earth Science', 'Core', '', '', 34),
('DRRR', 'Disaster Readiness and Risk Reduction', 'Core', '', '', 35),
('EAPP', 'English for Academic and Professional Purposes', 'Applied', '', '', 36),
('PRE1', 'Practical Research 1', 'Applied', '', '', 37),
('PRE2', 'Practical Research 2', 'Applied', '', '', 38),
('FILI', 'Filipino sa Piling Larangan(ISPORTS)', 'Applied', '', '', 39),
('FILA', 'Filipino sa Piling Larangan(AKADEMIK)', 'Applied', '', '', 40),
('FILS', 'Filipino sa Piling Larangan(SINING)', 'Applied', '', '', 41),
('FILT', 'Filipino sa Piling Larangan(TECH-VOC)', 'Applied', '', '', 42),
('EMPT', 'Empowerment Technologies', 'Applied', '', '', 43),
('ENTR', 'Entrepreneurship', 'Applied', '', '', 44),
('IIAI', 'Inquiries, Investigations, and Immersion', 'Applied', '', '', 45),
('BESR', 'Business Ethics and Social Responsibility', 'Specialized', 'ACADEMIC', 'ABM', 46),
('APEC', 'Applied Economic', 'Specialized', 'ACADEMIC', 'ABM', 47),
('ABM1', 'Fundamentals of Accountancy, Business and Management 1', 'Specialized', 'ACADEMIC', 'ABM', 48),
('ABM2', 'Fundamentals of Accountancy, Business and Management 2', 'Specialized', 'ACADEMIC', 'ABM', 49),
('BUMA', 'Business Math', 'Specialized', 'ACADEMIC', 'ABM', 50),
('PROG', 'Programming', 'Specialized', 'TECH-VOC', 'ICT', 51),
('CSSE', 'Computer System Servicing', 'Specialized', 'TECH-VOC', 'ICT', 52),
('CRWR', 'Creative Writing', 'Specialized', 'ACADEMIC', 'HUMSS', 53),
('WRBS', 'Introduction to World Religions and Belief Systems', 'Specialized', 'ACADEMIC', 'HUMSS', 54),
('CRNO', 'Creative Nonfiction', 'Specialized', 'ACADEMIC', 'HUMSS', 55),
('PCAL', 'Pre-Calculus', 'Specialized', 'ACADEMIC', 'STEM', 56),
('BCAL', 'Basic Calculus', 'Specialized', 'ACADEMIC', 'STEM', 57),
('BIO1', 'General Biology 1', 'Specialized', 'ACADEMIC', 'STEM', 58),
('BIO2', 'General Biology 2', 'Specialized', 'ACADEMIC', 'STEM', 59);

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `tblteacherid` int(11) NOT NULL,
  `trn` char(12) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `birthdate` date NOT NULL,
  `teacherposition` varchar(100) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `homeaddress` varchar(255) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `contactnumber` char(11) DEFAULT NULL,
  `profileimagename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`tblteacherid`, `trn`, `firstname`, `middlename`, `lastname`, `sex`, `birthdate`, `teacherposition`, `department`, `homeaddress`, `barangay`, `municipality`, `province`, `contactnumber`, `profileimagename`, `password`, `usertype`) VALUES
(1, 'admin', 'Admin ', 'Nehry', 'Dedoro', 'Male', '2019-01-01', 'Super User', 'Admin', 'ANHS', 'ANHS', 'ANHS', 'ANHS', '09166969923', '5c2c0da6a05a03.47697477.png', 'admin', 'admin'),
(7, 'test', 'Jerome', '', 'Santiago', 'Male', '2019-02-06', '', 'of Labor', '', '', '', '', '', '5c2492305e9480.36708286.jpg', 'admin', 'adviser'),
(8, '123456789012', 'Juana', 'Cruz', 'Dela Cruz', 'Female', '1985-02-05', 'Master Teacher 1', 'English', '32  Aguinaldo St.', 'Kalayaan', 'Angono', 'Rizal', '09123456789', '', 'admin', 'teacher'),
(9, '123456789013', 'Johny', 'Barbadillo', 'Bravo', 'Male', '2019-02-09', '70', '8989', '123123', '123123123123123', '123123', '123123', '', '', 'admin', 'teacher'),
(10, 'teacher1', 'Dante', '', 'Gulapa', 'Male', '2019-02-14', 'Dancer', 'Education', 'Bugbugan St.', 'Brgy. Hindi Makita', 'Makailag', 'Swerte', '', '5c6c1d47284ca0.72286165.jpg', 'admin', 'teacher'),
(11, 'teacher2', 'Jejomar', '', 'Binay', 'Male', '1942-11-11', 'Former Vice President of the Philippines', '', 'Bugbugan St.', 'Brgy. Hindi Makita', 'Makailag', 'Swerte', '', '5c6aaa74592903.43393520.jpg', 'admin', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `trn` char(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladvisoryclass`
--
ALTER TABLE `tbladvisoryclass`
  ADD PRIMARY KEY (`tbladvisoryclassid`),
  ADD KEY `fk_tbladvisoryclass` (`trn`);

--
-- Indexes for table `tblenrollmentjhs`
--
ALTER TABLE `tblenrollmentjhs`
  ADD PRIMARY KEY (`enrollmentid`),
  ADD KEY `fk_trntblenrollmentjhs` (`trn`),
  ADD KEY `fk_tblenrollmentjhs` (`lrn`);

--
-- Indexes for table `tblenrollmentshs`
--
ALTER TABLE `tblenrollmentshs`
  ADD PRIMARY KEY (`enrollmentid`),
  ADD KEY `fk_trntblenrollmentshs` (`trn`),
  ADD KEY `fk_tblenrollmentshslrn` (`lrn`);

--
-- Indexes for table `tblgradesshs`
--
ALTER TABLE `tblgradesshs`
  ADD PRIMARY KEY (`tblgradeid`),
  ADD KEY `fk_tblgradesshs_tblstudents` (`lrn`),
  ADD KEY `fk_tblgradesshs_tblschedshs` (`schedid`);

--
-- Indexes for table `tblschedjhs`
--
ALTER TABLE `tblschedjhs`
  ADD PRIMARY KEY (`schedid`),
  ADD KEY `fk_enridtblschedjhs` (`enrollmentid`),
  ADD KEY `fk_tblschedjhs_tblteachers` (`trn`),
  ADD KEY `fk_tblschedjhs_tblsubject` (`subjectcode`);

--
-- Indexes for table `tblschedshs`
--
ALTER TABLE `tblschedshs`
  ADD PRIMARY KEY (`schedid`),
  ADD KEY `fk_tblschedshs_tblteachers` (`trn`),
  ADD KEY `fk_tblschedshs_tblsubject` (`subjectcode`),
  ADD KEY `fk_tblschedshs_tblstudents` (`lrn`);

--
-- Indexes for table `tblscheduletemplateshs`
--
ALTER TABLE `tblscheduletemplateshs`
  ADD PRIMARY KEY (`schedtempid`),
  ADD KEY `fk_tblscheduletemplateshs` (`subjectcode`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`tblstudentid`),
  ADD UNIQUE KEY `lrn` (`lrn`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subjectid`),
  ADD UNIQUE KEY `subjectcode` (`subjectcode`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`tblteacherid`),
  ADD UNIQUE KEY `trn` (`trn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `fk_users_tblteachers` (`trn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladvisoryclass`
--
ALTER TABLE `tbladvisoryclass`
  MODIFY `tbladvisoryclassid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblenrollmentjhs`
--
ALTER TABLE `tblenrollmentjhs`
  MODIFY `enrollmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblenrollmentshs`
--
ALTER TABLE `tblenrollmentshs`
  MODIFY `enrollmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tblgradesshs`
--
ALTER TABLE `tblgradesshs`
  MODIFY `tblgradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tblschedjhs`
--
ALTER TABLE `tblschedjhs`
  MODIFY `schedid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschedshs`
--
ALTER TABLE `tblschedshs`
  MODIFY `schedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tblscheduletemplateshs`
--
ALTER TABLE `tblscheduletemplateshs`
  MODIFY `schedtempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `tblstudentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `tblteacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladvisoryclass`
--
ALTER TABLE `tbladvisoryclass`
  ADD CONSTRAINT `fk_tbladvisoryclass` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblenrollmentjhs`
--
ALTER TABLE `tblenrollmentjhs`
  ADD CONSTRAINT `fk_tblenrollmentjhs` FOREIGN KEY (`lrn`) REFERENCES `tblstudents` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trntblenrollmentjhs` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblenrollmentshs`
--
ALTER TABLE `tblenrollmentshs`
  ADD CONSTRAINT `fk_tblenrollmentshs` FOREIGN KEY (`lrn`) REFERENCES `tblstudents` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblenrollmentshslrn` FOREIGN KEY (`lrn`) REFERENCES `tblstudents` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trntblenrollmentshs` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblgradesshs`
--
ALTER TABLE `tblgradesshs`
  ADD CONSTRAINT `fk_tblgradesshs_tblschedshs` FOREIGN KEY (`schedid`) REFERENCES `tblschedshs` (`schedid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblgradesshs_tblstudents` FOREIGN KEY (`lrn`) REFERENCES `tblstudents` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblschedjhs`
--
ALTER TABLE `tblschedjhs`
  ADD CONSTRAINT `fk_enridtblschedjhs` FOREIGN KEY (`enrollmentid`) REFERENCES `tblenrollmentjhs` (`enrollmentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblschedjhs_tblsubject` FOREIGN KEY (`subjectcode`) REFERENCES `tblsubject` (`subjectcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblschedjhs_tblteachers` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblschedshs`
--
ALTER TABLE `tblschedshs`
  ADD CONSTRAINT `fk_tblschedshs_tblstudents` FOREIGN KEY (`lrn`) REFERENCES `tblstudents` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblschedshs_tblsubject` FOREIGN KEY (`subjectcode`) REFERENCES `tblsubject` (`subjectcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblschedshs_tblteachers` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblscheduletemplateshs`
--
ALTER TABLE `tblscheduletemplateshs`
  ADD CONSTRAINT `fk_tblscheduletemplateshs` FOREIGN KEY (`subjectcode`) REFERENCES `tblsubject` (`subjectcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_tblteachers` FOREIGN KEY (`trn`) REFERENCES `tblteachers` (`trn`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
