DROP TABLE IF EXISTS `#__frecambio_fabricantes`;

CREATE TABLE `#__frecambio_fabricantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante` varchar(25) NOT NULL,
  `logo` varchar(900) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
   PRIMARY KEY  (`id`),
   UNIQUE KEY `fabricantes`(`fabricante`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#__frecambio_referencias`;

CREATE TABLE `#__frecambio_referencias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idFabricante` INT(11) NOT NULL,
  `referencia` VARCHAR(25) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
   PRIMARY KEY  (`id`),
   UNIQUE KEY `RefFabricante` (`idFabricante`,`referencia`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__frecambio_crucereferenciavirt`;

CREATE TABLE `#__frecambio_crucereferenciavirt` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idReferencia` INT(11) NOT NULL,
  `virtuemart_product_id` INT(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
   PRIMARY KEY  (`id`),
   UNIQUE KEY `cruce` (`idReferencia`,`virtuemart_product_id`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

