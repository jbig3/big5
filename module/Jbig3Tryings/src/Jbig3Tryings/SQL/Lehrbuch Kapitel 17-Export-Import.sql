SELECT
	*
INTO OUTFILE
	'city.txt'
FROM
	city;


SELECT
	*
INTO OUTFILE
	'city.csv'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r'
FROM
	city;

SELECT
	*
INTO OUTFILE
	'countlang.txt'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r'
FROM
	countryLanguage;


LOAD DATA INFILE
	'countlang.txt'
INTO TABLE 
	countrylanguage;

LOAD DATA INFILE
	'city.txt'
INTO TABLE
	city;

TRUNCATE city;
SELECT 
	*
FROM
	city;

LOAD DATA INFILE
	'city.csv'
INTO TABLE
	city
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r'
IGNORE 1 LINES;

SHOW CREATE TABLE countryLanguage;

CREATE TABLE `countrylanguage2` (
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `Language` char(30) NOT NULL DEFAULT '',
  `IsOfficial` enum('T','F') NOT NULL DEFAULT 'F',
  `Percentage` float(4,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`CountryCode`,`Language`),
  KEY `CountryCode` (`CountryCode`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SHOW TABLES;

LOAD DATA INFILE
	'countlang.txt'
INTO TABLE
	countrylanguage2
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r';

SELECT
	*
FROM
	countrylanguage2;


#################################################
## muss uaf der Konsole auf C: ausgeführt werden
#################################################

-- Export:
-- shell> mysqldump world > world.txt

-- Import (komplettes Script aus Dump, Database muss vorhanden sein)
-- shell> mysql DbName < world.txt


