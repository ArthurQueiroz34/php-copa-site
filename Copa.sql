-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28-Nov-2022 às 13:52
-- Versão do servidor: 10.5.11-MariaDB-1
-- versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Copa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Admin`
--

INSERT INTO `Admin` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Home`
--

CREATE TABLE `Home` (
  `id` int(11) NOT NULL,
  `conteudo` longtext NOT NULL,
  `dtCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Home`
--

INSERT INTO `Home` (`id`, `conteudo`, `dtCadastro`) VALUES
(1, '<!-- ======= Hero Section ======= -->\r\n  <section id=\"hero\">\r\n    <div class=\"hero-container\">\r\n      <div id=\"heroCarousel\" data-bs-interval=\"5000\" class=\"carousel slide carousel-fade\" data-bs-ride=\"carousel\">\r\n\r\n        <ol class=\"carousel-indicators\" id=\"hero-carousel-indicators\"><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"0\" class=\"active\"></li><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"1\"></li><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"2\"></li><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"0\" class=\"active\"></li><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"1\"></li><li data-bs-target=\"#heroCarousel\" data-bs-slide-to=\"2\"></li></ol>\r\n\r\n        <div class=\"carousel-inner\" role=\"listbox\">\r\n\r\n          <!-- Slide 1 -->\r\n          <div class=\"carousel-item active\" style=\"background-image: url(assets/img/slide/slide-1.jpg)\">\r\n            <div class=\"carousel-container\">\r\n              <div class=\"carousel-content\">\r\n                <h2 class=\"animate__animated animate__fadeInDown\"><span>Copa do Mundo 2022</span></h2>\r\n                <p class=\"animate__animated animate__fadeInUp\">Conheça sobre a Copa deste ano!</p>\r\n                <a href=\"#\" class=\"btn-get-started animate__animated animate__fadeInUp\">Leia mais</a>\r\n              </div>\r\n            </div>\r\n          </div>\r\n\r\n          <!-- Slide 2 -->\r\n          <div class=\"carousel-item\" style=\"background-image: url(assets/img/slide/slide-2.jpg)\">\r\n            <div class=\"carousel-container\">\r\n              <div class=\"carousel-content\">\r\n                <h2 class=\"animate__animated fanimate__adeInDown\">Jogadores do <span>Brasil</span></h2>\r\n                <p class=\"animate__animated animate__fadeInUp\">Fique por dentro da escalação brasileira</p>\r\n                <a href=\"jogadores.php\" class=\"btn-get-started animate__animated animate__fadeInUp\">Ver</a>\r\n              </div>\r\n            </div>\r\n          </div>\r\n\r\n          <!-- Slide 3 -->\r\n          <div class=\"carousel-item\" style=\"background-image: url(assets/img/slide/slide-3.jpg)\">\r\n            <div class=\"carousel-container\">\r\n              <div class=\"carousel-content\">\r\n                <h2 class=\"animate__animated animate__fadeInDown\">Seleções da <span>Copa 2022</span></h2>\r\n                <p class=\"animate__animated animate__fadeInUp\">Veja o grupo do Brasil e outras seleções</p>\r\n                <a href=\"selecoes.php\" class=\"btn-get-started animate__animated animate__fadeInUp\">Ver</a>\r\n              </div>\r\n            </div>\r\n          </div>\r\n\r\n        </div>\r\n\r\n        <a class=\"carousel-control-prev\" href=\"#heroCarousel\" role=\"button\" data-bs-slide=\"prev\">\r\n          <span class=\"carousel-control-prev-icon bi bi-chevron-left\" aria-hidden=\"true\"></span>\r\n        </a>\r\n\r\n        <a class=\"carousel-control-next\" href=\"#heroCarousel\" role=\"button\" data-bs-slide=\"next\">\r\n          <span class=\"carousel-control-next-icon bi bi-chevron-right\" aria-hidden=\"true\"></span>\r\n        </a>\r\n\r\n      </div>\r\n    </div>\r\n  </section><!-- End Hero -->\r\n\r\n  <main id=\"main\">\r\n\r\n    \r\n\r\n    <!-- ======= About Section ======= -->\r\n    <section id=\"about\" class=\"about\">\r\n      <div class=\"container\">\r\n\r\n        <div class=\"row\">\r\n          <div class=\"col-lg-6\">\r\n            <img src=\"assets/img/about.jpg\" class=\"img-fluid\" alt=\"\">\r\n          </div>\r\n          <div class=\"col-lg-6 pt-4 pt-lg-0 content\">\r\n            <h3>Copa do Mundo FIFA de 2022</h3>\r\n            <p class=\"fst-italic\">\r\n            Kaʾs al-ʿālam li-kurat al-qadam 2022\r\n            </p>\r\n            <ul>\r\n            <p>\r\n            A Copa do Mundo FIFA de 2022 é a vigésima segunda edição desse evento esportivo, um torneio internacional de futebol masculino organizado pela Federação Internacional de Futebol (FIFA), que está ocorrendo no Catar. Esta edição é a primeira realizada no Oriente Médio, e é a última a ter o formato de 32 equipes, pois haverá uma mudança no formato e número de equipes na edição seguinte, a de 2026, cuja sede será no Canadá, Estados Unidos e México, passando para 48 equipes.\r\n            </p>\r\n          </ul></div>\r\n        </div>\r\n\r\n      </div>\r\n    </section><!-- End About Section -->\r\n\r\n    <!-- ======= Services Section ======= -->\r\n    <section id=\"services\" class=\"services\">\r\n      <div class=\"container\">\r\n\r\n        <div class=\"row\">\r\n\r\n          <div class=\"col-md-4 d-flex align-items-stretch mt-4\">\r\n            <div class=\"icon-box\">\r\n            <a href=\"selecoes.php\">\r\n              <div class=\"icon\"><i class=\"bx bx-world\"></i></div>\r\n            </a>\r\n              <h4><a href=\"selecoes.php\">Seleções</a></h4>\r\n              <p>Fique por dentro do grupo do Brasil e de outras seleções participantes da Copa 2022</p>\r\n            </div>\r\n          </div>\r\n\r\n          <div class=\"col-md-6 d-flex align-items-stretch mt-4\">\r\n            <div class=\"icon-box\">\r\n            <a href=\"jogadores.php\">\r\n              <div class=\"icon\"><i class=\"bx bx-football\"></i></div>\r\n            </a>\r\n              <h4><a href=\"jogadores.php\">Jogadores</a></h4>\r\n              <p>Veja os jogadores da escalação do Brasil e mais</p>\r\n            </div>\r\n          </div>\r\n\r\n        </div>\r\n\r\n      </div>\r\n    </section><!-- End Services Section -->\r\n\r\n  </main><!-- End #main -->', '2022-11-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Jogadores`
--

CREATE TABLE `Jogadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `posicao` int(10) NOT NULL,
  `selecao` int(10) NOT NULL,
  `dtCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Jogadores`
--

INSERT INTO `Jogadores` (`id`, `nome`, `posicao`, `selecao`, `dtCadastro`) VALUES
(1, 'Neymar Junior', 1, 1, '2022-11-28'),
(2, 'Lionel Messi', 1, 3, '2022-11-28'),
(3, 'Casemiro', 3, 1, '2022-11-28'),
(4, 'Antonio Rüdiger', 5, 4, '2022-11-28'),
(5, 'Alisson Becker', 6, 1, '2022-11-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Posicoes`
--

CREATE TABLE `Posicoes` (
  `id` int(11) NOT NULL,
  `posicao` varchar(3) NOT NULL,
  `dtCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Posicoes`
--

INSERT INTO `Posicoes` (`id`, `posicao`, `dtCadastro`) VALUES
(1, 'ATA', '2022-11-22'),
(3, 'VOL', '2022-11-28'),
(4, 'LAT', '2022-11-28'),
(5, 'ZAG', '2022-11-28'),
(6, 'GOL', '2022-11-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Selecoes`
--

CREATE TABLE `Selecoes` (
  `id` int(11) NOT NULL,
  `pais` varchar(60) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `dtCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Selecoes`
--

INSERT INTO `Selecoes` (`id`, `pais`, `sigla`, `dtCadastro`) VALUES
(1, 'Brasil', 'CBF', '2022-11-14'),
(3, 'Argentina', 'AFA', '2022-11-28'),
(4, 'Alemanha', 'DFB', '2022-11-28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Home`
--
ALTER TABLE `Home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Jogadores`
--
ALTER TABLE `Jogadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Posicoes`
--
ALTER TABLE `Posicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Selecoes`
--
ALTER TABLE `Selecoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Home`
--
ALTER TABLE `Home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Jogadores`
--
ALTER TABLE `Jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Posicoes`
--
ALTER TABLE `Posicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Selecoes`
--
ALTER TABLE `Selecoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
