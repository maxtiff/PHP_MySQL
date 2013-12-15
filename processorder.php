<?php
	// Create short variable names
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$addy = $_POST['addy'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$date = date('H:i, jS F Y');
?>

<html>
<head>
	<title>Bob's Auto Parts - Order Results</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<h1 style="font-family: 'Open Sans', sans-serif;">Bob's Auto Parts</h1>
<h2>Order Results</h2>
	<?php

		echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

		$totalqty = 0;
		$totalqty = $tireqty + $oilqty + $sparkqty;
		
		if ($totalqty == 0) {
				echo '<p style = "color:red; font-family:helvetica">';
				echo '<strong>You did not order anything on the previous page! Press the back button and try again.</strong>';
				echo '</p>';
				exit;
		} else {
				echo "<p>Your order is as follows: </p>";
				if ($tireqty > 0)
					echo "$tireqty tire(s)<br />";
				if ($oilqty > 0)
					echo "$oilqty quart(s) of oil<br />";
				if ($sparkqty > 0)
					echo "$sparkqty spark plug(s)<br />";
				echo "Items Ordered: ".$totalqty."<br />";
		}
		
		//Define price constants for individual tires, quarts of oil, and individual spark plugs.
		define('TIREPRICE',100);
		define('OILPRICE', 10);
		define('SPARKPRICE', 4);
		
		//Calculate a discount (if applicable).
		if ($tireqty < 10) {
				$discount = 0;
		} elseif (($tireqty >= 10) && ($tireqty <=49)) {
				$discount = 5;
		} elseif (($tireqty >= 50) && ($tireqty <=99)) {
				$discount = 10;
		} elseif ($tireqty >= 10) {
				$discount = 15;
		}
		
		//Calculate order price.
		$totalamount = 0.00;
		$totalamount = ($tireqty * TIREPRICE)
								 + ($oilqty * OILPRICE)
								 + ($sparkqty * SPARKPRICE)
								 - ($discount);
								 
		$totalamount=number_format($totalamount, 2, '.', ' ');

		echo "<p>Total of order is $".$totalamount."</p>";
		echo "<p>Address to ship to is ".$addy."</p>";

		$outputstring = $date."\t".$tireqty." tires\t".$oilqty." oil\t"
						.$sparkqty." spark plugs\t\$".$totalamount
						."\t". $addy."\n";

		$fp = fopen("$DOCUMENT_ROOT/bob/orders/orders.txt", 'ab');

		flock($fp, LOCK_EX);

		if (!$fp) 
		{
			echo "<p><strong> Your order could not be processed at this time.\n
					Please try again later.</strong></p>";
			exit;
		} 

		fwrite($fp, $outputstring, strlen($outputstring));
		flock($fp, LOCK_UN);
		fclose($fp);
	?>
</body>
<html>
