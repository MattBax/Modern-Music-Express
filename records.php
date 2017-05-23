<h1><?php if ($id != '') { echo "Edit Record"; }  ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
. "</div>";
} ?>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<p>Question: <?php echo $question; ?></p>
<p>Name: <?php echo $name; ?></p>
<p>Email: <?php echo $email; ?></p>
<p>Category: <?php echo $category; ?></p>
<strong>Notes: *</strong> <input type="text" name="notes"
value="<?php echo $notes; ?>"/><br/>

<input type="submit" name="submit" value="Submit" />
</div>
</form>
</body>
</html>

<?php }



/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$notes = htmlentities($_POST['notes'], ENT_QUOTES);


// check that firstname and lastname are both not empty
if ($id == '' || $notes == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($id, $question, $name, $email, $category, $notes, $error);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $conn->prepare("UPDATE comments SET notes = ? WHERE id=?"))
{
$stmt->bind_param("si", $notes, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: showContactUs.php");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
}
// if the form hasn't been submitted yet, get the info from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the recod from the database
if($stmt = $conn->prepare("SELECT * FROM comments WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $question, $name, $email, $category, $notes);
$stmt->fetch();

// show the form
renderForm($id, $question, $name, $email, $category, $notes, null);

$stmt->close();
}
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the showContactUs.php page
else
{
header("Location: showContactUs.php");
}
}
}



// close the conn connection
$conn->close();
?>
</div>