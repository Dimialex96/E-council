CREATE TABLE users (
user_id     INT(8) NOT NULL AUTO_INCREMENT,
user_name   VARCHAR(30) NOT NULL,
user_pass   VARCHAR(255) NOT NULL,
user_email  VARCHAR(255) NOT NULL,
user_date   DATETIME NOT NULL,
user_level  ENUM('admin', 'student', 'professor', 'moderator'),
UNIQUE INDEX user_name_unique (user_name),
user_
PRIMARY KEY (user_id)
) TYPE=INNODB;

CREATE TABLE student (
student_id     INT(8) NOT NULL REFERENCES users(id),
user_level  ENUM('student') default 'student',
PRIMARY KEY (student_id)
) TYPE=INNODB;

CREATE TABLE categories (
cat_id          INT(8) NOT NULL AUTO_INCREMENT,
cat_name        VARCHAR(255) NOT NULL,
cat_description     VARCHAR(255) NOT NULL,
UNIQUE INDEX cat_name_unique (cat_name),
PRIMARY KEY (cat_id)
) TYPE=INNODB;

CREATE TABLE subjects (
subject_id        INT(8) NOT NULL AUTO_INCREMENT,
subject_name       VARCHAR(255) NOT NULL,
subject_date      DATETIME NOT NULL,
subject_cat       INT(8) NOT NULL,
subject_by        INT(8) NOT NULL,
subject_session  INT(8) NOT NULL,
subject_checked ENUM('0','1') NOT NULL,
subject_vote_count        INT(8) NOT NULL default 0,
PRIMARY KEY (topic_id)
) TYPE=INNODB;

CREATE TABLE comments (
comment_id         INT(8) NOT NULL AUTO_INCREMENT,
comment_content        TEXT NOT NULL,
comment_date       DATETIME NOT NULL,
comment_topic      INT(8) NOT NULL,
comment_by     INT(8) NOT NULL,
comment_check ENUM('0','1') NOT NULL,
PRIMARY KEY (post_id)
) TYPE=INNODB;

CREATE TABLE sessions (
session_id         INT(8) NOT NULL AUTO_INCREMENT,
start_date       DATETIME NOT NULL,
end_date       DATETIME NOT NULL,
activity numbers ENUM('0','1') NOT NULL,
PRIMARY KEY (post_id)
) TYPE=INNODB;

CREATE TABLE solutions (
solution_id         INT(8) NOT NULL AUTO_INCREMENT,
solution_content        TEXT NOT NULL,
solution_date       DATETIME NOT NULL,
solution_subject     INT(8) NOT NULL,
solution_by     INT(8) NOT NULL,
PRIMARY KEY (solution_id)
) TYPE=INNODB;

CREATE TABLE anouncements (
anouncement_id         INT(8) NOT NULL AUTO_INCREMENT,
announcements_content        TEXT NOT NULL,
announcements_date       DATETIME NOT NULL,
announcement_by     INT(8) NOT NULL,
PRIMARY KEY (announcements_id)
) TYPE=INNODB;

CREATE TABLE social_hour_subject (
sh_subject_id         INT(8) NOT NULL AUTO_INCREMENT,
sh_subject_content        TEXT NOT NULL,
sh_subject_date       DATETIME NOT NULL,
announcement_by     INT(8) NOT NULL,
sh_subject_vote_count        INT(8) NOT NULL default 0,
PRIMARY KEY (announcements_id)
) TYPE=INNODB;

CREATE TABLE results (
result_id         INT(8) NOT NULL AUTO_INCREMENT,
result_content        TEXT NOT NULL,
result_date       DATETIME NOT NULL,
PRIMARY KEY (resut_id)
  
) TYPE=INNODB;



ALTER TABLE topics ADD FOREIGN KEY(topic_cat) REFERENCES categories(cat_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE topics ADD FOREIGN KEY(topic_by) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE posts ADD FOREIGN KEY(post_by) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE topics ADD FOREIGN KEY(topic_session) REFERENCES sessions(session_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE solutions ADD FOREIGN KEY(solution_subject) REFERENCES subject(subject_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE solutions ADD FOREIGN KEY(solution_by) REFERENCES student(student_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE announcements ADD FOREIGN KEY(announcement_by) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE social_hour_subject ADD FOREIGN KEY(announcement_by) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
