-- MySQL dump 10.13  Distrib 5.5.23, for Linux (x86_64)
--
-- Host: localhost    Database: ideal_app_live
-- ------------------------------------------------------
-- Server version	5.5.23-55

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminlogin` (
  `adminID` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `mpass` varchar(255) NOT NULL DEFAULT '',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlogin`
--

LOCK TABLES `adminlogin` WRITE;
/*!40000 ALTER TABLE `adminlogin` DISABLE KEYS */;
INSERT INTO `adminlogin` (`adminID`, `username`, `mpass`, `lastlogin`) VALUES (1,'admin','9674b261f8bfea470edb13b5ccc5e9b2','2012-06-21 23:28:12');
/*!40000 ALTER TABLE `adminlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inettuts`
--

DROP TABLE IF EXISTS `inettuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inettuts` (
  `user_id` varchar(50) NOT NULL,
  `config` longtext NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inettuts`
--

LOCK TABLES `inettuts` WRITE;
/*!40000 ALTER TABLE `inettuts` DISABLE KEYS */;
INSERT INTO `inettuts` (`user_id`, `config`) VALUES ('1','widget5,color-white,Idea #5,not-collapsed,<div align=\"center\"><p>New Idea</p></div>;widget1,color-white,Idea #1,not-collapsed,<div align=\"center\"><p>New Idea</p></div>|widget3,color-red,Idea #3,not-collapsed,<div align=\"center\"><p>New Idea</p></div>|widget2,color-white,Idea #2,not-collapsed,<div align=\"center\"><p>New Idea</p></div>;widget4,color-yellow,Idea #4,not-collapsed,<div align=\"center\"><p>New Idea</p></div>'),('4','widget1,color-white,widget 1,collapsed,<div align=\"center\"><p>New Widget</p></div>;widget4,color-red,widget 4,not-collapsed,<div align=\"center\"><p>New Widget</p></div>|widget2,color-yellow,widget 2,collapsed,<div align=\"center\"><p>New Widget</p></div>;widget5,color-red,widget 5,collapsed,<div align=\"center\"><p>New Widget</p></div>|widget3,color-red,widget 3,not-collapsed,<div align=\"center\"><p>New Widget</p></div>'),('0',' widget1,color-yellow,Title 1,not-collapsed,I|widget1,color-red,widget 1,not-collapsed,<div align=\"center\"><p>New Widget</p></div>|widget2,color-red,widget 2,not-collapsed,<div align=\"center\"><p>New Widget</p></div>'),('6','widget1,color-yellow,my first widget,not-collapsed,This is my first widget....;widget5,color-red,Blog Planner Testing,not-collapsed,First Issue is single quote is not working in it.|widget3,color-green,Blog Planner Widget 1,not-collapsed,Add New Widget and new should should come in the first column.;widget2,color-white,Blog Planer task 2,not-collapsed,Add registration in Blog Planner.;widget4,color-green,Blog Planner task 3,not-collapsed,Description should be editable....|'),('8','widget2,color-green,widget 2,not-collapsed,<div align=\"center\"><p>New Widget</p></div>|widget3,color-red,widget 3,not-collapsed,<div align=\"center\"><p>New Widget</p></div>|widget1,color-red,widget 1,not-collapsed,<div align=\"center\"><p>New Widget</p></div>'),('9','widget18,color-white,widget 18,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget5,color-yellow,10 Ways To Become A Better Reader,collapsed,Simple tips on how to read more.|widget14,color-white,widget 14,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget15,color-white,widget 15,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget13,color-red,widget 13,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget11,color-white,widget 11,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget10,color-green,widget 10,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget6,color-white,widget 6,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget7,color-white,widget 7,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget8,color-white,widget 8,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget9,color-white,widget 9,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget1,color-white,widget 1,collapsed,<div align=\"center\"><p>New Idea</p></div>|widget4,color-white,10 New Textures for your designs,collapsed,<div align=\"center\"><p>New Widget</p></div>;widget17,color-white,widget 17,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget21,color-white,widget 21,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget16,color-white,widget 16,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget2,color-white,widget 2,not-collapsed,<div align=\"center\"><p>New Idea</p></div>;widget20,color-white,widget 20,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget3,color-white,widget 3,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget19,color-white,widget 19,collapsed,<div align=\"center\"><p>New Idea</p></div>;widget12,color-white,widget 12,collapsed,<div align=\"center\"><p>New Idea</p></div>'),('10','widget20,color-white,Getting Started With Git,collapsed,An article about how to get started working with Git;widget10,color-white,Setting Up a Server Guide Part 2: Picking Out Your Hardware,collapsed,Web Server Setup Guide - Part 2: A detailed review of what you can use to setup your server.;widget19,color-white,Facebook Lists and How to Use Them,collapsed,Creating and using Facebook lists.;widget4,color-white,Developing Your Online Church Presence,collapsed,Tips on how to manage your church;widget12,color-white,Church Internet Policy,collapsed,Churches need to protect their pastors;widget8,color-white,eBook - Wordpress For Churches,collapsed,eBook idea - Wordpress for Churches;widget1,color-white,Interviews w/ Church Web Companines,collapsed,Interview some of the top church website providers that we look up to. *ChurchMedia.cc *Check with current advertisers.;widget2,color-white,Best Church Sites of 2011,collapsed,Complie a list of the best sites for 2011.;widget11,color-white,Installing and Setting Up Ubuntu,collapsed,Web Server Setup Guide - Part 3: How to install Ubuntu Server|widget3,color-white,Updated Twitter List of Tools,collapsed,Best Twitter tools we can find online.;widget17,color-white,Developing Your Website Vision,collapsed,A post about developing your vision and overall mission for your website.;widget15,color-yellow,Ideas for Website Goals,collapsed,A list post about goals you can set for your church website.;widget18,color-green,How to Set Your Facebook Privacy,collapsed,A post on how to update your Facebook settings. http://zesty.ca/facebook/ is the tool I used.|widget16,color-white,Creating SMART Goals,collapsed,Blog post about creating SMART goals for your church website.;widget5,color-white,6 Responsive Web Design Tools,collapsed,List post of responsive web design frameworks and tools.;widget21,color-white,mySQL Issues,collapsed,Article on fixing your SQL Issues.;widget9,color-white,Server Setup Guide Part 1: 10 Things You Need,collapsed,List post of 10 simple things you need to start  your web server project.;widget7,color-white,Why I Started Running,collapsed,Need to take a break? Running helps clear the mind;widget14,color-white,Why I Killed Search,collapsed,A few thoughts on our test about killing the search widget.;widget13,color-white,Church Website Themes,collapsed,List Post - Church Website Themes'),('11','widget1,color-red,test idea,not-collapsed,Test||'),('12','||widget1,color-white,oh yeah,not-collapsed,tightas\ndf\nasf\nsadf\nsdfasfajsd\nfkdasjfl;ajsdf ;lasdjf; laksjfl;asfkjasl kf; jaslk;fas jfl;kasjfl;kajsfk;llj'),('13','widget7,color-white,Email a Client Back,not-collapsed,Email a client back within 24 hours. It goes a long way to help.;widget6,color-white,Customer Service,not-collapsed,This is hard[-COMMA-] I tend to think I am not very good at it.;widget4,color-white,How to Handle Clients,not-collapsed,Handling clients[-COMMA-] customer service[-COMMA-] etc.;widget3,color-white,Forming Your Business,not-collapsed,The messy legal stuff.;widget2,color-white,Finding your rate,not-collapsed,Create a simple guide to developing your base rate.;widget1,color-white,Getting Your First Clients,not-collapsed,How to get your first clients. Elance[-COMMA-] friends[-COMMA-] etc.||widget5,color-white,Why The Time = Money Model Is No Good,collapsed,My thoughts on the time=money model.;widget8,color-white,My Auto Responder,not-collapsed,Why I use an auto responder.'),('20','widget1,color-red,Review Idea Posts,not-collapsed,http://ideaposts.com/||'),('17','||');
/*!40000 ALTER TABLE `inettuts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `blog_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `user_name`, `password`, `active`, `blog_name`) VALUES (1,'ybtashfeen@gmail.com','ybtashfeen','b4af804009cb036a4ccdc33431ef9ac9',1,''),(13,'jesse.orndorff@gmail.com','freelanceidea','9674b261f8bfea470edb13b5ccc5e9b2',1,''),(6,'salman.shafiq@gmail.com','salmanshafiq','0a8096b992f9a5567242a1ef27b39b88',1,''),(7,'','','d41d8cd98f00b204e9800998ecf8427e',1,''),(12,'johnsaddington@gmail.com','tentblogger','18b8711c5f5d5ba427709a8b3cc79758',1,''),(9,'jesse@jesseorndorff.com','jlorndorff','9674b261f8bfea470edb13b5ccc5e9b2',1,''),(10,'jesse@getbearded.com','jesseorndorff','9674b261f8bfea470edb13b5ccc5e9b2',1,'Church Website Ideas'),(11,'tyler@tylersmithmusic.com','Tyler Smith','7cf448e5f052c56da4bbfa06bded2c32',1,''),(14,'admin@test.com','test','098f6bcd4621d373cade4e832627b4f6',1,'test'),(15,'jesse@freelanceideas.com','freelanceideas','9674b261f8bfea470edb13b5ccc5e9b2',1,'Freelance Ideas'),(16,'triple7allstar@gmail.com','TylerSmithYourMomsPimp','7cf448e5f052c56da4bbfa06bded2c32',1,'www.tylersmithmusic.com'),(17,'jesse@thelee.org','jesseleeorndorff','9674b261f8bfea470edb13b5ccc5e9b2',1,'Sample Blog'),(20,'maguay@techinch.com','maguay','3f1082c7dca3556767601affe4bdd659',1,'AppStorm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ideal_app_live'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-26 14:36:26
