<?php
session_start();
require('new-connection.php');
//var_dump($_POST);

//When a single student is selected, this will active and retrieve the exams for the student.
if(isset($_POST['action']) && $_POST['action'] == 'select_record')
{
	$query = "SELECT students.id AS student_id, first_name, last_name, exams.name AS exam_name, exams.grade, exams.idexams AS exam_id, exams.subject, exams.notes
	FROM students_has_exams
	LEFT JOIN students ON students.id=students_has_exams.students_id
	RIGHT JOIN exams ON exams.idexams=students_has_exams.exams_idexams
	WHERE students.id='{$_POST['student_id']}'";

	$results = fetch_all($query);
	//var_dump($results);

	$_SESSION['options'] = 'single';
	$_SESSION['records'] = $results;
	header('location: index.php');
	exit();
}

//When "Show All Exams" is selected, this will return all the exams with student names.
if(isset($_POST['action']) && $_POST['action'] == 'select_all')
{
	$query = "SELECT students.id AS student_id, first_name, last_name, exams.name AS exam_name, exams.grade, exams.idexams AS exam_id, exams.subject, exams.notes
	FROM students_has_exams
	LEFT JOIN students ON students.id=students_has_exams.students_id
	RIGHT JOIN exams ON exams.idexams=students_has_exams.exams_idexams";

	$results = fetch_all($query);


	$_SESSION['options'] = "all";
	$_SESSION['records'] = $results;
	header('location: index.php');
	exit();
}

//When a new record is added, this will activate.
if(isset($_POST['action']) && $_POST['action'] == 'add_record')
{
	//NEED TO VALIDATE ENTRIES
	$query = "INSERT INTO exams (subject, grade, created_at, updated_at, date_taken, name) VALUES ('{$_POST['subject']}', '{$_POST['grade']}', NOW(), NOW(), NOW(), '{$_POST['exam_name']}')";
	$exam_id = run_mysql_query($query);
	$query = "INSERT INTO students_has_exams (students_id, exams_idexams) VALUES ('{$_POST['student_id']}', '{$exam_id}')";
	run_mysql_query($query);

	$query = "SELECT students.id AS student_id, first_name, last_name, exams.name AS exam_name, exams.grade, exams.idexams AS exam_id, exams.subject, exams.notes
	FROM students_has_exams
	LEFT JOIN students ON students.id=students_has_exams.students_id
	RIGHT JOIN exams ON exams.idexams=students_has_exams.exams_idexams
	WHERE students.id='{$_POST['student_id']}'";

	$results = fetch_all($query);	

	$_SESSION['options'] = 'single';
	$_SESSION['records'] = $results;
	header('location: index.php');
	exit();
}

//When the delete button is hit, it will delete the specific record.
if(isset($_POST['action']) && $_POST['action'] == 'delete_record')
{
	
}
?>