<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'head.php'; ?>
</head>
<body>
<div class="wrapper">
	
	<?php include_once 'header.php'; ?>
	<div id="page-wrapper" style="min-height: 616px;">
		<?php // content  ?>
		<br>
		<div class="row">
		<div class="col-lg-4 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	<?php 
                                	include_once 'connection.php';
                                     $user=$_SESSION["uname"];
                                     
                                $query1=mysqli_query($con,"select * from admin where Email_id='$user'");
                            $row1=mysqli_fetch_array($query1);
                            $ar=$row1["area"];
                            
                                $qry="select * from registration where isSeller='yes' AND reg_app='no' and r_area='$ar'";
                            //here
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
/*$qry_user="select count(s_id) from sallers sl join registration reg on reg.us_id=sl.us_id where reg.isSeller='yes'";
$res_user=mysqli_query($con,$qry_user);
$user_row=mysqli_fetch_array($res_user)[0];*/
                                	?>
                                    <div class="huge"><?php echo $rowcount; ?></div>
                                    <div>No Of Sellers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	<?php 
                                	include_once 'connection.php';
$qry_ord="select count(us_id) from registration where isSeller='no'";
$res_ord=mysqli_query($con,$qry_ord);
$ord_row=mysqli_fetch_array($res_ord)[0];
                                	?>
                                    <div class="huge"><?php echo $ord_row; ?></div>
                                    <div>No of Buyers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="finish_order.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
            </div> 
            <br>
         
	</div>
</div>
<?php include_once 'script.php';
if(isset($_REQUEST['del_id'])){
    $del=$_GET['del_id'];
    $del_qry = "delete from product where P_id='$del'";
    if(mysqli_query($con,$del_qry)){
         ?><script>window.location="product.php";</script><?php
    }
}
?>
 ?>
</body>
</html>