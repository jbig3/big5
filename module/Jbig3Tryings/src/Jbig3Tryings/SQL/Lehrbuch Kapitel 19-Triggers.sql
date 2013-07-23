
CREATE TRIGGER city_ad
	AFTER DELETE ON city
FOR EACH ROW
	INSERT INTO 
		deletedCity
		(id, name)
		VALUES
		(old.id, old.name);

SHOW TRIGGERS;

CREATE TABLE
	deleteCity(
		id INT unsigned,
		name VARCHAR(50),
		deletedate TIMESTAMP
);

SELECT
	*
FROM
	city
WHERE
	name = 'Dallas';

DELETE FROM
	city
WHERE
	name = 'Dallas';

SELECT * FROM deletedcity;

DROp TRIGGER city_ad;

CREATE TABLE dotriggers ( column1 INT);
CREATE TABLE audit_triggers (
	old_column INT,
	new_column INT,
	date_completed DATETIME
);

CREATE TRIGGER dotriggers_ai 
	AFTER INSERT ON dotriggers
FOR EACH ROW
INSERT INTO audit_triggers
	(new_column, date_completed)
	VALUES
	(new.column1, NOW());

INSERT INTO 
	dotriggers
VALUES
	(1),
	(2),
	(3),
	(4),
	(5),
	(6);

SELECT *
FROM dotriggers;
SELECT * FROM audit_triggers;

CREATE TRIGGER dotriggers_au
	AFTER UPDATE ON dotriggers
FOR EACH ROW
INSERT INTO audit_triggers
	(old_column, new_column, date_completed)
VALUES
	(old.column1, new.column1, NOW());

UPDATE dotriggers
SET
	column1 = 10
WHERE
	column1 < 3;

DROP TRIGGER IF EXISTS dotriggers_au;

DELETE FROm dotriggers;

SELECT * FROM audit_triggers;

SHOW TABLES;

DELIMITER //
CREATE TRIGGER del_city_ad BEFORE DELETE ON country
FOR EACH ROW
BEGIN
	DELETE FROM City WHERE countryCode = old.code;
	DELETE FROM countrylanguage WHERE countryCode = old.code;
END// 
DELIMITER ;

DROP TRIGGER del_city_ad;
DELETE FROM country WHERE code = 'phl';

SELECT
	COUNT(*)
FROM
	city
WHERE
	countrycode = 'PHL';

SELECT
	COUNT(*)
FROM
	countrylanguage
WHERE
	countrycode = 'PHL';


DELIMITER //
CREATE TRIGGER up_city_bu BEFORE UPDATE ON country
FOR EACH ROW
BEGIN
	-- FOREIGN_KEY_CHECKS=0;
	UPDATE City SET countryCode = new.code WHERE countryCode = old.code;
	UPDATE countrylanguage SET countryCode = new.code WHERE countryCode = old.code;
END// 
DELIMITER ;

UPDATE Country 
	SET 
	Code = 'BBB' 
WHERE Code = 'nld';

SELECT
	*
FROM
	CITY
WHERE
	countrycode = 'nld';