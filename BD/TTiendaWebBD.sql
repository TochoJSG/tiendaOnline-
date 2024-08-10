DROP TABLE IF EXISTS almacen ;
DROP TABLE IF EXISTS producto ;
DROP TABLE IF EXISTS categoria;
DROP TABLE IF EXISTS proveedor;
DROP TABLE IF EXISTS inventario ;
DROP TABLE IF EXISTS gastoVenta;
DROP TABLE IF EXISTS gastoGeneral;
DROP TABLE IF EXISTS OtraInversion;
DROP TABLE IF EXISTS nomina;
DROP TABLE IF EXISTS modosPago;
DROP TABLE IF EXISTS pago;
DROP TABLE IF EXISTS facturas;
DROP TABLE IF EXISTS cobro;
DROP TABLE IF EXISTS venta;
DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS otroIngreso;
DROP TABLE IF EXISTS egreso;
DROP TABLE IF EXISTS gastosVta;
DROP TABLE IF EXISTS gastosGrals;
DROP TABLE IF EXISTS empHonorario;
DROP TABLE IF EXISTS empleadoBase;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS ingreso;
DROP TABLE IF EXISTS finanzas ;


CREATE TABLE almacen  (
idArticulo SMALLINT AUTO_INCREMENT NOT NULL UNIQUE,
idProveedor  SMALLINT NOT NULL,
costo FLOAT NOT NULL,
unidades FLOAT NOT NULL,
idProd SMALLINT NOT NULL);

CREATE TABLE producto  (
idProducto SMALLINT AUTO_INCREMENT NOT NULL UNIQUE,
idCategoria SMALLINT NOT NULL,
nombre TEXT NOT NULL,
precio FLOAT NOT NULL,
cantidad FLOAT NOT NULL,
descripcion  TEXT NOT NULL,
codigoUnico  INTEGER NOT NULL,
descuento FLOAT NOT NULL DEFAULT 0.0,
activo BOOLEAN NOT NULL DEFAULT 1,
PRIMARY KEY (idProducto,cantidad));

CREATE TABLE categoria (
idCategoria  SMALLINT PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
catego TEXT NOT NULL);

CREATE TABLE proveedor (
idProveedor  SMALLINT PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
nombre TEXT NOT NULL,
tel INTEGER NOT NULL,
mail TEXT NOT NULL,
descripcion  TEXT NOT NULL);

CREATE TABLE inventario  (
idCompra SMALLINT NOT NULL,
producto  TEXT NOT NULL,
monto FLOAT PRIMARY KEY NOT NULL,
idPago  SMALLINT NOT NULL);

CREATE TABLE gastoVenta (
idGastVta SMALLINT NOT NULL,
detalle TEXT NOT NULL,
idGasto SMALLINT NOT NULL,
monto FLOAT NOT NULL);

CREATE TABLE gastoGeneral (
idGastoGral SMALLINT NOT NULL,
detalle TEXT NOT NULL,
idGastoGral  SMALLINT NOT NULL,
monto FLOAT NOT NULL);

CREATE TABLE OtraInversion (
idOtraInv SMALLINT NOT NULL,
detalle TEXT NOT NULL,
monto FLOAT NOT NULL);

CREATE TABLE nomina (
idNomina SMALLINT NOT NULL,
idEmpleado INT PRIMARY KEY NOT NULL,
sueldoBruto FLOAT NOT NULL);

CREATE TABLE modosPago (
idModo SMALLINT PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
nombModo TEXT NOT NULL);

CREATE TABLE pago (
idPago SMALLINT AUTO_INCREMENT NOT NULL UNIQUE,
idModo SMALLINT NOT NULL,
idFactura  SMALLINT NOT NULL,
monto FLOAT PRIMARY KEY NOT NULL);

CREATE TABLE facturas (
idFactura  SMALLINT PRIMARY KEY NOT NULL,
concepto TEXT NOT NULL,
monto FLOAT NOT NULL,
fecha DATE NOT NULL);

CREATE TABLE cobro (
idCobro SMALLINT NOT NULL,
idModo SMALLINT NOT NULL,
idFactura  SMALLINT NOT NULL,
monto FLOAT PRIMARY KEY NOT NULL);

CREATE TABLE venta (
idVenta SMALLINT NOT NULL,
idFactura  SMALLINT NOT NULL,
idCliente  SMALLINT NOT NULL,
monto FLOAT NOT NULL,
idProducto  SMALLINT NOT NULL,
fecha DATETIME NOT NULL,
status TEXT NOT NULL,
email TEXT NOT NULL,
PRIMARY KEY (idVenta,email));

CREATE TABLE cliente (
idCliente  SMALLINT PRIMARY KEY NOT NULL,
nombre TEXT NOT NULL,
cel INTEGER NOT NULL,
email TEXT NOT NULL,
acercaD TEXT NOT NULL);

CREATE TABLE otroIngreso (
idIngreso SMALLINT NOT NULL,
concepto  TEXT NOT NULL,
monto FLOAT NOT NULL);

CREATE TABLE egreso (
idEgreso SMALLINT NOT NULL,
idGasto  SMALLINT PRIMARY KEY NOT NULL,
monto FLOAT NOT NULL);

CREATE TABLE gastosVta (
idGtoVta SMALLINT PRIMARY KEY NOT NULL,
nombGasto TEXT NOT NULL);

CREATE TABLE gastosGrals (
idGastoGral SMALLINT PRIMARY KEY NOT NULL,
nombGasto TEXT NOT NULL);

CREATE TABLE empHonorario (
idEmpleado  INT AUTO_INCREMENT NOT NULL UNIQUE,
nombres TEXT NOT NULL,
apellidos TEXT NOT NULL,
mail TEXT NOT NULL,
tel INTEGER NOT NULL,
anotaciones TEXT NOT NULL,
idRol SMALLINT NOT NULL);

CREATE TABLE empleadoBase (
idEmpleado  INT NOT NULL,
nombres TEXT NOT NULL,
apellidos  TEXT NOT NULL,
tel INTEGER NOT NULL,
mail TEXT NOT NULL,
rfc TEXT NOT NULL,
seguro TEXT NOT NULL,
fechaIngreso DATE NOT NULL,
idRol SMALLINT NOT NULL);

CREATE TABLE roles (
idRol SMALLINT PRIMARY KEY NOT NULL,
rol TEXT NOT NULL);

CREATE TABLE ingreso (
idIngreso  SMALLINT NOT NULL,
idConcepto SMALLINT NOT NULL,
monto FLOAT NOT NULL,
PRIMARY KEY (idIngreso ,monto));

CREATE TABLE finanzas  (
idJornada SMALLINT NOT NULL,
ingreso FLOAT NOT NULL,
egreso FLOAT NOT NULL);

ALTER TABLE almacen  ADD CONSTRAINT almacen _idProveedor _proveedor_idProveedor  FOREIGN KEY (idProveedor ) REFERENCES proveedor(idProveedor );
ALTER TABLE almacen  ADD CONSTRAINT almacen _costo_inventario _monto FOREIGN KEY (costo) REFERENCES inventario (monto);
ALTER TABLE almacen  ADD CONSTRAINT almacen _unidades_producto _cantidad FOREIGN KEY (unidades) REFERENCES producto (cantidad);
ALTER TABLE almacen  ADD CONSTRAINT almacen _idProd_producto _idProducto FOREIGN KEY (idProd) REFERENCES producto (idProducto);
ALTER TABLE producto  ADD CONSTRAINT producto _idCategoria_categoria_idCategoria  FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria );
ALTER TABLE inventario  ADD CONSTRAINT inventario _idCompra_egreso_idGasto  FOREIGN KEY (idCompra) REFERENCES egreso(idGasto );
ALTER TABLE inventario  ADD CONSTRAINT inventario _monto_pago_monto FOREIGN KEY (monto) REFERENCES pago(monto);
ALTER TABLE gastoVenta ADD CONSTRAINT gastoVenta_idGastVta_egreso_idGasto  FOREIGN KEY (idGastVta) REFERENCES egreso(idGasto );
ALTER TABLE gastoVenta ADD CONSTRAINT gastoVenta_idGasto_gastosVta_idGtoVta FOREIGN KEY (idGasto) REFERENCES gastosVta(idGtoVta);
ALTER TABLE gastoVenta ADD CONSTRAINT gastoVenta_monto_pago_monto FOREIGN KEY (monto) REFERENCES pago(monto);
ALTER TABLE gastoGeneral ADD CONSTRAINT gastoGeneral_idGastoGral_egreso_idGasto  FOREIGN KEY (idGastoGral) REFERENCES egreso(idGasto );
ALTER TABLE gastoGeneral ADD CONSTRAINT gastoGeneral_idGastoGral _gastosGrals_idGastoGral FOREIGN KEY (idGastoGral ) REFERENCES gastosGrals(idGastoGral);
ALTER TABLE gastoGeneral ADD CONSTRAINT gastoGeneral_monto_pago_monto FOREIGN KEY (monto) REFERENCES pago(monto);
ALTER TABLE OtraInversion ADD CONSTRAINT OtraInversion_idOtraInv_egreso_idGasto  FOREIGN KEY (idOtraInv) REFERENCES egreso(idGasto );
ALTER TABLE OtraInversion ADD CONSTRAINT OtraInversion_monto_pago_monto FOREIGN KEY (monto) REFERENCES pago(monto);
ALTER TABLE nomina ADD CONSTRAINT nomina_idNomina_egreso_idGasto  FOREIGN KEY (idNomina) REFERENCES egreso(idGasto );
ALTER TABLE nomina ADD CONSTRAINT nomina_sueldoBruto_pago_monto FOREIGN KEY (sueldoBruto) REFERENCES pago(monto);
ALTER TABLE pago ADD CONSTRAINT pago_idModo_modosPago_idModo FOREIGN KEY (idModo) REFERENCES modosPago(idModo);
ALTER TABLE pago ADD CONSTRAINT pago_idFactura _facturas_idFactura  FOREIGN KEY (idFactura ) REFERENCES facturas(idFactura );
ALTER TABLE cobro ADD CONSTRAINT cobro_idModo_modosPago_idModo FOREIGN KEY (idModo) REFERENCES modosPago(idModo);
ALTER TABLE cobro ADD CONSTRAINT cobro_idFactura _facturas_idFactura  FOREIGN KEY (idFactura ) REFERENCES facturas(idFactura );
ALTER TABLE cobro ADD CONSTRAINT cobro_monto_ingreso_monto FOREIGN KEY (monto) REFERENCES ingreso(monto);
ALTER TABLE venta ADD CONSTRAINT venta_idVenta_ingreso_idConcepto FOREIGN KEY (idVenta) REFERENCES ingreso(idConcepto);
ALTER TABLE venta ADD CONSTRAINT venta_idFactura _facturas_idFactura  FOREIGN KEY (idFactura ) REFERENCES facturas(idFactura );
ALTER TABLE venta ADD CONSTRAINT venta_idCliente _cliente_idCliente  FOREIGN KEY (idCliente ) REFERENCES cliente(idCliente );
ALTER TABLE venta ADD CONSTRAINT venta_monto_cobro_monto FOREIGN KEY (monto) REFERENCES cobro(monto);
ALTER TABLE venta ADD CONSTRAINT venta_idProducto _producto _idProducto FOREIGN KEY (idProducto ) REFERENCES producto (idProducto);
ALTER TABLE cliente ADD CONSTRAINT cliente_email_venta_email FOREIGN KEY (email) REFERENCES venta(email);
ALTER TABLE otroIngreso ADD CONSTRAINT otroIngreso_idIngreso_ingreso_idIngreso  FOREIGN KEY (idIngreso) REFERENCES ingreso(idIngreso );
ALTER TABLE otroIngreso ADD CONSTRAINT otroIngreso_monto_cobro_monto FOREIGN KEY (monto) REFERENCES cobro(monto);
ALTER TABLE egreso ADD CONSTRAINT egreso_monto_pago_monto FOREIGN KEY (monto) REFERENCES pago(monto);
ALTER TABLE empHonorario ADD CONSTRAINT empHonorario_idEmpleado _nomina_idEmpleado FOREIGN KEY (idEmpleado ) REFERENCES nomina(idEmpleado);
ALTER TABLE empHonorario ADD CONSTRAINT empHonorario_idRol_roles_idRol FOREIGN KEY (idRol) REFERENCES roles(idRol);
ALTER TABLE empleadoBase ADD CONSTRAINT empleadoBase_idEmpleado _nomina_idEmpleado FOREIGN KEY (idEmpleado ) REFERENCES nomina(idEmpleado);
ALTER TABLE empleadoBase ADD CONSTRAINT empleadoBase_idRol_roles_idRol FOREIGN KEY (idRol) REFERENCES roles(idRol);
ALTER TABLE finanzas  ADD CONSTRAINT finanzas _ingreso_ingreso_monto FOREIGN KEY (ingreso) REFERENCES ingreso(monto);
ALTER TABLE finanzas  ADD CONSTRAINT finanzas _egreso_egreso_monto FOREIGN KEY (egreso) REFERENCES egreso(monto);