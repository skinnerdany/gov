CREATE TABLE mfc
(
	passport	integer		NOT NULL PRIMARY KEY,
	name		varchar(1024)	NOT NULL DEFAULT '',
	second_name	varchar(1024)	NOT NULL DEFAULT '',
	birth_date	varchar(20)	NOT NULL DEFAULT '',
	sex		smallint	NOT NULL DEFAULT 0,
	social_card	integer		NOT NULL DEFAULT 0,
	email		varchar(1024)	NOT NULL DEFAULT '',
	phone		varchar(10)	NOT NULL DEFAULT ''
);

CREATE TABLE tax
(
	id			serial		NOT NULL PRIMARY KEY,
	organization_name	varchar(1024)	NOT NULL DEFAULT '',
	inn			integer		NOT NULL DEFAULT 0,
	okved_id		integer		NOT NULL DEFAULT 0
);
CREATE TABLE okved
(
	id			serial		NOT NULL PRIMARY KEY,
	name			varchar(1024)	NOT NULL DEFAULT '',
	always			smallint	NOT NULL DEFAULT 0
);

CREATE TABLE people_tax
(
	passport	integer		NOT NULL DEFAULT 0,
	tax_id		integer		NOT NULL DEFAULT 0
);

CREATE TABLE gibdd
(
	nunmber		varchar(9)	NOT NULL DEFAULT '',
	passport	integer		NOT NULL DEFAULT 0
);

CREATE TABLE social_transport
(
	troika		integer		NOT NULL DEFAULT 0,
	social_card	integer		NOT NULL DEFAULT 0,
	passport	integer		NOT NULL DEFAULT 0,
	lock		smallint 	NOT NULL DEFAULT 0,
	unlock_expire	integer		NOT NULL DEFAULT 0
);

CREATE TABLE pass
(
	pass_id			varchar(32)	NOT NULL DEFAULT '',
	passport		integer		NOT NULL DEFAULT 0,
	expire_date		integer		NOT NULL DEFAULT 0,
	create_date		integer		NOT NULL DEFAULT 0,

	name			varchar(1024)	NOT NULL DEFAULT '',
	second_name		varchar(1024)	NOT NULL DEFAULT '',
	email			varchar(1024)	NOT NULL DEFAULT '',
	phone			varchar(10)	NOT NULL DEFAULT '',

	tax_id			integer		NOT NULL DEFAULT 0,
	inn			integer		NOT NULL DEFAULT 0,
	organization_name	varchar(1024)	NOT NULL DEFAULT '',

	car_number		varchar(9)	NOT NULL DEFAULT '',
	social_card		integer		NOT NULL DEFAULT 0,
	troika			integer		NOT NULL DEFAULT 0
);
