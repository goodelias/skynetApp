<?php 
echo '<div class="bar">Тариф "';
include 'json_conf.php';
$data    = $_POST['idWarAndArg'];
$data    = json_decode("$data", true);
$tarifId = $data[0];
$tarif   = $ARRAY['tarifs'][$tarifId]['tarifs'];
$name    = $ARRAY['tarifs'][$tarifId]['title'];

usort($tarif, function($a,$b){
    return ($a['ID']-$b['ID']);
});

$base_price = $tarif[0]['price'];

echo $name;
echo '"<div class="btn-back" id="home"></div></div>';

foreach ($tarif as $key => $value) { 
	$id = $value['ID'];

	$titles = $value['title'];
	preg_match('#\((.*?)\)#', $titles, $title);

	$price = $value['price'];
	$pay_period = $value['pay_period'];

	echo '<div class="tarif" id="'. $tarifId . '-' . $id . '">';
	echo '<h1>';	
	if ($key) {
		print $title[1];
	} else {
		echo '1 месяц';
	}
	echo '</h1>';
	
	echo '<div class="btn-forward"><div class="price">';
	echo $price / $pay_period;
	echo ' ₽/мес';
	echo '</div>';

	echo '<div class="pay_and_sale"><span>разовый платеж - ';
	echo $price;
	echo ' ₽';
	echo '</span>';

	if ($key) {
		echo '<span>скидка - ';
		echo ($base_price - $price / $pay_period) * $pay_period;
		echo ' ₽</span></div>';
	}
	echo '</div></div></div>';		

 }

?>

<script src="js/totop.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/btnBack.js" type="text/javascript"></script>