-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: mysql-shared-02.phpfog.com
-- Generation Time: Nov 14, 2012 at 07:09 AM
-- Server version: 5.5.27-log
-- PHP Version: 5.3.2-1ubuntu4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `idealposts_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `adminID` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `mpass` varchar(255) NOT NULL DEFAULT '',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminID`, `username`, `mpass`, `lastlogin`) VALUES
(1, 'admin', '9674b261f8bfea470edb13b5ccc5e9b2', '2012-11-14 06:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `inettuts`
--

CREATE TABLE IF NOT EXISTS `inettuts` (
  `user_id` varchar(50) NOT NULL,
  `config` longtext NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inettuts`
--

INSERT INTO `inettuts` (`user_id`, `config`) VALUES
('1', 'widget5,color-white,Idea #5,not-collapsed,<div align="center"><p>New Idea</p></div>;widget1,color-white,Idea #1,not-collapsed,<div align="center"><p>New Idea</p></div>|widget3,color-red,Idea #3,not-collapsed,<div align="center"><p>New Idea</p></div>|widget2,color-white,Idea #2,not-collapsed,<div align="center"><p>New Idea</p></div>;widget4,color-yellow,Idea #4,not-collapsed,<div align="center"><p>New Idea</p></div>'),
('4', 'widget1,color-white,widget 1,collapsed,<div align="center"><p>New Widget</p></div>;widget4,color-red,widget 4,not-collapsed,<div align="center"><p>New Widget</p></div>|widget2,color-yellow,widget 2,collapsed,<div align="center"><p>New Widget</p></div>;widget5,color-red,widget 5,collapsed,<div align="center"><p>New Widget</p></div>|widget3,color-red,widget 3,not-collapsed,<div align="center"><p>New Widget</p></div>'),
('0', ' widget1,color-yellow,Title 1,not-collapsed,I|widget1,color-red,widget 1,not-collapsed,<div align="center"><p>New Widget</p></div>|widget2,color-red,widget 2,not-collapsed,<div align="center"><p>New Widget</p></div>'),
('6', 'widget1,color-yellow,my first widget,not-collapsed,This is my first widget....;widget5,color-red,Blog Planner Testing,not-collapsed,First Issue is single quote is not working in it.|widget3,color-green,Blog Planner Widget 1,not-collapsed,Add New Widget and new should should come in the first column.;widget2,color-white,Blog Planer task 2,not-collapsed,Add registration in Blog Planner.;widget4,color-green,Blog Planner task 3,not-collapsed,Description should be editable....|'),
('8', 'widget2,color-green,widget 2,not-collapsed,<div align="center"><p>New Widget</p></div>|widget3,color-red,widget 3,not-collapsed,<div align="center"><p>New Widget</p></div>|widget1,color-red,widget 1,not-collapsed,<div align="center"><p>New Widget</p></div>'),
('9', 'widget18,color-white,widget 18,collapsed,<div align="center"><p>New Idea</p></div>;widget5,color-yellow,10 Ways To Become A Better Reader,collapsed,Simple tips on how to read more.|widget14,color-white,widget 14,collapsed,<div align="center"><p>New Idea</p></div>;widget15,color-white,widget 15,collapsed,<div align="center"><p>New Idea</p></div>;widget13,color-red,widget 13,collapsed,<div align="center"><p>New Idea</p></div>;widget11,color-white,widget 11,collapsed,<div align="center"><p>New Idea</p></div>;widget10,color-green,widget 10,collapsed,<div align="center"><p>New Idea</p></div>;widget6,color-white,widget 6,collapsed,<div align="center"><p>New Idea</p></div>;widget7,color-white,widget 7,collapsed,<div align="center"><p>New Idea</p></div>;widget8,color-white,widget 8,collapsed,<div align="center"><p>New Idea</p></div>;widget9,color-white,widget 9,collapsed,<div align="center"><p>New Idea</p></div>;widget1,color-white,widget 1,collapsed,<div align="center"><p>New Idea</p></div>|widget4,color-white,10 New Textures for your designs,collapsed,<div align="center"><p>New Widget</p></div>;widget17,color-white,widget 17,collapsed,<div align="center"><p>New Idea</p></div>;widget21,color-white,widget 21,collapsed,<div align="center"><p>New Idea</p></div>;widget16,color-white,widget 16,collapsed,<div align="center"><p>New Idea</p></div>;widget2,color-white,widget 2,not-collapsed,<div align="center"><p>New Idea</p></div>;widget20,color-white,widget 20,collapsed,<div align="center"><p>New Idea</p></div>;widget3,color-white,widget 3,collapsed,<div align="center"><p>New Idea</p></div>;widget19,color-white,widget 19,collapsed,<div align="center"><p>New Idea</p></div>;widget12,color-white,widget 12,collapsed,<div align="center"><p>New Idea</p></div>'),
('10', 'widget18,color-white,How to Set Your Facebook Privacy,collapsed,A post on how to update your Facebook settings. http://zesty.ca/facebook/ is the tool I used.;widget15,color-yellow,Ideas for Website Goals,not-collapsed,A list post about goals you can set for your church website.;widget3,color-white,Updated Twitter List of Tools,collapsed,Best Twitter tools we can find online.;widget17,color-white,Developing Your Website Vision,collapsed,A post about developing your vision and overall mission for your website.;widget22,color-white,To-Do Lists,collapsed,Simple Daily to Do Lists;widget6,color-white,Review: PHP Fog,collapsed,Review of PHPFog;widget20,color-white,Getting Started With Git,collapsed,An article about how to get started working with Git;widget10,color-white,Setting Up a Server Guide Part 2: Picking Out Your Hardware,collapsed,Web Server Setup Guide - Part 2: A detailed review of what you can use to setup your server.;widget19,color-white,Facebook Lists and How to Use Them,collapsed,Creating and using Facebook lists.;widget4,color-white,Developing Your Online Church Presence,collapsed,Tips on how to manage your church;widget12,color-white,Church Internet Policy,collapsed,Churches need to protect their pastors;widget8,color-white,eBook - Wordpress For Churches,collapsed,eBook idea - Wordpress for Churches;widget1,color-white,Interviews w/ Church Web Companines,collapsed,Interview some of the top church website providers that we look up to. *ChurchMedia.cc *Check with current advertisers.;widget11,color-white,Installing and Setting Up Ubuntu,collapsed,Web Server Setup Guide - Part 3: How to install Ubuntu Server||widget16,color-white,Creating SMART Goals,collapsed,Blog post about creating SMART goals for your church website.;widget23,color-white,Focus at work saves family time.,collapsed,Focusing on the task throughout the day helps me focus on work.;widget5,color-white,6 Responsive Web Design Tools,collapsed,List post of responsive web design frameworks and tools.;widget21,color-white,mySQL Issues,collapsed,Article on fixing your SQL Issues.;widget9,color-white,Server Setup Guide Part 1: 10 Things You Need,collapsed,List post of 10 simple things you need to start  your web server project.;widget7,color-white,Why I Started Running,collapsed,Need to take a break? Running helps clear the mind;widget14,color-white,Why I Killed Search,collapsed,A few thoughts on our test about killing the search widget.;widget13,color-white,Church Website Themes,collapsed,List Post - Church Website Themes'),
('11', 'widget1,color-red,test idea,not-collapsed,Test||'),
('12', '||widget1,color-white,oh yeah,not-collapsed,tightas\ndf\nasf\nsadf\nsdfasfajsd\nfkdasjfl;ajsdf ;lasdjf; laksjfl;asfkjasl kf; jaslk;fas jfl;kasjfl;kajsfk;llj'),
('13', 'widget7,color-white,Email a Client Back,not-collapsed,Email a client back within 24 hours. It goes a long way to help.;widget6,color-white,Customer Service,not-collapsed,This is hard[-COMMA-] I tend to think I am not very good at it.;widget4,color-white,How to Handle Clients,not-collapsed,Handling clients[-COMMA-] customer service[-COMMA-] etc.;widget3,color-white,Forming Your Business,not-collapsed,The messy legal stuff.;widget2,color-white,Finding your rate,not-collapsed,Create a simple guide to developing your base rate.;widget1,color-white,Getting Your First Clients,not-collapsed,How to get your first clients. Elance[-COMMA-] friends[-COMMA-] etc.||widget5,color-white,Why The Time = Money Model Is No Good,collapsed,My thoughts on the time=money model.;widget8,color-white,My Auto Responder,not-collapsed,Why I use an auto responder.'),
('20', 'widget1,color-red,Review Idea Posts,not-collapsed,http://ideaposts.com/||'),
('17', '||'),
('22', 'widget1,color-red,Flipa Research ,not-collapsed,Due 7/14/12 : Research on all current selling sites ENDING SOON/MOST <a in_rurl="http://www.textsrv.com/click?v=VVM6MTMxNTk6NDphY3RpdmU6YjE0N2Q0ZmUyMWY3ZDk3MjU1MWI2MTRiMDcwZTNkMjA6ei0yMS0zMzkyOTp3d3cuaWRlYWxwb3N0cy5jb20=" href="#" style="text-decoration:underline" id="_GPLITA_0" title="Powered by Text-Enhance">ACTIVE</a> CATEGORIES||'),
('24', 'widget34,color-white,What happens to 401(k) at retirement?,collapsed,<div align="center"><p>New Idea</p></div>;widget33,color-white,Financial planning value - Gamma,collapsed,Kitces blog post 11/12/12;widget32,color-white,New 529 plans in WI,collapsed,<div align="center"><p>New Idea</p></div>;widget31,color-white,Invest in relationship before retirement,collapsed,Greatest destroyer of wealth is divorce;widget30,color-white,Collaborative divorce,collapsed,<div align="center"><p>New Idea</p></div>;widget24,color-white,Harvest Gains,collapsed,<div align="center"><p>New Idea</p></div>;widget28,color-white,Disability Insurance,collapsed,<div align="center"><p>New Idea</p></div>;widget27,color-white,Umbrella Insurance,collapsed,<div align="center"><p>New Idea</p></div>;widget25,color-white,Checking Social Security online,collapsed,<div align="center"><p>New Idea</p></div>;widget23,color-white,Car Battery Example,collapsed,Wouldn;widget22,color-white,Duties of executor of estate,collapsed,Patch idea - comment;widget20,color-white,When to sell your home,collapsed,<div align="center"><p>New Idea</p></div>;widget16,color-white,Credit card for points?,collapsed,<div align="center"><p>New Idea</p></div>;widget12,color-white,Anchoring,collapsed,UGA Frat Row - crossfit;widget11,color-white,Illusory superiority,collapsed,http://en.wikipedia.org/wiki/Illusory_superiority;widget10,color-white,Index vs. Active Management,collapsed,<div align="center"><p>New Idea</p></div>;widget9,color-white,Organ Donation,collapsed,<div align="center"><p>New Idea</p></div>;widget5,color-white,Unique dates in Milwaukee,collapsed,Splash Studios\n?\n?;widget3,color-white,Tenants of Investing,collapsed,Points from "The Investment Answer";widget2,color-white,Practice retirement,collapsed,Try retirement before actually retiring||widget1,color-white,Making an artist out of a financial planner,not-collapsed,Splash Studio;widget29,color-white,What is "wealthy"?,not-collapsed,<div align="center"><p>New Idea</p></div>;widget26,color-white,Non-deductible IRA and conversion,not-collapsed,<div align="center"><p>New Idea</p></div>;widget7,color-white,Are annuities all bad?,not-collapsed,<div align="center"><p>New Idea</p></div>;widget14,color-white,Plaeo - savings,not-collapsed,Small changes;widget19,color-white,Becoming a landlord,not-collapsed,<div align="center"><p>New Idea</p></div>;widget18,color-white,401(k) to start C-corp business,not-collapsed,Came from Patch blog comment: Craig;widget21,color-white,Money Scripts,not-collapsed,Debt is bad\nPoor are lazy;widget4,color-white,Check up on your investment advisor,not-collapsed,SEC/FINRA/BrightScope/Broker Check;widget13,color-white,Roth 401k and Roth IRA?,not-collapsed,Can contribute to both?;widget15,color-white,Marathon,not-collapsed,<div align="center"><p>New Idea</p></div>;widget6,color-white,Investment Choices in 401(k),not-collapsed,<div align="center"><p>New Idea</p></div>;widget17,color-white,Paying off mortgage or invest,not-collapsed,<div align="center"><p>New Idea</p></div>;widget8,color-white,If a Will and Benenficiary Designations fight[-COMMA-] who wins?,not-collapsed,<div align="center"><p>New Idea</p></div>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `blog_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `user_name`, `password`, `active`, `blog_name`) VALUES
(1, 'ybtashfeen@gmail.com', 'ybtashfeen', 'b4af804009cb036a4ccdc33431ef9ac9', 1, ''),
(13, 'jesse.orndorff@gmail.com', 'freelanceidea', '9674b261f8bfea470edb13b5ccc5e9b2', 1, ''),
(6, 'salman.shafiq@gmail.com', 'salmanshafiq', '0a8096b992f9a5567242a1ef27b39b88', 1, ''),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, ''),
(12, 'johnsaddington@gmail.com', 'tentblogger', '18b8711c5f5d5ba427709a8b3cc79758', 1, ''),
(9, 'jesse@jesseorndorff.com', 'jlorndorff', '9674b261f8bfea470edb13b5ccc5e9b2', 1, ''),
(10, 'jesse@getbearded.com', 'jesseorndorff', '9674b261f8bfea470edb13b5ccc5e9b2', 1, 'Church Website Ideas'),
(11, 'tyler@tylersmithmusic.com', 'Tyler Smith', '7cf448e5f052c56da4bbfa06bded2c32', 1, ''),
(14, 'admin@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 1, 'test'),
(15, 'jesse@freelanceideas.com', 'freelanceideas', '9674b261f8bfea470edb13b5ccc5e9b2', 1, 'Freelance Ideas'),
(16, 'triple7allstar@gmail.com', 'TylerSmithYourMomsPimp', '7cf448e5f052c56da4bbfa06bded2c32', 1, 'www.tylersmithmusic.com'),
(17, 'jesse@thelee.org', 'jesseleeorndorff', '9674b261f8bfea470edb13b5ccc5e9b2', 1, 'Sample Blog'),
(20, 'maguay@techinch.com', 'maguay', '3f1082c7dca3556767601affe4bdd659', 1, 'AppStorm'),
(21, 'test@thisisit.com', 'lasttest', '9674b261f8bfea470edb13b5ccc5e9b2', 1, 'The Final Test'),
(22, 'aliseherrera@gmail.com', 'alize2406', 'f3b06df5a3450b26d85392914dc1c83b', 1, 'Flipex Sites'),
(23, 'nqflpo@mdvgng.com', 'hkrhyfpj', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'hkrhyfpj'),
(24, 'alan@serenityfc.com', 'serenityfc', 'cfd3eb8f4c5a0032912593b165ed0876', 1, 'Serenity Financial Consulting');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
