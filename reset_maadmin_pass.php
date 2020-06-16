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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
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



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Reset Password</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post">
                                    

                                    <div class="form-group">
                                        <input class="form-control" id="pass" type="password" placeholder="Password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                                    </div>    
                                    <div class="form-group">
                                        <input class="form-control" id="cpass" type="password" placeholder="Password" name="cpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                                    </div>    
                                    <!-- <button class="btn login-form__btn submit w-100">Sign In</button> -->
                                    <button name="done" type="submit" class="btn login-form__btn submit w-100">Reset Password</button>
                                </form>
                                <!-- <a href="forget_pass.php">Forget Password</a> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>



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

    <?php
	if (isset($_POST['done'])) 
        {
		include "connection.php";
        $id=$_GET["id"];
        $pass=$_POST['pass'];
		$user_encrypted_password = password_hash($pass, PASSWORD_DEFAULT);  
		 $qry=" UPDATE maadmin
				SET password= '$user_encrypted_password' 
				WHERE mad_id= '$id'
				";
        
            mysqli_query($con,$qry);
        echo "<script>alert('Password changed successfully!!!!');</script>";
        
         echo "<script>window.location='malogin.php';</script>";
		
	}




?>