<?php
//this is your database name.
$db="abc2";
//this is your username
$mysql_username="root";
//password will by deafault null
$mysql_password="";
//this is host name you can wirte http://127.0.0.0
$server_name="localhost";
//this method gets the parameter value to connect the database
$con = mysqli_connect($server_name,$mysql_username,$mysql_password,$db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

mysqli_select_db($con,"abc2");

?>