CREATE DATABASE `forms`;

use `forms`;

CREATE TABLE `form` (
`form_id` int(11) NOT NULL AUTO_INCREMENT,
`form_method` varchar(15) DEFAULT NULL,
`form_action` varchar(255) DEFAULT NULL,
PRIMARY KEY (`form_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `input` (
`input_id` int(11) NOT NULL AUTO_INCREMENT,
`form_fk` int(11) DEFAULT NULL, 
`input_type` varchar(20) DEFAULT NULL,
`input_name` varchar(20) DEFAULT NULL,
`input_label` varchar(55) DEFAULT NULL,
`input_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`input_value`)),
PRIMARY KEY (`input_id`),
KEY `form_fk` (`form_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;