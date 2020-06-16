<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'head3.php'; ?>
	<link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>
<div class="wrapper">
	
	<?php include_once 'header3.php'; ?>
    <?php include_once 'sidebar3.php'; ?>


<div class="content-body">
    <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <center><h4>Complaint</h4></center>
								<!--Complain form for SELLER AND BUYER FOR SENDING THEIR COMPLAIN TO AREA ADMIN-->
								  <form class="form-method" method="post" >

								    <label for="subject">Subject</label>
								    <input type="text" id="sub" class="form-control" name="sub" >
								    
								    <br>

								    <label for="complain">Complaint</label>
								    <textarea id="comp" name="comp" class="form-control" placeholder="Write Something..." style="height:200px"></textarea>
								    <br>

								    <input type="submit" name="submit" class="btn btn-success col-12" value="submit">

								  </form>
								</div>
								
                </div>
            </div>
        </div>
    </div>
</div>
    </div>div


    <?php include_once 'footer.php'; ?>
</body>
</html>
<?php
								if(isset($_POST['submit'])){
								    include_once 'connection.php';

								 $sub=$_POST['sub'];
								$comp=$_POST['comp'];
								$email=$_SESSION["email"];
								$qry="select * from registration where e_mail='$email'";
								$res= mysqli_query($con,$qry);
								$row=mysqli_fetch_array($res);
								$area=$row['r_area'];
								$isSeller=$row['isSeller'];
								    
								            if($isSeller=="yes")
								            {
                                                 include_once 'connection.php';
								                $qry = "insert into complain(email,area,isSeller,subject,complain)
										     values ('$email','$area','yes','$sub','$comp')";
										    mysqli_query($con,$qry);
								            }
								      else
								            {
                                           include_once 'connection.php';
								                $qry = "insert into complain(email,area,isSeller,subject,complain)
										     values ('$email','$area','no','$sub','$comp')";
										    mysqli_query($con,$qry);
								            }
								    


								    
								}
								?>