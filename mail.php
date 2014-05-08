<?php

$to = 'petun@air-petr.dlink';
$subject  = 'Новый запрос на звонок с сайта';

$message = '';
$r = false;

if (!empty($_POST)) {
	$telephone = $_POST['telephone'];
	$name = $_POST['name'];	
	$comment = $_POST['comment'];

	if (!empty($telephone) && !empty($name) ) {	

		// simple checks
		if (!preg_match('/^[\d\s\+\-\(\)]+$/', $telephone)) {
			$r = false;
			$message = 'Введите корректный номер телефона';	
		} else {
			$r = true;
			$message = 'Успешно отправлено! Мы с Вами свяжемся.';	

			// send mail
			$text = '<p>Телефон: '.$telephone. '</p>';
			$text .= '<p>Имя: '.$name. '</p>';
			$text .= '<p>Комментарий: '.$comment. '</p>';

			// Для отправки HTML-письма должен быть установлен заголовок Content-type
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			mail($to, $subject,$text, $headers);

		}		
	} else {
		$r = false;
		$message = 'Заполните все обязательные поля';
	}	 
}

echo json_encode(array('r'=>$r, 'message'=>$message));