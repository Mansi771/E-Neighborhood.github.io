
<!--PAge for  viewing area admin  and activating deactivating it  -->



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
                             <center>  <h4 class="card-title">List of Seller</h4> </center>
                                <div class="table-responsive">
                                    <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                
                                   
                                    <table class="table table-striped table-bordered zero-configuration">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 83px;">Seller Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 75px;">Area</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 75px;">Email id</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Registration Date</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Active</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 75px;">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                include_once 'connection.php';
////here to __ For displaying login approval list with similar area for adminand seller//////////////////
                            
                            
                                $qry="select * from sallers sl join registration reg on reg.us_id=sl.us_id where reg.isSeller='yes' AND reg.user_email_status='verified'";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>
                                <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1"><?php echo $row['us_id']; ?></td>
                                        <td><a href="view_profile_Seller_ma.php?id=<?php echo $row['us_id'];?>  &email=<?php echo $row['e_mail']; ?>"><?php echo $row['uname']; ?></a></td>
                                        <td><?php echo $row['r_area']; ?></td>
                                        <td><?php echo $row['e_mail']; ?></td>
                                        <td><?php echo $row['register_date']; ?></td>
                                        <td><?php echo $row['active']; ?></td>
                                         
                                     <td><a href="view_saller_ma.php?up_id=<?php echo $row['us_id']; ?>" class="btn btn-primary btn-circle">&nbsp Activate  &nbsp</a><br><br></a>

                                   <a href="view_saller_ma.php?del_id=<?php echo $row['us_id']; ?>" class="btn btn-danger btn-circle">Deactivate</a></td>
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

    <?php
    include "tfooter.php";
?>
<?php include_once 'script.php'; ?>
</body>
</html>


<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////???/????????  SELLER APPROVAL LOGIC FOR AREA ADMIN     STARTS FROM HERE //////////////////////////////////////////////////////
if(isset($_REQUEST['del_id'])){
    $del=$_GET['del_id'];
    $del_qry = "update registration set active='no' where us_id='$del'";
    if(mysqli_query($con,$del_qry)){
         
         include_once 'connection.php';
    $qry="select * from registration where us_id='$del' and active='no'";
    $res= mysqli_query($con,$qry);
     $row=mysqli_fetch_array($res);
            
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

        $base_url = "http://localhost/final/eneigh/";  //change this baseurl value as per your file path
        $mail_body = "
        <p>Hi ".$row['uname'].",</p>
            <p>Your seller account has been deactivated by Master admin.</p>
            <p>Please contact Master admin for activating it.</p>
        <p>Please Open this link to login through your verified account- ".$base_url."login.php<p>Best Regards,<br />Team@E-NEIGHBORHOOD</p>         ";
            $mail1 = new PHPMailer\PHPMailer\PHPMailer();
            $mail1->IsSMTP();
            $mail1->SMTPDebug  = false;
            $mail1->Debugoutput = false;
            $mail1->Host = 'smtp.gmail.com';
            $mail1->Port = 587;
            $mail1->SMTPSecure = 'tls';
            $mail1->SMTPAuth   = true;
            $mail1->Username  = "eneighborhood14@gmail.com";
            $mail1->Password  = "eneighborhood48";
           $mail1->SetFrom('eneighborhood14@gmail.com', "TEAM@E-NEIGHBORHOOD");
            $mail1->AddReplyTo($row['e_mail'], strtoupper($del1));
            $mail1->AddAddress($row['e_mail'], strtoupper($del1));
            $mail1->Subject = "E-MAIL confirmation";
            $mail->WordWrap = 50;   
            $mail1->Body = $mail_body;
            $mail1->IsHTML(true);
    
            if($mail1->Send())
                    {
                echo "<script>alert('Mail Successfully Sent!!');</script>";
                ?><script>window.location="view_saller_ma.php";</script><?php
                    }
            else
            {
                echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
                ?><script>window.location="view_saller_ma.php";</script><?php
            }
    }
}
if(isset($_REQUEST['up_id'])){
    $del=$_GET['up_id'];
    $del_qry = "update registration set active='yes' where us_id='$del'";
    if(mysqli_query($con,$del_qry)){
         
         include_once 'connection.php';
    $qry="select * from registration where us_id='$del' and active='yes'";
    $res= mysqli_query($con,$qry);
     $row=mysqli_fetch_array($res);
            
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

        $base_url = "http://localhost/final/eneigh/";  //change this baseurl value as per your file path
        $mail_body = "
       <p>Hi ".$row['uname'].",</p>
            <p>Your Admin account has been activated by Master admin.</p>
        <p>Please Open this link to login through your verified account- ".$base_url."login.php<p>Best Regards,<br />Team@E-NEIGHBORHOOD</p>    ";
            $mail1 = new PHPMailer\PHPMailer\PHPMailer();
            $mail1->IsSMTP();
            $mail1->SMTPDebug  = false;
            $mail1->Debugoutput = false;
            $mail1->Host = 'smtp.gmail.com';
            $mail1->Port = 587;
            $mail1->SMTPSecure = 'tls';
            $mail1->SMTPAuth   = true;
            $mail1->Username  = "eneighborhood14@gmail.com";
            $mail1->Password  = "eneighborhood48";
           $mail1->SetFrom('eneighborhood14@gmail.com', "TEAM@E-NEIGHBORHOOD");
            $mail1->AddReplyTo($row['e_mail'], strtoupper($del1));
            $mail1->AddAddress($row['e_mail'], strtoupper($del1));
            $mail1->Subject = "E-MAIL confirmation";
            $mail->WordWrap = 50;   
            $mail1->Body = $mail_body;
            $mail1->IsHTML(true);
    
            if($mail1->Send())
                    {
                echo "<script>alert('Mail Successfully Sent!!');</script>";
                ?><script>window.location="view_saller_ma.php";</script><?php

                    }
            else
            {
                echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
                 ?><script>window.location="view_saller_ma.php";</script><?php

            }


    }
    
}
?>