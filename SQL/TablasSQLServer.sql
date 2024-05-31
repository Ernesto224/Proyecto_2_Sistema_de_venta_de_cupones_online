CREATE DATABASE Tarea3_Lenguajes_C#
GO

USE Tarea3_Lenguajes_C#
GO

USE Alexa_Tarea3_Lenguajes_2024
GO

CREATE TABLE UsuarioCliente
(
IDCliente INT PRIMARY KEY IDENTITY,
Nombre NVARCHAR(MAX) NOT NULL,
Apellidos NVARCHAR(MAX) NOT NULL,
CedulaDeIdentidad NVARCHAR(MAX) NOT NULL,
FechaDeNacimiento DATE NOT NULL,
CorreoElectronico NVARCHAR(MAX) NOT NULL,
Contrasenia	NVARCHAR(MAX) NOT NULL,
Habilitado BIT DEFAULT(1) NOT NULL,
)
GO

CREATE TABLE Compra 
(
IDCompra INT PRIMARY KEY IDENTITY,
FechaDeCompra DATETIME NOT NULL,
PrecioTotal DECIMAL(18, 2) NOT NULL,
NombreTarjetaHabiente NVARCHAR(MAX) NOT NULL,
PAN NVARCHAR(MAX) NOT NULL,
IDCliente INT NOT NULL,
CONSTRAINT fk_cliente_Compra
FOREIGN KEY (IDCliente)
REFERENCES UsuarioCliente(IDCliente)
)
GO

CREATE TABLE DetallesCompra 
(
IDDetalle INT PRIMARY KEY IDENTITY,
Cantidad INT NOT NULL,
Precio DECIMAL(18, 2) NOT NULL,
IDCompra INT NOT NULL,
IDCupon INT NOT NULL,
CONSTRAINT fk_compra_detallesCompra
FOREIGN KEY (IDCompra) 
REFERENCES Compra(IDCompra)
)
GO

-- Insertar datos en UsuarioCliente
INSERT INTO UsuarioCliente (Nombre, Apellidos, CedulaDeIdentidad, FechaDeNacimiento, CorreoElectronico, Contrasenia, Habilitado)
VALUES ('Juan', 'Perez', '12-3456-8789', '1990-01-01', 'juanperez@example.com', 'Password1!', 1),
       ('Maria', 'Gonzalez', '98-7654-5321', '1985-05-15', 'mariagonzalez@example.com', 'Password2!', 1),
       ('Carlos', 'Ramirez', '45-6123-5789', '1992-07-20', 'carlosramirez@example.com', 'Password3!', 1),
       ('Ana', 'Lopez', '32-1654-6987', '1988-03-10', 'analopez@example.com', 'Password4!', 0);

-- Insertar datos en Compra
INSERT INTO Compra (FechaDeCompra, PrecioTotal, NombreTarjetaHabiente, PAN, IDCliente)
VALUES ('2024-05-01 10:00:00', 150.00, 'Juan Perez', '###33456', 1),
       ('2024-05-02 14:30:00', 200.00, 'Maria Gonzalez', '####4567', 2),
       ('2024-05-03 09:00:00', 100.00, 'Carlos Ramirez', '####5678', 3),
       ('2024-05-04 16:45:00', 250.00, 'Ana Lopez', '####6789', 4);

-- Insertar datos en DetallesCompra
INSERT INTO DetallesCompra (Cantidad, Precio, IDCompra, IDCupon)
VALUES (2, 75.00, 1, 1),
       (1, 200.00, 2, 2),
       (3, 33.33, 3, 3),
       (4, 62.50, 4, 4);
