-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 12:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp_tbl`
--

CREATE TABLE `otp_tbl` (
  `otp_id` int(40) NOT NULL,
  `login_id` int(40) NOT NULL,
  `otp` int(40) NOT NULL,
  `otp_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_tbl`
--

INSERT INTO `otp_tbl` (`otp_id`, `login_id`, `otp`, `otp_time`) VALUES
(18, 15, 517064, ''),
(19, 9, 781739, ''),
(20, 9, 863535, ''),
(21, 15, 715350, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapters`
--

CREATE TABLE `tbl_chapters` (
  `ch_id` int(11) NOT NULL,
  `ch_num` int(11) NOT NULL,
  `ch_name` varchar(100) NOT NULL,
  `ch_desc` varchar(500) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chapters`
--

INSERT INTO `tbl_chapters` (`ch_id`, `ch_num`, `ch_name`, `ch_desc`, `cl_id`, `cor_id`, `active`) VALUES
(1, 1, 'The Basics', 'Intro to Android, Why develop apps\r\nfor Android?, Flavors of Android operating\r\nsystems, Challenges of developing for Android\r\n(multiple OS, need backwards compatibility, need\r\nto consider performance and offline capability) ', 4, 5, 1),
(2, 1, 'Introduction', ' Concept of WWW, Internet and WWW, HTTP Protocol :\r\nRequest and Response, Web browser and Web servers, Features of Web\r\n2.0', 4, 3, 1),
(3, 2, 'User Interface', 'Getting user input , Changing\r\nkeyboards , Buttons , Dialogs and pickers , Spinners,\r\ncheckboxes, and radio buttons , Gestures , Speech\r\nrecognition (not done), Sensors (not done) ', 4, 5, 1),
(4, 2, 'Web Design', 'Concepts of effective web design, Web design issues\r\nincluding Browser, Bandwidth and Cache, Display resolution, Look and\r\nFeel of the Website, Page Layout and linking, User centric design,\r\nSitemap, Planning and publishing website, Designing effective\r\nnavigation', 4, 3, 1),
(5, 3, 'HTML', 'Basics of HTML, formatting and fonts, commenting code,\r\ncolor, hyperlink, lists, tables, images, forms, XHTML, Meta tags,\r\nCharacter entities, frames and frame sets, Browser architecture and Web\r\nsite structure. Overview and features of HTML5\r\n', 4, 3, 1),
(6, 4, 'Style sheets ', 'Need for CSS, introduction to CSS, basic syntax and\r\nstructure, using CSS, background images, colors and properties,\r\nmanipulating texts, using fonts, borders and boxes, margins, padding\r\nlists, positioning using CSS, CSS2, Overview and features of CSS3', 4, 3, 1),
(7, 3, 'Background Task', 'Synchronous versus async tasks, What is the UI thread and\r\nwhen should you use it? , Example of a background task --\r\nretrieving data over the internet, Creating background tasks.\r\n(schedule, send data, etc.) , Implementing AsyncTask\r\n(doInBackground(), callbacks) , Limitations of AsyncTask ,\r\nPassing info to background tasks, Initiating background\r\ntasks, Scheduling background tasks (intro only, more later)', 4, 5, 1),
(8, 4, 'Databse', 'Internal versus external storage,\r\nPrivacy, sharing, security, encryption of your data , Shared\r\nPreferences: Store private primitive data in key-value pairs\r\n, SQLite Databases: Store structured data in a private\r\ndatabase , Store data on the web with your own network\r\nserver, Firebase for storing and sharing data in the cloud,\r\nConcept: Preferences , What are Settings and Preferences?', 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cir`
--

CREATE TABLE `tbl_cir` (
  `ci_id` int(11) NOT NULL,
  `ci_name` varchar(100) NOT NULL,
  `ci_desc` varchar(400) NOT NULL,
  `ci_date` date NOT NULL,
  `ci_url` varchar(60) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cir`
--

INSERT INTO `tbl_cir` (`ci_id`, `ci_name`, `ci_desc`, `ci_date`, `ci_url`, `cl_id`, `valid`) VALUES
(1, 'ci_test', 'ci_test', '2019-03-30', 'circular/924408_155398693131032019_60846.pdf', 0, 1),
(2, 'test2', 'test2', '2019-03-30', 'circular/924408_155398693131032019_60846.pdf', 4, 1),
(3, 'test3', 'test3d', '2019-03-31', 'circular/817116_155398845131032019_20952.pdf', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `cl_id` int(11) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `cl_eid` varchar(60) NOT NULL,
  `cl_lmark` varchar(100) NOT NULL,
  `cl_addr` varchar(200) NOT NULL,
  `cl_pin` int(11) NOT NULL,
  `cl_city` varchar(40) NOT NULL,
  `cl_state` varchar(70) NOT NULL,
  `cl_phno` bigint(20) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`cl_id`, `cl_name`, `cl_eid`, `cl_lmark`, `cl_addr`, `cl_pin`, `cl_city`, `cl_state`, `cl_phno`, `active`) VALUES
(3, 'Retract Classes', 'info@retract.com', 'Vastrapur Lake', '503,Roman Block, Nr. Vastrapur Lake, Ahmedabad', 380013, 'Ahmedabad', 'Gujarat', 8547596587, 0),
(4, 'WebPro', 'info@webpro.com', 'H.L College', '403, Himaliya Tower, Nr. H.L College, Ahmedabad', 380015, 'Ahmedabad', 'Gujarat', 8573261490, 1),
(5, 'Lead Learning', 'noreply@leadlearning.com', 'Iskon Temple', '315, Rotak Building, Nr. Iskon Temple, Ahmedabad', 380013, 'Ahmedabad', 'Gujarat', 9614720154, 1),
(6, 'NIUT', 'info@niut.co.in', 'University Road', 'NIUT, Gulbai Tekra Road, Nr. University Rad, Ahmedabad', 380015, 'Ahmedabad', 'Gujarat', 7373737323, 1),
(7, 'Abtech', 'info@abtech.com', 'Himalya Mall', '501, Motor Complex, Nr. Himaliya Mall, Ahmdabad', 380015, 'Ahmedabad', 'Gujarat', 9471023475, 1),
(8, 'K.R Institute', 'ahm.info@krinstitute.com', 'Maninagar', 'K.R Institute, Nr. Maninagar Cross Road, Ahmedabad', 380015, 'Ahmedabad', 'Gujarat', 6571032485, 1),
(9, 'J.K Learnings', 'info@jklearnings.com', 'Thaltej', '12, Jen Complex, Nr. Zydus Hospital, Ahmedabad', 380013, 'Ahmedabad', 'Gujarat', 8654345437, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `cor_id` int(11) NOT NULL,
  `cor_name` varchar(100) NOT NULL,
  `cor_fee` double(8,2) NOT NULL,
  `cor_desc` varchar(500) NOT NULL,
  `cor_days` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`cor_id`, `cor_name`, `cor_fee`, `cor_desc`, `cor_days`, `cl_id`, `active`) VALUES
(1, 'PHP + MySQL', 9990.00, 'PHP: Hypertext Preprocessor is a general-purpose programming language originally designed for web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.', 54, 1, 0),
(2, '.Net', 8787.34, 'The .NET framework is a software development framework from Microsoft. It provides a controlled programming environment where software can be developed, installed and executed on Windows-based operating systems.', 74, 1, 1),
(3, 'PHP', 8500.00, 'PHP: Hypertext Preprocessor is a general-purpose programming language originally designed for web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.', 30, 4, 1),
(4, 'Python Learning', 12070.00, 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python has a design philosophy that emphasizes code readability, notably using significant whitespace. It provides constructs that enable clear programming on both small and large scales.', 44, 1, 1),
(5, 'Android Development', 15000.00, 'Android (operating system) Android is a mobile operating system developed by Google. It is based on a modified version of the Linux kernel and other open source software, and is designed primarily for touchscreen mobile devices such as smartphones and tablets.', 60, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE `tbl_detail` (
  `detail_id` int(40) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `stu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `login_id`, `name`, `dob`, `gender`, `address`, `profile_pic`, `stu_id`) VALUES
(0, 0, '', '0000-00-00', '', '', 'photos/Default.png', NULL),
(9, 9, 'Parth Kamani', '1997-08-08', 'male', 'A.I.T, Ahmedabad', 'photos/team-img2.jpg', NULL),
(15, 15, 'Rahul Parmar', '1997-02-01', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(16, 16, 'Krutika Panchal', '1997-03-05', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(17, 17, 'zalak Panchal', '1997-12-15', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(18, 18, 'Rinkal Chavda', '1997-04-30', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(20, 22, 'Parimal Prajapati', '1997-08-27', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(35, 37, 'Dhruv Patel', '1997-09-07', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(36, 38, 'Mihir Patel', '1997-02-18', 'male', 'A.I.T, Ahmedabad', 'photos/639453_155338009423032019_34034.jpg', NULL),
(40, 42, 'Harshil Oza', '1997-05-09', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(41, 43, 'Shreya Triphati', '1997-10-31', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', 42),
(42, 44, 'Vikas Makwana', '1997-11-29', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(43, 43, 'Pranav Mistry', '1997-07-12', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', 44),
(44, 46, 'Vishal Mashru', '1998-09-11', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(45, 47, 'Divyesh Patel', '1998-07-17', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', 46),
(46, 48, 'Binita Vaghela', '1997-07-10', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(47, 49, 'Bhavin Gadhavi', '1997-08-14', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(48, 50, 'Asmi Patel', '1997-07-27', 'female', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(49, 51, 'Keval Rathod', '1998-01-28', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(50, 52, 'Arpit Sharma', '1997-01-19', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(51, 53, 'Pratham Garg', '1998-06-14', 'male', 'A.I.T, Ahmedabad', 'photos/Default.png', NULL),
(52, 54, 'Jashraj Karnik', '1997-10-16', 'male', 'A.I.T, Ahmedabad', 'photos/team-img3.jpg', NULL),
(53, 55, 'Ram Verma', '1998-03-19', 'male', 'A.I.T, Ahmedabad', 'photos/627672_155337976623032019_45098.png', NULL),
(54, 56, 'Sneha Patel', '1997-02-02', 'female', 'A.I.T, Ahmedabad', 'photos/team-img1.jpg', NULL),
(55, 57, 'Samriddhi Triphati', '1997-12-31', 'female', 'A.I.T, Ahmedabad', 'photos/731271_155388793229032019_50478.png', 55),
(74, 79, 'Gaurav Singh', '1995-12-19', 'male', 'AIT, Ahmedabad', 'photos/Default.png', NULL),
(75, 80, 'Kumar Singh', '0000-00-00', '', '', 'photos/Default.png', 79);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fmrk`
--

CREATE TABLE `tbl_fmrk` (
  `re_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `cor_id` int(11) NOT NULL,
  `ob_m` double(4,2) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fmrk`
--

INSERT INTO `tbl_fmrk` (`re_id`, `stu_id`, `e_id`, `a_id`, `cor_id`, `ob_m`, `valid`) VALUES
(1, 42, 5, NULL, 3, 6.00, 1),
(2, 44, NULL, 4, 3, 15.00, 1),
(3, 44, NULL, 1, 3, 20.00, 1),
(4, 44, 5, NULL, 3, 10.00, 1),
(6, 44, 7, NULL, 3, 12.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(40) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `phone_no` bigint(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  `cl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email_id`, `phone_no`, `password`, `status`, `type`, `active`, `cl_id`) VALUES
(9, 'parth@gmail.com', 8141483673, 'admin@1234', '1', '0', 1, NULL),
(15, 'rahul@gmail.com', 8464646464, 'rahul@123', '1', '1', 1, 4),
(16, 'krutika@gmail.com', 8547547586, 'krutika@123', '1', '3', 1, 4),
(17, 'zalak@gmail.com', 7548754756, 'zalak@123', '1', '3', 1, 4),
(18, 'rinkal@gmail.com', 8475961247, 'rinkal@123', '1', '3', 1, 4),
(22, 'parimal@gmail.com', 6543872918, 'parimal@123', '1', '3', 1, 4),
(37, 'dhruv@gmail.com', 8654345434, 'dhruv@123', '1', '3', 1, 4),
(38, 'mihir@gmail.com', 8385868784, 'mihir@123', '1', '3', 1, 4),
(42, 'harshil@gmail.com', 8484848448, 'harshil@123', '1', '2', 1, NULL),
(43, 'shreya@gmail.com', 7564756473, 'shreya@123', '1', '4', 0, NULL),
(44, 'vikas@gmail.com', 8484848484, 'vikas@123', '1', '2', 0, NULL),
(45, 'pranav@gmail.com', 8374562533, 'pranav@123', '1', '4', 1, NULL),
(46, 'vishal@gmail.com', 8547586957, 'vishal@123', '1', '2', 0, NULL),
(47, 'divyesh@gmail.com', 9657485967, 'divyesh@123', '1', '4', 1, 4),
(48, 'binita@gmail.com', 7458475869, 'binita@123', '1', '3', 1, 4),
(49, 'bhavin@gmail.com', 8547584758, 'bhavin@123', '1', '3', 0, 4),
(50, 'asmi@gmail.com', 9658655754, 'asmi@123', '1', '1', 1, 5),
(51, 'keval@gmail.com', 7475747547, 'keval@123', '1', '1', 1, 6),
(52, 'arpit@gmail.com', 8547574857, 'arpit@123', '1', '3', 1, 5),
(53, 'pratham@gmail.com', 8744128741, 'pratham@123', '1', '3', 1, 5),
(54, 'jashraj@gmail.com', 7990160984, 'admin@1234', '1', '0', 1, NULL),
(55, 'ram@gmail.com', 8741254126, 'ram@123', '1', '2', 1, NULL),
(56, 'sneha@gmail.com', 9824084755, 'admin@1234', '1', '0', 1, NULL),
(57, 'samriddhi@gmail.com', 7485748574, 'samriddhi@123', '1', '4', 1, NULL),
(79, 'gaurav@gmail.com', 9654785123, 'gaurav@123', '0', '2', 1, NULL),
(80, 'kumar@gmail.com', 9647854123, 'kumar@123', '0', '4', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `msg_id` int(11) NOT NULL,
  `sen_name` varchar(100) NOT NULL,
  `sen_phone` bigint(40) NOT NULL,
  `sen_email` int(100) NOT NULL,
  `sen_msg` varchar(500) NOT NULL,
  `msg_solved` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qdb`
--

CREATE TABLE `tbl_qdb` (
  `que_id` int(11) NOT NULL,
  `que_desc` varchar(500) NOT NULL,
  `que_mrk` double(4,2) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qdb`
--

INSERT INTO `tbl_qdb` (`que_id`, `que_desc`, `que_mrk`, `ch_id`, `cor_id`, `cl_id`, `valid`) VALUES
(1, 'List out various layouts available in Android.', 3.00, 1, 5, 4, 1),
(2, 'Give full form of following acronym.\r\n1) HTTP 2) SOAP 3) DTD\r\n', 3.00, 1, 3, 4, 1),
(3, 'Explain the points which should be considered for planning a website.', 4.00, 2, 3, 4, 1),
(4, 'Explain Ordered list with example.', 3.00, 3, 3, 4, 1),
(5, 'Design Login Page HTML. Page must have fields in page Username,\r\nPassword, Remember Me and Login Button.', 7.00, 4, 3, 4, 1),
(6, 'Explain Meta Tag.', 3.00, 1, 3, 4, 1),
(7, 'Differentiate between “ID” and “Class” using suitable example. ', 4.00, 1, 3, 4, 1),
(8, 'List and Explain types of CSS with Example.', 3.00, 3, 3, 4, 1),
(9, 'Draw and Explain Web Browser Architecture.', 4.00, 2, 3, 4, 1),
(10, 'Write the difference between Client Side Scripting and Server Side Scripting.', 4.00, 2, 3, 4, 1),
(11, 'What are the JVM and DVM? Explain DVM in details. ', 4.00, 2, 5, 4, 1),
(12, 'Explain Android activity life cycle.', 7.00, 1, 5, 4, 1),
(13, 'Draw & Explain Android architecture.', 7.00, 1, 5, 4, 1),
(14, 'Explain Scroll View and List View. ', 3.00, 3, 5, 4, 1),
(15, 'Explain use of radio button in Android App.', 3.00, 2, 5, 4, 1),
(16, 'Create the Application for Car Show with Car Details.', 7.00, 4, 5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stuassi`
--

CREATE TABLE `tbl_stuassi` (
  `a_id` int(11) NOT NULL,
  `a_num` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_desc` varchar(500) NOT NULL,
  `a_dline` date NOT NULL,
  `a_mrk` double(4,2) NOT NULL,
  `a_url` varchar(60) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stuassi`
--

INSERT INTO `tbl_stuassi` (`a_id`, `a_num`, `ch_id`, `a_name`, `a_desc`, `a_dline`, `a_mrk`, `a_url`, `cor_id`, `valid`) VALUES
(1, 3, 4, 'sdfcd', 'gjvjhbm', '2019-03-06', 20.00, 'kscbm', 3, 0),
(2, 0, 0, 'sdfcd', 'gjvjhbm', '2019-03-06', 0.00, 'kscbm', 0, 0),
(3, 0, 0, 'hjh', 'jnjn', '2019-03-05', 0.00, 'gvgvg', 0, 0),
(4, 1, 4, 'te', 'trrrrrr', '2019-04-03', 21.00, 'assignment/415423_155390023429032019_26938.pdf', 3, 1),
(5, 2, 4, 'try', 'try', '2019-04-05', 40.00, 'assignment/119869_155390049930032019_81324.pdf', 3, 1),
(6, 1, 5, 'try2', 'ter2sdcb cvhbireuhbkj cvhireukjr jvhiejkr kruhrk ifuchgriewu rehiker wrkufhiwrufhiwouyy', '2019-04-06', 10.00, 'assignment/788480_155390053830032019_75503.pdf', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stuatt`
--

CREATE TABLE `tbl_stuatt` (
  `a_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_date` date DEFAULT NULL,
  `active` int(11) NOT NULL,
  `attend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stuatt`
--

INSERT INTO `tbl_stuatt` (`a_id`, `cl_id`, `cor_id`, `ch_id`, `s_id`, `c_date`, `active`, `attend`) VALUES
(55, 4, 3, 2, 42, '2019-03-18', 1, 0),
(56, 4, 3, 2, 46, '2019-03-18', 1, 1),
(57, 4, 3, 2, 42, '2019-03-19', 1, 1),
(58, 4, 3, 3, 44, '2019-03-19', 1, 1),
(59, 4, 3, 3, 46, '2019-03-19', 1, 0),
(60, 4, 3, 3, 42, '2019-03-22', 1, 1),
(61, 4, 3, 4, 44, '2019-03-22', 1, 0),
(62, 4, 3, 4, 46, '2019-03-22', 1, 1),
(63, 4, 3, 4, 42, '2019-03-20', 1, 1),
(64, 4, 3, 4, 44, '2019-03-20', 1, 0),
(65, 4, 3, 4, 46, '2019-03-20', 1, 1),
(66, 4, 3, 4, 42, '2019-03-27', 1, 1),
(67, 4, 3, 5, 44, '2019-03-27', 1, 1),
(68, 4, 3, 5, 46, '2019-03-27', 1, 0),
(69, 4, 3, 5, 42, '2019-03-29', 1, 0),
(70, 4, 3, 5, 44, '2019-03-29', 1, 1),
(71, 4, 3, 5, 46, '2019-03-29', 1, 0),
(72, 4, 3, 5, 42, '2019-03-28', 1, 1),
(73, 4, 3, 5, 44, '2019-03-28', 1, 1),
(74, 4, 3, 5, 46, '2019-03-28', 1, 0),
(75, 4, 3, 6, 42, '2019-04-04', 1, 1),
(76, 4, 3, 6, 44, '2019-04-04', 1, 1),
(77, 4, 3, 6, 46, '2019-04-04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stuenro`
--

CREATE TABLE `tbl_stuenro` (
  `s_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `fees_paid` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stuenro`
--

INSERT INTO `tbl_stuenro` (`s_id`, `login_id`, `cor_id`, `cl_id`, `fees_paid`, `active`, `comp`) VALUES
(1, 46, 5, 4, 0, 1, 0),
(2, 42, 3, 4, 0, 1, 0),
(3, 44, 3, 4, 1, 1, 1),
(4, 46, 3, 4, 1, 1, 0),
(5, 42, 5, 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stures`
--

CREATE TABLE `tbl_stures` (
  `r_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `ob_mark` double(4,2) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stures`
--

INSERT INTO `tbl_stures` (`r_id`, `stu_id`, `e_id`, `q_id`, `cor_id`, `ob_mark`, `valid`) VALUES
(1, 42, 5, 19, 3, 4.00, 1),
(2, 44, 5, 20, 3, 2.00, 1),
(3, 46, 5, 21, 3, 4.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub`
--

CREATE TABLE `tbl_sub` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(500) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub`
--

INSERT INTO `tbl_sub` (`sub_id`, `sub_email`, `active`) VALUES
(1, 'kio@kio.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_exam`
--

CREATE TABLE `tmp_exam` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_date` date NOT NULL,
  `e_mod` int(11) NOT NULL,
  `e_tm` double(4,2) NOT NULL,
  `s_time` varchar(50) NOT NULL,
  `e_time` varchar(50) NOT NULL,
  `e_built` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `p_url` varchar(60) DEFAULT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_exam`
--

INSERT INTO `tmp_exam` (`e_id`, `e_name`, `e_date`, `e_mod`, `e_tm`, `s_time`, `e_time`, `e_built`, `cor_id`, `cl_id`, `view`, `p_url`, `valid`) VALUES
(5, 'Mid 1', '2019-03-30', 2, 20.00, '12:10', '13:10', 1, 3, 4, 0, 'paper/531752_155455999906042019_11090.pdf', 1),
(6, 'Mid 1', '2019-03-28', 2, 20.00, '08:20', '09:20', 0, 5, 4, 0, NULL, 0),
(7, 'Mid 1', '2019-03-21', 3, 20.00, '11:00', '12:00', 1, 3, 4, 1, 'paper/531752_155455999906042019_11090.pdf', 1),
(8, 'Mid 1', '2019-04-02', 5, 70.00, '10:30', '13:00', 0, 3, 4, 0, NULL, 1),
(9, 'Mid 2', '2019-04-02', 3, 30.00, '14:00', '15:30', 0, 5, 4, 0, NULL, 1),
(10, 'Mid 2', '2019-05-10', 3, 30.00, '07:00', '09:00', 0, 3, 4, 0, NULL, 1),
(11, 'Mid 2', '2019-04-25', 3, 30.00, '07:00', '09:00', 0, 3, 4, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_mod`
--

CREATE TABLE `tmp_mod` (
  `m_id` int(11) NOT NULL,
  `m_num` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_mod`
--

INSERT INTO `tmp_mod` (`m_id`, `m_num`, `e_id`, `valid`) VALUES
(5, 1, 5, 1),
(6, 2, 5, 1),
(7, 1, 6, 1),
(8, 2, 6, 1),
(9, 1, 7, 1),
(10, 2, 7, 1),
(11, 3, 7, 1),
(12, 1, 7, 1),
(13, 2, 7, 1),
(14, 3, 7, 1),
(15, 1, 9, 1),
(16, 2, 9, 1),
(17, 3, 9, 1),
(18, 1, 6, 1),
(19, 2, 6, 1),
(20, 1, 11, 1),
(21, 2, 11, 1),
(22, 3, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_que`
--

CREATE TABLE `tmp_que` (
  `q_id` int(11) NOT NULL,
  `q_num` int(11) NOT NULL,
  `q_queid` int(11) NOT NULL,
  `q_mrk` double(4,2) NOT NULL,
  `m_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_que`
--

INSERT INTO `tmp_que` (`q_id`, `q_num`, `q_queid`, `q_mrk`, `m_id`, `e_id`, `valid`) VALUES
(1, 1, 1, 3.00, 9, 7, 1),
(2, 2, 11, 4.00, 9, 7, 1),
(14, 1, 3, 4.00, 10, 7, 1),
(15, 2, 4, 3.00, 10, 7, 1),
(16, 3, 5, 7.00, 10, 7, 1),
(17, 1, 2, 3.00, 15, 9, 1),
(18, 2, 3, 4.00, 15, 9, 1),
(19, 1, 3, 4.00, 5, 5, 1),
(20, 2, 4, 3.00, 5, 5, 1),
(21, 3, 5, 7.00, 5, 5, 1),
(22, 1, 6, 3.00, 6, 5, 1),
(23, 1, 1, 3.00, 22, 11, 1),
(24, 2, 12, 7.00, 22, 11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp_tbl`
--
ALTER TABLE `otp_tbl`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `tbl_chapters`
--
ALTER TABLE `tbl_chapters`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `tbl_cir`
--
ALTER TABLE `tbl_cir`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`cor_id`);

--
-- Indexes for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tbl_fmrk`
--
ALTER TABLE `tbl_fmrk`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_qdb`
--
ALTER TABLE `tbl_qdb`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `tbl_stuassi`
--
ALTER TABLE `tbl_stuassi`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_stuatt`
--
ALTER TABLE `tbl_stuatt`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_stuenro`
--
ALTER TABLE `tbl_stuenro`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_stures`
--
ALTER TABLE `tbl_stures`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_sub`
--
ALTER TABLE `tbl_sub`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tmp_exam`
--
ALTER TABLE `tmp_exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tmp_mod`
--
ALTER TABLE `tmp_mod`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tmp_que`
--
ALTER TABLE `tmp_que`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp_tbl`
--
ALTER TABLE `otp_tbl`
  MODIFY `otp_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_cir`
--
ALTER TABLE `tbl_cir`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `cor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  MODIFY `detail_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_fmrk`
--
ALTER TABLE `tbl_fmrk`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_qdb`
--
ALTER TABLE `tbl_qdb`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_stuassi`
--
ALTER TABLE `tbl_stuassi`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stuatt`
--
ALTER TABLE `tbl_stuatt`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_stuenro`
--
ALTER TABLE `tbl_stuenro`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stures`
--
ALTER TABLE `tbl_stures`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sub`
--
ALTER TABLE `tbl_sub`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_exam`
--
ALTER TABLE `tmp_exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tmp_mod`
--
ALTER TABLE `tmp_mod`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tmp_que`
--
ALTER TABLE `tmp_que`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
