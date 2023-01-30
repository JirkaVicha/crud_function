CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email_id` varchar(120) NOT NULL,
  `contact_number` char(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;