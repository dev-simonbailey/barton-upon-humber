

-- Create database

CREATE DATABASE wrenTest;

-- and use...

USE wrenTest;

-- Create table for data

CREATE TABLE `tblProductData` (
  `intProductDataId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `strProductName` VARCHAR(50) NOT NULL ,
  `strProductDesc` VARCHAR(255) NOT NULL ,
  `strProductCode` VARCHAR(10) NOT NULL ,
  `intStockValue` INT(10) NOT NULL ,
  `decProductPrice` DECIMAL(10,2) UNSIGNED NOT NULL ,
  `dtmDiscontinued` DATETIME DEFAULT NULL ,
  `stmTimestamp` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`intProductDataId`),
  UNIQUE `strProductCode` (`strProductCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores product data';
