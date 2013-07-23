SHOW CREATE TABLE countryLanguage;

CREATE TABLE `countrylanguage` (
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `Language` char(30) NOT NULL DEFAULT '',
  `IsOfficial` enum('T','F') NOT NULL DEFAULT 'F',
  `Percentage` float(4,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`CountryCode`,`Language`),
  KEY `CountryCode` (`CountryCode`),
  CONSTRAINT `countryLanguage_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

use test;

CREATE TABLE fooo2(
	col1 INT(6),
	col2 VARCHAR(50),
	INDEX (col1, col2)
);

SHOW CREATE TABLE fooo2;

CREATE TABLE `fooo2` (
  `col1` int(6) DEFAULT NULL,
  `col2` varchar(50) DEFAULT NULL,
  KEY `col1` (`col1`,`col2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


ALTER TABLE fooo2
ADD PRIMARY KEY (col1);

CREATE TABLE `fooo2` (
  `col1` int(6) NOT NULL DEFAULT '0',
  `col2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`col1`),
  KEY `col1` (`col1`,`col2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


ALTER TABLE fooo2
DROP KEY col1;

CREATE TABLE `fooo2` (
  `col1` int(6) NOT NULL DEFAULT '0',
  `col2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`col1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE fooo2
DROP PRIMARY KEY;

CREATE TABLE `fooo2` (
  `col1` int(6) NOT NULL DEFAULT '0',
  `col2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

use test;

DROP TABLE fooo2;
ALTER TABLE fooo2
ADD FULLTEXT KEY (col2);

SELECT 
	title
FROM 
	books
WHERE
	MATCH(title)
	AGAINST('prince');

SELECT 
	title
FROM 
	books
WHERE
	MATCH(title)
	AGAINST('green +Annne' IN BOOLEAN MODE);


DROP INDEX `PRIMARY` ON fooo2;

CREATE TABLE t(
	name CHAR(255),
	KEY (name(15))
);

SHOW CREATE TABLE t;

use world;

SHOW INDEX
FROM countrylanguage;

###################################
## EXPLAIN
###################################
use world;
SHOW CREATE TABLE country;
CREATE TABLE `country` (
  `Code` char(3) NOT NULL DEFAULT '',
  `Name` char(52) NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia',
  `Region` char(26) NOT NULL DEFAULT '',
  `SurfaceArea` float(10,2) NOT NULL DEFAULT '0.00',
  `IndepYear` smallint(6) DEFAULT NULL,
  `Population` int(11) NOT NULL DEFAULT '0',
  `LifeExpectancy` float(3,1) DEFAULT NULL,
  `GNP` float(10,2) DEFAULT NULL,
  `GNPOld` float(10,2) DEFAULT NULL,
  `LocalName` char(45) NOT NULL DEFAULT '',
  `GovernmentForm` char(45) NOT NULL DEFAULT '',
  `HeadOfState` char(60) DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

EXPLAIN SELECT
	*
FROM
	country
WHERE 
	code like 'n%';
	
EXPLAIN SELECT
	*
FROM
	city
WHERE
	district = 'california';

ALTER TABLE CITY
ADD KEY district(district);

EXPLAIN SELECT
	*
FROM
	city
WHERE
	id=2147;

CREATE TABLE continentGNP
	SELECT
		continent,
		AVG(GNP) AS AVG_GNP
	FROM
		country
	GROUP BY
		continent;

SELECT
	*
FROM
	continentGNP;

SELECT
	country.continent,
	country.name,
	country.gnp AS countryGNP,
	continentGNP.AVG_GNP AS contAVG_GNP
FROM
	country
		JOIN
	continentGNP
		ON
	country.continent = continentGNP.continent
WHERE
	country.GNP > continentGNP.AVG_GNP * 10
ORDER BY
	country.continent,
	country.name;