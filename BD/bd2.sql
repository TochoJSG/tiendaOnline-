--Este es el modelo en produccion
DROP TABLE IF EXISTS almacen, producto, categoria, proveedor, inventario, gastoVenta, gastoGeneral,
OtraInversion, nomina, modosPago, pago, facturas, cobro, venta, cliente, otroIngreso, egreso, 
gastosVta, gastosGrals, empleado, roles, ingreso, finanzas;

CREATE TABLE almacen (
    idArticulo SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idProveedor SMALLINT NOT NULL,
    costo FLOAT NOT NULL,
    unidades INT NOT NULL,
    idProducto SMALLINT NOT NULL,
    FOREIGN KEY (idProveedor) REFERENCES proveedor(idProveedor),
    FOREIGN KEY (idProducto) REFERENCES producto(idProducto)
);

CREATE TABLE producto (
    idProducto SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idCategoria SMALLINT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    precio FLOAT NOT NULL,
    cantidad INT NOT NULL,
    descripcion TEXT NOT NULL,
    codigoUnico VARCHAR(50) NOT NULL UNIQUE,
    descuento FLOAT NOT NULL DEFAULT 0.0,
    activo BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria)
);

CREATE TABLE categoria (
    idCategoria SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria VARCHAR(255) NOT NULL
);

CREATE TABLE proveedor (
    idProveedor SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE inventario (
    idCompra SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idProducto SMALLINT NOT NULL,
    cantidad INT NOT NULL,
    monto FLOAT NOT NULL,
    idPago SMALLINT NOT NULL,
    FOREIGN KEY (idProducto) REFERENCES producto(idProducto),
    FOREIGN KEY (idPago) REFERENCES pago(idPago)
);

CREATE TABLE gastoVenta (
    idGastVta SMALLINT AUTO_INCREMENT PRIMARY KEY,
    detalle TEXT NOT NULL,
    idGasto SMALLINT NOT NULL,
    monto FLOAT NOT NULL,
    FOREIGN KEY (idGasto) REFERENCES gastosVta(idGtoVta)
);

CREATE TABLE gastoGeneral (
    idGastoGral SMALLINT AUTO_INCREMENT PRIMARY KEY,
    detalle TEXT NOT NULL,
    monto FLOAT NOT NULL
);

CREATE TABLE OtraInversion (
    idOtraInv SMALLINT AUTO_INCREMENT PRIMARY KEY,
    detalle TEXT NOT NULL,
    monto FLOAT NOT NULL
);

CREATE TABLE empleado (
    idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    rfc VARCHAR(20),
    seguro VARCHAR(20),
    fechaIngreso DATE NOT NULL,
    tipo ENUM('Honorario', 'Base') NOT NULL,
    idRol SMALLINT NOT NULL,
    FOREIGN KEY (idRol) REFERENCES roles(idRol)
);

CREATE TABLE roles (
    idRol SMALLINT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(255) NOT NULL
);

CREATE TABLE nomina (
    idNomina SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idEmpleado INT NOT NULL,
    sueldoBruto FLOAT NOT NULL,
    FOREIGN KEY (idEmpleado) REFERENCES empleado(idEmpleado)
);

CREATE TABLE modosPago (
    idModo SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombModo VARCHAR(255) NOT NULL
);

CREATE TABLE pago (
    idPago SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idModo SMALLINT NOT NULL,
    idFactura SMALLINT NOT NULL,
    monto FLOAT NOT NULL,
    FOREIGN KEY (idModo) REFERENCES modosPago(idModo),
    FOREIGN KEY (idFactura) REFERENCES facturas(idFactura)
);

CREATE TABLE facturas (
    idFactura SMALLINT AUTO_INCREMENT PRIMARY KEY,
    concepto TEXT NOT NULL,
    monto FLOAT NOT NULL,
    fecha DATE NOT NULL
);

CREATE TABLE cobro (
    idCobro SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idModo SMALLINT NOT NULL,
    idFactura SMALLINT NOT NULL,
    monto FLOAT NOT NULL,
    FOREIGN KEY (idModo) REFERENCES modosPago(idModo),
    FOREIGN KEY (idFactura) REFERENCES facturas(idFactura)
);

CREATE TABLE venta (
    idVenta SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idFactura SMALLINT NOT NULL,
    idCliente SMALLINT NOT NULL,
    monto FLOAT NOT NULL,
    idProducto SMALLINT NOT NULL,
    fecha DATETIME NOT NULL,
    status VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    FOREIGN KEY (idFactura) REFERENCES facturas(idFactura),
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idProducto) REFERENCES producto(idProducto)
);

CREATE TABLE cliente (
    idCliente SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    cel VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    acercaD TEXT NOT NULL
);

CREATE TABLE otroIngreso (
    idIngreso SMALLINT AUTO_INCREMENT PRIMARY KEY,
    concepto TEXT NOT NULL,
    monto FLOAT NOT NULL
);

CREATE TABLE egreso (
    idEgreso SMALLINT AUTO_INCREMENT PRIMARY KEY,
    monto FLOAT NOT NULL
);

CREATE TABLE gastosVta (
    idGtoVta SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombGasto VARCHAR(255) NOT NULL
);

CREATE TABLE gastosGrals (
    idGastoGral SMALLINT AUTO_INCREMENT PRIMARY KEY,
    nombGasto VARCHAR(255) NOT NULL
);

CREATE TABLE ingreso (
    idIngreso SMALLINT AUTO_INCREMENT PRIMARY KEY,
    idConcepto SMALLINT NOT NULL,
    monto FLOAT NOT NULL
);

CREATE TABLE finanzas (
    idJornada SMALLINT AUTO_INCREMENT PRIMARY KEY,
    ingreso FLOAT NOT NULL,
    egreso FLOAT NOT NULL
);
