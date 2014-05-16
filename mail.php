<?php

//todo перенести валидацию в класс по отправке формы

require_once("SendForm.class.php");

$to = 'petun@air-petr.dlink';
$from = 'admin@air-petr.dlink';
$subject  = 'Новый запрос на звонок с сайта';

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