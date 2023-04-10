-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2023 at 06:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `506u`
--

-- --------------------------------------------------------

--
-- Table structure for table `AvailableDays`
--

CREATE TABLE `AvailableDays` (
  `dayAvailable` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `AvailableDays`
--

INSERT INTO `AvailableDays` (`dayAvailable`) VALUES
('2023-04-11'),
('2023-04-12'),
('2023-04-13'),
('2023-04-14'),
('2023-04-15'),
('2023-04-17'),
('2023-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `ChatMessage`
--

CREATE TABLE `ChatMessage` (
  `message_id` int(11) NOT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `message_sender_id` int(11) DEFAULT NULL,
  `message_content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ChatMessage`
--

INSERT INTO `ChatMessage` (`message_id`, `chat_id`, `message_sender_id`, `message_content`) VALUES
(4, 5, 1, 'hello'),
(5, 6, 1, 'helllllooo'),
(6, 5, 1, 'asdasdasdas'),
(7, 6, 1, 'asdasdasdasdasdasdsaadsadasdasdsa'),
(8, 5, 1, 'ayyy lmaoooooooooooooooooo'),
(9, 6, 3, 'yoooooooooooooo'),
(10, 6, 3, 'reaoycdh7sao8d7c6as'),
(11, 5, 1, 'sdcwqe23ceawcd'),
(12, 5, 1, 'sdcwqe23ceawcd'),
(13, 5, 1, 'sdcwqe23ceawcd'),
(14, 5, 1, 'sdcwqe23ceawcd'),
(15, 5, 1, 'sdcwqe23ceawcd'),
(16, 5, 1, 'sdcwqe23ceawcd'),
(17, 6, 1, 'asdasdas'),
(18, 6, 1, 'asdasdas'),
(19, 6, 1, 'asdasdas'),
(20, 6, 1, 'asdasdas'),
(21, 6, 1, 'asdasdas'),
(22, 6, 1, 'asdasdas'),
(23, 6, 1, 'asdasdas'),
(24, 6, 1, 'asdasdas'),
(25, 6, 1, 'asdasdas'),
(26, 6, 1, 'asdasdas'),
(27, 6, 1, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `Documents`
--

CREATE TABLE `Documents` (
  `document_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `filePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Documents`
--

INSERT INTO `Documents` (`document_id`, `name`, `description`, `uploadDate`, `filePath`) VALUES
(3, 'Fdm Project', 'Fdm Project', '2023-04-09 15:21:37', 'uploads/FDM_Projects (4).pdf'),
(4, 'Group 52', 'Fdm Project', '2023-04-09 15:31:03', 'uploads/Group 52.pdf'),
(5, 'Group 52', 'Fdm Project', '2023-04-09 15:32:16', 'uploads/DOMAIN ANALYSIS.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `employee_id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` char(11) NOT NULL,
  `department` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hireDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userType` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`employee_id`, `firstname`, `lastname`, `address`, `email`, `telephone`, `department`, `location`, `username`, `password`, `hireDate`, `userType`) VALUES
(1, 'John', 'Wick', '128 Fake St', 'johnwick@hotmail.com', '07999999998', 'administration', 'london', 'johnwick', '0448ecc449488ccd346cc44e6e3df922', '2023-04-09 14:37:43', 'admin'),
(2, 'jahn', 'wick', '124 Fake St', 'jahnwick@hotmail.com', '07999999999', 'internal', 'london', 'jahnwick', 'example123', '2023-04-10 01:32:23', 'internal'),
(3, 'jahan', 'wahick', '123213 fake st', 'jahanwick@example.com', '07999999999', 'external', 'somalia', 'jahanwahick', '7df065c23f49f57077f9113611d6d877', '2023-03-24 07:24:01', 'external'),
(4, 'John', 'Doe', '654 fake st', 'johndoe@example.com', '07999999999', 'new', 'london', 'johndoe', '7df065c23f49f57077f9113611d6d877', '2023-03-27 11:39:09', 'newHire'),
(5, 'Lola', 'lola', 'Mile End Rd', 'lola@outlook.com', '07407233133', 'internal', 'London', 'lola', '7df065c23f49f57077f9113611d6d877', '2023-04-09 23:47:02', 'external'),
(6, 'l', 'Smith', 'Mile End Rd', 'ec21426@qmul.ac.uk', '07403377133', 'tech', 'London', 'smith', '7df065c23f49f57077f9113611d6d877', '2023-04-10 01:34:01', 'internal'),
(7, 'k', 'k', 'k', 'k@outlook.com', '07535333907', 'internal', 'London', 'k', '7df065c23f49f57077f9113611d6d877', '2023-04-10 02:47:46', 'internal');

-- --------------------------------------------------------

--
-- Table structure for table `Faq`
--

CREATE TABLE `Faq` (
  `faq_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Faq`
--

INSERT INTO `Faq` (`faq_id`, `title`, `question`, `answer`) VALUES
(1, 'Test FAQ', 'FAQ QUESTION 1?', 'Example answer.Example answer.Example answer.Example answer.Example answer.'),
(2, 'Test FAQ 2', 'FAQ QUESTION 2?', 'Example answer.'),
(3, 'FAQ Test 3', 'FAQ Question 3?', 'Example answer.'),
(4, 'FAQ Test 4', 'FAQ Question 4?', 'Example answer.'),
(5, 'FAQ Test 5', 'FAQ Question 5?', 'Example answer.'),
(6, 'FAQ Test 6', 'FAQ Question 6?', 'Example answer.'),
(7, 'FAQ Test 7', 'FAQ Question 7?', 'Example answer.'),
(8, 'FAQ Test 8', 'FAQ Question 8?', 'Example answer.'),
(9, 'FAQ Test 9', 'FAQ Question 9?', 'Example answer.'),
(10, 'FAQ Test 10', 'FAQ Question 10?', 'Example answer.');

-- --------------------------------------------------------

--
-- Table structure for table `IssueReport`
--

CREATE TABLE `IssueReport` (
  `issue_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `reportersEmail` varchar(50) DEFAULT NULL,
  `reportersName` varchar(60) DEFAULT NULL,
  `reportDescription` varchar(255) DEFAULT NULL,
  `issueResolved` tinyint(1) DEFAULT 0,
  `severity` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `IssueReport`
--

INSERT INTO `IssueReport` (`issue_id`, `type`, `reportersEmail`, `reportersName`, `reportDescription`, `issueResolved`, `severity`) VALUES
(1, 'Website', 'test report email', 'test report name', 'test report description', 0, 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(20) NOT NULL,
  `outgoing` int(20) NOT NULL,
  `incoming` int(20) NOT NULL,
  `messages` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messages_id`, `outgoing`, `incoming`, `messages`) VALUES
(11, 1, 4, 'hello'),
(12, 1, 4, 'hello'),
(13, 1, 1, 'jj'),
(14, 1, 3, 'hello'),
(15, 1, 4, 'yo'),
(16, 1, 3, 'u'),
(17, 1, 4, 'h'),
(18, 1, 4, 'k'),
(19, 1, 4, 'hello'),
(20, 1, 5, 'hello'),
(21, 1, 1, 'hello john how are you?'),
(22, 1, 5, 'hello'),
(23, 1, 1, 'ehllo'),
(24, 1, 1, 'HELLO'),
(25, 1, 1, 'HELLO'),
(26, 1, 2, 'HELLO'),
(27, 1, 6, 'hello'),
(28, 1, 1, 'lol'),
(29, 1, 5, 'yo'),
(30, 1, 1, 'hello'),
(31, 1, 1, 'hello'),
(32, 1, 1, 'excuse me'),
(33, 1, 1, 'hello'),
(34, 1, 5, 'hello'),
(35, 1, 1, 'ex'),
(36, 1, 1, 'kk'),
(37, 1, 6, 'hello'),
(38, 5, 1, 'll'),
(39, 5, 5, 'hello'),
(40, 1, 5, 'ikhlas'),
(41, 5, 1, 'yes'),
(42, 1, 6, 'hi smith'),
(43, 6, 1, 'hi john'),
(44, 6, 5, 'hi its smith'),
(45, 5, 6, 'hi its lola'),
(46, 7, 5, 'hi lola its k'),
(47, 5, 7, 'hello'),
(48, 5, 7, 'its lola'),
(49, 1, 7, 'hello its john the admin'),
(50, 1, 7, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `dateCreated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`news_id`, `title`, `message`, `category`, `dateCreated`) VALUES
(2, 'FDM Annual Charity Fundraiser', 'FDM is proud to announce its annual charity fundraiser, taking place on June 3rd. This year\'s event will support a local organization that focuses on providing education and resources to underprivileged children. We encourage all employees to participate in the fundraiser, either by donating or volunteering their time. Together, we can make a difference!', 'Announcement', '2023-03-28 03:31:49'),
(3, 'FDM Employee Discovers Time Travel During Lunch Break', 'An FDM employee has reportedly stumbled upon the secret to time travel while enjoying their lunch break. Sources say the employee was able to travel back in time and return with a sandwich from their favorite deli, which closed five years ago.', 'Social', '2023-03-28 03:40:09'),
(4, 'FDM Develops Revolutionary Mind-Reading Technology', 'Researchers at FDM have developed a groundbreaking new technology that allows users to read each other\'s thoughts. The breakthrough is expected to revolutionize communication in the workplace, rendering emails and meetings obsolete.', 'Other', '2023-03-28 03:41:09'),
(5, 'FDM Employee Appreciation Week', 'To celebrate the hard work and dedication of our employees, FDM is hosting an Employee Appreciation Week from May 15th to May 21st. The week will include fun activities, team-building exercises, and special treats for all staff members. Stay tuned for more details on the upcoming events!', 'Announcement ', '2023-03-28 03:42:05'),
(7, 'FDM Group Launches New Training Program', 'We are excited to announce the launch of our new, comprehensive training program. This program is designed to improve the skills and knowledge of our employees in various domains, including data analytics, software development, and project management. Stay tuned for more details about how to enroll!', 'Announcement', '2023-04-09 01:20:44'),
(8, 'FDM Employee of the Month: Jane Smith', '\r\nMessage: \"Congratulations to Jane Smith, our Employee of the Month! Jane has demonstrated exceptional performance in her role as a software developer and has been a great mentor to her colleagues. Keep up the excellent work, Jane!', 'Employee Spotlight', '2023-04-09 01:22:13'),
(9, 'FDM Group to Host Virtual Charity Event\"\r\n', 'Join us on May 15th for our annual virtual charity event, FDM Cares! This year, we will be raising funds for a local non-profit organization focused on providing educational resources to underprivileged children. Stay tuned for more information on how to participate and donate.', 'Event', '2023-04-02 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Payslip`
--

CREATE TABLE `Payslip` (
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `period_start` date DEFAULT NULL,
  `period_end` date DEFAULT NULL,
  `basic_pay` float(4,2) DEFAULT NULL,
  `totalHoursWorked` int(3) NOT NULL,
  `allowances` float(5,2) DEFAULT NULL,
  `deductions` float(5,2) DEFAULT NULL,
  `net_pay` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Payslip`
--

INSERT INTO `Payslip` (`payslip_id`, `employee_id`, `period_start`, `period_end`, `basic_pay`, `totalHoursWorked`, `allowances`, `deductions`, `net_pay`) VALUES
(1, 1, '2023-03-01', '2023-03-15', 10.55, 160, 200.00, 30.00, 1658.00),
(2, 1, '2023-01-01', '2023-01-16', 10.45, 150, 100.00, 20.00, 1547.50);

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

CREATE TABLE `Request` (
  `request_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `dateRequested` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(15) DEFAULT 'requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Request`
--

INSERT INTO `Request` (`request_id`, `employee_id`, `message`, `type`, `dateRequested`, `status`) VALUES
(1, 1, 'hello testing testing testing testing testing testing', 'personal', '2023-03-24 07:05:30', 'approved'),
(2, 1, 'hello', 'personal', '2023-03-24 07:07:21', 'approved'),
(3, 1, 'test request 2', 'personal', '2023-03-28 02:36:37', 'rejected'),
(4, 7, 'lll', 'website', '2023-04-10 04:14:29', 'requested'),
(5, 7, 'lll', 'website', '2023-04-10 04:14:29', 'requested'),
(6, 7, 'nn', 'website', '2023-04-10 04:14:46', 'requested'),
(7, 7, 'nn', 'website', '2023-04-10 04:14:46', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `TimeOff`
--

CREATE TABLE `TimeOff` (
  `timeOff_id` int(11) NOT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `status` varchar(11) DEFAULT 'requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TimeOff`
--

INSERT INTO `TimeOff` (`timeOff_id`, `requester_id`, `startDate`, `endDate`, `status`) VALUES
(1, 1, '2023-03-28', '2023-03-29', 'requested'),
(2, 7, '2023-04-06', '2023-04-06', 'rejected'),
(3, 7, '2023-04-06', '2023-04-06', 'requested'),
(4, 7, '2023-04-06', '2023-04-06', 'requested'),
(5, 7, '2023-04-06', '2023-04-06', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `Trainee`
--

CREATE TABLE `Trainee` (
  `task_id` int(11) DEFAULT NULL,
  `trainee_id` int(11) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Trainee`
--

INSERT INTO `Trainee` (`task_id`, `trainee_id`, `complete`) VALUES
(1, 4, 1),
(2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TrainingTask`
--

CREATE TABLE `TrainingTask` (
  `task_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `duration` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TrainingTask`
--

INSERT INTO `TrainingTask` (`task_id`, `title`, `description`, `category`, `duration`) VALUES
(1, 'Test', 'Just a test', 'Beginner', 10),
(2, 'Another Test', 'Just another test', 'Intermediate', 20);

-- --------------------------------------------------------

--
-- Table structure for table `UserChat`
--

CREATE TABLE `UserChat` (
  `chat_id` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_initial_id` int(11) DEFAULT NULL,
  `user_recepient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `UserChat`
--

INSERT INTO `UserChat` (`chat_id`, `dateCreated`, `user_initial_id`, `user_recepient_id`) VALUES
(5, '2023-03-29 06:16:24', 1, 2),
(6, '2023-03-29 07:05:43', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `Documents`
--
ALTER TABLE `Documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `Faq`
--
ALTER TABLE `Faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `IssueReport`
--
ALTER TABLE `IssueReport`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `Payslip`
--
ALTER TABLE `Payslip`
  ADD PRIMARY KEY (`payslip_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `TimeOff`
--
ALTER TABLE `TimeOff`
  ADD PRIMARY KEY (`timeOff_id`),
  ADD KEY `requester_id` (`requester_id`);

--
-- Indexes for table `Trainee`
--
ALTER TABLE `Trainee`
  ADD KEY `task_id` (`task_id`),
  ADD KEY `trainee_id` (`trainee_id`);

--
-- Indexes for table `TrainingTask`
--
ALTER TABLE `TrainingTask`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `UserChat`
--
ALTER TABLE `UserChat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_initial_id` (`user_initial_id`),
  ADD KEY `user_recepient_id` (`user_recepient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Documents`
--
ALTER TABLE `Documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Faq`
--
ALTER TABLE `Faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `IssueReport`
--
ALTER TABLE `IssueReport`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messages_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Payslip`
--
ALTER TABLE `Payslip`
  MODIFY `payslip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Request`
--
ALTER TABLE `Request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `TimeOff`
--
ALTER TABLE `TimeOff`
  MODIFY `timeOff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `TrainingTask`
--
ALTER TABLE `TrainingTask`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `UserChat`
--
ALTER TABLE `UserChat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  ADD CONSTRAINT `chatmessage_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `UserChat` (`chat_id`);

--
-- Constraints for table `Payslip`
--
ALTER TABLE `Payslip`
  ADD CONSTRAINT `payslip_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `Employee` (`employee_id`);

--
-- Constraints for table `Request`
--
ALTER TABLE `Request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `Employee` (`employee_id`);

--
-- Constraints for table `TimeOff`
--
ALTER TABLE `TimeOff`
  ADD CONSTRAINT `timeoff_ibfk_1` FOREIGN KEY (`requester_id`) REFERENCES `Employee` (`employee_id`);

--
-- Constraints for table `Trainee`
--
ALTER TABLE `Trainee`
  ADD CONSTRAINT `trainee_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `TrainingTask` (`task_id`),
  ADD CONSTRAINT `trainee_ibfk_2` FOREIGN KEY (`trainee_id`) REFERENCES `Employee` (`employee_id`);

--
-- Constraints for table `UserChat`
--
ALTER TABLE `UserChat`
  ADD CONSTRAINT `userchat_ibfk_1` FOREIGN KEY (`user_initial_id`) REFERENCES `Employee` (`employee_id`),
  ADD CONSTRAINT `userchat_ibfk_2` FOREIGN KEY (`user_recepient_id`) REFERENCES `Employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
