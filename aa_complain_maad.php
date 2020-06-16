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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><br>
                                  <center> <h4>Area Admin's Complaint</h4></center> 
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
////here to __ For displaying complain list of buyer to MASter Admin//////////////////
                            
                            
                               
                                $qry="select * from complain c join admin a on c.email=a.Email_id  where c.isAdmin='yes'";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>
                                    <tr>
                                        <td class="sorting_1"><center><?php echo $row['cmp_id']; ?></center></td>
                                       <td><a href="view_profile_aa_ma.php?id=<?php echo $row['ad_id'];?>  &email=<?php echo $row['Email_id']; ?>"><center><?php echo $row['Adm_name']; ?></center></a></td>
                                        <td><center><?php echo $row['date']; ?></center></td>
                                        <td><center><?php echo $row['subject']; ?></center></td>
                                        <td><center><a href="view_complain_ma.php?id=<?php echo $row['cmp_id'];?>  &email=<?php echo $row['email']; ?>">SHOW</a></center> </td>
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


    include "tfooter.php";
?>


</body>
</html>