-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 01, 2023 alle 11:33
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothe-u`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id_carrello` int(20) NOT NULL,
  `utente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id_carrello`, `utente`) VALUES
(479, '31'),
(480, '60373933783930383682');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `nome_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`nome_categoria`) VALUES
('eleganti'),
('Sneaker Casual'),
('Sneaker Sportive'),
('sportive');

-- --------------------------------------------------------

--
-- Struttura della tabella `colori`
--

CREATE TABLE `colori` (
  `nome_colore` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `colori`
--

INSERT INTO `colori` (`nome_colore`) VALUES
('Bianco'),
('Blu'),
('Giallo'),
('Grigio'),
('Nero'),
('Rosso'),
('Verde');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE `magazzino` (
  `codice` int(20) NOT NULL,
  `modello` int(11) NOT NULL,
  `taglia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`codice`, `modello`, `taglia`) VALUES
(21, 10, '38.00'),
(22, 10, '39.00'),
(23, 10, '40.00'),
(24, 10, '41.00'),
(25, 10, '42.00'),
(26, 10, '43.00'),
(27, 10, '44.00'),
(28, 10, '45.00'),
(29, 10, '38.00'),
(30, 10, '39.00'),
(31, 10, '40.00'),
(32, 10, '41.00'),
(33, 10, '42.00'),
(34, 10, '43.00'),
(35, 10, '44.00'),
(36, 10, '45.00'),
(37, 14, '38.00'),
(38, 14, '39.00'),
(39, 14, '40.00'),
(40, 14, '41.00'),
(41, 14, '42.00'),
(42, 14, '43.00'),
(43, 14, '44.00'),
(44, 14, '45.00'),
(45, 14, '38.00'),
(46, 14, '39.00'),
(47, 14, '40.00'),
(48, 14, '41.00'),
(49, 14, '42.00'),
(50, 14, '43.00'),
(51, 14, '44.00'),
(52, 14, '45.00'),
(53, 15, '38.00'),
(54, 15, '39.00'),
(55, 15, '40.00'),
(56, 15, '41.00'),
(57, 15, '42.00'),
(58, 15, '43.00'),
(59, 15, '44.00'),
(60, 15, '45.00'),
(61, 15, '38.00'),
(62, 15, '39.00'),
(63, 15, '40.00'),
(64, 15, '41.00'),
(65, 15, '42.00'),
(66, 15, '43.00'),
(67, 15, '44.00'),
(68, 15, '45.00'),
(69, 16, '38.00'),
(70, 16, '39.00'),
(71, 16, '40.00'),
(72, 16, '41.00'),
(73, 16, '42.00'),
(74, 16, '43.00'),
(75, 16, '44.00'),
(76, 16, '45.00'),
(77, 16, '38.00'),
(78, 16, '39.00'),
(79, 16, '40.00'),
(80, 16, '41.00'),
(81, 16, '42.00'),
(82, 16, '43.00'),
(83, 16, '44.00'),
(84, 16, '45.00'),
(85, 17, '38.00'),
(86, 17, '39.00'),
(87, 17, '40.00'),
(88, 17, '41.00'),
(89, 17, '42.00'),
(90, 17, '43.00'),
(91, 17, '44.00'),
(92, 17, '45.00'),
(93, 18, '38.00'),
(94, 18, '39.00'),
(95, 18, '40.00'),
(96, 18, '42.00'),
(97, 18, '44.00'),
(98, 18, '45.00'),
(99, 19, '39.00'),
(100, 19, '40.00'),
(101, 19, '42.00'),
(102, 19, '43.00'),
(103, 19, '45.00'),
(104, 20, '38.00'),
(105, 20, '39.00'),
(106, 20, '40.00'),
(107, 20, '41.00'),
(108, 20, '42.00'),
(109, 20, '43.00'),
(110, 20, '44.00'),
(111, 20, '45.00'),
(112, 21, '38.00'),
(113, 21, '39.00'),
(114, 21, '41.00'),
(115, 21, '43.00'),
(116, 21, '44.00'),
(117, 21, '45.00'),
(118, 22, '39.00'),
(119, 22, '40.00'),
(120, 22, '42.00'),
(121, 22, '44.00'),
(122, 22, '45.00'),
(123, 16, '43.00'),
(124, 18, '39.00'),
(125, 18, '40.00'),
(126, 23, '38.00'),
(127, 23, '39.00'),
(128, 23, '40.00'),
(129, 23, '42.00'),
(130, 23, '43.00'),
(131, 23, '44.00'),
(132, 23, '45.00'),
(133, 24, '39.00'),
(134, 24, '41.00'),
(135, 24, '42.00'),
(136, 24, '43.00'),
(137, 24, '44.00'),
(138, 25, '38.00'),
(139, 25, '39.00'),
(140, 25, '40.00'),
(141, 25, '41.00'),
(142, 25, '42.00'),
(143, 25, '43.00'),
(144, 25, '44.00'),
(145, 25, '45.00'),
(146, 25, '38.00'),
(147, 25, '41.00'),
(148, 25, '45.00'),
(149, 26, '38.00'),
(150, 26, '39.00'),
(151, 26, '40.00'),
(152, 26, '41.00'),
(153, 26, '42.00'),
(154, 26, '43.00'),
(155, 26, '45.00'),
(156, 26, '38.00'),
(157, 26, '39.00'),
(158, 26, '40.00'),
(159, 26, '41.00'),
(160, 26, '43.00'),
(161, 26, '44.00'),
(162, 26, '45.00'),
(163, 27, '39.00'),
(164, 27, '40.00'),
(165, 27, '41.00'),
(166, 27, '42.00'),
(167, 27, '43.00'),
(168, 27, '44.00'),
(169, 28, '38.00'),
(170, 28, '45.00'),
(171, 28, '44.00'),
(172, 28, '43.00'),
(173, 28, '42.00'),
(174, 28, '41.00'),
(175, 28, '40.00'),
(176, 28, '39.00'),
(177, 28, '38.00'),
(178, 28, '45.00'),
(179, 28, '39.00'),
(180, 28, '40.00'),
(181, 28, '41.00'),
(182, 28, '42.00'),
(183, 28, '43.00'),
(184, 28, '44.00'),
(185, 29, '38.00'),
(186, 29, '45.00'),
(187, 29, '42.00'),
(188, 29, '39.00'),
(189, 29, '38.00'),
(190, 29, '39.00'),
(191, 29, '41.00'),
(192, 29, '44.00'),
(193, 30, '44.00'),
(194, 30, '43.00'),
(195, 30, '42.00'),
(196, 30, '39.00'),
(197, 30, '38.00'),
(198, 30, '40.00'),
(199, 30, '42.00'),
(200, 30, '43.00'),
(201, 31, '38.00'),
(202, 31, '44.00'),
(203, 31, '42.00'),
(204, 31, '41.00'),
(205, 31, '40.00'),
(206, 31, '38.00'),
(207, 31, '45.00'),
(208, 32, '38.00'),
(209, 32, '45.00'),
(210, 32, '44.00'),
(211, 32, '43.00'),
(212, 32, '42.00'),
(213, 32, '41.00'),
(214, 32, '40.00'),
(215, 32, '39.00'),
(216, 32, '45.00'),
(217, 32, '41.00'),
(218, 32, '44.00'),
(219, 33, '38.00'),
(220, 33, '45.00'),
(221, 33, '44.00'),
(222, 33, '43.00'),
(223, 33, '42.00'),
(224, 33, '41.00'),
(225, 33, '40.00'),
(226, 33, '39.00'),
(227, 33, '38.00'),
(228, 33, '45.00'),
(229, 33, '39.00'),
(230, 33, '40.00'),
(231, 33, '43.00'),
(232, 34, '38.00'),
(233, 34, '45.00'),
(234, 34, '44.00'),
(235, 34, '43.00'),
(236, 34, '42.00'),
(237, 34, '38.00'),
(238, 34, '45.00'),
(239, 34, '39.00'),
(240, 34, '41.00'),
(241, 35, '45.00'),
(242, 35, '44.00'),
(243, 35, '43.00'),
(244, 35, '39.00'),
(245, 35, '39.00'),
(246, 35, '40.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id_ordine` int(255) NOT NULL,
  `id_utente` int(255) NOT NULL,
  `id_carrello` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `civico` varchar(255) NOT NULL,
  `cap` varchar(25) NOT NULL,
  `modalita` varchar(255) NOT NULL,
  `carta` int(255) NOT NULL,
  `istante` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id_ordine`, `id_utente`, `id_carrello`, `nome`, `cognome`, `indirizzo`, `civico`, `cap`, `modalita`, `carta`, `istante`) VALUES
(78, 31, 479, 'utente', 'utente', 'utente', '11111111', '11111', 'ricevi_casa', 2147483647, '2023-05-31 15:13:33');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `colore` varchar(10) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `descrizione` text NOT NULL,
  `rating` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `foto`, `foto2`, `foto3`, `marca`, `colore`, `prezzo`, `descrizione`, `rating`, `categoria`) VALUES
(10, 'Nike Air Max 270', './images/81ktd-j7mTL._AC_UX625_.jpg', './images/71y4qrgZQ8L._AC_UX625_.jpg', './images/61Q4gO9jzaL._AC_UX625_.jpg', 'Nike', 'Nero', '19.00', 'Materiale esterno: Sintetico<br>\r\nMateriale suola: tessuto<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Maglia, gomma<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(14, 'Nike Air Jordan 12 Retro', './images/61Wt6-2b-iL._AC_UX695_.jpg', './images/61YpQhORTwL._AC_UX695_.jpg', './images/71Zl0mWS9jL._AC_UY695_.jpg', 'Nike', 'Giallo', '23.00', 'Materiale esterno: Pelle<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Gomma<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(15, 'Nike Air Jordan 12 Retro (Navy Light Smok)', './images/71NAzFdPanL._AC_SX695._SX._UX._SY._UY_.jpg', './images/61ZD8Cb8z5L._AC_SY695._SX._UX._SY._UY_.jpg', './images/61rU03aalYL._AC_SY695._SX._UX._SY._UY_.jpg', 'Nike', 'Bianco', '22.00', 'Materiale esterno: Pelle<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Gomma<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(16, 'Nike Air Jordan 1 Low (Fog Blu Void)', './images/61Ea6AtD7QL._AC_UX695_.jpg', './images/71TtOK5PCFL._AC_UX695_.jpg', './images/61cQCvxMXlL._AC_UX695_.jpg', 'Nike', 'Blu', '13.00', 'Materiale esterno: Pelle<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Pelle<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(17, 'Nike Air Max 97 (Bianco Uva Ghiacciata)', './images/41HQQoU8s8L._AC._SX._UX._SY._UY_.jpg', './images/41gw-qW4fNL._AC._SX._UX._SY._UY_.jpg', './images/41X3SqJJgXL._AC._SX._UX._SY._UY_.jpg', 'Nike', 'Bianco', '21.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(18, 'Nike Air Max 97 (Polvere Fotone Varsity)', './images/61lccWaVOwL._AC_UX625_.jpg', './images/61+QIFyt+1L._AC_UX625_.jpg', './images/61MmyfJeNAL._AC_UY625_.jpg', 'Nike', 'Bianco', '22.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(19, 'Nike Air Max 97 (Nero)', './images/51SK1esayjL._AC_SY625._SX._UX._SY._UY_.jpg', './images/516JkCQYETL._AC_SY625._SX._UX._SY._UY_.jpg', './images/51brrbT6sML._AC_SY625._SX._UX._SY._UY_.jpg', 'Nike', 'Nero', '19.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(20, 'Nike Air Max 97 (Summit Bianco)', './images/51kwZD6+qNL._AC_SY625._SX._UX._SY._UY_.jpg', './images/51M4ls67tiL._AC_SY625._SX._UX._SY._UY_.jpg', './images/51cL+k0S9sL._AC_SY625._SX._UX._SY._UY_.jpg', 'Nike', 'Bianco', '17.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(21, 'Adidas NMD_R1 Primeknit', './images/71dWdGC5aBL._AC_UX575_.jpg', './images/71-kwPjrGPL._AC_UX575_.jpg', './images/71dBzq3pQRL._AC_UX575_.jpg', 'Adidas', 'Bianco', '22.00', 'Materiale esterno: Tessuto e sintetico<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Tessuto sintetico<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(22, 'Adidas Pharrell Williams HU', './images/81OitUhc82L._AC_UX695_.jpg', './images/81fafM1MoDL._AC_UX625_.jpg', './images/81xTF+UYL6L._AC_UX625_.jpg', 'Adidas', 'Giallo', '26.00', 'Materiale esterno: Tessuto<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: 100% sintetico<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(23, 'Nike Lebron Witness 5', './images/61l9zD7Vl-L._AC_UY625_.jpg', './images/61AUiuits+L._AC_UY695_.jpg', './images/61fRNLJNQ2L._AC_UY695_.jpg', 'Jordan', 'Nero', '23.00', 'Materiale esterno: Sintetico<br>\r\nFodera: Sintetico<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Senza tacco<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(24, 'New Balance 991 Anniversary', './images/51ka-C9R1QS._AC_UY575_.jpg', './images/51IvZGproUS._AC_UY575_.jpg', './images/51R5tv4XqLS._AC_UY575_.jpg', 'New Balance', 'Grigio', '21.00', 'Materiale esterno: Pelle<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(25, 'New Balance M990NV5', './images/71BBFvoAGML._AC_UX575_.jpg', './images/71M5iFigNEL._AC_UX575_.jpg', './images/81hbK+D2ZOL._AC_UX575_.jpg', 'New Balance', 'Blu', '16.00', 'Materiale esterno: Pelle<br>\r\nFodera: Pelle<br>\r\nMateriale suola: Pelle<br>\r\nChiusura: Stringata<br>\r\nAltezza tacco: 2.5 cm<br>\r\nTipo di tacco: Tacco a blocco<br>\r\nComposizione materiale: 50% sintetico, 50% rete.<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(26, 'Reebok AR1448 Fury OG', './images/61T-BHYjKyL._AC_UX625_.jpg', './images/61JUQMBve1L._AC_UX625_.jpg', './images/51FxvoTYzLL._AC_UX625_.jpg', 'Reebok', 'Verde', '21.00', 'Tipo di tacco: Piatto<br>\r\nComposizione materiale: Tessuto sintetico<br>\r\nLarghezza scarpa: Normale<br>\r\n', '0.00', 'Sneaker Sportive'),
(27, 'Reebok Domanda Mid', './images/71JUweRpRfL._AC_UX625_.jpg', './images/71-IAfY6AwL._AC_UX625_.jpg', './images/61SBqWC5XcL._AC_UX625_.jpg', 'Reebok', 'Rosso', '18.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>\r\n', '0.00', 'Sneaker Sportive'),
(28, 'Air Jordan 3 Retro Bianco', './images/61OX72O2x+L._AC_UX695_.jpg', './images/61b2anEwWeL._AC_UX695_.jpg', './images/51iaPgFA8cL._AC_UX695_.jpg', 'Jordan', 'Grigio', '23.00', 'Materiale esterno: Pelle<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Tela<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(29, 'Jordan Air 12 Retro', './images/51AAVLRgTwL._AC_UX695_.jpg', './images/51+4CHOXngL._AC_UX695_.jpg', './images/611-WRrsNiL._AC_UX695_.jpg', 'Jordan', 'Bianco', '23.00', 'Materiale esterno: Pelle<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: Tela<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(30, 'Nike Jumpman Colossal Air Tee', './images/61wlcGE2bdL._AC_UX679_.jpg', './images/61vHZQpmOuL._AC_UX679_.jpg', './images/51WQSuT7TWL._AC_UX679_.jpg', 'Nike', 'Rosso', '15.00', 'Rivoluzionaria suola VaporMax Air per una reattività morbida e leggera.<br>\r\nLa struttura a stivaletti offre una vestibilità aderente e sicura.<br>\r\nChiusura: Stringata<br>\r\nSuola in gomma resistente.<br>\r\nCialde in gomma sulla suola in aree ad alta usura per una maggiore durata.<br>\r\nLe alette integrate forniscono una trazione aggressiva.<br>\r\n', '0.00', 'Sneaker Sportive'),
(31, 'Brooks Glycerin 17', './images/81Aqwhb0mmL._AC_UY535_.jpg', './images/81cbwQ+uNtL._AC_UY625_.jpg', './images/81DvHnh9MmL._AC_UY625_.jpg', 'Brooks', 'Nero', '16.00', 'Materiale esterno: Tela<br>\r\nFodera: Sintetico<br>\r\nMateriale suola: Gomma<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>\r\n\r\n', '0.00', 'Sneaker Sportive'),
(32, 'DSQUARED2 M2445', './images/71l+lJQWHZL._AC_UX695_.jpg', './images/71qjhj2NYqL._AC_UX625_.jpg', './images/71iQyV2yTiL._AC_UY695_.jpg', 'DSQUARED2', 'Bianco', '17.00', 'Materiale esterno: Pelle scamosciata<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Casual'),
(33, 'PUMA Mb.01 Galaxy', './images/61dwZfAN1lL._AC_UY625_.jpg', './images/61xBoahdKXL._AC_UY695_.jpg', './images/51dJzwgZbbL._AC_UY695_.jpg', 'Puma', 'Blu', '15.00', 'Materiale esterno: Pelle<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: 100% sintetico<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(34, 'PUMA Thunder Spectra', './images/715hBntjjYL._AC_UX575_.jpg', './images/712uQ+NwzrL._AC_UY695_.jpg', './images/711dwRnIpwL._AC_UX575_.jpg', 'Puma', 'Nero', '15.00', 'Materiale esterno: Pelle<br>\r\nChiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nComposizione materiale: 100% sintetico<br>\r\nLarghezza scarpa: Normale<br>', '0.00', 'Sneaker Sportive'),
(35, 'Adidas Yeezy 700 V3', './images/61h8MUwSWDL._AC_UX575_.jpg', './images/61Aea9+fCuL._AC_UX575_.jpg', './images/6181LQLSZpL._AC_UX575_.jpg', 'Adidas', 'Nero', '19.00', 'Chiusura: Stringata<br>\r\nTipo di tacco: Piatto<br>\r\nLarghezza scarpa: Schmal<br>', '0.00', 'Sneaker Sportive');

-- --------------------------------------------------------

--
-- Struttura della tabella `prod_carrello`
--

CREATE TABLE `prod_carrello` (
  `id` int(11) NOT NULL,
  `id_carrello` int(20) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `taglia` decimal(10,2) NOT NULL,
  `quantita` int(10) NOT NULL,
  `inizio` date NOT NULL,
  `fine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Struttura della tabella `prod_ordine`
--

CREATE TABLE `prod_ordine` (
  `id_prod_ordine` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `id_prod_magazzino` int(11) NOT NULL,
  `inizio` date NOT NULL,
  `fine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `prod_ordine`
--

INSERT INTO `prod_ordine` (`id_prod_ordine`, `id_ordine`, `id_prod_magazzino`, `inizio`, `fine`) VALUES
(56, 78, 120, '2023-06-02', '2023-06-03');

-- --------------------------------------------------------

--
-- Struttura della tabella `profili`
--

CREATE TABLE `profili` (
  `id_utente` int(11) NOT NULL,
  `nome_utente` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `civico` varchar(10) NOT NULL,
  `cap` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `iscrizione` timestamp NOT NULL DEFAULT current_timestamp(),
  `attivo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `profili`
--

INSERT INTO `profili` (`id_utente`, `nome_utente`, `email`, `nome`, `cognome`, `indirizzo`, `civico`, `cap`, `password`, `telefono`, `iscrizione`, `attivo`) VALUES
(13, 'leo', 'leo@gmail.com', 'leo', 'leo', 'aaaa', 'aaa', 'aa', '0f759dd1ea6c4c76cedc299039ca4f23', 'aaa', '2023-05-12 14:11:51', 1),
(23, 'catini', 'catini@gmail.com', 'catini', 'catini', 'catini', '11', '11', '133f8e0a9dc152a9480f2502d05e3846', '11', '2023-05-23 14:28:13', 0),
(24, 'catini', 'catini@gmail.com', 'catini', 'catini', 'catini', '11', '11', '133f8e0a9dc152a9480f2502d05e3846', '11', '2023-05-23 14:29:57', 0),
(26, 'aaa', 'a@aaaa', 'aaa', 'aaaa', '', '', '', '3dbe00a167653a1aaee01d93e77e730e', '', '2023-05-25 17:06:21', 0),
(31, 'utente', 'utente@gmail.com', 'utente', 'utente', 'utente', '11111111', '11111', '3dbe00a167653a1aaee01d93e77e730e', '11111111112', '2023-05-31 15:12:11', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id_carrello`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nome_categoria`);

--
-- Indici per le tabelle `colori`
--
ALTER TABLE `colori`
  ADD PRIMARY KEY (`nome_colore`);

--
-- Indici per le tabelle `magazzino`
--
ALTER TABLE `magazzino`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `prodotto_magazzino` (`modello`) USING BTREE;

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`),
  ADD KEY `ordine-utente` (`id_utente`),
  ADD KEY `ordine-carrello` (`id_carrello`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `prodotti-colore` (`colore`),
  ADD KEY `prodotti-categoria` (`categoria`);

--
-- Indici per le tabelle `prod_carrello`
--
ALTER TABLE `prod_carrello`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `carrello` (`id_carrello`),
  ADD KEY `prodotto` (`id_prodotto`);

--
-- Indici per le tabelle `prod_ordine`
--
ALTER TABLE `prod_ordine`
  ADD PRIMARY KEY (`id_prod_ordine`);

--
-- Indici per le tabelle `profili`
--
ALTER TABLE `profili`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id_carrello` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `codice` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id_ordine` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `prod_carrello`
--
ALTER TABLE `prod_carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT per la tabella `prod_ordine`
--
ALTER TABLE `prod_ordine`
  MODIFY `id_prod_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `profili`
--
ALTER TABLE `profili`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  ADD CONSTRAINT `vincolo1` FOREIGN KEY (`modello`) REFERENCES `prodotti` (`id`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordine-carrello` FOREIGN KEY (`id_carrello`) REFERENCES `carrello` (`id_carrello`),
  ADD CONSTRAINT `ordine-utente` FOREIGN KEY (`id_utente`) REFERENCES `profili` (`id_utente`);

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti-categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nome_categoria`),
  ADD CONSTRAINT `prodotti-colore` FOREIGN KEY (`colore`) REFERENCES `colori` (`nome_colore`);

--
-- Limiti per la tabella `prod_carrello`
--
ALTER TABLE `prod_carrello`
  ADD CONSTRAINT `carrello` FOREIGN KEY (`id_carrello`) REFERENCES `carrello` (`id_carrello`),
  ADD CONSTRAINT `prodotto` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
