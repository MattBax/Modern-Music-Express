<!DOCTYPE html>
<html>
	<head>
	
	
	<link rel="stylesheet" type="text/css" href="externalstyle.css" />
	<style>
	
	 
.clockdate-wrapper {
    background-color: #333;
    padding:10px;
    max-width:120px;
    width:50%;
    text-align:left;
    border-radius:5px;
    margin:0 auto;
    margin-top:15%;
	position:absolute;
	top:-120px;
}
#clock{
    background-color:#333;
    font-family: sans-serif;
    font-size:20px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
	
}
#clock span {
    color:#888;
    text-shadow:0px 0px 1px #333;
    font-size:30px;
    position:absolute;
    top:0px;
    left:0px;
}	

#background-image {
	width: 100%;
	height: auto;


}

.container img {
	max-height:80%;
	max.width:auto%;

}
}


</style>
	
	
	<script type="text/javascript" language="javascript">
	
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();

    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
	
	
	var image1 = new Image;
	var image2 = new Image;
	var image3	= new Image;
	var image4	= new Image;
	var image5	= new Image;
	var image6	= new Image;
	image1.src = "headerimg.jpg";
	image2.src = "headerimg2.jpg";
	image3.src = "headerimg3.jpg";
	image4.src = "headerimg4.jpg";
	image5.src = "headerimg5.jpg";
	image6.src = "headerimg6.jpg";
	
	var frame = new Array(image1,image2,image3,image4,image5,image6);
	var numframes = frame.length;
	var curframe = 0;

	function animateBanner()
{
   curframe++;
   if(curframe == numframes) curframe = 0;
   document.myBanner.src = frame[curframe].src;
   setTimeout("animateBanner()",3000);  
}
	
	
	
	
	
	
	/* function validateForm(thisform){
	if(thisform.FirstName.value=="") {
	alert("Please enter your First Name.");
	thisform.FirstName.focus();
	return false;
	}
	
	if(thisform.EmailAddress.value=="") {
	alert("Please enter your Email Address.");
	thisform.EmailAddress.focus();
	return false;
	}
	if(thisform.Message.value=="") {
	alert("Please enter your Message.");
	thisform.Message.focus();
	return false;
	}
	var e = thisform.EmailAddress.value;
	
	if ((e.indexOf("@")<0) || (e.indexOf(".")<0)){
	alert("Please include an '@' or '.' symbol. in your Email Address.")
	thisform.EmailAddress.focus();
	return false;
	}
	if (e.length < 10) {
	alert("Email Address must be at least 10 characters.");
	thisform.EmailAddress.focus();
	return false;
	}
	var f = thisform.Message.value;
	
	if (f.length < 25){
	alert("Message must be at least 25 characters.");
	thisform.Message.focus();
	return false;
	
	}
	
	var g = thisform.FirstName.value;
	
	if (g.length < 10){
	alert("Full Name must be at least 10 characters.");
	thisform.FirstName.focus();
	return false;
	
	}
	
	else {
	alert("Thank you for your query! We will get back to you as soon as possible.")
	
	}
		
}
 */

	 
      
		  
		  
      </script>
	  
	  
	

	
</script>


	
	</head>
	
	
	<body onload="startTime(), animateBanner()">
	
  
	<div id="wrapper">
		
	<div id="header">
	
	<div class="container">
	<img name="myBanner" src="headerimg.jpg">
	</div>
				
	<div id="clockdate"></div>
	<div class="clockdate-wrapper"><div>
	<div id="clock""></div>
   
	 
   
	</div>
	
	
  
</div>
		
		
		
		<h1 style="color: black;font: sans-serif;font-size: 40px;text-transform: uppercase;text-align: center;">Modern Music Express</h1>
		
		
		</div><!-- #header -->
		
		<ul id="nav">
      <li><a href="Home.html">Home Page</a></li>
      <li><a href="About.html">About Us</a></li>
      <li><a href="Special.html">Special Offers</a></li>
      <li><a href="Contact.php">Contact</a></li>
      <li><a href="Useful.html">Useful Links</a></li>
	  <li><a href="adminContent.php">Admin: Contact</a></li>
	    </ul>
		
		<div id="content">
		
		
	<?php
// connect to the database
include('connection.php');

// get the records from the database
if ($result = $conn->query("SELECT * FROM Contact_Form ORDER BY PK"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>PhoneNumber</th><th>Message</th><th>Edit</th><th></th><th></th></tr>";


while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row->PK . "</td>";
echo "<td>" . $row->Name . "</td>";
echo "<td>" . $row->Email . "</td>";
echo "<td>" . $row->Phone_Num . "</td>";
echo "<td>" . $row->Message . "</td>";
echo "<td><a href='records.php?id=" . $row->PK . "'>Edit</a></td>";
echo "<td><a href='delete.php?id=" . $row->PK. "'>Delete</a></td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

?>


</div>

		<div id="footer">
		<h3>&copy; Modern Music Express 2016</h3>
		</div><!-- #footer -->
		
		
</body>
</html>
	