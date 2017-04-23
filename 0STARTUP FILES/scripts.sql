USE greengrades;

SELECT * FROM students;
SELECT * FROM exams;
SELECT * FROM students_has_exams;

INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Bruce', 'Banner', NOW(), NOW());
INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Peter', 'Parker', NOW(), NOW());
INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Tony', 'Stark', NOW(), NOW());

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '89', NOW(), NOW(), NOW(), 'Quadratic Formulas');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '92', NOW(), NOW(), NOW(), 'Quadratic Formulas');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '95', NOW(), NOW(), NOW(), 'Quadratic Formulas');

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '91', NOW(), NOW(), '2017-04-18', 'Derivatives');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '93', NOW(), NOW(), '2017-04-18', 'Derivatives');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '97', NOW(), NOW(), '2017-04-18', 'Derivatives');

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '88', NOW(), NOW(), '2017-04-15', 'DNA');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '87', NOW(), NOW(), '2017-04-15', 'DNA');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '91', NOW(), NOW(), '2017-04-15', 'DNA');

INSERT INTO students_has_exams (students_id, exams_idexams) VALUES ('1', '9');

SELECT first_name, last_name FROM students;