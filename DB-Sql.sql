CREATE TABLE `Users` (
  `User_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  `email` varchar(255),
  `Role` integer,
  `Team_id` integer
);

CREATE TABLE `Teams` (
  `Tid` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Team_name` varchar(255)
);

CREATE TABLE `Managers` (
  `manager_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Team_id` integer,
  `username` varchar(255),
  `password` varchar(255),
  `email` varchar(255)
);

CREATE TABLE `Documents` (
  `Document_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Team_id` integer,
  `User_id` integer,
  `language` varchar(255),
  `target_language` varchar(255),
  `urgent` boolean,
  `cost` integer,
  `est_time` time,
  `state` varchar(255),
  `upload_date` date,
  `file_path` varchar(255),
  `employee_id` integer,
  `Translation_path` varchar(255)
);

CREATE TABLE `Reports` (
  `Report_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` integer,
  `status` varchar(255),
  `Translation_id` integer,
  `Content` varchar(255),
  `rep_date` date,
  `Title` varchar(255)
);

ALTER TABLE `Managers` ADD FOREIGN KEY (`Team_id`) REFERENCES `Teams` (`Tid`);

ALTER TABLE `Users` ADD FOREIGN KEY (`Team_id`) REFERENCES `Teams` (`Tid`);

ALTER TABLE `Documents` ADD FOREIGN KEY (`Team_id`) REFERENCES `Teams` (`Tid`);

ALTER TABLE `Documents` ADD FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`);

ALTER TABLE `Reports` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`User_id`);

ALTER TABLE `Reports` ADD FOREIGN KEY (`Translation_id`) REFERENCES `Documents` (`Document_id`);
