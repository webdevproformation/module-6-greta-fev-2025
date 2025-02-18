-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 fév. 2025 à 13:47
-- Version du serveur : 10.3.39-MariaDB-0ubuntu0.20.04.2
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fils_rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dt_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `dt_creation`) VALUES
(1, 'entrée', 'catégorie 1', '2025-02-13 00:00:00'),
(2, 'plat', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae lobortis elit. Integer ut maximus risus, non consectetur metus. Ut leo odio, consectetur at purus sit amet, dapibus luctus ante. Pellentesque sit amet dignissim sapien, eget molestie nibh. Morbi porttitor volutpat turpis vel rhoncus. Vivamus varius facilisis lacus, ac elementum justo imperdiet sit amet. Vestibulum consequat arcu eu libero faucibus, eu efficitur lacus aliquam. Aenean pellentesque odio mi, nec vulputate leo pharetra eu. Donec convallis eget lectus vitae lacinia. Sed laoreet bibendum elit et commodo.\r\n\r\nCras ornare justo et orci hendrerit feugiat. Suspendisse fermentum leo ac malesuada pulvinar. Mauris in eros eu ligula ultricies bibendum at at eros. Duis ultrices feugiat rhoncus. Quisque at aliquet dolor, id fringilla urna. Proin convallis tellus quis arcu hendrerit dapibus. Cras rutrum suscipit dui quis egestas. ', '2025-02-13 19:11:19'),
(3, 'dessert', 'description autre catégorie', '2025-02-13 19:12:22'),
(4, 'digestif', 'digestif et lorem ipsum', '2025-02-15 18:08:24');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dt_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `recette_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `email`, `message`, `dt_creation`, `recette_id`, `is_active`) VALUES
(1, 'premier@yahoo.fr', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel turpis vel lectus vehicula tincidunt. Mauris pellentesque ipsum a sem consectetur bibendum. Phasellus consectetur dignissim bibendum. Proin risus ipsum, commodo porta ipsum a, facilisis interdum nibh. In metus enim, eleifend eget tempus ac, pulvinar sed arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ipsum orci, sollicitudin et facilisis vitae, malesuada quis mauris. Donec non ornare enim.\r\n\r\nNullam mollis lectus id pretium dictum. Pellentesque luctus dictum lorem, vitae hendrerit quam ultrices vel. Etiam sed urna sit amet arcu ullamcorper varius elementum eu arcu. Fusce volutpat massa sapien, sed venenatis mi sollicitudin vel. Sed ante purus, molestie et suscipit tempor, facilisis sed nunc. Mauris accumsan augue est, vel tincidunt lacus congue at. Duis interdum aliquam luctus. Curabitur viverra elit quis libero dapibus tempor. Suspendisse ut nisl gravida, faucibus leo rhoncus, sollicitudin sem. Quisque varius mi odio, ut lobortis libero condimentum ac. Maecenas mollis sapien id ante pharetra volutpat. Donec tincidunt sed enim a mollis. Praesent in dui sit amet elit consequat pretium in ac lorem. Curabitur nec orci eget libero tristique tempor ac a justo. Suspendisse et sagittis nisl. Duis consequat erat commodo, accumsan purus et, pellentesque metus. ', '2025-02-13 15:22:53', 1, 0),
(3, 'email@yahoo.fr', 'autre un message ajouté dans le formulaire', '2025-02-13 18:01:43', 1, 1),
(4, 'premier@yahoo.fr', 'un commentaire\r\navec saut de ligne !!', '2025-02-13 22:46:02', 2, 1),
(5, 'salut@yahoo.fr', 'super article', '2025-02-14 08:12:59', 1, 0),
(6, 'un@commentaire.fr', 'bonjour les amis', '2025-02-17 08:44:47', 26, 1),
(7, 'bonjour@yahoo.fr', 'super article', '2025-02-17 11:01:08', 16, 1),
(8, 'coucou@blabla.fr', 'bonjour les amis !!', '2025-02-17 11:07:36', 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `dt_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `is_publie` tinyint(1) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `duree` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `titre`, `description`, `url_img`, `dt_creation`, `is_publie`, `categorie_id`, `user_id`, `duree`) VALUES
(1, 'recette 1', 'recette 1  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam laoreet metus nec tellus iaculis, vitae consequat felis ullamcorper. Nunc ultricies dolor eu odio convallis commodo. Donec ultrices nisi consequat, ultrices velit at, placerat mi. Sed auctor odio id sodales cursus. Mauris varius mattis felis a dictum. Fusce molestie posuere est sed sollicitudin. Pellentesque gravida, enim in pretium dictum, nibh mi maximus purus, pulvinar mollis turpis ligula eget sem. Vestibulum convallis, sem dictum interdum laoreet, orci turpis scelerisque ipsum, vel posuere libero quam vitae sapien.\r\n\r\nInteger ipsum est, facilisis at mollis in, sodales sodales tortor. Suspendisse vehicula velit a est iaculis dictum. Aliquam sed dui in purus fermentum tincidunt. Ut bibendum cursus tortor, feugiat placerat ex faucibus id. Praesent imperdiet quis est nec lacinia. Proin ornare tempor ipsum, vel pharetra tellus malesuada id. Aliquam erat volutpat. Vivamus volutpat erat felis, posuere bibendum nisl ultrices sed. Aliquam sit amet lorem quis lectus feugiat hendrerit. Phasellus sed euismod lectus.\r\n\r\nMorbi consequat at magna eu auctor. Curabitur lobortis ligula sem, non consectetur sapien tincidunt ac. Morbi porttitor nec mauris pellentesque commodo. Nullam in auctor lacus, non dignissim leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce et lacus ut ipsum consectetur finibus in ac velit. Praesent dui dui, fringilla vel eros quis, scelerisque malesuada mauris.\r\n\r\nPhasellus finibus risus quis tortor consequat, sit amet scelerisque felis sollicitudin. Praesent elementum neque ac ipsum suscipit, vel luctus nunc lobortis. Quisque dictum nunc vitae elit semper, ac mollis mauris lobortis. Vivamus vel ultrices urna, a laoreet ex. Sed lacinia massa a venenatis pellentesque. Nullam eu ante magna. Vestibulum fermentum laoreet magna, quis placerat ante luctus vitae. Nam ultricies mollis ex, non aliquam nibh malesuada id. Pellentesque fermentum ante at eros maximus facilisis. Mauris volutpat elit fermentum lacus aliquet, sed ullamcorper sapien fringilla. Maecenas pulvinar sit amet ipsum vel pulvinar. Nulla facilisi. ', 'public/img/civil-war-marvel-1280x720-wallpaper.jpg', '2025-02-13 15:22:24', 1, 1, 1, 1),
(2, 'nouvelle recette', 'nouvelle recette  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula vitae mauris et scelerisque. Suspendisse semper malesuada justo, eget iaculis massa ullamcorper vel. Donec id eros quis nunc porta molestie. Etiam viverra orci sed tellus malesuada, vel porttitor dolor vestibulum. Ut pretium euismod turpis. Mauris nec est feugiat, pellentesque erat a, aliquet eros. Integer tincidunt tellus ut pellentesque elementum. Integer condimentum magna eu tortor volutpat euismod. Integer maximus mi sit amet malesuada hendrerit. Curabitur consequat ligula sit amet purus tincidunt accumsan. Curabitur auctor urna diam, nec faucibus purus pulvinar id. Vivamus egestas fermentum faucibus. Proin sed sapien eget metus rhoncus porta.\r\n\r\nMauris sollicitudin lectus ac sapien pulvinar commodo. Cras eu orci nec risus hendrerit sagittis. Praesent dui mi, blandit at nisl id, ultricies suscipit mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula consequat nulla faucibus tristique. Curabitur eget nulla vitae ante accumsan euismod pharetra vel ligula. Proin elit nisl, bibendum tincidunt ante sit amet, sollicitudin viverra ipsum. Proin malesuada velit ac magna vulputate, quis dapibus ligula elementum. In ornare porta ipsum a hendrerit. Proin tincidunt libero ac dui dictum, at imperdiet justo tincidunt. In efficitur viverra enim ac sagittis.\r\n\r\nMorbi sed lectus tortor. In a fermentum urna. Curabitur ut mattis ligula. Sed dignissim erat a posuere iaculis. Integer semper porta tellus, nec porttitor dui. Proin vel nisi purus. Vestibulum gravida consectetur dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ornare ut eros vitae rutrum. Aliquam elementum volutpat orci, quis vehicula tellus. Fusce eleifend, velit ornare aliquet lobortis, nulla nunc rhoncus nibh, eu dapibus massa nibh et massa. Duis in arcu id neque consectetur scelerisque a vitae sem. Maecenas in sem ut mi posuere egestas id in ligula. Fusce non porttitor arcu, in tincidunt elit. ', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_6.jpg', '2025-02-13 22:44:23', 1, 1, 3, 22),
(12, 'toto', 'toto', 'public/img/BlackLabel-04-2.3.001-bigpicture_04_1.jpg', '2025-02-13 23:40:07', 1, 1, 3, 1),
(15, 'une autre image', 'une autre image', 'public/img/403645.jpg', '2025-02-14 00:00:27', 1, 2, 3, 22),
(16, 'ajouter', 'ajouter', 'public/img/390142.jpg', '2025-02-14 07:50:41', 1, 2, 3, 2),
(17, 'toto', 'toto', 'public/img/photoshop1.jpg', '2025-02-14 11:26:02', 1, 2, 3, 22),
(19, 'première recette de titi', 'première recette de titi', 'public/img/1cb8c723-060c-41fc-ac49-a519e898afe5.gif', '2025-02-14 15:19:34', 1, 2, 2, 22),
(20, 'recette 2', 'recette 2', 'public/img/2d8f0632-b818-4c30-955f-1878fc50925e.jpg', '2025-02-14 19:09:04', 1, 3, 2, 20),
(21, 'recette 3', 'recette 3', 'public/img/280015.jpg', '2025-02-14 19:09:30', 1, 3, 2, 30),
(22, 'encore une autre recette', 'encore une autre recette', 'public/img/241901.jpg', '2025-02-14 19:09:58', 1, 3, 2, 5),
(23, 'final recette', 'final recette', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_5.jpg', '2025-02-14 19:11:20', 1, 2, 2, 40),
(24, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_7.jpg', '2025-02-14 21:03:50', 1, 1, 3, 10),
(25, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_12.jpg', '2025-02-14 21:04:21', 1, 3, 3, 15),
(26, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_8.jpg', '2025-02-14 21:05:00', 1, 2, 3, 5),
(27, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/BlackLabel-05-2.3.001-bigpicture_05_1.jpg', '2025-02-14 21:06:25', 1, 1, 3, 15),
(28, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/1000.jpeg', '2025-02-14 21:06:51', 1, 3, 3, 50),
(29, 'lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum arcu eu sagittis efficitur. Fusce quis dolor quis sapien pellentesque rutrum non ullamcorper magna. Quisque feugiat purus ut lobortis lacinia. Curabitur et tellus egestas, commodo magna elementum, pulvinar urna. In molestie scelerisque lacus, eget laoreet lacus venenatis id. Nulla auctor enim nec pharetra eleifend. Nunc turpis urna, iaculis ut accumsan at, egestas ornare purus. Aenean lorem purus, vehicula feugiat ante vel, fermentum iaculis justo. Nam efficitur ante quam, id interdum justo semper vitae. Phasellus id risus blandit, ultrices erat non, suscipit justo. Duis vehicula, leo at dignissim mollis, leo augue condimentum libero, eget aliquam nisi tellus id orci. Ut suscipit diam leo, ac hendrerit purus convallis eu. Maecenas at lacinia augue, eu pulvinar nulla. Pellentesque hendrerit, tortor sed vehicula commodo, erat arcu commodo magna, eget accumsan risus ligula nec erat.\r\n\r\nMaecenas ac urna eu ante facilisis auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla lectus sed enim placerat aliquet. Phasellus felis erat, rhoncus vitae volutpat vel, consequat dictum arcu. Nam sit amet quam mi. Nunc eleifend cursus sem dapibus euismod. Maecenas et leo nulla. ', 'public/img/fd24e90e-81a0-46ef-b496-fb1b688b5ee7_normal.jpg', '2025-02-14 21:07:30', 0, 1, 3, 25),
(30, 'Lasagnes', 'Couper un oignon et une gousse d\'ail en petit morceaux. Les faire revenir à feu doux dans une casserole ou une sauteuse avec une cuillère à soupe d\'huile d\'olive, jusqu\'à ce que les oignons soient devenus un peu translucides. Afin d\'exhaler les saveurs de l\'oignon, démarrer la cuisson à feu vif pendant 1 à 2 minutes. Puis baisser le feu juste après pour ne pas que les oignons ne brûlent.\r\n2 Une fois que les oignons ont pris une jolie couleur dorée, ajouter 800 g de pulpe de tomate. Saler, poivrer et ajouter une bonne cuillère à soupe d\'herbes aromatiques (au choix : origan, basilic, thym). Laisser réduire et mijoter à feu doux pendant 20 minutes, avant de mixer ou non selon les goûts. Contrairement aux tomates fraîches, la pulpe en conserve étant plutôt acide, penser à ajouter 2 morceaux de sucre pour adoucir la sauce.\r\n3 Pendant que la sauce mijote, faire chauffer un peu d\'huile d\'olive dans une poêle pour y faire revenir 300 g de viande de bœuf hachée à feu moyen pendant 3 à 5 minutes. Saler et poivrer, puis la mélanger à la sauce tomate réservée. Penser à dégraisser la viande avant de la mélanger à la sauce tomate. Pour cela, retirer la viande à l\'aide d\'une écumoire.\r\n4 Dans une casserole, faire fondre 70 g de beurre, et ajouter la même quantité de farine hors du feu. Mélanger pour que le beurre soit absorbé. Ajouter 50 cl de lait très progressivement en mélangeant pour empêcher la formation de grumeaux. Replacer sur feu doux et laisser épaissir pendant quelques minutes. Saler, poivrer et ajouter une bonne pincée de noix de muscade.\r\n5 Beurrer un plat, et y déposer une couche de béchamel, puis une couche de lasagnes, et une de sauce tomate à la viande parsemée d\'emmental râpé. Répéter l\'opération jusqu\'à épuisement des ingrédients en terminant par de la béchamel, et saupoudrer avec du parmesan râpé. Les amateurs peuvent aussi ajouter des lamelles de champignons de Paris au moment du montage.\r\nPour finir\r\nEnfourner à four préchauffé à 165°c (thermostat 5/6) pendant 45 minutes environ, pour que les lasagnes soient bien gratinées. Si les lasagnes gratinent trop vite, les recouvrir de papier d\'aluminium.', 'public/img/lasagnes.jpg', '2025-02-17 13:32:02', 1, 2, 3, 45);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'redacteur',
  `dt_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `dt_creation`, `is_active`) VALUES
(1, 'toto@yahoo.fr', '123456', 'admin', '2025-02-13 15:21:42', 1),
(2, 'titi@yahoo.fr', '$2y$10$WfLOEHP3a2C7lKU4njJuneY6UXd8daZmM.x7tfqFN8vxPlaAHBv1q', 'redacteur', '2025-02-13 18:16:14', 1),
(3, 'coucou@yahoo.fr', '$2y$10$MzD8HKJyZdgFVunjsjJOde5Q3JoJh6qahp32/nJZUJiPUEHFYrhNa', 'admin', '2025-02-13 18:39:24', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recette_id` (`recette_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`);

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recettes_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
