-- MySQL dump 8.22
--
-- Host: localhost    Database: buchladen
---------------------------------------------------------
-- Server version	3.23.52-Max-log

--
-- Table structure for table 'bestellte_buecher'
--

CREATE TABLE bestellte_buecher (
  bestellnr int(10) unsigned NOT NULL default '0',
  artikelnr char(13) NOT NULL default '',
  anzahl tinyint(3) unsigned default NULL,
  PRIMARY KEY  (bestellnr,artikelnr)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'bestellte_buecher'
--


INSERT INTO bestellte_buecher VALUES (1,'0-672-31784-2',1);
INSERT INTO bestellte_buecher VALUES (2,'1-58799-018-0',1);
INSERT INTO bestellte_buecher VALUES (3,'1-58799-018-0',1);
INSERT INTO bestellte_buecher VALUES (4,'3-8266-0349-4',2);
INSERT INTO bestellte_buecher VALUES (5,'3-932588-93-2',1);
INSERT INTO bestellte_buecher VALUES (6,'3-932588-93-2',1);
INSERT INTO bestellte_buecher VALUES (6,'1-58799-018-0',1);

--
-- Table structure for table 'bestellungen'
--

CREATE TABLE bestellungen (
  bestellnr int(10) unsigned NOT NULL auto_increment,
  kundennr int(10) unsigned NOT NULL default '0',
  betrag float NOT NULL default '0',
  PRIMARY KEY  (bestellnr)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
--
-- Dumping data for table 'bestellungen'
--


INSERT INTO bestellungen VALUES (1,1,49.99);
INSERT INTO bestellungen VALUES (2,2,14.9);
INSERT INTO bestellungen VALUES (3,3,14.9);
INSERT INTO bestellungen VALUES (4,1,58);
INSERT INTO bestellungen VALUES (5,4,47);
INSERT INTO bestellungen VALUES (6,5,61.9);

--
-- Table structure for table 'buchbesprechungen'
--

CREATE TABLE buchbesprechungen (
  isbn varchar(13) NOT NULL default '',
  besprechung text,
  PRIMARY KEY  (isbn)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'buchbesprechungen'
--



--
-- Table structure for table 'buecher'
--

CREATE TABLE buecher (
  isbn char(13) NOT NULL default '',
  autor char(30) default NULL,
  titel char(60) default NULL,
  preis float(4,2) default NULL,
  PRIMARY KEY  (isbn)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'buecher'
--


INSERT INTO buecher VALUES ('3-7723-6865-4','Schwendiman','PHP4 Praxisbuch',49.00);
INSERT INTO buecher VALUES ('3-897-21115-7','Siever','Perl IN A NUTSHELL',30.00);
INSERT INTO buecher VALUES ('3-7723-7703-3','Arciniegas','XML Developer`s Guide',51.00);
INSERT INTO buecher VALUES ('3-8272-5709-3','Zitt','ISDN',9.00);
INSERT INTO buecher VALUES ('3-8273-1762-2','Michael Kofler','MySQL',49.00);
INSERT INTO buecher VALUES ('0-672-31784-2','Welling, Thomson','PHP and MySQL Web Development',49.99);
INSERT INTO buecher VALUES ('3-8266-0349-4','Heuer, Saake','Datenbanken - Konzepte und Sprachen',29.00);
INSERT INTO buecher VALUES ('3-446-16339-5','Haberaecker','Digitale Bildverarbeitung',39.99);
INSERT INTO buecher VALUES ('3-932588-93-2','beehive GmbH','Zope Content-Management-& Web-Application-Server',47.00);
INSERT INTO buecher VALUES ('1-58799-018-0','Berners-Lee','Weaving the Web',14.90);
INSERT INTO buecher VALUES ('007','James','Bond',13.25);
INSERT INTO buecher VALUES ('123-456-89','Herper','Einführung in die Software',12.35);


--
-- Table structure for table 'kunden'
--

CREATE TABLE kunden (
  kundennr int(10) unsigned NOT NULL auto_increment,
  name char(30) NOT NULL default '',
  adresse char(40) NOT NULL default '',
  stadt char(20) NOT NULL default '',
  PRIMARY KEY  (kundennr)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'kunden'
--


INSERT INTO kunden VALUES (1,'Lisa Meier','Hauptstraße 3','39112 Magdeburg');
INSERT INTO kunden VALUES (2,'Rudi Ratlos','Dorftsraße 1','39445 Klein Seedorf');
INSERT INTO kunden VALUES (3,'Anna Nass','Strandstraße 2','34567 Meerblick');
INSERT INTO kunden VALUES (4,'Moritz','Seestraße 4','39909 Magdeburg');
INSERT INTO kunden VALUES (5,'Ullrich Hötling','Kiefernweg 6','39638 Jävenitz');
INSERT INTO kunden VALUES (6,'Ines Hötling','Kiefernweg 6','39638 Jävenitz');
INSERT INTO kunden VALUES (7,'Lisa Meier','Hauptstr.3','39112 Magdeburg\r');
INSERT INTO kunden VALUES (8,'Rudi Ratlos','Dorfstr.1','39445 Klein Seedorf\r');
INSERT INTO kunden VALUES (9,'Anna Nass','Strandstr.2','34567 Meerblick\r');
INSERT INTO kunden VALUES (10,'Jutta Mueller','Breiter Weg 223','39104 Magdeburg\r');
INSERT INTO kunden VALUES (11,'Sabine Meier','Froebelstr. 5','39110 Magdeburg\r');
INSERT INTO kunden VALUES (12,'Werner Baumann','Pestalozzistr. 17','39108 Magdeburg\r');
INSERT INTO kunden VALUES (13,'Karlheinz Winter','Lessingstr. 77','06366 Koethen\r');
INSERT INTO kunden VALUES (14,'Axel Meister','Marktplatz 15','23456 Quedlinburg\r');

