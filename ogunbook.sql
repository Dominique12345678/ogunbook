-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 juil. 2025 à 19:24
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ogunbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'dodo', 'dodo@gmail.com', 'Dominique8.', NULL, NULL),
(2, 'Admin Principal', 'admin@ogunbook.com', '$2y$12$MdMssvtSoCStyQOVW96ZAuWJgEpK9UsVlNFMm/lig9M9PwFjoNH7q', '2025-07-10 12:50:03', '2025-07-10 12:50:03'),
(3, 'Admin Secondaire', 'nouveladmin@example.com', '$2y$12$2Rs6cAG9Un9PqVD7lzklfe1Sz.UaBdKEsJZ8lP4FV1Nnb3SZg.56.', '2025-07-10 14:48:00', '2025-07-10 14:48:00');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`, `created_at`, `updated_at`) VALUES
(1, 'Aventures', '2025-07-11 15:55:15', '2025-07-11 15:55:15'),
(2, 'Fantastique', '2025-07-11 15:56:05', '2025-07-11 15:56:05'),
(3, 'Horreur', '2025-07-11 15:56:55', '2025-07-11 15:56:55'),
(4, 'Humour', '2025-07-11 15:57:45', '2025-07-11 15:57:45'),
(5, 'Romance', '2025-07-11 15:58:08', '2025-07-11 15:58:08'),
(6, 'Science-fiction', '2025-07-11 15:58:38', '2025-07-11 15:58:38'),
(7, 'Super-hero', '2025-07-11 15:59:09', '2025-07-11 15:59:09'),
(8, 'Western', '2025-07-11 15:59:33', '2025-07-11 15:59:33');

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chapitre` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_chapitre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_chapitre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichier_chapitre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_book` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_chapitre`),
  KEY `chapitre_id_book_foreign` (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `nom_chapitre`, `image_chapitre`, `fichier_chapitre`, `id_book`, `created_at`, `updated_at`) VALUES
(1, 'erfgthyji', NULL, '1752329532_PXL_20231023_165519934.PORTRAIT~2.jpg', 3, '2025-07-12 13:12:12', '2025-07-12 13:12:12'),
(2, 'xcvb', NULL, '1752329917_KOTO_YAO_DOMINIQUE.pdf', 2, '2025-07-12 13:18:37', '2025-07-12 13:18:37'),
(3, 'WDGBG', NULL, '1752522591_OIP.jpeg', 4, '2025-07-14 18:49:51', '2025-07-14 18:49:51'),
(4, 'dodo', NULL, '1752572928_KOTO_YAO_DOMINIQUE.pdf', 5, '2025-07-15 08:48:48', '2025-07-15 08:48:48');

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

DROP TABLE IF EXISTS `createur`;
CREATE TABLE IF NOT EXISTS `createur` (
  `id_createur` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_createur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms_createur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo_createur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `genre` enum('Homme','Femme','Ne pas préciser') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ne pas préciser',
  `type_createur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_createur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel_createur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mot_de_passe_createur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_createur`),
  UNIQUE KEY `createur_pseudo_createur_unique` (`pseudo_createur`),
  UNIQUE KEY `createur_email_createur_unique` (`email_createur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `createur`
--

INSERT INTO `createur` (`id_createur`, `nom_createur`, `prenoms_createur`, `pseudo_createur`, `date_de_naissance`, `genre`, `type_createur`, `email_createur`, `num_tel_createur`, `mot_de_passe_createur`, `created_at`, `updated_at`) VALUES
(1, 'KOTO', 'Yao Dominique', 'dodo', '2003-02-06', 'Homme', 'independant', 'kotoyaodominique@gmail.com', '91696923', '$2y$12$.AY1BF0PGU4hucmryqPoWuHDbsyR.HoTwiwMVGWXn9fbAeGAX.Kku', '2025-07-09 13:55:05', '2025-07-09 13:55:05');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_07_07_191950_create_utilisateurs_table', 1),
(4, '2025_07_07_192103_create_createur_table', 1),
(5, '2025_07_07_192136_create_ogunbook_table', 1),
(6, '2025_07_07_192209_create_chapitre_table', 1),
(7, '2025_07_07_212310_create_sessions_table', 2),
(10, '2025_07_09_142705_add_type_createur_to_createur_table', 3),
(11, '2025_07_09_175151_create_admins_table', 3),
(12, '2025_07_11_134057_create_categories_table', 4),
(13, '2025_07_11_150528_create_categories_table', 5),
(14, '2025_07_11_201654_remove_statut_from_ogunbook_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `ogunbook`
--

DROP TABLE IF EXISTS `ogunbook`;
CREATE TABLE IF NOT EXISTS `ogunbook` (
  `id_book` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_book` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nombre_de_chapitre` int NOT NULL DEFAULT '0',
  `image_book` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_book` double NOT NULL DEFAULT '0',
  `id_createur` bigint UNSIGNED NOT NULL,
  `id_categorie` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  KEY `ogunbook_id_createur_foreign` (`id_createur`),
  KEY `fk_ogunbook_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ogunbook`
--

INSERT INTO `ogunbook` (`id_book`, `nom_book`, `description`, `nombre_de_chapitre`, `image_book`, `prix_book`, `id_createur`, `id_categorie`, `created_at`, `updated_at`) VALUES
(3, 'DFGHJK', 'SDFGHJKL', 134567, 'books/KIKbTAE5Vqv2tqg1Zui2yuq5NFhQ75DjTVbNr0gB.jpg', 14000, 1, 4, '2025-07-12 12:32:12', '2025-07-12 12:32:12'),
(4, 'NATACHA KAMPUSCHA', 'sdftgyhujikolpmvb,;b hnhhs', 18, 'books/eJVo7yFo3UHim3IcdogNUbYJJFP4ySP9cPqwW6dA.jpg', 13000, 1, 1, '2025-07-14 18:35:34', '2025-07-14 18:35:34'),
(5, 'dfghj', 'sdfghjkl', 135, 'books/5SUdIJAU4UZlTwUTcxVzi3LFst6clWgiHmIln5uT.jpg', 13000, 1, 1, '2025-07-14 18:49:01', '2025-07-14 18:49:01'),
(6, 'ZPZPZ', 'CEDOZ', 14, 'books/Dm6qLvTiLMO44BvXOzAixoqDf9JN1phn1mqLFud0.jpg', 100000, 1, 3, '2025-07-15 12:15:33', '2025-07-15 12:15:33');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5EZHIOP9E1iCf7Psv6rtXb06PVsFl5pFvOWVSPMm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNDU3dmRpazlISlJ4SWRpbFNvY0JOajVFUEF5QzFLa2dmWndKVUVqciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2xpdnJlLzUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjExOiJjcmVhdGV1cl9pZCI7aToxO3M6MTQ6InV0aWxpc2F0ZXVyX2lkIjtpOjE7czoxNToidXRpbGlzYXRldXJfbm9tIjtzOjQ6IktPVE8iO30=', 1752611975);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_utilisateurs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms_utilisateurs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo_utilisateurs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel_utilisateur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_utilisateur` enum('Homme','Femme','Ne pas préciser') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ne pas préciser',
  `date_de_naissance_utilisateur` date DEFAULT NULL,
  `email_utilisateur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe_utilisateur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `utilisateurs_pseudo_utilisateurs_unique` (`pseudo_utilisateurs`),
  UNIQUE KEY `utilisateurs_email_utilisateur_unique` (`email_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateurs`, `prenoms_utilisateurs`, `pseudo_utilisateurs`, `num_tel_utilisateur`, `genre_utilisateur`, `date_de_naissance_utilisateur`, `email_utilisateur`, `mot_de_passe_utilisateur`, `created_at`, `updated_at`) VALUES
(1, 'KOTO', 'Yao Dominique', 'dodo10', '91696923', 'Homme', '2007-07-15', 'dodo@gmail.com', '$2y$12$1GhN.jh72TLf17zNpn8hyuXfkOmxLtO/JNrY0yD5gznfXDUK2IQOS', '2025-07-15 11:08:12', '2025-07-15 11:08:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
