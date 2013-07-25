CREATE TABLE `todos` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user_id` int(10) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` int(1) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
