-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table kounhany.admins: ~5 rows (approximately)
DELETE FROM `admins`;
INSERT INTO `admins` (`id`, `nom`, `prenom`, `email`, `password_`, `created_at`, `updated_at`) VALUES
	(1, 'Jonatan Ryan', 'Jaylen Hahn', 'jovan.jaskolski@example.net', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(2, 'Hilbert O\'Kon DDS', 'Ms. Beryl O\'Conner I', 'raynor.fiona@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(3, 'Jalen McDermott DDS', 'Verna Carroll', 'casper.alba@example.org', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(4, 'Amelia Koss', 'Brielle Ankunding', 'corkery.verla@example.net', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(5, 'Mrs. Luz Turcotte Sr.', 'Nathaniel Corwin', 'koss.thurman@example.org', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '2024-04-25 00:43:11', '2024-04-25 00:43:11');

-- Dumping data for table kounhany.clients: ~5 rows (approximately)
DELETE FROM `clients`;
INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `password_`, `adresse`, `phone`, `compte_status`, `created_at`, `updated_at`) VALUES
	(1, 'Ms. Charlene Leuschke', 'Chaz Dickinson', 'bella.bayer@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '26965 Koelpin Curve\nCroninberg, DC 56652-5990', '1-743-820-6511', 'active', '2024-04-25 00:43:11', '2024-04-25 00:53:25'),
	(2, 'Prof. Keanu Halvorson', 'Maxie Swift', 'edd.kemmer@example.net', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '60639 Kemmer Causeway Suite 861\nNew Idaborough, DC 89241', '360.453.1164', 'active', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(3, 'Althea Harris', 'Brandyn Conn III', 'katlyn90@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '82820 Schuyler River Apt. 269\nYundtstad, ND 58718-8481', '+1.573.935.4163', 'active', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(4, 'Philip Cronin', 'Rosella Sporer', 'trisha72@example.net', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '44370 Beier Hills\nWest Rocky, AZ 73065', '1-845-635-9272', 'active', '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(5, 'Issac Bayer', 'Ms. Elaina Aufderhar DDS', 'graham.destinee@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', '4371 Mraz Green\nLake Krystina, RI 19629-5032', '1-540-825-4627', 'active', '2024-04-25 00:43:11', '2024-04-25 00:43:11');

-- Dumping data for table kounhany.commentaires_sur_clients: ~0 rows (approximately)
DELETE FROM `commentaires_sur_clients`;

-- Dumping data for table kounhany.commentaires_sur_experts: ~5 rows (approximately)
DELETE FROM `commentaires_sur_experts`;
INSERT INTO `commentaires_sur_experts` (`id`, `note`, `demande_id`, `client_id`, `expert_id`, `commentaire`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 3, 2, 'Travail exceptionnel, cuisine était impeccable !', NULL, NULL),
	(2, 3, 2, 5, 2, 'Service parfait, salle de bain brillante !', NULL, NULL),
	(3, 4, 3, 1, 2, 'Travail satisfaisant, salon et chambres bien nettoyés.', NULL, NULL),
	(4, 5, 4, 4, 2, 'Travail de qualité, fenêtres étincelantes !', NULL, NULL),
	(5, 4, 5, 2, 2, 'Bon travail sur les tapis et les moquettes.', NULL, NULL);

-- Dumping data for table kounhany.demandes_clients: ~5 rows (approximately)
DELETE FROM `demandes_clients`;
INSERT INTO `demandes_clients` (`id`, `client_id`, `expert_id`, `service_id`, `date_debut`, `duree`, `description`, `etat`, `total`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, 1, '2024-05-02', '2 heures', 'Nettoyage complet de la cuisine', 'accepte', 50, NULL, '2024-04-25 02:08:52'),
	(2, 5, 2, 2, '2024-05-05', '3 heures', 'Nettoyage approfondi de la salle de bain', 'accepte', 75, NULL, '2024-04-25 02:11:39'),
	(3, 1, 2, 1, '2024-05-10', '4 heures', 'Nettoyage général du salon et des chambres', 'en attente', 100, NULL, NULL),
	(4, 4, 2, 2, '2024-05-15', '2 heures', 'Nettoyage complet des fenêtres', 'en attente', 50, NULL, NULL),
	(5, 2, 2, 1, '2024-05-20', '3 heures', 'Nettoyage des tapis et des moquettes', 'en attente', 75, NULL, NULL);

-- Dumping data for table kounhany.email_settings: ~0 rows (approximately)
DELETE FROM `email_settings`;
INSERT INTO `email_settings` (`id`, `username`, `password`, `host`, `port`, `encryption`, `created_at`, `updated_at`) VALUES
	(1, 'salmanbenomar250@gmail.com', 'qnyzawodppmzywwo', 'smtp.gmail.com', '465', 'tls', '2024-04-25 00:53:54', '2024-04-25 00:53:54');

-- Dumping data for table kounhany.experts: ~5 rows (approximately)
DELETE FROM `experts`;
INSERT INTO `experts` (`id`, `nom`, `prenom`, `email`, `password_`, `bio`, `photo`, `metier`, `compte_status`, `status_abonnement`, `status_payment`, `created_at`, `updated_at`) VALUES
	(1, 'Mr. Kyle Parker V', 'Prof. Allison Shanahan V', 'rlockman@example.org', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', 'Omnis sunt in et deleniti nesciunt eum nostrum ut.', 'images/admin_photo.png', 'Aliquid aut quia at aliquid cupiditate.', 'active', 1, 1, '2024-04-25 00:43:11', '2024-04-25 00:53:31'),
	(2, 'Ben Omar', 'Salman', 'salmanbenomar988@gmail.com', '$2y$10$1TRbbZsqKEPoX28AoX59jeVAxi412YcRbbTFEzgDZRLpVZNe6W0gS', 'In sunt fuga nihil tempora veniam deserunt et.', 'images/1714013085.png', 'Eaque ve', 'active', 1, 1, '2024-04-25 00:43:11', '2024-04-25 02:19:35'),
	(3, 'Prof. Schuyler Lesch III', 'Creola Greenfelder PhD', 'imarquardt@example.net', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', 'Est odio consequuntur distinctio praesentium enim necessitatibus.', 'images/admin_photo.png', 'Illum eaque odit soluta dicta.', 'active', 1, 1, '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(4, 'Hosea Jaskolski', 'Green Bergnaum', 'benedict.sporer@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', 'Magni eligendi officia sit sapiente omnis quod voluptates.', 'images/admin_photo.png', 'Quae consectetur aspernatur sequi quod velit cupiditate.', 'active', 1, 1, '2024-04-25 00:43:11', '2024-04-25 00:43:11'),
	(5, 'Dr. Golda Durgan I', 'Owen Dickinson', 'zbauch@example.com', '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK', 'Eveniet similique quas ut nobis esse ducimus.', 'images/admin_photo.png', 'Sit animi adipisci iusto qui cumque odit.', 'active', 1, 1, '2024-04-25 00:43:11', '2024-04-25 00:43:11');

-- Dumping data for table kounhany.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping data for table kounhany.general_settings: ~0 rows (approximately)
DELETE FROM `general_settings`;
INSERT INTO `general_settings` (`id`, `taux_payment`, `created_at`, `updated_at`) VALUES
	(1, 10, '2024-04-25 00:54:32', '2024-04-25 00:54:32');

-- Dumping data for table kounhany.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2024_04_16_161134_create_clients_table', 1),
	(5, '2024_04_16_161143_create_admins_table', 1),
	(6, '2024_04_16_161159_create_experts_table', 1),
	(7, '2024_04_16_161208_create_services_table', 1),
	(8, '2024_04_16_161310_create_service_experts_table', 1),
	(9, '2024_04_16_161332_create_demandes_clients_table', 1),
	(10, '2024_04_16_161404_create_commentaires_sur_experts_table', 1),
	(11, '2024_04_16_161418_create_commentaires_sur_clients_table', 1),
	(12, '2024_04_23_143911_create_payments_table', 1),
	(13, '2024_04_23_144144_create_email_settings_table', 1),
	(14, '2024_04_23_144154_create_paypal_settings_table', 1),
	(15, '2024_04_23_144211_create_general_settings_table', 1);

-- Dumping data for table kounhany.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping data for table kounhany.payments: ~0 rows (approximately)
DELETE FROM `payments`;
INSERT INTO `payments` (`id`, `expert_id`, `montant`, `methode`, `transaction_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 12.5, 'paypal', '4NR39399KN4659322', '2024-04-25 02:19:35', '2024-04-25 02:19:35');

-- Dumping data for table kounhany.paypal_settings: ~0 rows (approximately)
DELETE FROM `paypal_settings`;
INSERT INTO `paypal_settings` (`id`, `client_id`, `client_secret`, `mode`, `created_at`, `updated_at`) VALUES
	(1, 'AaoxZrhbVNx-Pfm-8tzfB7L4U3kPA7TtBfzkTkgGffN9WX6RzlezmWvVDoolJiywTOe1NZL12inMVgap', 'EByOfAtw9AfAiwd88WrMVxx-oSrDJQT_IkTfX8UkSeYKFX8Iz0tyBwev13bBZ6rZEfGVN-Rgrf-tH5L9', 'sandbox', '2024-04-25 00:54:28', '2024-04-25 00:54:28');

-- Dumping data for table kounhany.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping data for table kounhany.services: ~3 rows (approximately)
DELETE FROM `services`;
INSERT INTO `services` (`id`, `nom`, `service_status`, `created_at`, `updated_at`) VALUES
	(1, 'Ménage', 'active', '2024-04-25 00:58:59', '2024-04-25 00:59:05'),
	(2, 'Babysitting', 'active', '2024-04-25 01:08:04', '2024-04-25 01:08:04'),
	(3, 'Cuisine', 'active', '2024-04-25 01:08:42', '2024-04-25 01:08:42');

-- Dumping data for table kounhany.service_experts: ~1 rows (approximately)
DELETE FROM `service_experts`;
INSERT INTO `service_experts` (`id`, `expert_id`, `service_id`, `nbr_annee_d_exp`, `disponibilite`, `duree`, `prix_par_duree`, `ville`, `status_`, `created_at`, `updated_at`) VALUES
	(4, 2, 1, 8, 'Créneaux disponibles : Lun-Dim, 8:00-18:00.\r\n\r\nDescription du service : Profitez d\'un ménage impeccable avec notre équipe d\'experts. Nous nous occupons de tout, de la poussière aux sols, pour que vous puissiez profiter d\'un intérieur propre et accueillant à tout moment.', 'jour', 100.00, 'Tanger', 'active', '2024-04-25 01:56:58', '2024-04-25 02:00:17'),
	(5, 2, 3, 10, 'Profitez d\'une cuisine impeccable avec notre équipe d\'experts. Nous prenons en charge tous les détails, de la désinfection des surfaces au polissage des appareils, pour que vous puissiez savourer un espace culinaire propre et accueillant à tout moment.\r\n\r\nCréneaux disponibles :\r\n\r\nMercredi, de 10:00 à 12:00\r\nVendredi, de 14:00 à 16:00', 'jour', 80.00, 'Rabat', 'active', '2024-04-25 01:57:55', '2024-04-25 01:59:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
