CREATE TABLE `comments` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `task_id` int(10) NOT NULL,
 `user_id` int(10) NOT NULL,
 `body` varchar(500) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;