-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2018 às 19:49
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setran_projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `subtitulo` varchar(300) NOT NULL,
  `conteudo` text NOT NULL,
  `autor` varchar(20) NOT NULL,
  `at_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `at_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(300) NOT NULL,
  `categoria` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `subtitulo`, `conteudo`, `autor`, `at_created`, `at_updated`, `url`, `categoria`, `imagem`) VALUES
(1, 'AÇÃO EMERGENCIAL VAI RESTABELECER A TRAFEGABILIDADE DE VICINAIS EM 17 MUNICÍPIOS', 'CONVÊNIOS E CONTRATAÇÕES DIRETAS VÃO AGILIZAR O INÍCIO DAS OBRAS', 'Uma parceria entre a Secretaria de Estado de Transportes (Setran), o Centro Regional de Governo do Sudeste do Pará e a Defesa Civil vai possibilitar a intervenção em 17 municípios do Estado que tiveram caracterizadas situações de emergência em função das fortes chuvas que têm atingido, especialmente, as regiões Sul e Sudeste do Pará.\r\n\r\nEm reunião de diretoria ocorrida na manhã de hoje (2), no auditório da Setran, com a participação do Secretário Regional de Governo, Jorge Bittencourt, e de representantes da Defesa Civil, Kleber Menezes, Secretário de Transportes informou a todos sobre a autorização do Governador Simão Jatene para que ações imediatas sejam implementadas no sentido de garantir a trafegabilidade nas vicinais, o que será feito por meio de convênios com as prefeituras que não tenham restrições fiscais e previdenciárias e contratações diretas, com dispensa de licitação, após análise da Diretoria Técnica da Setran e aval da Consultoria Jurídica do órgão, relativamente aos inadimplentes.\r\n\r\nSerão beneficiados os municípios de Conceição do Araguaia, Redenção, Tucumã, Itupiranga, Pau D’arco, São Félix do Xingu, Quatipuru, Santa Maria das Barreiras, Eldorado dos Carajás, Cumaru do Norte, Marabá, Água Azul do Norte, Rio Maria, Bannach, Xinguara, Oriximiná e Parauapebas.\r\n\r\nSegundo Menezes, “a necessidade de cada município é que nos dirá o valor do investimento, que não poderá ultrapassar o teto de R$ 400 mil, ressaltando que as obras serão realizadas não para reconstruir vias, mas para restabelecer a trafegabilidade, devolvendo à população o direito de ir e vir”, garantiu o Secretário.', 'Karlla Catete', '2018-04-02 16:22:43', '2018-04-02 16:24:44', 'link-noticia-um', 1, 'https://loremflickr.com/320/240'),
(2, 'AÇÃO EMERGENCIAL VAI RESTABELECER A TRAFEGABILIDADE DE VICINAIS EM 17 MUNICÍPIOS', 'CONVÊNIOS E CONTRATAÇÕES DIRETAS VÃO AGILIZAR O INÍCIO DAS OBRAS', 'Uma parceria entre a Secretaria de Estado de Transportes (Setran), o Centro Regional de Governo do Sudeste do Pará e a Defesa Civil vai possibilitar a intervenção em 17 municípios do Estado que tiveram caracterizadas situações de emergência em função das fortes chuvas que têm atingido, especialmente, as regiões Sul e Sudeste do Pará.\r\n\r\nEm reunião de diretoria ocorrida na manhã de hoje (2), no auditório da Setran, com a participação do Secretário Regional de Governo, Jorge Bittencourt, e de representantes da Defesa Civil, Kleber Menezes, Secretário de Transportes informou a todos sobre a autorização do Governador Simão Jatene para que ações imediatas sejam implementadas no sentido de garantir a trafegabilidade nas vicinais, o que será feito por meio de convênios com as prefeituras que não tenham restrições fiscais e previdenciárias e contratações diretas, com dispensa de licitação, após análise da Diretoria Técnica da Setran e aval da Consultoria Jurídica do órgão, relativamente aos inadimplentes.\r\n\r\nSerão beneficiados os municípios de Conceição do Araguaia, Redenção, Tucumã, Itupiranga, Pau D’arco, São Félix do Xingu, Quatipuru, Santa Maria das Barreiras, Eldorado dos Carajás, Cumaru do Norte, Marabá, Água Azul do Norte, Rio Maria, Bannach, Xinguara, Oriximiná e Parauapebas.\r\n\r\nSegundo Menezes, “a necessidade de cada município é que nos dirá o valor do investimento, que não poderá ultrapassar o teto de R$ 400 mil, ressaltando que as obras serão realizadas não para reconstruir vias, mas para restabelecer a trafegabilidade, devolvendo à população o direito de ir e vir”, garantiu o Secretário.', 'Karlla Catete', '2018-04-02 16:22:43', '2018-04-02 16:24:44', 'link-noticia-dois', 1, 'https://loremflickr.com/320/240');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
