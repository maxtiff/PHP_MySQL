<?php
	
	//establish short variable name
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$orders = file("$DOCUMENT_ROOT/bob/orders/orders.txt");

	$number_of_orders = count($orders);

?>
<html>
	<head>
		<title>Bob's Auto Parts - Customer Orders</title>
	<body>
		<h1>Bob's Auto Parts</h1>
		<h2>Customer Orders</h2>

		<?php
			
			if ($number_of_orders == 0)
			{
				echo "<p><strong>There are no orders pending. Please try again later.</strong></p>";
			}

			for ($i=0; $i < $number_of_orders; $i++) 
			{
				echo $orders[$i]."<br />";
			}

		?>
	</body>
</html>