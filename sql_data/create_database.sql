CREATE DATABASE webbootcamp CHARACTER SET utf8;

use webbootcamp ;

CREATE TABLE `users` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`nickname` varchar(255) NOT NULL,
`created` datetime NOT NULL,
`modified` datetime NOT NULL,
PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tasks` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user_id` int(10) NOT NULL,
 `todo_id` int(10) NOT NULL,
 `status` int(1) NOT NULL,
 `rank` int(1) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `todos` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user_id` int(10) NOT NULL,
 `project_id` int(10) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` int(1) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `projects` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`user_id` int(10) NOT NULL,
`created` datetime NOT NULL,
`modified` datetime NOT NULL,
PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comments` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `task_id` int(10) NOT NULL,
 `user_id` int(10) NOT NULL,
 `body` varchar(500) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `threads` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`project_id` int(10) NOT NULL,
`user_id` int(10) NOT NULL,
`title` varchar(255) NOT NULL,
`body` varchar(510) NOT NULL,
`created` datetime NOT NULL,
`modified` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `replies` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `thread_id` int(10) NOT NULL,
 `user_id` int(10) NOT NULL,
 `body` varchar(255) NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
