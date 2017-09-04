<?php
/**
 *
 */
class ConfirmationField extends BooleanField {

	function clean($value){
		list($err,$value) = parent::clean($value);
		if(isset($err)){
			return [$err,$value];
		}

		if(!$value && $this->required){
			return [$this->messages["required"],null];
		}

		return [$err,$value];
	}
}
