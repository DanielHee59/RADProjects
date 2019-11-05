### delete database if exists ###
DROP DATABASE IF EXISTS movies;

### create a fresh database ###
CREATE DATABASE movies;

### select the database just created ###
USE movies;

### create a table in movies database###
CREATE TABLE movie_list(
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
	PRIMARY KEY(ID)
    );
	

	
