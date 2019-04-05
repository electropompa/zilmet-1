<?php
$username = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);

$to = 'admin@zilmet.ru';
$from='site@zilmet.ru';

$message = $username . "<br>" . $phone;


mail($to, $username, $message, "From: site@zilmet.ru\r\n" . 'Content-type: text/html; charset="utf-8"');


echo "Спасибо! Заявка отправлена.";