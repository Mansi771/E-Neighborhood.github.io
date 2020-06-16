<?php
//Check whether the submission is made
<div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="panel-heading">
                          <center>   <h1> Registration</h1></center>
                        </div>
                        <!-- /.panel-heading -->
                        <form method="post">
                             <center>
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                             <div class="form-row">
<div class="col-lg-12">
                        <label for="birthday">Birthday:</label>
                        <input type="date" id="birthday" name="birthday" title="Enter a valid date" required="required">
                        </div></div>
                        &nbsp;<div class="form-row">
                        <br>
                        &nbsp;&nbsp;
                        <input type="submit" name="done" class="btn btn-success" value="Submit">
                        &nbsp;

if(!isset($_POST["hidSubmit"])){

//Declarate the necessary variables
$strdate="";
$strdate1="";
DisplayForm();
}
else{
$strdate=$_POST["txtdate"];

//Check the length of the entered Date value
if((strlen($strdate)<10)OR(strlen($strdate)>10)){
echo("Enter the date in 'dd/mm/yyyy' format");
}
else{

//The entered value is checked for proper Date format
if((substr_count($strdate,"/"))<>2){
echo("Enter the date in 'dd/mm/yyyy' format");
}
else{
$pos=strpos($strdate,"/");
$date=substr($strdate,0,($pos));
$result=ereg("^[0-9]+$",$date,$trashed);
if(!($result)){echo "Enter a Valid Date";}
else{
if(($date<=0)OR($date>31)){echo "Enter a Valid Date";}
}
$month=substr($strdate,($pos+1),($pos));
if(($month<=0)OR($month>12)){echo "Enter a Valid Month";}
else{
$result=ereg("^[0-9]+$",$month,$trashed);
if(!($result)){echo "Enter a Valid Month";}
}
$year=substr($strdate,($pos+4),strlen($strdate));
$result=ereg("^[0-9]+$",$year,$trashed);
if(!($result)){echo "Enter a Valid year";}
else{
if(($year<1900)OR($year>2200)){echo "Enter a year between 1900-2200";}
}
}
}
DisplayForm();
}

//User-defined Function to display the form in case of Error
function DisplayForm(){
global $strdate;
?>