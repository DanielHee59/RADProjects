### delete database if exists ###
DROP DATABASE IF EXISTS movies;

### create a fresh database ###
CREATE DATABASE movies;

### select the database just created ###
USE movies;

### create a table in movies database###
CREATE TABLE movies_table(
    id INTEGER (5) NOT NULL,
    title VARCHAR(15),
    studio VARCHAR(20),
    status VARCHAR(15),
	sound VARCHAR(5),
	versions VARCHAR(30),
	price DECIMAL(6,2),
	rating VARCHAR(10),
	year INTEGER(4),
	genre VARCHAR(20),
	aspect VARCHAR(10),
	numofsearch INTEGER(2),
	PRIMARY KEY(ID)
    );

### create a table in membership database###
CREATE TABLE memberships_table(
	id INTEGER (5) NOT NULL AUTO_INCREMENT ,
	name VARCHAR(15),
	email VARCHAR(25),
	options VARCHAR (30),
	PRIMARY KEY(ID)
);

	

	
