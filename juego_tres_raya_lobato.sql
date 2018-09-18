-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2018 a las 10:33:39
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juego_tres_raya_lobato`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance_users`
--

CREATE TABLE `avance_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `personajes_desbloqueados` int(11) NOT NULL,
  `rondas_ganadas` int(11) NOT NULL,
  `rondas_jugadas` int(11) NOT NULL,
  `personaje_id` int(11) NOT NULL,
  `enemigo_id` int(11) NOT NULL,
  `historias_finalizadas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `avance_users`
--

INSERT INTO `avance_users` (`id`, `user_id`, `personajes_desbloqueados`, `rondas_ganadas`, `rondas_jugadas`, `personaje_id`, `enemigo_id`, `historias_finalizadas`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 87, 111, 8, 1, 1, '2018-08-30 12:56:06', '2018-09-06 06:41:30'),
(3, 3, 6, 6, 7, 4, 1, 0, '2018-09-01 09:55:27', '2018-09-01 10:01:18'),
(4, 4, 7, 13, 22, 4, 1, 0, '2018-09-02 02:04:15', '2018-09-02 02:27:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enemigos`
--

CREATE TABLE `enemigos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enemigos`
--

INSERT INTO `enemigos` (`id`, `nombre`, `descripcion`, `nombre_archivo`, `dificultad`, `created_at`, `updated_at`) VALUES
(1, 'Auto', 'Durante cientos de años ha sido el piloto de la nave Axiom. Cuando EVA logra traer la planta de la Tierra, este manda a GO-4 a robar su planta y colocarla en una cápsula para que se autodestruya.', 'x_11.jpg', 1, NULL, NULL),
(2, 'Omnidroid 10', 'Omnidroid 10 es el ultimo robot creado por Simdorme para destruir la ciudad. Omnidroid posee varios poderes sus brazos son muy fuertes capases de atravesar su porpio cuerpo.', 'x_12.jpg', 1, NULL, NULL),
(3, 'Shepherd', 'El Shepherd es uno de los DeeBees más estándar que verás en el campo de batalla. Equipado con un SMG, proveerá disparos ligeros, pero generalmente con números grandes. Seguido recomiendan comportamiento \"social\" con sus graciosos diálogos.\r\nComo los otros DeeBees, los Shepherds no fueron inicialmente creados para combate intenso, más bien para seguridad y trabajos peligrosos.', 'x_13.jpg', 1, NULL, NULL),
(4, 'V.I.K.I', 'Esta supercomputadora altamente avanzada y eficiente, Virtual Interactive Kinesthetic Interface -o simplemente VIKI para abreviar, fue una supercomputadora muy poderosa diseñada y utilizada por la empresa robótica USR . El error de su programación era que ella estaba demasiado preocupada por la seguridad de los humanos y por lo tanto, decidió tomar el control de la humanidad por su propia seguridad.', 'x_14.jpg', 1, NULL, NULL),
(5, 'Dr. Maki Gero', 'El doctor Maki Gero fue uno de los científicos que trabajaban en la sección de ingeniería robótica del Ejército Red Ribbon, creando maquinaria militar y diversos Androides. Su máxima creación fue Hatchan, una especie de Frankenstein pacifista.\r\nDurante muchos años, el Dr. Maki Gero perfeccionó su técnica y creó a los androides #16, #17, #18, #19 y su mayor creación: Cell. ', 'x_15.jpg', 1, NULL, NULL),
(6, 'Rock Monster', 'Rock Monster es un robot gigantesco que se desarma y ensambla con partículas de memoria de forma. De su único \"ojo\"/visor dispara energía.', 'x_21.jpg', 2, NULL, NULL),
(7, 'Warden Eternal', 'El Warden Eternal es una inteligencia artificial Forerunner asignada para actuar como el protector del Dominio. Después de que la Inteligente IA humana Cortana fue cargada en el Dominio tras la destrucción del Enfoque del Manto , el Alcaide fue burlado por Cortana y se vio obligado a servirla, ya que ella y otras IA humanas reclamaron el Manto.', 'x_22.jpg', 2, NULL, NULL),
(8, 'Megatron', 'Megatron es el nombre del malvado líder de los Decepticons (o Destrons) en las diferentes series de los Transformers.\r\nMegatron lucha para convertir a los Decepticons en la raza superior del universo sin importar el precio.', 'x_23.jpg', 2, NULL, NULL),
(9, 'GLaDOS', 'GLaDOS es la principal antagonista de la saga Portal y es una IA que controla todo en los laboratorios de Aperture Science.\r\nSu nombre es derivado de las palabras: Genetic Lifeform and Disk Operating System', 'x_24.jpg', 2, NULL, NULL),
(10, '343 Guilty Spark', '343 Guilty Spark conocido originalmente como Monitor Chakas, y conocido como Oráculo por las filas creyentes del Covenant, es una Inteligencia Artificial creada por los Forerunner. Él es el Monitor, cuidador e historiador encargado de vigilar la Instalación 04 y sus contenidos cuando los Forerunners partieron.', 'x_25.jpg', 2, NULL, NULL),
(11, 'Ultron', 'Él es más reconocido como un némesis de los Vengadores.\r\nUltron fue construido por Hank Pym de los Vengadores, mientras el famoso científico y aventurero experimentaba con la robótica de alta inteligencia.', 'x_31.jpg', 3, NULL, NULL),
(12, 'MissingNo', 'MissingNo es un Pokémon glitch que aparece en los juegos de la primera generación, principalmente en las versiones Roja y Azul. El comportamiento del bug simula al de un Pokémon.', 'x_32.jpg', 3, NULL, NULL),
(13, 'Grievous', 'Grievous fue un General cíborg Kaleesh que ostentaba el título de Comandante Supremo del Ejército Droide durante las Guerras Clon.\r\nBajo el mando de Grievous, el ejército droide causó estragos en toda la galaxia.', 'x_33.jpg', 3, NULL, NULL),
(14, 'Evil Morty', 'Evil Morty (Morty Malvado) es una de las infinitas versiones de Morty. Fue visto por primera vez en Encuentros cercanos con los Ricks como el antagonista secundario. En The Ricklantis Mixup fue visto como candidato para ser presidente de la ciudadela de los Ricks.', 'x_34.jpg', 3, NULL, NULL),
(15, 'Cortana', 'Cortana es una IA que forma una parte fundamental en la franquicia de los videojuegos del Universo de Halo y es la principal antagonista en la Saga del Reclamador.', 'x_35.jpg', 3, NULL, NULL),
(16, 'Mendicant Bias', 'Mendicant Bias fue la IA Forerunner más avanzada al momento de su creación, a la que se le asignó realizar la función de organizar las defensas de los Forerunners en contra del Flood durante la Guerra Forerunner-Flood. Sin embargo, más tarde desertó hacia el Flood, lo que finalmente causó que se volviera rampante y luchara en contra de sus creadores.', 'x_41.jpg', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2018_08_28_080032_create_save_game_table', 1),
(40, '2018_08_28_080133_create_avance_user_table', 1),
(41, '2018_08_28_081852_create_personaje_table', 1),
(42, '2018_08_28_081913_create_enemigo_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lobatos94@gmail.com', '$2y$10$ccixqN3A0mxhqLEAN9R0IOYvnmGyoTSJ2AONMRHGB/gI3FWdczaTu', '2018-09-02 01:54:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `descripcion`, `nombre_archivo`, `created_at`, `updated_at`) VALUES
(1, 'Cortana', 'Cortana es un asistente virtual creado por Microsoft. Cortana puede establecer recordatorios, reconocer voz natural sin la necesidad de ingresar el teclado y responder preguntas utilizando información del motor de búsqueda de Bing.', 'o_01.gif', NULL, NULL),
(2, 'Siri', 'Siri es una inteligencia artificial con funciones de asistente personal a veces con su propia personalidad para iOS. Entre las cualidades destacadas por la campaña de mercadeo de la aplicación se afirma que Siri es capaz de adaptarse con el paso del tiempo a las preferencias individuales de cada usuario.', 'o_02.gif', NULL, NULL),
(3, 'Android', 'Solo Android.', 'o_03.gif', NULL, NULL),
(4, 'Esfera del Dragón', 'Las Esferas del Dragón son 7 artefactos mágicos en el manga y anime Dragon Ball. Cuando se reúnen se utilizan para invocar a un dragón que concede uno o varios deseos. Esta invocación hace que el cielo del planeta donde se activen se nuble y oscurezca.', 'o_04.gif', NULL, NULL),
(5, 'Wilson', 'Naufrago.', 'o_05.gif', NULL, NULL),
(6, 'Poké Ball', 'Una Poké Ball es un artilugio u objeto diseñado para servir dos funciones básicas en el mundo Pokémon, almacenar y transportar Pokémon, haciendo posible la captura de Pokémon.', 'o_06.gif', NULL, NULL),
(7, 'Dragón de la Ira', 'Su portador es Meliodas, es el líder de los Siete Pecados Capitales. Él es el protagonista masculino de la historia, su pecado es la Ira y su símbolo el Dragón, también es el propietario del Boar Hat.', 'o_07.gif', NULL, NULL),
(8, 'Kirby', 'Su habilidad especial es la de absorber a los enemigos y copiar sus ataques, aunque esta habilidad no se le otorgó al personaje hasta la segunda entrega de este juego. Al comienzo sólo los absorbía y lanzaba en forma de estrella. Su habilidad de copiar ataques le da capacidad y poder para afrontar cualquier amenaza. También tiene poderes ilimitados y ocultos que provienen de la Warp Star.', 'o_08.gif', NULL, NULL),
(9, 'Knuckles', 'Knuckles es un equidna rojo que posee largas y afiladas púas que se asemejan a rastas. Tiene 16 años, mide 110 centímetros y pesa 40 kilogramos. Su cumpleaños es (probablemente) el 2 de febrero, la fecha en la que apareció por primera vez en un videojuego (todos estos datos son discutibles, según las diferentes versiones).', 'o_09.gif', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `save_games`
--

CREATE TABLE `save_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `personaje_id` int(11) NOT NULL,
  `enemigo_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `save_games`
--

INSERT INTO `save_games` (`id`, `user_id`, `personaje_id`, `enemigo_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 16, 1, '2018-08-31 10:12:50', '2018-09-05 15:09:26'),
(3, 3, 4, 7, 1, '2018-09-01 09:56:06', '2018-09-01 10:01:18'),
(4, 4, 4, 14, 1, '2018-09-02 02:04:46', '2018-09-02 02:26:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lobatos Mayer', 'lobatos94@gmail.com', '$2y$10$zEKomfKpGHd.jgQeSiSpcOYAgplQf.w6zMxVTYUApBDmUG3qICiyO', 'I1WF6G1EjqsEVSMpL4Mw6noEfXfLoQlfduosAo5l41yJ3DQr7KSIFexzswJs', '2018-08-30 12:56:06', '2018-08-30 12:56:06'),
(3, 'Itzel Venegas', 'kareny_35@hotmail.com', '$2y$10$fJ3joE3jmnFalopM.vPDdedkh8JR7KyRadgv4uhCRx0CWemQx57tW', NULL, '2018-09-01 09:55:26', '2018-09-01 09:55:26'),
(4, 'Yesi', 'yesi@hotmail.com', '$2y$10$vuSaQ2YzdnDIJk4Hu9YIeOEv2TfNcL1T3xGZFcIYuUnDgf2pjHt.2', NULL, '2018-09-02 02:04:15', '2018-09-02 02:04:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avance_users`
--
ALTER TABLE `avance_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enemigos`
--
ALTER TABLE `enemigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `save_games`
--
ALTER TABLE `save_games`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avance_users`
--
ALTER TABLE `avance_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `enemigos`
--
ALTER TABLE `enemigos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `save_games`
--
ALTER TABLE `save_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
