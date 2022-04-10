<?
$eclass_version = '2.3';
$version = 2;
$encoding = 'UTF-8';
course_details('TMA100',	// Course code
	'greek',	// Language
	'fgh',	// Title
	'

',	// Description
	'Τμήμα 1',	// Faculty
	'2',	// Visible?
	'Διαχειριστής Πλατφόρμας',	// Professor
	'pre');	// Type
user('1', 'Πλατφόρμας', 'Διαχειριστής', 'drunkadmin', 'd0a3e4db2fe3dab2b2baf8dbc8688c6a', 'webmaster@localhost', '1', '', '', '1649579306', '1789579306');
query("DROP TABLE IF EXISTS `accueil`");
query("CREATE TABLE `accueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubrique` varchar(100) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  `admin` varchar(200) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `define_var` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8");
query("INSERT INTO `accueil` (`id`, `rubrique`, `lien`, `image`, `visible`, `admin`, `address`, `define_var`) VALUES
	('1', 'Ατζέντα', '../../modules/agenda/agenda.php', 'calendar', '1', '0', '', 'MODULE_ID_AGENDA'),
	('2', 'Σύνδεσμοι', '../../modules/link/link.php', 'links', '1', '0', '', 'MODULE_ID_LINKS'),
	('3', 'Έγγραφα', '../../modules/document/document.php', 'docs', '1', '0', '', 'MODULE_ID_DOCS'),
	('4', 'Βίντεο', '../../modules/video/video.php', 'videos', '0', '0', '', 'MODULE_ID_VIDEO'),
	('5', 'Εργασίες', '../../modules/work/work.php', 'assignments', '1', '0', '', 'MODULE_ID_ASSIGN'),
	('7', 'Ανακοινώσεις', '../../modules/announcements/announcements.php', 'announcements', '1', '0', '', 'MODULE_ID_ANNOUNCE'),
	('9', 'Περιοχές Συζητήσεων', '../../modules/phpbb/index.php', 'forum', '0', '0', '', 'MODULE_ID_FORUM'),
	('10', 'Ασκήσεις', '../../modules/exercice/exercice.php', 'exercise', '0', '0', '', 'MODULE_ID_EXERCISE'),
	('15', 'Ομάδες Χρηστών', '../../modules/group/group.php', 'groups', '0', '0', '', 'MODULE_ID_GROUPS'),
	('16', 'Ανταλλαγή Αρχείων', '../../modules/dropbox/index.php', 'dropbox', '0', '0', '', 'MODULE_ID_DROPBOX'),
	('19', 'Τηλεσυνεργασία', '../../modules/conference/conference.php', 'conference', '0', '0', '', 'MODULE_ID_CHAT'),
	('20', 'Περιγραφή Μαθήματος', '../../modules/course_description/', 'description', '1', '0', '', 'MODULE_ID_DESCRIPTION'),
	('21', 'Ερωτηματολόγια', '../../modules/questionnaire/questionnaire.php', 'questionnaire', '0', '0', '', 'MODULE_ID_QUESTIONNAIRE'),
	('23', 'Γραμμή Μάθησης', '../../modules/learnPath/learningPathList.php', 'lp', '0', '0', '', 'MODULE_ID_LP'),
	('25', 'Ενεργοποίηση Εργαλείων', '../../modules/course_tools/course_tools.php', 'tooladmin', '0', '1', '', 'MODULE_ID_TOOLADMIN'),
	('26', 'Σύστημα Wiki', '../../modules/wiki/wiki.php', 'wiki', '0', '0', '', 'MODULE_ID_WIKI'),
	('27', 'Θεματικές ενότητες μαθήματος', '../../modules/units/index.php', 'description', '2', '0', '', 'MODULE_ID_UNITS')
");
query("DROP TABLE IF EXISTS `action_types`");
query("CREATE TABLE `action_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
query("INSERT INTO `action_types` (`id`, `name`) VALUES
	('1', 'access'),
	('2', 'exit')
");
query("DROP TABLE IF EXISTS `actions`");
query("CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_type_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` int(11) NOT NULL DEFAULT '900',
  PRIMARY KEY (`id`),
  KEY `actionsindex` (`module_id`,`date_time`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8");
query("INSERT INTO `actions` (`id`, `user_id`, `module_id`, `action_type_id`, `date_time`, `duration`) VALUES
	('1', '1', '27', '1', '2022-04-10 09:46:46', '23'),
	('2', '1', '27', '1', '2022-04-10 09:47:09', '33'),
	('3', '1', '7', '1', '2022-04-10 09:47:42', '1'),
	('4', '1', '1', '1', '2022-04-10 09:47:43', '2'),
	('5', '1', '3', '1', '2022-04-10 09:47:45', '1'),
	('6', '1', '5', '1', '2022-04-10 09:47:46', '18'),
	('7', '1', '5', '1', '2022-04-10 09:48:04', '13'),
	('8', '1', '2', '1', '2022-04-10 09:48:17', '3'),
	('9', '1', '20', '1', '2022-04-10 09:48:20', '2'),
	('10', '1', '16', '1', '2022-04-10 09:48:22', '18'),
	('11', '1', '10', '1', '2022-04-10 09:48:40', '3'),
	('12', '1', '4', '1', '2022-04-10 09:48:43', '2'),
	('13', '1', '23', '1', '2022-04-10 09:48:45', '2'),
	('14', '1', '15', '1', '2022-04-10 09:48:47', '16'),
	('15', '1', '9', '1', '2022-04-10 09:49:03', '28'),
	('16', '1', '19', '1', '2022-04-10 09:49:31', '41'),
	('17', '1', '27', '2', '2022-04-10 09:50:12', '0'),
	('18', '0', '27', '1', '2022-04-10 11:55:13', '12'),
	('19', '0', '27', '2', '2022-04-10 11:55:25', '0'),
	('20', '0', '27', '1', '2022-04-10 11:55:55', '15'),
	('21', '0', '27', '2', '2022-04-10 11:56:10', '0'),
	('22', '0', '27', '2', '2022-04-10 11:56:17', '0'),
	('23', '0', '27', '2', '2022-04-10 11:56:28', '0'),
	('24', '0', '27', '2', '2022-04-10 11:56:34', '0'),
	('25', '0', '27', '2', '2022-04-10 11:56:41', '0'),
	('26', '0', '27', '2', '2022-04-10 11:57:35', '0'),
	('27', '1', '27', '2', '2022-04-10 11:57:42', '0'),
	('28', '1', '27', '1', '2022-04-10 11:57:53', '17'),
	('29', '1', '27', '1', '2022-04-10 11:58:10', '5'),
	('30', '1', '27', '2', '2022-04-10 11:58:15', '0')
");
query("INSERT INTO `actions` (`id`, `user_id`, `module_id`, `action_type_id`, `date_time`, `duration`) VALUES
	('31', '1', '27', '1', '2022-04-10 11:59:06', '4'),
	('32', '1', '7', '1', '2022-04-10 11:59:10', '2'),
	('33', '1', '27', '1', '2022-04-10 11:59:12', '115'),
	('34', '1', '27', '1', '2022-04-10 12:01:07', '19'),
	('35', '1', '27', '1', '2022-04-10 12:01:26', '9'),
	('36', '1', '27', '1', '2022-04-10 12:01:35', '25'),
	('37', '1', '7', '1', '2022-04-10 12:02:00', '3'),
	('38', '1', '27', '2', '2022-04-10 12:02:03', '0'),
	('39', '1', '27', '1', '2022-04-10 12:02:31', '7'),
	('40', '1', '27', '2', '2022-04-10 12:02:38', '0'),
	('41', '1', '27', '1', '2022-04-10 12:03:06', '3'),
	('42', '1', '27', '1', '2022-04-10 12:03:09', '385'),
	('43', '1', '27', '2', '2022-04-10 12:09:34', '0'),
	('44', '1', '27', '1', '2022-04-10 12:12:12', '2'),
	('45', '1', '7', '1', '2022-04-10 12:12:14', '1'),
	('46', '1', '1', '1', '2022-04-10 12:12:15', '1'),
	('47', '1', '3', '1', '2022-04-10 12:12:16', '1'),
	('48', '1', '5', '1', '2022-04-10 12:12:17', '6'),
	('49', '1', '20', '1', '2022-04-10 12:12:23', '1'),
	('50', '1', '2', '1', '2022-04-10 12:12:24', '3'),
	('51', '1', '16', '1', '2022-04-10 12:12:27', '1'),
	('52', '1', '10', '1', '2022-04-10 12:12:28', '1'),
	('53', '1', '4', '1', '2022-04-10 12:12:29', '2'),
	('54', '1', '23', '1', '2022-04-10 12:12:31', '1'),
	('55', '1', '16', '1', '2022-04-10 12:12:32', '1'),
	('56', '1', '9', '1', '2022-04-10 12:12:33', '125'),
	('57', '1', '27', '2', '2022-04-10 12:14:38', '0'),
	('58', '1', '27', '2', '2022-04-10 12:17:12', '0'),
	('59', '1', '27', '1', '2022-04-10 12:17:24', '28'),
	('60', '1', '27', '1', '2022-04-10 12:17:52', '5')
");
query("INSERT INTO `actions` (`id`, `user_id`, `module_id`, `action_type_id`, `date_time`, `duration`) VALUES
	('61', '1', '27', '1', '2022-04-10 12:17:57', '41'),
	('62', '1', '27', '2', '2022-04-10 12:18:38', '0'),
	('63', '1', '27', '1', '2022-04-10 12:19:40', '7'),
	('64', '1', '20', '1', '2022-04-10 12:19:47', '2'),
	('65', '1', '2', '1', '2022-04-10 12:19:49', '0'),
	('66', '1', '5', '1', '2022-04-10 12:19:49', '2'),
	('67', '1', '2', '1', '2022-04-10 12:19:51', '3'),
	('68', '1', '27', '2', '2022-04-10 12:19:54', '0')
");
query("DROP TABLE IF EXISTS `actions_summary`");
query("CREATE TABLE `actions_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `agenda`");
query("CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) DEFAULT NULL,
  `contenu` text,
  `day` date NOT NULL DEFAULT '0000-00-00',
  `hour` time NOT NULL DEFAULT '00:00:00',
  `lasting` varchar(20) DEFAULT NULL,
  `visibility` char(1) NOT NULL DEFAULT 'v',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `agenda` (`titre`,`contenu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `assignment_submit`");
query("CREATE TABLE `assignment_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `assignment_id` int(11) NOT NULL DEFAULT '0',
  `submission_date` date NOT NULL DEFAULT '0000-00-00',
  `submission_ip` varchar(16) NOT NULL DEFAULT '',
  `file_path` varchar(200) NOT NULL DEFAULT '',
  `file_name` varchar(200) NOT NULL DEFAULT '',
  `comments` text NOT NULL,
  `grade` varchar(50) NOT NULL DEFAULT '',
  `grade_comments` text NOT NULL,
  `grade_submission_date` date NOT NULL DEFAULT '0000-00-00',
  `grade_submission_ip` varchar(16) NOT NULL DEFAULT '',
  `group_id` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `assignments`");
query("CREATE TABLE `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `comments` text NOT NULL,
  `deadline` date NOT NULL DEFAULT '0000-00-00',
  `submission_date` date NOT NULL DEFAULT '0000-00-00',
  `active` char(1) NOT NULL DEFAULT '1',
  `secret_directory` varchar(30) NOT NULL,
  `group_submissions` char(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `catagories`");
query("CREATE TABLE `catagories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) DEFAULT NULL,
  `cat_order` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
query("INSERT INTO `catagories` (`cat_id`, `cat_title`, `cat_order`) VALUES
	('2', 'Αρχή', '')
");
query("DROP TABLE IF EXISTS `course_description`");
query("CREATE TABLE `course_description` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `upDate` datetime NOT NULL,
  UNIQUE KEY `id` (`id`),
  FULLTEXT KEY `course_description` (`title`,`content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `document`");
query("CREATE TABLE `document` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `filename` text,
  `visibility` char(1) NOT NULL DEFAULT 'v',
  `comment` varchar(255) DEFAULT NULL,
  `category` text,
  `title` text,
  `creator` text,
  `date` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `subject` text,
  `description` text,
  `author` text,
  `format` text,
  `language` text,
  `copyrighted` text,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `document` (`filename`,`comment`,`title`,`creator`,`subject`,`description`,`author`,`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_file`");
query("CREATE TABLE `dropbox_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uploaderId` int(11) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(250) NOT NULL DEFAULT '',
  `filesize` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) DEFAULT '',
  `description` varchar(250) DEFAULT '',
  `author` varchar(250) DEFAULT '',
  `uploadDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUploadDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UN_filename` (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_person`");
query("CREATE TABLE `dropbox_person` (
  `fileId` int(11) unsigned NOT NULL DEFAULT '0',
  `personId` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`,`personId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_post`");
query("CREATE TABLE `dropbox_post` (
  `fileId` int(11) unsigned NOT NULL DEFAULT '0',
  `recipientId` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`,`recipientId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercice_question`");
query("CREATE TABLE `exercice_question` (
  `question_id` int(11) NOT NULL DEFAULT '0',
  `exercice_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_id`,`exercice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercices`");
query("CREATE TABLE `exercices` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) DEFAULT NULL,
  `description` text,
  `type` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `TimeConstrain` int(11) DEFAULT '0',
  `AttemptsAllowed` int(11) DEFAULT '0',
  `random` smallint(6) NOT NULL DEFAULT '0',
  `active` tinyint(4) DEFAULT NULL,
  `results` tinyint(1) NOT NULL DEFAULT '1',
  `score` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `exercices` (`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercise_user_record`");
query("CREATE TABLE `exercise_user_record` (
  `eurid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` tinyint(4) NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `RecordStartDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `RecordEndDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TotalScore` int(11) NOT NULL DEFAULT '0',
  `TotalWeighting` int(11) DEFAULT '0',
  `attempt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eurid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `forums`");
query("CREATE TABLE `forums` (
  `forum_id` int(10) NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(150) DEFAULT NULL,
  `forum_desc` text,
  `forum_access` int(10) DEFAULT '1',
  `forum_moderator` int(10) DEFAULT NULL,
  `forum_topics` int(10) NOT NULL DEFAULT '0',
  `forum_posts` int(10) NOT NULL DEFAULT '0',
  `forum_last_post_id` int(10) NOT NULL DEFAULT '0',
  `cat_id` int(10) DEFAULT NULL,
  `forum_type` int(10) DEFAULT '0',
  PRIMARY KEY (`forum_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`),
  FULLTEXT KEY `forums` (`forum_name`,`forum_desc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `forums` (`forum_id`, `forum_name`, `forum_desc`, `forum_access`, `forum_moderator`, `forum_topics`, `forum_posts`, `forum_last_post_id`, `cat_id`, `forum_type`) VALUES
	('1', 'Γενικές συζητήσεις', 'Περιοχή συζητήσεων για κάθε θέμα που αφορά το μάθημα', '2', '1', '0', '0', '0', '2', '0')
");
query("DROP TABLE IF EXISTS `group_documents`");
query("CREATE TABLE `group_documents` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `group_properties`");
query("CREATE TABLE `group_properties` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `self_registration` tinyint(4) DEFAULT '1',
  `private` tinyint(4) DEFAULT '0',
  `forum` tinyint(4) DEFAULT '1',
  `document` tinyint(4) DEFAULT '1',
  `wiki` tinyint(4) DEFAULT '0',
  `agenda` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `group_properties` (`id`, `self_registration`, `private`, `forum`, `document`, `wiki`, `agenda`) VALUES
	('1', '1', '0', '1', '1', '0', '0')
");
query("DROP TABLE IF EXISTS `liens`");
query("CREATE TABLE `liens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `category` int(4) NOT NULL DEFAULT '0',
  `ordre` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `liens` (`url`,`titre`,`description`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `liens` (`id`, `url`, `titre`, `description`, `category`, `ordre`) VALUES
	('1', 'http://www.google.com', 'Google', 'Γρήγορη και Πανίσχυρη μηχανής αναζήτησης', '0', '0')
");
query("DROP TABLE IF EXISTS `link_categories`");
query("CREATE TABLE `link_categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) DEFAULT NULL,
  `description` text,
  `ordre` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `logins`");
query("CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` char(16) NOT NULL DEFAULT '0.0.0.0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8");
query("INSERT INTO `logins` (`id`, `user_id`, `ip`, `date_time`) VALUES
	('1', '1', '172.21.0.1', '2022-04-10 09:46:46'),
	('2', '1', '172.21.0.1', '2022-04-10 09:47:09'),
	('3', '0', '172.21.0.1', '2022-04-10 11:55:13'),
	('4', '0', '172.21.0.1', '2022-04-10 11:55:55'),
	('5', '1', '172.21.0.1', '2022-04-10 11:57:53'),
	('6', '1', '172.21.0.1', '2022-04-10 11:58:10'),
	('7', '1', '172.21.0.1', '2022-04-10 11:59:06'),
	('8', '1', '172.21.0.1', '2022-04-10 11:59:12'),
	('9', '1', '172.21.0.1', '2022-04-10 12:01:07'),
	('10', '1', '172.21.0.1', '2022-04-10 12:01:26'),
	('11', '1', '172.21.0.1', '2022-04-10 12:01:35'),
	('12', '1', '172.21.0.1', '2022-04-10 12:02:31'),
	('13', '1', '172.21.0.1', '2022-04-10 12:03:06'),
	('14', '1', '172.21.0.1', '2022-04-10 12:03:09'),
	('15', '1', '172.21.0.1', '2022-04-10 12:12:12'),
	('16', '1', '172.21.0.1', '2022-04-10 12:17:24'),
	('17', '1', '172.21.0.1', '2022-04-10 12:17:52'),
	('18', '1', '172.21.0.1', '2022-04-10 12:17:57'),
	('19', '1', '172.21.0.1', '2022-04-10 12:19:40')
");
query("DROP TABLE IF EXISTS `lp_asset`");
query("CREATE TABLE `lp_asset` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_learnPath`");
query("CREATE TABLE `lp_learnPath` (
  `learnPath_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `lock` enum('OPEN','CLOSE') NOT NULL DEFAULT 'OPEN',
  `visibility` enum('HIDE','SHOW') NOT NULL DEFAULT 'SHOW',
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`learnPath_id`),
  UNIQUE KEY `rank` (`rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_module`");
query("CREATE TABLE `lp_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `accessibility` enum('PRIVATE','PUBLIC') NOT NULL DEFAULT 'PRIVATE',
  `startAsset_id` int(11) NOT NULL DEFAULT '0',
  `contentType` enum('CLARODOC','DOCUMENT','EXERCISE','HANDMADE','SCORM','SCORM_ASSET','LABEL','COURSE_DESCRIPTION','LINK') NOT NULL,
  `launch_data` text NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_rel_learnPath_module`");
query("CREATE TABLE `lp_rel_learnPath_module` (
  `learnPath_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `learnPath_id` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `lock` enum('OPEN','CLOSE') NOT NULL DEFAULT 'OPEN',
  `visibility` enum('HIDE','SHOW') NOT NULL DEFAULT 'SHOW',
  `specificComment` text NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `raw_to_pass` tinyint(4) NOT NULL DEFAULT '50',
  PRIMARY KEY (`learnPath_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_user_module_progress`");
query("CREATE TABLE `lp_user_module_progress` (
  `user_module_progress_id` int(22) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL DEFAULT '0',
  `learnPath_module_id` int(11) NOT NULL DEFAULT '0',
  `learnPath_id` int(11) NOT NULL DEFAULT '0',
  `lesson_location` varchar(255) NOT NULL DEFAULT '',
  `lesson_status` enum('NOT ATTEMPTED','PASSED','FAILED','COMPLETED','BROWSED','INCOMPLETE','UNKNOWN') NOT NULL DEFAULT 'NOT ATTEMPTED',
  `entry` enum('AB-INITIO','RESUME','') NOT NULL DEFAULT 'AB-INITIO',
  `raw` tinyint(4) NOT NULL DEFAULT '-1',
  `scoreMin` tinyint(4) NOT NULL DEFAULT '-1',
  `scoreMax` tinyint(4) NOT NULL DEFAULT '-1',
  `total_time` varchar(13) NOT NULL DEFAULT '0000:00:00.00',
  `session_time` varchar(13) NOT NULL DEFAULT '0000:00:00.00',
  `suspend_data` text NOT NULL,
  `credit` enum('CREDIT','NO-CREDIT') NOT NULL DEFAULT 'NO-CREDIT',
  PRIMARY KEY (`user_module_progress_id`),
  KEY `optimize` (`user_id`,`learnPath_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `pages`");
query("CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll`");
query("CREATE TABLE `poll` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `course_id` varchar(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `creation_date` date NOT NULL DEFAULT '0000-00-00',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_answer_record`");
query("CREATE TABLE `poll_answer_record` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `answer_text` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `submit_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`arid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_question`");
query("CREATE TABLE `poll_question` (
  `pqid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  `qtype` enum('multiple','fill') NOT NULL,
  PRIMARY KEY (`pqid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_question_answer`");
query("CREATE TABLE `poll_question_answer` (
  `pqaid` int(11) NOT NULL AUTO_INCREMENT,
  `pqid` int(11) NOT NULL DEFAULT '0',
  `answer_text` text NOT NULL,
  PRIMARY KEY (`pqaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `posts`");
query("CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL DEFAULT '0',
  `forum_id` int(10) NOT NULL DEFAULT '0',
  `poster_id` int(10) NOT NULL DEFAULT '0',
  `post_time` varchar(20) DEFAULT NULL,
  `poster_ip` varchar(16) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `posts_text`");
query("CREATE TABLE `posts_text` (
  `post_id` int(10) NOT NULL DEFAULT '0',
  `post_text` text,
  PRIMARY KEY (`post_id`),
  FULLTEXT KEY `posts_text` (`post_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `questions`");
query("CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `description` text,
  `ponderation` float(11,2) DEFAULT NULL,
  `q_position` int(11) DEFAULT '1',
  `type` int(11) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `reponses`");
query("CREATE TABLE `reponses` (
  `id` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL DEFAULT '0',
  `reponse` text,
  `correct` int(11) DEFAULT NULL,
  `comment` text,
  `ponderation` float(5,2) DEFAULT NULL,
  `r_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `student_group`");
query("CREATE TABLE `student_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `tutor` int(11) DEFAULT NULL,
  `forumId` int(11) DEFAULT NULL,
  `maxStudent` int(11) NOT NULL DEFAULT '0',
  `secretDirectory` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey`");
query("CREATE TABLE `survey` (
  `sid` bigint(14) NOT NULL AUTO_INCREMENT,
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `course_id` varchar(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_answer`");
query("CREATE TABLE `survey_answer` (
  `aid` bigint(12) NOT NULL DEFAULT '0',
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sid` bigint(12) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_answer_record`");
query("CREATE TABLE `survey_answer_record` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` bigint(12) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  `question_answer` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`arid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_question`");
query("CREATE TABLE `survey_question` (
  `sqid` bigint(12) NOT NULL DEFAULT '0',
  `sid` bigint(12) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`sqid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_question_answer`");
query("CREATE TABLE `survey_question_answer` (
  `sqaid` int(11) NOT NULL AUTO_INCREMENT,
  `sqid` bigint(12) NOT NULL DEFAULT '0',
  `answer_text` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sqaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `topics`");
query("CREATE TABLE `topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(100) DEFAULT NULL,
  `topic_poster` int(10) DEFAULT NULL,
  `topic_time` varchar(20) DEFAULT NULL,
  `topic_views` int(10) NOT NULL DEFAULT '0',
  `topic_replies` int(10) NOT NULL DEFAULT '0',
  `topic_last_post_id` int(10) NOT NULL DEFAULT '0',
  `forum_id` int(10) NOT NULL DEFAULT '0',
  `topic_status` int(10) NOT NULL DEFAULT '0',
  `topic_notify` int(2) DEFAULT '0',
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_id` (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_last_post_id` (`topic_last_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `user_group`");
query("CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `role` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `users`");
query("CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `user_regdate` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_icq` varchar(15) DEFAULT NULL,
  `user_website` varchar(100) DEFAULT NULL,
  `user_occ` varchar(100) DEFAULT NULL,
  `user_from` varchar(100) DEFAULT NULL,
  `user_intrest` varchar(150) DEFAULT NULL,
  `user_sig` varchar(255) DEFAULT NULL,
  `user_viewemail` tinyint(2) DEFAULT NULL,
  `user_theme` int(10) DEFAULT NULL,
  `user_aim` varchar(18) DEFAULT NULL,
  `user_yim` varchar(25) DEFAULT NULL,
  `user_msnm` varchar(25) DEFAULT NULL,
  `user_posts` int(10) DEFAULT '0',
  `user_attachsig` int(2) DEFAULT '0',
  `user_desmile` int(2) DEFAULT '0',
  `user_html` int(2) DEFAULT '0',
  `user_bbcode` int(2) DEFAULT '0',
  `user_rank` int(10) DEFAULT '0',
  `user_level` int(10) DEFAULT '1',
  `user_lang` varchar(255) DEFAULT NULL,
  `user_actkey` varchar(32) DEFAULT NULL,
  `user_newpasswd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `users` (`user_id`, `username`, `user_regdate`, `user_password`, `user_email`, `user_icq`, `user_website`, `user_occ`, `user_from`, `user_intrest`, `user_sig`, `user_viewemail`, `user_theme`, `user_aim`, `user_yim`, `user_msnm`, `user_posts`, `user_attachsig`, `user_desmile`, `user_html`, `user_bbcode`, `user_rank`, `user_level`, `user_lang`, `user_actkey`, `user_newpasswd`) VALUES
	('1', 'Πλατφόρμας Διαχειριστής', '2022-04-10 09:46:32', 'password', 'webmaster@localhost', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '', '', ''),
	('-1', 'Ανώνυμος', '2022-04-10 09:46:32', 'password', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '', '', '')
");
query("DROP TABLE IF EXISTS `video`");
query("CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  `creator` varchar(200) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `video` (`url`,`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `videolinks`");
query("CREATE TABLE `videolinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  `creator` varchar(200) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `videolinks` (`url`,`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_acls`");
query("CREATE TABLE `wiki_acls` (
  `wiki_id` int(11) unsigned NOT NULL,
  `flag` varchar(255) NOT NULL,
  `value` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_pages`");
query("CREATE TABLE `wiki_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wiki_id` int(11) unsigned NOT NULL DEFAULT '0',
  `owner_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `ctime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_version` int(11) unsigned NOT NULL DEFAULT '0',
  `last_mtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_pages_content`");
query("CREATE TABLE `wiki_pages_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `mtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_properties`");
query("CREATE TABLE `wiki_properties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `group_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>
