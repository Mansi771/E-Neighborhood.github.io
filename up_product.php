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
		
          
		<br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">  
                               <form method="post">
                                <?php
                                   include_once 'connection.php';
                                $cd = $_GET['up_id'];
                                $qry = "select * from product pd join category ct on pd.Cat_id=ct.Cat_id where P_id = '$cd'";
                                $res= mysqli_query($con,$qry);
                                while($row=mysqli_fetch_array($res)){
                                ?>
                                <div class="row">
                                    
                                   <div class="col-lg-6">
                                    <label>Product Name : </label>
                                    <input type="text" value="<?php echo $row['P_name']; ?>" class="form-control" name="pname" placeholder="Enter Product Name">
                                     </div>
              
            <div class="col-md-6">
                <label>Category Name : </label>
                <select class="form-control" name="cname">
                   <option value="<?php echo $row['Cat_id']; ?>"><?php echo $row['Cat_name']; ?></option>
                    <?php include_once 'connection.php';
                    $q="select * from category order by Cat_id desc";
                    $res=mysqli_query($con,$q);
                    while($rw=mysqli_fetch_array($res)){ 
                     ?>
                    <option value="<?php echo $rw['Cat_id']; ?>"><?php echo $rw['Cat_name']; ?></option>
                <?php } ?>
                </select>
            </div> 
            </div>&nbsp; <div class="row">      
            <div class="col-md-6">
                <label>Product Size : </label>
                <input type="text" value="<?php echo $row['P_size']; ?>" class="form-control" name="p_size" placeholder="Enter Product Size">
            </div> 
              <div class="col-md-6">
                <label>Product Color : </label>
                <input type="text" value="<?php echo $row['P_color']; ?>" class="form-control" name="p_color" placeholder="Enter Product Color">
            </div> 
             </div>&nbsp;
              <div class="row">      
              <div class="col-md-6">
                <label>Product Quantity : </label>
                <input type="text" class="form-control" name="qty" value="<?php echo $row['Quantity']; ?>" placeholder="Enter Product Qty">
            </div> 
              <div class="col-md-6">
                <label>Product Price : </label>
                <input type="text" value="<?php echo $row['Price']; ?>" class="form-control" name="price" placeholder="Enter Product Price">
            </div>     </div>&nbsp; <div class="row">     
            <div class="col-md-6">
                <label>Product Description : </label>
                <textarea class="form-control" name="pdesc" placeholder="Enter product Description"><?php echo $row['P_description']; ?></textarea>
            </div>
              
            <div class="col-md-6">
                <label>Product Image : </label>
                <input type="file" value="<?php echo $row['P_image']; ?>" name="pimg" class="form-control">
            </div>
                 </div>
                                </div>
                            <?php } ?>
                                <br>
                                <input type="submit" name="updt" value="Update Category" class="btn btn-primary">
                                &nbsp;
                                <a href="category.php" class="btn btn-danger">Cancel</a>
                                </form>
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
if(isset($_POST['updt'])){
    include_once 'connection.php';
    $pid =$_GET['up_id'];
    $pname=$_POST['pname'];
    $cn=$_POST['cname'];
    $size=$_POST['p_size'];
    $color=$_POST['p_color'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $desc=$_POST['pdesc'];
    $img=$_POST['pimg'];

    $up_qry="update product set P_name='$pname',Cat_id='$cn', P_size = '$size',P_color='$color',Quantity='$qty',Price ='$price', P_description='$desc' , P_image='$img' where P_id = '$pid'";
    if(mysqli_query($con,$up_qry)){

    ?>
    <script>window.location="product.php";</script>
    <?php
}

}
?>