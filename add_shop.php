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

      


<!-- Add shop details from Seller page-->

<?php
// session_start();
$mail=$_SESSION['email'];  

include 'connection.php';

?>
 <div class="row justify-content-center h-100">
                <div class="col-xl-12">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
<form enctype="multipart/form-data" class="" method="post">
    
     <div class="form-group">
     <center><h4>Add Shop Details</h4></center><br>
         <input type="text" placeholder="Shop Name"  name="nam" class="form-control" autocomplete="none"  required="required" >
     </div>

     <div class="form-group">
         <input type="text" placeholder="Shop Timings"  name="time" class="form-control" autocomplete="none"  required="required" >
     </div>
     <div class="form-group">
         <input type="text" placeholder="Shop Description"  name="desc" class="form-control" autocomplete="none"  required="required" >
     </div>
     <div class="form-group">
         <input type="text" placeholder="Shop Address"  name="addr" class="form-control" autocomplete="none"  required="required" >
     </div>
     <div class="form-group">
         <label>Select Your Shop Logo</label>
     </div>
     <div class="form-group">
         <input type="file" placeholder="Add your logo"  name="f1" class="form-control" autocomplete="none"  required="required" >
     </div>
     <div class="form-group">
         <input type="submit" placeholder="Enter Shop Name"  name="s1" class="form-control btn btn-success" autocomplete="none"  required="required" >
     </div>

</form>
    </div>
</div>
                    </div>
                </div>
                   
</div>
   
    </div>
    </div>
    <?php include_once 'footer.php'; ?>                  
</body>
</html>

<?php
    
if(isset($_POST['s1']))
{
$file=$_FILES['f1'];
$file_name=$_FILES['f1']['name'];
$ftemp_name=$_FILES['f1']['tmp_name'];
$fsize=$_FILES['f1']['size'];
$ferror=$_FILES['f1']['error'];
$ftype=$_FILES['f1']['type'];
$nam=$_POST['nam'];
$time=$_POST['time'];
$desc=$_POST['desc'];
$addr=$_POST['addr'];
 


$ext=explode('.',$file_name );
$fext=strtolower(end($ext));
$allowed=array('jpg','jpeg','png');
if(in_array($fext,$allowed))
{

        if($ferror === 0)
        {
            if($fsize < 20000000)//size in Bytes 
            {
                $v1 = rand(1111,9999);
                $v2 = rand(1111,9999);
                $v3 = $v1 . $v2;
                $v3 = md5($v3);
                
               $fileNameNew =  $v3.".".$fext;
                $fileDestination = "./uploads/".$fileNameNew;
                $dst = "uploads/".$fileNameNew;
                
                move_uploaded_file($ftemp_name,$fileDestination);
                
                $qry = "select * from shop where mail='$mail'";
                $res= mysqli_query($con,$qry);
                $row=mysqli_fetch_array($res);
                
                    if($row['mail']==$mail)
                    {
                    $qry = "UPDATE shop SET  sh_name='$nam' , time='$time', description='$desc' , address='$addr' , logo='$dst' where mail='$mail'";
                        mysqli_query($con,$qry);
                        
                         echo "<script>alert('Shop details updated successfully!!!');</script>";
                    }
                    else
                    {
                       echo  $qry = "insert into shop(sh_name,time,description,address,mail,logo) values ('$nam','$time','$desc','$addr','$mail','$dst')";
                          mysqli_query($con,$qry);
                        echo "<script>alert('Shop created successfully!!!');</script>";
                    }
                
                
                }
            }
            else
            {
            
                echo "<script>alert('your file is too big!!!');</script>";
            }
        }
        else
        {
    
            echo "<script>alert('There was an error uploading your file!!!');</script>";
        }
        
}

?>


  
