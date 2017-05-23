<?php

// connect to the database
include('connection.php');

// confirm that the 'id' variable has been set
if (isset($_GET['PK']) && is_numeric($_GET['PK']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];

// delete record from database
if ($stmt = $conn->prepare("DELETE FROM Contact_Form WHERE PK = ? LIMIT 1"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
$conn->close();

// redirect user after delete is successful
header("Location: showContactUs.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: showContactUs.php");
}

?>