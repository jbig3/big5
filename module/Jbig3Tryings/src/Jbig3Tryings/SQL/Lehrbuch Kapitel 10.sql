CREATE TABLE eimer (
	id		INT(11) PRIMARY KEY AUTO_INCREMENT,
	spalte1 VARCHAR(255) NOT NULL DEFAULT '',
	spalte2	INT(10) NOT NULL DEFAULT 0,
	spalte3 VARCHAR(100) NOT NULL,
	spalte4	ENUM('ja', 'nein') NOT NULL DEFAULT 'nein',
	spalte5	FLOAT(3,1) NOT NULL
)
ENGINE = InnoDb
CHARSET = utf8
COLLATE = utf8_general_ci
COMMENT = 'ein Tabellenkommentar';

DROP Table eimer;

SHOW Tables;

SHOW CREATE TABLE city;

use test;

CREATE TABLE versuch1 (
	`name` CHAR(10) NOT NULL
)
ENGINE = InnoDb
CHARSET = latin1
COLLATE = latin1_general_ci;

SHOW COLLATION
WHERE CHARSET LIKE 'latin1';

SHOW CREATE TABLE versuch1;

CREATE TABLE autotest (
	id 	INT(11) NOT NULL AUTO_INCREMENT, 
	namess	VARCHAR(50) NOT NULL DEFAULT '',
	PRIMARY KEY (id)
)
ENGINE = InnoDb
COMMENT = ''
CHARSET = latin1
COLLATE = latin1_general_ci;

INSERT INTO autotest
	(namess)
VALUES
	('eins'),	
	('zwei'),
	('drei'),
	('vier')
;

SELECT * 
FROM
	test2;

CREATE TABLE test2
AS
SELECT *
FROM
	autotest;

use world2;
	
CREATE TABLE 
	city2
AS
SELECT 
	*
FROM
	city
WHERE
	Population > 5000000;

SELECT 
	*
FROM
	city2;

DROP TABLE city2;

CREATE TABLE
	city2
AS
SELECT
	*
FROM
	city
LIMIT 0;

CREATE TABLE
	city2
LIKE
	city;

SELECT 
	COUNT(*)
FROM
	city2;
use world2;
CREATE TEMPORARY TABLE
	city2
AS
SELECT 
	name
FROM
	city
WHERE
	District = 'texas';

SELECT
	*
FROM
	city2;

ALTER TABLE 
	city2
ADD COLUMN
	localname VARCHAR(100) CHARSET utf8 NOT NULL DEFAULT '' COMMENT 'Spaltenkommentar'
;

ALTER TABLE
	city2
DROP COLUMN
	localname
;

ALTER TABLE
	city2
MODIFY
	name VARCHAR(3)
;

DROP TABLE 
	city2
;

use test;
SET SQL_MODE := '';

SELECT @@SQL_MODE;

CREATE TABLE
	FOO (
		bar text
	)
	ENGINE = MyISAM
;

DESC FOO;

ALTER TABLE
	FOO
ADD COLUMN
	ID TINYINT NOT NULL
;

INSERT INTO 
	FOO
	(ID, bar)
VALUES
	(1, 'eins'),
	(2, 'zwei')
;

SELECT 
	*
FROM
	FOO
;

DESC FOO;

ALTER TABLE 
	FOO
MODIFY
	bar CHAR(2) NOT NULL
;

SHOW WARNINGS;

ALTER TABLE 
	FOO
CHANGE
	bar bars CHAR(20) NOT NULL
;

DESC FOO;

ALTER TABLE 
	FOO
RENAME TO
	FOOS
;

RENAME TABLE
	FOOS
TO
	FOO
;

DESC FOOS;

ALTER TABLE
	FOO
CHANGE 
	bars bars CHAR(20) NULL
;

ALTER TABLE
	FOO
MODIFY
	ID TINYINT(4) DEFAULT 0
;

RENAME TABLE 
	FOO
TO
	FOOS
;

DROP TABLE IF EXISTS
	city2
;

DESC city2;

USE test;
SHOW TABLES;

DROP TABLE IF EXISTS
	test2;

CREATE TABLE fkpk(
	id INT(11) 			NOT NULL AUTO_INCREMENT,
	nummer INT(10) 		NOT NULL DEFAULT 0,
	vorname CHAR(100) 	NOT NULL DEFAULT '',
	PRIMARY KEY (id),
	FOREIGN KEY (nummer) REFERENCES autotest(id)
)
ENGINE = InnoDB
;

SHOW CREATE TABLE
	autotest;

SHOW CREATE TABLE 
	fkpk;

SHOW ENGINE InnoDB STATUS;

CREATE TABLE 
	countryParent (
		code CHAR(3) NOT NULL,
		name CHAR(52) NOT NULL,
		PRIMARY KEY (code)
)
ENGINE = INNODB
;

CREATE TABLE
	cityChild(
		ID INT NOT NULL AUTO_INCREMENT,
		name CHAR(35) NOT NULL,
		countryCode CHAR(3) NOT NULL,
		PRIMARY KEY (ID),
		FOREIGN KEY (countryCode)
			REFERENCES CountryParent (code)
			ON UPDATE CASCADE
			ON DELETE CASCADE
)
ENGINE = INNODB
;

SHOW CREATE TABLE
	countryParent;

INSERT INTO
	countryParent
SELECT
	code, name
FROM
world2.country
WHERE 
	Region like 'nordic%'
;


INSERT INTO
	cityChild
SELECT 
	id, name, countryCode
FROM
	world2.city
WHERE
	CountryCode IN (
		SELECT
			code
		FROM
			world2.country
		WHERE 
			Region like 'Nordic%'
)
;

SELECT 	
	*
FROM 
	countryParent;

SELECT
	*
FROM
	cityChild;

DELETE FROM
	countryParent
WHERE
	Code = 'FIN';

INSERT INTO
	citychild
		(name, countrycode)
	VALUES
		('Atlantis', 'ATL')
;

################################################
## Aufgaben 10-40
################################################

-- 1:
use test;


-- 2:
DROP TABLE students;

CREATE TABLE students(
	id	SMALLINT UNSIGNED AUTO_INCREMENT,
	name VARCHAR (100),
	PRIMARY KEY (id)
)
ENGINE = INNODB
;

CREATE TABLE enrollments (
	studentid SMALLINT UNSIGNED,
	name VARCHAR(100) DEFAULT NULL
)
ENGINE = INNODB
;

SHOW CREATE TABLE students;
SHOW CREATE TABLE enrollments;


-- 3:
ALTER TABLE 
	enrollments
ENGINE = INNODB;

ALTER TABLE
	students
ENGINE = INNODB;


-- 4:
ALTER TABLE 
	enrollments
ADD FOREIGN KEY (studentid)
	REFERENCES students (id)
;

SHOW CREATE TABLE
	enrollments;


-- 5:
ALTER TABLE
	enrollments
MODIFY
	name CHAR(50) NOT NULL DEFAULT 'New Student'
;

SHOW CREATE TABLE
	enrollments;


-- 6:
RENAME TABLE
	enrollments
TO
	t2
;


-- 7:
DROP TABLE IF EXISTS
	enrollments;

SHOW WARNINGS;


-- 8:
DROP TABLE IF EXISTS
	t2,
	students
;

SHOW CREATE TABLE 
	t2
;
SHOW CREATE TABLE
	students
;


-- 9
use world2;
CREATE TABLE 
	europe (
		SELECT
			name,
			population
		FROM
			country
		WHERE
			continent = 'Europe'
)
;
CREATE TABLE 
	europe_2 as
		SELECT
			name,
			population
		FROM
			country
		WHERE
			continent = 'Europe'
;
select * from europe_2;

CREATE TABLE 
	asia (
		SELECT
			name,
			population
		FROM
			country
		WHERE
			continent = 'asia'
)
;

-- a:
SELECT
	*
FROM
	europe
UNION
SELECT
	*
FROM
	asia
;


-- b:
SELECT
	name,
	population,
	concat(name,cast(population as char(20))) as sort1
FROM
	europe
WHERE 
	population < 500000
UNION
SELECT
	name,
	population,
	concat(cast(population as char(20)),name) as sort1
FROM
	asia
WHERE 
	population > 10000000
ORDER BY sort1
;

