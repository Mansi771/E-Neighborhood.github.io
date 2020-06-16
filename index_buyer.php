<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'headsl.php'; ?>
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>
    
    <?php include_once 'header3.php'; ?>
    <?php include_once 'sidebar3.php'; ?>





<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
                                include_once 'connection.php';
////here to __ For shops list //////////////////
                            
                            
                                $mail=$_SESSION["email"];
                            
                            
                                $qry = "select * from shop ";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>

        <div class="col-lg-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="<?php echo $row['logo']; ?>" width="200" height="200" class="rounded-square" alt="">
                                    <b><p class="m-0"><?php echo $row['sh_id']; ?></p></b>
                                    <h1 class="mt-3 mb-1"><?php echo $row['sh_name']; ?></h1>
                                    <p class="m-0"><?php echo $row['description']; ?></p>
                                    <b><p class="m-0"><?php echo $row['time']; ?></p></b>
                                    <p class="m-0"><?php echo $row['address']; ?></p><br>
                                    <a href="view_products.php?id=<?php echo $row['sh_id']; ?>" class="btn btn-sm btn-warning">View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php  }  ?>

    </div>
</div>


    <?php include_once 'footer.php'; ?>


</body>
</html>