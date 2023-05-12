-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for base
CREATE DATABASE IF NOT EXISTS `base` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `base`;

-- Dumping structure for table base.gamesdb
CREATE TABLE IF NOT EXISTS `gamesdb` (
  `GameID` int(6) NOT NULL,
  `fromUser` int(10) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `genre` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `date` tinytext NOT NULL,
  `path` text NOT NULL,
  UNIQUE KEY `GameID` (`GameID`),
  UNIQUE KEY `games` (`title`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table base.gamesdb: ~38 rows (approximately)
INSERT INTO `gamesdb` (`GameID`, `fromUser`, `title`, `description`, `genre`, `price`, `date`, `path`) VALUES
	(110199, 41, 'Crusader Kings III', 'Love, fight, scheme, and claim greatness. Determine your noble house’s legacy in the sprawling grand strategy of Crusader Kings III. Death is only the beginning as you guide your dynasty’s bloodline in the rich and larger-than-life simulation of the Middle Ages.', 'Strategy', '49,99€', '1 Sep, 2020', 'https://cdn.akamai.steamstatic.com/steam/apps/1158310/header.jpg?t=1683128207'),
	(136898, 41, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).', 'FPS', 'Free to Play', '21 Aug, 2012', 'https://cdn.akamai.steamstatic.com/steam/apps/730/header.jpg?t=1683566799'),
	(154390, 41, 'Forza Horizon 5', 'Your Ultimate Horizon Adventure awaits! Explore the vibrant open world landscapes of Mexico with limitless, fun driving action in the world’s greatest cars. Conquer the rugged Sierra Nueva in the ultimate Horizon Rally experience. Requires Forza Horizon 5 game, expansion sold separately.', 'Racing', '186,19€', '8 Nov, 2021', 'https://cdn.akamai.steamstatic.com/steam/apps/1551360/header.jpg?t=1683059745'),
	(165022, 41, 'Path of Exile', 'You are an Exile, struggling to survive on the dark continent of Wraeclast, as you fight to earn power that will allow you to exact your revenge against those who wronged you. Created by hardcore gamers, Path of Exile is an online Action RPG set in a dark fantasy world.', 'Free to Play', 'Free to Play', '23 Oct, 2013', 'https://cdn.akamai.steamstatic.com/steam/apps/238960/header.jpg?t=1680737814'),
	(184279, 41, 'Dead by Daylight', 'Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, and the other four players play as Survivors, trying to escape the Killer and avoid being caught and killed.', 'Horror', '19,99€', '14 Jun, 2016', 'https://cdn.akamai.steamstatic.com/steam/apps/381210/header.jpg?t=1683120711'),
	(201342, 41, 'Darkest Dungeon® II', 'Darkest Dungeon II is a roguelike road trip of the damned. Form a party, equip your stagecoach, and set off across the decaying landscape on a last gasp quest to avert the apocalypse. The greatest dangers you face, however, may come from within...', 'Turn-Based Tactics', '38,99€', '8 May, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1940340/header.jpg?t=1683560826'),
	(228709, 41, 'Hogwarts Legacy', 'Hogwarts Legacy is an immersive, open-world action RPG. Now you can take control of the action and be at the center of your own adventure in the wizarding world.', 'Magic', '59,99€', '10 Feb, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/990080/header.jpg?t=1680647016'),
	(302448, 41, 'EA SPORTS™ FIFA 23', 'FIFA 23 brings The World’s Game to the pitch, with HyperMotion2 Technology, men’s and women’s FIFA World Cup™coming during the season, women’s club teams, cross-play features*, and more.', 'Football (Soccer)', '69,99€', '29 Sep, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1811260/header.jpg?t=1682117049'),
	(316015, 41, 'The Sims™ 4', 'Play with life and discover the possibilities. Unleash your imagination and create a world of Sims that’s wholly unique. Explore and customize every detail from Sims to homes–and much more.', 'Free to Play', 'Free To Play', '2 Sep, 2014', 'https://cdn.akamai.steamstatic.com/steam/apps/1222670/header.jpg?t=1682010160'),
	(317118, 41, 'Total War: WARHAMMER III', 'The cataclysmic conclusion to the Total War: WARHAMMER trilogy is here. Rally your forces and step into the Realm of Chaos, a dimension of mind-bending horror where the very fate of the world will be decided. Will you conquer your Daemons… or command them?', 'Early Access', '59,99€', '16 Feb, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1142710/header.jpg?t=1681400832'),
	(320642, 41, 'FINAL FANTASY XIV Online', 'Take part in an epic and ever-changing FINAL FANTASY as you adventure and explore with friends from around the world.', 'MMORPG', '9,99€', '18 Feb, 2014', 'https://cdn.akamai.steamstatic.com/steam/apps/39210/header.jpg?t=1669805579'),
	(333990, 41, 'The Elder Scrolls® Online', 'Join over 20 million players in the award-winning online multiplayer RPG and experience limitless adventure in a persistent Elder Scrolls world. Battle, craft, steal, or explore, and combine different types of equipment and abilities to create your own style of play. No game subscription required.', 'RPG', '19,99€', '4 Apr, 2014', 'https://cdn.akamai.steamstatic.com/steam/apps/306130/header.jpg?t=1681923675'),
	(338013, 41, 'STAR WARS™: The Old Republic™', 'STAR WARS™: The Old Republic™ is a free-to-play MMORPG that puts you at the center of your own story-driven saga. Play as a Jedi, Sith, Bounty Hunter, or one of many other iconic STAR WARS roles in the galaxy far, far away over three thousand years before the classic films.', 'Free to Play', 'Free To Play', '20 Dec, 2011', 'https://cdn.akamai.steamstatic.com/steam/apps/1286830/header.jpg?t=1680085446'),
	(367489, 41, 'Dota 2', 'Every day, millions of players worldwide enter battle as one of over a hundred Dota heroes. And no matter if it\'s their 10th hour of play or 1,000th, there\'s always something new to discover. With regular updates that ensure a constant evolution of gameplay, features, and heroes, Dota 2 has taken on a life of its own.', 'Free to Play', 'Free to Play', '9 Jul, 2013', 'https://cdn.akamai.steamstatic.com/steam/apps/570/header.jpg?t=1682639497'),
	(374833, 41, 'Call of Duty®: Black Ops III', 'Call of Duty®: Black Ops III Zombies Chronicles Edition includes the full base game plus the Zombies Chronicles content expansion.', 'Multiplayer', '14,49€', '5 Nov, 2015', 'https://cdn.akamai.steamstatic.com/steam/apps/311210/header.jpg?t=1646763462'),
	(427300, 41, 'Rust', 'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.', 'Survival', '39,99€', '8 Feb, 2018', 'https://cdn.akamai.steamstatic.com/steam/apps/252490/header.jpg?t=1678981332'),
	(437587, 41, 'HITMAN 3', 'Enter the world of the ultimate assassin. HITMAN World of Assassination brings together the best of HITMAN, HITMAN 2 and HITMAN 3 including the main campaign, contract mode, escalations, elusive target arcades and the roguelike inspired game mode HITMAN: Freelancer.', 'Action', '9,98€', '20 Jan, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1659040/header.jpg?t=1679476219'),
	(506418, 41, 'PUBG: BATTLEGROUNDS', 'Play PUBG: BATTLEGROUNDS for free. Land on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds. Squad up and join the Battlegrounds for the original Battle Royale experience that only PUBG: BATTLEGROUNDS can offer.', 'Survival', 'Free to Play', '21 Dec, 2017', 'https://cdn.akamai.steamstatic.com/steam/apps/578080/header.jpg?t=1681115546'),
	(525275, 41, 'STAR WARS Jedi: Survivor™', 'The story of Cal Kestis continues in STAR WARS Jedi: Survivor™, a galaxy-spanning, third-person, action-adventure game.', 'Action', '69,99€', '27 Apr, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1774580/header.jpg?t=1682692236'),
	(536284, 41, 'DREDGE', 'DREDGE is a single-player fishing adventure with a sinister undercurrent. Sell your catch, upgrade your boat, and dredge the depths for long-buried secrets. Explore a mysterious archipelago and discover why some things are best left forgotten.', 'Exploration', '13,97€', '30 Mar, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1562430/header.jpg?t=1682587412'),
	(541502, 41, 'Lost Ark', 'Embark on an odyssey for the Lost Ark in a vast, vibrant world: explore new lands, seek out lost treasures, and test yourself in thrilling action combat in this action-packed free-to-play RPG.', 'MMORPG', 'Free To Play', '11 Feb, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1599340/header.jpg?t=1678222947'),
	(565674, 41, 'Apex Legends™', 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.', 'Free to Play', 'Free to Play', '4 Nov, 2020', 'https://cdn.akamai.steamstatic.com/steam/apps/1172470/header.jpg?t=1683651833'),
	(586167, 41, 'Wartales', 'Wartales is an open world RPG in which you lead a group of mercenaries in their search for wealth across a massive medieval universe. Explore the world, recruit companions, collect bounties and unravel the secrets of the tombs of the ancients!', 'RPG', '34,99€', '12 Apr, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1527950/header_alt_assets_2.jpg?t=1683116759'),
	(663178, 41, 'Stellaris', 'Explore a galaxy full of wonders in this sci-fi grand strategy game from Paradox Development Studios. Interact with diverse alien races, discover strange new worlds with unexpected events and expand the reach of your empire. Each new adventure holds almost limitless possibilities.', 'Space', '174,40€', '9 May, 2016', 'https://cdn.akamai.steamstatic.com/steam/apps/281990/header.jpg?t=1683647820'),
	(665234, 41, 'War Thunder', 'War Thunder is the most comprehensive free-to-play, cross-platform, MMO military game dedicated to aviation, armoured vehicles, and naval craft, from the early 20th century to the most advanced modern combat units. Join now and take part in major battles on land, in the air, and at sea.', 'Free to Play', 'Free to Play', '15 Aug, 2013', 'https://cdn.akamai.steamstatic.com/steam/apps/236390/header.jpg?t=1681461045'),
	(691536, 41, 'Destiny 2', 'Destiny 2 is an action MMO with a single evolving world that you and your friends can join anytime, anywhere, absolutely free.', 'Free to Play', 'Free To Play', '1 Oct, 2019', 'https://cdn.akamai.steamstatic.com/steam/apps/1085660/header.jpg?t=1680800510'),
	(701087, 41, 'Hell Let Loose', 'Join the ever expanding experience of Hell Let Loose - a hardcore World War Two first person shooter with epic battles of 100 players with infantry, tanks, artillery, a dynamically shifting front line and a unique resource based RTS-inspired meta-game.', 'Shooter', '26,16€', '27 Jul, 2021', 'https://cdn.akamai.steamstatic.com/steam/apps/686810/header.jpg?t=1682068768'),
	(703424, 41, 'Black Desert', 'Played by over 20 million Adventurers - Black Desert Online is an open-world, action MMORPG. Experience intense, action-packed combat, battle massive world bosses, fight alongside friends to siege and conquer castles, and train in professions such as fishing, trading, crafting, cooking, and more!', 'MMORPG', '9,99€', '24 May, 2017', 'https://cdn.akamai.steamstatic.com/steam/apps/582660/header.jpg?t=1681332065'),
	(721130, 41, 'Team Fortress 2', 'Nine distinct classes provide a broad range of tactical abilities and personalities. Constantly updated with new game modes, maps, equipment and, most importantly, hats!', 'Free to Play', 'Free to Play', '10 Oct, 2007', 'https://cdn.akamai.steamstatic.com/steam/apps/440/header.jpg?t=1682961494'),
	(747361, 41, 'Warframe', 'Awaken as an unstoppable warrior and battle alongside your friends in this story-driven free-to-play online action game', 'Free to Play', 'Free to Play', '25 Mar, 2013', 'https://cdn.akamai.steamstatic.com/steam/apps/230410/header.jpg?t=1683740930'),
	(749225, 41, 'Voidtrain', 'Become a crew member of an Interdimensional Express Train! Discover a new world full of mysterious creatures, enemies and places. Upgrade and customize your train, gather new materials and build better weapons. Play solo or online сo-op with up to 4 people.', 'Open World Survival Craft', '14,99€', '9 May, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1159690/header.jpg?t=1683722578'),
	(795966, 41, 'Sons Of The Forest', 'Sent to find a missing billionaire on a remote island, you find yourself in a cannibal-infested hellscape. Craft, build, and struggle to survive, alone or with friends, in this terrifying new open-world survival horror simulator.', 'Multiplayer', '28,99€', '23 Feb, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1326470/header.jpg?t=1679677298'),
	(811554, 41, 'Age of Wonders 4', 'Rule a fantasy realm of your own design! Explore new magical realms in Age of Wonders’ signature blend of 4X strategy and turn-based tactical combat. Control a faction that grows and changes as you expand your empire with each turn!', 'Strategy', '49,99€', '2 May, 2023', 'https://cdn.akamai.steamstatic.com/steam/apps/1669000/header.jpg?t=1683635102'),
	(869755, 41, 'Yu-Gi-Oh! Master Duel', 'Yu-Gi-Oh! MASTER DUEL is the ultimate free-to-play cross-platform strategy card game with fast-paced Duels, stunning HD graphics and a new, dynamic soundtrack! Get ready to challenge Duelists around the world!', 'Card Game', 'Free To Play', '18 Jan, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1449850/header.jpg?t=1683514011'),
	(882117, 41, 'Pathfinder: Wrath of the Righteous - Enhanced Edition', 'Embark on a journey to a realm overrun by demons in a new epic RPG from the creators of the critically acclaimed Pathfinder: Kingmaker. Explore the nature of good and evil, learn the true cost of power, and rise as a Mythic Hero capable of deeds beyond mortal expectations.', 'Turn-Based Combat', '70,33€', '2 Sep, 2021', 'https://cdn.akamai.steamstatic.com/steam/apps/1184370/header.jpg?t=1683123753'),
	(892833, 41, 'Call of Duty®: Modern Warfare® II', 'Call of Duty®: Modern Warfare® II drops players into an unprecedented global conflict that features the return of the iconic Operators of Task Force 141.', 'FPS', '69,99€', '27 Oct, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1938090/header_alt_assets_3.jpg?t=1683652297'),
	(900646, 41, 'ELDEN RING', 'THE NEW FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.', 'Souls-like', '59,99€', '24 Feb, 2022', 'https://cdn.akamai.steamstatic.com/steam/apps/1245620/header.jpg?t=1683618443'),
	(995630, 41, 'Europa Universalis IV', 'Europa Universalis IV gives you control of a nation through four dramatic centuries. Rule your land and dominate the world with unparalleled freedom, depth and historical accuracy. Write a new history of the world and build an empire for the ages.', 'Grand Strategy', '39,99€', '13 Aug, 2013', 'https://cdn.akamai.steamstatic.com/steam/apps/236850/header.jpg?t=1681894887');

-- Dumping structure for table base.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `theme` text NOT NULL DEFAULT 'black',
  `library` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table base.user: ~2 rows (approximately)
INSERT INTO `user` (`id`, `username`, `password`, `email`, `theme`, `library`) VALUES
	(41, 'noah', '$2y$10$p1mtOYPxHxyVYBiT8ospEeYNJRZIiHINVpYNpXBa3XYcRkckKoC9G', 'noahwegbratt@gmail.com', 'particle', NULL),
	(42, 'james', '$2y$10$Fq3TjzmaYVzbGKjrddoYoOxyC1YWH7cv3E.mBb8eLysP8Ak4cL0nu', 'jamesson@gmail.com', 'particle', NULL);

-- Dumping structure for table base.userlibrary
CREATE TABLE IF NOT EXISTS `userlibrary` (
  `user` int(11) NOT NULL,
  `GameId` int(11) NOT NULL,
  `date added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table base.userlibrary: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
