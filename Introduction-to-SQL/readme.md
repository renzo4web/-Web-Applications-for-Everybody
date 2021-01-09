# Tables for the Assignment

```
DROP TABLE IF EXISTS Member;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS Course;

CREATE TABLE `User` (
    user_id     INTEGER NOT NULL AUTO_INCREMENT,
    name        VARCHAR(128) UNIQUE,
    PRIMARY KEY(user_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE Course (
    course_id     INTEGER NOT NULL AUTO_INCREMENT,
    title         VARCHAR(128) UNIQUE,
    PRIMARY KEY(course_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE Member (
    user_id       INTEGER,
    course_id     INTEGER,
    role          INTEGER,

    CONSTRAINT FOREIGN KEY (user_id) REFERENCES `User` (user_id)
      ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (course_id) REFERENCES Course (course_id)
       ON DELETE CASCADE ON UPDATE CASCADE,

    PRIMARY KEY (user_id, course_id)
) ENGINE=InnoDB CHARACTER SET=utf8;
```
Note that we need to surround User with back-quotes (i.e. `User` because it is a keyword in later versions of MySQL.

## Course Data
```
Uri, si106, Instructor
Becky, si106, Learner
Klein, si106, Learner
Nikolai, si106, Learner
Sharilee, si106, Learner
Nelson, si110, Instructor
Jazeb, si110, Learner
Michaela, si110, Learner
Nazzera, si110, Learner
Yoji, si110, Learner
Elsbeth, si206, Instructor
Hamad, si206, Learner
Kaiden, si206, Learner
Shauni, si206, Learner
Truli, si206, Learner
```
** You can test to see if your data has been entered properly with the following SQL statement.**
```
SELECT `User`.name, Course.title, Member.role
    FROM `User` JOIN Member JOIN Course
    ON `User`.user_id = Member.user_id AND Member.course_id = Course.course_id
    ORDER BY Course.title, Member.role DESC, `User`.name
```

## Insert Data to user

```
INSERT INTO `User` (name) VALUES ("Uri");
INSERT INTO `User` (name) VALUES ("Becky");
INSERT INTO `User` (name) VALUES ("Klein");
INSERT INTO `User` (name) VALUES ("Nikolai");
INSERT INTO `User` (name) VALUES ("Sharilee");
INSERT INTO `User` (name) VALUES ("Nelson");
INSERT INTO `User` (name) VALUES ("Jazeb");
INSERT INTO `User` (name) VALUES ("Michaela");
INSERT INTO `User` (name) VALUES ("Nazzera");
INSERT INTO `User` (name) VALUES ("Yoji");
INSERT INTO `User` (name) VALUES ("Elsbeth");
INSERT INTO `User` (name) VALUES ("Hamad");
INSERT INTO `User` (name) VALUES ("Kaiden");
INSERT INTO `User` (name) VALUES ("Shauni");
INSERT INTO `User` (name) VALUES ("Truli");
```
## Insert Data to Course

```
    INSERT INTO Course (title) VALUES("si106")
    INSERT INTO Course (title) VALUES("si110")
    INSERT INTO Course (title) VALUES("si206")
```
## Insert Data to Member

```
INSERT INTO Member (user_id , course_id , role) VALUES ( 1, 1, 1);
INSERT INTO Member (user_id , course_id , role) VALUES ( 2, 1, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 3, 1, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 4, 1, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 5, 1, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 6, 2, 1);
INSERT INTO Member (user_id , course_id , role) VALUES ( 7, 2, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 8, 2, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 9, 2, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 10, 2, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 11, 3, 1);
INSERT INTO Member (user_id , course_id , role) VALUES ( 12, 3, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 13, 3, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 14, 3, 0);
INSERT INTO Member (user_id , course_id , role) VALUES ( 15, 3, 0);
```