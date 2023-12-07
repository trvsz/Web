-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 09:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_name` varchar(30) NOT NULL,
  `campus_address` varchar(50) DEFAULT NULL,
  `distance` decimal(8,2) DEFAULT NULL,
  `bus_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_name`, `campus_address`, `distance`, `bus_no`) VALUES
('New York Campus', '456 New York Avenue', '8.21', 'BUS002'),
('Toronto Campus', '123 Toronto Street', '5.67', 'BUS001');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_name` varchar(30) NOT NULL,
  `campus_name` varchar(30) NOT NULL,
  `club_building` varchar(30) NOT NULL,
  `club_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_name`, `campus_name`, `club_building`, `club_phone`) VALUES
('New York Sports Club', 'New York Campus', 'New York Sports Complex', '212-123-4567'),
('Toronto Sports Club', 'Toronto Campus', 'Toronto Sports Complex', '416-123-4567');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_title` varchar(30) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `meeting_frequency` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_title`, `faculty_name`, `meeting_frequency`) VALUES
('Academic Affairs', 'Engineering Faculty', 'Weekly'),
('Academic Affairs', 'Medical Faculty', 'Weekly'),
('Academic Affairs', 'Science Faculty', 'Weekly'),
('Finance', 'Engineering Faculty', 'Monthly'),
('Finance', 'Medical Faculty', 'Monthly'),
('Finance', 'Science Faculty', 'Monthly'),
('Student Affairs', 'Engineering Faculty', 'Weekly'),
('Student Affairs', 'Medical Faculty', 'Weekly'),
('Student Affairs', 'Science Faculty', 'Weekly');

-- --------------------------------------------------------

--
-- Table structure for table `committee_lecturer`
--

CREATE TABLE `committee_lecturer` (
  `staff_id` varchar(10) NOT NULL,
  `committee_title` varchar(30) NOT NULL,
  `faculty_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `committee_lecturer`
--

INSERT INTO `committee_lecturer` (`staff_id`, `committee_title`, `faculty_name`) VALUES
('L001', 'Finance', 'Science Faculty'),
('L002', 'Academic Affairs', 'Science Faculty'),
('L004', 'Finance', 'Science Faculty'),
('L005', 'Academic Affairs', 'Science Faculty'),
('L007', 'Finance', 'Engineering Faculty'),
('L008', 'Academic Affairs', 'Engineering Faculty'),
('L010', 'Finance', 'Engineering Faculty'),
('L011', 'Academic Affairs', 'Engineering Faculty'),
('L013', 'Finance', 'Medical Faculty'),
('L014', 'Academic Affairs', 'Medical Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(10) NOT NULL,
  `programme_code` varchar(10) NOT NULL,
  `course_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `programme_code`, `course_title`) VALUES
('C001', 'PHY101', 'Introduction to Physics'),
('C002', 'PHY101', 'Classical Mechanics'),
('C003', 'PHY201', 'Quantum Physics'),
('C004', 'PHY201', 'Electrodynamics'),
('C005', 'CHEM101', 'General Chemistry'),
('C006', 'CHEM101', 'Organic Chemistry'),
('C007', 'CHEM201', 'Inorganic Chemistry'),
('C008', 'CHEM201', 'Physical Chemistry'),
('C009', 'CE101', 'Statics'),
('C010', 'CE101', 'Dynamics'),
('C011', 'CE201', 'Structural Analysis'),
('C012', 'CE201', 'Geotechnical Engineering'),
('C013', 'EE101', 'Circuit Analysis'),
('C014', 'EE101', 'Electromagnetic Fields'),
('C015', 'EE201', 'Power Systems'),
('C016', 'EE201', 'Control Systems'),
('C017', 'MRI101', 'Pharmaceutical Chemistry'),
('C018', 'MRI101', 'Pharmacotherapy'),
('C019', 'MRI102', 'Dental Pharmacology'),
('C020', 'MRI102', 'Oral Anatomy and Physiology');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `course_code` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `year_taken` varchar(4) DEFAULT NULL,
  `semester_taken` varchar(20) DEFAULT NULL,
  `grade_award` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_code`, `student_id`, `year_taken`, `semester_taken`, `grade_award`) VALUES
('C002', 'S001', '2011', 'Spring', 'B+'),
('C002', 'S002', '2011', 'Spring', 'A-'),
('C002', 'S003', '2011', 'Spring', 'C'),
('C002', 'S004', '2011', 'Spring', 'A'),
('C002', 'S005', '2011', 'Spring', 'B'),
('C002', 'S006', '2011', 'Spring', 'A-'),
('C003', 'S007', '2010', 'Fall', 'B+'),
('C003', 'S008', '2010', 'Fall', 'A-'),
('C003', 'S009', '2010', 'Fall', 'C'),
('C003', 'S010', '2010', 'Fall', 'A'),
('C003', 'S011', '2010', 'Fall', 'B'),
('C003', 'S012', '2010', 'Fall', 'A-'),
('C003', 'S013', '2010', 'Fall', 'B+'),
('C003', 'S014', '2010', 'Fall', 'A'),
('C005', 'S015', '2011', 'Fall', 'B+'),
('C005', 'S016', '2011', 'Fall', 'A-'),
('C005', 'S017', '2011', 'Fall', 'C'),
('C005', 'S018', '2011', 'Fall', 'A'),
('C005', 'S019', '2011', 'Fall', 'B'),
('C005', 'S020', '2011', 'Fall', 'A-'),
('C006', 'S015', '2011', 'Spring', 'A'),
('C006', 'S016', '2011', 'Spring', 'B+'),
('C006', 'S017', '2011', 'Spring', 'B-'),
('C006', 'S018', '2011', 'Spring', 'A'),
('C006', 'S019', '2011', 'Spring', 'C+'),
('C006', 'S020', '2011', 'Spring', 'A-'),
('C007', 'S021', '2011', 'Fall', 'B'),
('C007', 'S022', '2011', 'Fall', 'A-'),
('C007', 'S023', '2011', 'Fall', 'C+'),
('C007', 'S024', '2011', 'Fall', 'A'),
('C007', 'S025', '2011', 'Fall', 'B'),
('C007', 'S026', '2011', 'Fall', 'B+'),
('C007', 'S027', '2011', 'Fall', 'A'),
('C007', 'S028', '2011', 'Fall', 'A-'),
('C008', 'S021', '2011', 'Spring', 'A'),
('C008', 'S022', '2011', 'Spring', 'B+'),
('C008', 'S023', '2011', 'Spring', 'A-'),
('C008', 'S024', '2011', 'Spring', 'A'),
('C008', 'S025', '2011', 'Spring', 'B'),
('C008', 'S026', '2011', 'Spring', 'B+'),
('C008', 'S027', '2011', 'Spring', 'A-'),
('C008', 'S028', '2011', 'Spring', 'A'),
('C009', 'S029', '2010', 'Fall', 'A'),
('C009', 'S030', '2010', 'Fall', 'B+'),
('C009', 'S031', '2010', 'Fall', 'A-'),
('C009', 'S032', '2010', 'Fall', 'B'),
('C009', 'S033', '2010', 'Fall', 'C+'),
('C009', 'S034', '2010', 'Fall', 'A'),
('C010', 'S029', '2011', 'Spring', 'A'),
('C010', 'S030', '2011', 'Spring', 'B+'),
('C010', 'S031', '2011', 'Spring', 'A-'),
('C010', 'S032', '2011', 'Spring', 'B'),
('C010', 'S033', '2011', 'Spring', 'C+'),
('C010', 'S034', '2011', 'Spring', 'A'),
('C011', 'S035', '2010', 'Fall', 'B+'),
('C011', 'S036', '2010', 'Fall', 'A-'),
('C011', 'S037', '2010', 'Fall', 'C'),
('C011', 'S038', '2010', 'Fall', 'A'),
('C011', 'S039', '2010', 'Fall', 'B'),
('C011', 'S040', '2010', 'Fall', 'A-'),
('C011', 'S041', '2010', 'Fall', 'B+'),
('C011', 'S042', '2010', 'Fall', 'A'),
('C012', 'S035', '2011', 'Spring', 'A'),
('C012', 'S036', '2011', 'Spring', 'B'),
('C012', 'S037', '2011', 'Spring', 'C+'),
('C012', 'S038', '2011', 'Spring', 'B-'),
('C012', 'S039', '2011', 'Spring', 'A'),
('C012', 'S040', '2011', 'Spring', 'A-'),
('C012', 'S041', '2011', 'Spring', 'B+'),
('C012', 'S042', '2011', 'Spring', 'A'),
('C013', 'S043', '2010', 'Fall', 'A'),
('C013', 'S044', '2010', 'Fall', 'B+'),
('C013', 'S045', '2010', 'Fall', 'A-'),
('C013', 'S046', '2010', 'Fall', 'B'),
('C013', 'S047', '2010', 'Fall', 'C'),
('C013', 'S048', '2010', 'Fall', 'A'),
('C014', 'S043', '2011', 'Spring', 'A-'),
('C014', 'S044', '2011', 'Spring', 'B'),
('C014', 'S045', '2011', 'Spring', 'A'),
('C014', 'S046', '2011', 'Spring', 'B+'),
('C014', 'S047', '2011', 'Spring', 'C+'),
('C014', 'S048', '2011', 'Spring', 'A'),
('C015', 'S049', '2010', 'Fall', 'A'),
('C015', 'S050', '2010', 'Fall', 'A-'),
('C015', 'S051', '2010', 'Fall', 'B'),
('C015', 'S052', '2010', 'Fall', 'B+'),
('C015', 'S053', '2010', 'Fall', 'A-'),
('C015', 'S054', '2010', 'Fall', 'B'),
('C015', 'S055', '2010', 'Fall', 'B+'),
('C015', 'S056', '2010', 'Fall', 'A'),
('C016', 'S049', '2011', 'Spring', 'A'),
('C016', 'S050', '2011', 'Spring', 'A-'),
('C016', 'S051', '2011', 'Spring', 'B+'),
('C016', 'S052', '2011', 'Spring', 'B'),
('C016', 'S053', '2011', 'Spring', 'A-'),
('C016', 'S054', '2011', 'Spring', 'B'),
('C016', 'S055', '2011', 'Spring', 'B+'),
('C016', 'S056', '2011', 'Spring', 'A'),
('C017', 'S057', '2010', 'Fall', 'A'),
('C017', 'S058', '2010', 'Fall', 'B+'),
('C017', 'S059', '2010', 'Fall', 'A-'),
('C017', 'S060', '2010', 'Fall', 'B'),
('C017', 'S061', '2010', 'Fall', 'C'),
('C018', 'S057', '2011', 'Spring', 'A-'),
('C018', 'S058', '2011', 'Spring', 'B'),
('C018', 'S059', '2011', 'Spring', 'A'),
('C018', 'S060', '2011', 'Spring', 'C+'),
('C018', 'S061', '2011', 'Spring', 'A'),
('C019', 'S062', '2010', 'Fall', 'A'),
('C019', 'S063', '2010', 'Fall', 'B'),
('C019', 'S064', '2010', 'Fall', 'B+'),
('C019', 'S065', '2010', 'Fall', 'C+'),
('C019', 'S066', '2010', 'Fall', 'A-'),
('C020', 'S062', '2010', 'Fall', 'A'),
('C020', 'S063', '2010', 'Fall', 'A-'),
('C020', 'S064', '2010', 'Fall', 'B+'),
('C020', 'S065', '2010', 'Fall', 'C'),
('C020', 'S066', '2010', 'Fall', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_name` varchar(30) NOT NULL,
  `dean_name` varchar(30) DEFAULT NULL,
  `faculty_building` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_name`, `dean_name`, `faculty_building`) VALUES
('Engineering Faculty', 'Dr. Sarah Lee', 'Engineering Complex'),
('Medical Faculty', 'Dr. Benjamin Taylor', 'Medical Complex'),
('Science Faculty', 'Dr. Emily Johnson', 'Science Complex');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `staff_id` varchar(10) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `supervisor_id` varchar(10) DEFAULT NULL,
  `lecturer_name` varchar(30) NOT NULL,
  `lecturer_title` varchar(30) DEFAULT NULL,
  `office_room` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`staff_id`, `school_name`, `supervisor_id`, `lecturer_name`, `lecturer_title`, `office_room`) VALUES
('L001', 'Physics Department', NULL, 'Dr. John Smith', 'Professor', 'A101'),
('L002', 'Physics Department', 'L001', 'Dr. Emily Johnson', 'Associate Professor', 'A102'),
('L003', 'Physics Department', 'L001', 'Dr. Sarah Lee', 'Assistant Professor', 'A103'),
('L004', 'Chemistry Department', NULL, 'Dr. Benjamin Taylor', 'Professor', 'B101'),
('L005', 'Chemistry Department', 'L004', 'Dr. Olivia Miller', 'Associate Professor', 'B102'),
('L006', 'Chemistry Department', 'L004', 'Dr. Sophia Davis', 'Assistant Professor', 'B103'),
('L007', 'Civil Engineering School', NULL, 'Dr. William Garcia', 'Professor', 'C101'),
('L008', 'Civil Engineering School', 'L007', 'Dr. Daniel Robinson', 'Associate Professor', 'C102'),
('L009', 'Civil Engineering School', 'L007', 'Dr. Emma Adams', 'Assistant Professor', 'C103'),
('L010', 'Electrical Engineering Department', NULL, 'Dr. James Johnson', 'Professor', 'D101'),
('L011', 'Electrical Engineering Department', 'L010', 'Dr. Lily Smith', 'Associate Professor', 'D102'),
('L012', 'Electrical Engineering Department', 'L010', 'Dr. Jackson Brown', 'Assistant Professor', 'D103'),
('L013', 'Medical Research Institute', NULL, 'Dr. Michael Robinson', 'Professor', 'E101'),
('L014', 'Medical Research Institute', 'L013', 'Dr. Ava Adams', 'Associate Professor', 'E102'),
('L015', 'Medical Research Institute', 'L013', 'Dr. Lucas Martinez', 'Assistant Professor', 'E103');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_course`
--

CREATE TABLE `lecturer_course` (
  `staff_id` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer_course`
--

INSERT INTO `lecturer_course` (`staff_id`, `course_code`) VALUES
('L001', 'C001'),
('L001', 'C002'),
('L002', 'C002'),
('L002', 'C003'),
('L003', 'C003'),
('L003', 'C004'),
('L004', 'C005'),
('L004', 'C006'),
('L005', 'C006'),
('L005', 'C007'),
('L006', 'C007'),
('L006', 'C008'),
('L007', 'C009'),
('L007', 'C010'),
('L008', 'C010'),
('L008', 'C011'),
('L009', 'C011'),
('L009', 'C012'),
('L010', 'C013'),
('L010', 'C014'),
('L011', 'C014'),
('L011', 'C015'),
('L012', 'C015'),
('L012', 'C016'),
('L013', 'C017'),
('L013', 'C018'),
('L014', 'C018'),
('L014', 'C019'),
('L015', 'C019'),
('L015', 'C020');

-- --------------------------------------------------------

--
-- Table structure for table `pre_course`
--

CREATE TABLE `pre_course` (
  `course_code` varchar(10) NOT NULL,
  `precourse_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_course`
--

INSERT INTO `pre_course` (`course_code`, `precourse_code`) VALUES
('C002', 'C001'),
('C004', 'C003'),
('C006', 'C005'),
('C008', 'C007'),
('C010', 'C009'),
('C012', 'C011'),
('C014', 'C013'),
('C016', 'C015'),
('C018', 'C017'),
('C020', 'C019');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programme_code` varchar(10) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `programme_title` varchar(50) NOT NULL,
  `programme_level` varchar(20) DEFAULT NULL,
  `programme_length` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programme_code`, `school_name`, `programme_title`, `programme_level`, `programme_length`) VALUES
('CE101', 'Civil Engineering School', 'Civil Engineering', 'Undergraduate', '4'),
('CE201', 'Civil Engineering School', 'Advanced Civil Engineering', 'Graduate', '2'),
('CHEM101', 'Chemistry Department', 'Chemistry', 'Undergraduate', '5'),
('CHEM201', 'Chemistry Department', 'Advanced Chemistry', 'Graduate', '2'),
('EE101', 'Electrical Engineering Department', 'Electrical Engineering', 'Undergraduate', '4'),
('EE201', 'Electrical Engineering Department', 'Advanced Electrical Engineering', 'Graduate', '2'),
('MRI101', 'Medical Research Institute', 'Pharmacist', 'Undergraduate', '4'),
('MRI102', 'Medical Research Institute', 'Dentist', 'Undergraduate', '4'),
('PHY101', 'Physics Department', 'Physics', 'Undergraduate', '5'),
('PHY201', 'Physics Department', 'Advanced Physics', 'Graduate', '2');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_name` varchar(50) NOT NULL,
  `campus_name` varchar(30) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `school_building` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `campus_name`, `faculty_name`, `school_building`) VALUES
('Chemistry Department', 'Toronto Campus', 'Science Faculty', 'Science Building B'),
('Civil Engineering School', 'Toronto Campus', 'Engineering Faculty', 'Engineering Building A'),
('Electrical Engineering Department', 'Toronto Campus', 'Engineering Faculty', 'Engineering Building A'),
('Medical Research Institute', 'New York Campus', 'Medical Faculty', 'Medical Building A'),
('Physics Department', 'Toronto Campus', 'Science Faculty', 'Science Building A');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_name` varchar(30) NOT NULL,
  `club_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_name`, `club_name`) VALUES
('Basketball', 'Toronto Sports Club'),
('Soccer', 'Toronto Sports Club'),
('Swimming', 'New York Sports Club'),
('Tennis', 'New York Sports Club');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `programme_code` varchar(10) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_birth` date DEFAULT NULL,
  `year_enrolled` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `programme_code`, `student_name`, `student_birth`, `year_enrolled`) VALUES
('S001', 'PHY101', 'Alice Johnson', '1992-05-15', '2010'),
('S002', 'PHY101', 'Bob Smith', '1992-02-28', '2010'),
('S003', 'PHY101', 'Charlie Brown', '1991-08-10', '2010'),
('S004', 'PHY101', 'Daisy Miller', '1993-11-20', '2010'),
('S005', 'PHY101', 'Ella Davis', '1991-07-04', '2010'),
('S006', 'PHY101', 'Frank Robinson', '1990-06-12', '2010'),
('S007', 'PHY201', 'Grace Martinez', '1992-04-30', '2010'),
('S008', 'PHY201', 'Henry Moore', '1993-12-22', '2010'),
('S009', 'PHY201', 'Isabella Garcia', '1990-09-18', '2010'),
('S010', 'PHY201', 'Jack Robinson', '1992-03-08', '2010'),
('S011', 'PHY201', 'Katherine Adams', '1990-05-25', '2010'),
('S012', 'PHY201', 'Leo Johnson', '1993-08-15', '2010'),
('S013', 'PHY201', 'Mia Smith', '1993-11-28', '2010'),
('S014', 'PHY201', 'Noah Brown', '1990-06-10', '2010'),
('S015', 'CHEM101', 'Olivia Miller', '1992-02-14', '2010'),
('S016', 'CHEM101', 'Peter Davis', '1991-10-07', '2010'),
('S017', 'CHEM101', 'Quinn Johnson', '1992-12-30', '2010'),
('S018', 'CHEM101', 'Rachel Smith', '1991-09-02', '2010'),
('S019', 'CHEM101', 'Sam Brown', '1990-03-18', '2010'),
('S020', 'CHEM101', 'Tina Garcia', '1992-07-22', '2010'),
('S021', 'CHEM201', 'Liam Johnson', '1992-06-15', '2010'),
('S022', 'CHEM201', 'Ava Smith', '1992-03-28', '2010'),
('S023', 'CHEM201', 'Lucas Brown', '1991-09-10', '2010'),
('S024', 'CHEM201', 'Sophia Miller', '1992-12-20', '2010'),
('S025', 'CHEM201', 'Olivia Davis', '1991-08-04', '2010'),
('S026', 'CHEM201', 'William Garcia', '1992-07-12', '2010'),
('S027', 'CHEM201', 'Emily Robinson', '1991-04-30', '2010'),
('S028', 'CHEM201', 'Benjamin Adams', '1992-12-22', '2010'),
('S029', 'CE101', 'William Johnson', '1992-06-15', '2010'),
('S030', 'CE101', 'Sophie Smith', '1991-03-28', '2010'),
('S031', 'CE101', 'Daniel Brown', '1990-09-10', '2010'),
('S032', 'CE101', 'Emily Miller', '1993-12-20', '2010'),
('S033', 'CE101', 'Andrew Davis', '1992-08-04', '2010'),
('S034', 'CE101', 'Grace Garcia', '1991-07-12', '2010'),
('S035', 'CE201', 'Madison Martinez', '1993-06-15', '2010'),
('S036', 'CE201', 'Alexander Smith', '1992-03-28', '2010'),
('S037', 'CE201', 'Mia Brown', '1991-09-10', '2010'),
('S038', 'CE201', 'Daniel Miller', '1992-12-20', '2010'),
('S039', 'CE201', 'Evelyn Davis', '1993-08-04', '2010'),
('S040', 'CE201', 'Jackson Garcia', '1990-07-12', '2010'),
('S041', 'CE201', 'Victoria Robinson', '1993-04-30', '2010'),
('S042', 'CE201', 'Andrew Adams', '1992-12-22', '2010'),
('S043', 'EE101', 'Michael Robinson', '1992-04-30', '2010'),
('S044', 'EE101', 'Sophia Adams', '1991-12-22', '2010'),
('S045', 'EE101', 'David Martinez', '1990-09-18', '2010'),
('S046', 'EE101', 'Emma Moore', '1993-03-08', '2010'),
('S047', 'EE101', 'James Garcia', '1991-06-12', '2010'),
('S048', 'EE101', 'Lily Johnson', '1992-08-20', '2010'),
('S049', 'EE201', 'Chloe Johnson', '1991-06-15', '2010'),
('S050', 'EE201', 'Daniel Smith', '1992-03-28', '2010'),
('S051', 'EE201', 'Grace Brown', '1993-09-10', '2010'),
('S052', 'EE201', 'Henry Miller', '1990-12-20', '2010'),
('S053', 'EE201', 'Isabella Davis', '1991-08-04', '2010'),
('S054', 'EE201', 'James Garcia', '1992-07-12', '2010'),
('S055', 'EE201', 'Katherine Robinson', '1993-04-30', '2010'),
('S056', 'EE201', 'Liam Adams', '1992-12-22', '2010'),
('S057', 'MRI101', 'Oliver Smith', '1992-05-15', '2010'),
('S058', 'MRI101', 'Ava Brown', '1991-02-28', '2010'),
('S059', 'MRI101', 'Logan Davis', '1990-08-10', '2010'),
('S060', 'MRI101', 'Chloe Miller', '1993-11-20', '2010'),
('S061', 'MRI101', 'Jackson Garcia', '1992-07-04', '2010'),
('S062', 'MRI102', 'Mia Robinson', '1991-04-30', '2010'),
('S063', 'MRI102', 'Ethan Adams', '1992-12-22', '2010'),
('S064', 'MRI102', 'Hannah Martinez', '1991-09-18', '2010'),
('S065', 'MRI102', 'Noah Moore', '1992-03-08', '2010'),
('S066', 'MRI102', 'Avery Johnson', '1992-06-12', '2010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_name`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_name`),
  ADD KEY `campus_name` (`campus_name`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_title`,`faculty_name`),
  ADD KEY `faculty_name` (`faculty_name`);

--
-- Indexes for table `committee_lecturer`
--
ALTER TABLE `committee_lecturer`
  ADD PRIMARY KEY (`staff_id`,`committee_title`,`faculty_name`),
  ADD KEY `committee_title` (`committee_title`,`faculty_name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `programme_code` (`programme_code`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`course_code`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_name`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `school_name` (`school_name`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `lecturer_course`
--
ALTER TABLE `lecturer_course`
  ADD PRIMARY KEY (`staff_id`,`course_code`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `pre_course`
--
ALTER TABLE `pre_course`
  ADD PRIMARY KEY (`course_code`,`precourse_code`),
  ADD KEY `precourse_code` (`precourse_code`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`programme_code`),
  ADD KEY `school_name` (`school_name`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_name`),
  ADD KEY `campus_name` (`campus_name`),
  ADD KEY `faculty_name` (`faculty_name`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_name`,`club_name`),
  ADD KEY `club_name` (`club_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `programme_code` (`programme_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`campus_name`) REFERENCES `campus` (`campus_name`);

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`faculty_name`) REFERENCES `faculty` (`faculty_name`);

--
-- Constraints for table `committee_lecturer`
--
ALTER TABLE `committee_lecturer`
  ADD CONSTRAINT `committee_lecturer_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `lecturer` (`staff_id`),
  ADD CONSTRAINT `committee_lecturer_ibfk_2` FOREIGN KEY (`committee_title`,`faculty_name`) REFERENCES `committee` (`committee_title`, `faculty_name`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`programme_code`) REFERENCES `programme` (`programme_code`);

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`school_name`) REFERENCES `school` (`school_name`),
  ADD CONSTRAINT `lecturer_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `lecturer` (`staff_id`);

--
-- Constraints for table `lecturer_course`
--
ALTER TABLE `lecturer_course`
  ADD CONSTRAINT `lecturer_course_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `lecturer` (`staff_id`),
  ADD CONSTRAINT `lecturer_course_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `pre_course`
--
ALTER TABLE `pre_course`
  ADD CONSTRAINT `pre_course_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `pre_course_ibfk_2` FOREIGN KEY (`precourse_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`school_name`) REFERENCES `school` (`school_name`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`campus_name`) REFERENCES `campus` (`campus_name`),
  ADD CONSTRAINT `school_ibfk_2` FOREIGN KEY (`faculty_name`) REFERENCES `faculty` (`faculty_name`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`club_name`) REFERENCES `club` (`club_name`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`programme_code`) REFERENCES `programme` (`programme_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
