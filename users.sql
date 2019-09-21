

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(8) NOT NULL AUTO_INCREMENT,
  `userName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `displayName` varchar(55) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`, `email`) VALUES
(1, 'admin', 'admin123', 'Admin', 'admin@hng.com');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`, `email`) VALUES
(2, 'Vincent', 'vin123', 'Vin', 'vin@hng.com' );

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`, `email`) VALUES
(3, 'Kola', 'kola123', 'Dan', 'dan@hng.com' );

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`,`email` ) VALUES
(4, 'Patrick', 'patrick123', 'Pat','pat@hng.com' );

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`, `email`) VALUES
(5, 'Best', 'best123', 'Olu', 'olu@hng.com');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`, `email`) VALUES
(6, 'Sunny', 'sunny123', 'Sunny', 'ojo@hng.com');


