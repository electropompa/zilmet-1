<?php

if ( isset($_POST['phone']) ) { 
  $username = htmlspecialchars($_POST['name']); 
  $phone = htmlspecialchars($_POST['phone']);

  $message = $username . "<br>" . $phone;

  mail('zilmet@zilmet.ru', $username, $message, "From: site@zilmet.ru\r\n" . 'Content-type: text/html; charset="utf-8"');

  echo "Спасибо! Заявка отправлена.";
}

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
    "From: site@zilmet.ru\r\n" . 'Content-type: text/html; charset="utf-8"'
  );

  echo "Спасибо! Заявка отправлена.";
}




