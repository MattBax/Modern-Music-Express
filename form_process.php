<?php include ('connection.php') ;?>

<?php



// define variables and set to empty values
$name_error = $email_error = $phone_error = $message_error = "";
$name = $email = $phone = $message = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Only letters and white space allowed";
        }

        if (strlen($name) < 10) {
            $name_error = "Entry must have at least 10 Characters";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }

        if (strlen($email) < 10) {
            $name_error = "Entry must have at least 10 Characters";
        }
    }

    if (empty($_POST["phone"])) {
        $phone_error = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[0-9]{3}-[0-9]{7}$/", $phone)) {
            $phone_error = "Invalid phone number - Remember to include the Prefix";
        }
    }


    if (empty($_POST["message"])) {
        $message_error = "A Message is required.";
    } else {
        $message = test_input($_POST["message"]);

        if (strlen($message) < 25) {
            $message_error = "Entry must have at least 25 Characters.";
        }
    }

    if ($name_error == '' and $email_error == '' and $phone_error == '' and $message_error == '') {
        $message_body = '';
        unset($_POST['submit']);
        foreach ($_POST as $key => $value){
            $message_body .=  "$key: $value\n";
        }
    

	
	
	
	
   

    $to = 'm.baxter1@nuigalway.ie';
    $subject = 'Contact Form Submit';
    if (mail($to, $subject, $message)) {
        $success = "Message sent, thank you for contacting us!";
        $name = $email = $phone = $message = '';
    }
    header("refresh:2; url=Home.html");

   
}
	
	$name=$conn->escape_string($_POST['name']);
			$email=$conn->escape_string($_POST['email']);
			$topic=$conn->escape_string($_POST['phone']);
			$comment=$conn->escape_string($_POST['message']);
			if ($stmt = $conn->prepare("INSERT INTO Contact_Form (Message, Name, Email, Phone_Num) VALUES (?, ?, ?, ?) ;"))
				{
				$stmt->bind_param("ssss", $comment , $name, $email, $phone);
				$stmt->execute();
				$stmt->close();
				}
			
			}
			else{
			$emailResult ="Error";
			}
			





function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}