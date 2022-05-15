<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$coursename =$_POST['coursename'];
$tableDeletion = "DROP TABLE $coursename";
$courseDeletion = "DELETE FROM allthecourses WHERE allthecourses.Courseid = $_POST[courseid]";
// sql to create table
$stmt = $con->prepare($courseDeletion);
$stmt->execute();
$stmt1 = $con->prepare($tableDeletion);
$stmt1->execute();


header('Location: teacherhome.php');


?>