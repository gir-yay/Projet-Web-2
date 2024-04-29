
INSERT INTO `services` (`id`, `nom`, `service_status`, `created_at`, `updated_at`) VALUES
	(1, 'Ménage', 'active', '2024-04-25 00:58:59', '2024-04-25 00:59:05'),
	(2, 'Babysitting', 'active', '2024-04-25 01:08:04', '2024-04-25 01:08:04'),
	(3, 'Cuisine', 'active', '2024-04-25 01:08:42', '2024-04-25 01:08:42');

INSERT INTO `general_settings` (`taux_payment`, `created_at`, `updated_at`) VALUES
	( 10, '2024-04-25 00:54:32', '2024-04-25 00:54:32');

INSERT INTO `payments` ( `expert_id`, `montant`, `methode`, `transaction_id`, `created_at`, `updated_at`) VALUES
	( 2, 12.5, 'paypal', '4NR39399KN4659322', '2024-04-25 02:19:35', '2024-04-25 02:19:35');

INSERT INTO `paypal_settings` ( `client_id`, `client_secret`, `mode`, `created_at`, `updated_at`) VALUES
	( 'AaoxZrhbVNx-Pfm-8tzfB7L4U3kPA7TtBfzkTkgGffN9WX6RzlezmWvVDoolJiywTOe1NZL12inMVgap', 'EByOfAtw9AfAiwd88WrMVxx-oSrDJQT_IkTfX8UkSeYKFX8Iz0tyBwev13bBZ6rZEfGVN-Rgrf-tH5L9', 'sandbox', '2024-04-25 00:54:28', '2024-04-25 00:54:28');


INSERT INTO `service_experts` ( `expert_id`, `service_id`, `nbr_annee_d_exp`, `disponibilite`, `duree`, `prix_par_duree`, `ville`, `status_`, `created_at`, `updated_at`) VALUES
	(2, 1, 8, 'Créneaux disponibles : Lun-Dim, 8:00-18:00.\r\n\r\nDescription du service : Profitez d un ménage impeccable avec notre équipe d\'experts. Nous nous occupons de tout, de la poussière aux sols, pour que vous puissiez profiter d\'un intérieur propre et accueillant à tout moment.', 'jour', 100.00, 'Tanger', 'active', '2024-04-25 01:56:58', '2024-04-25 02:00:17'),
	( 2, 3, 10, 'Profitez d\'une cuisine impeccable avec notre équipe d\'experts. Nous prenons en charge tous les détails, de la désinfection des surfaces au polissage des appareils, pour que vous puissiez savourer un espace culinaire propre et accueillant à tout moment.\r\n\r\nCréneaux disponibles :\r\n\r\nMercredi, de 10:00 à 12:00\r\nVendredi, de 14:00 à 16:00', 'jour', 80.00, 'Rabat', 'active', '2024-04-25 01:57:55', '2024-04-25 01:59:25');

	
INSERT INTO `demandes_clients` ( `client_id`, `expert_id`, `service_id`, `date_debut`, `duree`, `description`, `etat`, `total`, `created_at`, `updated_at`) VALUES
	( 3, 2, 1, '2024-05-02', '2 heures', 'Nettoyage complet de la cuisine', 'accepte', 50, NULL, '2024-04-25 02:08:52'),
	( 5, 2, 2, '2024-05-05', '3 heures', 'Nettoyage approfondi de la salle de bain', 'accepte', 75, NULL, '2024-04-25 02:11:39'),
	( 1, 2, 1, '2024-05-10', '4 heures', 'Nettoyage général du salon et des chambres', 'en attente', 100, NULL, NULL),
	( 4, 2, 2, '2024-05-15', '2 heures', 'Nettoyage complet des fenêtres', 'en attente', 50, NULL, NULL),
	( 2, 2, 1, '2024-05-20', '3 heures', 'Nettoyage des tapis et des moquettes', 'en attente', 75, NULL, NULL);


INSERT INTO `commentaires_sur_experts` ( `note`, `demande_id`, `client_id`, `expert_id`, `commentaire`, `created_at`, `updated_at`) VALUES
	( 2, 1, 3, 2, 'Travail exceptionnel, cuisine était impeccable !', NULL, NULL),
	(3, 2, 5, 2, 'Service parfait, salle de bain brillante !', NULL, NULL),
	( 4, 3, 1, 2, 'Travail satisfaisant, salon et chambres bien nettoyés.', NULL, NULL),
	( 5, 4, 4, 2, 'Travail de qualité, fenêtres étincelantes !', NULL, NULL),
	( 4, 5, 2, 2, 'Bon travail sur les tapis et les moquettes.', NULL, NULL);


INSERT INTO commentaires_sur_clients (note, demande_id, commentaire, client_id, expert_id) 
VALUES 
(4, 1, 'Très bon client, a répondu rapidement à toutes les demandes.', 1, 2),
(3, 2, 'Client satisfaisant, mais communication un peu difficile.', 2, 1),
(5, 3, 'Excellente expérience avec ce client, je le recommande vivement.', 3, 3);


INSERT INTO `email_settings` ( `username`, `password`, `host`, `port`, `encryption`, `created_at`, `updated_at`) VALUES
	( 'salmanbenomar250@gmail.com', 'qnyzawodppmzywwo', 'smtp.gmail.com', '465', 'tls', '2024-04-25 00:53:54', '2024-04-25 00:53:54');
