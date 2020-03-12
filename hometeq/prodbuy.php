<?php
include("db.php");
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select * from product where prodId =".$prodid;
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

echo "<table style='border: 0px'>";
while ($arrayp=mysqli_fetch_array($exeSQL))
{
  echo "<tr>";
  echo "<td style='border: 0px'>";
  echo "<img src=images/".$arrayp['prodPicNameLarge']." height=500 width=500>";
  echo "</td>";
  echo "<td style='border: 0px'>";
  echo "<p><h2 style=' color:#1c3e81; font-size:28'>".$arrayp['prodName']."</h2>"; //display product name as contained in the array
  echo "<p>".$arrayp['prodDescripLong']."</p>";
  echo "<p><h5 style='color:#8d194a; font-size:18'>£".$arrayp['prodPrice']."</h5>";
  echo "<p>Number to be purchased: </p>";

//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<select name=p_quantity>";
for($i=1; $i<$arrayp['prodQuantity']+1; $i++){
   echo" <option value=$i>$i</option>";
}
echo"</select>";

echo "<input type=submit value='ADD TO BASKET'>";

//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
echo "</td>";
echo "</tr>";
}

echo "</table>";
include ("footfile.html");
echo "</body>";

?>
