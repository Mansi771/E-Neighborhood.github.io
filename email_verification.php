<?php

include 'connection.php';

$message = '';

if(isset($_GET['activation_code']))
{
    $active= $_GET['activation_code'];
    $umail= $_GET['umail'];
    
	$qry = "
		select * from registration
		WHERE e_mail='$umail' AND user_activation_code='$active'
	";
	$res= mysqli_query($con,$qry);
    $row=mysqli_fetch_array($res);
	if($row['e_mail']==$umail && $row['user_activation_code']==$active)
	{
		
		
			if($row['user_email_status'] == 'not verified')
			{
				$update_query = "
				UPDATE registration
				SET user_email_status = 'verified' 
				WHERE us_id= '".$row['us_id']."'
				";
				$statement = $con->prepare($update_query);
				$statement->execute();
//				$sub_result = $statement->fetchAll();
//				if(isset($sub_result))
//				{
				$message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login_saller.php">Login</a></label>';
//				}
			}
			else
			{
				$message = '<label class="text-info">Your Email Address Already Verified<br />You can login here - <a href="login_saller.php">Login</a></label>';
			}
		
	}
	else
	{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Email Verification</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h1 align="center">Email Verification</h1>
		
			<h3><?php echo $message; ?></h3>
			
		</div>
	
	</body>
	
</html>