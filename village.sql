-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 28 mars 2020 à 10:18
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `village`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `nom`, `lieu`, `date`, `description`) VALUES
(251, 'Richard Gregoire', 'Leduc-sur-Louis', '2011-02-07', 'Ipsum odio quos quo cum quia dolorem. Voluptatem nisi eius corrupti dolorem aut ea ut. Eligendi quia eos sapiente minima vitae nemo.'),
(252, 'Nathalie du Garnier', 'Paulnec', '1997-08-24', 'Dignissimos labore et et dolores. Quasi voluptatem sit voluptas. Esse error aperiam autem et qui velit debitis.'),
(253, 'François Lemaire', 'CharpentierBourg', '1976-06-22', 'Facilis molestias aut et in. Quisquam ullam minima error et ex. Commodi sit est mollitia sapiente odio ab distinctio. Ducimus et ea occaecati. Quo minus est cumque laudantium et quisquam voluptatibus.'),
(254, 'Philippe Brun', 'Allain', '2014-01-18', 'Quia nihil suscipit officiis nemo. Voluptatem officia voluptas animi quod et suscipit qui id.'),
(255, 'Lucie Francois', 'Begue', '1972-02-12', 'Nihil voluptates quisquam qui. Quas quasi quia exercitationem et fugiat. Cumque ratione illo id. A voluptas qui magni placeat.'),
(256, 'Véronique Bernier', 'Jacob', '1973-06-20', 'Quo cupiditate qui ex qui. Libero fugit voluptatum soluta placeat amet harum. Labore totam molestiae maxime omnis debitis quas.'),
(257, 'Susanne Jacques-Morvan', 'Dumont', '2010-10-21', 'Molestias quisquam qui sapiente dolore recusandae animi quis. Doloremque cum temporibus sit necessitatibus. In in reiciendis debitis labore totam.'),
(258, 'Patricia de la Pereira', 'Diallo', '2002-12-29', 'Ut possimus laboriosam ex voluptas expedita unde. Aut earum eos est expedita. Architecto nostrum laudantium quod.'),
(259, 'Dominique Colin', 'JacquesBourg', '2013-05-05', 'Ut saepe dolore quia nulla odit quibusdam. Eum est cum quo suscipit. Sed ratione maiores possimus magnam a doloremque.'),
(260, 'Corinne de Mallet', 'Boucher', '2007-09-30', 'Enim ut ducimus at tempore. Et quis eius sunt voluptatem. Voluptatem adipisci et ducimus et qui. Error reiciendis ut voluptas enim.'),
(261, 'Étienne Ledoux', 'Texier', '2005-12-11', 'Animi magnam id quos quae ut. Dolorem et magnam sit totam omnis necessitatibus totam amet. Corporis recusandae eos aliquid ab illo cumque.'),
(262, 'Grégoire Dupont', 'Pelletier', '1972-03-20', 'Quibusdam inventore aut enim eaque qui recusandae et. Non minima sed nulla dolores temporibus sint. Repudiandae id vel consequuntur et est rerum veniam qui.'),
(263, 'Yves Dumas', 'Marechal-sur-Collin', '2007-12-21', 'Ratione animi nostrum ducimus quia recusandae accusamus autem. Corrupti quidem voluptatibus impedit ut at. Excepturi blanditiis sunt cupiditate quia.'),
(264, 'Alex-Margot Torres', 'Moreau', '1973-07-01', 'Ea officiis debitis impedit ut. Blanditiis animi accusantium ipsa maiores eum rerum dicta eveniet. Beatae qui libero sit facilis et sit qui.'),
(265, 'Emmanuel de Dupuis', 'LouisBourg', '1972-01-05', 'Cupiditate dolores consequatur soluta debitis quae. Qui nemo maiores veniam aliquam. Esse error eos deserunt ab. Earum optio blanditiis recusandae distinctio et.'),
(266, 'Paul Daniel', 'Moreno', '1973-12-20', 'Hic facilis officiis id velit inventore. Nulla eveniet iste dolores ut velit. Et vero excepturi aut ullam sit.'),
(267, 'Marie Maurice-Traore', 'Milletdan', '1998-02-19', 'Minus nisi veniam cum blanditiis. Dignissimos numquam consequatur est. Qui quasi laboriosam nihil neque quibusdam voluptatem. Non quia repellat quia odio quaerat asperiores. Velit eligendi necessitatibus rerum odit minus.'),
(268, 'Paul Lecoq', 'Coste', '2016-12-13', 'Ex officiis nobis cupiditate inventore est. Porro eos quas iusto. Ut rerum maxime aut quasi error non debitis minus. Omnis consequuntur placeat perspiciatis qui.'),
(269, 'Juliette Albert', 'Martins-sur-Martineau', '2006-05-26', 'Placeat quae deserunt omnis provident modi. Et nostrum tempore debitis qui asperiores temporibus. Accusantium iusto amet magnam aut enim.'),
(270, 'Auguste-Patrick Delattre', 'Guyot', '2002-10-28', 'Officia dolorum et et dolorum et. Voluptas natus laboriosam veritatis. Et eum consectetur optio cumque. Cupiditate recusandae temporibus eligendi cum id assumenda. Eaque amet possimus quidem et qui sint.'),
(271, 'Aimée Noel-Morvan', 'Jacques', '2003-07-09', 'Qui quasi qui temporibus ex placeat ut animi. Nobis quasi debitis illum quos. Assumenda et est temporibus animi mollitia aliquid. Voluptatibus facilis perspiciatis error officia.'),
(272, 'Auguste Neveu', 'Laurent', '1971-11-12', 'Qui libero itaque sunt aperiam cumque debitis dolorem. Voluptate esse praesentium sit corrupti et. Autem quasi perspiciatis praesentium enim nemo consequuntur.'),
(273, 'Mathilde Besson-Carre', 'Seguinboeuf', '2001-01-02', 'Ut rem soluta reprehenderit atque cumque. Officiis repudiandae dicta aspernatur reprehenderit veniam. Dolorem consequuntur sunt ex nihil temporibus fuga. Enim et non dolorum culpa dolorem modi voluptas soluta.'),
(274, 'Marcelle Teixeira', 'Guilbert', '1977-02-05', 'Quis velit eius nisi quia sint est. Et natus ab eum consectetur maiores modi. Et et ut hic rerum velit praesentium voluptatem labore.'),
(275, 'Léon Bousquet', 'Joseph', '1996-06-08', 'Nesciunt eligendi dolores est at. Molestiae quasi neque mollitia exercitationem vel culpa maxime. Eum nobis iure corporis quasi unde autem quas. In in nisi quas laboriosam quasi.'),
(276, 'Robert Navarro', 'Laporte', '2017-09-23', 'Voluptate consequatur voluptas et officia rerum officia sed. Sapiente ut consectetur fugiat dolorem hic inventore. Possimus voluptatem autem voluptas. Aperiam sed ea et maxime dolorum quia recusandae.'),
(277, 'Astrid-Michelle Leger', 'Besson', '2001-01-15', 'Tempore ipsam cupiditate alias porro ut eveniet qui tempora. Quia animi deserunt mollitia eum. Natus minima recusandae minus quisquam ut maxime. Eum aliquid neque atque cupiditate natus. Nobis debitis dignissimos suscipit vitae sapiente at ipsum.'),
(278, 'Victor Albert', 'PichonBourg', '1972-04-01', 'Et sed quia ratione quis esse. Consequuntur vitae vel ipsa non optio aliquid. Voluptatem ut consequatur doloremque ea.'),
(279, 'Édouard Aubert', 'Seguin', '2004-03-21', 'Error reiciendis similique magni tempora voluptatem. Natus dolorem expedita ea. Omnis dolorem officia assumenda ea id. Quia consequatur dolores et omnis voluptatem mollitia omnis maiores.'),
(280, 'Charles Grenier', 'BlanchetBourg', '2001-06-16', 'Saepe minus soluta et omnis aperiam ad. Quia minus rem qui. Maiores in recusandae odit. Dolorem omnis saepe quae quae dolores culpa perferendis.'),
(281, 'Élisabeth Boyer', 'Breton', '1989-11-26', 'Quibusdam qui voluptatem inventore et. Laboriosam voluptas harum magni debitis. Ipsum minus et qui eaque occaecati nisi nesciunt. Minus adipisci minima eum veritatis corporis eum quibusdam.'),
(282, 'Honoré-Vincent Lebreton', 'Lefebvre', '1978-08-23', 'Minus officia dolor est quia voluptatem inventore. Est ea totam sunt natus non. Quaerat incidunt facilis quia corporis accusamus quas ea.'),
(283, 'Jacqueline Lacombe', 'Marchand-sur-Bousquet', '1985-05-16', 'Sed velit dolores facilis repudiandae amet. Sunt voluptatem ad quas voluptatum mollitia. Quis optio autem ut nihil.'),
(284, 'Luce Fournier', 'Boyerdan', '1994-11-19', 'Veniam optio in qui qui omnis nobis itaque. Qui similique quibusdam dolores quia nihil aut aut. Amet quidem itaque quaerat dolores asperiores beatae libero. Nihil rerum vero nulla consequuntur neque aperiam.'),
(285, 'Manon Guillet', 'Delahaye-la-Forêt', '2002-07-01', 'Iste blanditiis facilis alias nulla omnis qui eligendi. Iste quos ut commodi velit ex. Iste et qui earum nostrum dolores consequatur. Maxime est dolorum voluptatem neque non.'),
(286, 'Joseph de Aubry', 'Bouchet', '1970-07-13', 'Rerum quis dolorum fuga ipsa sed. Non illum ducimus et impedit. Suscipit nemo consequatur eaque mollitia.'),
(287, 'Noémi Mercier', 'Fournier-sur-Jacob', '1991-11-11', 'Voluptatem exercitationem non commodi occaecati. Sit ut atque ipsum nesciunt. Quas corrupti similique tenetur sequi. Qui odit vero suscipit quam tempora.'),
(288, 'Virginie-Lucy Boyer', 'Merleboeuf', '1977-05-27', 'Ratione neque consequatur id commodi. Qui voluptatum et quae eos dolore voluptatem.'),
(289, 'André de la Benard', 'Lemaire', '1992-02-20', 'Corrupti dolor velit aspernatur ex voluptatem rerum deleniti. Voluptatem vero odit cumque minus ut. Est sequi minus velit eius deleniti quis.'),
(290, 'Isaac-René Bazin', 'Lefevredan', '1976-05-22', 'Et autem est aliquam et in adipisci. Impedit numquam illo sunt soluta. Est optio voluptatum atque a.'),
(291, 'Édouard Traore-Hernandez', 'Aubryboeuf', '2000-01-13', 'Ut eos adipisci et a. Ut perspiciatis sed quo voluptas et. Quibusdam a doloribus ea. Quia natus adipisci veritatis repellat.'),
(292, 'Étienne Guyon', 'Gaudin-la-Forêt', '1973-03-02', 'Ut odit omnis ea quia et sint saepe. Sequi quo est quo perspiciatis sit laboriosam sequi. Ratione reprehenderit fugiat ad reiciendis consequuntur delectus. Et dolores deserunt odit cumque.'),
(293, 'Yves Blin', 'Charpentier', '2011-08-24', 'At veritatis sit quia dolores voluptas sed. Consequuntur error commodi repellat ipsam. Molestias quos ad ratione quas quis. Dolorem voluptate est voluptatem vel.'),
(294, 'Agathe Deschamps', 'Faure', '1980-07-09', 'Excepturi ut tempore a quidem error dignissimos. Quo et mollitia ipsum voluptas autem magnam. Facere aut cumque porro ratione. Ut ipsa at delectus maxime odio. Ea ut reprehenderit sed voluptas quis sed.'),
(295, 'Célina Durand', 'Garcia-sur-Bodin', '1983-04-30', 'Rerum officiis corporis placeat sunt animi. Non nihil doloremque reiciendis rerum sunt officia. Nisi sit aliquid laboriosam quo.'),
(296, 'Marguerite Thierry', 'Dupuis', '2010-07-15', 'Natus illo nesciunt non nobis aperiam. Odit minus libero voluptas aut nesciunt sed. Quis nesciunt ullam vel. Porro blanditiis quos eum fugit.'),
(297, 'Anne Fabre-Lefebvre', 'BonnetBourg', '2011-02-21', 'Dolores debitis vitae placeat rerum impedit. Minus temporibus et libero quasi. Facere distinctio molestiae quas amet quia.'),
(298, 'Nath-Célina Martinez', 'Weiss', '1990-09-02', 'Rerum in enim dolor sed. Odit eligendi ut neque ab provident consequatur et. Nesciunt voluptatem eum dolorum. Delectus optio eum aut delectus expedita voluptatum.'),
(299, 'Brigitte Raymond-Texier', 'Petit', '1987-01-25', 'Voluptatum ut omnis ab molestiae ut inventore molestiae. Dolor veniam illum in iure odio possimus ut. Velit itaque sequi inventore praesentium harum ducimus vel quaerat.'),
(300, 'Margaret Alves', 'Thierry', '2008-10-28', 'Quo porro fugit laudantium reiciendis deserunt rerum aut. Quidem debitis sed rerum eum et. Fugiat vitae aliquam eos consequuntur. Corporis cumque hic sed reprehenderit.');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200319124518', '2020-03-19 12:48:25'),
('20200326141357', '2020-03-26 14:20:44');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
