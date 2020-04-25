-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2020 a las 03:29:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `muestreo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Nueva'),
(2, 'En Proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE `muestra` (
  `id` int(11) NOT NULL,
  `tipo_trabajo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `nombre_cliente` varchar(150) DEFAULT NULL,
  `nombre_negocio` varchar(150) DEFAULT NULL,
  `rfc_negocio` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `id_estado` int(11) NOT NULL DEFAULT 1,
  `usuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `muestra`
--

INSERT INTO `muestra` (`id`, `tipo_trabajo`, `descripcion`, `nombre_cliente`, `nombre_negocio`, `rfc_negocio`, `fecha`, `ubicacion`, `id_estado`, `usuario`, `created_at`, `updated_at`) VALUES
(4, 'Residual agua potable', 'Se saco muestra a diferentes horas del agua potable del hotel Aurora por 24 horas', 'Beatriz Salas', 'Hotel Aurora', 'ATRJ29485894', '2020-03-10', 'Cananea, Sonora', 3, 5, '2020-04-13 12:17:17', '2020-04-13 12:17:17'),
(5, 'Residual de agua sanitaria 2', 'Hola', 'Beatriz Salas', 'Hotel Aurora', 'ATRJ29485894', '2020-03-10', 'Cananea, Sonora', 2, 5, '2020-04-13 12:19:11', '2020-04-23 08:48:44'),
(8, 'Instalacion bomba de agua', 'Se instalo en el filtro del hotel del agua potable una bomba', 'Ignacio Ymu', 'Liverpool', 'LIVE298499', '2020-04-01', 'Hermosillo, Sonora', 3, 5, '2020-04-23 09:02:16', '2020-04-23 09:02:45'),
(11, 'Instalacion de bomba de agua', 'Se instalo una bomba de agua para limpiar', 'Lupe Ortiz', 'Sanbors', 'SDO2038484', '2020-04-08', 'Obregon, Sonora', 1, 6, '2020-04-24 06:49:30', '2020-04-24 06:49:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0305f053535ca9003e98b8a4e056fdd91087ac870e2e95c28a140dc8cb61c26ab481149f397fe049', 5, 2, NULL, '[]', 0, '2020-04-23 08:23:24', '2020-04-23 08:23:24', '2021-04-23 01:23:24'),
('1ebe3877dbfbe8fd3c7cdff9a7b5c1f8ddeffc2d388a88e68bf9ee729ea25692e4141ef27e876d45', 5, 2, NULL, '[]', 0, '2020-04-25 05:35:50', '2020-04-25 05:35:50', '2021-04-24 22:35:50'),
('1f92ed03d54d8cbf5ffd5f67f17fcbaa6a97e3589ebda47403fea0b7c649ba2e119f6644e9dd521d', 5, 2, NULL, '[]', 0, '2020-04-13 12:12:25', '2020-04-13 12:12:25', '2021-04-13 05:12:25'),
('486d3d0bc1223c80be30414c2b48df424d3c216bd6bd7d2f5971fbcdd941d5e82be02abb85ffc660', 5, 2, NULL, '[]', 0, '2020-04-25 05:44:21', '2020-04-25 05:44:21', '2021-04-24 22:44:21'),
('49a11a533a88e9c95542f8d36e9c0c688ae26f1d930e291b5a039c38d3489381fec195ca2af88a71', 5, 2, NULL, '[]', 0, '2020-04-25 05:26:26', '2020-04-25 05:26:26', '2021-04-24 22:26:26'),
('60481e08f5b56936681482bea1e0daff559351497fe1d5e5e1d2bd678847b392a53cef48fdb8ddaa', 6, 2, NULL, '[]', 0, '2020-04-24 06:47:48', '2020-04-24 06:47:48', '2021-04-23 23:47:48'),
('ba15d8d0bda32bffc4968929ca6157671ef168721a023fe5cbfd959c7463742dd9e4cbdcd7bc195c', 6, 2, NULL, '[]', 0, '2020-04-24 07:27:17', '2020-04-24 07:27:17', '2021-04-24 00:27:17'),
('bee161005e8b5bf5e8a10187c556ff5161609f4d75d561c2645f2b0bd5092fd586330190b6bf47dc', 6, 2, NULL, '[]', 0, '2020-04-25 05:33:41', '2020-04-25 05:33:41', '2021-04-24 22:33:41'),
('cebb9a3ad989bfd5165ba324641324722d78ef52c340329fa924d2231b6829bc53989d906ed754bc', 6, 2, NULL, '[]', 0, '2020-04-25 05:37:03', '2020-04-25 05:37:03', '2021-04-24 22:37:03'),
('db4f630bec2f6676037ddf00df9b05cb2974bfd14ae03cfb55fe095c387eef20a316d51ae3455661', 6, 2, NULL, '[]', 0, '2020-04-25 05:32:41', '2020-04-25 05:32:41', '2021-04-24 22:32:41'),
('e35f5ebb07b490a7715a399af6f46350f409475270c36f3374f2cbfdb6fa37d25be919c5ec56384d', 6, 2, NULL, '[]', 0, '2020-04-25 05:32:02', '2020-04-25 05:32:02', '2021-04-24 22:32:02'),
('fd0c2124cc7f2d8223804a929fa8ebf5598b71d7f6a7e5489666691120395e50ec2d1cf87d135a8e', 6, 2, NULL, '[]', 0, '2020-04-25 05:35:42', '2020-04-25 05:35:42', '2021-04-24 22:35:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'M94FvoYIs7HsqegJFQDBIX1DUkJ8p7IcyIn0UI21', 'http://localhost', 1, 0, 0, '2020-04-02 08:15:52', '2020-04-02 08:15:52'),
(2, NULL, 'Laravel Password Grant Client', 'Gjs6DtyWgizf0PqFhy8Pq66FHTtJu8zfUM0ai6nU', 'http://localhost', 0, 1, 0, '2020-04-02 08:15:53', '2020-04-02 08:15:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-02 08:15:53', '2020-04-02 08:15:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('00e463141168f466b4a3ca38bb525ce89290d9b0d482d9ae0a5dbbdf362ec1f5f16a7339e5fe73d2', '1f92ed03d54d8cbf5ffd5f67f17fcbaa6a97e3589ebda47403fea0b7c649ba2e119f6644e9dd521d', 0, '2021-04-13 05:12:25'),
('0121e0ebdf739c443f29d336c0007d540ab22ce5b28468af454738135e79f6079c927f6de7840556', 'fd0c2124cc7f2d8223804a929fa8ebf5598b71d7f6a7e5489666691120395e50ec2d1cf87d135a8e', 0, '2021-04-24 22:35:42'),
('0bc22a00793b0eb210dec2fbdbdb99ef08df5e1847e5261d4c0ece38bdf0cef0eb36c68667e0d317', '60481e08f5b56936681482bea1e0daff559351497fe1d5e5e1d2bd678847b392a53cef48fdb8ddaa', 0, '2021-04-23 23:47:48'),
('22d856b7b66597d9ae9ecaa22c751d0bcd83ec2708aca730250ba1bffc6d77f30ee84ba194f4e3c9', 'db4f630bec2f6676037ddf00df9b05cb2974bfd14ae03cfb55fe095c387eef20a316d51ae3455661', 0, '2021-04-24 22:32:42'),
('3d6a6be4ab12f86fa2decd6a3f45c77cf5f2b9e349009f62651353b51066901a6f0cf262cfc99f29', '1ebe3877dbfbe8fd3c7cdff9a7b5c1f8ddeffc2d388a88e68bf9ee729ea25692e4141ef27e876d45', 0, '2021-04-24 22:35:50'),
('46c1f8c5c46f5588273f1a92ba58005e646403b7540b7b775f656ae9e0d9a93050fc9be799ab5c1b', '486d3d0bc1223c80be30414c2b48df424d3c216bd6bd7d2f5971fbcdd941d5e82be02abb85ffc660', 0, '2021-04-24 22:44:21'),
('5cd6032c748a9ba2a9852f69e6d554cc6b1f73809a6db1144fb5536d17712d60fa18769de931fff1', '49a11a533a88e9c95542f8d36e9c0c688ae26f1d930e291b5a039c38d3489381fec195ca2af88a71', 0, '2021-04-24 22:26:26'),
('6667a16fb2f692b8551b908c7f49ca92e9fa88309077cd004982b9d79cf9a1356df5357aea5a8819', 'bee161005e8b5bf5e8a10187c556ff5161609f4d75d561c2645f2b0bd5092fd586330190b6bf47dc', 0, '2021-04-24 22:33:41'),
('6d7071d861f422f02d772d33eb7faa60c6d24381eea6b76ad6e8cb61e89fa487bb1cf58fc59f3b42', 'e35f5ebb07b490a7715a399af6f46350f409475270c36f3374f2cbfdb6fa37d25be919c5ec56384d', 0, '2021-04-24 22:32:02'),
('900ae51b630f0b679a45f34ad5db3a831eba4f591d7d4077eedf601898c093af57ee640546da9046', 'ba15d8d0bda32bffc4968929ca6157671ef168721a023fe5cbfd959c7463742dd9e4cbdcd7bc195c', 0, '2021-04-24 00:27:17'),
('a03d186decd1bd48a78339cffe4b799bba4b4017cad9b75eb8034270b6d269f433662fa3adc6e0ad', '0305f053535ca9003e98b8a4e056fdd91087ac870e2e95c28a140dc8cb61c26ab481149f397fe049', 0, '2021-04-23 01:23:24'),
('ce6e81438c50c137cb55f29d816f715a4fbbb14b73d51980c804b6b2875568c2050d38955e9b5c34', 'cebb9a3ad989bfd5165ba324641324722d78ef52c340329fa924d2231b6829bc53989d906ed754bc', 0, '2021-04-24 22:37:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Capturista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_tipo_usuario`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Luz', 'luz@correo.com', NULL, '$2y$10$B0o0SsdUY53DCmGehsXwZeoNcbHYdBd5TDW/PQkDiv4qSk6pCYyH2', NULL, '2020-04-04 02:53:40', '2020-04-04 02:53:40'),
(2, 2, 'Prueba22', 'Prueba@correo.com', NULL, '$2y$10$BfW6nKpnY4de9iNfpmU00ePzAl2zi.i05s6xACHNJP1NLi4a036zq', NULL, NULL, NULL),
(4, 2, 'Hola', 'Otro@correo.com', NULL, '$2y$10$eQ.sdr4y0BNZc3XaUMbF1eAAs/WrwQquDjyNNj4dMkU9DrYkbOvV2', NULL, NULL, NULL),
(5, 2, 'Pedro', 'pedro@censo.com', NULL, '$2y$10$4QQurUfSoyQK8CCq6aeEMeutFuCHCgHWCki4WMrrJolMkvHiVRA3e', NULL, NULL, NULL),
(6, 2, 'Juana', 'juana@censo.com', NULL, '$2y$10$FJQBc2cOwHnOpu.LRIhKLeUsPu34phuSlKojqLibv.Bo4W2DcBL2u', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `muestra`
--
ALTER TABLE `muestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD CONSTRAINT `muestra_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipos_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;