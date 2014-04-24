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
		<div class = "EditorDiv2" style="float: left; bottom: 10px">
			<table class="tablesmall" style="float: left; position:relative; width:100%;">
				<th COLSPAN="5">
					<h3><br>All Papers</h3>
				</th>
				<tr>
					<td width="45%">Title</td>
					<td width="15%">Date Submitted</td>
					<td width="15%">Reviewers Assigned</td>
					<td width="15%">Status Assigned</td>
					<td width="10%">Selected</td>

				<?php  $result = mysqli_query($con,"SELECT * FROM `Paper`");

				        while($row = mysqli_fetch_array($result)){ ?>
					  <tr>
					    <td><?php echo $row['title'];?></td>
					    <td><?php echo $row['date'];?></td>
					    <td><?php switch ($row['reviewers_assigned1']){
								case 0:
								  echo "NO";
								  break;
								default:
								  echo "Yes";
								} ?></td>
					    <td><?php switch ($row['status']){
								case 1:
								  echo "approved";
								  break;
								case 2:
								  echo "rejected";
								  break;
								default:
								  echo "pending";
								} ?></td>
						<td>
						<form style="font-size:20px; position:relative; left: 13px; top: 8px;">
							<input type="radio"><br>
							</form>
						</td>
					  </tr>
					<?php } ?>
				
			
			</table>
			<form style=" float: left; position:relative; bottom: -10px; text-align:center" name="input" action="">
				<input type="submit" value="Download">
			</form>
			<table class="tablesmall" style="float: left; position:relative; width:100%">
				<tr>
					<th COLSPAN="3"><h3>Reviewer Comments</h3>
					</th>
				</tr>
				<tr>
					<th width="20%">Reviewer</th>
					<th width="10%">Rating</th>
					<th width="70%">Comment</th>
				</tr>
				<tr ALIGN="CENTER">
				<?php $review = mysqli_query($con,"SELECT * FROM `User`,`Reviews` WHERE `User`.`userid` = `Reviews`.`userid` and `Reviews`.`paperid` = 11111"); 
				        while($row = mysqli_fetch_array($review)){?>
					  <tr>
					    <td><?php echo $row['fname'] . " " . $row['lname'];?></td>
					    <td><?php echo $row['rating'];?></td>
					    <td><?php echo $row['comment'];?></td>
					  </tr>
					<?php } ?>
			</table>
		</div>
		<div class="EditorDiv" style="float: left; left:2px; bottom: 10px">
			<table class="table" style="float: left; position:relative; width:100%">
				<tr>
					<th COLSPAN="3"><h3>Reviewers</h3>
					</th>
				</tr>
				<tr>
					<th width="70%">Reviewer</th>
					<td width="30%">Selected</td>
				<?php  $result = mysqli_query($con,"SELECT * FROM `User` WHERE `permission` = 2 and `userid` != 12346");

				        while($row = mysqli_fetch_array($result)){ ?>
					  <tr ALIGN="CENTER">
					    <td><?php echo $row['fname'] . " " . $row['lname'];?></td>					
						<td>
						<form style="font-size:20px; position:relative; left: 13px; top: 8px;">
							<input type="radio"><br>
							</form>
						</td>
					  </tr>
					<?php } ?>
				
			</table>
		</div>
		<form style="float: left; position:relative; bottom: -250px; left: 15px; text-align:center" name="input" action="">
				<input type="submit" value=">">
		</form>
		<form style="float: left; position:relative; bottom: -280px; right: 13px; text-align:center" name="input" action="">
				<input type="submit" value="<">
		</form>
		<div class="EditorDiv" style="float: left; left:2px; bottom: 10px">
			<table class="table" style="float: left; position:relative; width:100%">
				<tr>
					<th COLSPAN="3"><h3>Reviewer to Assign</h3>
					</th>
				</tr>
				<tr>
					<th width="70%">Reviewer</th>					
					<td width="30%">Selected</td>
				</tr>
			</table>
			<form style="float: left; position:relative; bottom: -10px; left: 33%" name="input" action="">
				<input type="submit" value="Submit Review">
			</form>
		</div>
	</div>
</body>