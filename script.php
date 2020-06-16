<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<script src="dist/js/sb-admin-2.js"></script>

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

  