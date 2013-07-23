USE test;
SET SQL_MODE := 'TRADITIONAL';
SET SQL_MODE := '';
SELECT @@SQL_MODE;


CREATE TABLE integer1(
n SMALLINT unsigned);

DROP TABLE integer1;

INSERT INTO integer1
VALUES (
5
);

SELECT * FROm integer1;

INSERT INTO integer1
VALUES (
70000
);

CREATE table floaty
(n FLOAT);

INSERT INTO floaty
VALUES (
.99
);

SELECT * FROM floaty
WHERE n = .99;

SELECT * FROM floaty
WHERE n between .99-.00001 AND .99+.00001;

CREATE TABLE fixi (
n decimal(3,1)
);

INSERT INTO fixi
VALUES (42.1);

SELECT *FROM fixi;

INSERT INTO fixi
VALUES (142.1);

CREATE TABLE bitss (
b BIT(10)
);

INSERT INTO bitss
VALUES (b'101');

SELECT b FROM bitss;

CREATE TABLE chara(
c VARCHAR (5)
);

INSERT INTO chara
VALUES('abs4545');

SELECT * FROM chara;

CREATE TABLE sets (
name VARCHAR(60),
colores SET('red', 'blue', 'green')
);

INSERT INTO sets
VALUES('eimer', 'red,blue');

SELECT * FROM sets;

INSERT INTO sets
VALUES('eimer', 'orange');

CREATE TABLE birthdays(
name VARCHAR(60),
bdate DATE
);

INSERT INTO birthdays
VALUES('icke', '1971-07-13');

SELECT * FROM birthdays;

CREATE TABLE students(
name VARCHAR(60),
modetime timestamp
);

INSERT INTO students 
(name)
VALUES ('anna');

SELECT * FROM students;