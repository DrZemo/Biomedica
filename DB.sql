	CREATE DATABASE DB_BIOMEDICA;

	USE DB_BIOMEDICA;

	CREATE TABLE tblEmpleado(
	ID_Empleado BIGINT PRIMARY KEY,
	USUARIO_Empleado VARCHAR(50),
	PAS_Empleado VARCHAR(50),
	EMAIL VARCHAR(50)
	);

	CREATE TABLE tblProducto(
	ID_Producto VARCHAR(50) PRIMARY KEY,
	NOM_Producto VARCHAR(50),
	PRE_Producto REAL,
	DCN_Producto VARCHAR(100),
  Cantidad INT,
	IMG_Producto VARCHAR(200),
	ID_Empleado BIGINT,
	FOREIGN KEY (ID_Empleado) REFERENCES tblEmpleado(ID_Empleado)
	);

	CREATE TABLE tblCliente(
	ID_Cliente VARCHAR(50) PRIMARY KEY,
	NOMAPE_Cliente VARCHAR(100),
	PASS_Cliente VARCHAR(50),
	CORREO VARCHAR(50),
	Targeta BIGINT,
	DIRECCION VARCHAR(80)
	);
    
	CREATE TABLE tlbFactura(
	ID_FACTURA varchar(200) PRIMARY KEY,
	ID_Cliente VARCHAR(50) REFERENCES tblCliente(ID_Cliente),
	FECHAR DATE DEFAULT NULL,
    CANTIDAD INT,
	TOTAL REAL,
	FOREIGN KEY (ID_Cliente)REFERENCES tblCliente(ID_Cliente)
	) ;



	CREATE TABLE tblDETALLE_FACTURA(
	ID_ITEM INT AUTO_INCREMENT,
	ID_FACTURA varchar(200) REFERENCES tlbFactura(ID_FACTURA),
	ID_Producto VARCHAR(50) REFERENCES tblProducto(ID_Producto),
    CANTIDAD INT,
	primary key (ID_ITEM,ID_FACTURA),
	FOREIGN KEY(ID_FACTURA) REFERENCES tlbFactura(ID_FACTURA),
	FOREIGN KEY(ID_Producto) REFERENCES tblProducto(ID_Producto)
	);



	CREATE TABLE tblEnvio(
	ID_Envio int primary key auto_increment,
	ID_FACTURA varchar(200),
	FechaEntrega date,
	foreign key(ID_FACTURA) references tlbFactura(ID_FACTURA)
	);
