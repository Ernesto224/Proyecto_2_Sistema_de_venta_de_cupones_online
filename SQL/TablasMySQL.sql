CREATE DATABASE Tarea3_Lenguajes_PHP;

use Tarea3_Lenguajes_PHP;

CREATE TABLE UsuarioAdmin
(
IDAdmin INT PRIMARY KEY AUTO_INCREMENT,
NombreUsuario TEXT NOT NULL,
Contrasenia TEXT NOT NULL
);

CREATE TABLE Empresa
(
IDEmpresa INT PRIMARY KEY AUTO_INCREMENT,
NombreEmpresa TEXT NOT NULL,
DireccionFisica TEXT NOT NULL,
CedulaFisicaJuridica TEXT NOT NULL,
FechaCreacion DATE NOT NULL,
CorreoElectronico TEXT NOT NULL,
Telefono TEXT NOT NULL,
NombreUsuario TEXT NOT NULL,
Contrasenia TEXT NOT NULL,
Habilitado BIT DEFAULT(1) NOT NULL,
CredencialesTemporales BIT DEFAULT(1) NOT NULL
);

CREATE TABLE CategoriaCupon
(
IDCategoria INT PRIMARY KEY AUTO_INCREMENT,
Nombre TEXT NOT NULL,
Descripcion TEXT NOT NULL
);

CREATE TABLE Cupon
(
IDCupon INT PRIMARY KEY AUTO_INCREMENT,
Nombre TEXT NOT NULL,
Imagen TEXT NOT NULL,
Ubicacion TEXT NOT NULL,
PrecioCupon DECIMAL(18,2) NOT NULL,
IDEmpresa INT NOT NULL,
IDCategoria INT NOT NULL,
Habilitado BIT DEFAULT(1) NOT NULL,
CONSTRAINT fk_empresa_cupon
FOREIGN KEY (IDEmpresa)
REFERENCES Empresa(IDEmpresa),
CONSTRAINT fk_categoria_cupon
FOREIGN KEY (IDCategoria)
REFERENCES CategoriaCupon(IDCategoria)
);

CREATE TABLE Promocion
(
IDPromocion INT PRIMARY KEY AUTO_INCREMENT,
FechaDeInicio DATETIME NOT NULL,
FechaDeVencimiento DATETIME NOT NULL,
Descuento DECIMAL(18, 6) NOT NULL,
IDEmpresa INT NOT NULL,
IDCupon INT,
Habilitado BIT DEFAULT(1) NOT NULL,
CONSTRAINT fk_empresa_promocion
FOREIGN KEY (IDEmpresa)
REFERENCES Empresa(IDEmpresa),
CONSTRAINT fk_cupon_promocion
FOREIGN KEY (IDCupon)
REFERENCES Cupon(IDCupon)	
);

-- Insertar datos en UsuarioAdmin
INSERT INTO UsuarioAdmin (NombreUsuario, Contrasenia)
VALUES ('admin1', 'contrasenia1'),
       ('admin2', 'contrasenia2');

-- Insertar datos en Empresa
INSERT INTO Empresa (NombreEmpresa, DireccionFisica, CedulaFisicaJuridica, FechaCreacion, CorreoElectronico, Telefono, NombreUsuario, Contrasenia, Habilitado, CredencialesTemporales)
VALUES ('Empresa A', 'Direccion A', '123456789', '2023-01-01', 'contacto@empresaA.com', '123-456-7890', 'usuarioA', 'contraseniaA', 1, 1),
       ('Empresa B', 'Direccion B', '987654321', '2023-02-01', 'contacto@empresaB.com', '098-765-4321', 'usuarioB', 'contraseniaB', 1, 0);

-- Insertar datos en CategoriaCupon
INSERT INTO CategoriaCupon (Nombre, Descripcion)
VALUES ('Categoria 1', 'Descripcion de Categoria 1'),
       ('Categoria 2', 'Descripcion de Categoria 2');

-- Insertar datos en Cupon
INSERT INTO Cupon (Nombre, Imagen, Ubicacion, PrecioCupon, IDEmpresa, IDCategoria, Habilitado)
VALUES ('Cupon 1', 'imagen1.jpg', 'Ubicacion 1', 100.00, 1, 1, 1),
       ('Cupon 2', 'imagen2.jpg', 'Ubicacion 2', 150.00, 1, 2, 1),
       ('Cupon 3', 'imagen3.jpg', 'Ubicacion 3', 200.00, 2, 1, 1),
       ('Cupon 4', 'imagen4.jpg', 'Ubicacion 4', 250.00, 2, 2, 1);

-- Insertar datos en Promocion
INSERT INTO Promocion (FechaDeInicio, FechaDeVencimiento, Descuento, IDEmpresa, IDCupon, Habilitado)
VALUES ('2024-05-01 00:00:00', '2024-06-01 23:59:59', 10.00, 1, 1, 1),
       ('2024-05-15 00:00:00', '2024-06-15 23:59:59', 15.00, 1, 2, 1),
       ('2024-05-01 00:00:00', '2024-06-01 23:59:59', 20.00, 2, 3, 1),
       ('2024-05-15 00:00:00', '2024-06-15 23:59:59', 25.00, 2, 4, 1);

