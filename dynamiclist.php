
<!DOCTYPE html>

<html lang="en">
<head>
	<?php include_once 'headma1.php'; ?>
</head>
<head>

<title>Dynamic Drop Down List</title>

</head>

<body>
<?php
	include "connection.php";
?>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">


City:
<select name="cmb_area">

<option value="">--- Select ---</option>
	
	
<?php 
	$qur="select * from area ORDER BY A_name ASC";
	$list=mysqli_query($con,$qur);
	// var_dump($list);

	while($row_list=mysqli_fetch_array($list))
	{
		?> <option value="<?php echo $row_list["A_name"]; ?>"> <?php echo $row_list["A_name"]; ?> </option>
		<?php
	}
 ?>

<?php

// mysql_connect("localhost","root","");

// mysql_select_db("abc");

// $select="abc";

// if(isset($select)&&$select!=""){

// $select=$_POST['NEW'];

// }

?>

<?php

// $list=mysql_query("select A_name from area asc");

// while($row_list=mysql_fetch_assoc($list)){

?>

<!-- <option value="<?php echo $row_list['A_id']; ?>">

 <?php if($row_list['A_name']==$select){ echo "selected"; } ?>

 <?php echo $row_list['A_name']; ?>

</option> -->

<?php

// }

?>

</select>
<input type="submit" name="Submit" value="Select" /> 
</form>

</body>

</html>
