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
       ('Empresa B', 'Direccion B', '987654321', '2023-02-01', 'contacto@empresaB.com', '098-765-4321', 'usuarioB', 'contraseniaB', 1, 1);

-- Insertar datos en CategoriaCupon
INSERT INTO CategoriaCupon (Nombre, Descripcion)
VALUES ('Categoria 1', 'Descripcion de Categoria 1'),
       ('Categoria 2', 'Descripcion de Categoria 2');

-- Insertar datos en Cupon
INSERT INTO Cupon (Nombre, Imagen, Ubicacion, PrecioCupon, IDEmpresa, IDCategoria, Habilitado)
VALUES ('Cupon 1', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 1', 100.00, 1, 1, 1),
       ('Cupon 2', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 2', 150.00, 1, 2, 1),
       ('Cupon 3', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 3', 200.00, 2, 1, 1),
       ('Cupon 4', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 4', 250.00, 2, 2, 1);

INSERT INTO Cupon (Nombre, Imagen, Ubicacion, PrecioCupon, IDEmpresa, IDCategoria, Habilitado)
VALUES ('CuponMax 1', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 1', 100.00, 1, 1, 1),
       ('Cupona 2', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 2', 150.00, 1, 2, 1),
       ('Cupone 3', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 3', 200.00, 2, 1, 1),
       ('Cupons 4', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 4', 250.00, 2, 2, 1);


INSERT INTO Cupon (Nombre, Imagen, Ubicacion, PrecioCupon, IDEmpresa, IDCategoria, Habilitado)
VALUES ('CuponMax 9', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 1', 100.00, 1, 1, 0),
       ('Cupona 10', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 2', 150.00, 1, 2, 0),
       ('Cupone 11', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 3', 200.00, 2, 1, 0),
       ('Cupons 12', 'https://cdn-icons-png.flaticon.com/512/2331/2331729.png', 'Ubicacion 4', 250.00, 2, 2, 0);

-- Insertar datos en Promocion
INSERT INTO Promocion (FechaDeInicio, FechaDeVencimiento, Descuento, IDEmpresa, IDCupon, Habilitado)
VALUES ('2024-05-01 00:00:00', '2024-06-01 23:59:59', 0.10, 1, 1, 1),
       ('2024-05-15 00:00:00', '2024-06-15 23:59:59', 0.15, 1, 2, 1),
       ('2024-05-01 00:00:00', '2024-06-01 23:59:59', 0.20, 2, 3, 1),
       ('2024-05-15 00:00:00', '2024-06-15 23:59:59', 0.25, 2, 4, 1);
	   

DELIMITER 
//	   
CREATE DEFINER=root@localhost PROCEDURE BuscarCupones(
    IN p_Categoria INT,
    IN p_Termino VARCHAR(255),
    IN p_Inicio INT,
    IN p_Maximo INT
)
BEGIN
    -- Realizar la consulta principal uniendo con promociones activas en la fecha actual
    SELECT 
        Cup.IDCupon, 
        Cup.Nombre, 
        Cup.Imagen, 
        Cup.Ubicacion,
        Cup.PrecioCupon,
        Cup.IDEmpresa,
        Emp.NombreEmpresa,
        Cup.IDCategoria,
        Cat.Nombre AS NombreCategoria,
        COALESCE(Prom.Descuento, 0) AS Descuento,  -- Aplicar el descuento de la promoción si existe
        Cup.Habilitado
    FROM Cupon AS Cup 
    LEFT JOIN Promocion AS Prom 
        ON Cup.IDCupon = Prom.IDCupon
        AND Prom.Habilitado = 1 
        AND Prom.FechaDeInicio <= CURDATE()
        AND Prom.FechaDeVencimiento >= CURDATE()
    INNER JOIN Empresa AS Emp
        ON Cup.IDEmpresa = Emp.IDEmpresa
    INNER JOIN CategoriaCupon AS Cat
        ON Cup.IDCategoria = Cat.IDCategoria
    WHERE 
        (Cup.IDCategoria = p_Categoria OR p_Categoria = -1) AND 
        (Cup.Nombre LIKE CONCAT('%', p_Termino, '%') OR 
         Cup.Ubicacion LIKE CONCAT('%', p_Termino, '%') OR 
         Cat.Nombre LIKE CONCAT('%', p_Termino, '%') OR 
         Emp.NombreEmpresa LIKE CONCAT('%', p_Termino, '%') OR 
         p_Termino = 'null') AND
        Cup.Habilitado = 1
    ORDER BY Cup.IDCupon DESC
    LIMIT p_Maximo OFFSET p_Inicio;
END 
//
DELIMITER ;