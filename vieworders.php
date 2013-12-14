<?php
	
	//establish short variable name
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']

?>
<html>
	<head>
		<title>Bob's Auto Parts - Customer Orders</title>
	<body>
		<h1>Bob's Auto Parts</h1>
		<h2>Customer Orders</h2>

		<?php

			@$fp = fopen("$DOCUMENT_ROOT/bob/orders/orders.txt", 'rb');

			if (!$fp)
			{
				echo "<p><strong>There are no orders pending. Please try again later.</strong></p>";
				exit;
			}

			flock($fp, LOCK_SH);

			while (!feof($fp))
			{
				$order = fgets($fp, 999);
				echo $order."<br />";
			}

			echo 'Final position of the file pointer is '.(ftell($fp));
			echo '<br />';
			rewind($fp);
			echo 'After rewind, the position is '.(ftell($fp));
			echo '<br />';

			flock($fp, LOCK_UN);

			fclose($fp);
		?>
	</body>
</html>