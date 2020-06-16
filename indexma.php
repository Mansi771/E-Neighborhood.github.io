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

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <?php 
                                    include_once 'connection.php';
                                        $qry_user="select count(s_id) from sallers sl join registration reg on reg.us_id=sl.us_id where reg.isSeller='yes'";
                                        $res_user=mysqli_query($con,$qry_user);
                                        $user_row=mysqli_fetch_array($res_user)[0];
                                    ?>
                                <h3 class="card-title text-white">Seller</h3>
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
                                        $qry_ord="select count(us_id) from registration where isSeller='no'";
                                        $res_ord=mysqli_query($con,$qry_ord);
                                        $ord_row=mysqli_fetch_array($res_ord)[0];
                                    ?>
                                <h3 class="card-title text-white">Buyer</h3>
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
                                        $qry_ord="select count(ad_id) from admin ";
                                        $res_user=mysqli_query($con,$qry_ord);
                                        $user_row=mysqli_fetch_array($res_user)[0];
                                    ?>
                                <h3 class="card-title text-white">Area Admin</h3>
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
</div>





<?php
    include "tfooter.php";
?>

</body>
</html>





 ?>