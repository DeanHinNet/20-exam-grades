<?php
session_start();
require('new-connection.php');

$query="SELECT id, first_name, last_name FROM students";
$students = fetch_all($query);

//$cheese = 'banana';
//echo $query;
//var_dump($students);
if(isset($_SESSION['records']))
{
	
}
?>
<html>
<head>
	<title>Teacher Page</title>
	<link rel='stylesheet' type='text/css' href='main.css'
</head>
<body>
	<div class='wrapper'>
		<div class='header'>
			<h1>Welcome Teacher!</h1>
			<label>Select Student</label>
			
			<button>Show Exam Records</button>
			<form action='process.php' method='post'>
				<input type='hidden' name='action' value='select_record'>
				<select name='student_id'>
					<option value=''>Choose Student</option>
					<?php
						foreach($students as $student)
						{
							echo "<option value='".$student['id']."'>".$student['first_name']." ".$student['last_name']."</option>";
						}
					?>
				</select>
				<input type='submit' value='show'>
			</form>

		</div>
		<div class=''>
			<h2 id='student_name'></h2>
			<table border='1'>
				<thead>
					<tr>
						<th>Exam ID</th>
						<th>Subject</th>
						<th>Grade</th>
						<th>Status(Passed/Failed)</th>
						<th>Teacher's Notes</th>
						<th>Action</th>
					<tr>
				</thead>
				<tbody>
					<?php
					if(isset($_SESSION['records']))
					{
						foreach($_SESSION['records'] as $record)
						{
							echo "<tr>";
								echo "<td>" . $record['exam_id'] . "</td>";
								echo "<td>" . $record['subject'] . "</td>";
								echo "<td>" . $record['grade'] . "</td>";
								if($record['grade'] <= 75)
								{
									echo "<td>Failed</td>";
								} 
								else
								{
									echo "<td>Passed</td>";
								}
								echo "<td>" . $record['notes'] . "</td>";
								echo "<td>" . $record['notes'] . "</td>";
							echo "</tr>";
						}
					}
					?>
				</tbody>
			</table>
			<button id='add_record'>Add a Record</button>
		</div>
	</div>
</body>
</html>