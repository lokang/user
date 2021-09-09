CREATE TABLE `user` (
    `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `gender` varchar(255) NOT NULL,
    `firstName` varchar(150) NOT NULL,
    `middleName` varchar(255) NOT NULL,
    `lastName` varchar(150) NOT NULL,
    `email` varchar(150) NOT NULL,
    `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;