<?php

include 'connection.php';

$message = '';

if(isset($_GET['activation_code']))
{
    $active= $_GET['activation_code'];
    $mail= $_GET['email'];
    
  $qry = "
    select * from registration
    WHERE e_mail='$mail' AND user_activation_code='$active'
  ";
  $res= mysqli_query($con,$qry);
    $row=mysqli_fetch_array($res);
  if($row['e_mail']==$mail && $row['user_activation_code']==$active)
  {
    //insert here form for reseting password and update the new password in database
 
  }
  else
  {
    echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Invalid Link')</SCRIPT>";
  }
}
else
{
  echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Invalid Link')</SCRIPT>";

}
?>
