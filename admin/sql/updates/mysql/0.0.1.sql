
CREATE TABLE `#__frecambio_fabricantes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fabricante` VARCHAR(25) NOT NULL,
  `logo` VARCHAR(900) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `#__frecambio_referencias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idFabricante` INT(11) NOT NULL,
  `referencia` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `#__frecambio_crucereferenciavirt` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idReferencias` INT(11) NOT NULL,
  `virtuemart_product_id` INT(11) NOT NULL,
  `fecha_actualizacion` DATE,
   PRIMARY KEY  (`id`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

