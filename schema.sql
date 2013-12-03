SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `sector_id` int(22) not null default '1',
  `race_id` tinyint(2) not null default '1',
  `vote_id` int(11) null,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


create table if not exists race (
	id tinyint(2) not null primary key auto_increment,
	name varchar(64) not null,
	description varchar(256) not null
);
create table if not exists galaxy (
	id int(22) unsigned not null primary key auto_increment
);
create table if not exists sector (
	id int(22) unsigned not null primary key auto_increment,
	sector int(22) unsigned not null,
	galaxy_id int(22) unsigned not null,
	leader_id int(22) unsigned null,
	foreign key (galaxy_id) references galaxy(id),
);
create table if not exists ship_reference (
	id int(22) unsigned not null primary key auto_increment,
	name varchar(64) not null,
	image varchar(64) not null,
	attack int(22) not null,
	defense int(22) not null,
	score int(22) not null,
	shield int(11) not null,
	hull int(11) not null,
	power int(11) not null,
	travel_time tinyint(3) not null,
	build_time tinyint(3) not null,
	cost_crystal int(11) not null,
	cost_credits int(11) not null,
	cost_dilithium int(11) not null
);
create table if not exists ship  (
	id int(22) unsigned not null primary key auto_increment,
	user_id int(11) not null,
	ref_id int(22) not null,
	hull int(11) not null,
	shield int(11) not null,
	power int(11) not null,
	travel int(11) null,
	building tinyint(3) null,
	foreign key (ref_id) references ship_reference(id),
	foreign key (user_id) references users(id)
);
create table if not exists resources_reference (
	id tinyint(3) not null primary key auto_increment,
	name varchar(64) not null
	);
create table if not exists resources (
	id int(22) unsigned not null primary key auto_increment,
	user_id int(11) not null,
	res_id tinyint(3) not null,
	quantity int(11) not null default '5',
	miners int(11) not null default '1',
	foreign key (user_id) references users(id),
	foreign key (res_id) references resources_reference(id)
	);

create table if not exists buildings_reference (
	id tinyint(3) not null primary key auto_increment,
	name varchar(22) not null,
	description varchar(256) not null
	);
create table if not exists buildings (
	id int(22) unsigned not null primary key auto_increment,
	user_id int(11) not null,
	building_id tinyint(3) not null,
	quantity int(11) not null,
	building tinyint(3) null,
	quantity_building int(11) null,
	foreign key (user_id) references users(id),
	foreign key (building_id) references buildings_reference(id)
	);

insert into galaxy (id) values (1), (2);
insert into sector (sector, galaxy_id) values (1, 1), (2, 1), (3, 1), (4, 1), (1, 2), (2, 2), (3, 2), (4,2);
insert into race (name, description) values 
	('Terran', 'They are more commonly known as humans. These barbaric creatures are out for blood, and receive a tremendous 15% attack bonus. They are over aggressive, and are not good at managing their economy. They lose 15% time while mining crystals, and dilithium.'), 
	('Thirgian', 'A primative race, but what they lack in technology they make up for in mining skill. This race receives a 15% boost to their mining, but they lose 15% resarch.'), 
	('Abjuko', 'The Abjuko are an incredibly intelligent, peaceful civilization. Nearly the entire population aspires to become a great scientist. They research technology 25% faster than Terrans, but they lose 25% when they decide to attack.');
insert into ship_reference 
	(name, image, attack, defense, score, shield, hull, power, travel_time, build_time, cost_crystal, cost_credits, cost_dilithium) 
	values 
	('Zalo', 'img/zalo.png', '5', '1', '10', '20','20','25','4','4','10','100','3'), 
	('Intercepter', 'img/intercepter.png', '7', '5', '25', '30','30','50','6','8','13','200','13'), 
	('Fighter', 'img/fighter.png', '12', '1', '25', '20', '20', '40', '4', '10', '25', '200', '2'),
	('Wraith', 'img/wraith.png', '15', '10', '50', '50','50','100','8','14','30','300','13'),
	('Corsair', 'img/corsair.png', '20', '18', '100', '100', '100', '200', '12', '18', '40', '500', '30'),
	('Battlecruiser', 'img/battlecruiser.png', '35', '35', '200', '200', '200', '400', '16', '24', '60', '750', '60');
insert into resources_reference
	(id, name)
	values
	(1, 'Crystals'),
	(2, 'Dilithium'),
	(3, 'Credits');

insert into buildings_reference
	(name, description)
	values
	('Residence Quarters', 'Increases the amount of recruits available.'),
	('Crystal Mines', 'Increases the crystal production allowing more recruits to mine crystals'),
	('Dilithium Mines', 'Increases the dilithium production allowing more recruits to mine dilithium'),
	('Trading Post', 'Increases credit production by increasing the efficency from trade'),
	('Courthouse', 'Increases credit production by increasing the tax gathering efficency'),
	('Surface to Air Lasers', 'The construction of SAL increases your overall defense.');

