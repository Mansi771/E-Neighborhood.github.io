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
                            Update Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">  
                               <form method="post">
                                <?php
                                   include_once 'connection.php';
                                $cd = $_GET['up_id'];
                                $qry = "select * from category where Cat_id = '$cd'";
                                $res= mysqli_query($con,$qry);
                                while($row=mysqli_fetch_array($res)){
                                ?>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <label>Category Name</label>
                                        <input type="text" name="c_name" value="<?php echo $row['Cat_name']; ?>" class="form-control">
                                    </div>
                                </div>
 &nbsp; &nbsp;
                                <div class="row">
                                     <div class="col-lg-4 col-md-4">
                                        <label>Category Description</label>
                                        <textarea name="c_desc" class="form-control"><?php echo $row['Cat_description']; ?></textarea>
                                    </div>
                                </div>
                                 &nbsp; &nbsp;
                                 <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <label>Category Image</label>
                                        <input type="file" name="c_img" value="<?php echo $row['Cat_image']; ?>" class="form-control">
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
    $cn = $_POST['c_name'];
    $cd=$_POST['c_desc'];
    $ci=$_POST['c_img'];
    $cid=$_GET['up_id'];

    $up_qry="update category set Cat_name='$cn' , Cat_description='$cd' , Cat_image='$ci' where Cat_id = '$cid'";
    if(mysqli_query($con,$up_qry)){

    ?>
    <script>window.location="category.php";</script>
    <?php
}

}
?>