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
                            Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                   <div class="col-sm-6">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline " id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70px;">ID</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Details</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <?php
                                include_once 'connection.php';
                                $qry="select * from user us join user_detail ud on us.U_id=ud.U_id order by us.U_id desc";
                                $res=mysqli_query($con,$qry);
                                while($row=mysqli_fetch_array($res)){
                                ?>
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                       <td><?php echo $row['U_id']; ?></td>
                                       <td>
                                        <div class="row">
                                             <div class="btn-outline">
                                                <div class="col-md-6">User Name : <b><?php echo $row['U_name']; ?></b></div>
                                                <div class="col-md-6">Email ID : <b><?php echo $row['Email_id']; ?></b></div>
                                                 <div class="col-md-6">Contact No : <b><?php echo $row['Contact_no']; ?></b></div>
                                                <div class="col-md-6">D.O.B : <b><?php echo $row['U_dateOFbirth']; ?></b></div>
                                                 
                                             </div></div>
                                                 <div class="row">
                                             <div class="btn-outline">
                                                <div class="col-md-6">Address :<b> <?php echo $row['Address']; ?></b></div>
                                                <div class="col-md-6">Landmark :<b> <?php echo $row['Landmark']; ?></b></div>
                                                 <div class="col-md-6">Area :<b> <?php echo $row['Area']; ?></b></div>
                                                <div class="col-md-6">Pincode : <b><?php echo $row['Pincode']; ?></b></div>
                                                 <div class="col-md-6">City :<b> <?php echo $row['City']; ?></b></div>
                                                <div class="col-md-6">State : <b><?php echo $row['State']; ?></b></div>
                                               
                                            </div>
                                        </div>
                                       </td>
                                        <td>

                                   <a href="users.php?state=delete&del_id=<?php echo $row['U_id']; ?>" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-trash-o"></i></a></td>
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
