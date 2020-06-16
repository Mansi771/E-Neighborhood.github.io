<?php
if(isset($_GET['id']))
{
 $id=$_GET['id'];
 }

?>

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


       <?php

       include 'connection.php';

       ?>






    <div class="content-body">
        <div class="container-fluid mt-3">

            <?php   


            if(isset($_GET['id']))
            {
               $id=$_GET['id'];
 // $email=$_GET['email'];
               $qry="select * from product where sh_id=$id";
               $res= mysqli_query($con,$qry);


               if ($res->num_rows > 0)
               {
                ?>
                <div class="row" >
                    <?php
                    while($row = $res->fetch_assoc())
                    {
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="display-5"><i><img height="200" width="200" src="<?php echo $row['prod_image']; ?>"> </i></span>
                                    <b><h3 class="mt-3"><?php echo $row['prod_name'];  ?></h3></b>
                                     <h5 class="m-0"><?php echo $row['prod_price'];?></h5>
                                    <h5 class="m-0"><?php echo $row['prod_weight'];  ?></h5>
                                    <h5 class="m-0"><?php echo $row['prod_qty'];  ?></h5>
                                    <p><?php  echo $row['prod_desc'];  ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php   }   ?> 
                </div> 

        <?php } }?>
            </div>
        </div>




    <?php
    include "footer3.php";
    ?>

</body>
</html>
