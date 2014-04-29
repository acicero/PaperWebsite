<!--<?php
$profpic = "images/sign-up-btn.gif";
session_start();
if(!isset($_SESSION['session_user_id']) || !isset($_SESSION['permission']) || trim($_SESSION['permission']) != '1' || trim($_SESSION['permission']) != '2'){
	header('location: index.php');
}
?> -->
<?php

// Create connection
$con=mysqli_connect("localhost","root","","Paper_Website");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$paper_selected = 0;
if (isset($_POST['view_comments'])) {
    $paper_selected = $_POST['papers'];
    unset($_POST['view_comments']);    
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
			<form action="" method="post">
				<table class="table" style="position:relative; width:100%;">
					<th COLSPAN="4">
						<h3><br>Your Posted</h3>
					</th>
					<tr>
						<td width="60%">Title</td>
						<td width="15%">Date</td>
						<td width="15%">Status</td>
						<td width="10%">Selected</td>					
					<?php $result = mysqli_query($con,"SELECT * FROM `Paper` WHERE `userid` = " . $_SESSION['session_user_id']);
					      while($row = mysqli_fetch_array($result)){ ?>
						  <tr>						
  							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['date']; ?></td>		
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
								<input name= "papers" value= <?php echo $row['paperid']; ?> type="radio"<?php if(($row['paperid'] == $paper_selected)){echo "checked";}?>><br>						
							</td>
						  </tr>
 						 <?php 									
							} ?>										
				</table>
				<input type = 'submit' name = 'view_comments' value = "View Reviews">
			</form>
			<!-------------------------------------------------------------------------------->
			<label style="position:relative; left:35%"> Submit a Paper Below </label>
			<form style="position:relative; left:30%" name="input" action="" method="get">
				Paper Title: <input type="text" name="user">
			</form>
			<form style="position:relative; left:30%" name="input" action="" method="get">
				<input type="file" id="file">
			</form>	
			<form style="position:relative; left:42%" name="input" action="">
				<input type="submit" value="Submit">
			</form>

			<!-------------------------------------------------------------------------------->
		</div>

		<div class="AuthorDiv2" style="float: left; left:2px; bottom: 10px">
			<table class="table" style="position:relative; width:100%">
				<tr>
					<th COLSPAN="3"><h3>Reviewer Comments</h3>
					</th>
				</tr>
				<tr>
					<th width="20%">Reviewer</th>
					<th width="10%">Rating</th>
					<th width="70%">Comment</th>
				</tr>
				<?php 
					if($paper_selected != 0){
					$reviewers[] = array();
					$count = 0;
					$getReviewers = mysqli_query($con, "SELECT `paperid`,`reviewers_assigned1`,`reviewers_assigned2` FROM `Paper` WHERE `paperid` = " . $paper_selected);
					while($row = mysqli_fetch_array($getReviewers)){
						$reviewers[0] = $row['reviewers_assigned1'];
						$reviewers[1] = $row['reviewers_assigned2'];
					}				
					$review = mysqli_query($con,"SELECT * FROM `Reviews`,`User` WHERE `Reviews`.`written_to` = " . $_SESSION['session_user_id'] . " and `Reviews`.`paperid` = ". $paper_selected ." and ((`Reviews`.`userid` = " . $reviewers[0] . " and `User`.`userid` = " . $reviewers[0] . ") or (`Reviews`.`userid` = " . $reviewers[1] . " and `User`.`userid` = " . 								       $reviewers[1] . "))");
				        while($row = mysqli_fetch_array($review)){?>
					  <tr>
					    <td><?php echo $row['fname'] . " " . $row['lname'];?></td>
					    <td><?php echo $row['rating'];?></td>
					    <td><?php echo $row['review'];?></td>
					  </tr>
					<?php }
					      } ?> 		
				
			</table>
		</div>
	</div>
</body>
