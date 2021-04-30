<?php

require_once '..\Class_valid.php';

class Eventvalidator extends Validator {
	
public function validates(array $data) {
	
	parent::validates($data);
	$this->validate('event', 'minLenght', 3);
	$this->validate('date', 'date');
	$this->validate('debut', 'beforeTime', 'fin');
	return $this->errors;
	}	
}
	
?>