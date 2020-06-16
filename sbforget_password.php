<?php 

session_start();

?>

<html lang="en"><head>

    <style id="stndz-style"></style>
    <title>E-NEIGHBOURHOOD</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png"  href="images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    
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


<div style="background-image: url('images/Forgot Password.jpg');" style="background-size: cover;">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Forgot Password</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post">
                                    <div class="form-group">
                                        <input class="form-control"  type="email" name="email" title="Must Enter proper Email Id"  placeholder="Email">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password" name="upass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                                    </div>     -->
                                    <!-- <button class="btn login-form__btn submit w-100">Sign In</button> -->
                                    <button name="done" type="submit" class="btn login-form__btn submit w-100">Retrieve Password</button>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    
    $mail=$_POST['email'];
include_once 'connection.php';
   $qry="select * from registration where e_mail='$mail'";
//this method execute when connection is success than it execute the query and store the result in res variable
$res= mysqli_query($con,$qry);
  
 //this method will get the value of res variable and fetch from the database and the result will generated in array and store in row variable
$row=mysqli_fetch_array($res);

    

 //this use for compare two values one from user inputted and another from database
  if($row['e_mail']==$mail)
  {

    // echo $row['s_id'];
      //Sending mail after checking username and email availibility
            
        
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        require 'PHPMailer/Exception.php';

      $base_url = "http://www.E-Neighborhood.github.io/";  //change this baseurl value as per your file path
    $mail_body =  "<p>Please Open this link for reseting your password -      ".$base_url."reset_pass.php?id=".$row['us_id']."<p>Best Regards,<br>Team@E-NEIGHBORHOOD</p>";
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
        $mail1->AddReplyTo($mail, strtoupper($mail));
        $mail1->AddAddress($mail, strtoupper($mail));
        $mail1->Subject = "Password Reset";
        //$mail->WordWrap = 50; 
        $mail1->Body = $mail_body;
        $mail1->IsHTML(true);
        if($mail1->Send())
                {
            echo "<script>alert('Mail Successfully Sent,Please check your mailbox');</script>";

            echo "<script>window.location='login_saller.php';</script>";


                }
        else 
        {
         echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
        }

  }
     else 
        {
         echo "<script>alert('Your account does not exist!!');</script>";
        }

}
?>