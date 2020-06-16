<!--DISPLAYING SUBJECT  AND COMPLAIN OF SELLER and BUYER TO AREA ADMIN -->




<?php

include 'connection.php';

if(isset($_GET['id']))
{
 $id=$_GET['id'];
 $email=$_GET['email'];
 $qry="select * from reply where id='$id' and to_mail='$email'";
$res= mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);
$sub=$row['subject'];
$comp=$row['message'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'head3.php'; ?>
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>
  
  <?php include_once 'header3.php'; ?>
    <?php include_once 'sidebar3.php'; ?>


<div class="content-body">
	<div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><br>
                                <center>   <h4>Detailed description of Message</h4></center>
                                </div>
                                <div class="table-responsive">
									<table class="table tble-responsive table-striped">
									    <tr>
									       <center> <th>Subject</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $sub;  ?>" disabled></td>
									        
									        
									    </tr>
									    <tr>
                                          <center>  <th>Message</th></center>
                                           <td> <textarea class="form-control" value="" disabled style="height:200px"><?PHP echo $comp; ?></textarea></td>
                                        </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

<?php
  include "footer.php";
?>
</body>
</html>
