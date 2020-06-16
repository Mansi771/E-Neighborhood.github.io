<?php
session_start();
session_destroy();
echo "<SCRIPT LANGUAGE='JavaScript'>



 window.alert('Logout Success')</SCRIPT>";
  header("location: malogin.php");
?>
<script type="text/javascript">
function preventBack()
{
	window.history.forward();
	}
	setTimeout("preventBack()",10);
	window.onunload=function(){null};
    
    </script>