<?php 
session_start();
if(isset($_POST['done']))
{

include_once 'connection.php';

$mail=$_POST['email'];
$pass=$_POST['upass'];
$isusr=$_POST['isusr'];
$yes="yes";
$no="no";
    if($isusr==$yes)
    {
    
      echo $qry="select * from sallers sl join registration reg on sl.us_id=reg.us_id where sl.email='$mail'";
      $res= mysqli_query($con,$qry);

 
      $row=mysqli_fetch_array($res);
      if($row['email']==$mail && $row['isSeller']==$yes)
         { 
            
                        if(password_verify($pass,$row['reg_pass']))
                        {
                             if($row['reg_app']==$yes)
                            {
                                 if($row['user_email_status']=="verified")
                                {
                                         if($row['user_email_status']=="verified")
                                        {
                                            // $_SESSION['uname']=$row['uname'];
                                             $_SESSION['email']=$row['e_mail'];
                                            ?>
                                                <script>window.location="index_saller.php";</script>
                                            <?php
                                        }
                                        else
                                        {
                                             echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Verify Your mail id first!!')</SCRIPT>";
                                        }

                                }
                                else
                                {
                                     echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Verify Your mail id first!!')</SCRIPT>";
                                }

                            }
                            else
                            {
                                 echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Contact Your Area Admin To verify Your Seller Account!!')</SCRIPT>";
                            }       
                        }
                        else
                        {
                            echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter correct Password!!')</SCRIPT>";
                        }

                        }
 
                }
    elseif($isusr==$no)
    {
        echo $qry="select * from registration where e_mail='$mail'";
        $res= mysqli_query($con,$qry);

        $row=mysqli_fetch_array($res);
        
        if($row['e_mail']==$mail && $row['isSeller']==$no)
        {
            if(password_verify($pass,$row['reg_pass']))
            {
                        if($row['user_email_status']=="verified")
                        {
                         // $_SESSION['uname']=$row['uname'];
                           $_SESSION['email']=$row['e_mail'];


                            ?>

                                <script>window.location="index_buyer.php";</script>

                            <?php


                        }
                        else
                        {
                             echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Verify Your mail id first!!')</SCRIPT>";
                        }
            }
            else
            {
                echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter correct Password!!')</SCRIPT>";
            }

        }
        else
               {
                    echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter Correct Details')</SCRIPT>";
                }
        
    }
}
       else
        {
          echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter Correct Details')</SCRIPT>";
        }
?>