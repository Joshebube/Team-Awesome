

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(8) NOT NULL AUTO_INCREMENT,
  `userName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `displayName` varchar(55) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
(1, 'admin', 'admin123', 'Admin');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
(2, 'Vincent', 'vin123', 'Vin');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
(3, 'Kola', 'kola123', 'Dan');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
(4, 'Patrick', 'patrick123', 'Pat');

INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
(5, 'Best', 'best123', 'Olu');



