CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
    `payroll` varchar(50) NOT NULL,
    `password` varchar(500) NOT NULL,
    `phone` varchar(20) NOT NULL,
    `photo` varchar(500) NOT NULL,
    `phone_2` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1  ;



CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
    `rand` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
    `sday` varchar(20) NOT NULL,
    `smon` varchar(20) NOT NULL,
    `syear` varchar(20) NOT NULL,
    `zday` varchar(20) NOT NULL,
    `zmon` varchar(20) NOT NULL,
    `zyear` varchar(20) NOT NULL,
    `message` varchar(500) NOT NULL,
    `aprove` varchar(20) NOT NULL,
    `end` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1  ;