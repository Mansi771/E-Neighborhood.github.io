<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'headma1.php'; ?>
</head>
<body>

<?php
    include "theader.php";
    include "tsidebar.php";
?>



<div class="content-body">
    <div class="container-fluid mt-3">

        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Table Basic</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>AREA</th>
                                                <th>REGISTRATION DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                include_once 'connection.php';
////here to __ For displaying login approval list with similar area for adminand seller//////////////////
                            
                            $qry="select * from admin";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>

                                    <tr>
                                        <td class="sorting_1"><?php echo $row['ad_id']; ?></td>
                                        <td><?php echo $row['Adm_name']; ?></td>
                                        <td><?php echo $row['area']; ?></td>
                                        <td><?php echo $row['register_date']; ?></td>
                                    </tr>
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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