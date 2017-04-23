USE greengrades;

SELECT * FROM students;
SELECT * FROM exams;
SELECT * FROM students_has_exams;

INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Bruce', 'Banner', NOW(), NOW());
INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Peter', 'Parker', NOW(), NOW());
INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Tony', 'Stark', NOW(), NOW());
INSERT INTO students (first_name, last_name, created_at, updated_at) VALUES ('Wade', 'Wilson', NOW(), NOW());

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '89', NOW(), NOW(), NOW(), 'Quadratic Formulas');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '92', NOW(), NOW(), NOW(), 'Quadratic Formulas');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '95', NOW(), NOW(), NOW(), 'Quadratic Formulas');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '70', NOW(), NOW(), NOW(), 'Quadratic Formulas');

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '91', NOW(), NOW(), '2017-04-18', 'Derivatives');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '93', NOW(), NOW(), '2017-04-18', 'Derivatives');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('math', '97', NOW(), NOW(), '2017-04-18', 'Derivatives');

INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '88', NOW(), NOW(), '2017-04-15', 'DNA');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '87', NOW(), NOW(), '2017-04-15', 'DNA');
INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('science', '91', NOW(), NOW(), '2017-04-15', 'DNA');

INSERT INTO students_has_exams (students_id, exams_idexams) VALUES ('4', '10');

SELECT first_name, last_name FROM students;

SELECT students.id AS student_id, first_name, last_name, exams.name AS exam_name, exams.grade
FROM students_has_exams
LEFT JOIN students ON students.id=students_has_exams.students_id
RIGHT JOIN exams ON exams.idexams=students_has_exams.exams_idexams
WHERE students.id='1';

INSERT INTO students_has_exams (students_id, exams_idexams) VALUES ('1', '11');

DELETE FROM exams
WHERE id =;


SELECT students_id FROM studentns_has_exams WHERE exams_idexams = 2;

DELETE FROM exams WHERE idexams = 11;

DELETE FROM exams WHERE idexams = 14;

DELETE FROM students_has_exams WHERE exams_idexams = 13;