
<!--This include is an inline menu bare for the purpose of multiple pages in admin area -->
<?php include 'adminMenu.html'; ?>
<?php include ('connection.php') ;?>
<?php

	//create a SQL query to get back all data from the table
	$getSql = "SELECT * FROM Stock";
	//call the query on the connection made
	$resultData = $conn->query($getSql);
	
	echo"<br>
	<br>
	<table style='width:100%' border=1 cellspacing='3' cellpadding='3'>
	<tr>
	<th>StockID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Price</th>
	<th>Stock Level</th>

	</tr>";
	if ($resultData->num_rows >0){
		//loop through the rows in database and display them
		while ($row = $resultData->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['idStock']."</td>";
		echo "<td>".$row['productName']."</td>";
		echo "<td>".$row['productDesc']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['productQty']."</td>";

		}
	}else {
		echo "0 results";
	}
	echo "</table>";
	$conn->close();
?>
