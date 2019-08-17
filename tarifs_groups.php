<?php
include 'json_conf.php';

$tarifs = $ARRAY['tarifs'];

function price($a) {
	$prices = array();
	foreach ($a as $value) {
		$pay_period = $value['pay_period'];
		$price = $value['price'];
		array_push($prices, $price / $pay_period);		
	}
	$min_price = min($prices);
	$max_price = max($prices);
	echo $min_price;
	echo ' - ';
	echo $max_price;
};

foreach ($tarifs as $key => $value) { 

	$title = $value['title'];
	$speed = $value['speed'];
	$link = $value['link'];
	$free_options = $value['free_options'];
	$tarifs = $value['tarifs'];

	echo '<div class="tarif" id="'. $key .'">';
	echo '<h1>Тариф "';
	echo $title;
	echo '"</h1>';
	//-------
	echo '<div class="btn-forward">';
	echo '<div class="speed">';
	echo $speed; echo ' Мбит/с';
	echo '</div>';
	//-------
	echo '<div class="price">';
	price($tarifs);
	echo ' ₽/мес';
	echo '</div>';
	//-------
	if ($free_options) {
		echo '<ul class="free_options">';
		foreach ($free_options as $value) {
			echo '<li>';
			echo $value;
			echo '</li>';
		};
		echo '</ul>';
	}
	//-------
	echo '</div>';
	echo '<a class="link" href="';
	echo $link;
	echo '">узнать подробнее на сайте www.sknt.ru</a>';
	echo '</div>';
}

?>

<script src="js/totop.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script
