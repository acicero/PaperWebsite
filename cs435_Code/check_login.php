<?php

session_start();
ob_start();

$con=mysqli_connect("localhost","root","","Paper_Website");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

$myusername = stripslashes($myusername);
$myusername = mysql_real_escape_string($myusername);
$mypassword = hash('md5', $mypassword);


$result = mysqli_query($con,"SELECT * FROM 'User' WHERE 'email' = '$myusername';");
if(mysql_num_rows($result) == 0)
{
	header('Location: index.php'); //failed attempt to login username not found
}

$userdata = mysql_fetch_array($result);
if($userdata['password'] != $mypassword) 
{
	header('Location: index.php');
} else {
	session_regenerate_id();
	$_SESSION['session_user_id'] = $userdata['userid']; 
	$_SESSION['session_user_name'] = $userdata['email']; 
	$permission = $userdata['permission'];
	switch($permission)
	{
		case 0:
			header('Location: Editor.php');
			break;
		case 1:
			header('Location: Author.php');
			break;
		case 2:
			header('Location: Reviewer.php');
			break;
	}
}

?>
