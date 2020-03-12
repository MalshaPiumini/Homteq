<?php
include("db.php");

$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


$prodid=$_GET['u_prod_id'];
echo "<p>Selected product Id: ".$prodid;

/* echo "<table>";
 echo "<tr>";
 echo "<img src=images/".$prodPic." height=300 width=300>";
 echo "<td style='border: 0px'>";
 echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
 echo"<p>".$arrayp['prodDescripShort']."</p>";
 echo "</td>";
 echo "</tr>";
 echo "</table>"*/

 $SQL="select prodId, prodName, prodPicNameLarge,prodDescripLong,prodQuantity from Product where prodId =".$prodid ;

 //run SQL query for connected DB or exit and display error message
 $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
 echo "<table style='border: 0px'>";

 //create an array of records (2 dimensional variable) called $arrayp.
 //populate it with the records retrieved by the SQL query previously executed.
 //Iterate through the array i.e while the end of the array has not been reached, run through it
 while ($arrayp=mysqli_fetch_array($exeSQL))
 {
 echo "<tr>";
 echo "<td style='border: 0px'>";

 echo "<img src=images/".$arrayp['prodPicNameLarge']." height=300 width=300>";
 echo "</td>";
 echo "<td style='border: 0px'>";

 echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array

 echo"<p>".$arrayp['prodDescripLong']."</p>";

 echo "<p>Number left in stores: ".$arrayp['prodQuantity'];

 echo "<p>Number to be purchased: ";

//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action='basket.php' method = POST>";
echo"<select name='p_quantity' >";
for ($x = 1; $x <= $arrayp['prodQuantity']; $x++) {
    echo "<option value=$x >$x</option>  <br>";
}
echo "</select>";
//button
echo "<input type=submit value='ADD TO BASKET'>";
echo "<input type=hidden name='h_prodid' value=".$prodid.">";
echo "</form>";
echo "</td>";
echo "</tr>";
 }
echo "</table>";
include("footfile.html"); //include head layout
echo "</body>";
 ?>
