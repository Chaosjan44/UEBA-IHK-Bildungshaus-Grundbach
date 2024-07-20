CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(128) NOT NULL,
  `teacher` tinyint(1) NOT NULL DEFAULT 0,
  `student` tinyint(1) NOT NULL DEFAULT 1,
  `perm_login` tinyint(1) NOT NULL DEFAULT 0,
  `perm_admin` tinyint(1) NOT NULL DEFAULT 0,
  `perm_edit_courses` tinyint(1) NOT NULL DEFAULT 0,
  `perm_seeall_courses` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE `securitytokens` (
  `securitytoken_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(5),
  `identifier` varchar(255),
  `securitytoken` varchar(255),
  `created_at` timestamp DEFAULT current_timestamp(),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
);

CREATE TABLE `jobs` (
  `job_id` int(5) PRIMARY KEY,
  `job_name` varchar(64)
);

CREATE TABLE `companies` (
  `company_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128),
  `address_street` varchar(90),
  `address_number` varchar(16),
  `address_plz` varchar(5),
  `address_city` varchar(64),
  `notes` mediumtext
);

CREATE TABLE `instructors` (
  `instructor_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `company_id` int(5),
  `firstname` varchar(40),
  `surname` varchar(40),
  `email` varchar(128),
  `tel` varchar(40),
  `pronouns` varchar(16),
  `notes` mediumtext,
  FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`)
);

CREATE TABLE `students` (
  `student_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(5),
  `company_id` int(5),
  `instructor_id` int(5),
  `job_id` int(5),
  `tel` varchar(40),
  `birthday` datetime,
  `pronouns` varchar(16),
  `path_to_pic` varchar(64),
  `notes` mediumtext,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`)
);

CREATE TABLE `courses` (
  `course_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `number` varchar(64),
  `name` varchar(64),
  `notes` mediumtext
);

CREATE TABLE `student_courses` (
  `students_courses_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `course_id` int(5),
  `student_id` int(5),
  FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
);

CREATE TABLE `teachers` (
  `teacher_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(5),
  `tel` varchar(40),
  `pronouns` varchar(16),
  `path_to_pic` varchar(64),
  `notes` mediumtext,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
);

CREATE TABLE `rooms` (
  `room_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `room_number` varchar(16),
  `room_desc` varchar(64),
  `notes` mediumtext
);

CREATE TABLE `course_instances` (
  `course_inst_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `course_id` int(5),
  `room_id` int(5),
  `from` datetime,
  `to` datetime,
  FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  FOREIGN KEY (`course_id`) REFERENCES `rooms` (`room_id`)
);

CREATE TABLE `course_instances_teachers` (
  `course_inst_tech_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `course_inst_id` int(5),
  `teacher_id` int(5),
  FOREIGN KEY (`course_inst_id`) REFERENCES `course_instances` (`course_inst_id`),
  FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`)
);

INSERT INTO `users` (`user_id`, `login`, `password`, `firstname`, `surname`, `email`) VALUES
(0, 'Admin', '$2y$10$LcuHyznyyzyznSuO.2nSuO.2znSyznSyznSuO.2uO.2uO.2yznSyznSuO.2yznSuOyznSuO.2.2uO.2yznSuOyznSuO.2.2SyznSuyznSuO.2O.2yznSuO.2uO.2UyznSyznSyznSuO.yznSuO.22uO.2uO.27yznSuO.2cUyznSuO.2', 'Admin', 'Admin', 'admin@schniebs.dev');