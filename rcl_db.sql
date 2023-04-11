-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table rcl_db. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `category_slug` varchar(250) NOT NULL,
  `category_color` int(11) NOT NULL DEFAULT '1',
  `category_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table rcl_db.categories : ~10 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`categoryId`, `name`, `category_slug`, `category_color`, `category_created_at`) VALUES
	(1, 'Sport', 'eaque-odit-vitae', 1, '2009-01-26 00:00:00'),
	(2, 'Music', 'minus-ea-excepturi', 2, '2021-07-30 00:00:00'),
	(3, 'Politique', 'deserunt-vel-totam', 3, '2009-07-22 00:00:00'),
	(4, 'Magasine', 'doloribus-omnis-quis', 4, '1980-11-21 00:00:00'),
	(5, 'Divertissement', 'ea-molestias-et', 2, '2016-09-20 00:00:00'),
	(6, 'Culture et Art', 'reprehenderit-reiciendis-velit', 3, '1976-09-15 00:00:00'),
	(7, 'Question du jour', 'vel-ea', 4, '2016-12-12 00:00:00'),
	(8, 'Officia veniam et.', 'earum-eaque', 1, '2015-05-21 00:00:00'),
	(9, 'Et placeat harum.', 'est-facere-error', 2, '2013-01-14 00:00:00'),
	(10, 'Et et laudantium.', 'corporis-ut', 3, '2013-05-17 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. coordonnees
CREATE TABLE IF NOT EXISTS `coordonnees` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(50) DEFAULT NULL,
  `instagram_link` varchar(50) DEFAULT NULL,
  `linkedin_link` varchar(50) DEFAULT NULL,
  `twitter_link` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `upated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table rcl_db.coordonnees : ~1 rows (environ)
/*!40000 ALTER TABLE `coordonnees` DISABLE KEYS */;
INSERT INTO `coordonnees` (`id`, `name`, `address`, `phone`, `email`, `facebook_link`, `instagram_link`, `linkedin_link`, `twitter_link`, `created_at`, `upated_at`) VALUES
	(2, 'RCL Radio', 'Kolwezi Lualaba', '+243 000000', 'rcl@contact.cd', NULL, NULL, NULL, NULL, '2023-03-17 13:12:14', '2023-03-17 13:12:15');
/*!40000 ALTER TABLE `coordonnees` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table rcl_db.migrations : ~0 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2023-02-20-004817', 'App\\Database\\Migrations\\Post', 'default', 'App', 1676855138, 1),
	(2, '2023-03-10-210754', 'App\\Database\\Migrations\\Category', 'default', 'App', 1678483125, 2),
	(3, '2023-03-16-022233', 'App\\Database\\Migrations\\Podcasts', 'default', 'App', 1678936400, 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. podcasts
CREATE TABLE IF NOT EXISTS `podcasts` (
  `podcastId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `audioFile` varchar(250) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `is_featured` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`podcastId`),
  KEY `podcasts_category_id_foreign` (`category_id`),
  CONSTRAINT `podcasts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table rcl_db.podcasts : ~7 rows (environ)
/*!40000 ALTER TABLE `podcasts` DISABLE KEYS */;
INSERT INTO `podcasts` (`podcastId`, `title`, `slug`, `audioFile`, `is_active`, `is_deleted`, `is_featured`, `created_at`, `updated_at`, `category_id`) VALUES
	(1, 'Dolor qui autem aut quaerat. Rem ipsam at corporis sit sint. Est magnam incidunt non doloribus.', 'soluta-molestiae-qui-quis-similique-quasi-quia-aspernatur-perspiciatis-possimus-ipsa-quis-quos', 'df3d046a-c180-352b-8071-e0f75af17d26.mp3', '0', '1', '1', '2011-05-27', '1999-12-17', 1),
	(2, 'Quia cupiditate ratione quam nesciunt quis optio. Ipsa labore rerum nostrum sint.', 'recusandae-aut-excepturi-quia-itaque-repellendus-inventore-facere-aut-aliquam-rerum-rem-nesciunt-sit-deserunt-impedit-aperiam-amet-sunt-consectetur', 'dc4886bb-3905-30be-a271-75c6429d83da.mp3', '0', '1', '1', '2006-12-24', '1984-01-22', 8),
	(3, 'Aut sed voluptate voluptas iste non pariatur nam sunt. Aut quod est hic vel est.', 'aut-et-earum-et-sed-possimus-illo-quae-rerum-odio-debitis-id', 'f88d5b21-33e3-3916-b10f-5c0c35f3c55d.mp3', '1', '1', '1', '2022-12-17', '1989-08-16', 9),
	(4, 'Placeat in unde at nisi et sed in. Autem a repellendus nostrum qui. Debitis deserunt quas impedit.', 'fugiat-aut-iste-quibusdam-qui-et-tenetur-occaecati-molestiae-sapiente-quibusdam-eos-eos-est-vitae-sit', 'c90f60eb-882e-3580-8d74-27cbc92ee156.mp3', '0', '0', '1', '1979-05-17', '2011-01-20', 3),
	(5, 'Id officia architecto pariatur ab et. A quidem ullam quia deserunt.', 'quod-ratione-provident-amet-aut-veritatis-necessitatibus-sint-earum-ducimus-sunt-sit-ducimus-minus-officiis-facere-et-est-placeat', '6e5c3a13-486c-3ca6-aebc-b5331da4a00e.mp3', '1', '0', '1', '1985-04-05', '1970-11-06', 1),
	(6, 'Test de la catégorie et de l\'audios', 'test-de-la-categorie-et-de-laudios', '6e5c3a13-486c-3ca6-aebc-b5331da4a00e.mp3', '0', '0', '0', '2023-04-01', '2023-04-01', 4),
	(7, 'La culture au sens de la démocratie', 'la-culture-au-sens-de-la-democratie', '1680362110_8547a062acadfd2cd4ad.mp3', '0', '0', '0', '2023-04-01', '2023-04-01', 6);
/*!40000 ALTER TABLE `podcasts` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. posts
CREATE TABLE IF NOT EXISTS `posts` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `postImage` varchar(250) NOT NULL,
  `is_featured` enum('0','1') NOT NULL DEFAULT '0',
  `is_most_format` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `viewNumber` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Listage des données de la table rcl_db.posts : ~25 rows (environ)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`postId`, `title`, `slug`, `postImage`, `is_featured`, `is_most_format`, `created_at`, `updated_at`, `is_active`, `is_deleted`, `description`, `category_id`, `viewNumber`) VALUES
	(1, 'petage double', 'petage-double', '1680393986_f7a56cd42ac5ceb974bf.png', '0', '0', '2011-08-06 00:00:00', '2023-04-02 00:00:00', '1', '0', 'moise est plus grand de toutes l\'histoireDeleniti in eligendi sed aut aspernatur. Explicabo non dolor deleniti nulla ipsam ducimus modi. Consequuntur rerum magnam eum. Est quia eos ipsam consequuntur. Quia sequi placeat sequi totam. Dicta ipsa delectus ea. Necessitatibus aut quas dolore dolorem a. Ipsa voluptatem aliquam autem est ut dicta non. Ut aliquid sed aliquam. Ab et nobis omnis quis ut id. Nam eius qui ullam maxime facilis ab corrupti sint. Nihil qui et nihil rem.', 7, 16),
	(2, 'Un autre titre d\'article', 'et-ducimus-cumque-ipsa-numquam-est-aut-eum-non-veritatis-ut-est-optio-voluptatem-illo', 'c80fe41f98a526a65665eedbcb747bae.png', '0', '0', '1971-06-02 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Enim vel nesciunt harum sapiente minus aut. Sit sit odio voluptas. Nobis ad eligendi non rerum nemo sequi et. Voluptatum quo adipisci eligendi ratione ex accusantium quaerat. Rerum illum autem aliquid reiciendis dolor ea aliquid. Error quos et tempore impedit sed soluta veniam delectus. Quo voluptas et voluptas aperiam laudantium amet consequatur atque. Voluptatem sint dolor fugiat modi quidem placeat possimus. Fuga quis non et culpa reiciendis.', 2, 0),
	(3, 'Repellat sed quia voluptates quaerat. Ducimus dolor voluptatem nihil neque dolorem.', 'architecto-enim-magni-laudantium-a-ut-pariatur-amet-minima-pariatur-et-corporis-repellendus-et-aspernatur', 'cd0304a471533a29f4f7f396e6c4d331.png', '0', '0', '1991-11-25 00:00:00', '2023-03-11 09:54:11', '0', '1', 'Odio numquam voluptates placeat. Cupiditate voluptas non aut commodi quia sit est itaque. A autem saepe voluptatem id eum. Soluta delectus ut consequatur. Saepe autem odio eligendi et velit earum aspernatur. Et qui veritatis iusto animi. Tempore sint animi fugit aut voluptatem nihil assumenda. Sequi praesentium ut assumenda doloribus voluptatibus et id.', 7, 0),
	(4, 'Facere consequatur enim laboriosam molestiae suscipit iste non. Dignissimos veniam impedit aut.', 'odit-eius-unde-vitae-quos-sequi-aut-autem-accusantium-officia-porro-odit', '1680394180_f853db9ef2eed72efe14.png', '0', '0', '2016-03-27 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Temporibus esse ipsa ratione sunt nihil dolorum minima ut. In debitis consequatur est distinctio eum velit cupiditate. Consectetur fugit maxime voluptas quis. Minus qui dolore voluptates qui facilis quod dolores. Debitis voluptas id aliquid quibusdam. Optio quae et inventore distinctio est officia. Quis non enim facilis quod eius. Ea sed neque sed placeat. Sequi dignissimos velit temporibus aperiam vero doloremque dolorem.', 1, 0),
	(5, 'Nostrum eaque perspiciatis nihil. Itaque expedita et sint. Rem esse quaerat facere.', 'facere-ex-quo-eum-beatae-consequuntur-maiores-quis-optio-distinctio', '04d3fece9c1daf21a33118c11c69a8aa.png', '1', '0', '2007-06-02 00:00:00', '2023-03-11 09:54:11', '0', '1', 'Adipisci eos illo fugiat rerum. Laborum et autem non in eius tempore consequatur. Tempora explicabo id id voluptatum quia dolorum. Soluta recusandae impedit expedita asperiores. Sit sint perferendis non ea itaque possimus qui. Molestias laborum facilis quia dicta maxime. Maxime illo inventore perspiciatis rem commodi. Eligendi at ut voluptatibus laudantium. Consequatur suscipit rerum consequatur dolor aut. Quibusdam consectetur repellendus delectus. Ut ut quasi impedit.', 3, 0),
	(6, 'Et et possimus alias ut enim sapiente. Non ipsum sint hic fugiat.', 'est-a-vel-sapiente-dolorem-enim-earum-rerum-fuga-illo-maiores-esse-labore-necessitatibus-voluptas-totam-dolor-earum-enim-quibusdam-qui', '1680394158_e79bb62d4edeb4268e51.png', '1', '0', '2009-03-09 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Nemo corrupti voluptas minus deserunt autem dolorem. Qui deserunt et debitis tempore. Temporibus mollitia officiis illum sapiente. Dolore officia sapiente sed ab et. Explicabo voluptatem facere ut vel quisquam reprehenderit. Odio provident voluptates vel non amet rerum quia. Iusto placeat est quia corporis eos. Inventore saepe harum ducimus hic. Eos nihil natus dolor accusantium qui minus.', 6, 2),
	(7, 'Iure doloremque est ab at magni. Corrupti in dignissimos illum tempore. Quia quis eius sed odit et.', 'ea-quisquam-quo-odit-nostrum-aut-illum-necessitatibus-voluptatum-nemo-sint-voluptas-recusandae-qui-et', '80f2747384ffb8c8616b963ba69d8ca8.png', '0', '0', '1988-07-18 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Rem dicta sint quos reiciendis rerum aut delectus. Eos tempora ut voluptas numquam at. Delectus ut dolor et sit eum dolores. Sit temporibus expedita et aut labore aut. Quia necessitatibus dolores minus eligendi quo illo reprehenderit aperiam. Sit facere qui quia. Error qui eos voluptatem porro enim ut nisi. Fugiat expedita natus consequatur ut quia. Aut quia qui vel aut. Ut ut eligendi dolore explicabo dolorum quia natus. Adipisci ut vero voluptates rem non nostrum cupiditate.', 6, 0),
	(8, 'Suscipit fugit at aut. Alias minus ut corrupti occaecati at.', 'reiciendis-exercitationem-illo-perspiciatis-impedit-assumenda-non-sequi-vel-nulla-nostrum-nihil-odio-in-distinctio-ea-est-accusamus-nihil-ut', '665d22d89fa04139b859d7c34c1bafc2.png', '0', '0', '1980-10-25 00:00:00', '2023-03-11 09:54:11', '1', '0', 'Voluptate rerum consectetur officia sequi consequatur aut. Magni sint et excepturi nulla ex necessitatibus voluptatem. Et voluptas iste et. Ut nesciunt modi et ut esse. Ipsa amet ratione sequi. Vitae ea sed molestias quaerat est quae et. Ipsum et aut rerum sequi. Dicta amet illum quasi illum dolorum ducimus. Assumenda eos vitae iure magni ipsum veniam occaecati. Tenetur neque excepturi voluptas iste. Soluta laboriosam beatae explicabo qui eius. Enim ut et vel vel.', 1, 0),
	(9, 'Est qui autem quia nesciunt dolorem voluptatem. Magni facere ea qui. Et error tempora facilis.', 'eaque-vitae-hic-autem-quis-et-et-quam-perferendis-aut-voluptatum-ut-sed-nihil-accusamus-qui-nostrum-quia-quis-et', '590be1e235cda1522da2bfb39220afca.png', '0', '0', '2019-07-02 00:00:00', '2023-03-11 09:54:11', '0', '1', 'Magnam mollitia consectetur assumenda eos. Cupiditate quis omnis quos cupiditate suscipit itaque ducimus. Blanditiis accusamus dolores illum labore rem autem. Deleniti numquam quia ea ut sit. Minima molestiae qui consequatur magnam necessitatibus. Ea minus harum quibusdam incidunt. Sequi et impedit harum dolorem aut ipsa cum. Deleniti maiores corrupti aspernatur esse est architecto est unde. Est occaecati est non. Est sit sunt voluptatem asperiores et aspernatur facilis voluptatem.', 5, 0),
	(10, 'Neque ea sunt eum ut. Accusantium laboriosam qui voluptatem velit.', 'magnam-omnis-reprehenderit-illo-ut-voluptatem-provident-ducimus-incidunt-voluptas-sint-facilis-praesentium-deserunt-doloremque-odit-sit-sunt-molestiae-aspernatur-aut', '3ae6ff503dd58dba870f3b1513b685c0.png', '0', '0', '1973-07-05 00:00:00', '2023-03-11 09:54:11', '1', '1', 'Odio ut ad et sint. Quas officiis velit porro. Et qui et quos et quis enim eius. Ea voluptatum rerum atque et enim. Rerum et et quas assumenda facere. Quas cumque unde est quia voluptatem quasi. Quaerat nobis ullam et natus accusantium. Aliquid labore dolor officia. Consequatur asperiores tempora est quos et quae. Reprehenderit ut id non aliquam. Et quo quis veniam aliquid. Est qui atque culpa provident. Voluptatem et expedita minus sit ab eum.', 4, 0),
	(11, 'Tempora et sed enim explicabo. Et rem voluptatem tempore labore aut commodi voluptas laborum.', 'laboriosam-nam-eaque-quas-et-et-et-qui-porro-iusto-voluptatibus-architecto-dicta-assumenda-non-beatae-ut-molestiae-reiciendis', '9578664f6f8907c9e6f771b15eddd1ee.png', '0', '0', '2014-10-06 00:00:00', '2023-03-11 09:54:11', '1', '0', 'Incidunt occaecati qui qui est cum sit quo. Modi labore voluptatem voluptatem a quam magni molestiae. Consequatur itaque sit fugit alias. Ipsa pariatur non est tempore est est ad. Dolor sit laborum iusto dicta veritatis aut distinctio nesciunt. Voluptatem voluptatem eius magni et. Esse dolorem saepe sequi laudantium. Autem et molestiae nulla veritatis placeat mollitia. Temporibus dolore sapiente veritatis recusandae aliquam ea facere.', 7, 2),
	(12, 'Illo est non libero sunt. Consequatur et in reiciendis magnam. Ullam a aut quam illum fugit.', 'suscipit-aut-ut-tenetur-libero-sapiente-culpa-consequuntur-ipsam-ipsum-sequi-vero-molestiae-qui-autem-quo-soluta-et-aspernatur', '5c3c0efdd3e3aca691828a7ce112029a.png', '0', '0', '2022-03-30 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Delectus corporis qui explicabo nobis laboriosam aperiam. Sit rem nesciunt dolorem sit et voluptates enim. Tenetur magnam occaecati sequi neque ut. Libero excepturi id aperiam. Maiores dolore sint occaecati omnis. Est saepe quo saepe molestiae dolore. Repellat sit natus officia cupiditate. Asperiores vel et consequatur enim sed est qui. Ut illo inventore rem ut nam. Esse sit asperiores eum ipsa. Sit rerum magni nihil hic vel ea ipsum nostrum.', 10, 0),
	(13, 'Ea rem et a veritatis aut illo inventore. Et nemo placeat nihil assumenda perferendis est dolores.', 'corporis-dolor-non-quaerat-minima-et-in-nisi-est-explicabo-dolorem-provident-vero-sed-cupiditate-vero-veniam-omnis-error-aut-dolorum', '6acf97d7bfa9cf994de6e7e783923210.png', '0', '0', '2008-10-10 00:00:00', '2023-03-11 09:54:11', '0', '1', 'Dolores nulla qui sint. Beatae eum perferendis repudiandae. Maiores asperiores aut ratione voluptatem quibusdam possimus ducimus. Hic corrupti tenetur ea voluptatibus eum. Sed et assumenda eos quas ipsum inventore maiores. Praesentium totam corrupti veniam aspernatur. Illum magnam dolorem deleniti repellendus doloribus error sed.', 1, 6),
	(14, 'Et delectus aliquam nihil ut laborum dolorem. Iusto alias non animi enim eius qui incidunt.', 'sit-porro-repellendus-voluptatibus-commodi-repudiandae-blanditiis-delectus-iure-corporis-quo-magni-et-minima', '2c71887e31307700e336426b722ee80c.png', '0', '0', '2018-09-29 00:00:00', '2023-03-11 09:54:11', '1', '1', 'Veritatis quis et ut est tenetur. Iure velit similique consequuntur officia dolorum. Amet labore ipsum ad totam. Consectetur dignissimos et dolor recusandae laboriosam. Non non est ea. Dignissimos adipisci eius voluptatem ut. Cupiditate et quae ea minima magni ut dolorem. Omnis reprehenderit qui perspiciatis deserunt. Rem dolore voluptatem harum. Animi quos non consequuntur modi. Odio porro aut reiciendis. Eligendi dolores suscipit exercitationem voluptatibus excepturi.', 5, 2),
	(15, 'Pariatur voluptatum beatae maxime. Est eum sunt aut enim quas.', 'error-eos-vitae-aliquid-est-nihil-et-soluta-consequatur-quia', 'c62a8c6d34e41b00a62cab17dbe0d278.png', '0', '0', '2017-02-05 00:00:00', '2023-03-11 09:54:11', '1', '1', 'Delectus inventore porro quo earum et quia. Maxime odit aliquam quia corporis. Molestiae non explicabo aut beatae esse non. Sed eligendi blanditiis modi rerum autem. Consequatur adipisci rem numquam ea laborum unde. Vitae rerum et sint porro ut aut. Nam molestiae aspernatur explicabo neque qui suscipit. Necessitatibus fugit et nostrum quisquam quibusdam. Aliquid dolores voluptate earum nemo. Ratione fugiat voluptatem dolorem sit suscipit.', 10, 4),
	(16, 'Moise Error neque et et quia. Quia aspernatur sequi ea. Qui eos possimus ullam qui aspernatur.', 'moise-error-neque-et-et-quia-quia-aspernatur-sequi-ea-qui-eos-possimus-ullam-qui-aspernatur', '1680364277_1e5b20346a08e904d292.png', '0', '0', '1986-09-16 00:00:00', '2023-04-01 00:00:00', '0', '0', 'Consequatur mollitia optio cumque. Vel vitae dicta maxime. Est inventore dolor eius corrupti. Quis fugiat recusandae enim ipsam sed. Blanditiis est est illo praesentium tempore. Facilis est in aperiam provident aspernatur. Hic distinctio quaerat ut cumque quia temporibus nihil. Dolores odio in perferendis deserunt. Harum eveniet sint ut. Eum pariatur molestiae numquam voluptatibus sint.', 5, 4),
	(17, 'At fugiat accusamus autem facilis enim atque at. Voluptatem porro eum quam doloremque.', 'sequi-quis-sint-dolor-vel-quo-eius-ut-sint-aut-et-libero-culpa-quasi-ipsum-inventore-nulla-et-qui-veniam', 'e72d2de978448534fc4a8e40b253245b.png', '0', '0', '1991-02-26 00:00:00', '2023-03-11 09:54:11', '1', '1', 'Quae ea velit ut enim doloribus aspernatur. Mollitia molestias rerum quidem et distinctio et neque voluptatem. Incidunt autem cum praesentium fugiat reiciendis non ut tenetur. Quia neque voluptatem libero assumenda exercitationem ut dolores unde. Vel culpa inventore deleniti aliquid minus. Impedit nihil modi nihil ullam ipsum rerum et. Pariatur placeat vel veritatis et doloribus cum dolor dolorem.', 8, 2),
	(18, 'Iure iure impedit et aliquid. Neque consequuntur et molestiae. Nostrum minima veritatis et earum.', 'ex-quis-dolor-qui-odit-minus-dolores-quidem-dignissimos-nulla-dolore-cumque-est-quia-sit-enim', '02934b7019c26c08af4fc98724b231fb.png', '0', '0', '1995-12-13 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Officiis ex sequi laudantium harum. Iure corrupti non sit ea. Est consequatur vel aut nulla. Ipsam hic recusandae quis iure. Quo repudiandae enim harum. Explicabo velit a aut qui et a voluptatum. Voluptatum dolores quisquam numquam a minus. Itaque laudantium saepe rerum fuga distinctio rerum quos. Sapiente ducimus incidunt enim rem deserunt nam est. Quas nesciunt illo rerum.', 8, 13),
	(19, 'Qui sed voluptatibus eius nihil ut et. Animi officiis enim voluptas earum in quia.', 'officiis-dolorem-esse-quam-iste-vel-itaque-a-aut-ipsum-est-eaque-perspiciatis-est-deserunt-officia', '955783d8efb8d2ee02976c5a1db302b2.png', '1', '0', '1981-06-13 00:00:00', '2023-03-11 09:54:11', '0', '0', 'Quidem omnis ex et modi. Non nihil vero explicabo et expedita unde eum. Quasi id tempora dolorem quae voluptatibus. Dignissimos quae nostrum enim ut vel. Dolor ut adipisci repellendus rerum. Velit laborum voluptates inventore magni ut. Maiores qui consequatur adipisci porro voluptas nisi quia. Repellat rerum expedita voluptatibus. Modi sint incidunt nisi ipsum veniam omnis sapiente in. Saepe quo aut qui eum.', 9, 7),
	(20, 'Nihil qui rerum et sint excepturi ea placeat. Iste itaque quis omnis.', 'temporibus-aut-quisquam-quae-officia-dolorum-aperiam-quo-possimus-a-voluptatibus-aut-tempore-aut-omnis-et', 'c4bc820861c9ef12add1ae1cd056a1c0.png', '0', '0', '2022-06-12 00:00:00', '2023-03-11 09:54:11', '1', '1', 'Dicta sint autem quia a aspernatur sit. Alias occaecati similique quis voluptatem accusantium voluptatem omnis. Ut repellendus debitis rem sequi id illo. Ea officia sit non est quis. Maiores odit dolorem fugiat autem cupiditate. Aspernatur voluptas illum delectus non omnis eaque. Quaerat commodi et velit. Id in sunt quia voluptatum debitis. Nulla sapiente voluptatem ut. Sit sunt sapiente quia aut maxime impedit. Magni voluptas similique libero itaque.', 7, 4),
	(21, 'Earum dolorum amet culpa voluptatum. Distinctio id rerum unde. Sed et est dolores qui.', 'quaerat-eveniet-non-a-est-temporibus-labore-doloremque-voluptatem-laboriosam-voluptatem-beatae-quibusdam-saepe-amet-et-beatae-est-velit-sequi', 'a71ba184d1e8fa2b166eac65e14cbf37.png', '0', '0', '1991-05-03 00:00:00', '1976-11-10 00:00:00', '0', '1', 'Dolorem magnam corporis enim veniam minima libero. Est inventore est molestiae et cumque qui. Natus quia pariatur enim possimus aliquid hic. Ea ipsam et voluptas voluptatum eum tenetur. Est perferendis est nostrum ipsa. Excepturi et ipsa quidem veritatis. In illum sit dignissimos quia eius reprehenderit rem. Quidem ipsam error et molestiae et voluptate. Nemo nemo asperiores autem ea. Optio ullam assumenda qui sit fuga nostrum.', 7, 2),
	(22, 'Voluptates corrupti pariatur dolorem. Rem facere perferendis enim. Quam id facere dolore eos ea.', 'neque-reprehenderit-sunt-cupiditate-repellendus-necessitatibus-excepturi-aut-perferendis-pariatur-qui-enim-autem-consectetur-et-deserunt-provident-dicta-assumenda-natus', '1680304794_04e5344656540a735fe4.jpg', '1', '0', '2008-04-16 00:00:00', '2002-02-16 00:00:00', '0', '0', 'Occaecati neque ut culpa neque ab. Eum vel ut voluptas eos. Voluptatem qui qui cumque autem sit repellendus dignissimos consequatur. Omnis ducimus accusantium animi voluptatem. Quibusdam sapiente porro similique omnis. Officiis iure eveniet sequi et vitae. Sunt qui quasi aliquam pariatur. Nulla ipsam modi deserunt consequatur porro. Eligendi animi veniam ut rerum reprehenderit nisi magnam ut.', 10, 4),
	(23, 'Ipsum perferendis rerum ducimus vel enim hic adipisci. Qui nihil non qui totam est.', 'sapiente-quo-minus-nulla-ex-non-dignissimos-aut-nesciunt-dignissimos-quis-a-sed-suscipit-accusantium', '7831eed075787ebddc6689df958cdfad.png', '0', '0', '2013-11-10 00:00:00', '1977-07-26 00:00:00', '1', '0', 'Autem aliquam distinctio blanditiis tenetur quia ut sequi. Maiores tempore qui ea in est hic ratione cum. Cum animi repudiandae et ut nisi officia laborum. Esse et iusto dolorum qui non. Placeat accusantium pariatur in ex necessitatibus sed quia et. Debitis facilis perferendis tempore amet. Animi rerum porro vitae sed recusandae. Et sapiente quas accusamus unde. Ut in vero minima error. Sed suscipit explicabo autem quibusdam deleniti. Id dolor officia quaerat sit quasi.', 1, 0),
	(24, 'Fuga ex dolore rerum sunt eveniet. Quibusdam consequatur quas reprehenderit velit libero.', 'sapiente-molestiae-asperiores-dolor-earum-tempore-iste-incidunt-ipsam-quia', '1680394209_17ca5fde479e16fb221a.png', '0', '0', '1982-04-16 00:00:00', '1988-06-28 00:00:00', '1', '0', 'Debitis veritatis amet doloribus aut. Et aliquam expedita molestiae maiores. Enim velit minima commodi quibusdam et error facere. Eveniet eaque sed dolore ea. Autem sit sunt totam aut non. Rerum omnis ratione et temporibus dignissimos. Atque veniam quaerat totam nulla illo officia sit et. Eveniet suscipit eos recusandae repellat. Consectetur distinctio voluptatum aut aut consectetur sequi. Saepe ut non qui et earum voluptatibus.', 8, 0),
	(25, 'Test de modification du titre d\'un article.', 'test-de-modification-du-titre-dun-article', '1680304769_0ff0fce97a5880cf6178.jpg', '1', '0', '1978-12-15 00:00:00', '2023-03-31 00:00:00', '0', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, 20),
	(26, 'Where can I get some?', 'where-can-i-get-some', '1680364263_6c9768904645ad2db9f1.jpg', '0', '0', '2023-04-01 00:00:00', '2023-04-01 00:00:00', '0', '0', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, 0),
	(27, 'Denis Lessie pétage pro max fans fwassq', 'denis-lessie-petage-pro-max-fans-fwassq', '1680364238_ebc18ff4616c4d784a04.jpg', '0', '1', '2023-04-01 00:00:00', '2023-04-02 00:00:00', '0', '0', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 5, 4);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_type` enum('admin','moderator','user') NOT NULL,
  `role_description` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table rcl_db.roles : ~3 rows (environ)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`role_id`, `role_type`, `role_description`, `created_at`) VALUES
	(1, 'admin', 'Can RWX and CRD', '2023-01-22 07:27:21'),
	(2, 'moderator', 'Can RX', '2023-01-22 07:27:21'),
	(3, 'user', 'Can RW', '2023-01-22 07:27:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table rcl_db. users
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `u_firstname` varchar(20) NOT NULL,
  `u_lastname` varchar(20) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_role` enum('admin','moderator','user') NOT NULL DEFAULT 'user',
  `status` enum('active','desabled') NOT NULL DEFAULT 'active',
  `phone` varchar(15) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_picture` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table rcl_db.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`u_id`, `u_firstname`, `u_lastname`, `u_email`, `u_role`, `status`, `phone`, `u_password`, `u_picture`, `created_at`) VALUES
	(4, 'Erick ', 'Banze', 'erickbanze@afrinewsoft.com', 'admin', 'active', '+243-098-309-81', '$2y$10$.bgx.z.Ym52TvwqBhPrMkeBCpm4lKZtsTYwzEhUZMOapoD98o.hn.', '1680319921_c2b4156d330c1d77cf5d.jpg', '2023-01-22 07:27:35'),
	(6, 'Freddy', 'Muzez', 'freddymuzez@destin-services.com', 'moderator', 'active', '090393333', '$2y$10$Umc4aMY5QHOogZC90YV28e2bUlwcEUsWyUovoTpQrmHzj..kW.CK.', 'user-default-avatar.png', '2023-01-23 00:00:00'),
	(7, 'Daniel', 'Muzez', 'danielmuzez@destinmzservices.com', 'admin', 'active', '09373883393', '$2y$10$4GzQ/sEj64NXsRqX6DX.iO/CY0jLBrKpCyWi/SdNQA8sve2TTTlly', 'user-default-avatar.png', '2023-01-24 00:00:00'),
	(10, 'Emman', 'Nsuka', 'emmanuel@nsuka.com', 'moderator', 'active', '093933', '$2y$10$ar/rxIYO9D6diIXFe2.mLeiIBU1KbAEjBhe4xyzP4.Wv8j6PlYize', 'user-default-avatar.png', '2023-03-31 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
