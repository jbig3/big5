use test;
DROP TABLE 
	bits;
SHOW CREATE TABLE
	bits;
CREATE TABLE 
	bits(
		id INT AUTO_INCREMENT,
		name CHAR(50) NOT NULL DEFAULT '',
		n INT(10) NOT NULL DEFAULT 0,
		PRIMARY KEY (id)
)
ENGINE = INNODB
;

ALTER TABLE 
	bits
ADD COLUMN
	name CHAR(100) NOT NULL DEFAULT '';

ALTER TABLE
	bits
MODIFY
	n INT(11);

INSERT INTO
	bits
VALUES
	(1, 'eins'),
	(2, 'zwei')
;

INSERT INTO
	bits
SET
	n = 3,
	name = 'drei'
;

SELECT 
	*
FROM
	bits;

INSERT INTO
	bits(
		n, 
		name
	)
SELECT
	id,
	name
FROM
	citychild
LIMIT 20
;

INSERT INTO
	bits(
		n,
		name
	)
VALUES
	(25, 'fünft')
;

SELECT LAST_INSERT_ID();

CREATE TABLE 
	numbers(
		n SMALLINT UNSIGNED
);

INSERT INTO 
	numbers
VALUES
	(5)
;

SELECT 
	*
FROM
	numbers;

CREATE TABLE
	birthdays(
		name VARCHAR(60),
		bdate DATE
);

INSERT INTO
	birthdays
VALUES
	('joi', '1950-12-01'),
	('anna', '1970-07-13')
;

SELECT 
	*
FROM
	birthdays;

use world2;
INSERT INTO
	country(
		code, 
		name
	)
VALUES
	('SWE', 'Mysql')
;

#########################################
##TIMESTAMP
#########################################

use test;
show tables;

CREATE TABLE students(
	name VARCHAR(60),
	modtime TIMESTAMP
);

INSERT INTO
	students
	(name)
VALUES
	('peter'),
	('anton')
;

SELECT 
	*
FROM
	students
ORDER BY 
	name
;

SET SQL_MODE := '';

DELETE FROM
	students
WHERE
	name like 'anton'
;

DELETE FROM
	students
WHERE 
	name like 'peter'
ORDER BY 
	name
LIMIT 4
;

use world2;
CREATE TABLE 
	city2
LIKE
	city
;

INSERT INTO
	city2
SELECT 
	*
FROM
	city
;

DELETE FROM
	city2
WHERE
	id = 3803
;

SELECT 
	*
FROM
	city2
WHERE 
	id = 3803
;

DELETE FROM
	city2
WHERE
	countryCode = 'SWE'
;

SELECT 
	Population
FROM
	city
ORDER BY
	population desc 
LIMIT 3;

DELETE FROM
	city2
ORDER BY 
	population DESC
LIMIT 1
;

use world2;

UPDATE
	city
SET
	population = population * 1.1
;

use test;
CREATE TABLE 
	people(
		id INT AUTO_INCREMENT,
		name VARCHAR(100),
		age INT(3),
		PRIMARY KEY (id)
)
ENGINE = INNODB
;

INSERT INTO
	people
		(name, age)
VALUES
	('Ana', 20),
	('berta', 30),
	('cäsa', 40),
	('emil', 45)
;
SELECT 
	*
FROM
	people
;

UPDATE 
	people
SET
	id = id-1
ORDER BY
	id
;

UPDATE
	people
SET
	name = 'victoria'
WHERE
	id = 1
;

UPDATE
	people
SET
	name = 'ANA'
WHERE
	name = 'ana'
;

UPDATE
	students
SET
	name = 'ANTON2'
WHERE
	name = 'anton'
;
use world2;
UPDATE
	city2
SET
	population = population * 1.02,
	district = 'Ocean'
WHERE 
	name = 'San Jose'
;

SELECT 
	*
FROM
	city2
WHERE 
	name = 'san jose'
;

SET SQL_SAFE_UPDATES=0;

SHOW CREATE TABLE
	city2;
use test;
REPLACE INTO
	people
	(id, name, age)
VALUES
	('12', 'Bertasssss', 30);
SELECT 
	*
FROM
	people;

use world2;
REPLACE INTO
	country
	(code, name)
VALUES
	('FOO', 'euro')
;
SELECT 
	*
FROM
	country
WHERE 
	code = 'Foo'
;

use test;
CREATE TABLE 
	current_users(
		userid INT UNSIGNED,
		username VARCHAR(100),
		login_time TIMESTAMP,
		vistits INT UNSIGNED DEFAULT 1,
		PRIMARY KEY (userid)
)
ENGINE = INNODB
;

INSERT INTO
	current_users
	(userid, username)
VALUES
	(100, 'Berta')
;

SELECT 
	*
FROM
	current_users
;

REPLACE INTO
	current_users
	(userid, username)
VALUES
	(100, 'Berta')
;

INSERT INTO
	current_users
	(userid, username)
VALUES
	(100, 'immanoch')
ON DUPLICATE KEY UPDATE
	vistits = vistits + 1,
	username = 'Bertaneu'
;

TRUNCATE TABLE
	current_users
;

use world2;

SHOW CREATE TABLE
	city2;

TRUNCATE TABLE
	city2;

INSERT INTO
	city2
SELECT
	*
FROM
	city
LIMIT 1;

###########################################
## Aufgaben 11-22
###########################################

-- 1:
CREATE DATABASE
	world_copy;


-- 2:
# city
# country
# countrylanguage
use world_copy;

CREATE TABLE
	city
LIKE
	world2.city;
	
CREATE TABLE
	country
LIKE
	world2.country;

CREATE TABLE
	countryLanguage
LIKE
	world2.countryLanguage;

INSERT INTO
	city
SELECT
	*
FROM
	world2.city;

INSERT INTO
	country
SELECT
	*
FROM
	world2.country;

INSERT INTO
	countrylanguage
SELECT
	*
FROM
	world2.countryLanguage;


-- 3:
INSERT INTO
	city
	(name, countryCode, population, district)
VALUES
	('sarah City', 'USA', 1, 'California');


-- 4:
SELECT 
	*
FROM
	city
WHERE
	name = 'sarah City';

# Alternativ:
SELECT LAST_INSERT_ID();

-- 5:
REPLACE INTO
	city
	(name, countrycode, population, district)
VALUES
	('Steve City', 'USA', 1, 'California');


-- 6:
SET SQL_MODE := '';
SELECT @@SQL_MODE;

-- 7:
CREATE TABLE tini(
	tini TINYINT
);

-- 8:

INSERT INTO
	tini
VALUES
	('test'),
	(500);

-- 9:
SET SQL_MODE := 'TRADITIONAL';

-- 10:

SELECT 
	*
FROM
	tini;

INSERT INTO
	tini
VALUES
	('test'),
	(500);

-- 11:
REPLACE INTO
	country
	(code, name, continent)
VALUES
	('ESS', 'Espania', 'Europe');

SELECT 
	*
FROM
	country
WHERE
	code = 'ESS';

REPLACE INTO
	country
	(code, GNP, population)
VALUES
	('ESS', 123000, 1000000);


-- 13:
UPDATE 
	country
SET
	population = population *1.1;

-- 14:
CREATE TABLE countries_europe(
	SELECT
		*
	FROM
		country
	WHERE
		continent = 'Europe'
);

SELECT
	*
FROM
	countries_europe;

DELETE FROM
	country
WHERE
	code = 'ESS';