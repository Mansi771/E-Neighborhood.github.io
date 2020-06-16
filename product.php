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
                <div class="col-lg-12">
                    <button type="button" data-toggle="modal" data-target="#category" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Product
                            </button>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post">
      <div class="modal-body">
       
            <div>
                <input type="text" class="form-control" name="pname" placeholder="Enter Product Name">
            </div>
            &nbsp;
            <div>
                <select class="form-control" name="cname">
                    <option>select category</option>
                    <?php include_once 'connection.php';
                    $q="select * from category order by Cat_id desc";
                    $res=mysqli_query($con,$q);
                    while($rw=mysqli_fetch_array($res)){ 
                     ?>
                    <option value="<?php echo $rw['Cat_id']; ?>"><?php echo $rw['Cat_name']; ?></option>
                <?php } ?>
                </select>
            </div> &nbsp;
  <div>
                <input type="text" class="form-control" name="p_size" placeholder="Enter Product Size">
            </div> &nbsp;
              <div>
                <input type="text" class="form-control" name="p_color" placeholder="Enter Product Color">
            </div> &nbsp;
              <div>
                <input type="text" class="form-control" name="qty" placeholder="Enter Product Qty">
            </div> &nbsp;
              <div>
                <input type="text" class="form-control" name="price" placeholder="Enter Product Price">
            </div> &nbsp;
            <div>
                <textarea type="text" class="form-control" name="pdesc" placeholder="Enter product Description"></textarea>
            </div>
              &nbsp;
            <div>
                <input type="file" name="pimg" class="form-control">
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
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                   <div class="col-sm-6">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                            <label>
                                Search :  <input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline " id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70px;">ID</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Category Name</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Size</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Color</th>
                                           <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Qty</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 75px;">Description</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Image</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Action</th>
                                          
                                    </tr>
                                </thead>
                                <?php
                                include_once 'connection.php';
                                $qry="select * from product p join category c on p.Cat_id=c.Cat_id order by p.P_id desc";
                                $res=mysqli_query($con,$qry);
                                while($row=mysqli_fetch_array($res)){
                                ?>
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1"><?php echo $row['P_id']; ?></td>
                                        <td><?php echo $row['P_name']; ?></td>
                                        <td><?php echo $row['Cat_name']; ?></td>
                                        <td><?php echo $row['P_size']; ?></td>
                                        <td><?php echo $row['P_color']; ?></td>
                                        <td><?php echo $row['Quantity']; ?></td>
                                        <td><?php echo $row['Price']; ?></td>
                                        <td><?php echo $row['P_description']; ?></td>
                                        <td><img src="product/<?php echo $row['P_image']; ?>" width="70px"></td>
                                    <td><a href="up_product.php?up_id=<?php echo $row['P_id']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>

                                   <a href="product.php?del_id=<?php echo $row['P_id']; ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a></td>
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
<?php include_once 'script.php'; ?>
</body>
</html>
<?php
if(isset($_POST['done'])){
    include_once 'connection.php';
    $pname=$_POST['pname'];
    $cn=$_POST['cname'];
    $size=$_POST['p_size'];
    $color=$_POST['p_color'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $desc=$_POST['pdesc'];
    $img=$_POST['pimg'];

    $ins = "insert into product(P_name,Cat_id,P_size,P_color,Quantity,Price,P_description,P_image) values ('$pname','$cn','$size','$color','$qty','$price','$desc','$img')";
  if(mysqli_query($con,$ins)){
        ?><script>window.location="product.php";</script><?php
    }
}
if(isset($_REQUEST['del_id'])){
    $del=$_GET['del_id'];
    $del_qry = "delete from product where P_id='$del'";
    if(mysqli_query($con,$del_qry)){
         ?><script>window.location="product.php";</script><?php
    }
}
?>