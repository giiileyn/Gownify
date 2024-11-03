<?php

$hostname = "localhost";
$dbuser ="root";
$dbpassword = "";
$dbname = "gownshop3";
$con = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
if (!$con)
{
die("Connection Failed");
}
// or die(mysqli_error($con));
//$con=mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
?>