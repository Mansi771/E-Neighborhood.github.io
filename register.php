<!DOCTYPE html>
<html lang="en">
<head>
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

                                        <input type="text" placeholder="First Name"  name="uname" pattern="[a-z]{1,15}" title="Must contain only letters" class="form-control" autocomplete="none"  required="required" >

                                    </div>

                                    <div class="form-group">
                                        <input placeholder="Surname" type="text" name="unname" pattern="[a-z]{1,15}" title="Must contain only letters"  class="form-control" autocomplete="none"  required="required">
                                    </div>

                                    <div class="form-group">
                                        <input placeholder="Email" type="email" name="umail" title="Must Enter proper Email Id" class="form-control" autocomplete="none"  required="required">
                                    </div>

                                    <div class="form-group">
                                       <input placeholder="Password" type="password" name="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required="required">
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
                                       <label>     Birthdate     </label><br>
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

                                    <div class="form-group">
                                     <label>Gender</label><br>
                                        <input type="radio" id="male" name="gender" value="male" required="required">&nbsp; Male &nbsp;
                                        <input type="radio" id="female" name="gender" value="female" required="required">&nbsp; Female &nbsp;
                                        <input type="radio" id="other" name="gender" value="other" required="required">&nbsp; Others &nbsp;

                                    </div>

                                    <div class="form-group">
                                     <center>  <label>     Are You a Seller??     </label><br>
                                        <input type="radio" name="isusr"  value="yes" required="required"> YES &nbsp;&nbsp;
                                        <input type="radio" name="isusr"  value="no" required="required"> NO
                                        </center>
                                    </div>

                                    <div class="form-group">

                                      <input type="submit" name="done" class="btn login-form__btn submit w-100" value="Submit">
                                        <!-- <a href="register.php" class="btn login-form__btn submit w-100">Cancel</a> -->
                                    </div>
                                    
                                    <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->


                                </form>
                                    
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php //include_once 'script.php'; ?> 



    <!--**********************************
        Scripts
    ***********************************-->
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
     $ct="Ahmedabad";
    $pass=$_POST['pass'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $seller=$_POST['isusr']; 
$user_encrypted_password = password_hash($pass, PASSWORD_DEFAULT);  
$user_activation_code = md5(rand());

   $qry="select * from registration where e_mail='$umail'";
//this method execute when connection is success than it execute the query and store the result in res variable
$res= mysqli_query($con,$qry);
  
 //this method will get the value of res variable and fetch from the database and the result will generated in array and store in row variable
$row=mysqli_fetch_array($res);

    

 //this use for compare two values one from user inputted and another from database
  if($row['e_mail']==$umail)
     
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
			<p>Thanks for Registration.</p>
		<p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."&umail=".$umail."</p><p>Best Regards,<br>Team@E-NEIGHBORHOOD</p><br><br><p>Note- If you are a seller than wait for 2nd verification from Area Admin!!!</p>";
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
		       
		    
		    $qry = "insert into registration(uname,e_mail,user_email_status,r_area,r_city,isSeller,reg_pass,user_activation_code, birthdate,gender)
		     values ('$uname','$umail','not verified','$u_area','$ct','$seller','$user_encrypted_password','$user_activation_code','$birthday','$gender')";
		    mysqli_query($con,$qry);
		        echo "<script>window.location='login_saller.php';</script>";
		            }
		    else 
		    {
		     echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
		    }

  }
}
?>

