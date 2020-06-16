<!--DISPLAYING SUBJECT  AND COMPLAIN OF SELLER and BUYER TO MAster ADMIN -->




<?php

include 'connection.php';

if(isset($_GET['id']))
{
 $id=$_GET['id'];
 $email=$_GET['email'];
 $qry="select * from complain where cmp_id='$id' and email='$email'";
$res= mysqli_query($con,$qry);
$row=mysqli_fetch_array($res);
$sub=$row['subject'];
$comp=$row['complain'];
    
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
                                   <center> <h4>Detailed description of Complaint</h4></center>
                                </div>
                                <div class="table-responsive">
									<table class="table tble-responsive table-striped">
									    <tr>
									       <center> <th>Subject</th></center>
									        <td><input type="text" class="form-control" value="<?PHP  echo $sub;  ?>" disabled></td>
									        
									        
									    </tr>
									    <tr>
                                           <center>  <th>Complaint</th> </center>
                                           <td> <textarea class="form-control" value="" disabled style="height:200px"><?PHP echo $comp; ?></textarea></td>
                                            

									    </tr>
									</table>
									<a name="done" href="reply_form_maad.php?mail=<?php echo $email; ?>" class="btn login-form__btn submit w-100">Reply</a>
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
