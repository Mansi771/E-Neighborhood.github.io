
<?php

include 'connection.php';

if(isset($_GET['mail']))
{
 $email=$_GET['mail'];
 
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'headma1.php'; ?>
	<link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>


<?php
    include "theader.php";

    include "tsidebar.php";
    
?>


<div class="content-body">
    <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <center><h4>Message</h4></center>
								<!--Complain form for Area Admin FOR SENDING THEIR COMPLAIN TO Master Admin-->
								  <form class="form-method" method="post" >

								    <label for="subject">Subject</label>
								    <input type="text" id="sub" class="form-control" name="sub">
								    
								    <br>

								    <label for="complain">Message</label>
								    <textarea id="comp" name="comp" class="form-control" placeholder="Write something..." style="height:200px"></textarea>
								    <br>

								    <input type="submit" name="submit" class="btn btn-success col-12" value="submit">

								  </form>
								</div>
								
                </div>
            </div>
        </div>
    </div>
</div>


    <?php include_once 'footer.php'; ?>
</body>
</html>
<?php
								if(isset($_POST['submit'])){
								    include_once 'connection.php';

								 $sub=$_POST['sub'];
								$comp=$_POST['comp'];
								
								    
								            
								                $qry = "insert into message(sender,to_role,to_mail,subject,message)
										     values ('Master Admin','seller','$email','$sub','$comp')";
										    mysqli_query($con,$qry);
								         
								    


								    
								}
								?>