<?php
include('dbconnect.php');
include('functions.php');
$result = mysql_query("SELECT * FROM members WHERE mid='$mid'")
or die ('cannot select members money');

$row = mysql_fetch_array($result);
$username = stripslashes($row['username']);
$name = stripslashes($row['name']);
$email = $row['email'];
$password = $row['password'];
$hcredits = $row['hcredits'];
$scredits = $row['scredits'];
$ecredits = $row['ecredits'];
$mbenefits = $row['mbenefits'];
$datejoined = $row['datejoined'];
$status = $row['status'];
$level = $row['level'];
$hide = $row['hide'];
$masteradmin = $row['masteradmin'];
$admin = $row['admin'];
?>