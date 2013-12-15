<?php
	
	//establish short variable name
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$orders = file("$DOCUMENT_ROOT/bob/orders/orders.txt");

	$number_of_orders = count($orders);

?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<title>Bob's Auto Parts - Customer Orders</title>
		<style>
			h1 {
				font-size: 36px;
				font-family: 'Open Sans', sans-serif;
			}
			h2 {
				font-size: 18px;
				font-family: 'Open Sans', sans-serif;
			}
			body {
				font-size: 9px;
				font-family: 'Open Sans' sans-serif;
			}
			table {
				border: 2 solid white;
				font-size: 15px;
			}
			th {
				border: 2 solid gray;
				background-color: #CCCCCC;
				/*border-radius: 3;*/
				font-size: 15px;
			}
			td {
				border: 2 solid gray;
				border-radius: 3;
				padding: 4px;
				font-size: 15px;
			}
		</style>
	<body>
		<h1>Bob's Auto Parts</h1>
		<h2>Customer Orders</h2>

		<?php
			
			if ($number_of_orders == 0)
			{
				echo "<p><strong>There are no orders pending. Please try again later.</strong></p>";
			}

			echo "<table border=\"1\">\n";
			echo "<tr>";

			$headers = array('Order Date', 'Tires', 'Oil', 'Spark Plugs', 'Total', 'Address');

			foreach ($headers as $item)
			{
				echo "<th>$item</th>"; 
			}

			echo "</tr>";

			for ($i=0; $i < $number_of_orders; $i++) 
			{
				// echo "<p style=\"font-size: 12px; font-family: 'Open Sans', sans-serif;\">".$orders[$i]."</p><br />";
				$line = explode("\t", $orders[$i]);

				$line[1] = intval($line[1]);
				$line[2] = intval($line[2]);
				$line[3] = intval($line[3]);

				echo "<tr>
						<td>".$line[0]."</td>
						<td align=\"right\">".$line[1]."</td>
						<td align=\"right\">".$line[2]."</td>
						<td align=\"right\">".$line[3]."</td>
						<td align=\"right\">".$line[4]."</td>
						<td>".$line[5]."</td>
					</tr>";
			}

			echo "</table>";

		?>
	</body>
</html>