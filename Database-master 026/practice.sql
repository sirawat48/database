-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 มี.ค. 2020 เมื่อ 08:58 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--
CREATE DATABASE IF NOT EXISTS `practice` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `practice`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `DEPTNO` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DNAME` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOC` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `dept`
--

INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES
('10', 'ACCOUNTING', 'NEW YORK'),
('20', 'RESEARCH', 'DALLAS'),
('30', 'SALES', 'CHICAGO'),
('40', 'OPERATIONS', 'BOSTON');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE `emp` (
  `EMPNO` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ENAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `JOB` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MGR` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HIREDATE` date DEFAULT NULL,
  `SAL` int(5) DEFAULT NULL,
  `COMM` int(5) DEFAULT NULL,
  `DEPTNO` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USERNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` text COLLATE utf8_unicode_ci NOT NULL,
  `ROLE` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `emp`
--

INSERT INTO `emp` (`EMPNO`, `ENAME`, `JOB`, `MGR`, `HIREDATE`, `SAL`, `COMM`, `DEPTNO`, `USERNAME`, `PASSWORD`, `ROLE`) VALUES
('7839', 'KING', 'PRESSIDENT', NULL, '1991-11-17', 5000, NULL, '10', '', '', ''),
('7698', 'BLAKE', 'MANAGER', '7839', '1981-05-01', 2850, NULL, '30', '', '', ''),
('7782', 'CLARK', 'MANAGER', '7839', '1981-06-09', 2450, NULL, '10', '', '', ''),
('7566', 'JONES', 'MANAGER', '7839', '1981-04-02', 2975, NULL, '20', '', '', ''),
('7654', 'MARTIN', 'SALESMAN', '7698', '1981-09-28', 1250, 1400, '30', 'rezaza', '25f9e794323b453885f5181f1b624d0b', 'admin'),
('7499', 'ALLEN', 'SALESMAN', '7698', '1981-02-20', 1600, 300, '30', 'rezaza2', '25f9e794323b453885f5181f1b624d0b', 'sale'),
('7844', 'TURNER', 'SALESMAN', '7698', '1981-09-08', 1500, 0, '30', 'rezaza3', '25f9e794323b453885f5181f1b624d0b', 'sale'),
('7900', 'JAMES', 'CLERK', '7698', '1981-12-03', 950, NULL, '30', '', '', ''),
('7521', 'WARD', 'SALESMAN', '7698', '1981-02-22', 1250, 500, '30', '', '', ''),
('7902', 'FORD', 'ANALYST', '7566', '1981-12-03', 3000, NULL, '20', '', '', ''),
('7369', 'SMITH', 'CLERK', '7902', '1980-12-17', 800, NULL, '20', '', '', ''),
('7788', 'SCOTT', 'ANALYST', '7566', '1982-12-09', 3000, NULL, '20', '', '', ''),
('7876', 'ADAMS', 'CLERK', '7788', '1983-01-12', 1100, NULL, '20', '', '', ''),
('7934', 'MILLER', 'CLERK', '7782', '1982-01-23', 1300, NULL, '10', '', '', '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `salgrade`
--

DROP TABLE IF EXISTS `salgrade`;
CREATE TABLE `salgrade` (
  `GRADE` tinyint(1) NOT NULL DEFAULT 0,
  `LOSAL` int(4) DEFAULT NULL,
  `HISAL` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `salgrade`
--

INSERT INTO `salgrade` (`GRADE`, `LOSAL`, `HISAL`) VALUES
(1, 700, 1200),
(2, 1201, 1400),
(3, 1401, 2000),
(4, 2001, 3000),
(5, 3001, 9999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`DEPTNO`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMPNO`);

--
-- Indexes for table `salgrade`
--
ALTER TABLE `salgrade`
  ADD PRIMARY KEY (`GRADE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
