<?php
session_start();
require('new-connection.php');

$query="SELECT id, first_name, last_name FROM students";
$students = fetch_all($query);

//$cheese = 'banana';
//echo $query;

if(isset($_SESSION['records']))
{
	
}
?>
<html>
<head>
	<title>Teacher Page</title>
	<link rel='stylesheet' type='text/css' href='main.css'>
</head>
<body>
	<div class='wrapper'>
		<div class='header'>
			<h1>Welcome Teacher!</h1>
			<form action='logoff.php' method='post'>
				<input type='hidden' name='action' value='log_off'>
				<input type='submit' value='Log Off'>
			</form>
			<label>Select Student</label>
			

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

			<form action='process.php' method='post'>
				<input type='hidden' name='action' value='select_all'>
				<input type='submit' value='Show All Students'>
			</form>
		</div>
		<div class=''>
			<h2 id='student_name'>
				<?php 
					if(isset($_SESSION['options']) && $_SESSION['options'] == 'single')
					{
						echo "<th>" . $_SESSION['records'][0]['first_name'] . " " . $_SESSION['records'][0]['last_name']. "</th>";
					}
				?>
			</h2>
			<table border='1'>
				<thead>
					<tr>
						<?php
						if(isset($_SESSION['options']) && $_SESSION['options'] == 'all')
						{
							echo "<th>Student Name</th>";
						}
						?>
						<th>Exam Name</th>
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

								if($_SESSION['options'] == 'all')
								{
									echo "<td>" . $record['first_name'] . " " . $record['last_name'] . "</td>";
								}
								echo "<td>" . $record['exam_name'] . "</td>";
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
								echo "<td>
												<form action='process.php' method='post'>
													<input type='hidden' name='action' value='delete_record'>
													<input type='hidden' name='exam_id' value='" . $record['exam_id'] . "'>
													<input type='submit' value='Delete'>
												</form>
											</td>";
							echo "</tr>";
						}
					}
					?>
				</tbody>
			</table>
			<button id='new_record'>New Record</button>
			
			<div id='add_block' class='hide_me'>
				<form action='process.php' method='post'>
					<select id='select_new' name='student_id'>
						<option>CHOOSE</option>
						<option value='new_student'>New Student</option>
						<?php
							foreach($students as $student)
							{
								echo "<option value='".$student['id']."'>".$student['first_name']." ".$student['last_name']."</option>";
							}
						?>
					</select>
					<div id='add_new_name' class='hide_me'>
						<section>
							<label for='first_name'>First Name</label>
							<input id='new_first' type='text' name='first_name'>
						</section>
						<section>
							<label for='last_name'>Last Name</label>
							<input id='new_last' type='text' name='last_name'>
						</section>
					</div>
					<section>
						<label for='exam_name'>Exam Name</label>
						<input id='add_name' type='text' name='exam_name'>
					</section>
					<section>
						<label for='subject'>Subject</label>
						<input id='add_subject' type='text' name='subject'>
					</section>
					<section>
						<label for='grade'>Grade</label>
						<input id='add_grade' type='text' name='grade'>
					</section>
					<section>
						<label for='date_taken'>Date Taken</label>
						<input id='add_date' type='text' name='date_taken'>
					</section>
					<section>
						<label for='date_taken'>Notes</label>
						<input id='add_note' type='text' name='notes'>
					</section>

					<input type='hidden' name='action' value='add_record'>
					<input type='submit' value='Add Record'>
					
				</form>
			</div>

		</div>
	</div>
</body>
<script src='myscript.js'></script>
</html>