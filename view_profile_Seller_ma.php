<!--DISPLAYING SUBJECT  AND COMPLAIN OF SELLER and BUYER TO MAster ADMIN -->




<?php

include 'connection.php';

if(isset($_GET['id']))
{
  $id=$_GET['id'];
 $email=$_GET['email'];
 $qry="select * from registration where us_id='$id' AND e_mail='$email'";
$res= mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);
$nam=$row['uname'];
$mail=$row['e_mail'];
$area=$row['r_area'];
$city=$row['r_city'];
$birth=$row['birthdate'];
$regis=$row['register_date'];

    
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                   <center> <h4>Details of Seller</h4></center>
                                </div>
                                <div class="table-responsive">
									<table class="table tble-responsive table-striped">
                                        <tr>
									       <center> <th>Seller ID</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $id;  ?>" disabled></td>    
									    </tr>
									    <tr>
									       <center> <th>Seller Name</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $nam;  ?>" disabled></td>    
									    </tr>
									     <tr>
									       <center> <th>Mail-id</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $email;  ?>" disabled></td>    
									    </tr>
									     <tr>
									       <center> <th>Role</th></center>
									        <td><input type="text" class="form-control" value="Seller" disabled></td>    
									    </tr>
									    <tr>
									       <center> <th>Area</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $area;  ?>" disabled></td>    
									    </tr>
									    <tr>
									       <center> <th>City</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $city;  ?>" disabled></td>    
									    </tr>
									    <tr>
									       <center> <th>Birthdate</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $birth;  ?>" disabled></td>    
									    </tr>
									    <tr>
									       <center> <th>Registerd On</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $regis;  ?>" disabled></td>    
									    </tr>
									  
									</table>
									 <a name="done" href="seller_message_form_maad.php?mail=<?php echo $email; ?>" class="btn login-form__btn submit w-100">Send Message</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

<?php
  include "tfooter.php";
?>
</body>
</html>
