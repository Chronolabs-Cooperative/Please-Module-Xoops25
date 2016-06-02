
CREATE TABLE `please_addresses` (
  `id` int(14) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(198) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `recieved` int(12) DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `tickets` int(12) DEFAULT '0',
  `ticket-id` mediumint(30) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `action` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`address`(18),`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_bcc` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `address-id` int(14) UNSIGNED EFAULT '0',
  `name-id` int(14) UNSIGNED DEFAULT '0',
  `email-id` mediumint(30) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`address-id`,`name-id`,`email-id`,`ticket-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_cc` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `address-id` int(14) UNSIGNED DEFAULT '0',
  `name-id` int(14) UNSIGNED DEFAULT '0',
  `email-id` mediumint(30) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`address-id`,`name-id`,`email-id`,`ticket-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_contents` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(44) DEFAULT '',
  `text` longtext,
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`key`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `method` enum('email','pm','staff','mantis','unknown') DEFAULT 'unknown',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `department-id` mediumint(6) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences_bcc` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bcc-id` mediumint(30) UNSIGNED DEFAULT '0',
  `department-id` mediumint(6) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `viewed` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences_cc` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cc-id` mediumint(30) UNSIGNED DEFAULT '0',
  `department-id` mediumint(6) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `viewed` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences_contents` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `correspondence-id` mediumint(38) UNSIGNED DEFAULT '0',
  `ticket-contents-id` mediumint(30) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences_relayed` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `relayed-id` mediumint(30) UNSIGNED DEFAULT '0',
  `department-id` mediumint(6) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `viewed` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_correspondences_to` (
  `id` mediumint(38) UNSIGNED NOT NULL AUTO_INCREMENT,
  `to-id` mediumint(30) UNSIGNED DEFAULT '0',
  `department-id` mediumint(6) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` mediumint(18) UNSIGNED DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `viewed` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT 'ABC',
  `name` varchar(128) DEFAULT '',
  `description` tinytext,
  `mantis-uri` varchar(350) DEFAULT '',
  `mantis-username` varchar(45) DEFAULT '',
  `mantis-password` varchar(198) DEFAULT '',
  `mantis-project-id` int(11) UNSIGNED DEFAULT '0',
  `manager-uid` int(11) DEFAULT '0',
  `manager-bcc` enum('all-email','closed-email','all-pm','closed-pm','none') DEFAULT 'none',
  `manager-mantis-username` varchar(45) DEFAULT '',
  `manager-mantis-password` varchar(198) DEFAULT '',
  `mantis` enum('yes','no') DEFAULT 'no',
  `gid` int(8) DEFAULT '0',
  `tickets` int(12) DEFAULT '0',
  `staff` int(12) DEFAULT '0',
  `clients` int(12) DEFAULT '0',
  `raised` int(12) DEFAULT '0',
  `latest-id` mediumint(30) UNSIGNED DEFAULT '0',
  `closed-id` mediumint(30) UNSIGNED DEFAULT '0',
  `signature` varchar(300) DEFAULT '',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments_keywords` (
  `id` int(18) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department-id` int(6) UNSIGNED DEFAULT '0',
  `keyword-id` int(20) UNSIGNED NOT NULL,
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`keyword-id`,`department-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments_mantis_projects` (
  `id` int(26) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department-id` int(6)  UNSIGNED NOT NULL DEFAULT '0',
  `project-id` int(12) DEFAULT '0',
  `project-name` varchar(128) DEFAULT '',
  `project-description` tinytext,
  `tickets` int(12) DEFAULT '0',
  `clients` int(12) DEFAULT '0',
  `raised` int(12) DEFAULT '0',
  `latest-mantis-id` mediumint(30) DEFAULT '0',
  `closed-mantis-id` mediumint(30) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`department-id`,`project-id`,`project-name`(17),`latest-mantis-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments_staff` (
  `id` int(18) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department-id` int(6) DEFAULT '0',
  `state` enum('active','inactive','holidays') DEFAULT 'active',
  `messaging` enum('email','pm','none') DEFAULT 'email',
  `uid` int(12) DEFAULT '0',
  `open` int(12) DEFAULT '0',
  `tickets` int(12) DEFAULT '0',
  `closed` int(12) DEFAULT '0',
  `clients` int(12) DEFAULT '0',
  `raised` int(12) DEFAULT '0',
  `votes` int(12) DEFAULT '0',
  `rating` int(12) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `mantis-username` varchar(45) DEFAULT '',
  `mantis-password` varchar(198) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`department-id`,`state`,`uid`,`open`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments_staff_keywords` (
  `id` int(18) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department-id` int(6) UNSIGNED DEFAULT '0',
  `staff-id` int(18) UNSIGNED NOT NULL,
  `keyword-id` int(20) UNSIGNED NOT NULL,
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`keyword-id`,`staff-id`,`department-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_departments_staff_mantis_tickets` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket-id` int(12) UNSIGNED DEFAULT '0',
  `ticket-subject-id` mediumint(30) UNSIGNED DEFAULT '0',
  `follow-up` int(12) DEFAULT '0',
  `closed` int(12) DEFAULT '0',
  `raised` int(12) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_emails` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from-id` int(14) UNSIGNED DEFAULT '0',
  `recieved` enum('html','text') DEFAULT 'html',
  `sending` enum('html','text') DEFAULT 'html',
  `subject-id` mediumint(30) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `content-key` varchar(44) DEFAULT '',
  `attachments` int(6) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`content-key`(20),`from-id`,`subject-id`,`ticket-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_keywords` (
  `id` mediumint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` enum('actionable','historical') DEFAULT 'actionable',
  `keyword` varchar(64) DEFAULT '',
  `occurences` mediumint(30) UNSIGNED DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`keyword`(43),`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_messages` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email-id` mediumint(30) UNSIGNED DEFAULT '0',
  `subject-id` mediumint(30) UNSIGNED DEFAULT '0',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `message-id` varchar(64) UNSIGNED DEFAULT '',
  `from-id` mediumint(30) UNSIGNED DEFAULT '0',
  `when` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`email-id`,`subject-id`,`ticket-id`,`message-id`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_names` (
  `id` int(14) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(198) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`name`(18),`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_relayed` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` int(18) UNSIGNED DEFAULT '0',
  `department-id` int(6) UNSIGNED DEFAULT '0',
  `mantis-node-key` varchar(44) DEFAULT '',
  `mantis-ticket-id` int(14) DEFAULT '0',
  `mantis-project-id` int(14) DEFAULT '0',
  `mantis-assigned-to` varchar(64) DEFAULT '',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`ticket-id`,`staff-id`,`department-id`,`mantis-node-key`(16),`mantis-ticket-id`,`mantis-project-id`,`mantis-assigned-to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_subjects` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(300) DEFAULT '',
  `email-id` int(30) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`subject`(30),`email-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_tickets` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` enum('new','waiting','resonded','mantis','ignored','spam','allocated','claimed') DEFAULT 'new',
  `ticket-key` varchar(20) DEFAULT 'XXX-0000000XAA',
  `subject-id` mediumint(30) UNSIGNED DEFAULT '0',
  `from-id` int(14) UNSIGNED DEFAULT '0',
  `from-uid` int(11) UNSIGNED DEFAULT '0',
  `belong-uid` int(11) DEFAULT '0',
  `belong-gid` int(11) DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL,
  `created` int(12) DEFAULT '0',
  `responded` int(12) DEFAULT '0',
  `sent` int(12) DEFAULT '0',
  `closed` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`ticket-key`(15),`state`,`subject-id`,`belong-uid`,`belong-gid`,`from-id`,`from-uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_tickets_attachments` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `typal` enum('from','sent','mantis') DEFAULT 'from',
  `state` enum('available','offline-copied','offline-ftp', 'offline-deleted') DEFAULT 'available',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `ticket-contents-id` mediumint(30) UNSIGNED DEFAULT '0',
  `file-key` varchar(44) DEFAULT '',
  `file-name` varchar(255) DEFAULT '',
  `file-path` varchar(255) DEFAULT '',
  `bytes` int(11) DEFAULT '0',
  `when` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`ticket-id`,`ticket-contents-id`,`file-key`(19),`state`,`typal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_tickets_contents` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` enum('from','sent','mantis') DEFAULT 'from',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `content-key` varchar(44) DEFAULT '',
  `by-id` int(11) DEFAULT '0',
  `by-uid` int(11) DEFAULT '0',
  `when` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`ticket-id`,`content-key`(24),`state`,`by-id`,`by-uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_tickets_ownership` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` enum('new','waiting','resonded','mantis','ignored','spam','allocated','claimed') DEFAULT 'new',
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `staff-id` int(18) UNSIGNED DEFAULT '0',
  `department-id` int(6) UNSIGNED DEFAULT '0',
  `when` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`ticket-id`,`state`,`staff-id`,`department-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_to` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
  `address-id` int(14) UNSIGNED DEFAULT '0',
  `name-id` int(14) UNSIGNED DEFAULT '0',
  `email-id` mediumint(30) UNSIGNED DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`address-id`,`name-id`,`email-id`,`ticket-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `please_wiki` (
  `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` enum('public','staff','historical') DEFAULT 'public',
  `department-id` int(6) UNSIGNED DEFAULT '0',
  `key` varchar(44) DEFAULT '',
  `subject` varchar(190),
  `description` varchar(350),
  `tags` varchar(255),
  `problems` longtext,
  `solution` longtext,
  `created` int(12) DEFAULT '0',
  `approved` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`key`(20),`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `please_wiki_keywords` (
  `id` int(18) UNSIGNED NOT NULL AUTO_INCREMENT,
  `wiki-id` mediumint(30) UNSIGNED DEFAULT '0',
  `keyword-id` int(20) UNSIGNED NOT NULL,
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `SEARCH` (`keyword-id`,`wiki-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


