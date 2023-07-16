CREATE SCHEMA dbo;
CREATE TABLE supermarket.dbo.taxe (
	id int IDENTITY(1,1) NOT NULL,
	taxe varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	description varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	value decimal(5,2) NOT NULL,
	status varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	CONSTRAINT PK_productTx PRIMARY KEY (id)
);

CREATE TABLE supermarket.dbo.users (
	id int IDENTITY(1,1) NOT NULL,
	name varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	username varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	password varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	profile varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	CONSTRAINT PK_users PRIMARY KEY (id),
	CONSTRAINT UK_TransactionID UNIQUE (username)
);

CREATE TABLE supermarket.dbo.productType (
	id int IDENTITY(1,1) NOT NULL,
	name varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	description varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	sector varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	id_tx int NULL,
	CONSTRAINT PK_productTp PRIMARY KEY (id),
	CONSTRAINT productType_FK FOREIGN KEY (id_tx) REFERENCES supermarket.dbo.taxe(id)
);


CREATE TABLE supermarket.dbo.product (
	id int IDENTITY(1,1) NOT NULL,
	name varchar(80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	description varchar(150) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	quantity int NOT NULL,
	id_pt int NULL,
	value decimal(5,2) NULL,
	CONSTRAINT PK_product PRIMARY KEY (id),
	CONSTRAINT product_FK FOREIGN KEY (id_pt) REFERENCES supermarket.dbo.productType(id)
);

