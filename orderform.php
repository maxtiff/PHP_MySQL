<html>
<head>
	<title>Bob's Auto Parts</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style>
	input {
      border: 2 solid gray;
      border-radius: 3;
      padding: 10px;
      font-size: 18px;
    }
    input[type="submit"] {
      border: 0;
      border-radius: 0;
      background: red;
      color: white;
    }
    </style>
</head>
<p style="font-size: 40px; font-family: 'Open Sans', sans-serif;">Bob's Auto Parts</p>
<body>
	<form action="processorder.php" method="post">
	<table border="0">
	<tr bgcolor="#cccccc">
		<td style="font-size: 18px; font-family: 'Open Sans', sans-serif;" width="150">Item</td>
		<td style="font-size: 18px; font-family: 'Open Sans', sans-serif;" width="15">Quantity</td>
	</tr>

	<?php

		$products = array('Tires' => 'tireqty', 'Oil' => 'oilqty', 'Spark Plugs' => 'sparkqty');

		foreach ($products as $items => $var) 
		{
			echo "<tr>";
			echo "<td style=\"font-size: 18px; font-family: 'Open Sans', sans-serif;\">$items</td>";
			echo "<td align=\"left\"><input type=\"text\" name=\"$var\" size=\"3\" maxlength=\"3\" /></td>";
			echo "</tr>";
		}

	?>
	
	<tr>
		<td style="font-size: 18px; font-family: 'Open Sans', sans-serif;">Address</td>
		<td align="center"><input type="text" name="addy" size="40"
			maxlength="40" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" value ="Submit Order" /></td>
	</tr>
	</table>
	</form>
</body>
</html>