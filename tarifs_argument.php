<?php 
echo '<div class="bar">';
include 'json_conf.php';
$data    = $_POST['idWarAndArg'];
$data    = json_decode("$data", true);
$tarifId = $data[0];
$id      = $data[1];
$name    = $ARRAY['tarifs'][$tarifId]['title'];
$tarif   = $ARRAY['tarifs'][$tarifId]['tarifs'];
echo 'Выбор тарифа';
echo '<div class="btn-back" id="'. $tarifId .'"></div></div>';

echo '<div class="tarif">';
foreach ($tarif as $key => $value) {
	if ($id == $value['ID']) {
		echo '<h1>Тариф "';
		echo $name;
		echo '"</h1>';

		echo '<div class="price">Период оплаты - ';

		switch ($value['pay_period']) {
		    case "1":
		        echo "1 месяц";
		        break;
		    case "3":
		        echo "3 месяца";
		        break;
		    case "6":
		        echo "6 месяцев";
		        break;
		    case "12":
		        echo "12 месяцев";
		        break;
		}
		echo '<br>';
		echo $value['price'] / $value['pay_period'];
		echo ' ₽/мес</div>';

		echo '<div class="pay"><span>разовый платеж - ';
		echo $value['price'];
		echo ' ₽</span>';
		echo '<span>со счета спишется - ';
		echo $value['price'];
		echo ' ₽</span></div>';

		echo '<div class="date"><span>вступит в силу - ';
		echo 'сегодня';
		echo '</span>';
		echo '<span>активно до - ';
		echo date('d.m.Y', $value['new_payday']);
		echo '</span></div>';
		echo '<div class="btn-ready"><a href="">Выбрать</a></div>';
	};
};
echo '</div>';
?>

<script src="js/totop.js" type="text/javascript"></script>
<script src="js/btnBack.js" type="text/javascript"></script>
