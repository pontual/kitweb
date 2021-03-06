-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2014 at 04:29 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pontualimportb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `dimensoes` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `dimensoes`, `preco`) VALUES
('123456', 'Rainbow brush', '10x2x2', '1000'),
('137263', 'Espelho de bolso duplo', '7x6,5x0,8', ''),
('137350A', 'Chaveiro de metal', '8x3', ''),
('137350B', 'Chaveiro de metal (retangular)', '8x3', ''),
('137350K', 'Chaveiro de metal', '8x3', ''),
('137350L', 'Chaveiro de metal', '8x3', ''),
('137350P', 'Chaveiro de metal (coração)', '8x3', ''),
('137350R', 'Chaveiro de metal (redondo)', '8x3', ''),
('137535', 'Espelho de bolso', '7.5x6.5x0.5', ''),
('138319P', 'Kit pincéis c/ 7 pçs', '18x8', ''),
('138319T', 'Kit pincéis c/ 7 pçs', '18x8', ''),
('138499A', 'Bloco p/ anotação (azul)', '10x10x2.7', ''),
('138499P', 'Bloco p/ anotação (preto)', '10x10x2,7', ''),
('139385P', 'Jogo de pincéis c/ 5 pçs', '8x5,5x1,5', ''),
('139385T', 'Jogo de pincéis c/ 5 pçs', '8x5,5x1,5', ''),
('139388', 'Kit manicure c/ 6 pçs', '12x4,5', ''),
('139454', 'Canivete c/ 11 funções', '9x2,5x2.5', ''),
('139454A', 'Canivete c/ 11 funções', '9x2.5x2.5', ''),
('139482H', 'Chaveiro de metal (retangular)', '8x3', ''),
('139482L', 'Chaveiro de metal', '8,5x3', ''),
('139482M', 'Chaveiro de metal', '8,5x3', ''),
('139482R', 'Chaveiro de metal', '8x3', ''),
('139547A', 'Chaveiro de metal', '7,5x3', ''),
('139735', 'Porta foto c/ relógio multifunção', '18x18x1,5', ''),
('140045', 'Espelho de bolso duplo', '7,5x6,5', ''),
('140047', 'Espelho de bolso duplo', '6x6', ''),
('140068', 'Chaveiro c/ canivete c/ 3 funções', '6x2x1,2', ''),
('140070', 'Chaveiro c/ canivete c/ 4 funções', '4,5x2,7x0,5', ''),
('140078', 'Canivete c/ 7 funções', '7,5x2x1,2', ''),
('140086', 'Espelho c/ base (redondo)', '6', ''),
('140087', 'Espelho c/ base (quadrado)', '8x6', ''),
('140088', 'Espelho c/ base (oval)', '8x6', ''),
('140117', 'Kit manicure c/ 6 pçs', '11x6x1,5', ''),
('140117R', 'Kit manicure c/ 6 pçs', '11x6x1,5', ''),
('140117S', 'Kit manicure c/ 6 pçs', '11x6x1,5', ''),
('140117V', 'Kit manicure c/ 6 pçs', '11x6x1,5', ''),
('140121', 'Kit manicure c/ 6 pçs', '12x7', ''),
('140125A', 'Kit manicure c/ 5 pçs', '9,5x6,5x2', ''),
('140125R', 'Kit manicure c/ 5 pçs', '9,5x6,5x2', ''),
('140125V', 'Kit manicure c/ 5 pçs', '9,5x6,5x2', ''),
('140135', 'Saca rolhas de metal', '19x7x1,6', ''),
('140153B', 'Porta cartão de metal', '10x6x0,5', ''),
('140231', 'Porta caneta c/ relógio de metal', '12x6x6,5', ''),
('140232', 'Porta caneta c/ relógio de metal', '8,5x5x9', ''),
('140241', 'Espelho c/ aumento e base de alumínio', '12,5x9,5', ''),
('140274', 'Espelho c/ aumento e base (pequeno)', '15', ''),
('140275', 'Espelho c/ aumento e base (grande)', '20', ''),
('140276', 'Espelho c/ aumento e base (médio)', '17,5', ''),
('140288', 'Canivete c/ 8 funções e alicate', '18x6x2,3', ''),
('140303', 'Chaveiro de metal bola de futebol', '8,5x3x5', ''),
('140304', 'Chaveiro de metal jogador', '8x3,5', ''),
('140304A', 'Chaveiro de metal jogador', '7x3', ''),
('140304B', 'Chaveiro de metal jogador', '7x3', ''),
('140310', 'Kit ferramentas c/ 25 pçs e estojo', '30x15,5', ''),
('140313', 'Coqueteleira de inox 750 ml', '21x8,5', ''),
('140314', 'Coqueteleira de inox 550 ml', '18x8,5', ''),
('140395', 'Cantil de inox 750 ml c/ estojo', '29x7,5', ''),
('140396', 'Chaveiro de metal (santos)', '7x3', ''),
('140399', 'Necessaire c/ 5 pçs', '21x13', ''),
('140401', 'Mouse pad c/ calculadora', '29,5x20', ''),
('140402', 'Mouse pad c/ calculadora', '27x20', ''),
('140406', 'Coqueteleira de inox 350 ml', '16,5x8', ''),
('140873A', 'Chaveiro abridor de garrafa', '8x1,5x1', ''),
('140873P', 'Chaveiro abridor de garrafa', '8x1,5', ''),
('140873S', 'Chaveiro abridor de garrafa', '8x1,5', ''),
('140873V', 'Chaveiro abridor de garrafa', '8x1,5', ''),
('140879', 'Kit manicure c/ 12 pçs', '18,5x14x3', ''),
('140884', 'Alicate multifunção p/ pescaria', '22x7x1.5', ''),
('140888', 'Lanterna c/ relógio e bússola', '10x3x1.5', ''),
('140890', 'Rádio c/ relógio digital de plástico', '15.5x10x2', ''),
('140895', 'Relógio digital c/ porta foto', '8x8x3', ''),
('140897', 'Rádio de plástico', '', ''),
('140900', 'Rádio de plástico', '12x10x6.5', ''),
('140901', 'Moedor de pimenta a pilha', '23.5x5.5', ''),
('140902A', 'Caneca plástica c/ alumínio 450 ml', '18x11.5x8', ''),
('140902G', 'Caneca plástica c/ alumínio 450 ml', '18x11.5x8', ''),
('140902T', 'Caneca plástica c/ alumínio 450 ml', '18x11.5x8', ''),
('140902V', 'Caneca plástica c/ alumínio 450 ml', '18x11.5x8', ''),
('140918', 'Calculadora de plástico', '9.5x7x1', ''),
('140919', 'Relógio multifunção de plástico', '9x8x2.5', ''),
('140922', 'Relógio multifunção c/ porta canetas', '11.5x9.5x5', ''),
('140923', 'Relógio c/ porta foto e porta canetas', '14.5x13x1.5', ''),
('140924', 'Relógio multifunção de plástico', '9.5x8x2.5', ''),
('140926', 'Lupa 75mm c/ luz', '17x8x3', ''),
('140927', 'Lupa 90mm c/ luz', '19x9.5x3', ''),
('140943', 'Espelho de bolso duplo', '8.5x7', ''),
('140944', 'Espelho de bolso duplo', '7x6', ''),
('140963A', 'Kit caneta e lapiseira com chaveiro e canivete', '17.5x14', ''),
('140963B', 'Kit caneta e lapiseira com chaveiro e canivete', '17.5x14', ''),
('140964', 'Kit caneta e lapiseira com chaveiro', '18x11', ''),
('140964A', 'Kit caneta e lapiseira com chaveiro', '17.5x11', ''),
('140964B', 'Kit caneta e lapiseira com chaveiro', '17.5x11', ''),
('140966', 'Rádio relógio de plástico', '13x8.5x8', ''),
('140970', 'Porta tempero de plástico c/ 2 pçs', '10x4', ''),
('140971', 'Moedor de pimenta plástico', '17x6', ''),
('140975A', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975E', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975G', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975L', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975M', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975T', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975V', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('140975W', 'Caneca plástica 400 ml', '11.5x11.5x8.5', ''),
('141001', 'Mini luminária plástica p/ livro', '5.5x5x2', ''),
('141018', 'Squeeze de inox 400 ml', '17x6.5', ''),
('141018A', 'Squeeze de inox 400 ml', '17x6.5', ''),
('141018B', 'Squeeze de inox 400 ml', '17x6.5', ''),
('141018G', 'Squeeze de inox 400 ml', '17x6.5', ''),
('141018V', 'Squeeze de inox 400 ml', '17x6.5', ''),
('141019', 'Squeeze de inox 600 ml', '20.5x7', ''),
('141019A', 'Squeeze de inox 600 ml', '20.5x7', ''),
('141019B', 'Squeeze de inox 600 ml', '20.5x7', ''),
('141019G', 'Squeeze de inox 600 ml', '20.5x7', ''),
('141019V', 'Squeeze de inox 600 ml', '20.5x7', ''),
('141025', 'Chaveiro de metal', '8x3', ''),
('141173', 'Luminária de plástico p/ leitura', '12x3.5x2', ''),
('141175', 'Rádio de plástico', '', ''),
('141176', 'Relógio multifunção plástico', '11x6x3', ''),
('141177', 'Rádio relógio multifunção plástico', '19.5x7', ''),
('141193', 'Espelho c/ aumento e base metal', '12.5', ''),
('141200', 'Kit churrasco c/ 17 pçs', '47x24x8', ''),
('141222', 'Relógio de plástico c/ porta foto', '9x5.5x2.5', ''),
('141229', 'Canivete c/ 7 funções', '9x2.5x2', ''),
('141231', 'Balança p/ cozinha digital', '19x15x4', ''),
('141232', 'Balança p/ cozinha digital', '24x17x4', ''),
('141235', 'Jogo de ferramentas c/ 6 pçs', '13.5x9x2', ''),
('141237', 'Espelho de bolso duplo c/ luz', '7x2', ''),
('141244A', 'Bloco p/ anotação (azul)', '10x7x3', ''),
('141244P', 'Bloco p/ anotação (preto)', '10x7x3', ''),
('141248', 'Jogo de xadrez de plástico', '16x8x2.5', ''),
('141253', 'Régua plástica c/ calculadora', '20x5', ''),
('141256', 'Mini rádio FM auto procura', '', ''),
('141263', 'Espelho de bolso duplo c/ aumento', '8x6.5', ''),
('141264', 'Espelho de bolso duplo c/ luz', '7x7x2', ''),
('141266', 'Cantil de inox 1 litro c/ estojo', '32.5x8', ''),
('141267', 'Moedor de pimenta de metal', '15x3', ''),
('141268', 'Kit ferramentas c/ 8 pçs', '9x9x3', ''),
('141275M', 'Kit queijo c/ 6 pçs (ímã)', '20x20x8', ''),
('141276A', 'Kit queijo c/ 5 pçs', '17x17x5.5', ''),
('141283', 'Lanterna c/ kit ferramentas', '19x12x8', ''),
('141284', 'Lanterna c/ kit ferramentas', '19x12x8', ''),
('141295', 'Caneca de inox e plástico 400 ml', '16.5x11.5x8', ''),
('141303', 'Relógio multifunção de plástico', '9x9x3.5', ''),
('141306', 'Cantil de inox 235 ml', '13.5x9x2.5', ''),
('141307', 'Cantil de inox 200 ml', '12x9x2.5', ''),
('141309P', 'Kit pincéis c/ 5 pçs', '14.5x8', ''),
('141309T', 'Kit	pincéis c/ 5 pçs', '14.5x8', ''),
('141312', 'Chaveiro de metal', '6x3', ''),
('141316', 'Relógio multifunção com porta foto', '15.5x11x1.5', ''),
('141705', 'Chaveiro de metal', '8.5x3', ''),
('141706', 'Chaveiro de metal', '8.5x2.7', ''),
('141708B', 'Espelho e escova de bolso', '14x8', ''),
('141709', 'Mosquetão c/ bússola', '7x3', ''),
('141713', 'Chaveiro de metal giratório', '8.5x3', ''),
('141716', 'Cantil de inox 265 ml', '15x9.5x2.5', ''),
('141719', 'Cantil de inox 500 ml c/ estojo', '24.5x7', ''),
('141730', 'Saca rolhas de metal', '20.5x10', ''),
('141733A', 'Kit queijo c/ 5 pçs', '26x3', ''),
('141734', 'Kit churrasco c/ avental', '60x42', ''),
('141739', 'Saca rolhas de metal c/ base', '8.5x15x7.5', ''),
('141742', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742A', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742B', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742G', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742L', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742V', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742W', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141742Y', 'Squeeze de inox 500 ml', '19.5x6.5', ''),
('141764', 'Conjunto mini ferramentas de precisão', '10.5x4x3.5', ''),
('141765', 'Jogo de ferramentas c/ 6 pçs e estojo', '15x10.5', ''),
('141767C', 'Kit costura com estojo', '6.5x6.5x1.5', ''),
('141767P', 'Kit costura com estojo', '6.5x6.5x1.5', ''),
('141771', 'Alicate com canivete e prendedor', '11.5x3.5x1.5', ''),
('141772', 'Kit manicure c/ 8 pçs e estojo', '14x8.5x2.8', ''),
('141773B', 'Kit manicure c/ 7 pçs', '11x7x2.3', ''),
('141773C', 'Kit manicure c/ 7 pçs', '', ''),
('141773P', 'Kit manicure c/ 7 pçs', '11x7x2.3', ''),
('141773R', 'Kit manicure c/ 7 pçs', '11x7x2.3', ''),
('141773V', 'Kit manicure c/ 7 pçs', '11x7x2.3', ''),
('141774', 'Alicate multifunção', '10.5x6x1.5', ''),
('141776', 'Kit manicure c/ 9 pçs e estojo', '14.5x7.5x2.5', ''),
('141778', 'Lanterna de plástico manual', '12x3.5x6.5', ''),
('141780', 'Chaveiro de metal giratório', '7x3', ''),
('141780B', 'Chaveiro de metal giratório', '7.5x3', ''),
('141780C', 'Chaveiro de metal giratório', '6.5x3', ''),
('141780D', 'Chaveiro de metal giratório', '7.5x3', ''),
('141780R', 'Chaveiro de metal giratório', '6.5x3', ''),
('141796P', 'Mouse pad', '24.5x21', ''),
('141797', 'Chaveiro de metal giratório', '8.5x3', ''),
('141808', 'Vaporizador de perfume 5 ml', '8.3x1.8', ''),
('141809', 'Vaporizador de perfume 8 ml', '9x2.3', ''),
('141810', 'Kit caneta e lapiseira com chaveiro e canivete', '18.5x15.5', ''),
('141810A', 'Kit caneta e lapiseira com chaveiro e canivete', '18.5x15.5', ''),
('141810B', 'Kit caneta e lapiseira com chaveiro e canivete', '18.5x15.5', ''),
('141813', 'Caneca de inox 450 ml', '18x12x8', ''),
('141816', 'Saca rolhas de metal', '13x4x0.6', ''),
('141821A', 'Caneca portátil plástica', '14x14x10.5', ''),
('141821T', 'Caneca portátil plástica', '14x14x10.5', ''),
('141821V', 'Caneca portátil plástica', '14x14x10.5', ''),
('141823', 'Porta caneta com relógio digital', '11x8.5', ''),
('141824', 'Moedor de pimenta a pilha', '22.5x5.2', ''),
('141825P', 'Squeeze de inox 500 ml', '25x7.5', ''),
('141830', 'Pincel p/ cosméticos', '12x2.2', ''),
('141832', 'Chaveiro de metal', '8x3', ''),
('141834', 'Chaveiro de metal', '8x3', ''),
('141836', 'Canivete c/ 4 funções', '5.5x2x0.7', ''),
('141837', 'Lanterna plástica c/ chaveiro', '6x2.5', ''),
('141837A', 'Lanterna plástica c/ chaveiro', '6x2.5', ''),
('141837S', 'Lanterna plástica c/ chaveiro', '6x2.5', ''),
('141837V', 'Lanterna plástica c/ chaveiro', '6x2.5', ''),
('141838', 'Lanterna plástica c/ chaveiro', '6x3.5', ''),
('141838A', 'Lanterna plástica c/ chaveiro', '6x3.5', ''),
('141838S', 'Lanterna plástica c/ chaveiro', '6x3.5', ''),
('141838V', 'Lanterna plástica c/ chaveiro', '6x3.5', ''),
('141840', 'Canivete c/ 4 funções', '8.5x3', ''),
('141851', 'Kit manicure c/ 11 pçs e estojo', '15.5x11x2.5', ''),
('141851S', 'Kit manicure c/ 11 pçs e estojo', '15.5x11x2.5', ''),
('141851V', 'Kit manicure c/ 11 pçs e estojo', '15.5x11x2.5', ''),
('141854A', 'Bloco p/ anotação (azul)', '9x9x2.7', ''),
('141854P', 'Bloco p/ anotação (preto)', '9x9x2.7', ''),
('141856', 'Lanterna plástica c/ chaveiro', '7.5x3', ''),
('141859', 'Mini kit costura', '7.5x5x1', ''),
('141861', 'Espelho c/ escova e kit costura', '14x8', ''),
('141864', 'Lanterna de plástico recarregável', '10x5x2.5', ''),
('141864A', 'Lanterna de plástico recarregável', '10x5x2.5', ''),
('141864C', 'Lanterna de plástico recarregável', '10x5x2.5', ''),
('141864V', 'Lanterna de plástico recarregável', '10x5x2.5', ''),
('141867', 'Canivete com talheres', '11x4x3', ''),
('141868', 'Kit churrasco c/ 7 pçs e avental', '60x42', ''),
('141868C', 'Kit churrasco c/ 7 pçs e avental', '60x42', ''),
('141869', 'Kit churrasco c/ 4 pçs', '38x11x7', ''),
('141872', 'Lanterna de plástico recarregável', '10x5x2,5', ''),
('141873D', 'Kit pincéis c/ 5 pçs', '20x5', ''),
('141876C', 'Chaveiro de metal', '9x3,5', ''),
('141876P', 'Chaveiro de metal', '9x3,5', ''),
('141878', 'Porta foto de alumínio 10x15 cm', '15x10', ''),
('141883B', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141883P', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141883V', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141884A', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141884G', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141884T', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141884V', 'Caneca plástica 400 ml', '11,5x11,5x8,5', ''),
('141887A', 'Kit queijo c/ 5 pçs', '33,5x13x3.5', ''),
('141889', 'Kit churrasco c/ 3 pçs', '37x10x8', ''),
('141890P', 'Kit churrasco c/ 4 pçs', '39x13.5x4.5', ''),
('141891P', 'Kit vinho c/ 5 pçs e estojo', '21x15x5', ''),
('141892P', 'Kit vinho c/ 4 pçs e estojo', '17.5x15x5', ''),
('141893', 'Porta foto de acrílico 10x14 cm', '14x10', ''),
('141899', 'Moedor de pimenta manual', '14x4.5', ''),
('141900', 'Moedor de pimenta manual', '21.5x5', ''),
('143002A', 'Kit queijo c/ 3 pçs', '16x12.5x3.5', ''),
('143004C', 'Kit churrasco c/ 3 pçs', '45x15', ''),
('143004P', 'Kit churrasco c/ 3 pçs', '45x15', ''),
('143005', 'Relógio digital c/ prendedor', '8.5x5.5x2.5', ''),
('143007', 'Kit costura c/ estojo', '12.5x10x3', ''),
('143008', 'Kit costura c/ estojo', '17x8.5x2.5', ''),
('143013', 'Canivete c/ 4 funções', '7x2x2', ''),
('143014R', 'Kit manicure c/ 3 pçs', '7.5x4.5x2', ''),
('143016', 'Lupa plástica c/ luz', '9x5.5x1', ''),
('143019', 'Chaveiro de metal', '7.5x3', ''),
('143020A', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143020P', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143020V', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143021A', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143021P', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143021V', 'Chaveiro plástico c/ luz', '7.5x4', ''),
('143024', 'Chaveiro de metal', '8x3', ''),
('143025', 'Chaveiro de metal', '8x3', ''),
('143026', 'Moedor de pimenta de metal', '11.8x5.3', ''),
('143027', 'Squeeze de inox 500 ml', '20x6.5', ''),
('143027A', 'Squeeze de inox 500 ml', '20x6.5', ''),
('143027V', 'Squeeze de inox 500 ml', '20x6.5', ''),
('143028', 'Kit caneta e lapiseira com chaveiro e porta cartão', '19,5x17', ''),
('143029', 'Jogo de ferramentas c/ 4 pçs', '10,5x1,5x1,5', ''),
('143030', 'Jogo de ferramentas c/ lanterna e chaveiro', '7x2x2', ''),
('143035', 'Kit churrasco c/ 2 pçs', '36x9.5x3', ''),
('143035P', 'Kit churrasco c/ 2 pçs', '36x9.5x3', ''),
('143036', 'Kit churrasco c/ 4 pçs', '43x15,5x6', ''),
('143037', 'Kit churrasco c/ 4 pçs', '49x15,5x6', ''),
('143038', 'Caneca de inox 180 ml', '10x8x7', ''),
('143039A', 'Kit queijo c/ 4 pçs', '20,5x19x3', ''),
('143040', 'Cantil de inox 350 ml', '19,5x7', ''),
('143042', 'Porta copo de inox', '13x6', ''),
('143045', 'Relógio digital plástico', '10,5x3x3', ''),
('143046', 'Lupa de plástico c/ capa', '8,5x6.5', ''),
('143049', 'Lupa 90mm c/ luz', '23.5x11x2', ''),
('143058', 'Lanterna c/ kit ferramentas', '19x12x9', ''),
('143059', 'Kit vinho c/ 4 pçs', '16.5x13x2.5', ''),
('143060', 'Kit vinho c/ 4 pçs', '17x11.5x2.5', ''),
('143061P', 'Kit manicure c/ 6 pçs', '10x5.5x2.5', ''),
('143062', 'Kit vinho c/ 2 pçs', '11x11x2.5', ''),
('143064', 'Jogo de talheres dobráveis', '12x7.5', ''),
('143066', 'Mini luminária p/ leitura c/ clip', '19x8', ''),
('143067', 'Mini luminária p/ leitura c/ clip', '19x8', ''),
('143069B', 'Chaveiro de metal', '8x3', ''),
('143069R', 'Chaveiro de metal', '7x3.5', ''),
('143070', 'Chaveiro de metal', '7x3.5', ''),
('143072', 'Mini lâmpada p/ leitura c/ clip', '25x2.5x2.5', ''),
('143076', 'Lupa de plástico c/ capa', '5.5x5.5', ''),
('143077', 'Porta caneta c/ bloco p/ anotação', '13x10.5x2', ''),
('143078', 'Porta caneta c/ bloco p/ anotação', '18x10.5x2', ''),
('143079', 'Lupa de plástico c/ capa', '8.5x6.5x1.8', ''),
('143083', 'Kit vinho c/ 4 pçs', '17x11.5', ''),
('143084', 'Kit vinho c/ 4 pçs', '17x13', ''),
('143085A', 'Jogo de ferramentas c/ 6 pçs', '10x3x1.8', ''),
('143085P', 'Jogo de ferramentas c/ 6 pçs', '10x3x1.8', ''),
('143085V', 'Jogo de ferramentas c/ 6 pçs', '10x3x1.8', ''),
('143086', 'Gancho de metal p/ bolsas', '11x7', ''),
('143086P', 'Gancho de metal p/ bolsas', '11x7', ''),
('143087', 'Gancho de metal p/ bolsas', '4.5', ''),
('143088', 'Gancho de metal p/ bolsas', '4.5', ''),
('143091A', 'Caneca plástica 400 ml', '12x11.5x8.5', ''),
('143091C', 'Caneca plástica 400 ml', '12x11.5x8.5', ''),
('143091T', 'Caneca plástica 400 ml', '12x11.5x8.5', ''),
('143091V', 'Caneca plástica 400 ml', '12x11.5x8.5', ''),
('143092', 'Jogo de facas p/ cozinha c/ estojo', '36.5x26x3.5', ''),
('143093A', 'Jogo de facas p/ cozinha c/ suporte', '34x29x9', ''),
('143093G', 'Jogo de facas p/ cozinha c/ suporte', '34x29x9', ''),
('143094A', 'Caneca plástica 400 ml', '14.5x12x3.5', ''),
('143094T', 'Caneca plástica 400 ml', '14.5x12x3.5', ''),
('143094V', 'Caneca plástica 400 ml', '14.5x12x3.5', ''),
('143098', 'Cortador de unha c/ chaveiro', '5.5x3.2', ''),
('143099', 'Saca rolhas c/ abridor e canivete', '12x2.5x1.2', ''),
('143099A', 'Saca rolhas c/ abridor e canivete', '12x2.5x1.2', ''),
('143099V', 'Saca rolhas c/ abridor e canivete', '12x2.5x1.2', ''),
('143102', 'Relógio plástico c/ calculadora', '10x2.3x5.7', ''),
('143104', 'Gancho de metal p/ bolsas', '11x7', ''),
('143104P', 'Gancho de metal p/ bolsas', '11x7', ''),
('143105', 'Chaveiro de metal', '8.5x4.5', ''),
('143106A', 'Tampa de metal p/ garrafa', '9x2', ''),
('143107C', 'Kit churrasco c/ 5 pçs', '60x42', ''),
('143107G', 'Kit churrasco c/ 5 pçs', '60x42', ''),
('143107P', 'Kit churrasco c/ 5 pçs', '60x42', ''),
('143108', 'Abridor de carta de metal', '14x2.5', ''),
('143109', 'Necessaire de plástico', '16x9x6', ''),
('143110C', 'Necessaire de plástico', '20x10x6.5', ''),
('143110R', 'Necessaire de plástico', '20x10x6.5', ''),
('143113', 'Balança p/ bagagem', '20x7x2.3', ''),
('143116T', 'Caneca plástica 400 ml', '15.5x8', ''),
('143117', 'Porta copos de inox', '10x3.5', ''),
('143118', 'Porta copos de inox', '9.5x3.5', ''),
('143121', 'Chaveiro abridor de garrafa', '8.5x1x1.5', ''),
('143122', 'Kit ferramentas c/ estojo', '18x10x4', ''),
('143123A', 'Canivete c/ bússola', '9x3x2.3', ''),
('143123P', 'Canivete c/ bússola', '9x3x2.3', ''),
('143124', 'Ferramenta de inox c/ 11 funções', '7x4.5', ''),
('143126P', 'Mini balança', '23x13x2', ''),
('143127', 'Espelho de bolso duplo', '6.5x6.5x0.7', ''),
('143128', 'Kit manicure c/ 5 pçs', '10.5x4.5x3', ''),
('143129', 'Jogo de facas c/ 5 pçs', '36x25x3.5', ''),
('143130A', 'Jogo de ferramentas c/ 6 pçs', '10x3.5x1.8', ''),
('143130C', 'Jogo de ferramentas c/ 6 pçs', '10x3.5x1.8', ''),
('143130V', 'Jogo de ferramentas c/ 6 pçs', '10x3.5x1.8', ''),
('143131', 'Espelho de bolso duplo', '7', ''),
('143132A', 'Bloco p/ anotação c/ refil', '12x7.5x1', ''),
('143132C', 'Bloco p/ anotação c/ refil', '12x7.5x1', ''),
('143132P', 'Bloco p/ anotação c/ refil', '12x7.5x1', ''),
('143132V', 'Bloco p/ anotação c/ refil', '12x7.5x1', ''),
('143133', 'Kit churrasco c/ 6 pçs', '36x15x2.5', ''),
('143134', 'Kit churrasco c/ 7 pçs', '36x15.5x3', ''),
('143135', 'Kit churrasco c/ 8 pçs', '36x24x4', ''),
('143136', 'Chaveiro de metal giratório', '8.5x3.5', ''),
('143137', 'Relógio c/ porta foto e porta canetas', '14x14x3', ''),
('143138A', 'Mini lanterna manual', '9.5x2', ''),
('143138P', 'Mini lanterna manual', '9.5x2', ''),
('143138S', 'Mini lanterna manual', '9.5x2', ''),
('143138V', 'Mini lanterna manual', '9.5x2', ''),
('143139A', 'Lanterna plástica c/ chaveiro', '4x2,7', ''),
('143139P', 'Lanterna plástica c/ chaveiro', '4x2,7', ''),
('143139S', 'Lanterna plástica c/ chaveiro', '4x2,7', ''),
('143139V', 'Lanterna plástica c/ chaveiro', '4x2,7', ''),
('143140A', 'Mini lanterna manual c/ mosquetão', '5,5x1,5', ''),
('143140P', 'Mini lanterna manual c/ mosquetão', '5,5x1,5', ''),
('143140S', 'Mini lanterna manual c/ mosquetão', '5,5x1,5', ''),
('143140V', 'Mini lanterna manual c/ mosquetão', '5,5x1,5', ''),
('143142P', 'Mouse pad c/ calculadora', '27x20.5x1.7', ''),
('143143A', 'Squeeze plástico 450 ml', '20x6', ''),
('143143G', 'Squeeze plástico 450 ml', '20x6', ''),
('143143P', 'Squeeze plástico 450 ml', '20x6', ''),
('143143V', 'Squeeze plástico 450 ml', '20x6', ''),
('143144', 'Kit queijo c/ 4 pçs', '19x16.5x2', ''),
('143145', 'Kit queijo c/ 5 pçs', '23x5', ''),
('143146', 'Moedor de pimenta manual', '14x9x4.5', ''),
('143147A', 'Squeeze de inox 600 ml', '24x7', ''),
('143147G', 'Squeeze de inox 600 ml', '24x7', ''),
('143147P', 'Squeeze de inox 600 ml', '24x7', ''),
('143147V', 'Squeeze de inox 600 ml', '24x7', ''),
('143148', 'Mosquetão de alumínio', '8x4', ''),
('143149', 'Mosquetão de alumínio', '6.5x3.3', ''),
('143150', 'Lanterna c/ kit ferramentas', '19.5x12.5x4.5', ''),
('143151A', 'Mini chave de fenda e estojo', '7x2.5x1.5', ''),
('143151P', 'Mini chave de fenda e estojo', '7x2.5x1.5', ''),
('143151V', 'Mini chave de fenda e estojo', '7x2.5x1.5', ''),
('143152', 'Lanterna c/ kit ferramentas', '19.5x13.5x7', ''),
('143153', 'Binóculos', '11x11x3', ''),
('143155', 'Kit manicure c/ 10 pçs', '15.5x10.5x2.5', ''),
('143156', 'Chaveiro c/ canivete c/ 4 funções', '9.5x3', ''),
('143157', 'Chaveiro c/ canivete c/ 4 funções', '9.5x3', ''),
('143158B', 'Chaveiro de metal', '7x3', ''),
('143158R', 'Chaveiro de metal', '7x3', ''),
('143159A', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143159B', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143159C', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143159L', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143159P', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143159V', 'Estojo c/ bloco p/ anotação', '13x11.5x1.5', ''),
('143160', 'Bloco p/ anotação', '9x9x2', ''),
('143161', 'Bloco p/ anotação', '13x9', ''),
('143162', 'Porta cartão de metal', '9.5x6x0.7', ''),
('143163M', 'Porta cartão de couro sintético', '9.5x6', ''),
('143163P', 'Porta cartão de couro sintético', '9.5x6', ''),
('143164P', 'Chaveiro de metal', '9.5x3', ''),
('143165A', 'Chaveiro de metal giratório', '8.5x3.5', ''),
('143165I', 'Chaveiro de metal giratório', '8.5x3.5', ''),
('143170A', 'Chaveiro de metal', '8x3', ''),
('143170G', 'Chaveiro de metal', '8x3', ''),
('143170L', 'Chaveiro de metal', '8x3', ''),
('143170P', 'Chaveiro de metal', '8x3', ''),
('143170V', 'Chaveiro de metal', '8x3', ''),
('143171A', 'Chaveiro de metal giratório', '8.5x4', ''),
('143171L', 'Chaveiro de metal giratório', '8.5x4', ''),
('143171V', 'Chaveiro de metal giratório', '8.5x4', ''),
('143172', 'Saca rolhas de metal', '12x2x1.2', ''),
('143173', 'Calculadora eletrônica', '10x6', ''),
('143174', 'Calculadora eletrônica', '10x6', ''),
('143175', 'Luz de LED p/ notebook', '42x2.5', ''),
('143176A', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176B', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176C', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176G', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176GG', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176L', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176P', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176R', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176V', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143176Y', 'Squeeze plástico dobrável 450 ml', '26x12', ''),
('143178', 'Kit queijo c/ 3 pçs', '14x8', ''),
('143179', 'Chaveiro de metal giratório', '7x3.5', ''),
('143180', 'Bico dosador p/ garrafa', '7.5x2', ''),
('143181', 'Chaveiro de metal c/ cortador de unha', '9x3', ''),
('143182A', 'Lanterna c/ jogo de ferramentas', '9.3x3.5x1.3', ''),
('143182P', 'Lanterna c/ jogo de ferramentas', '9.3x3.5x1.3', ''),
('143182V', 'Lanterna c/ jogo de ferramentas', '9.3x3.5x1.3', ''),
('143183', 'Kit churrasco c/ 4 pçs', '38x11.5x5', ''),
('143184', 'Kit churrasco c/ 3 pçs', '38x9x5', ''),
('143185', 'Kit queijo c/ 5 pçs', '22x3.5', ''),
('143186A', 'Squeeze plástico com canudo 400 ml', '19.5x7', ''),
('143186P', 'Squeeze plástico com canudo 400 ml', '19.5x7', ''),
('143186V', 'Squeeze plástico com canudo 400 ml', '19.5x7', ''),
('143187A', 'Cantil 500 ml', '23x6,5', ''),
('143187S', 'Cantil 500 ml', '23x6,5', ''),
('143187V', 'Cantil 500 ml', '23x6,5', ''),
('143188', 'Espelho de bolso duplo', '8.5x6', ''),
('143189', 'Espelho de bolso duplo', '8.5x6x0.8', ''),
('143190', 'Kit vinho c/ 5 pçs', '17x16.5x3', ''),
('143191B', 'Chaveiro de metal', '8x2.7', ''),
('143191K', 'Chaveiro de metal', '8x3', ''),
('143191R', 'Chaveiro de metal', '7x3.5', ''),
('143192A', 'Squeeze plástico 600 ml', '24.5x7', ''),
('143192P', 'Squeeze plástico 600 ml', '24.5x7', ''),
('143192V', 'Squeeze plástico 600 ml', '24.5x7', ''),
('143193', 'Canivete c/ 10 funções', '9.5x2.5x1.8', ''),
('143194', 'Kit manicure c/ 18 pçs', '18x12x2', ''),
('143195', 'Kit manicure c/ 15 pçs', '17x12.5x2', ''),
('143196', 'Kit manicure c/ 12 pçs', '15.5x10x2', ''),
('143197', 'Vaporizador de perfume 10 ml', '9.5x2.3', ''),
('143198', 'Espelho de bolso duplo', '7.3x6.5', ''),
('143199', 'Kit churrasco c/ 18 pçs', '44.5x30.5x6.5', ''),
('143200A', 'Chaveiro de metal', '9.5x4', ''),
('143201A', 'Chaveiro de metal', '9x3.5', ''),
('143203A', 'Estojo c/ bloco p/ anotação', '13x9x1', ''),
('143203B', 'Estojo c/ bloco p/ anotação', '13x9x1', ''),
('143203C', 'Estojo c/ bloco p/ anotação', '13x9x1', ''),
('143203V', 'Estojo c/ bloco p/ anotação', '13x9x1', ''),
('143204', 'Caneca de metal 180 ml', '9x10x6.7', ''),
('143205A', 'Lanterna portátil c/ clip', '22x4.5', ''),
('143205B', 'Lanterna portátil c/ clip', '22x4.5', ''),
('143205C', 'Lanterna portátil c/ clip', '22x4.5', ''),
('143206', 'Pinça de metal c/ luz', '9x2.5', ''),
('143207A', 'Lanterna plástica c/ chaveiro', '9x3.3x0.7', ''),
('143207P', 'Lanterna plástica c/ chaveiro', '9x3.3x0.7', ''),
('143207V', 'Lanterna plástica c/ chaveiro', '9x3.3x0.7', ''),
('143208A', 'Chaveiro de metal', '9x3.5', ''),
('143209A', 'Chaveiro de metal', '10x3.5', ''),
('143210', 'Chaveiro c/ bússola e luz', '9.5x3.5', ''),
('143211P', 'Kit vinho c/ 4 pçs e estojo', '16.5x14.5x5.5', ''),
('143212', 'Porta batom', '8.5x3.3x3.3', ''),
('143213A', 'Chaveiro de metal', '9x3.5', ''),
('236141', 'Porta foto plástico 10x15 cm', '10x15', ''),
('236145', 'Porta foto plástico 10x15 cm', '10x15', ''),
('236154', 'Porta foto plástico 13x18 cm', '13x18', ''),
('236155', 'Porta foto plástico 13x18 cm', '13x18', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
