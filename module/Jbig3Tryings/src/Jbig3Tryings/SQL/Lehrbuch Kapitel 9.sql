CREATE TABLE
	einszwei(
		`birne` INT(1),
		`baby` 	VARCHAR(100)
);

SELECT 
-- 	1 AS INTEGER Fehlerhaft
	1 AS `INTEGER`,	
	1 AS 'INTEGER',
	1 AS "INTEGER";

CREATE DATABASE mydbneu;

CREATE DATABASE IF NOT EXISTS mydbneu;

CREATE DATABASE IF NOT EXISTS mydbneu12
	CHARACTER SET utf8
	COLLATE utf8_danish_ci;

SHOW DATABASES;

SHOW FULL
	COLUMNS
FROM city;

SHOW
	CREATE DATABASE world2;

CREATE DATABASE db_test;

SHOW DATABASES;

USE db_test;

SHOW 
	CREATE DATABASE 
	world2;

ALTER DATABASE
	db_test
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

SHOW CHARACTER SET;
SHOW COLLATION;

ALTER TABLE 
	db_test
CHARACTER SET utf8
COLLATE utf8_general_ci;

SHOW 
	CREATE DATABASE
	db_test;

DROP DATABASE
	IF EXISTS
	db_test;

SHOW DATABASES;
DROP DATABASE
	mydbneu12;