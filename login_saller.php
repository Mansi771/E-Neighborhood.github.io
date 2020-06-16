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
<body>

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
                                <a class="text-center" href="index.html"> <h4>LOGIN</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post">
                                    <div class="form-group">
                                        <!-- <input type="email" class="form-control" placeholder="Email"> -->
                                        <input class="form-control" type="text"  name="email" title="Must Enter proper Email Id" placeholder="Email" autocomplete="none">
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                                        <input class="form-control"  type="password" name="upass" id="typepass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required><br>
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
                                    <div class="form-group">
                                      <center>  <label>   Are You a Seller?? </label></center><br>
                                      <center>  <input type="radio" name="isusr"  value="yes" required="required"> YES &nbsp;&nbsp;
                                      <input type="radio" name="isusr"  value="no" required="required"> NO &nbsp;&nbsp;
                                        
                                    </div>
                                    <!-- <button class="btn login-form__btn submit w-100">Sign In</button> -->
                                    <button name="done" type="submit" class="btn login-form__btn submit w-100">Login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Don't have an account? <a href="register.php" class="text-primary">Register</a> now</p>
<!--                                    <a href=forget_bs_temp.php>Forget Password</a> -->
                               <a href="sbforget_password.php"> Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php 
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
      var_dump($row['isSeller']==$yes);
      if($row['email']==$mail && $row['isSeller']==$yes)
         { 
                // echo "Hello";
            
                        if(password_verify($pass,$row['reg_pass']))
                            // if($row['reg_pass'] == $pass)
                        {
                             if($row['reg_app']==$yes)
                            {
                                 
                                
                                         if($row['user_email_status']=="verified")
                                        {
                                             if($row['active']=="yes")
                                             {
                                            // $_SESSION['uname']=$row['uname'];
                                             $_SESSION['email']=$row['e_mail'];
                                            ?>
                                                <script>window.location="index_saller.php";</script>
                                            <?php
                                             }
                                             else
                                             {
                                                 echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Your Account is not active!!!')</SCRIPT>";
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
                    else
                    {
                        echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Your account does not exist!!')</SCRIPT>";

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
                              if($row['active']=="yes")
                            {
                         // $_SESSION['uname']=$row['uname'];
                           $_SESSION['email']=$row['e_mail'];


                            ?>

                                <script>window.location="index_buyer.php";</script>

                            <?php
                              }
                            echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Your Account is not active!!!')</SCRIPT>";
                            


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
//       else
//        {
//          echo "<SCRIPT LANGUAGE='JavaScript'> window.alert('Please Enter Correct Details')</SCRIPT>";
//        }
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