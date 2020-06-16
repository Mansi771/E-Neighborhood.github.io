
<!--PAge for viewing product list and updating and deleting   it from seller side  -->



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'headsl.php'; ?>
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>
    
    <?php include_once 'header2.php'; ?>
    <?php include_once 'sidebar2.php'; ?>

<div class="content-body">
    <div class="container-fluid mt-3">

        <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sellers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post">
      <div class="modal-body">
      
            <div>
                <input type="text" class="form-control" name="cname" placeholder="Enter Category Name">
            </div>
            &nbsp;
            <div>
                <textarea type="text" class="form-control" name="cdesc" placeholder="Enter Category Description"></textarea>
            </div>
              &nbsp;
            <div>
                <input type="file" name="cimg" class="form-control">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="done" class="btn btn-primary">Save</button>
      </div>
       </form>
    </div>
  </div>
</div>
        <br>



            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body"><br>
                              <center> <h4 class="card-title">List of Product</h4></center>
                                <div class="table-responsive">
                                    <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                
                                    <table class="table table-striped table-bordered zero-configuration">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Product Name</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Added On</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                include_once 'connection.php';
////here to __ For displaying  list of product added by  seller//////////////////
                            
                            
                                                     $user=$_SESSION["email"];
                                                    
                                                    $qry="select * from product where email='$user'";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1"><?php echo $row['prod_id']; ?></td>
                                        <td><?php echo $row['prod_name']; ?></td>
                                        <td><?php echo $row['prod_date']; ?></td>         
                                     <td><a href="update_product.php?prod_id=<?php echo $row['prod_id']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>&nbsp &nbsp

                                   <a href="view_products_list.php?del_id=<?php echo $row['prod_id']; ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>

                                </tbody>
                            <?php } ?>
                            </table>
                        </div>
                        </div>
                        </div>
                            <!-- /.table-responsive -->
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>            

    </div>
</div>
</div>
</div>
</div>

    
    <?php include_once 'footer.php'; ?>
<?php include_once 'script.php'; ?>
</body>
</html>


<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////???/????????  Products deletion logic   STARTS FROM HERE //////////////////////////////////////////////////////
if(isset($_REQUEST['del_id'])){
    $del=$_GET['del_id'];
    $del_qry = "delete from product where prod_id='$del'";
    if(mysqli_query($con,$del_qry)){
         ?><script>window.location="view_products_list.php";</script><?php
    
    }
}

?>