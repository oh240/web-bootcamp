CREATE TABLE `users` (  
`id` int(10) NOT NULL AUTO_INCREMENT,  
`username` varchar(255) NOT NULL,  
`password` varchar(255) NOT NULL, 
`nickname` varchar(255) NOT NULL,  
`created` datetime NOT NULL,  
`modified` datetime NOT NULL,  
PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
