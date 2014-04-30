<?php
if(!(isset(_SESSION['permission'])){
	header('location: index.php');
}
$con=mysqli_connect("localhost","root","","Paper_Website");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$paperid = $_POST['papers'];

$result = mysqli_query($con, "SELECT * FROM `Paper` WHERE `paperid` = '$paperid'");

$row = mysqli_fetch_array($result);
if(!is_null($row)){
	
	$file_name = $_SERVER['DOCUMENT_ROOT'] . '/website/PaperWebsite/papers/' . $row['paper_pdf'];
	if(file_exists($file_name)){

		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
		header('Content-Length: ' . filesize($file_name));
		readfile($file_name);
	}
	
}

?>