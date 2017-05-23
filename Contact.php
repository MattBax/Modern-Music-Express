<?php include('form_process.php'); ?>
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
	  <li><a href="adminContent.php">Admin Page</a></li>
	  
	    </ul>
		
		
		<div id="content">
		

		
		<h2>Contact Us:</h2>
		
		<div class="mainText">
		Need to contact us? Check out the information below!
		</div>
		<h4>Fulfilment Executive: Mary Walsh</h4>
		
		<ul class="a">
		<li>Tel No: 048912457 / 086125678</li>
		<li>Email: m.walsh@mme.com</li>
		</ul>
		
		<h4>Marketing Officer: Mark Faherty</h4>
		
		<ul class="a">
		<li>Tel No: 048314221 / 085709223</li>
		<li>Email: m.faherty@mme.com</li>
		</ul>
		
		<h4>Secretary: Susan Keelan & James Clarke</h4>
		
		<ul class="a">
		<li>Tel No: 048671453</li>
		<li>Email: enquires@mme.com</li>
		</ul>
		
		
		
		<h2>Have a General Query?</h2>
		<div class="mainText">
		<p>Fill in the Contact Form below!</p>
		</div>
		
		
		
		<div class="formstyling">
		<form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h3>Contact</h3>
        <h4>Contact us today, and get reply with in 24 hours!</h4>
        <fieldset>
            <input placeholder="Your name" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
            <span class="error"><?= $name_error ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2">
            <span class="error"><?= $email_error ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3">
            <span class="error"><?= $phone_error ?></span>
        </fieldset>
        <fieldset>
            <label for="Category">Type of Query</label>
                <select>
                    <option value="Sales">Sales</option>
                    <option value="Returns">Returns</option>
                    <option value="Shipping">Shipping</option>
                    <option value="Other">Other</option>
                </select>
        </fieldset>
        <fieldset>
      <textarea value="<?= $message ?>" name="message"  value="<?= $message ?>" tabindex="5">
      </textarea>
            <span class="error"><?= $message_error ?></span>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>
        <div class="success"><?= $success ?></div>
    </form>
	</div>	
		
		
		<div id="footer">
		<h3>&copy; Modern Music Express 2016</h3>
		</div><!-- #footer -->
		
		
	</div><!-- #wrapper -->
	
</body>

</html>