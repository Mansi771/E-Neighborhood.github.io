<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'headma1.php'; ?>
    <?php include_once 'head2.php'; ?>
    <?php  include "connection.php"; ?>
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
</head>
<body>

<!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div style="background-image: url('images/Register.jpg');" style="background-size: cover;">
<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="index.html"> <h4>Register</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post">

                                    <div class="form-group">

                                        <input type="text" placeholder="First Name"  name="uname"  title="Must contain only letters" class="form-control" required="required" autocomplete="none">

                                    </div>

                                    <div class="form-group">
                                        <input placeholder="Surname" type="text" name="unname" title="Must contain only letters"  class="form-control" required="required" autocomplete="none">
                                    </div>

                                    <div class="form-group">
                                        <input placeholder="Email" type="email" name="umail" title="Must Enter proper Email Id"  class="form-control" required="required" autocomplete="none">
                                    </div>

                                    <div class="form-group">
                                       <input placeholder="Password" type="password" name="pass" id="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required="required">
                                    </div>

                                    <div class="form-group">
                                        <input placeholder="Confirm Password" type="password" id="cpass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required="required">
                                    </div>

                                    <div class="form-group">
                                    <label>Area</label>
                                        <select name="cmb_area" class="form-control" required="required">
                                          <option value="">--- Select Area ---</option>
                                          <?php 
                                              $qur="select * from area ORDER BY A_name ASC";
                                              $list=mysqli_query($con,$qur);
                                              while($row_list=mysqli_fetch_array($list))
                                              {
                                                  ?> <option value="<?php echo $row_list["A_name"]; ?>"> <?php echo $row_list["A_name"]; ?> </option>
                                                  <?php
                                              }
                                           ?>
                                          </select>
                                    </div>

                                    <div class="form-group">
                                      <!-- <input list="city" value="Ahmedabad" disabled type="text" name="ct" class="form-control" > -->
                                      <label>City</label>
                                      <select name="ct" class="form-control" required="required">
                                        <option value="Ahmedabad" selected >Ahmedabad</option>
                                      </select>

                                    </div>

                                    <div class="form-group">
                                       <label>Birthdate</label><br>
                                        <input type="date" class="form-control" id="start" name="trip-start"  min="1920-12-31" max="2002-12-31" title="Must Enter a valid Date" required="required">
                                 <style>   label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input,
label {
    margin: .4rem 0;
}
</style>
    
                                     
                                    </div>

                                    <div class="form-group">
                                      <label>Gender</label><br>
                                        <input type="radio" id="male" name="gender" value="male" required="required">&nbsp; Male &nbsp;
                                        <input type="radio" id="female" name="gender" value="female" required="required">&nbsp; Female &nbsp;
                                        <input type="radio" id="other" name="gender" value="other" required="required">&nbsp; Others &nbsp;
                                    </div>

                                    <div class="form-group">

                                      <input type="submit" name="done" class="btn login-form__btn submit w-100" value="Submit">
                                        <!-- <a href="register.php" class="btn login-form__btn submit w-100">Cancel</a> -->
                                    </div>
                                    
                                    <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->


                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php //include_once 'script.php'; ?>
<script>
    



    var password = document.getElementById("pass");
 var confirm_password = document.getElementById("cpass");
    function validatePassword() {
  if (password.value!= confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    
        } 
        else {
    confirm_password.setCustomValidity("");
            }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
   
    

</script>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
<?php
if(isset($_POST['done'])){
    include_once 'connection.php';
    $uname=$_POST['uname']." ".$_POST['unname'];
   
    $umail=$_POST['umail'];
    $u_area=$_POST['cmb_area'];
     $ct=$_POST['ct'];
    $pass=$_POST['pass'];
$user_encrypted_password = password_hash($pass, PASSWORD_DEFAULT);
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
//$seller=$_POST['isusr'];
   $qry="select * from admin where Email_id='$umail'";
//this method execute when connection is success than it execute the query and store the result in res variable
$res= mysqli_query($con,$qry);
  
 //this method will get the value of res variable and fetch from the database and the result will generated in array and store in row variable
$row=mysqli_fetch_array($res);

    

 //this use for compare two values one from user inputted and another from database
  if($row['Email_id']==$umail)
     
  {
   //error message for email
      echo "<script>alert('Email Already Exits')</script> ";
  }

  else
  {
      //Sending mail after checking username and email availibility
       require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

        $base_url = "http://E-Neighborhood.github.io/";  //change this baseurl value as per your file path
        $mail_body = "
        <p>Hi ".$uname.",</p>
            <p>Your Area Admin account has been created.</p>
        <p>Please Open this link to login into your account - ".$base_url."login.php<p>Best Regards,<br />Team@E-NEIGHBORHOOD</p>           ";
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
            $mail1->AddReplyTo($umail, strtoupper($uname));
            $mail1->AddAddress($umail, strtoupper($uname));
            $mail1->Subject = "E-MAIL confirmation";
            $mail->WordWrap = 50;   
            $mail1->Body = $mail_body;
            $mail1->IsHTML(true);


		    if($mail1->Send())
		            {
		        echo "<script>alert('Mail Successfully Sent,Please check your mailbox');</script>";
		       
		    
		  $qry = "insert into admin(Email_id,Password,Adm_name,area,city,birthdate,gender) values ('$umail','$user_encrypted_password','$uname','$u_area','$ct','$birthday','$gender')";
		    mysqli_query($con,$qry);
		            }
		    else 
		    {
		     echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
		    }

  }
}
?>
