<?php
session_start();
	$pagename="Sign Up"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=myStyleSheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

	echo"<form action='signup_process.php'  method=post>";
	echo "
	<table class ='t2' >
	<tr><td>First Name :</td> <td><input type=text name='fname'  autofocus></td></tr>
	<tr><td>Last Name : </td><td><input type=text name='lname' ></td></tr>
	<tr><td>Address : </td><td><input type=text name='address' ></td></tr>
	<tr><td>Post Code : </td><td><input type=text name='pcode' ></td></tr>
	<tr><td>Tel No : </td><td><input type=text name='telno' ></td></tr>
	<tr><td>Email : </td><td><input type=text name='email' ></td></tr>
	<tr><td>Password : </td><td><input type=password name='password' ></td></tr>
	<tr><td>Confirm Password : </td><td><input type=password name='confirmPassword' ></td></tr>

	<td><input type=submit value='Sign Up'></td>
	<td><input type=reset value='Clear Form'></td>
	</table>";

	echo "</form>";
	include("footfile.html"); //include head layout
	echo "</body>";
?>
