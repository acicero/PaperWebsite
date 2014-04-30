<?php 
session_start();
$con=mysqli_connect("localhost","root","","Paper_Website");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$temp = explode('.', $_FILES['file']['name']);

$userid = _SESSION['session_user_id'];
$title = $_GET['title'];

$result = mysqli_query($con,"SELECT COUNT(`paperid`) FROM `Paper`");
$row = mysqli_fetch_array($result);
$paperid = 10000 + $row['COUNT(`paperid`)'];

$paper_pdf = $title . $paperid;

$result = mysqli_query($con,"INSERT INTO `User`(`userid`, `title`, `paperid`, `reviews_assigned_1`, `paper_pdf`, `satus`, `reviews_assigned_2`) VALUES ('$userid','$title','$paperid',`NULL`,'$paper_pdf',`NULL`)");


header('location: Author.php');




?>