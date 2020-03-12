<?php
// Start the session
session_start();
include("db.php");

$pagename=" Your Smart basket";
echo "<link rel=stylesheet type='text/css' href='mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";



//*************Task 3**********
echo "<br>";
echo "<table>
 	 	 		<tr>
 	 	 			<th>Product Name</th>
 	 	 			<th>Unit Price</th>
 	 	 			<th>Quantity</th>
 	 	 			<th>Sub Total</th>
 	 	 			<th>Action</th>
 	 	 		</tr>";


if(isset($_SESSION['basket'])){
    $total_amount=0;

    //**********TASK 1***********
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['p_quantity'];

    //echo "selected product ID : ".$newprodid;
    //echo "<br>";
    //echo "Quantity : ".$reququantity;

    //***********TASK 2***********
    //create a new cell in the  basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid]=$reququantity;
    //echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
    echo "<p>1 item added";

    foreach($_SESSION['basket'] as $index => $value) {
      $key = $index;
      echo "Key= $index, Value= $value";
      $SQL="select * from product where prodId=".$key;
      //run SQL query for connected DB or exit and display error message
      $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

      while ($arrayp=mysqli_fetch_array($exeSQL))
      {
        $subTotal=$value * $arrayp['prodPrice'];
        $total_amount= $total_amount + $subTotal;

        echo "<form action=basket.php   method= 'post'>";
        echo "<tr>
            <td>".$arrayp['prodName']."</td>
            <td>".$arrayp['prodPrice']."</td>
            <td>".$value."</td>
            <td>".$subTotal."</td>
            <td><input type=submit value=Remove></input></td>
          </tr>";

        echo "<input type=hidden name=r_prodId value=".$index.">";
        echo "</form>";
    }
    echo "Total amount : ".$total_amount;
  }
}else {
  echo "current basket unchanged !!";
}

//*******************************************************************************

include("footfile.html"); //footer layout
echo "</body>";
?>
