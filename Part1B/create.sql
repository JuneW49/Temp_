/*this file loads all tables needed in the CS143 database*/

/*load from file*/
CREATE TABLE Movie(id int, title varchar(100), year int, rating varchar(10), company varchar(50));
CREATE TABLE Actor(id int, last varchar(20), first varchar(20), sex varchar(6), dob date, dod date);
CREATE TABLE Director(id int, last varchar(20), first char(20), dob date, dod date);
CREATE TABLE MovieGenre(mid int, genre varchar(20));/*movie id and genre*/
CREATE TABLE MovieDirector(mid int, did int);/*movie id and director id*/
CREATE TABLE MovieActor(mid int, aid int, role varchar(50));

CREATE TABLE Review(name varchar(20), time timestamp, mid int, rating int, comment varchar(500));/*awaits user input*/

/*keep track in case of new entries*/
CREATE TABLE MaxPersonID(id int);
INSERT INTO MaxPersonID VALUES(69000);
CREATE TABLE MaxMovieID(id int);
INSERT INTO MaxMovieID VALUES(4750);

LOAD DATA LOCAL INFILE '~/data/movie.del' INTO TABLE Movie FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/actor1.del' INTO TABLE Actor FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/actor2.del' INTO TABLE Actor FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/actor3.del' INTO TABLE Actor FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/director.del' INTO TABLE Director FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/movieactor1.del' INTO TABLE MovieActor FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/movieactor2.del' INTO TABLE MovieActor FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/moviedirector.del' INTO TABLE MovieDirector FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
LOAD DATA LOCAL INFILE '~/data/moviegenre.del' INTO TABLE MovieGenre FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';
