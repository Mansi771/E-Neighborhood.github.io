<?php
session_start();
	if(isset($_POST['submit'])){
	    include_once 'connection.php';

	echo $sub=$_POST['sub'];
	echo $comp=$_POST['comp'];
	$email=$_SESSION["email"];
	$qry="select * from registration where e_mail='$email'";
	$res= mysqli_query($con,$qry);
	$row=mysqli_fetch_array($res);
	$area=$row['r_city'];
	$isSeller=$row['isSeller'];
	    
    if($isSeller=="yes")
    {
        $qry = "insert into complain(email,area,isSeller,subject,complain)
     values ('$email','$area','yes','$sub','$comp')";
    mysqli_query($con,$qry);
    echo "inserted";
    }
		else
    {
         $qry = "insert into complain(email,area,isSeller,subject,complain)
     values ('$email','$area','no'','$sub','$comp')";
    mysqli_query($con,$qry);
    }
	    


	    
	}
?>