#
#  dbtables.sql
#
#  Simplifies the task of creating all the database tables
#  used by the login system.
#
#  Can be run from command prompt by typing:
#
#  mysql -u yourusername -D yourdatabasename < dbtables.sql
#
#  That's with dbtables.sql in the mysql bin directory, but
#  you can just include the path to dbtables.sql and that's
#  fine too.
#
#

#
#  Table structure for users table
#
#  *sessid in this table 
DROP TABLE IF EXISTS users;

CREATE TABLE users (
 userid bigint primary key auto_increment not null, 
 username varchar(30),
 password varchar(32),
 sessid varchar(32),
 userlevel tinyint(1) unsigned not null,
 email varchar(50),
 timestamp int(11) unsigned not null,
 approved boolean not null default true
);

#
#  Table structure for profile table
#
DROP TABLE IF EXISTS profiles;

CREATE TABLE profiles (
  userid bigint primary key not null,
  firstname varchar(32),
  lastname varchar(32),
  workname varchar(50),
  workschool varchar(15),
  workcity varchar(32),
  workstate varchar(2)
);

#
#  Table structure for Profession table
#
# *job is a semicolon separated list of professions
DROP TABLE IF EXISTS profession;

CREATE TABLE profession (
  userid bigint primary key not null,
  job varchar(200)
);

#
#  Table structure for feedback table
#
DROP TABLE IF EXISTS feedback;

CREATE TABLE feedback (
  feedbackid bigint primary key auto_increment not null,
  userid bigint not null,
  submittime timestamp default current_timestamp,
  videoused text,
  dateused text,
  goal text,
  location text,
  audience text,
  timeviewed text,
  sesslength text,
  videorole text,
  helpful text,
  usedjournal boolean,
  journaluseful text,
  continueusingvid text
);

#
#  Table structure for videos table
#
DROP TABLE IF EXISTS videos;

CREATE TABLE videos (
  filename varchar(64) NOT NULL PRIMARY KEY,
  hits int(10) NOT NULL default '1'
);

#
#  Table structure for active users table
#
DROP TABLE IF EXISTS active_users;

CREATE TABLE active_users (
 username varchar(30) primary key,
 timestamp int(11) unsigned not null
);


#
#  Table structure for active guests table
#
DROP TABLE IF EXISTS active_guests;

CREATE TABLE active_guests (
 ip varchar(15) primary key,
 timestamp int(11) unsigned not null
);


#
#  Table structure for banned users table
#
DROP TABLE IF EXISTS banned_users;

CREATE TABLE banned_users (
 username varchar(30) primary key,
 timestamp int(11) unsigned not null
);
