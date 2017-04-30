create DATABASE alimentos

CREATE TABLE unidadMedida(
  tipo VARCHAR(30)primary key
);
CREATE TABLE alimentos(
  id_alimento INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  tipoAlimento VARCHAR(30) NOT NULL,
  tipo varchar (30),
  FOREIGN KEY (tipo) REFERENCES unidadMedida(tipo)
)
CREATE TABLE cortes(
  id_corte INT AUTO_INCREMENT primary key,
  cantidad int,
  lugar VARCHAR(30),
  fecha_llegada DATE,
  fecha_final DATE
)
CREATE TABLE enpaques(
  id_enpaque INT PRIMARY KEY AUTO_INCREMENT,
  cantidad int,
  lugar VARCHAR(30),
  fecha_llegada DATE,
  fecha_final DATE
);
CREATE TABLE exportacion(
  id_exportacion INT AUTO_INCREMENT PRIMARY KEY,
  cantidad int,
  lugar VARCHAR(30),
  fecha_llegada DATE,
  fecha_final DATE
);
CREATE TABLE tiendas(
  id_tienda INT AUTO_INCREMENT PRIMARY KEY,
  cantidad int,
  lugar VARCHAR(30),
  fecha_llegada DATE,
  fecha_final DATE
);
CREATE TABLE lotes(
  id_lote INT AUTO_INCREMENT PRIMARY KEY,
  id_tienda INT,
  cantidadTienda int,
  FOREIGN KEY(id_tienda) REFERENCES tiendas(id_tienda),
  id_exportacion INT,
  cantidadExportacion int,
  FOREIGN KEY(id_exportacion) REFERENCES exportacion(id_exportacion),
  id_enpaque INT,
  cantidadEnpaque int,
  FOREIGN KEY(id_enpaque) REFERENCES enpaques(id_enpaque),
  id_corte INT,
  cantidadCorte int,
  FOREIGN KEY(id_corte) REFERENCES cortes(id_corte)
);

CREATE TABLE alertaCorte(
  id_alertaCorte INT AUTO_INCREMENT PRIMARY KEY,
  vista BOOLEAN,
  id_lote INT,
  FOREIGN KEY(id_lote) REFERENCES lotes(id_lote)
);

CREATE TABLE alertaEnpaque(
  id_alertaEnpaque INT AUTO_INCREMENT PRIMARY KEY,
  vista BOOLEAN,
  id_lote INT,
  FOREIGN KEY(id_lote) REFERENCES lotes(id_lote)
);

CREATE TABLE alertaTienda(
  id_alertaTienda INT AUTO_INCREMENT PRIMARY KEY,
  vista BOOLEAN,
  id_lote INT,
  FOREIGN KEY(id_lote) REFERENCES lotes(id_lote)
);

CREATE TABLE alertaExportacion(
  id_alertaEnpaque INT AUTO_INCREMENT PRIMARY KEY,
  vista BOOLEAN,
  id_lote INT,
  FOREIGN KEY(id_lote) REFERENCES lotes(id_lote)
);

DELIMITER $$

CREATE TRIGGER InsertaAlertaCorte AFTER INSERT
ON lotes FOR EACH ROW
BEGIN
   DECLARE id_corte int;

    SET id_corte = NEW.id_corte;

   IF (id_corte >= 0) THEN        INSERT INTO alertaCorte VALUES ('', FALSE, NEW.id_lote);
   END IF;

END 


DELIMITER $$

CREATE TRIGGER InsertaAlertaEnpaque AFTER UPDATE
ON lotes FOR EACH ROW
BEGIN
   DECLARE id_enpaque int;

    SET id_enpaque = NEW.id_enpaque;

   IF (id_enpaque >= 0) THEN        INSERT INTO alertaEnpaque VALUES ('', FALSE, NEW.id_lote);
   END IF;

END

DELIMITER $$

CREATE TRIGGER InsertaAlertaTienda AFTER UPDATE
ON lotes FOR EACH ROW
BEGIN
   DECLARE id_tienda int;

    SET id_tienda = NEW.id_tienda;

   IF (id_tienda >= 0) THEN        INSERT INTO alertaTienda VALUES ('', FALSE, NEW.id_lote);
   END IF;

END 







