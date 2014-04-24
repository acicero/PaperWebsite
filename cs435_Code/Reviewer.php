<?php
$profpic = "images/sign-up-btn.gif";
?>
<?php
// Create connection

$con=mysqli_connect("localhost","root","","Paper_Website");

// Check connection

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<style>
table,th,td
{
border:1px solid black;
}
</style>

<body>
	<div class = "AuthorDiv" style="float: left;">
		<div class = "AuthorDiv2" style="float: left; bottom: 10px">
			<table class="tablesmall" style="position:relative; width:100%;">
				<th COLSPAN="4">
					<h3><br>Awaiting Review</h3>
				</th>
				<tr>
					<td width="60%">Title</td>
					<td width="15%">Date</td>					
					<td width="10%">Selected</td>
				<?php  $result = mysqli_query($con,"SELECT * FROM (SELECT * FROM `Paper` WHERE `Paper`.`paperid` NOT IN(SELECT `paperid` FROM `Reviews`)) tab WHERE ".							      "((tab.`reviewers_assigned1` = 12346) or(tab.`reviewers_assigned2` = 12346))");
				while($row = mysqli_fetch_array($result)){ ?>
					  <tr>
					    <td><?php echo $row['title'];?></td>
					    <td><?php echo $row['date'];?></td>
					    <td>
						<form style="font-size:20px; position:relative; left: 13px; top: 8px;">
							<input type="radio"><br>
							</form>
						</td>
					  </tr>
					<?php } ?>
				
			</table>
			<form style="position:relative; bottom: -10px; text-align:center" name="input" action="">
				<input type="submit" value="Download">
			</form>
			<table class="tablesmall" style="position:relative; width:100%; bottom: -10px">
				<th COLSPAN="4">
					<h3><br>Completed Review</h3>
				</th>
				<tr>
					<td width="60%">Title</td>
					<td width="15%">Date</td>
					<td width="15%">Status</td>
					<td width="10%">Selected</td>
				<?php  
					$result2 = mysqli_query($con,"SELECT * FROM `Reviews`,`Paper` WHERE `Reviews`.`userid` = 12346 and `Reviews`.`paperid` = `Paper`.`paperid` and "								."((`Paper`.`reviewers_assigned1` = 12346) or(`Paper`.`reviewers_assigned2` = 12346))");

					while($row = mysqli_fetch_array($result2)){ ?>
					  <tr>
					    <td><?php echo $row['title'];?></td>
					    <td><?php echo $row['date_reviewed'];?></td>
					    <td><?php switch ($row['status']){
								case 1:
								  echo "approved";
								  break;
								case 2:
								  echo "rejected";
								  break;
								default:
								  echo "pending";
								} ?> </td>
						<td>
						<form style="font-size:20px; position:relative; left: 13px; top: 8px;">
							<input type="radio"><br>
							</form>
						</td>
					  </tr>
					<?php } ?>
			
			</table>
		</div>
		<div class="AuthorDiv2" style="float: left; left:2px; bottom: 10px">

			<form style="position:relative; left:30%; bottom: -10px;" name="input" action="" method="get">
				Review Title: <input type="text" name="user">
			</form>
			<textarea rows="30" cols="72"></textarea>
			<form style="position:relative; bottom: -10px; text-align:center" name="input" action="">
				<input type="submit" value="Submit Review">
			</form>
		</div>
	</div>
</body>
