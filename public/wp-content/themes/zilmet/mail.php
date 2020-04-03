<?php
// Письмо директору с reCaptcha
if( isset($_POST['questionEmail']) ){
	$questionName = htmlspecialchars($_POST['questionName']);
	$questionText = htmlspecialchars($_POST['questionText']);
	$questionEmail = htmlspecialchars($_POST['questionEmail']);
	$message = $questionName . " спрашивает: \"" . $questionText . "\"";

	/*КЛЮЧИ*/
	define('SITE_KEY', '6LeCBr8UAAAAALj7Z63zHb31j4NLNKWlcne7YwF8');
	define('SECRET_KEY', '6LeCBr8UAAAAAI6eAp6vumEd-BdTgE4SxMWbrN1p');

	function getCaptcha($SecretKey) {
		$Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
		$Return = json_decode($Response);
		return $Return;
	}

	$Return = getCaptcha($_POST['g-recaptcha-response']);

	if($Return->success == true && $Return->score > 0.5){
		mail(
			'zilmet@zilmet.ru',
			"Вопрос Директору от " . $questionName,
			$message,
			"From: admin@zilmet.ru\r\n" . "Reply-To: " . $questionEmail . "\r\n" . 'Content-type: text/html; charset="utf-8"'
		);
		echo "Succes!";
	} else {
		echo "You are Robot";
	}
}

// Заявка на обратный звонок (не используется)
if ( isset($_POST['phone']) ) { 
  $username = htmlspecialchars($_POST['name']); 
  $phone = htmlspecialchars($_POST['phone']);
  $message = $username . "<br>" . $phone;
  mail('zilmet@zilmet.ru', $username, $message, "From: admin@zilmet.ru\r\n" . 'Content-type: text/html; charset="utf-8"');
  echo "Спасибо! Заявка отправлена.";
}

// Заказ в один клик
if (isset($_POST['oneClickOrderName'])){
  $username = htmlspecialchars($_POST['oneClickOrderName']);
  $phone    = htmlspecialchars($_POST['oneClickOrderPhone']);
  $sku      = htmlspecialchars($_POST['oneclickOrderSku']);
  $quantity = htmlspecialchars($_POST['oneclickOrderQuantity']);
  $price    = htmlspecialchars($_POST['oneclickOrderPrice']);

  $message = $username . " заказал арт. " . $sku . " в количестве " . $quantity . " штук, по цене " . $price . "<br>Номер телефона " . $phone;
  mail(
    'zilmet@zilmet.ru', 
    "Заказ в 1 клик от " . $username, 
    $message, 
    "From: admin@zilmet.ru\r\n" . 'Content-type: text/html; charset="utf-8"'
  );

  echo "Спасибо! Заявка отправлена.";
}




