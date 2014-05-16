<?php

/**
 * Class SendForm
 */
class SendForm {
	private $_addText;

	private $_fields;

	private $_to;

	private $_subject;

	private $_from;


	/**
	 * @param $to string From Mail
	 * @param $from string From Mail
	 * @param $subject string Subject
	 */
	public function __construct($to, $from, $subject) {
		$this->_to = $to;
		$this->_from = $from;
		$this->_subject =$subject;
	}


	public function setFields(array $fields) {
		$this->_fields = $fields;
	}

	public function setAdditionalText($text) {
		$this->_addText = $text;
	}

	private function getText() {
		$text = !empty($this->_addText) ? '<p>'.$this->_addText . '</p><br /><br />' : '';
		if (!empty($this->_fields)) {
			foreach ($this->_fields as $name => $value) {
				$text .= sprintf('<p><strong>%s</strong>: %s</p>', $name, $value);
			}
		}
		return $text;
	}



	public function send() {
		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		if (!empty($this->_from)) { $headers .= 'From: ' .$this->_from . "\r\n"; }

		return mail($this->_to, $this->_subject,$this->getText(), $headers);
	}
}