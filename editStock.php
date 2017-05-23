   <!--This include is an inline menu bare for the purpose of multiple pages in admin area -->
        <?php include 'adminMenu.html'; ?>
		<?php include ('connection.php') ;?>
        <?php
       
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST['update'])) {
                $updateSQL ="UPDATE Stock 
			SET productName='$_POST[productName]',
			productDesc='$_POST[productDesc]',
			price='$_POST[price]',
			productQty='$_POST[productQty]',
			WHERE idStock='$_POST[idStock]'";
                $conn->query($updateSQL);
            }
            if(isset($_POST['add'])){
                $addsql = "INSERT INTO Stock (productName, productDesc, price, productQty) 
						VALUES ('$_POST[newproductName]', '$_POST[newproductDesc]', '$_POST[newprice]', '$_POST[newproductQty]')";
                $conn->query($addsql);
            }

            if(isset($_POST['delete'])){
                $deleteSQL ="DELETE FROM Stock WHERE idStock='$_POST[idStock]'";
                $conn->query($deleteSQL);
            }


        }
        //create a SQL query to get back all data from the table
        $getSql = "SELECT * FROM Stock";
        //call the query on the connection made
        $resultData = $conn->query($getSql);

        echo"<br>
	<br>
	<table style='width:100%' border=1 cellspacing='3' cellpadding='3'>
	<tr>
	<th style='width:4%'>StockID</th>
	<th>Name</th>
	<th style='width:30%'>Description</th>
	<th>Price</th>
	<th>Stock Level</th>
	
	</tr>";
        if ($resultData->num_rows >0){
            //loop through the rows in database and display them
            while ($row = $resultData->fetch_assoc()){
                echo "<form action=editStock.php method=post>";
                echo "<tr>";
                echo '<td><input readonly type=text name=idStock value="'.$row['idStock'].'"></td>';
                echo '<td><input type=text name=productName value="'.$row['productName'].'"></td>';
                echo '<td><input style="width:98%" type=text name=productDesc value="'.$row['productDesc'].'"></td>';
                echo '<td><input type=text name=price value="'.$row['price'].'"></td>';
                echo '<td><input type=text name=productQty value="'.$row['productQty'].'"></td>';
                echo "<td><input type=submit name=update value=update></td>";
                echo "<td><input type=submit name=delete value=delete></td>";
                echo "</tr>";
                echo "</form>";
            }
        }else {
            echo "0 results";
        }
        echo "<form action=editStock.php method=post>";
        echo "<tr><td></td>";
        echo "<td><input type=text name=newproductName ></td>";
        echo "<td><input style='width:98%'type=text name=newproductDesc ></td>";
        echo "<td><input type=text name=newprice ></td>";
        echo "<td><input type=text name=newproductQty ></td>";
        echo "<td><input type=submit name=add value=add></td>";
        echo "</tr>";
        echo "</form>";
        echo "</table>";
		
		
        $conn->close();
        ?>
  

