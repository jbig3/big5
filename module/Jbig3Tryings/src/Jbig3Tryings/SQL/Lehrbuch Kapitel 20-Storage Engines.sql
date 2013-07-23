SHOW ENGINES;

SHOW CREATE TABLE city;

CREATE TABLE `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(35) NOT NULL DEFAULT '',
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `District` char(20) NOT NULL DEFAULT '',
  `Population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `CountryCode` (`CountryCode`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

SHOW TABLE STATUS 
	like 'city';

SELECT
	table_name,
	engine
FROM
	information_schema.tables
WHERE
	table_name = 'city'
	AND
	table_schema = 'world';

SHOW CREATE TABLE countrylanguage;

SHOW TABLE STATUS like 'city';

SELECT
	table_name,
	engine
FROM
	information_schema.tables
WHERE
	table_name = 'country' AND
	table_schema = 'world';

SHOW ENGINES;

SHOW CREATE TABLE city;

ALTER TABLE city
engine = MyIsam;