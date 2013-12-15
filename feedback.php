<?php

//create short variable names
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$feedback = trim($_POST['feedback']);

//set up some static information
$toaddress = "travismay@gmail.com";

$subject = "Feedback from web site";

$mailcontent = "Customer name: ".$name."\n";
			   "Customer email: ".$email."\n";
			   "Customer comments: ".$feedback."\n";

$from_addy = "From: webserver@example.com";

//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $from_addy);

?>

<html>
<head>
<title>Bob's Auto Parts - Feedback Submitted</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style>
	p {
		font-size: 20px;
		font-family: 'Open Sans', sans-serif;
	}
</head>
<body>
	<h1>Feedback submitted</h1>
	<p>Your feedback has been sent.</p>
	<p>
		<?php

		echo n12br($mailcontent);

		?>
	</p>
</body>
</html>