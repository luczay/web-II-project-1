CREATE DATABASE IF NOT EXISTS `hatoslotto`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE  `hatoslotto`;

CREATE TABLE IF NOT EXISTS `huzas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ev` int(4) NOT NULL,
  `het` int(2) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `huzott` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `huzasid` int(10) NOT NULL,
  `szam` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`huzasid`) REFERENCES huzas(id)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `nyeremeny` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `huzasid` int(10) NOT NULL,
  `talalat` int NOT NULL,
  `darab` int NOT NULL,
  `ertek` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES huzas(id)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

LOAD DATA INFILE 'C:/xampp/htdocs/hatoslotto/make_db/huzas.txt' INTO TABLE huzas IGNORE 1 LINES;
LOAD DATA INFILE 'C:/xampp/htdocs/hatoslotto/make_db/huzott.txt' INTO TABLE huzott IGNORE 1 LINES;
LOAD DATA INFILE 'C:/xampp/htdocs/hatoslotto/make_db/nyeremeny.txt' INTO TABLE nyeremeny IGNORE 1 LINES;