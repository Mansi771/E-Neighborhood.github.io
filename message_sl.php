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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><br>
                                  <center> <h4>Message</h4></center> 
                                </div>
                                <div class="table-responsive">

		<table class="table tble-responsive table-striped">
<thead>
   <tr>
       <th>
          <center>ID</center>
       </th>
       <th>
          <center>From</center>
       </th>
       <th>
           <center>Date</center>    
       </th>
       <th>
           <center>Subject</center>
       </th>
       <th>
          <center>Message</center>
       </th>
       
   </tr>
    </thead>

<tbody>
    
         <?php
                                include_once 'connection.php';
////here to __ For displaying complain list of Seller to MASter Admin//////////////////
                            
                            		$mail=$_SESSION['email'];
                                   
                               
                                $qry="select * from message where to_role='seller' and to_mail='$mail' ";
//////////////////////////// //here//////////////////////////////////////
                                $res=mysqli_query($con,$qry);
                                $rowcount=mysqli_num_rows($res);
                                for($i=1;$i<=$rowcount;$i++){
                                    $row=mysqli_fetch_array($res);
                                ?>
                                    <tr>
                                        <td class="sorting_1"><center><?php echo $row['id']; ?></center></td>
                                        <td><center><?php echo $row['sender']; ?></center></td>
                                         
                                        <td><center><?php echo $row['date']; ?></center></td>
                                        <td><center><?php echo $row['subject']; ?></center></td>
                                        <td><a href="view_message_sl.php?id=<?php echo $row['id'];?>  &email=<?php echo $mail; ?>"><center>SHOW</center></a> </td>
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