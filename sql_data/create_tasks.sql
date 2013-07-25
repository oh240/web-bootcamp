CREATE TABLE `tasks` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user_id` int(10) NOT NULL,
 `todo_id` int(10) NOT NULL,
 `status` int(1) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
