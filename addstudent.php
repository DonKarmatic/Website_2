<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$thisid = $_POST['sid']; //takes checkbox input for student id
$theone = $_GET["msg1"];
//$coursename = $_POST['namecourse'];
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$query = "SELECT * FROM `accounts`  WHERE usertype = 'student' "; //to check all students
$result = mysqli_query($con, $query); //uses connection to run query
$resultCheck = mysqli_num_rows($result); //gets the number of student rows the query produces

if($resultCheck > 0){

	while($srow = mysqli_fetch_assoc($result)){

		if($srow['id'] == $thisid){

			$sid = $srow['id'];
			$sname = $srow['username'];
			$semail = $srow['email'];

			$sql = "INSERT INTO $theone (studentid, studentsname, studentemail, reg_date) VALUES ('$sid', '$sname', '$semail', current_timestamp());";
			mysqli_query($con, $sql);
			echo $theone;
			header("Location: tables-general.php?msg=$theone");
			exit();
		}
	}


	}



//$sql = "INSERT INTO fourthtest (studentid, studentsname, studentemail, reg_date) VALUES ('$testid', '$testname', '$testemail', current_timestamp())";
//$addstudents = "INSERT INTO fourthtest (studentid, studentsname, studentemail, reg_date) VALUES (?, ?, ?, current_timestamp());";
// sql to create table


//$stmt = $con->prepare($addstudents);
//$stmt->bind_param('sss', $_POST['pleasework3'], $_POST['pleasework1'], $_POST['pleasework2']);
//$stmt->execute();
//mysqli_query($con, $sql);
//header("Location: tables-general.php?msg=FourthTest");
//exit();

?>
