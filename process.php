<?php
session_start();
require('new-connection.php');


//grab the record for the selected student
//var_dump($_POST);


// echo "NOPE";


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



?>