<?php

//Looping through arrays:
$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);


foreach ($prices as $item => $value) 
{
	echo $item." - ".$value."<br />";
}

//or . . .
echo "<br />";

reset($prices);
while ($element = each($prices))
{
	echo $element['key'];
	echo " - ";
	echo $element['value'];
	echo "<br />";
}

//or . . .
echo "<br />";

reset($prices);
while (list($product, $price) = each($prices))
{
	echo "$product - $price<br />";
}

?>