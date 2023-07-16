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

INSERT INTO supermarket.dbo.users (name,username,password,profile) VALUES
	 (N'Thiago Oliveira',N'thiago.r.oliveira',N'VmxkNGExTXdNVVpOV0VaVFlUQmFUMWxYZEVkT1ZsSllXWHBzVVZWVU1Eaz0=',N'System'),
	 (N'Antonio Jose',N'antonio.jose',N'Vm0weGQxSXhiRmhTV0doWFYwZDRWMWxVU205V1JteHlXa2M1VmxKc1dubFdWM1JMVlVaV1ZVMUVhejA9',N'User'),
	 (N'Carlos Augusto',N'c.augusto',N'VjFaa1UyUkhSbGhPUkRBOQ==',N'User'),
	 (N'Thiago Rosa',N'thiago.rosa',N'RWJ0MjFAMjAyMg==',N'User'),
	 (N'Administrador',N'admin',N'YWRtaW4=',N'System'),
	 (N'FrontEndAccessToken',N'frontendtoken',N'YWRtaW4=',N'SystemToken'),
	 (N'Maria Silva',N'msilva',N'bXNpbHZh',N'User'),
	 (N'Thiago Rosa',N'thiago.rosadasdsa',N'YWRtaW5k',N'System'),
	 (N'admin',N'21321321',N'YWRtaW4zMjEzMTIz',N'User'),
	 (N'admin',N'dsadasd',N'YWRtaW5zYWRhc2Rh',N'User');

INSERT INTO supermarket.dbo.taxe (taxe,description,value,status) VALUES
	 (N'USFXC',N'US Federal Income Tax on Corn Products',8.20,N'1'),
	 (N'USFXA',N'US Federal Income Tax on Alcoholic Products',12.50,N'1'),
	 (N'USFBH',N'US Federal Income Tax on Personal hygiene products',9.10,N'1'),
	 (N'TXLAT',N'National Income Tax on Dairy Products',17.80,N'1'),
	 (N'TCLEA',N'National Income Tax on Cleaning Products',20.00,N'1');

INSERT INTO supermarket.dbo.productType (name,description,sector,id_tx) VALUES
	 (N'Chips',N'Small products in small or medium size packages used for snacks',N'Snacks',2),
	 (N'Alcoholic beverages',N'All types of drinks that contain alcohol in their composition',N'Beverage',3),
	 (N'Hygiene and Beauty',N'Personal hygiene products',N'Hygienics',4),
	 (N'Cold and dairy products',N'All types of cold and dairy products',N'Colds',5),
	 (N'Cleaning Supplies',N'All types of cleaning products',N'Cleaning',6);

INSERT INTO supermarket.dbo.product (name,description,quantity,id_pt,value) VALUES
	 (N'Heineken',N'350ml bottle',70,3,7.99),
	 (N'Cheetos',N'250g pack',50,2,4.30),
	 (N'hair cream',N'500ml pack',23,4,10.50),
	 (N'Shampoo',N'250ml pack',5,4,18.99),
	 (N'Conditioner',N'300ml pack',20,4,21.00),
	 (N'Razor blade',N'3x Pack',17,4,21.90),
	 (N'Soap ',N'250g Dove',92,4,10.20),
	 (N'Deodorant',N'Rexona',25,4,4.30),
	 (N'Toilet paper',N'Papaer More 5m',39,4,10.50),
	 (N'Body cream',N'250ml Pantene',12,4,18.99);
INSERT INTO supermarket.dbo.product (name,description,quantity,id_pt,value) VALUES
	 (N'Toothpaste',N'90g Colgate',37,4,21.00),
	 (N'Cheese ',N'500g cheese calie',42,5,21.90),
	 (N'Yogurts ',N'250g Vigor',90,5,7.20),
	 (N'Milk ',N'1L Parmalate',120,5,18.21),
	 (N'Vegetable milks ',N'1L Milkaas',18,5,10.99),
	 (N'Bleach',N'Omo 800ml',23,7,21.82),
	 (N'Detergents',N'Limpol 500ml',42,7,1.44),
	 (N'Dishwasher detergent',N'Minuando 500ml',232,7,2.99),
	 (N'Softener',N'Fofo 1L',50,7,13.00),
	 (N'Liquid soap',N'Lux 250ml',44,7,7.40);
INSERT INTO supermarket.dbo.product (name,description,quantity,id_pt,value) VALUES
	 (N'Flannels',N'Pack with 10',19,7,16.30),
	 (N'Testesds',N'Tedsdasste',222,5,5.00);