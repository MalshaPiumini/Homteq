<?php
session_start();
include("db.php");

$pagename="Sign up results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//Capture the 7 inputs entered in the 7 fields of the form using the $_POST superglobal variable
//Store these details into a set of 7 new local variables

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$pcode = $_POST['pcode'];
$telno = $_POST['telno'];
$email = $_POST['email'];
$password = $_POST['password'];
$confpassword = $_POST['confirmPassword'];
//if the mandatory fields in the form (all fields) are not empty      (hint: use the empty function) {
 //if the 2 entered passwords do not match  {
  //Display error passwords not matching message
  //Display a link back to register page   }
  //else  {
  //define regular expression
  //if email matches the regular expression      (hint: use preg_match)   {
  //Write SQL query to insert a new user into users table and execute SQL query
  //Execute INSERT INTO SQL query
  //Return the SQL execution error number using the error detector (hint: use mysqli_errno($conn))

//if the error detector returns the number 0, everything is fine    {
//Display registration confirmation message
//Display a link to login page    }
//else, which means if the error detector does not return the number 0, there is a problem    {
//Display generic error message     //if error detector returned number 1062 i.e. unique constraint on the email is breached
//(meaning that the user entered an email which already existed)     {
//Display email already taken error message & display a link back to signup page     }
//if error detector returned number 1064 i.e. invalid characters such as ' and \ have been entered      {
//Display invalid characters error message & display a link back to signup page     }    }   }
//else   {
//Display "email not in the right format" message and link back to signup page   }  }  }
//else {
 //Display "all mandatory fields need to be filled in " message and link back to signup page }

if (!(empty($fname) or
      empty($lname) or
      empty($address) or
      empty($pcode) or
      empty($telno) or
      empty($email) or
      empty($password) or
      empty($confpassword))) {

        if ($password!=$confpassword) {
          echo "Password and confirm passwords are not matching";
          echo "<br><a href='signup.php'>Back to signup page</a>";
        }else {
          echo "passwords matched";
          if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            //  $SQL="select prodName,prodPrice from Product where prodId=$index";
            $sql = "INSERT INTO users ". "(userType,userfName,userSname,userAddress,userPostCode,userTelNo,userEmail,
            userPassword ) ". "VALUES('c','$fname','$lname','$address','$pcode','$telno','$email','$password')";
            //run SQL query for connected DB or exit and display error message
    				$exeSQL=mysqli_query($conn, $sql) or die (mysqli_error($conn));
            echo "User added successfully";

          }else {
            echo "<br>Inavalid email";
            echo "<br><a href='signup.php'>Back to signup page</a>";
          }
        }
}else{
  echo "All mandatory feilds must be filled in";
}

//Write a SQL query to insert a new user into users table
//The SQL code for inserting a new record is
//INSERT INTO table_name (field1, field2, field3) VALUES (value1, value2, value3)
//Execute the INSERT INTO SQL query


include("footfile.html"); //include head layout
echo "</body>";
?>
