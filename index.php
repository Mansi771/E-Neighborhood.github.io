<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'head.php'; ?>
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>


<?php
    include "header.php";

    include "sidebar.php";
    
?>

<div class="content-body">
    <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <?php 
                                    include_once 'connection.php';
                                    $user=$_SESSION["email"];
                                $query1=mysqli_query($con,"select * from admin where Email_id='$user'");
                                    $row1=mysqli_fetch_array($query1);
                                    $ar=$row1["area"];
                                
                                $qry_user="select count(us_id) from registration where isSeller='yes' AND reg_app='yes' and r_area='$ar' and user_email_status='verified'";
                                    $res_user=mysqli_query($con,$qry_user);
                                    $user_row=mysqli_fetch_array($res_user)[0];
                                    ?>
                                <h3 class="card-title text-white">Sellers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $user_row; ?></h2>
<!--                                    <p class="text-white mb-0">Jan - March 2019</p>-->
                                </div>
                                <span class="float-right display-5 opacity-5"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <?php 
                                    include_once 'connection.php';
                                        $user=$_SESSION["email"];
                                $query1=mysqli_query($con,"select * from admin where Email_id='$user'");
                                $row1=mysqli_fetch_array($query1);
                                $ar=$row1["area"];
                            
                                $qry_ord="select count(us_id) from registration where isSeller='no' AND r_area='$ar' AND user_email_status='verified'";
                                $res_ord=mysqli_query($con,$qry_ord);
                                $ord_row=mysqli_fetch_array($res_ord)[0];
                                    ?>
                                <h3 class="card-title text-white">Buyers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $ord_row; ?></h2>
<!--                                    <p class="text-white mb-0">Jan - March 2019</p>-->
                                </div>
                                <span class="float-right display-5 opacity-5"></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <?php 
                                    include_once 'connection.php';
                                      $user=$_SESSION["email"];
                                $query1=mysqli_query($con,"select * from admin where Email_id='$user'");
                                $row1=mysqli_fetch_array($query1);
                                $ar=$row1["area"];
                            
                                $qry_user="select count(us_id) from registration where isSeller='yes' AND reg_app='no' and r_area='$ar' and user_email_status='verified'";
                                $res_user=mysqli_query($con,$qry_user);
                                $user_row=mysqli_fetch_array($res_user)[0];
                                    ?>
                                <h3 class="card-title text-white">Seller Requests</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $user_row; ?></h2>
<!--                                    <p class="text-white mb-0">Jan - March 2019</p>-->
                                </div>
                                <span class="float-right display-5 opacity-5"></span>
                            </div>
                        </div>
                    </div>
                </div>


    </div>
</div>





<?php


    include "footer.php";
?>

<?php include_once 'script.php';
if(isset($_REQUEST['del_id'])){
    $del=$_GET['del_id'];
    $del_qry = "delete from product where P_id='$del'";
    if(mysqli_query($con,$del_qry)){
         ?><script>window.location="product.php";</script><?php
    }
}
?>
</body>
</html>