<?php

//todo перенести валидацию в класс по отправке формы

require_once("SendForm.class.php");

$to = $_POST['mailto'] ?  $_POST['mailto'] : 'petun@air-petr.dlink';
$subject  = $_POST['mailsubj'] ? $_POST['mailsubj']  : 'Новый запрос на звонок с сайта';
$from = $_POST['mailfrom'] ? $_POST['mailfrom'] : 'admin@air-petr.dlink';

$message = '';
$r = false;

if (!empty($_POST)) {
	$telephone = $_POST['telephone'];
	$name = $_POST['name'];	
	$comment = $_POST['comment'];

	// data validation
	if (!empty($telephone) && !empty($name) ) {

		// simple checks
		if (!preg_match('/^[\d\s\+\-\(\)]+$/', $telephone)) {
			$r = false;
			$message = 'Введите корректный номер телефона';
		} else {
			$r = true;
			$message = 'Успешно отправлено! Мы с Вами свяжемся.';	

			// sending mail
			$mail = new SendForm($to, $from, $subject);

			$fields = array(
				'Телефон' => $telephone,
				'Имя' => $name,
				'Комментарий' => $comment,
			);

			$mail->setFields($fields);
			$mail->setAdditionalText('Новый запрос на обратный звонок с сайта');
			$mail->send();
		}		
	} else {
		$r = false;
		$message = 'Заполните все обязательные поля';
	}	 
}

echo json_encode(array('r'=>$r, 'message'=>$message));