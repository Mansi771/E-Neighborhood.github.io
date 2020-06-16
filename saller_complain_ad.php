<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'head.php'; ?>
  <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>


<?php
    include "header.php";

    include "sidebar.php";

    ?>

<div class="content-body">
	<div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><br>
                                   <center> <h4>Seller's Complaint</h4></center>
                                </div>
                                <div class="table-responsive">

		<table class="table tble-responsive table-striped">
<thead>
   <tr>
       <th>
          <center>ID</center>
       </th>
       <th>
           <center>Name</center>
       </th>
       <th>
            <center>Date</center>       
       </th>
       <th>
           <center>Subject</center>
       </th>
       <th>
           <center>Complaint</center>
       </th>
       
   </tr>
    </thead>

<tbody>
    
         <?php
                                include_once 'connection.php';
////here to __ For displaying complain list with similar area for adminand seller//////////////////
                            
                            
                                $user=$_SESSION["email"];
                                $query1=mysqli_query($con,"select * from admin where Email_id='$user'");
                            $row1=mysqli_fetch_array($query1);
                            $ar=$row1["area"];
                            
                                $qry="select * from complain c join registration r on c.email=r.e_mail and c.area=r.r_area and c.isSeller=r.isSeller where c.area='$ar' and c.isSeller='yes' and c.isAdmin='no'";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>
                                    <tr>
                                        <td class="sorting_1"><?php echo $row['cmp_id']; ?></td>
                                       <td><a href="view_profile_Seller_aa.php?id=<?php echo $row['us_id'];?>  &email=<?php echo $row['e_mail']; ?>"><center><?php echo $row['uname']; ?></center></a></td>
                                        <td><center><?php echo $row['date']; ?></center></td>
                                        <td><center><?php echo $row['subject']; ?></center></td>
                                        <td><a href="view_complain.php?id=<?php echo $row['cmp_id'];?>  &email=<?php echo $row['email']; ?>"><center>SHOW</center></a> </td>
                                    </tr>
                        <?php
                      }
                      ?>
        
        
        
    
</tbody>    
    
</table>

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
    


    
<?php


    include "footer.php";
?>


</body>
</html>