CREATE DATABASE db_university;
USE db_university;

CREATE TABLE campus (
    campus_name VARCHAR(30) NOT NULL,
    campus_address VARCHAR(50),
    distance NUMERIC(8,2),
    bus_no VARCHAR(10),
    PRIMARY KEY (campus_name)
);

CREATE TABLE faculty (
    faculty_name VARCHAR(30) NOT NULL,
    dean_name VARCHAR(30),
    faculty_building VARCHAR(30),
    PRIMARY KEY (faculty_name)
);

CREATE TABLE school (
    school_name VARCHAR(50) NOT NULL,
    campus_name VARCHAR(30) NOT NULL,
    faculty_name VARCHAR(30) NOT NULL,
    school_building VARCHAR(30),
    PRIMARY KEY (school_name),
    FOREIGN KEY (campus_name) REFERENCES campus (campus_name),
    FOREIGN KEY (faculty_name) REFERENCES faculty (faculty_name)
);

CREATE TABLE programme (
    programme_code VARCHAR(10) NOT NULL,
    school_name VARCHAR(50) NOT NULL,
    programme_title VARCHAR(50) NOT NULL,
    programme_level VARCHAR(20),
    programme_length VARCHAR(4),
    PRIMARY KEY (programme_code),
    FOREIGN KEY (school_name) REFERENCES school (school_name)
);

CREATE TABLE student (
    student_id VARCHAR(10) NOT NULL,
    programme_code VARCHAR(10) NOT NULL,
    student_name VARCHAR(30) NOT NULL,
    student_birth DATE,
    year_enrolled VARCHAR(4),
    PRIMARY KEY (student_id),
    FOREIGN KEY (programme_code) REFERENCES programme (programme_code)
);

CREATE TABLE course (
    course_code VARCHAR(10) NOT NULL,
    programme_code VARCHAR(10) NOT NULL,
    course_title VARCHAR(30) NOT NULL,
    PRIMARY KEY (course_code),
    FOREIGN KEY (programme_code) REFERENCES programme (programme_code)
);

CREATE TABLE course_student (
    course_code VARCHAR(10) NOT NULL,
    student_id VARCHAR(10) NOT NULL,
    year_taken VARCHAR(4),
    semester_taken VARCHAR(20),
    grade_award VARCHAR(20),
    PRIMARY KEY (course_code, student_id),
    FOREIGN KEY (student_id) REFERENCES student (student_id),
    FOREIGN KEY (course_code) REFERENCES course (course_code)
);

CREATE TABLE club (
    club_name VARCHAR(30) NOT NULL,
    campus_name VARCHAR(30) NOT NULL,
    club_building VARCHAR(30) NOT NULL,
    club_phone VARCHAR(15) NOT NULL,
    PRIMARY KEY (club_name),
    FOREIGN KEY (campus_name) REFERENCES campus (campus_name)
);

CREATE TABLE sport (
    sport_name VARCHAR(30) NOT NULL,
    club_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (sport_name, club_name),
    FOREIGN KEY (club_name) REFERENCES club (club_name)
);

CREATE TABLE pre_course (
    course_code VARCHAR(10) NOT NULL,
    precourse_code VARCHAR(10) NOT NULL,
    PRIMARY KEY (course_code, precourse_code),
    FOREIGN KEY (course_code) REFERENCES course (course_code),
    FOREIGN KEY (precourse_code) REFERENCES course (course_code)
);

CREATE TABLE lecturer (
    staff_id VARCHAR(10) NOT NULL,
    school_name VARCHAR(50) NOT NULL,
    supervisor_id VARCHAR(10),
    lecturer_name VARCHAR(30) NOT NULL,
    lecturer_title VARCHAR(30),
    office_room VARCHAR(10),
    PRIMARY KEY (staff_id),
    FOREIGN KEY (school_name) REFERENCES school (school_name),
    FOREIGN KEY (supervisor_id) REFERENCES lecturer (staff_id)
);

CREATE TABLE lecturer_course (
    staff_id VARCHAR(10) NOT NULL,
    course_code VARCHAR(10) NOT NULL,
    PRIMARY KEY (staff_id, course_code),
    FOREIGN KEY (staff_id) REFERENCES lecturer (staff_id),
    FOREIGN KEY (course_code) REFERENCES course (course_code)
);

CREATE TABLE committee (
    committee_title VARCHAR(30) NOT NULL,
    faculty_name VARCHAR(30) NOT NULL,
    meeting_frequency VARCHAR(10),
    PRIMARY KEY (committee_title, faculty_name),
    FOREIGN KEY (faculty_name) REFERENCES faculty (faculty_name)
);

CREATE TABLE committee_lecturer (
    staff_id VARCHAR(10) NOT NULL,
    committee_title VARCHAR(30) NOT NULL,
    faculty_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (staff_id, committee_title, faculty_name),
    FOREIGN KEY (staff_id) REFERENCES lecturer (staff_id),
    FOREIGN KEY (committee_title, faculty_name) REFERENCES committee (committee_title, faculty_name)
);

