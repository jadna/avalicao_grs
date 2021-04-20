-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2021 às 16:59
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `avaliacao_grs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pois`
--

CREATE TABLE `pois` (
  `poiId` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pois`
--

INSERT INTO `pois` (`poiId`, `name`, `latitude`, `longitude`, `type`, `address`) VALUES
(1, 'RV Culture and Art', '-13.010833', '-38.491897', 'art_gallery', 'Av. Cardeal da Silva  158 - Rio Vermelho  Salvador - BA  41950-495  Brazil'),
(9, 'Galeria Canizares UFBA', '-12.9911905', '-38.5211528', 'art_gallery', 'Av. Araujo Pinho  212 - Canela  Salvador - BA  41110-150  Brazil'),
(17, 'Galeria Sunset Boulevar', '-13.0043808', '-38.5312846', 'art_gallery', 'Condominio Edificio Daniel - R. Cesar Zama  129 - Barra  Salvador - BA  40140-030  Brazil'),
(21, 'House Cupcake', '-12.9514518', '-38.348341', 'bakery', 'R. do Gato Arisco  145 - Itapua  Salvador - BA  41620-320  Brazil'),
(30, 'Bread Boutique Delicatessen', '-12.9713114', '-38.4353865', 'bakery', 'R. das Gaivotas  198 - Imbui  Salvador - BA  41720-070  Brazil'),
(31, 'Padaria Belo Rustico', '-12.9906479', '-38.4574516', 'bakery', 'R. das Rosas  514 - Pituba  Salvador - BA  41810-070  Brazil'),
(39, 'Tortarelli', '-12.9790877', '-38.4544729', 'cafe', 'Av. Tancredo Neves  3133 - Caminho das arvores  Salvador - BA  41820-021  Brazil'),
(41, 'Bar Do Pepe', '-12.9437347', '-38.3686778', 'bar', 'R. da Ilha  36 - Itapua  Salvador - BA  41620-620  Brazil'),
(42, 'O Cravinho', '-12.9731406', '-38.5103061', 'bar', 'Largo Terreiro de Jesus  3 - Pelourinho  Salvador - BA  40026-010  Brazil'),
(44, 'Five Sport Bar - Shopping Paralela', '-12.9365739', '-38.3952434', 'bar', 'Unidade Shopping Paralela Avenida Luis Viana Filho  n 8544  Piso L2 - Paralela  Salvador - BA  41730-101  Brazil'),
(45, 'Pipa Beach Club', '-12.9218626', '-38.3140869', 'bar', 'Alameda Cabo Frio  S/N  Salvador - BA  41603-135  Brazil'),
(49, 'Terapia Restaurante e Bar', '-12.9693369', '-38.4368642', 'bar', 'Av. Jorge Amado  16 - Imbui  Salvador - BA  41720-110  Brazil'),
(76, 'Praia de Itapua', '-12.95052', '-38.36654', 'beach', 'Praia de Itapua - Itapua  Salvador - State of Bahia  41610-160  Brazil'),
(80, 'Boa Viagem Beach', '-12.931072', '-38.515701', 'beach', 'Boa Viagem Beach  Salvador - State of Bahia  40301-155  Brazil'),
(95, 'Praia do Farol da Barra', '-13.0098997', '-38.5284848', 'beach', 'Salvador - BA'),
(108, 'Praia do Cantagalo', '-12.9433066', '-38.5035109', 'beach', 'Salvador - BA, 40301-155'),
(110, 'Praia do Buracao', '-13.0148481', '-38.4840314', 'beach', 'Rio Vermelho, Salvador - BA, 41940-460'),
(117, 'Cafeteria Havanna - Salvador Norte Shopping', '-12.9092115', '-38.3516729', 'cafe', 'RODOVIA  BA-526  305 - Sao Cristovao  Salvador - BA  41510-000  Brazil'),
(121, 'Coffeetown Salvador', '-12.9892871', '-38.5235395', 'cafe', 'Av. Sete de Setembro  1755 - Vitoria  Salvador - BA  40080-002  Brazil'),
(130, 'Casa do Pao de Queijo', '-12.9361398', '-38.3946903', 'cafe', 'shopping paralela  Av. Luis Viana Filho  8544 - Loja C 209 - Patamares  Salvador - BA  41730-101  Brazil'),
(147, 'Spoleto', '-12.9373883', '-38.3952245', 'fast-food', 'Av. Luis Viana Filho  8544 - Paralela  Salvador - BA  41730-101  Brazil'),
(151, 'Sal e Brasa Grill Express Salvador Norte Shopping', '-12.9095109', '-38.3507427', 'fast-food', 'BA-526  305 - Sao Cristovao  Salvador - BA  41510-000  Brazil'),
(152, 'Bobs', '-12.9817925', '-38.464633', 'fast-food', 'Av. Tancredo Neves  148 - Caminho das arvores  Salvador - BA  41820-908  Brazil'),
(162, 'Cinemark', '-12.9779888', '-38.45446829999999', 'movie_theater', 'Av. Tancredo Neves  2915 - Loja 3005 - Caminho das arvores  Salvador - BA  41820-910  Brazil'),
(163, 'Espaco Itau de Cinema - Salvador', '-12.9772187', '-38.5143266', 'movie_theater', 'Praca Castro Alves  s/n - Centro  Salvador - BA  40020-160  Brazil'),
(166, 'Cinepolis', '-12.9094444', '-38.3511111', 'movie_theater', 'Rod. BA 526  n 305 3017 - Sao Cristovao  Salvador - BA  41301-110  Brazil'),
(181, 'Cultural Afro Brazilian Museum', '-12.976115', '-38.5125691', 'museum', 'R. das Vassouras  1-23 - Centro  Salvador - BA  40020-020  Brazil'),
(182, 'Bahia Nautico Museum', '-13.0102783', '-38.5328507', 'museum', 'Largo do Farol da Barra  s/n - Barra  Salvador - BA  40140-650  Brazil'),
(198, 'Child Museum', '-12.9609679', '-38.4037754', 'museum', '480  R. do Mangalo  152 - Patamares  Salvador - BA  41680-048  Brazil'),
(219, 'Zen Salvador', '-13.0110668', '-38.4907581', 'night_club', 'Rua Conselheiro Pedro Luiz  311 - Rio Vermelho  Salvador - BA  41950-610  Brazil'),
(220, 'Platinum Lounge and Bar | savior', '-12.9840784', '-38.4358024', 'night_club', 'Av. Simon Bolivar  166 - Armacao  Salvador - BA  41750-230  Brazil'),
(231, 'SalCity', '-12.9317616', '-38.5072141', 'night_club', 'Av. Dendezeiros do Bonfim - Roma  Salvador - BA  40444-130  Brazil'),
(241, 'Square Ana Lucia Magalhaes', '-12.9932133', '-38.4613782', 'park', 'Itaigara  Salvador - State of Bahia  41810-010  Brazil'),
(254, 'Praca Orungan', '-13.0080127', '-38.5184597', 'park', 'Praca Santos Dumont  1-17 - Barra  Salvador - BA  41830-650  Brazil'),
(257, 'Praca da II', '-12.9019002', '-38.403067', 'park', 'Cajazeiras  Salvador - State of Bahia  41342-430  Brazil'),
(258, 'Rango Vegan', '-12.9693377', '-38.5080026', 'restaurant', 'R. do Passo  n 62 - Santo Antonio  Salvador - BA  40301-408  Brazil'),
(276, 'Villa Bahiana', '-12.9506867', '-38.3625545', 'restaurant', 'Villa Bahiana - Rua Professor Souza Brito  1 - Itapua  Salvador - BA  41.640  Brazil'),
(283, 'Restaurante Poro', '-12.9678893', '-38.5071923', 'restaurant', 'R. do Carmo  13 - Santo Antonio Alem do Carmo  Salvador - BA  40301-380  Brazil'),
(291, 'Restaurante Barravento', '-13.009566', '-38.5254147', 'restaurant', 'Av. Oceanica  814 - Barra  Salvador - BA  40170-010  Brazil'),
(339, 'Salvador Shopping', '-12.9785389', '-38.4550888', 'shopping_mall', 'Av. Tancredo Neves  3133 - Caminho das arvores  Salvador - BA  41820-021  Brazil'),
(340, 'Salvador Norte Shopping', '-12.9090341', '-38.3518871', 'shopping_mall', 'BA-526  305 - Sao Cristovao  Salvador - BA  41510-000  Brazil'),
(344, 'Shopping Bela Vista', '-12.9702525', '-38.47424230000001', 'shopping_mall', 'Alameda Euvaldo Luz  92 - Horto Bela Vista  Salvador - BA  41098-020  Brazil'),
(354, 'Itaipava Fonte Nova Arena', '-12.97883', '-38.5043711', 'stadium', 'Ladeira da Fonte das Pedras  s/n - Nazare  Salvador - BA  40050-565  Brazil'),
(358, 'Elevador Lacerda', '-12.9730385', '-38.5314304', 'tourist_attraction', 'Praca Tome de Souza  S/N - Centro  Salvador - BA  40020-000  Brazil'),
(366, 'Itapua Lighthouse', '-12.9570655', '-38.3536886', 'tourist_attraction', 'Rua Farol de Itapua S/N - Itapua  Salvador - BA  41630-240  Brazil'),
(381, 'Basilica do Senhor do Bonfim', '-12.9237266', '-38.5080816', 'tourist_attraction', 'Largo do Bonfim  s/n - Bonfim  Salvador - BA  40415-475  Brazil'),
(392, 'Farol da Barra - Forte de Santo Antonio da Barra', '-13.0103389', '-38.532898', 'tourist_attraction', 'Largo do Farol da Barra, S/N - Barra, Salvador - BA, 40140-650'),
(402, 'Dique Tororo', '-12.9844852', '-38.5063431', 'tourist_attraction', 'Nazaré, Salvador - BA, 40301-110'),
(405, 'Paroquia Nossa Senhora da Conceicao de Itapua', '-12.9488386', '-38.36448', 'tourist_attraction', 'Itapuã, Salvador - BA, 41610-690'),
(416, 'Catedral Basilica de Salvador', '-12.9728526', '-38.5104604', 'tourist_attraction', 'Largo Terreiro de Jesus, s/n - Pelourinho, Salvador - BA, 40020-210'),
(421, 'Salvador Zoo and Botanical Park', '-13.0094574', '-38.5047836', 'zoo', 'Tv. Alto de Ondina  s/n - Ondina  Salvador - BA  40170-110  Brazil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE `ratings` (
  `userId` int(11) NOT NULL,
  `poiId` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pois`
--
ALTER TABLE `pois`
  ADD PRIMARY KEY (`poiId`),
  ADD KEY `poiId` (`poiId`);

--
-- Índices para tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`userId`,`poiId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
